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

<form action="<?= BASE_URL_ADMIN . '&action=seatType-store' ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="type" class="form-label">Loại ghế:</label>
        <select class="form-select" name="type" id="type">
            <option value="">Lựa chọn loại ghế</option>
            <option value="Thường" <?php if (isset($_SESSION['data']['type']) && $_SESSION['data']['type'] === 'Thường') echo 'selected' ?>>Thường</option>
            <option value="VIP" <?php if (isset($_SESSION['data']['type']) && $_SESSION['data']['type'] === 'VIP') echo 'selected' ?>>VIP</option>
            <option value="SweetBox" <?php if (isset($_SESSION['data']['type']) && $_SESSION['data']['type'] === 'SweetBox') echo 'selected' ?>>SweetBox</option>
        </select>
    </div>
    <div class="my-3">
        <label for="price" class="form-label">Giá tiền:</label>
        <input type="number" class="form-control" name="price" id="price"
            value="<?= $_SESSION['data']['price'] ?? null ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=seatType-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>