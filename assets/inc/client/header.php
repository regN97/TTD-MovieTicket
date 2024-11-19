<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASE_ASSETS_CSS . 'main.css' ?>">
    <title>TTDMovieTicket</title>
</head>

<body>
    <div class="header">
        <div class="navbar-brand">
            <a href="<?= BASE_URL ?>">
                <h1 class="navbar-heading">TTD Movie Ticket</h1>
            </a>
        </div>
        <div class="navbar-container">
            <nav class="navbar">
                <ul class="navbar-menu">
                    <li><a href="#">Lịch chiếu</a></li>
                    <li><a href="#">Rạp</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <?php if (empty($_SESSION['user'])) { ?>
                        <li><a href="?action=show-form-login">Đăng nhập</a></li>
                    <?php } else { ?>
                        <li><a href="#">Tài khoản</a></li>
                        <li><a href="?action=logout">Đăng xuất</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <!-- End Header -->