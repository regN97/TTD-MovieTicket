<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new DashboardController)->index(),

    // CRUD Theater
    'theaters-index'    => (new TheaterController)->index(),    // Hiển thị danh sách
    'theaters-show'     => (new TheaterController)->show(),     // Hiển thị danh sách
    'theaters-create'   => (new TheaterController)->create(),   // Hiển thị danh sách
    'theaters-store'    => (new TheaterController)->store(),    // Hiển thị danh sách
    'theaters-edit'     => (new TheaterController)->edit(),     // Hiển thị danh sách
    'theaters-update'   => (new TheaterController)->update(),   // Hiển thị danh sách
    'theaters-delete'   => (new TheaterController)->delete(),   // Xoá dữ liệu theo ID

     // CRUD News
     'news-index'        => (new NewsController)->index(),    // Hiển thị danh sách tin tức
     'news-show'     => (new NewsController())->show(),     // Hiển thị danh sách 
     'news-create'   => (new NewsController())->create(),   // Hiển thị danh sách
     'news-store'    => (new NewsController())->store(),    // Hiển thị danh sách
     'news-edit'     => (new NewsController())->edit(),     // Hiển thị danh sách
     'news-update'   => (new NewsController())->update(),   // Hiển thị danh sách
     'news-delete'   => (new NewsController())->delete(),   // Xoá dữ liệu theo ID
 
};
