<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'                 => (new DashboardController)->index(),

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

};
