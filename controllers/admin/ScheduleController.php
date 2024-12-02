<?php

class ScheduleController
{
    private $schedule;

    private $room;

    private $movie;

    public function __construct()
    {
        $this->schedule = new Schedule();
        $this->room = new Room();
        $this->movie = new Movie();
    }

    public function list()
    {
        // 23-11-2024 - Đã sửa được lỗi nếu không có bản ghi thì bị "Too many redirect"
        try {
            unset($_SESSION['data']);

            $view = 'schedules/list';
            $title = 'Danh sách lịch chiếu phim';
            // Số sản phẩm trên mỗi trang
            $perPage = 5;

            // Xác định trang hiện tại (mặc định là 1)
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = max($page, 1); // Không cho phép giá trị nhỏ hơn 1

            $data = $this->schedule->getAll($page, $perPage, '*');

            if (empty($data)) {
                throw new Exception("Không có bản ghi nào được tìm thấy!");
            }

            $totalSchedules = $this->schedule->count();
            $totalPages = ceil($totalSchedules / $perPage);

            if ($page > $totalPages && !empty($data)) {
                // Chuyển hướng đến trang cuối cùng
                header('Location:' . BASE_URL_ADMIN . '&action=schedules-list' . '&page=' . $totalPages);
                exit();
            }
        } catch (\Throwable $th) {
            $_SESSION['errors'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }


        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $schedule = $this->schedule->getById($id);

            if (empty($schedule)) {
                throw new Exception("Lịch chiếu phim có ID = $id không tồn tại!", 98);
            }

            $view = 'schedules/show';
            $title = 'Chi tiết lịch chiếu phim có ID = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['errors'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('location: ' . BASE_URL_ADMIN . '&action=schedules-list');
            exit();
        }
    }

    public function create()
    {
        $view = 'schedules/create';
        $title = 'Thêm lịch chiếu phim';

        $room = $this->room->select();
        $roomPluck = array_column($room, 'name', 'id');

        $movie = $this->movie->select();
        $moviePluck = array_column($movie, 'name', 'id');

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

            // Set timezone mặc định về việt nam
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $currentTime = date('m-d H:i');

            // Validate dữ liệu
            if (empty($data['start_at'])) {
                $_SESSION['errors']['start_at'] = "Hãy nhập thời gian bắt đầu!";
            }

            // Ngăn không cho thêm lịch chiếu quá giờ hiện tại
            if (date_format(date_create($data['start_at']), 'm-d H:i') < $currentTime) {
                $_SESSION['errors']['start_at'] = "Thời gian bắt đầu phải lớn hơn thời gian hiện tại!";
            }

            if (empty($data['end_at'])) {
                $_SESSION['errors']['end_at'] = "Hãy nhập thời gian kết thúc!";
            }

            if (date_format(date_create($data['end_at']), 'm-d H:i') < date_format(date_create($data['start_at']), 'm-d H:i')) {
                $_SESSION['errors']['start_at'] = "Thời gian kết thúc phải lớn hơn thời gian bắt đầu";
            }

            // Giải quyết không cho nhập lịch chiếu trùng lặp
            $schedule = $this->schedule->find('*', 'start_at = :start_at AND room_id = :room_id', ['start_at' => $data['start_at'], 'room_id' => $data['room_id']]);

            if (!empty($schedule)) {
                $_SESSION['errors']['start_at'] = "Lịch chiếu phim này đã tồn tại ở phòng này, vui lòng chọn thời gian khác";
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->schedule->insert($data);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm lịch chiếu phim thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Thêm lịch chiếu phim không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('location: ' . BASE_URL_ADMIN . '&action=schedules-create');
        exit();
    }

    public function updatePage()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $schedule = $this->schedule->getById($id);

            if (empty($schedule)) {
                throw new Exception("Không tìm thấy lịch chiếu có ID = $id!", 98);
            }

            $view = 'schedules/update';
            $title = 'Cập nhật lịch chiếu phim có ID = ' . $id;

            $room = $this->room->select();
            $roomPluck = array_column($room, 'name', 'id');

            $movie = $this->movie->select();
            $moviePluck = array_column($movie, 'name', 'id');

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=schedules-list');
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

            $schedule = $this->schedule->getById($id);

            if (empty($schedule)) {
                throw new Exception("Không tìm thấy phòng chiếu có id = $id!", 98);
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            // Set timezone mặc định về việt nam
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $currentTime = date('m-d H:i');

            // Validate dữ liệu
            if (empty($data['start_at'])) {
                $_SESSION['errors']['start_at'] = "Hãy nhập thời gian bắt đầu!";
            }

            // Ngăn không cho thêm lịch chiếu quá giờ hiện tại
            if (date_format(date_create($data['start_at']), 'm-d H:i') < $currentTime) {
                $_SESSION['errors']['start_at'] = "Thời gian bắt đầu phải lớn hơn thời gian hiện tại!";
            }

            if (empty($data['end_at'])) {
                $_SESSION['errors']['end_at'] = "Hãy nhập thời gian kết thúc!";
            }

            if (date_format(date_create($data['end_at']), 'm-d H:i') < date_format(date_create($data['start_at']), 'm-d H:i')) {
                $_SESSION['errors']['start_at'] = "Thời gian kết thúc phải lớn hơn thời gian bắt đầu";
            }

            // Giải quyết không cho nhập lịch chiếu trùng lặp
            $schedule = $this->schedule->find('*', 'start_at = :start_at', ['start_at' => $data['start_at']]);

            if (!empty($schedule) && $schedule['movie_id'] == $data['movie_id'] && $schedule['room_id'] == $data['room_id']) {
                $_SESSION['errors']['start_at'] = "Lịch chiếu phim này đã tồn tại, vui lòng chọn thời gian khác";
            }
            // End validate

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Có lỗi xảy ra, vui lòng kiểm tra lại!");
            }

            $rowCount = $this->schedule->update($data, 'id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Update lịch chiếu phim thành công!';
                unset($_SESSION['data']);
            } else {
                throw new Exception("Update lịch chiếu phim không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99 || $th->getCode() == 98) {
                header('Location: ' . BASE_URL_ADMIN . '&action=schedules-list');
                exit();
            }
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=schedules-updatePage&id=' . $id);
        exit();
    }

    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("Thiếu tham số 'id'", 99);
            }

            $id = $_GET['id'];

            $schedule = $this->schedule->find('*', 'id = :id', ['id' => $id]);

            if (empty($schedule)) {
                throw new Exception("Không tìm thấy lịch chiếu có id = $id!", 98);
            }

            $rowCount = $this->schedule->delete('id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Xóa lịch chiếu thành công!';
            } else {
                throw new Exception("Xóa lịch chiếu không thành công!");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=schedules-list');
        exit();
    }
}
