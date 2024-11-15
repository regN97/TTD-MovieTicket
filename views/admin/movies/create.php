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

<form action="<?= BASE_URL_ADMIN . '&action=movies-store' ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="name" class="form-label">Tên phim:</label>
        <input type="text" class="form-control" name="name" id="name"
            value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="description" class="form-label">Mô tả:</label>
        <textarea name="description" id="description" class="form-control"><?= $_SESSION['data']['description'] ?? null ?></textarea>
    </div>
    <div class="my-3">
        <label for="duration" class="form-label">Thời lượng phim:</label>
        <input type="number" class="form-control" name="duration" id="duration"
            value="<?= $_SESSION['data']['duration'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="release_date" class="form-label">Ngày công chiếu:</label>
        <input type="date" class="form-control" name="release_date" id="release_date"
            value="<?= $_SESSION['data']['release_date'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="language" class="form-label">Ngôn ngữ:</label>
        <input type="text" class="form-control" name="language" id="language"
            value="<?= $_SESSION['data']['language'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="imageURL" class="form-label">Ảnh bìa:</label>
        <input type="file" class="form-control" name="imageURL" id="imageURL">
    </div>
    <div class="my-3">
        <label for="type" class="form-label">Phân loại phim:</label>
        <input type="text" class="form-control" name="type" id="type"
            value="<?= $_SESSION['data']['type'] ?? null ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=movies-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>