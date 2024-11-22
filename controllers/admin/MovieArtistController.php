<?php

class MovieArtistController
{
    private $movieArtist;
    private $movie;
    private $artist;
    public function __construct()
    {
        $this->movieArtist = new MovieArtist();
        $this->movie = new Movie();
        $this->artist = new Artist();
    }

    public function list()
    {

        unset($_SESSION['data']);

        $view = 'movie-artists/list';
        $title = 'Danh sách ràng buộc Movie và Artist';
        $data = $this->movieArtist->getAll();

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieArtists = $this->movieArtist->getById($id);

            if (empty($movieArtists)) {
                throw new Exception("Ràng buộc có id = $id không tồn tại!", 98);
            }

            $view = 'movie-artists/show';
            $title = 'Chi tiết ràng buộc có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('location: ' . BASE_URL_ADMIN . '&action=movie-artists-list');
            exit();
        }
    }

    public function create()
    {
        $view = 'movie-artists/create';
        $title = 'Thêm ràng buộc cho Movie và Artist';

        $movie = $this->movie->select();
        $moviePluck = array_column($movie, 'name', 'id');

        $artist = $this->artist->select();
        $artistPluck = array_column($artist, 'name', 'id');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            $data = $_POST;

            $rowCount = $this->movieArtist->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-artists-create');
        exit();
    }

    public function updatePage()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieArtists = $this->movieArtist->getById($id);

            if (empty($movieArtists)) {
                throw new Exception("Không tìm thấy ràng buộc có ID = $id!", 98);
            }

            $view = 'movie-artists/update';
            $title = 'Cập nhật ràng buộc ID = ' . $id;

            $movie = $this->movie->select();
            $moviePluck = array_column($movie, 'name', 'id');

            $artist = $this->artist->select();
            $artistPluck = array_column($artist, 'name', 'id');

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=movie-artists-list');
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

            $movieArtist = $this->movieArtist->getById($id);

            if (empty($movieArtist)) {
                throw new Exception("Không tìm thấy ràng buộc có id = $id!", 98);
            }

            $data = $_POST;

            $rowCount = $this->movieArtist->update($data, 'id = :id', ['id' => $id]);

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
                header('Location: ' . BASE_URL_ADMIN . '&action=movie-artists-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-artists-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movieArtist = $this->movieArtist->find('*', 'id = :id', ['id' => $id]);

            if (empty($movieArtist)) {
                throw new Exception("Không tìm thấy ràng buộc có id = $id!", 98);
            }

            $rowCount = $this->movieArtist->delete('id = :id', ['id' => $id]);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=movie-artists-list');
        exit();
    }
}
