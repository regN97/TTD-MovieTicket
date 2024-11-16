<?php

class RoleController
{
    private $role;

    public function __construct()
    {
        $this->role = new Role();   
    }

    // Hiển thị danh sách role
    public function list()
    {
        unset($_SESSION['data']);

        $view = 'roles/list';
        $title = 'Danh sách vai trò';
        $data = $this->role->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Xem chi tiết role
    public function show()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $role = $this->role->find('*', 'id = :id', ['id' => $id]);

            if (empty($role)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'roles/show';
            $title = "Chi tiết vai trò";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=roles-list');
            exit();
        }
    }

    // Hiển thị form thêm mới
    public function create(){
        $view = 'roles/create';
        $title = 'Thêm mới role';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Lưu giữ liệu thêm mới
    public function store()
    {
        try {
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                throw new Exception(('Yêu cầu phương thức phải là POST !'));
            }

            $data = $_POST + $_FILES;
            
            $_SESSION['errors'] = [];

            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên không được bỏ trống và không được vượt quá 50 ký tự!";
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Mô tả không được bỏ trống!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->role->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=roles-create');
        exit();
    }

    // Hiển thị form cập nhật theo ID
    public function updatePage(){
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $role = $this->role->find('*', 'id = :id', ['id' => $id]);

            if (empty($role)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'roles/update';
            $title = "Cập nhật vai trò có id = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=roles-create');
            exit();
        }        
    }

    // Lưu giữ liệu cập nhật theo ID
    public function update(){
        try {
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                throw new Exception(('Yêu cầu phương thức phải là POST !'));
            }

            $id = $_GET['id'];
            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $role = $this->role->find('*', 'id = :id', ['id' => $id]);

            if (empty($role)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }
            
            $data = $_POST;
            
            $_SESSION['errors'] = [];

            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên không được bỏ trống và không được vượt quá 50 ký tự!";
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Mô tả không được bỏ trống!";
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->role->update($data, 'id = :id', ['id' => $id]);
            
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
                header('Location: ' . BASE_URL_ADMIN . '&action=roles-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=roles-updatePage&id=' . $id);
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

            $role = $this->role->find('*', 'id = :id', ['id' => $id]);

            if (empty($role)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $rowCount = $this->role->delete('id = :id', ['id' => $id]);

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
        
        header('Location: ' . BASE_URL_ADMIN . '&action=roles-list');
        exit();
    }
}
?>
