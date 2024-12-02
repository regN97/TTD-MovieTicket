<?php
class UserController
{

    private $user;

    private $rank;

    private $role;


    public function __construct()
    {
        $this->user = new User();
        $this->rank = new Rank();
        $this->role = new Role();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'users/list';
        $title = 'Danh sách người dùng';
        // Số sản phẩm trên mỗi trang
        $perPage = 5;

        // Xác định trang hiện tại (mặc định là 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1

        $data = $this->user->getAll($page, $perPage, '*');

        $totalUser = $this->user->count();
        $totalPages = ceil($totalUser / $perPage);

        if ($page > $totalPages) {
            // Chuyển hướng đến trang cuối cùng
            header('Location:' . BASE_URL_ADMIN . '&action=users-list' . '&page=' . $totalPages);
            exit();
        }

        require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $user = $this->user->getID($id);

            if (empty($user)) {
                throw new Exception("Người dùng có ID = $id không tồn tại!", 98);
            }

            $view = 'users/show';
            $title = 'Chi tiết người dùng có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=users-list');
            exit();
        }
    }

    public function updatePage()
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

            $view = 'users/update';
            $title = "Cập nhật người dùng có ID = $id";

            $ranks = $this->rank->select();
            $rankPluck = array_column($ranks, 'name', 'id');

            $roles = $this->role->select();
            $rolePluck = array_column($roles, 'name', 'id');

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=users-list');
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

            $user = $this->user->find('*', 'id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("Người dùng có ID = $id không tồn tại!");
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate dữ liệu

            if (empty($data['role_id'])) {
                $_SESSION['errors']['role_id'] = "Vui lòng chọn vai trò!";
            }


            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->user->updateUser($data, 'id = :id', ['id' => $id]);


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

            if ($th->getCode() == 99) {
                header('Location: ' . BASE_URL_ADMIN . '&action=users-list');
                exit();
            }
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=users-updatePage&id=' . $id);
        exit();
    }



    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("Không tìm thấy người dùng có id = $id!", 98);
            }

            $rowCount = $this->user->delete('id = :id', ['id' => $id]);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=users-list');
        exit();
    }
}
