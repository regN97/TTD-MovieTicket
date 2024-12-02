<?php
class OrderController
{
    private $order;
    private $user;
    private $ticket;
    private $orderDetail;
    private $orderFnd;

    public function __construct()
    {
        $this->order = new Order();
        $this->user = new User();
        $this->ticket = new Ticket();
        $this->orderDetail = new OrderDetail();
        $this->orderFnd = new OrderFnd();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'orders/list';
        $title = 'Danh sách đơn hàng';
        $data = $this->order->select();
        $schedule_id = $this->order->getScheduleId();


        $users = $this->user->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function show()
    {
        try {
            $id = $_GET['order-id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $orderDetail = $this->order->getTicketDetail("o.id = $id");

            if (empty($orderDetail)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            foreach ($orderDetail as $key) {
                $tickets = $this->ticket->getAll($key['t_schedule_id']);
            }

            $view = 'orders/show';
            $title = "Chi tiết đơn hàng";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=order-list');
            exit();
        }
    }

    public function changeStatus()
    {
        try {
            $order_id = $_GET['id'];
            $status = $_GET['status'];


            if (empty($order_id) || empty($status)) {
                throw new Exception("Thiếu tham số cần thiết");
            }

            $user_id = $this->order->find('user_id', 'id = :id', ['id' => $order_id]);
            $total_price = $this->order->find('total_price', 'id = :id', ['id' => $order_id]);

            $price = implode("", $total_price);
            $userId = implode("", $user_id);

            $points = $price / 1000;

            $pointBeforeUpdate = $this->user->find('points', 'id = :id', ['id' => $userId]);
            $pointBefore = implode("", $pointBeforeUpdate);

            $finalPlusPoint = $pointBefore + $points;
            $pointBeforePlus = $pointBefore - $points;


            if ($status == 'Chưa thanh toán') {
                $data = [
                    'status' => 'Đã thanh toán'
                ];

                $p = [
                    'points' => $finalPlusPoint
                ];

                $updateStatus = $this->order->update($data, 'id = :id', ['id' => $order_id]);
                $updatePoint = $this->user->update($p, 'id = :id', ['id' => $userId]);
            }

            if ($status == 'Đã thanh toán') {
                $data = [
                    'status' => 'Chưa thanh toán'
                ];

                $p = [
                    'points' => $pointBeforePlus
                ];
                $updateStatus = $this->order->update($data, 'id = :id', ['id' => $order_id]);
                $updatePoint = $this->user->update($p, 'id = :id', ['id' => $userId]);
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=order-list');
        exit();
    }

    public function delete()
    {
        try {
            $id = $_GET['id'];
            $schedule_id = $_GET['schedule-id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $order = $this->order->find('*', 'id = :id', ['id' => $id]);
            $orderDetail = $this->orderDetail->find('*', 'order_id = :order_id', ['order_id' => $id]);
            $fndDetail = $this->orderFnd->find('*', 'order_id = :order_id', ['order_id' => $id]);
            $ticket = $this->ticket->find('*', 'schedule_id = :schedule_id', ['schedule_id' => $schedule_id]);

            if (empty($order) && empty($orderDetail) && empty($ticket)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $detailCount = $this->orderDetail->delete('order_id = :order_id', ['order_id' => $id]);

            if (!empty($fndDetail)) {
                $fndCount = $this->orderFnd->delete('order_id = :order_id', ['order_id' => $id]);
            }
            $orderCount = $this->order->delete('id = :id', ['id' => $id]);
            $ticketCount = $this->ticket->delete('schedule_id = :schedule_id', ['schedule_id' => $schedule_id]);

            if ($orderCount > 0 && $detailCount > 0 && $ticketCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa thành công!';
            } else {
                throw new Exception("Xóa không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=order-list');
        exit();
    }
}
