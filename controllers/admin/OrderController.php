<?php 
class OrderController 
{
    private $order;

    public function __construct()
    {
        $this -> order = new Order();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'orders/list';
        $title = 'Danh sách đơn hàng';
        $data = $this->order->getAll();
        debug($data);
        require_once PATH_VIEW_ADMIN_MAIN;
    }
}
?>