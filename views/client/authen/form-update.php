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
    .nav-link {
        color: #000;
    }

    .nav-link:hover {
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
                    <a href="?action=form-update&id=<?= $data['u_id'] ?>" class="nav-link text-danger">CHI TIẾT TÀI KHOẢN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=info-rank&id=<?= $data['u_id'] ?>" class="nav-link">THẺ THÀNH VIÊN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=history-order&id=<?= $data['u_id'] ?>" class="nav-link">LỊCH SỬ GIAO DỊCH</a>
                </li>
            </ul>
        </nav>
        <div class="col-lg-9 p-4">
            <h3 class="text-center fw-bold">THÔNG TIN CHI TIẾT</h3>
            <div class="row mt-6">
                <!-- Form chỉnh sửa -->
                <div class="bg-white p-4 rounded shadow-sm mx-auto" style="max-width: 700px;">
                    <form class="row" action="<?= BASE_URL . '?action=update-user&id='  . $data['u_id'] ?>" method="post"">
                        <!-- Tên -->
                        <div class=" col-lg-5">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $data['u_name'] ?>" required>
                        </div>

                        <!-- Điện thoại -->
                        <div class="mb-3">
                            <label for="tel" class="form-label">Điện thoại <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tel" name="tel" value="<?= $data['u_tel'] ?>" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $data['u_email'] ?>" required>
                        </div>
                </div>
                <div class="col-lg-5">

                    <!-- Địa chỉ -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $data['u_address'] ?>" required>
                    </div>


                    <!-- Mật khẩu -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>

                    <!-- Checkbox đổi mật khẩu -->
                    <a href="<?= BASE_URL . '?action=changePassword&id=' . $data['u_id']  ?>" class="btn btn-outline-danger">Đổi mật khẩu</a>
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