<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $value): ?>
                <li><?= $value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php
    unset($_SESSION['errors']);
endif;
?>


<div class="container">
    <div class="row bg-light my-3">
        <!-- sidebar -->
        <nav class="col-md-3 sidebar p-3">
            <h4 class="text-danger fw-bold">TÀI KHOẢN TTD</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link active">THÔNG TIN CHUNG</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">CHI TIẾT TÀI KHOẢN</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">SETUP A PIN</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">THẺ THÀNH VIÊN</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ĐIỂM THƯỞNG</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">THẺ QUÀ TẶNG</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">VOUCHER</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">COUPON</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">LỊCH SỬ GIAO DỊCH</a>
                </li>
            </ul>
        </nav>
        <div class="col-lg-9 p-4">
            <h3 class="text-center fw-bold">THÔNG TIN CHUNG</h3>
            <div class="row mt-6">
                <!-- Profile Picture -->
                <div class="col-md-3 text-center d-flex flex-column align-items-center">
                    <img src="<?= BASE_ASSETS_UPLOADS . $user['u_imageURL'] ?>" alt="Avatar" class="rounded-circle mb-3" style="width: 150px;height: 150px;">
                    <button class="btn btn-secondary btn-sm">Thay đổi</button>
                </div>
                <!-- User Details -->
                <div class="col-md-6">
                    <h5>Xin chào <?= $user['u_name']?>,</h5>
                    <p>Với trang này, bạn sẽ quản lý được tất cả các thông tin tài khoản của mình.</p>
                    <div class="row border border-dark rounded ">
                        <div class="row text-cente d-flex align-items-start justify-content-sm-around">
                            <div class="col-4 d-flex align-items-center flex-column">
                                <p class="mb-1">Cấp Độ Thẻ</p>
                                <p class="mb-1 mx-1 badge bg-dark"><?= $user['ra_name']?></p>
                            </div>
                            <div class="col-4 d-flex align-items-center flex-column">
                                <p class="mb-1">Tổng Chi Tiêu</p>
                                <p class="mb-1 mx-1"><?= $user['u_points']?> đ</p>
                            </div>
                            <div class="col-4 d-flex align-items-center flex-column">
                                <p class="mb-1">Điểm CGV</p>
                                <p class="mb-1 mx-1"><?= $user['u_points']?> P</p>
                            </div>
                        </div>
                    </div>

                     <!-- Contact Info -->
                <div class="mt-5">
                    <h5>Thông tin tài khoản</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0"><strong>Tên:</strong> <?= $user['u_name']?></p>
                        <button class="btn btn-secondary btn-sm">Thay đổi</button>
                    </div>
                    <p class="mb-0"><strong>Email:</strong> <?= $user['u_email']?></p>
                    <p><strong>Điện thoại:</strong> <?= $user['u_tel']?></p>
                </div>
                </div>
            </div>

        </div>
    </div>


</div>