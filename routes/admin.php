<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'                 => (new DashboardController)->index(),

     // CRUD News
     'news-list'        => (new NewsController)->list(),    // Hiển thị danh sách tin tức
     'news-show'     => (new NewsController())->show(),     // Hiển thị danh sách 
     'news-create'   => (new NewsController())->create(),   // Hiển thị danh sách
     'news-store'    => (new NewsController())->store(),    // Hiển thị danh sách
     'news-updatePage'     => (new NewsController())->updatePage(),     // Hiển thị danh sách
     'news-update'   => (new NewsController())->update(),   // Hiển thị danh sách
     'news-delete'   => (new NewsController())->delete(),   // Xoá dữ liệu theo ID
 
    // CRUD Genres
    'genres-list'       => (new GenreController)->list(),           // Trang danh sách
    'genres-create'     => (new GenreController)->create(),         // Trang tạo mới
    'genres-store'      => (new GenreController)->store(),          // Lưu dữ liệu tạo mới
    'genres-show'       => (new GenreController)->show(),           // Trang xem chi tiết
    'genres-updatePage' => (new GenreController)->updatePage(),     // Trang cập nhật
    'genres-update'     => (new GenreController)->update(),         // Lưu dữ liệu cập nhật
    'genres-delete'     => (new GenreController)->delete(),         // Chức năng xóa

    // CRUD Movies
    'movies-list'       => (new MovieController)->list(),       // Trang danh sách
    'movies-create'     => (new MovieController)->create(),     // Trang tạo mới
    'movies-store'      => (new MovieController)->store(),      // Lưu dữ liệu tạo mới
    'movies-show'       => (new MovieController)->show(),       // Trang xem chi tiết
    'movies-updatePage' => (new MovieController)->updatePage(), // Trang cập nhật
    'movies-update'     => (new MovieController)->update(),     // Lưu dữ liệu cập nhật
    'movies-delete'     => (new MovieController)->delete(),     // Chức năng xóa

    // CRUD Artists
    'artists-list'       => (new ArtistController)->list(),
    'artists-create'     => (new ArtistController)->create(),
    'artists-store'      => (new ArtistController)->store(),
    'artists-show'       => (new ArtistController)->show(),
    'artists-updatePage' => (new ArtistController)->updatePage(),
    'artists-update'     => (new ArtistController)->update(),
    'artists-delete'     => (new ArtistController)->delete(),

    // CRUD Rooms
    'rooms-list'       => (new RoomController)->list(),
    'rooms-create'     => (new RoomController)->create(),
    'rooms-store'      => (new RoomController)->store(),
    'rooms-show'       => (new RoomController)->show(),
    'rooms-updatePage' => (new RoomController)->updatePage(),
    'rooms-update'     => (new RoomController)->update(),
    'rooms-delete'     => (new RoomController)->delete(),

    // CRUD Seat type
    'seatType-list'       => (new SeatTypeController)->list(),
    'seatType-create'     => (new SeatTypeController)->create(),
    'seatType-store'      => (new SeatTypeController)->store(),
    'seatType-show'       => (new SeatTypeController)->show(),
    'seatType-updatePage' => (new SeatTypeController)->updatePage(),
    'seatType-update'     => (new SeatTypeController)->update(),
    'seatType-delete'     => (new SeatTypeController)->delete(),    

    // CRUD foodanddrinks
    'foodanddrinks-list'       => (new FoodAndDrinkController)->list(),
    'foodanddrinks-create'     => (new FoodAndDrinkController)->create(),
    'foodanddrinks-store'      => (new FoodAndDrinkController)->store(),
    'foodanddrinks-show'       => (new FoodAndDrinkController)->show(),
    'foodanddrinks-updatePage' => (new FoodAndDrinkController)->updatePage(),
    'foodanddrinks-update'     => (new FoodAndDrinkController)->update(),
    'foodanddrinks-delete'     => (new FoodAndDrinkController)->delete(), 


    // CRUD user
    'user-list'       => (new UserController)->list(),
    'user-create'     => (new UserController)->create(),    
    'user-store'      => (new UserController)->store(),
    'user-show'       => (new UserController)->show(),
    // 'user-updatePage' => (new UserController)->updatePage(),
    // 'user-update'     => (new UserController)->update(),
    'user-delete'     => (new UserController)->delete(), 

};
