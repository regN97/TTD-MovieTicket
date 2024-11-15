<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASE_ASSETS_CSS . 'main.css' ?>?v=<?= time() ?>">
    <title><?= $title ?? 'Admin Dashboard' ?></title>
</head>

<body>
    <header class="admin-header">
        <div class="admin-logo">
            <img src="<?= BASE_ASSETS_CLIENT_IMAGE . 'TTD.png' ?>" alt="logo" class="mt-4 ms-3" width="200" height="80">
        </div>
        <div class="admin-right">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="?mode=client">Sign out</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="d-flex">
        <div class="admin-side-bar d-flex flex-column flex-shrink-0 p-3">
            <ul class="nav nav-pills flex-column mb-auto admin-nav">
                <li>
                    <a href="#" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL_ADMIN . '&action=movies-list' ?>" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý phim
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL_ADMIN . '&action=genres-list' ?>" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý thể loại phim
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL_ADMIN . '&action=artists-list' ?>" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý Artists
                    </a>
                </li>
                <li>
                    <a href="<?=  BASE_URL_ADMIN . '&action=rooms-list' ?>" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý phòng chiếu
                    </a>
                </li>
                <li>
                    <a href="#" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý tài khoản
                    </a>
                </li>
                <li>
                    <a href="#" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý bình luận
                    </a>
                </li>
                <li>
                    <a href="#" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Quản lý tin tức
                    </a>
                </li>
                <li>
                    <a href="#" class="my-2 btn btn-light">
                        <i class="fa-solid fa-gauge-high me-2"></i>
                        Thống kê
                    </a>
                </li>
            </ul>
        </div>