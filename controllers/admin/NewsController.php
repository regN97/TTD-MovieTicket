<?php 
class NewsController 
{
    private $news ;
    public function __construct()
    {
        $this -> news = new News();
    }

    // Hiển thị danh sách tin tức 
    public function index()
    {
        $view = 'news/index';
        $title = 'Danh sách tin tức';
        $data = $this->news->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

     // Hiển thị chi tiết theo ID

     public function show()
     {
        try {
            if(!isset($_GET['id']))
            {
             throw new Exception('Thiếu tham số "id"',99);
            }
            $id = $_GET['id'];
            $news = $this ->news -> find('*','news_id= :id',['id' => $id]);
            if(empty($news))
            {
             throw new Exception("Tin tức có ID =$id Không tồn tại!");
            }
                $view ='news/show';
                $title = "Chi tiết sản phẩm có ID = $id";
                require_once PATH_VIEW_ADMIN_MAIN;
                
         } catch (\Throwable $th) {
             $_SESSION['success'] = false;
             $_SESSION['msg'] = $th->getMessage();
             header( 'Location:' . BASE_URL_ADMIN . '&action=news-index');
             exit;
         }
         
     
 
     }

    //Hiển thị form thêm mới tin tức
    public function create()
    {
        $view ='news/create';
        $title='Thêm mới tin tức';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

   
    // Lưu dữ liệu thêm mới
    public function store()
    {
        try {
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                throw new Exception("Yêu cầu phương thức phải là POST!");
            }
            $data = $_POST + $_FILES;
            
            $_SESSION['errors'] = [];

            // Validate dữ liệu 

            if(empty($data['title']) || strlen($data['title']) > 100){
                $_SESSION['errors']['title'] = "Tiêu Đề không được bỏ trống và khônng được quá 100 ký tự!";
            }
            if(empty($data['content'])){
                $_SESSION['errors']['content'] = "Nội dung không được bỏ trống!";
            }
            if($data['image']['size']>0){
                if($data['image']['size']>2*1024*1024){
                    $_SESSION['errors']['image_type'] = 'Trường hình ảnh có dung lượng tối da là 2MB!';
                }
                $fileType =$data['image']['type'] ;
                $allowedTyped = ['image/jpg','image/jpeg','image/png','image/gif'];
                if(!in_array($fileType,$allowedTyped)){
                    $_SESSION['errors']['image_type'] = 'Xin lỗi, chỉ chấp nhận Các loại file JPG, JPEG, PNG, GiF!';

                }
            }
            if(!empty($_SESSION['errors'])){
                $_SESSION['data'] = $data;
                throw new Exception("Dữ liệu lỗi!");
            }
            $rowCount = $this->news->insert($data);
            if($rowCount > 0){
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Thao tác thành công!";
            }else{
                throw new Exception("Thao tác không thành công!");
            }

        }
        catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=news-create');
        exit();  

    

}
    // Hiển thị form cập nhật theo ID
    public function edit()
    {
        try {
            $id = $_GET['id'];

            if(!isset($id)){
                throw new Exception('Thiếu tham số "id', 99);
            }

            $news = $this->news->find('*', 'newS_id = :id', ['id' => $id]);

            if(empty($news)){
                throw new Exception("News có ID = $id không tồn tại!");
            }

            $view = 'news/edit';
            $title = "Cập nhật News có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=news-index');
            exit();  
    }
}

    // Lưu dữ liệu cập nhật theo ID
    public function update()
    {
        try {
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                throw new Exception("Yêu cầu phương thức phải là POST!");
            }

            $id = $_GET['id'];

            if(!isset($id)){
                throw new Exception('Thiếu tham số "id', 99);
            }

            $theater = $this->news->find('*', 'news_id = :id', ['id' => $id]);

            if(empty($theater)){
                throw new Exception("News có ID = $id không tồn tại!");
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if(empty($data['title']) || strlen($data['title']) > 100){
                $_SESSION['errors']['title'] = "Tiêu Đề không được bỏ trống và khônng được quá 100 ký tự!";
            }
            if(empty($data['content'])){
                $_SESSION['errors']['content'] = "Nội dung không được bỏ trống!";
            }
            if($data['image']['size']>0){
                if($data['image']['size']>2*1024*1024){
                    $_SESSION['errors']['image_type'] = 'Trường hình ảnh có dung lượng tối da là 2MB!';
                }
                $fileType =$data['image']['type'] ;
                $allowedTyped = ['image/jpg','image/jpeg','image/png','image/gif'];
                if(!in_array($fileType,$allowedTyped)){
                    $_SESSION['errors']['image_type'] = 'Xin lỗi, chỉ chấp nhận Các loại file JPG, JPEG, PNG, GiF!';

                }
            }
            if(!empty($_SESSION['errors'])){
                $_SESSION['data'] = $data;
                throw new Exception("Dữ liệu lỗi!");
            }

            $data['created_at'] = date('Y-m-d H:i:s');

            $rowCount = $this->news->update($data, 'news_id = :id', ['id' => $id]);

            if($rowCount > 0){
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Thao tác thành công!";
            }else{
                throw new Exception("Thao tác không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage() . ' - Line ' . $th->getLine();

            if($th->getCode() == 99){
                header('Location: ' . BASE_URL_ADMIN . '&action=news-index');
                exit();  
            } 
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=news-edit&id=' . $id);
        exit();  
    }

    // Xoá dữ liệu theo ID
    public function delete()
    {
        try {
           if(!isset($_GET['id']))
           {
            throw new Exception('Thiếu tham số "id"',99);
           }
           $id = $_GET['id'];
           $news = $this ->news -> find('*','news_id= :id',['id' => $id]);
           if(empty($news))
           {
            throw new Exception("Tin tức có ID =$id Không tồn tại!");
           }
           $rowCount = $this->news->delete('news_id= :id',['id' => $id]);
           if($rowCount > 0)
           {
            if(!empty($news['image']) && file_exists(PATH_ASSETS_UPLOADS .$news['image'] ))
            {
                unlink(PATH_ASSETS_UPLOADS .$news['image'] );
            }
            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Thao Tác Thành Công!';
           }
           else{
            throw new Exception('Thao tác KHÔNG thành công');
           }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header(
            'location:' . BASE_URL_ADMIN . '&action=news-index'
        );
    }


}

?>