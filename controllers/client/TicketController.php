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
    private $ticket;
    private $order;
    private $orderFnd;
    private $orderDetail;

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
        $this->ticket = new Ticket();
        $this->order = new Order();
        $this->orderFnd = new OrderFnd();
        $this->orderDetail = new OrderDetail();
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
            // debug($data);

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
            // debug($data);
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

            // debug($data);

            $_SESSION['errors'] = [];
            $_SESSION['message'] = [];

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

                $data['total_price'] = $data['priceBeforeDiscount'];

                $data['seat_id'] = $data['seat_id'];

                // phòng ngừa xảy ra lỗi tại trang order-detail khi isset($_SESSION['errors']) = true
                if (!isset($data['sweet_quantity'])) {
                    $data['sweet_quantity'] = 0;
                }
                if (!isset($data['beta_quantity'])) {
                    $data['beta_quantity'] = 0;
                }
                if (!isset($data['family_quantity'])) {
                    $data['family_quantity'] = 0;
                }

                $view = 'ticket/order-detail';
                $title = "Chi tiết vé";
                $description = "Kiểm tra lại thông tin trên vé của mình trước khi thanh toán";

                require_once PATH_VIEW_CLIENT_MAIN;
            } else {
                //* Tạo bản ghi cho table tickets
                //! Tắt tạm để làm tiếp, nhớ mở lại khi xong
                $seatArr = explode(' ', $data['seat_id']);
                $seatNameArr = explode(' ', $data['seats']);

                foreach ($seatArr as $id) {
                    $ticketInput = [
                        'schedule_id' => $data['schedule_id'],
                        'movie_id' => $data['movie_id'],
                        'seat_id' => $id
                    ];

                    $ticketCount = $this->ticket->insert($ticketInput);
                }

                if ($ticketCount > 0) {
                    $_SESSION['message']['ticket'] = "Thêm ticket thành công!";
                    $data['ticket_id'] = $ticketCount;
                } else {
                    throw new Exception("Thêm ticket không thành công!");
                }


                //* Tạo bản ghi cho table orders
                //! Tắt tạm để làm tiếp, nhớ mở lại khi xong
                $orderInput = [
                    'user_id' => $data['user_id'],
                    'status'  => 'not checked in yet',
                    'total_price' => $data['total_price'],
                    'paymentMethod' => $data['paymentMethod']
                ];

                $orderCount = $this->order->insert($orderInput);

                if ($orderCount > 0) {
                    $_SESSION['message']['order'] = "Thêm order thành công!";
                    $data['order_id'] = $orderCount;
                } else {
                    throw new Exception("Thêm order không thành công!");
                }

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

    public function sendMail()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Yêu cầu phương thức phải là POST !");
            }

            $data = $_POST;

            //* Tạo bản ghi cho table order_fnds nếu khách có đặt bắp & nước
            if (!empty($data['sweet_id'])) {
                $sweetInput = [
                    'order_id' => $data['order_id'],
                    'fnd_id' => $data['sweet_id']
                ];
                $rowCount = $this->orderFnd->insert($sweetInput);
            }
            if (!empty($data['beta_id'])) {
                $betaInput = [
                    'order_id' => $data['order_id'],
                    'fnd_id' => $data['beta_id']
                ];
                $rowCount = $this->orderFnd->insert($betaInput);
            }
            if (!empty($data['family_id'])) {
                $familyInput = [
                    'order_id' => $data['order_id'],
                    'fnd_id' => $data['family_id']
                ];
                $rowCount = $this->orderFnd->insert($familyInput);
            }



            //* Lưu dữ liệu vào table order_details
            //? Lấy ticket_id xuống từ bảng tickets
            $ticketCount = $this->ticket->select('*', 'schedule_id = :schedule_id', ['schedule_id' => $data['schedule_id']]);

            foreach ($ticketCount as $ticket) {
                $orderDetailInput = [
                    'order_id' => $data['order_id'],
                    'ticket_id' => $ticket['id']
                ];
                $rowCount = $this->orderDetail->insert($orderDetailInput);
            }

            //* Thêm nội dung để gửi mail vé và đồ đi kèm cho khách
            $user = $this->user->find('*', 'id = :id', ['id' => $data['user_id']]);
            $movieName = $this->movie->find('name', 'id = :id', ['id' => $data['movie_id']]);
            $schedule = $this->schedule->find('start_at', 'id = :id', ['id' => $data['schedule_id']]);
            $roomName = $this->room->find('name', 'id = :id', ['id' => $data['room_id']]);
            $roomType = $this->room->find('type', 'id = :id', ['id' => $data['room_id']]);

            $to = $user['email'];
            $subject = "Your Movie Ticket";
            $content = "
                <h1>Xin chào " . $user['name'] . "!</h1>
                <h2>TTDMovieTicket gửi bạn thông tin vé bạn đã đặt</h2>
                <div>
                    <p><b>Phim:</b> " . mb_strtoupper($movieName['name'], 'UTF-8') . "</p>
                    <p><b>Suất chiếu:</b> " . date_format(date_create($schedule['start_at']), "H:i d/m/Y") . "</p>
                    <p><b>Phòng:</b> " . $roomName['name'] . "</p>
                    <p><b>Định dạng:</b> " . $roomType['type'] . "</p>
                    <p><b>Ghế:</b> " . $data['seats'] . "</p>
                    <p><b>Tổng tiền:</b> " . $data['total_price'] . "đ</p>
                    <p><b>Order ID:</b> " . $data['order_id'] . "</p>
                    <p>Khi đến rạp hãy xuất trình email này cho nhân viên thay cho vé vật lý! Chúc bạn xem phim vui vẻ.</p>
                </div>
            ";

            // sendMail($to, $subject, $content);

            $_SESSION['success'] = true;
            $_SESSION['msg'] = "Đặt vé thành công, hãy kiểm tra email của bạn.";

            header('Location: ' . BASE_URL);
            exit();
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL);
            exit();
        }
    }
}
