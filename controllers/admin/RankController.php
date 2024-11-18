<?php

class RankController
{
    private $rank;

    public function __construct()
    {
        $this->rank = new Rank();   
    }

    // Hiển thị danh sách thứ hạng
    public function list()
    {
        unset($_SESSION['data']);

        $view = 'ranks/list';
        $title = 'Danh sách thứ hạng';
        $data = $this->rank->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Xem chi tiết thứ hạng
    public function show()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $rank = $this->rank->find('*', 'id = :id', ['id' => $id]);

            if (empty($rank)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'ranks/show';
            $title = "Chi tiết thứ hạng có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=ranks-list');
            exit();
        }
    }

    // Hiển thị form thêm mới
    public function create(){
        $view = 'ranks/create';
        $title = 'Thêm mới thứ hạng';

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
                $_SESSION['errors']['name'] = "Tên thứ hạng không được bỏ trống và không được vượt quá 50 ký tự!";
            }

            if (empty($data['benefits'])) {
                $_SESSION['errors']['benefits'] = "Mô tả lợi ích không được bỏ trống!";
            }

            if (empty($data['level']) || $data['level'] < 0) {
                $_SESSION['errors']['level'] = "Mốc điểm không được bỏ trống và phải lớn hơn 0!";
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->rank->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=ranks-create');
        exit();
    }

    // Hiển thị form cập nhật theo ID
    public function updatePage(){
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $rank = $this->rank->find('*', 'id = :id', ['id' => $id]);

            if (empty($rank)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'ranks/update';
            $title = "Cập nhật thứ hạng có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=ranks-create');
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

            $rank = $this->rank->find('*', 'id = :id', ['id' => $id]);

            if (empty($rank)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }
            
            $data = $_POST;
            
            $_SESSION['errors'] = [];

            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên thứ hạng không được bỏ trống và không được vượt quá 50 ký tự!";
            }

            if (empty($data['benefits'])) {
                $_SESSION['errors']['benefits'] = "Mô tả lợi ích không được bỏ trống!";
            }

            if (empty($data['level']) || $data['level'] < 0) {
                $_SESSION['errors']['level'] = "Mốc điểm không được bỏ trống và phải lớn hơn 0!";
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            $rowCount = $this->rank->update($data, 'id = :id', ['id' => $id]);

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
                header('Location: ' . BASE_URL_ADMIN . '&action=ranks-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=ranks-updatePage&id=' . $id);
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

            $rank = $this->rank->find('*', 'id = :id', ['id' => $id]);

            if (empty($rank)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $rowCount = $this->rank->delete('id = :id', ['id' => $id]);

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
        
        header('Location: ' . BASE_URL_ADMIN . '&action=ranks-list');
        exit();
    }
}
?>
