<?php

class GenreController
{
    private $genre;

    public function __construct()
    {
        $this->genre = new Genre();
    }

    // Hiển thị danh sách thể loại
    public function list()
    {
        unset($_SESSION['data']);

        $view = 'genres/list';
        $title = 'Danh sách thể loại phim';
        $data = $this->genre->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Hiển thị trang create thể loại
    public function create()
    {
        $view = 'genres/create';
        $title = 'Thêm mới thể loại phim';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Lưu dữ liệu vừa nhập ở create lên db
    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

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
                $_SESSION['msg'] = "Tạo mới thành công!";
                unset($_SESSION['data']);
            } else {
                throw new Exception("Tạo mới không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=genres-create');
        exit();
    }

    // Xem chi tiết từng thể loại
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $genre = $this->genre->find('*', 'id = :id', ['id' => $id]);

            if (empty($genre)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'genres/show';
            $title = "Chi tiết thể loại";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=genres-list');
            exit();
        }
    }

    // Hiển thị trang update
    public function updatePage()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $genre = $this->genre->find('*', 'id = :id', ['id' => $id]);

            if (empty($genre)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $view = 'genres/update';
            $title = "Cập nhật Genre có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=genres-list');
            exit();
        }
    }

    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $genre = $this->genre->find('*', 'id = :id', ['id' => $id]);

            if (empty($genre)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

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

            $rowCount = $this->genre->update($data, 'id = :id', ['id' => $id]);

            // Kiểm tra update có thành công hay không
            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Cập nhật thành công!";
                unset($_SESSION['data']);
            } else {
                throw new Exception("Cập nhật không thành công! Nội dung phải được thay đổi để cập nhật!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL_ADMIN . '&action=genres-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=genres-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $genre = $this->genre->find('*', 'id = :id', ['id' => $id]);

            if (empty($genre)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $rowCount = $this->genre->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa thành công!';
            } else {
                throw new Exception("Xóa không thành công!");
                
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=genres-list');
        exit();
    }
}
