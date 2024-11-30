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
            $id = $_GET['id'];
            $status = $_GET['status'];


            if (empty($id) || empty($status)) {
                throw new Exception("Thiếu tham số cần thiết");
            }

            if ($status == 'Chưa thanh toán') {
                $data = [
                    'status' => 'Đã thanh toán'
                ];
                $updateStatus = $this->order->update($data, 'id = :id', ['id' => $id]);
            }

            if ($status == 'Đã thanh toán') {
                $data = [
                    'status' => 'Chưa thanh toán'
                ];
                $updateStatus = $this->order->update($data, 'id = :id', ['id' => $id]);
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
