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

            require_once PATH_VIEW_CLIENT_MAIN;
            exit();
        } else if ($action = 'movies-upcoming') {
            $view = 'movie/list-movie';
            $data = $this->movie->select('*', 'release_date > :release_date', ['release_date' => date('Y-m-d')]);

            require_once PATH_VIEW_CLIENT_MAIN;
            exit();
        }
    }

    public function searchByName()
    {

        try {
            // Lấy từ khóa tìm kiếm từ request
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phải là phương thức POST !");
            }

            if (empty($_POST['movies-search'])) {
                throw new Exception("Hãy nhập từ khóa tìm kiếm!");
            }

            $searchKey = trim($_POST['movies-search']);

            $_SESSION['result'] = [];

            $_SESSION['errors'] = [];

            $movies = $this->movie->select('*');

            if (!empty($movies)) {
                foreach ($movies as $key) {
                    if (strpos($key['name'], $searchKey) !== FALSE) {
                        $movie = $this->movie->find('*', 'name like :name', ['name' => '%' . $searchKey . '%']);
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
                $_SESSION['errors']['search'] = "Không tìm thấy bộ phim bạn cần!";
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL . '?action=movies-isShowing');
        exit();
    }

    public function detail(){
        $view = 'movie/show-movie';
        $title = '';
        $description = '';

        require_once PATH_VIEW_CLIENT_MAIN;
    }
}
