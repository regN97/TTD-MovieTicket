<?php 
class NewPageController {

    private $news;

    public function __construct()
    {
        $this->news = new News();
    }

    public function list(){
        $view = "news/page-news";
        $title =" Tin Tức Nổi Bật";
        $description="Danh sách tin tức nổi bật về các chương trình ưu đãi" ;

        $data =$this->news->select('*');

        require_once PATH_VIEW_CLIENT_MAIN;
    }

    public function show()
    {
    try {
        if (!isset($_GET['id'])) {
            throw new Exception('Thiếu tham số "id"', 99);
        }

        $id = $_GET['id'];

        $news = $this->news->getID($id);

        if (empty($news)) {
            throw new Exception("Tin tức không tồn tại!");
        }
        $view = 'news/show-news';
        $title =$news['n_title'];
        $description = "Nội dung tin tức ".$news['n_title'];
        require_once PATH_VIEW_CLIENT_MAIN;

    } catch (\Throwable $th) {
        $_SESSION['success'] = false;
        $_SESSION['msg'] = $th->getMessage();

        header('Location:' . BASE_URL . '&action=page-news');
        exit;
    }
}

}

?>