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
<form action="<?= BASE_URL_ADMIN . '&action=artists-store' ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên diễn viên/đạo diễn:</label>
        <input type="text" class="form-control" id="name" name="name"
            value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="roles" class="form-label">Vai trò:</label>
        <select name="roles" id="roles" class="form-select">
            <option value="">Lựa chọn vai trò</option>
            <option value="Đạo diễn" <?php if(isset($_SESSION['data']['roles']) && $_SESSION['data']['roles'] === 'Đạo diễn') echo 'selected' ?>>Đạo diễn</option>
            <option value="Diễn viên" <?php if(isset($_SESSION['data']['roles']) && $_SESSION['data']['roles'] === 'Diễn viên') echo 'selected' ?>>Diễn viên</option>
        </select>
    </div>
    <div class="mb-3 mt-3">
        <label for="bio" class="form-label">Thông tin:</label>
        <input type="text" class="form-control" id="bio" name="bio"
            value="<?= $_SESSION['data']['bio'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="country" class="form-label">Quê quán:</label>
        <input type="text" class="form-control" id="country" name="country"
            value="<?= $_SESSION['data']['country'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="imageURL" class="form-label">Hình ảnh:</label>
        <input type="file" class="form-control" name="imageURL" id="imageURL">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=artists-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>