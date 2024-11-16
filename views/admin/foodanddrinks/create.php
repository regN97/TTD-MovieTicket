<?php

if(isset($_SESSION['success'])){
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])) : ?>

    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $value) : ?>
                <li><?= $value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php 
    unset($_SESSION['errors']);
    endif; 
?>
<form action="<?= BASE_URL_ADMIN . '&action=foodanddrinks-store' ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên sản phẩm:</label>
        <input type="text" class="form-control" id="name" name="name"
            value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="type" class="form-label">phân loại:</label>
        <select name="type" id="type" class="form-select">
            <option value="">Lựa chọn phân loại</option>
            <option value="Single" <?php if(isset($_SESSION['data']['type']) && $_SESSION['data']['type'] === 'Single') echo 'selected' ?>>Single</option>
            <option value="Combo" <?php if(isset($_SESSION['data']['type']) && $_SESSION['data']['type'] === 'Combo') echo 'selected' ?>>Combo</option>
        </select>
    </div>
    <div class="mb-3 mt-3">
        <label for="price" class="form-label">Giá tiền:</label>
        <input type="text" class="form-control" id="price" name="price"
            value="<?= $_SESSION['data']['price'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="quantity" class="form-label">Số lượng tồn kho:</label>
        <input type="text" class="form-control" id="quantity" name="quantity"
            value="<?= $_SESSION['data']['quantity'] ?? null ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=foodanddrinks-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>