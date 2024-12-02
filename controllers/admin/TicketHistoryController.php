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
          // Số sản phẩm trên mỗi trang
          $perPage = 5;

          // Xác định trang hiện tại (mặc định là 1)
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1
 
          $data = $this->ticketHistory->getAll($page, $perPage, '*');
 
          $totalHistory = $this->ticketHistory->count();
         $totalPages = ceil($totalHistory / $perPage);
 
         if ($page > $totalPages) {
             // Chuyển hướng đến trang cuối cùng
             header('Location:'. BASE_URL_ADMIN .'&action=history-list'.'&page=' . $totalPages);
             exit();
         }

  require_once PATH_VIEW_ADMIN_MAIN;

    }
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $ticketHistory = $this->ticketHistory->getID($id);

            if (empty($ticketHistory)) {
                throw new Exception("Vé phim có ID = $id không tồn tại!", 98);
            }

            $view = 'ticketHistory/show';
            $title = 'Chi tiết vé phim có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=history-list');
            exit();
        }
    }
    
}
?>