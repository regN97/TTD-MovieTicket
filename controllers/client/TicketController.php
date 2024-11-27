<?php

class TicketController
{
    private $movie;
    private $room;
    private $schedule;
    private $seat;
    private $seatType;
    private $foodndrink;
    private $user;
    private $ranks;

    public function __construct()
    {
        $this->movie = new Movie();
        $this->room = new Room();
        $this->schedule = new Schedule();
        $this->seat = new Seat();
        $this->seatType = new SeatType();
        $this->foodndrink = new FoodAndDrink();
        $this->user = new User();
        $this->ranks = new Rank();
    }
    public function pickingSeat()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !", 99);
            }

            if (empty($_POST['room_id']) || empty($_POST['schedule_id']) || empty($_POST['movie_id'])) {
                throw new Exception("Vui lòng chọn suất chiếu, phòng chiếu!");
            }

            // movie_id, room_id, schedule_id
            $data = $_POST;

            $movies = $this->movie->find('*', 'id = :id', ['id' => $data['movie_id']]);
            $movieGenre = $this->movie->getMovieGenre($data['movie_id']);
            $movieArtist = $this->movie->getMovieArtist($data['movie_id']);
            $rooms = $this->room->find('*', 'id = :id', ['id' => $data['room_id']]);
            $schedules = $this->schedule->find('*', 'id = :id', ['id' => $data['schedule_id']]);
            $seats = $this->seat->select('*');
            $seatTypes = $this->seatType->select('*');

            $seatInRoom = [];

            // Chỉ lấy ra các ghế có room_id trùng với id phòng chiếu
            foreach ($seats as $seat) {
                if ($seat['room_id'] == $data['room_id']) {
                    $seatInRoom[] = $seat;
                }
            }

            $view = 'movie/picking-seat';
            $title = "Chọn ghế ngồi";
            $description = "Chọn vị trí chỗ ngồi phù hợp với bạn";

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=movies-detail&id=' . $_POST['movie_id']);
            exit();
        }
    }

    public function foodAndDrinkOptions()
    {
        try {


            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức truy cập phải là POST!");
            }

            $data = $_POST;

            $_SESSION['errors'] = [];

            if (
                empty($_POST['schedule_id'])
                || empty($_POST['room_id'])
                || empty($_POST['seats'])
                || empty($_POST['total_price'])
                || empty($_POST['movie_id'])
            ) {
                throw new Exception("Vui lòng chọn ghế trước khi chọn bắp & nước!");
            } else {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Chọn bắp & nước hoặc tiếp tục";
            }



            $movies = $this->movie->find('*', 'id = :id', ['id' => $data['movie_id']]);
            $schedules = $this->schedule->find('*', 'id = :id', ['id' => $data['schedule_id']]);
            $rooms = $this->room->find('*', 'id = :id', ['id' => $data['room_id']]);
            $foodndrinks = $this->foodndrink->select();



            $view = 'ticket/foodndrink';
            $title = "Bắp & Nước";
            $description = "Chọn combo bắp nước cho mình và người thân";

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=movies-detail&id=' . $data['movie_id']);
            exit();
        }
    }

    public function orderDetail()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức truy cập phải là POST!");
            }

            $data = $_POST;
            $id = $_SESSION['user']['id'];
            $user = $this->user->getID($id);
            $ranks = $this->ranks->select();

            $movies = $this->movie->find('*', 'id = :id', ['id' => $data['movie_id']]);
            $schedules = $this->schedule->find('*', 'id = :id', ['id' => $data['schedule_id']]);
            $rooms = $this->room->find('*', 'id = :id', ['id' => $data['room_id']]);
            $foodndrinks = $this->foodndrink->select();
            $seatTypes = $this->seatType->select('*');

            $quantitySeats = str_word_count($data['seats']);

            $view = 'ticket/order-detail';
            $title = "Chi tiết vé";
            $description = "Kiểm tra lại thông tin trên vé của mình trước khi thanh toán";

            require_once PATH_VIEW_CLIENT_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=movies-detail&id=' . $data['movie_id']);
            exit();
        }
    }

    public function orderFinal()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức truy cập phải là POST!");
            }

            $data = $_POST;

            debug($data);

            $_SESSION['errors'] = [];

            if (empty($data['paymentMethod'])) {
                $_SESSION['errors']['paymentMethod'] = "Vui lòng chọn phương thức thanh toán";

                $id = $_SESSION['user']['id'];
                $user = $this->user->getID($id);
                $ranks = $this->ranks->select();

                $movies = $this->movie->find('*', 'id = :id', ['id' => $data['movie_id']]);
                $schedules = $this->schedule->find('*', 'id = :id', ['id' => $data['schedule_id']]);
                $rooms = $this->room->find('*', 'id = :id', ['id' => $data['room_id']]);
                $foodndrinks = $this->foodndrink->select();
                $seatTypes = $this->seatType->select('*');

                $quantitySeats = str_word_count($data['seats']);

                // $data['beta_quantity'] = 0;

                $view = 'ticket/order-detail';
                $title = "Chi tiết vé";
                $description = "Kiểm tra lại thông tin trên vé của mình trước khi thanh toán";

                require_once PATH_VIEW_CLIENT_MAIN;
            } else {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Tạo vé thành công!";

                $view = 'ticket/order-final';
                $title = "Thanh toán";
                $description = "Kiểm tra lại thông tin trên vé của mình trước khi thanh toán";

                require_once PATH_VIEW_CLIENT_MAIN;
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . '?action=movies-detail&id=' . $data['movie_id']);
            exit();
        }
    }
}
