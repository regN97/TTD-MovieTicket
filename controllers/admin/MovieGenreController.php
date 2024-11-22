<?php

class MovieGenreController
{
    private $movieGenres;

    private $movies;

    private $genres;

    public function __construct()
    {
        $this->movieGenres = new MovieGenre();
        $this->movies = new Movie();
        $this->genres = new Genre();
    }

    public function list()
    {

        unset($_SESSION['data']);

        $view = 'movie-genres/list';
        $title = 'Danh sách ràng buộc Movie và Genre';
        // Số sản phẩm trên mỗi trang
        $perPage = 5;

        // Xác định trang hiện tại (mặc định là 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1

        $data = $this->movieGenres->getAll($page, $perPage, '*');

        $totalUser = $this->movieGenres->count();
       $totalPages = ceil($totalUser / $perPage);

       if ($page > $totalPages) {
           // Chuyển hướng đến trang cuối cùng
           header('Location:'. BASE_URL_ADMIN .'&action=movie-genres-list'.'&page=' . $totalPages);
           exit();
       }


        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieGenres = $this->movieGenres->getById($id);

            if (empty($movieGenres)) {
                throw new Exception("Ràng buộc có id = $id không tồn tại!", 98);
            }

            $view = 'movie-genres/show';
            $title = 'Chi tiết ràng buộc có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('location: ' . BASE_URL_ADMIN . '&action=movie-genres-list');
            exit();
        }
    }

    public function create()
    {
        $view = 'movie-genres/create';
        $title = 'Thêm ràng buộc cho Movie và Genre';

        $movies = $this->movies->select();
        $moviePluck = array_column($movies, 'name', 'id');

        $genres = $this->genres->select();
        $genrePluck = array_column($genres, 'name', 'id');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            $data = $_POST;

            $rowCount = $this->movieGenres->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm ràng buộc thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thêm ràng buộc không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-genres-create');
        exit();
    }

    public function updatePage()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieGenres = $this->movieGenres->getById($id);

            if (empty($movieGenres)) {
                throw new Exception("Không tìm thấy ràng buộc có ID = $id!", 98);
            }

            $view = 'movie-genres/update';
            $title = 'Cập nhật ràng buộc ID = ' . $id;

            $movie = $this->movies->select();
            $moviePluck = array_column($movie, 'name', 'id');

            $genre = $this->genres->select();
            $genrePluck = array_column($genre, 'name', 'id');

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=movie-genres-list');
            exit();
        }
    }

    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieGenres = $this->movieGenres->getById($id);

            if (empty($movieGenres)) {
                throw new Exception("Không tìm thấy ràng buộc có id = $id!", 98);
            }

            $data = $_POST;

            $rowCount = $this->movieGenres->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật ràng buộc thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Cập nhật ràng buộc không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL_ADMIN . '&action=movie-genres-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-genres-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieGenres = $this->movieGenres->find('*', 'id = :id', ['id' => $id]);

            if (empty($movieGenres)) {
                throw new Exception("Không tìm thấy ràng buộc có id = $id!", 98);
            }

            $rowCount = $this->movieGenres->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa ràng buộc thành công!';
            } else {
                throw new Exception("Xóa ràng buộc không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-genres-list');
        exit();
    }
}
