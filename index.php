<?php

// Hàm spl_autoload_register đăng ký hàm autoload. Giúp tự động tải các lớp (Class) và giao diện (Interface) khi chúng được sử dụng mà không cần phải sử dụng require hoặc include thủ công
spl_autoload_register(function ($class) {
    $fileName = "$class.php";

    $fileModel = PATH_MODEL . $fileName;
    $fileControllerClient = PATH_CONTROLLER_CLIENT . $fileName;
    $fileControllerAdmin = PATH_CONTROLLER_ADMIN . $fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    } else if (is_readable($fileControllerClient)) {
        require_once $fileControllerClient;
    } else if (is_readable($fileControllerAdmin)) {
        require_once $fileControllerAdmin;
    }
});

// Require 2 file từ config để sử dụng chung
require_once './configs/env.php';
require_once './configs/helper.php';

// Điều hướng
$mode = $_GET['mode'] ?? 'client';

if ($mode == 'admin') {
    require_once './routes/admin.php';
} else {
    require_once './routes/client.php';
}
