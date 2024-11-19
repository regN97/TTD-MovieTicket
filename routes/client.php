<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new HomeController)->index(),
    'show-form-login' => (new UserLoginController)->showFormLogin(),
    'login'           => (new UserLoginController)->login(),
};
