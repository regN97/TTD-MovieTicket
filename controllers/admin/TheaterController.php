<?php

class TheaterController
{
    private $theater;

    public function __construct()
    {
        $this->theater = new Theater();
    }

    // Hiển thị danh sách
    public function index()
    {
        $view = 'theaters/list';
        $title = 'Danh sách Rạp';
        $data = $this->theater->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Hiển thị chi tiết theo ID
    public function show()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $theater = $this->theater->find('*', 'id = :id', ['id' => $id]);

            if (empty($theater)) {
                throw new Exception("Theater có ID = $id không tồn tại!");
            }

            $view = 'theaters/show';
            $title = "Chi tiết Theater có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=theaters-index');
            exit();
        }
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $view = 'theaters/create';
        $title = 'Thêm mới Theater';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Lưu dữ liệu thêm mới
    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST!");
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên rạp không được bỏ trống và không được quá 50 ký tự!";
            }

            if (empty($data['address'])) {
                $_SESSION['errors']['address'] = "Địa chỉ không được bỏ trống!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->theater->insert($data);

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
        header('Location: ' . BASE_URL_ADMIN . '&action=theaters-create');
        exit();
    }

    // Hiển thị form cập nhật theo ID
    public function edit()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $theater = $this->theater->find('*', 'id = :id', ['id' => $id]);

            if (empty($theater)) {
                throw new Exception("Theater có ID = $id không tồn tại!");
            }

            $view = 'theaters/edit';
            $title = "Cập nhật Theater có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=theaters-index');
            exit();
        }
    }

    // Lưu dữ liệu cập nhật theo ID
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST!");
            }

            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $theater = $this->theater->find('*', 'id = :id', ['id' => $id]);

            if (empty($theater)) {
                throw new Exception("Theater có ID = $id không tồn tại!");
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên rạp không được bỏ trống và khônng được quá 50 ký tự!";
            }

            if (empty($data['address'])) {
                $_SESSION['errors']['address'] = "Địa chỉ không được bỏ trống!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Dữ liệu lỗi!");
            }

            $data['created_at'] = date('Y-m-d H:i:s');

            $rowCount = $this->theater->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Thao tác thành công!";
            } else {
                throw new Exception("Thao tác không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage() . ' - Line ' . $th->getLine();

            if ($th->getCode() == 99) {
                header('Location: ' . BASE_URL_ADMIN . '&action=theaters-index');
                exit();
            }
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=theaters-edit&id=' . $id);
        exit();
    }

    // Xoá dữ liệu theo ID
    public function delete()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $theater = $this->theater->find('*', 'id = :id', ['id' => $id]);

            if (empty($theater)) {
                throw new Exception("Theater có ID = $id không tồn tại!");
            }

            $rowCount = $this->theater->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Thao tác thành công!";
            } else {
                throw new Exception("Thao tác không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=theaters-index');
        exit();
    }
}
