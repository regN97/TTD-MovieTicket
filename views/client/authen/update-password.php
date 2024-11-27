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

<style>
    .nav-link{
        color: #000;
    }
    .nav-link:hover{
        color: red;
    }
</style>

<div class="container">
    <div class="row bg-light my-3">
        <!-- sidebar -->
        <nav class="col-md-3 sidebar p-3">
            <h4 class="text-danger fw-bold">TÀI KHOẢN TTD</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="?action=info-user" class="nav-link active">THÔNG TIN CHUNG</a>
                </li>
                <li class="nav-item">
                    <a href="?action=form-update&id=<?= $user['u_id'] ?>" class="nav-link text-danger" >CHI TIẾT TÀI KHOẢN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=info-rank&id=<?= $user['u_id'] ?>" class="nav-link">THẺ THÀNH VIÊN</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ĐIỂM THƯỞNG</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">VOUCHER</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">LỊCH SỬ GIAO DỊCH</a>
                </li>
            </ul>
        </nav>
        <div class="col-lg-9 p-4">
            <h3 class="text-center fw-bold">THÔNG TIN CHI TIẾT</h3>
            <div class="row mt-6">
                <!-- Form chỉnh sửa -->
                <div class="bg-white p-4 rounded shadow-sm mx-auto" style="max-width: 700px;">
                    <form class="row" action="<?= BASE_URL . '?action=update-password&id='  . $user['u_id'] ?>" method="post" enctype="multipart/form-data">
                        <!-- Mật khẩu -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu cũ:<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="oldPassword" id="password">
                        </div>

                        <div class="mb-3">
                        <label for="newPassword">Mật khẩu mới:</label>
                        <input type="password" id="newPassword" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label for="confirmPassword">Nhập lại mật khẩu mới:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                        </div>
                </div>
                <!-- Nút -->
                <div class="d-flex justify-content-between">
                    <a href="<?= BASE_URL . '?action=info-user' ?>" class="btn btn-outline-danger">Quay lại</a>
                    <button type="submit" class="btn btn-danger">LƯU LẠI</button>
                </div>
                </form>
            </div>

        </div>
    </div>

</div>
</div>
</div>
