<?php

class ClientMovieController
{

    private $movie;

    public function __construct()
    {
        $this->movie = new Movie();
    }


    public function list()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        if ($action == 'movies-isShowing') {
            $view = 'movie/list-movie';
            $data = $this->movie->select('*', 'release_date <= :release_date', ['release_date' => date('Y-m-d')]);

            $title = 'Phim đang chiếu';
            $description = 'Danh sách các phim hiện đang chiếu rạp trên toàn quốc 21/11/2024. Xem lịch chiếu phim, giá vé tiện lợi, đặt vé nhanh chỉ với 1 bước!';

            require_once PATH_VIEW_CLIENT_MAIN;
            exit();
        } else if ($action = 'movies-upcoming') {
            $view = 'movie/list-movie';
            $data = $this->movie->select('*', 'release_date > :release_date', ['release_date' => date('Y-m-d')]);

            $title = 'Phim sắp chiếu';
            $description = 'Danh sách các phim dự kiến sẽ khởi chiếu tại các hệ thống rạp trên toàn quốc.';

            require_once PATH_VIEW_CLIENT_MAIN;
            exit();
        }
    }


    public function search()
    {

        try {
            // Lấy từ khóa tìm kiếm từ request
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phải là phương thức POST !");
            }

            if (empty($_POST['movies-search'])) {
                throw new Exception("Hãy nhập từ khóa tìm kiếm!");
            }

            $_SESSION['searchKey'] = trim($_POST['movies-search']);

            $_SESSION['result'] = [];

            $_SESSION['errors'] = [];

            $movies = $this->movie->select('*');

            if (!empty($movies)) {
                foreach ($movies as $key) {
                    if (strpos($key['name'], $_SESSION['searchKey']) !== FALSE) {
                        $movie = $this->movie->find('*', 'name like :name', ['name' => '%' . $_SESSION['searchKey'] . '%']);
                        if (!empty($movie)) {
                            array_push($_SESSION['result'], $movie);
                        }
                    }
                }
            }

            if (!empty($_SESSION['result'])) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Tìm kiếm thành công!";
            } else {
                $_SESSION['errors']['search'] = "Tìm kiếm không thành công!";
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL . '?action=search-page');
        exit();
    }

    public function detail(){
        $view = 'movie/show-movie';
        $title = '';
        $description = '';
    }
    
    public function searchPage()
    {
        $view = 'search';

        $title = 'Tìm kiếm';
        $description = "Theo từ khóa";

        require_once PATH_VIEW_CLIENT_MAIN;
    }
}
