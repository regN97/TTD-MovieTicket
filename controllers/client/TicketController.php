<?php

class TicketController
{
    private $movie;
    private $room;
    private $schedule;
    private $seat;
    private $seatType;
    private $foodndrink;

    public function __construct()
    {
        $this->movie = new Movie();
        $this->room = new Room();
        $this->schedule = new Schedule();
        $this->seat = new Seat();
        $this->seatType = new SeatType();
        $this->foodndrink = new FoodAndDrink();
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

            if (
                empty($_POST['schedule_id'])
                || empty($_POST['room_id'])
                || empty($_POST['seats'])
                || empty($_POST['total_price'])
                || empty($_POST['movie_id'])
            ) {
                throw new Exception("Vui lòng chọn ghế trước khi chọn bắp & nước!");
            }

            $data = $_POST;

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

            header('Location: ' . BASE_URL . '?action=movies-detail&id=' . $_POST['movie_id']);
            exit();
        }
    }
}
