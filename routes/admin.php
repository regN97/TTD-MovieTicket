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
    'genres-list'       => (new GenreController)->list(),
    'genres-create'     => (new GenreController)->create(),
    'genres-store'      => (new GenreController)->store(),
    'genres-show'       => (new GenreController)->show(),
    'genres-toUpdate'   => (new GenreController)->toUpdate(),
    'genres-update'     => (new GenreController)->update(),
    'genres-delete'     => (new GenreController)->delete(),
};
