<?php

class UserLoginController
{
    private $user;
    private $rank;
    private $order;

    public function __construct()
    {
        $this->user = new User();
        $this->rank = new Rank();
        $this->order = new Order();
    }

    public function showFormLogin()
    {
        $view = 'authen/form-login';

        $title = 'Đăng nhập';
        $description = 'Đăng nhập với tài khoản TTD Movie Ticket';

        require_once PATH_VIEW_CLIENT_MAIN;
    }

    public function login()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;


            if (empty($email) || empty($password)) {
                throw new Exception('Email và Password không được để trống!');
            }

            $user = $this->user->find(
                '*',
                'email = :email AND password = :password',
                [
                    'email'     => $email,
                    'password'  => $password
                ]
            );

            if (empty($user)) {
                throw new Exception('Thông tin tài khoản không đúng!');
            }

            // Kiểm tra role tài khoản
            if (!empty($user)) {
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL);
                exit();
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=show-form-login');
            exit();
        }
    }

    public function logout()
    {
        session_destroy();

        header('Location: ' . BASE_URL);
        exit();
    }

    public function info()
    {
        $view = 'authen/info-user';
        $title = 'Thông tin người dùng';
        $description = 'Hiển thị thông tin người dùng';

        $id = $_SESSION['user']['id'];

        $user = $this->user->getID($id);

        require_once PATH_VIEW_CLIENT_MAIN;
    }

    public function updatePageUser()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $data = $this->user->getID($id);

            if (empty($data)) {
                throw new Exception("Người dùng có ID = $id không tồn tại!");
            }
            $view = 'authen/form-update';
            $title = 'Cập nhật thông tin';
            $description = 'Cập nhật thông tin của người dùng';

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL . '?action=info-user');
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

            $user = $this->user->getID($id);

            if (empty($user)) {
                throw new Exception("User có ID = $id không tồn tại!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['name'])) {
                $_SESSION['errors']['name'] = "Tên không được bỏ trống!";
            }
            if (!empty($data['name']) && strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên không được dài quá 50 ký tự!";
            }

            if (empty($data['password'])) {
                $_SESSION['errors']['password'] = "Mật khẩu phải dài từ 5 đến 30 kí tự!";
            }
            if (!empty($data['password']) && strlen($data['password']) < 5 || strlen($data['password']) > 30) {
                $_SESSION['errors']['password'] = "Mật khẩu phải dài từ 5 đến 30 kí tự!";
            }
            if (isset($data['password']) && $data['password'] != $user['u_password']) {
                $_SESSION['errors']['password'] = "Mật khẩu không chính xác!";
            }
            if (empty($data['tel'])) {
                $_SESSION['errors']['tel'] = "Số điện thoại không được bỏ trống!";
            }
            if (!empty($data['tel']) && !preg_match('/^[0-9]{10}$/', $data['tel'])) {
                $_SESSION['errors']['tel'] = "Số điện thoại  phải là số và có độ dài bằng 10!";
            }

            if (
                empty($data['email'])
            ) {
                $_SESSION['errors']['email'] = "Email không được bỏ trống!";
            }
            if (
                !empty($data['email'])
                && strlen($data['email']) > 100
                || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
            ) {
                $_SESSION['errors']['email'] = "Email không đúng định dạng!";
            }

            if (empty($data['address'])) {
                $_SESSION['errors']['address'] = "Địa chỉ không được bỏ trống!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->user->update($data, 'id = :id', ['id' => $id]);

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

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL . '?action=info-user');
                exit();
            }
        }
        header('Location: ' . BASE_URL . '?action=form-update&id=' . $id);
        exit();
    }
    public function updatePasswordPage()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $user = $this->user->getID($id);

            if (empty($user)) {
                throw new Exception("Người dùng có ID = $id không tồn tại!");
            }

            $view = 'authen/update-password';
            $title = 'Cập nhật mật khẩu';
            $description = 'Cập nhật mật khẩu';

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=info-user');
            exit();
        }
    }

    public function updatePassword()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST!");
            }

            $id = $_GET['id'];


            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $user = $this->user->getID($id);

            if (empty($user)) {
                throw new Exception("User có ID = $id không tồn tại!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (isset($data['oldPassword']) && $data['oldPassword'] != $user['u_password']) {
                $_SESSION['errors']['oldPassword'] = "Mật khẩu cũ không chính xác!";
            }
            if (empty($data['oldPassword'])) {
                $_SESSION['errors']['oldPassword'] = "Trường mật khẩu cũ không được bỏ trống!";
            }
            if (!empty($data['oldPassword']) && strlen($data['oldPassword']) < 5 || strlen($data['oldPassword']) > 30) {
                $_SESSION['errors']['oldPassword'] = "Trường mật khẩu cũ không được bỏ trống và dài từ 5 đến 30 kí tự!";
            }

            if (empty($data['password'])) {
                $_SESSION['errors']['password'] = "Trường mật khẩu mới không được bỏ trống";
            }
            if (!empty($data['confirmPassword']) && strlen($data['password']) < 5 || strlen($data['password']) > 30) {
                $_SESSION['errors']['password'] = "Trường mật khẩu mới phải dài từ 5 đến 30 kí tự!";
            }
            if (empty($data['confirmPassword'])) {
                $_SESSION['errors']['confirmPassword'] = "Nhập lại mật khẩu không được bỏ trống!";
            }
            if (!empty($data['confirmPassword']) && strlen($data['confirmPassword']) < 5 || strlen($data['confirmPassword']) > 30) {
                $_SESSION['errors']['confirmPassword'] = "Trường nhập lại mật khẩu phải dài từ 5 đến 30 kí tự!";
            }
            if (isset($data['password']) && isset($data['confirmPassword']) && $data['password'] != $data['confirmPassword']) {
                $_SESSION['errors']['password'] = "Nhập lại mật khẩu không trùng lặp với mật khẩu mới!";
            }
            if (isset($data['password']) &&  $data['password'] == $user['u_password']) {
                $_SESSION['errors']['password'] = "Mật Khẩu mới không được trùng với mật khẩu cũ!";
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }
            $rowCount = $this->user->updatePassword($data['password'], $id);

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

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL . '?action=changePassword');
                exit();
            }
        }
        header('Location: ' . BASE_URL . '?action=changePassword&id=' . $id);
        exit();
    }
    public function showRank()
    {

        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $user = $this->user->getID($id);
            $rank = $this->rank->select();

            if (empty($user)) {
                throw new Exception("Người dùng có ID = $id không tồn tại!");
            }

            $view = 'authen/showrank';
            $title = 'Thứ hạng';
            $description = 'Chi tiết thứ hạng người dùng';

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL . '?action=info-user');
            exit();
        }
    }
    public function updateImage()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST!");
            }

            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $user = $this->user->getID($id);

            if (empty($user)) {
                throw new Exception("User có ID = $id không tồn tại!", 98);
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            if (!empty($data['imageURL']) && $data['imageURL']['size'] > 0) {
                if ($data['imageURL']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['errors']['imageURL_size'] = 'Dung lượng tối đa là 2MB!';
                }
                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['errors']['imageURL_type'] = 'Chỉ chấp nhận các file JPG, JPEG, PNG, GIF!';
                }
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            if ($data['imageURL']['size'] > 0) {
                $data['imageURL'] = upload_file('user', $data['imageURL']);
            } else {
                $data['imageURL'] = $user['imageURL'];
            }

            $rowCount = $this->user->update($data, 'id = :id', ['id' => $id]);



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

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL . '?action=info-user');
                exit();
            }
        }
        header('Location: ' . BASE_URL . '?action=info-user&id=' . $id);
        exit();
    }
}
