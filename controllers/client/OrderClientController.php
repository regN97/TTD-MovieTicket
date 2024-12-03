<?php
class OrderClientController
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

        $view = 'order/history-order';
        $title = 'Lịch sử giao dịch';
        $description = 'Hiển thị thông tin lịch sử giao dịch';
        
        $id = $_GET['id'];
        $historyOrder= $this ->order->getAllByUser('o.user_id = :id',['id'=>$id]);
        $schedule_id = $this->order->getScheduleId();
        $users = $this->user->getID($_SESSION['user']['id']);

        require_once PATH_VIEW_CLIENT_MAIN;

    }
    public function show()
    {
        try {
            $id = $_GET['order-id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $orderDetail = $this->order->getTicketDetail("o.id = $id");

            // debug($orderDetail);
            
            if (empty($orderDetail)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            foreach ($orderDetail as $key) {
                $tickets = $this->ticket->getAll($key['t_schedule_id']);
            }

            $users = $this->user->getID($_SESSION['user']['id']);
            $orderStatus = $this->order->find('status', 'id = :id', ['id' => $id]);
                
            $view = 'order/show-order';
            $title = "Chi tiết đơn hàng";
            $description = 'Hiển thị thông tin chi tiết đơn hàng';

            // debug($tickets);
            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=show-order');
            exit();
        }
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
            $users = $this->user->getID($_SESSION['user']['id']);

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

        header('Location: ' . BASE_URL . '?action=history-order&id='. $users['u_id']);
        exit();
    }
}