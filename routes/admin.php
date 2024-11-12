<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'                 => (new DashboardController)->index(),

    // CRUD Theaters
    'theaters-index'    => (new TheaterController)->index(),    // Hiển thị danh sách
    'theaters-show'     => (new TheaterController)->show(),     // Hiển thị danh sách
    'theaters-create'   => (new TheaterController)->create(),   // Hiển thị danh sách
    'theaters-store'    => (new TheaterController)->store(),    // Hiển thị danh sách
    'theaters-edit'     => (new TheaterController)->edit(),     // Hiển thị danh sách
    'theaters-update'   => (new TheaterController)->update(),   // Hiển thị danh sách
    'theaters-delete'   => (new TheaterController)->delete(),   // Xoá dữ liệu theo ID

    // CRUD Genres
    'genres-list'       => (new GenreController)->list(),
    'genres-create'     => (new GenreController)->create(),
    'genres-store'     => (new GenreController)->store(),
};
