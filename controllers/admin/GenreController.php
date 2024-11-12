<?php

class GenreController
{
    private $genre;

    public function __construct()
    {
        $this->genre = new Genre();
    }

    public function list()
    {
        $view = 'genres/list';
        $title = 'Danh sách thể loại phim';
        $data = $this->genre->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create()
    {
        $view = 'genres/create';
        $title = 'Thêm mới thể loại phim';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            // debug(empty($data['name']));
            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên thể loại không được bỏ trống và không được vượt quá 50 ký tự!";
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Vui lòng nhập mô tả!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->genre->insert($data);

            // Kiểm tra insert có thành công hay không
            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Thao tác thành công!";
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thao tác không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=genres-create');
        exit();
    }
}
