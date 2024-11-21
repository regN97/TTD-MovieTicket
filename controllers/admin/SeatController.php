<?php

class SeatController
{
    private $seat;

    private $room;

    private $seatType;

    public function __construct()
    {
        $this->seat = new Seat();
        $this->room = new Room();
        $this->seatType = new SeatType();
    }

    public function list()
    {
        unset($_SESSION['data']);

        $view = 'seats/list';
        $title = 'Danh sách ghế';
        $data = $this->seat->getAll();

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $seats = $this->seat->getById($id);

            if (empty($seats)) {
                throw new Exception("Ghế có id = $id không tồn tại!", 98);
            }

            $view = 'seats/show';
            $title = 'Chi tiết ghế có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('location: ' . BASE_URL_ADMIN . '&action=seats-list');
            exit();
        }
    }

    public function create()
    {
        $view = 'seats/create';
        $title = 'Thêm mới ghế';

        $rooms = $this->room->select();
        $roomPluck = array_column($rooms, 'name', 'id');

        $seatTypes = $this->seatType->select();
        $seatTypePluck = array_column($seatTypes, 'type', 'id');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];
            $rowValidate = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            $columnValidate = [1, 2, 3, 4, 5, 6, 7, 8, 9];

            // Validate dữ liệu
            if (empty($data['seat_row'])) {
                $_SESSION['errors']['seat_row'] = 'Hãy nhập hàng ghế!';
            } else if (!empty($data['seat_row']) && !in_array($data['seat_row'], $rowValidate)) {
                $_SESSION['errors']['seat_row'] = 'Hãy chọn 1 hàng ghế! (A, B, C, D, E, F, G, H)';
            }

            if (empty($data['seat_column'])) {
                $_SESSION['errors']['seat_column'] = 'Hãy nhập số cột!';
            } else if (!empty($data['seat_column']) && !in_array($data['seat_column'], $columnValidate)) {
                $_SESSION['errors']['seat_column'] = 'Hãy chọn 1 số cột! (1, 2, 3, 4, 5, 6, 7, 8, 9)';
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->seat->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm ghế thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thêm ghế không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=seats-create');
        exit();
    }

    public function updatePage()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $seat = $this->seat->getById($id);

            if (empty($seat)) {
                throw new Exception("Không tìm thấy ghế có ID = $id!", 98);
            }

            $view = 'seats/update';
            $title = 'Cập nhật ghế có ID = ' . $id;

            $rooms = $this->room->select();
            $roomPluck = array_column($rooms, 'name', 'id');

            $seatTypes = $this->seatType->select();
            $seatTypePluck = array_column($seatTypes, 'type', 'id');

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=seats-list');
            exit();
        }
    }

    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $seat = $this->seat->getById($id);

            if (empty($seat)) {
                throw new Exception("Không tìm thấy phòng chiếu có id = $id!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];
            $rowValidate = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            $columnValidate = [1, 2, 3, 4, 5, 6, 7, 8, 9];

            // Validate dữ liệu
            if (empty($data['seat_row'])) {
                $_SESSION['errors']['seat_row'] = 'Hãy nhập hàng ghế!';
            } else if (!empty($data['seat_row']) && !in_array($data['seat_row'], $rowValidate)) {
                $_SESSION['errors']['seat_row'] = 'Hãy chọn 1 hàng ghế! (A, B, C, D, E, F, G, H)';
            }

            if (empty($data['seat_column'])) {
                $_SESSION['errors']['seat_column'] = 'Hãy nhập số cột!';
            } else if (!empty($data['seat_column']) && !in_array($data['seat_column'], $columnValidate)) {
                $_SESSION['errors']['seat_column'] = 'Hãy chọn 1 số cột! (1, 2, 3, 4, 5, 6, 7, 8, 9)';
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->seat->update($data, 'id = :id', ['id' => $id]);

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
                header('Location: ' . BASE_URL_ADMIN . '&action=seats-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=seats-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $seat = $this->seat->find('*', 'id = :id', ['id' => $id]);

            if (empty($seat)) {
                throw new Exception("Không tìm thấy ghế có id = $id!", 98);
            }

            $rowCount = $this->seat->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa ghế thành công!';
            } else {
                throw new Exception("Xóa ghế không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=seats-list');
        exit();
    }
}
