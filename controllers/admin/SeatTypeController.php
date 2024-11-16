<?php 

class SeatTypeController
{
    private $seatType;

    public function __construct()
    {
        $this->seatType = new SeatType();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'seatType/list';
        $title = 'Danh sách các loại ghế';
        $data = $this->seatType->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function create()
    {
        $view = 'seatType/create';
        $title = 'Thêm mới loại ghế';

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $data = $_POST;

            $_SESSION['errors'] = [];
            
            // Validate dữ liệu
            if (empty($data['type']))
            {
                $_SESSION['errors']['type'] = 'Vui lòng chọn loại ghế!';
            }

            if (empty($data['price'])) {
                $_SESSION['errors']['price'] = 'Vui lòng nhập giá tiền!';
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->seatType->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm mới thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thêm mới không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=seatType-create');
        exit();
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $seatType = $this->seatType->find('*', 'id = :id', ['id' => $id]);

            if (empty($seatType)) {
                throw new Exception("Không tìm thấy loại ghế có id = $id!", 98);
            }

            $view = 'seatType/show';
            $title = 'Chi tiết loại ghế';

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=seatType-list');
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

            $seatType = $this->seatType->find('*', 'id = :id', ['id' => $id]);

            if (empty($seatType)) {
                throw new Exception("Không tìm thấy loại ghế có id = $id!", 98);
            }

            $view = 'seatType/update';
            $title = 'Cập nhật loại ghế có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=seatType-list');
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

            $seatType = $this->seatType->find('*', 'id = :id', ['id' => $id]);

            if (empty($seatType)) {
                throw new Exception("Không tìm thấy loại ghế có id = $id!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = 'Vui lòng chọn loại ghế!';
            }

            if (empty($data['price'])) {
                $_SESSION['errors']['price'] = 'Vui lòng nhập giá tiền!';
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->seatType->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Cập nhật không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL_ADMIN . '&action=seatType-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=seatType-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $seatType = $this->seatType->find('*', 'id = :id', ['id' => $id]);

            if (empty($seatType)) {
                throw new Exception("Không tìm thấy loại ghế có id = $id!", 98);
            }

            $rowCount = $this->seatType->delete('id = :id', ['id' => $id]);

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

        header('Location: ' . BASE_URL_ADMIN . '&action=seatType-list');
        exit();
    }
}

?>