<?php 

class UserLoginController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        $view = 'authen/form-login';

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
            if (!empty($user) && $user['role_id'] == 1) {
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL_ADMIN);
                exit();
            }

            if (!empty($user) && $user['role_id'] == 2) {
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL_ADMIN);
                exit();
            }

            if (!empty($user) && $user['role_id'] == 3) {
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
}

?>