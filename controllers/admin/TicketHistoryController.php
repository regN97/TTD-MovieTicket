<?php 
class TicketHistoryController 
{
    private $ticketHistory;

    public function __construct()
    {
        $this -> ticketHistory = new TicketHistory();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'ticketHistory/list';
        $title = 'Danh sách vé đã đặt';
        $data = $this->ticketHistory->getAll();

        require_once PATH_VIEW_ADMIN_MAIN;
    }
}
?>