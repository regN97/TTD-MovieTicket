<?php

class RoomController
{
    private $room;

    public function __construct()
    {
        $this->room = new Room();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'rooms/list';
        $title = 'Danh sách phòng';
        $data = $this->room->select('*');

        require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function create()
    {
        $view = 'rooms/create';
        $title = 'Thêm mới phòng';

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
            if (empty($data['name'] || strlen($data['name']) > 50)) {
                $_SESSION['errors']['name'] = 'Tên phòng chiếu bắt buộc và không quá 50 ký tự!';
            }

            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = 'Vui lòng chọn loại phòng chiếu!';
            } else {
                $validateRoomType = ['IMAX', '3D', 'Regular'];
                if (!in_array($data['type'], $validateRoomType)) {
                    $_SESSION['errors']['validateRoomType'] = 'Hãy chọn 1 loại phòng!';
                }
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = 'Vui lòng nhập mô tả!';
            }

            if (empty($data['total_seats'])) {
                $_SESSION['errors']['total_seats'] = 'Vui lòng nhập số ghế!';
            } else if (is_numeric($data['total_seats']) && $data['total_seats'] > 59 && $data['total_seats'] <= 0) {
                $_SESSION['errors']['total_seats'] = 'Số ghế phải lớn hơn 0 và nhỏ hơn 60!';
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->room->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm phòng chiếu thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thêm phòng chiếu không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=rooms-create');
        exit();
    }
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $room = $this->room->find('*', 'id = :id', ['id' => $id]);

            if (empty($room)) {
                throw new Exception("Không tìm thấy phòng chiếu có id = $id!", 98);
            }

            $view = 'rooms/show';
            $title = 'Chi tiết phòng chiếu';

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=rooms-list');
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

            $room = $this->room->find('*', 'id = :id', ['id' => $id]);

            if (empty($room)) {
                throw new Exception("Không tìm thấy phòng chiếu có id = $id!", 98);
            }

            $view = 'rooms/update';
            $title = 'Cập nhật phòng chiếu có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=rooms-list');
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

            $room = $this->room->find('*', 'id = :id', ['id' => $id]);

            if (empty($room)) {
                throw new Exception("Không tìm thấy phòng chiếu có id = $id!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            // Validate dữ liệu
            if (empty($data['name'] || strlen($data['name']) > 50)) {
                $_SESSION['errors']['name'] = 'Tên phòng chiếu bắt buộc và không quá 50 ký tự!';
            }

            if (empty($data['type'])) {
                $_SESSION['errors']['type'] = 'Vui lòng chọn loại phòng chiếu!';
            } else {
                $validateRoomType = ['IMAX', '3D', 'Regular'];
                if (!in_array($data['type'], $validateRoomType)) {
                    $_SESSION['errors']['validateRoomType'] = 'Hãy chọn 1 loại phòng!';
                }
            }

            if (empty($data['description'])) {
                $_SESSION['errors']['description'] = 'Vui lòng nhập mô tả!';
            }

            if (empty($data['total_seats'])) {
                $_SESSION['errors']['total_seats'] = 'Vui lòng nhập số ghế!';
            } else if (is_numeric($data['total_seats']) && $data['total_seats'] > 59 && $data['total_seats'] <= 0) {
                $_SESSION['errors']['total_seats'] = 'Số ghế phải lớn hơn 0 và nhỏ hơn 60!';
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->room->update($data, 'id = :id', ['id' => $id]);

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
                header('Location: ' . BASE_URL_ADMIN . '&action=rooms-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=rooms-updatePage&id=' . $id);
        exit();
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $room = $this->room->find('*', 'id = :id', ['id' => $id]);

            if (empty($room)) {
                throw new Exception("Không tìm thấy phòng chiếu có id = $id!", 98);
            }

            $rowCount = $this->room->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa phòng chiếu thành công!';
            } else {
                throw new Exception("Xóa phòng chiếu không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=rooms-list');
        exit();
    }
}
