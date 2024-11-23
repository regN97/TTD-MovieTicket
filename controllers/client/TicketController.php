<?php

class TicketController
{
    private $movie;
    private $room;
    private $schedule;
    private $seat;

    public function __construct()
    {
        $this->movie = new Movie();
        $this->room = new Room();
        $this->schedule = new Schedule();
        $this->seat = new Seat();
    }
    public function pickingSeat()
    {
        try {
            if(!isset($_POST)){
                throw new Exception("Thiếu tham số 'id'", 99);
            }
            $id = $_POST;
            $movies = $this->movie->find('*', 'id = :id', ['id' => $id['movie_id']]);
            $movieGenre = $this->movie->getMovieGenre($id['movie_id']);
            $movieArtist = $this->movie->getMovieArtist($id['movie_id']);
            $rooms = $this->room->select();
            $schedules = $this->schedule->select();
            $seats = $this->seat->select();

            $seatInRoom = [];

            // Chỉ lấy ra các ghế có room_id trùng với id phòng chiếu
            foreach ($seats as $seat) {
                if ($seat['room_id'] == $id['room_id']) {
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

            header('Location: ' . BASE_URL . '?action=picking-seat');
            exit();
        }
    }
}
