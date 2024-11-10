<?php

define('', '');


define('BASE_URL', 'http://localhost:8888/duan1_TTDMovieTicket/');
define('BASE_URL_ADMIN', 'http://localhost:8888/duan1_TTDMovieTicket/?mode=admin');

define('PATH_ROOT', __DIR__ . '/../');

define('PATH_VIEW_ADMIN', PATH_ROOT . 'views/admin/');
define('PATH_VIEW_CLIENT', PATH_ROOT . 'views/client/');

define('PATH_VIEW_ADMIN_MAIN', PATH_ROOT . 'views/admin/main.php');
define('PATH_VIEW_CLIENT_MAIN', PATH_ROOT . 'views/client/main.php');

define('BASE_ASSETS_ADMIN', BASE_URL . 'assets/admin/');
define('BASE_ASSETS_CLIENT', BASE_URL . 'assets/client/');
define('BASE_ASSETS_UPLOADS', BASE_URL . 'assets/uploads/');


define('PATH_ASSETS_UPLOADS', PATH_ROOT . 'assets/uploads/');

define('PATH_CONTROLLER_ADMIN', PATH_ROOT . 'controllers/admin/');
define('PATH_CONTROLLER_CLIENT', PATH_ROOT . 'controllers/client/');

define('PATH_MODEL', PATH_ROOT . 'models/');

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ttd_movie_ticket');
define('DB_OBTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
