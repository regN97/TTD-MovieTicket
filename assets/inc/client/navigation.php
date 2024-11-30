<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-nav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="?action=/"><img src="<?= BASE_ASSETS_CLIENT_IMAGE . 'TTD.png' ?>" alt="logo" width="100" height="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link nav-a" aria-current="page" href="?action=/">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-a nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Phim</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="nav-a dropdown-item" href="?action=movies-isShowing">Đang chiếu</a></li>
                        <li><a class="nav-a dropdown-item" href="?action=movies-upcoming">Sắp chiếu</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link nav-a" aria-current="page" href="?action=page-news">Tin tức nổi bật</a></li>
            </ul>

            <form action="?action=movies-search" method="POST" class="input-group w-25">
                <input type="text" name="movies-search" id="name" class="form-control rounded me-3" placeholder="Từ khóa tìm kiếm..." />
            </form>

            <?php if (!empty($_SESSION['user'])) {
                if ($_SESSION['user']['role_id'] == 3) { ?>
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle nav-a" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li class="nav-item"><a class="dropdown-item nav-a" href="?action=/">Quản lý tài khoản</a></li>
                            <li class="nav-item">
                                <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item"><a class="dropdown-item nav-a" href="?action=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php }
                if ($_SESSION['user']['role_id'] == 1 || $_SESSION['user']['role_id'] == 2) { ?>
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle nav-a" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="  <?php if (isset($_SESSION['user'])) {
                                            echo  BASE_ASSETS_UPLOADS . $_SESSION['user']['imageURL'];
                                        } else {
                                            echo ' https://github.com/mdo.png';
                                        } ?>  " alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li class="nav-item"><a class="dropdown-item nav-a" href="?action=info-user">Quản lý tài khoản</a></li>
                            <li class="nav-item"><a class="dropdown-item nav-a" href="?mode=admin">Trang quản trị</a></li>
                            <li class="nav-item">
                                <hr class="dropdown-divider">
                            </li>
                            <li class="nav-item"><a class="dropdown-item nav-a" href="?action=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php }
            } else { ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link nav-a" href="?action=show-form-login">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link nav-a" href="?action=register-form">Đăng ký</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- End navigation -->