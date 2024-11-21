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

    // Movie
    'movies-isShowing' => (new ClientMovieController)->list(),
    'movies-upcoming' => (new ClientMovieController)->list(),
    'movies-search' => (new ClientMovieController)->search(),
    'movies-detail' => (new ClientMovieController)->detail(),
    'movies-search' => (new ClientMovieController)->search(),
    'search-page' => (new ClientMovieController)->searchPage(),
};
