<?php

class HomeController
{


    private $movie;
    private $news;

    public function __construct()
    {
        $this->movie = new Movie();
        $this->news = new News();
    }
    public function index()
    {
        // Movies

        $perPage = 6;
        // Xác định trang hiện tại (mặc định là 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1
        
        $movie = $this->movie->paginate($page, $perPage, '*', '');

        $totalMovie = $this->movie->count();
        $totalPages = ceil($totalMovie / $perPage);

        if ($page > $totalPages) {
            // Chuyển hướng đến trang cuối cùng
            header('Location:' . BASE_URL . '&action=/' . '&page=' . $totalPages);
            exit();
        }

        // News
        $news =$this->news->getAll();
        $hotnews = $this ->news->hotnews() ;

        require_once PATH_VIEW_CLIENT . 'home.php';
    }
}
