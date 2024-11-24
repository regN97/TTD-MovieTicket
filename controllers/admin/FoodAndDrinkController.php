<?php

class FoodAndDrinkController
{
    private $foodAndDrink;

    public function __construct()
    {
        $this->foodAndDrink = new FoodAndDrink();
    }

    // Hiển thị danh sách bỏng nước
    public function list()
    {
        unset($_SESSION['data']);

        $view = 'foodanddrinks/list';
        $title = 'Danh sách đồ ăn & đồ uống';
        $data = $this->foodAndDrink->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Xem chi tiết bỏng nước
    public function show()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $foodAndDrink = $this->foodAndDrink->find('*', 'id = :id', ['id' => $id]);

            if (empty($foodAndDrink)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'foodanddrinks/show';
            $title = "Chi tiết đồ ăn & đồ uống có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=foodanddrinks-list');
            exit();
        }
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $view = 'foodanddrinks/create';
        $title = 'Thêm mới đồ ăn & đồ uống';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Lưu giữ liệu thêm mới
    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception(('Yêu cầu phương thức phải là POST !'));
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên sản phẩm không được bỏ trống và không được vượt quá 50 ký tự!";
            }
            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = "Hãy chọn phân loại!";
            } else {
                $validateType = ['Single', 'Combo'];
                if (!in_array($data['type'], $validateType)) {
                    $_SESSION['errors']['validateType'] = "Hãy chọn 1 trong 2 phân loại!";
                }
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Vui lòng nhập mô tả!";
            } else if (strlen($data['description']) > 1000) {
                $_SESSION['errors']['description'] = "Độ dài của mô tả không được quá 1000 ký tự!";
            }

            if (empty($data['price']) || $data['price'] <= 0) {
                $_SESSION['errors']['price'] = "Giá tiền không được bỏ trống và phải lớn hơn 0!";
            }

            if (empty($data['quantity']) || $data['quantity'] <= 0) {
                $_SESSION['errors']['quantity'] = "Số lượng tồn kho không được bỏ trống và phải lớn hơn 0!";
            }

            if ($data['imageURL']['size'] > 0) {
                if ($data['imageURL']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['errors']['data_size'] = 'Hình ảnh có dung lượng tối đa 2MB!';
                }

                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['errors']['imageURL_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, FPEG, PNG, GIF!';
                }
            } else {
                $_SESSION['errors']['imageURL'] = "Hình ảnh không được bỏ trống!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            if ($data['imageURL']['size'] > 0) {
                $data['imageURL'] = upload_file('foodanddrinks', $data['imageURL']);
            } else {
                $data['imageURL'] = null;
            }

            $rowCount = $this->foodAndDrink->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=foodanddrinks-create');
        exit();
    }

    // Hiển thị form cập nhật theo ID
    public function updatePage()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $foodAndDrink = $this->foodAndDrink->find('*', 'id = :id', ['id' => $id]);

            if (empty($foodAndDrink)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'foodanddrinks/update';
            $title = "Cập nhật đồ ăn & đồ uống có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=foodanddrinks-create');
            exit();
        }
    }

    // Lưu giữ liệu cập nhật theo ID
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception(('Yêu cầu phương thức phải là POST !'));
            }

            $id = $_GET['id'];
            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $foodAndDrink = $this->foodAndDrink->find('*', 'id = :id', ['id' => $id]);

            if (empty($foodAndDrink)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên sản phẩm không được bỏ trống và không được vượt quá 50 ký tự!";
            }

            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = "Hãy chọn phân loại!";
            } else {
                $validateType = ['Single', 'Combo'];
                if (!in_array($data['type'], $validateType)) {
                    $_SESSION['errors']['validateType'] = "Hãy chọn 1 trong 2 phân loại!";
                }
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Vui lòng nhập mô tả!";
            } else if (strlen($data['description']) > 1000) {
                $_SESSION['errors']['description'] = "Độ dài của mô tả không được quá 1000 ký tự!";
            }

            if (empty($data['price']) || $data['price'] <= 0) {
                $_SESSION['errors']['price'] = "Giá tiền không được bỏ trống và phải lớn hơn 0!";
            }

            if (empty($data['quantity']) || $data['quantity'] <= 0) {
                $_SESSION['errors']['quantity'] = "Số lượng tồn kho không được bỏ trống và phải lớn hơn 0!";
            }

            if ($data['imageURL']['size'] > 0) {
                if ($data['imageURL']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['errors']['data_size'] = 'Hình ảnh có dung lượng tối đa 2MB!';
                }

                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['errors']['imageURL_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, FPEG, PNG, GIF!';
                }
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            if ($data['imageURL']['size'] > 0) {
                $data['imageURL'] = upload_file('foodanddrinks', $data['imageURL']);
            } else {
                $data['imageURL'] = $foodAndDrink['imageURL'];
            }

            $rowCount = $this->foodAndDrink->update($data, 'id = :id', ['id' => $id]);

            // Kiểm tra insert có thành công hay không
            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Cập nhật thành công!";
                unset($_SESSION['data']);
            } else {
                throw new Exception("Cập nhật không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL_ADMIN . '&action=foodanddrinks-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=foodanddrinks-updatePage&id=' . $id);
        exit();
    }

    // Xoá bản ghi
    public function delete()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $foodAndDrink = $this->foodAndDrink->find('*', 'id = :id', ['id' => $id]);

            if (empty($foodAndDrink)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $rowCount = $this->foodAndDrink->delete('id = :id', ['id' => $id]);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=foodanddrinks-list');
        exit();
    }
}
