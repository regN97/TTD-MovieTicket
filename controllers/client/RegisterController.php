<?php

class RegisterController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $view = 'register/create';
        $title = 'Đăng ký tài khoản';
        $description = 'Đăng ký tài khoản TTD Movie Ticket';

        require_once PATH_VIEW_CLIENT_MAIN;
    }

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
                $_SESSION['errors']['name'] = "Vui lòng nhập họ tên!";
            }

            if (empty($data['password'])) {
                $_SESSION['errors']['password'] = "Vui lòng nhập mật khẩu!";
            }

            if (strlen($data['password']) < 0 || strlen($data['password']) > 30) {
                $_SESSION['errors']['password'] = "Mật khẩu không hợp lệ! Vui lòng thử lại.";
            }

            if ($data['password'] !== $data['repassword']) {
                $_SESSION['errors']['repassword'] = "Mật khẩu không trùng khớp!";
            }

            if (empty($data['tel'])) {
                $_SESSION['errors']['tel'] = "Vui lòng nhập số điện thoại!";
            }

            if (!is_numeric($data['tel']) || strlen($data['tel']) != 10) {
                $_SESSION['errors']['tel'] = "Số điện thoại không hợp lệ!";
            }

            if (empty($data['email'])) {
                $_SESSION['errors']['email'] = "Vui lòng nhập địa chỉ email.";
            }

            if (strlen($data['email']) > 100) {
                $_SESSION['errors']['email'] = "Độ dài email vượt quá quy định cho phép!";
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors']['email'] = "Email không hợp lệ!";
            }

            if (!empty($this->user->find('*', 'email=:email', ['email' => $data['email']]))) {
                $_SESSION['errors']['email'] = "Email đã tồn tại, vui lòng kiểm tra lại!";
            }

            if (empty($data['address'])) {
                $_SESSION['errors']['address'] = "Vui lòng nhập địa chỉ!";
            }

            if (!empty($data['imageURL']) && $data['imageURL']['size'] > 0) {
                if ($data['imageURL']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['errors']['imageURL_type'] = 'Trường hình ảnh có dung lượng tối da là 2MB!';
                }
                $fileType = $data['imageURL']['type'];
                $allowedTyped = ['image/jpg', 'image/jpeg', 'image/png'];
                if (!in_array($fileType, $allowedTyped)) {
                    $_SESSION['errors']['imageURL_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, JPEG, PNG';
                }
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            if ($data['imageURL']['size'] > 0) {
                $data['imageURL'] = upload_file('user', $data['imageURL']);
            } else {
                $data['imageURL'] = null;
            }

            $rowCount = $this->user->insertUser($data);

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

            header('Location: ' . BASE_URL . '?action=register-form');
            exit();
        }

        header('Location: ' . BASE_URL . '?action=show-form-login');
        exit();
    }
}
