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
<form action="<?= BASE_URL_ADMIN . '&action=ranks-store' ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên thứ hạng:</label>
        <input type="text" class="form-control" id="name" name="name"
            value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="benefits" class="form-label">Mô tả lợi ích:</label>
        <input type="text" class="form-control" id="benefits" name="benefits"
            value="<?= $_SESSION['data']['benefits'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="level" class="form-label">Mốc điểm của thứ hạng:</label>
        <input type="number" class="form-control" id="level" name="level"
            value="<?= $_SESSION['data']['level'] ?? null ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=ranks-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>