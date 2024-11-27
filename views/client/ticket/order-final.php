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

<div class="bg-detail mt-2 mb-3">
    <div class="container py-3 text-white">
        <form action="" method="post" class="w-50">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="m_name">Tên phim:</label>
                    <input class="form-control" type="text" readonly value="<?= mb_strtoupper($data['movie_name']) ?>">
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="start_at">Suất chiếu:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['start_at'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="seats">Ghế:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['seats'] ?>">
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="u_name">Họ và tên:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['user_name'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['user_email'] ?>">
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tel">Tel:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['user_tel'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="total_price">Giá tiền:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['total_price'] ?>">
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="paymentMethod">Phương thức thanh toán:</label>
                    <input class="form-control" type="text" readonly value="<?= $data['paymentMethod'] ?>">
                </div>
            </div>
        </form>
    </div>
</div>