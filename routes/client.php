<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new HomeController)->index(),

    // Login / Logout
    'show-form-login' => (new UserLoginController)->showFormLogin(),
    'login'           => (new UserLoginController)->login(),
    'logout'          => (new UserLoginController)->logout(),

    // Register
    'register-form' => (new RegisterController)->index(),
    'register-store' => (new RegisterController)->store(),

    // Information User
    "info-user" => (new UserLoginController)->info(),
    'form-update' => (new UserLoginController)->updatePageUser(),
    'update-user' => (new UserLoginController)->update(),
    'changePassword' => (new UserLoginController)->updatePasswordPage(),
    'update-password' => (new UserLoginController)->updatePassword(),
    'updateImage' => (new UserLoginController)->updateImage(),

    // Rank 
    'info-rank' => (new UserLoginController)->showRank(),

    // Movie
    'movies-isShowing' => (new ClientMovieController)->list(),
    'movies-upcoming' => (new ClientMovieController)->list(),
    'movies-search' => (new ClientMovieController)->search(),
    'movies-detail' => (new ClientMovieController)->detail(),
    'search-page' => (new ClientMovieController)->searchPage(),
    'movies-schedule'   => (new ClientMovieController)->schedule(),
    'list-movies' => (new ClientMovieController)->listMovieGenre(),

    // Đặt vé
    'picking-seat' => (new TicketController)->pickingSeat(),

    // Xử lý đặt vé
    'fndOptions' => (new TicketController)->foodAndDrinkOptions(),
    'order-detail'  => (new TicketController)->orderDetail(),
    'order-final' => (new TicketController)->orderFinal(),
    'sendMail'  => (new TicketController)->sendMail(),

    // Xem tin tức
    'page-news' => (new NewPageController)->list(),
    'new-content' => (new NewPageController)->show(),

    // Xem lịch sử đặt hàng
    'history-order' => (new OrderClientController)->list(),
    'show-order' => (new OrderClientController) ->show(),
    'delete-order' => (new OrderClientController) ->delete()

};
