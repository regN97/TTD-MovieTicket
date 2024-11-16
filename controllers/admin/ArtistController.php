<?php

class ArtistController
{
    private $artist;

    public function __construct()
    {
        $this->artist = new Artist();   
    }

    // Hiển thị danh sách Artists
    public function list()
    {
        unset($_SESSION['data']);

        $view = 'artists/list';
        $title = 'Danh sách Artists';
        $data = $this->artist->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Xem chi tiết Artists
    public function show()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $artist = $this->artist->find('*', 'id = :id', ['id' => $id]);

            if (empty($artist)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'artists/show';
            $title = "Chi tiết Artists";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=artists-list');
            exit();
        }
    }

    // Hiển thị form thêm mới
    public function create(){
        $view = 'artists/create';
        $title = 'Thêm mới Artists';

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
            if (empty($data['roles'])) {
                $_SESSION['errors']['roles'] = "Hãy chọn vai trò!";
            }else{
                $validateRoles = ['Đạo diễn', 'Diễn viên'];
                if(!in_array($data['roles'], $validateRoles)){                    
                    $_SESSION['errors']['validateRoles'] = "Hãy chọn 1 trong 2 vai trò!";
                }
            }
            if (empty($data['bio'])) {
                $_SESSION['errors']['bio'] = "Thông tin không được bỏ trống!";
            }
            if (empty($data['country'])) {
                $_SESSION['errors']['country'] = "Quê quán không được bỏ trống!";
            }
            if($data['imageURL']['size'] > 0){
                if($data['imageURL']['size'] > 2*1024*1024){
                    $_SESSION['errors']['data_size'] = 'Hình ảnh có dung lượng tối đa 2MB!';
                }

                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                
                if(!in_array($fileType, $allowedTypes)){
                    $_SESSION['errors']['imageURL_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, FPEG, PNG, GIF!';
                }
            }else{
                $_SESSION['errors']['imageURL'] = "Hình ảnh không được bỏ trống!";
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            if($data['imageURL']['size'] > 0){
                $data['imageURL'] = upload_file('artists', $data['imageURL']);
            }else{
                $data['imageURL'] = null;
            }

            $rowCount = $this->artist->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=artists-create');
        exit();
    }

    // Hiển thị form cập nhật theo ID
    public function updatePage(){
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $artist = $this->artist->find('*', 'id = :id', ['id' => $id]);

            if (empty($artist)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'artists/update';
            $title = "Cập nhật Artists có id = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=artists-create');
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

            $artist = $this->artist->find('*', 'id = :id', ['id' => $id]);

            if (empty($artist)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }
            
            $data = $_POST + $_FILES;
            
            $_SESSION['errors'] = [];

            // Validate
            if (empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên không được bỏ trống và không được vượt quá 50 ký tự!";
            }
            if (empty($data['roles'])) {
                $_SESSION['errors']['roles'] = "Hãy chọn vai trò!";
            }else{
                $validateRoles = ['Đạo diễn', 'Diễn viên'];
                if(!in_array($data['roles'], $validateRoles)){                    
                    $_SESSION['errors']['validateRoles'] = "Hãy chọn 1 trong 2 vai trò!";
                }
            }
            if (empty($data['bio'])) {
                $_SESSION['errors']['bio'] = "Thông tin không được bỏ trống!";
            }
            if (empty($data['country'])) {
                $_SESSION['errors']['country'] = "Quê quán không được bỏ trống!";
            }
            if($data['imageURL']['size'] > 0){
                if($data['imageURL']['size'] > 2*1024*1024){
                    $_SESSION['errors']['data_size'] = 'Hình ảnh có dung lượng tối đa 2MB!';
                }

                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                
                if(!in_array($fileType, $allowedTypes)){
                    $_SESSION['errors']['imageURL_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, FPEG, PNG, GIF!';
                }
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Vui lòng kiểm tra lại!");
            }

            if($data['imageURL']['size'] > 0){
                $data['imageURL'] = upload_file('artists', $data['imageURL']);
            }else{
                $data['imageURL'] = $artist['imageURL'];
            }

            $rowCount = $this->artist->update($data, 'id = :id', ['id' => $id]);

            // Kiểm tra insert có thành công hay không
            if ($rowCount > 0) {
                if(
                    $_FILES['imageURL']['size']
                    && !empty($artist['imageURL'])
                    && file_exists(PATH_ASSETS_UPLOADS . $artist['imageURL'])
                ){
                    unlink(PATH_ASSETS_UPLOADS . $artist['imageURL']);
                }

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
                header('Location: ' . BASE_URL_ADMIN . '&action=artists-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=artists-updatePage&id=' . $id);
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

            $artist = $this->artist->find('*', 'id = :id', ['id' => $id]);

            if (empty($artist)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $rowCount = $this->artist->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                if(!empty($artist['imageURL']) && file_exists(BASE_ASSETS_CLIENT_IMAGE . $artist['imageURL'])){
                    unlink(BASE_ASSETS_CLIENT_IMAGE . $artist['imageURL']);
                }
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa thành công!';
            } else {
                throw new Exception("Xóa không thành công!");                
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        
        header('Location: ' . BASE_URL_ADMIN . '&action=artists-list');
        exit();
    }
}
?>
