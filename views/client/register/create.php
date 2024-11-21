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
<div class="bg-div py-3">
    <form class="container w-50" action="?action=register-store" method="post" enctype="multipart/form-data">
        <h2><?= $title; ?></h2>
        <div class="row my-2">
            <div class="col-sm-6">
                <label for="name" class="form-label">Họ và tên: </label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['data']['name'] ?? null ?>">
            </div>
            <div class="col-sm-6">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['data']['email'] ?? null ?>">
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm-6">
                <label for="password" class="form-label">Mật khẩu: </label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="col-sm-6">
                <label for="repassword" class="form-label">Xác minh mật khẩu: </label>
                <input type="password" class="form-control" name="repassword" id="repassword">
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm-6">
                <label for="tel" class="form-label">Số điện thoại: </label>
                <input type="text" class="form-control" name="tel" id="tel" value="<?= $_SESSION['data']['tel'] ?? null ?>">
            </div>
            <div class="col-sm-6">
                <label for="address" class="form-label">Địa chỉ: </label>
                <input type="text" class="form-control" name="address" id="address" value="<?= $_SESSION['data']['address'] ?? null ?>">
            </div>
        </div>
        <div class="">
            <input type="number" name="rank_id" id="rank_id" value="5" hidden>
        </div>
        <div class="">
            <input type="number" name="role_id" id="role_id" value="3" hidden>
        </div>
        <div class="my-3">
            <input type="number" class="form-control" name="points" id="points" value="1" hidden>
        </div>

        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>