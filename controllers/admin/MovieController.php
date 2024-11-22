<?php

class MovieController
{
    private $movie;

    public function __construct()
    {
        $this->movie = new Movie();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'movies/list';
        $title = 'Danh sách phim';

        // Số sản phẩm trên mỗi trang
        $perPage = 5;

         // Xác định trang hiện tại (mặc định là 1)
         $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
         $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1

         $data = $this->movie->paginate($page, $perPage, '*');

         $totalMovie = $this->movie->count();
        $totalPages = ceil($totalMovie / $perPage);

        if ($page > $totalPages) {
            // Chuyển hướng đến trang cuối cùng
            header('Location:'. BASE_URL_ADMIN .'&action=movies-list'.'&page=' . $totalPages);
            exit();
        }

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create()
    {
        $view = 'movies/create';
        $title = 'Thêm mới phim';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['name'])) {
                $_SESSION['errors']['name'] = 'Tên phim không được để trống';
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Vui lòng nhập mô tả!";
            }

            if (empty($data['duration'])) {
                $_SESSION['errors']['duration'] = "Vui lòng nhập thời lượng phim!";
            }

            if (empty($data['release_date'])) {
                $_SESSION['errors']['release_date'] = "Vui lòng nhập ngày công chiếu!";
            }

            if (empty($data['language'])) {
                $_SESSION['errors']['language'] = "Vui lòng nhập ngôn ngữ!";
            }

            if ($data['imageURL']['size'] > 0) {

                if ($data['imageURL']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['errors']['image_size'] = "Trường ảnh bìa có dung lượng tối đa 2MB";
                }

                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];
                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['errors']['image_type'] = "Xin lỗi, chỉ chấp nhận các thể loại file JPG, JPEG, PNG.";
                }
            }

            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = "Vui lòng nhập phân loại phim!";
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            if ($data['imageURL']['size'] > 0) {
                $data['imageURL'] = upload_file('movies', $data['imageURL']);
            } else {
                $data['imageURL'] = null;
            }

            $rowCount = $this->movie->insert($data);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=movies-create');
        exit();
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movie = $this->movie->find('*', 'id = :id', ['id' => $id]);

            if (empty($movie)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'movies/show';
            $title = 'Chi tiết phim có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=movies-list');
            exit();
        }
    }

    public function updatePage()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movie = $this->movie->find('*', 'id = :id', ['id' => $id]);

            if (empty($movie)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!");
            }

            $view = 'movies/update';
            $title = "Cập nhật phim có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=movies-list');
            exit();
        }
    }

    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $movie = $this->movie->find('*', 'id = :id', ['id' => $id]);

            if (empty($movie)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['name'])) {
                $_SESSION['errors']['name'] = 'Tên phim không được để trống';
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = "Vui lòng nhập mô tả!";
            }

            if (empty($data['duration'])) {
                $_SESSION['errors']['duration'] = "Vui lòng nhập thời lượng phim!";
            }

            if (empty($data['release_date'])) {
                $_SESSION['errors']['release_date'] = "Vui lòng nhập ngày công chiếu!";
            }

            if (empty($data['language'])) {
                $_SESSION['errors']['language'] = "Vui lòng nhập ngôn ngữ!";
            }

            if ($data['imageURL']['size'] > 0) {

                if ($data['imageURL']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['errors']['image_size'] = "Trường ảnh bìa có dung lượng tối đa 2MB";
                }

                $fileType = $data['imageURL']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];
                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['errors']['image_type'] = "Xin lỗi, chỉ chấp nhận các thể loại file JPG, JPEG, PNG.";
                }
            }

            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = "Vui lòng nhập phân loại phim!";
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            if ($data['imageURL']['size'] > 0) {
                $data['imageURL'] = upload_file('movies', $data['imageURL']);
            } else {
                $data['imageURL'] = $movie['imageURL'];
            }

            $rowCount = $this->movie->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {

                if ($_FILES['imageURL']['size'] > 0 && !empty($movie['imageURL']) && file_exists(PATH_ASSETS_UPLOADS . $movie['imageURL'])) {
                    unlink(PATH_ASSETS_UPLOADS . $movie['imageURL']);
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
                header('Location: ' . BASE_URL_ADMIN . '&action=movies-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=movies-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            $id = $_GET['id'];

            if (!isset($id)) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $movie = $this->movie->find('*', 'id = :id', ['id' => $id]);

            if (empty($movie)) {
                throw new Exception("ID không tồn tại, vui lòng kiểm tra lại!", 98);
            }

            $rowCount = $this->movie->delete('id = :id', ['id' => $id]);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=movies-list');
        exit();
    }
}
