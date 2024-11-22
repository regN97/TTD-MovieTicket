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
        
        // Số sản phẩm trên mỗi trang
         $perPage = 12;

        if ($action == 'movies-isShowing') {
            $view = 'movie/list-movie';
            $title = 'Phim đang chiếu';
            $description = 'Danh sách các phim hiện đang chiếu rạp trên toàn quốc 21/11/2024. Xem lịch chiếu phim, giá vé tiện lợi, đặt vé nhanh chỉ với 1 bước!';

       

        // Xác định trang hiện tại (mặc định là 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1

        $data = $this->movie->paginate($page, $perPage, '*', 'release_date <= :release_date', ['release_date' => date('Y-m-d')]);

        $totalMovie = $this->movie->count('release_date <= :release_date', ['release_date' => date('Y-m-d')]);
       $totalPages = ceil($totalMovie / $perPage);

       if ($page > $totalPages) {
           // Chuyển hướng đến trang cuối cùng
           header('Location:'. BASE_URL .'&action=movies-isShowing'.'&page=' . $totalPages);
           exit();
       }
            require_once PATH_VIEW_CLIENT_MAIN;
            exit();
        } else if ($action == 'movies-upcoming') {
            $view = 'movie/list-movie';
            $title = 'Phim sắp chiếu';
            $description = 'Danh sách các phim dự kiến sẽ khởi chiếu tại các hệ thống rạp trên toàn quốc.';

         // Xác định trang hiện tại (mặc định là 1)
         $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
         $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1

         $data = $this->movie->paginate($page, $perPage, '*', 'release_date > :release_date', ['release_date' => date('Y-m-d')]);

         $totalMovie = $this->movie->count('release_date > :release_date', ['release_date' => date('Y-m-d')]);
        $totalPages = ceil($totalMovie / $perPage);

        if ($page > $totalPages) {
            // Chuyển hướng đến trang cuối cùng
            header('Location:'. BASE_URL .'&action=movies-upcoming'.'&page=' . $totalPages);
            exit();
        }

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

    public function detail()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movies = $this->movie->find('*', 'id = :id', ['id' => $id]);
            $movieGenre = $this->movie->getMovieGenre($id);
            $movieArtist = $this->movie->getMovieArtist($id);

            if (empty($movieGenre) || empty($movieArtist) || empty($movies)) {
                throw new Exception("Phim không có trong hệ thống, vui lòng kiểm tra lại!");
            }

            $view = 'movie/show-movie';

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=movies-isShowing');
            exit();
        }
    }

    public function searchPage()
    {
        $view = 'search';

        $title = 'Tìm kiếm';
        $description = "Theo từ khóa";

        require_once PATH_VIEW_CLIENT_MAIN;
    }
}
