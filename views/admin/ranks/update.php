<?php

if (isset($_SESSION['success'])) {
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

<form action="<?= BASE_URL_ADMIN . '&action=ranks-update&id=' . $rank['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên thứ hạng:</label>
        <input type="text" class="form-control" id="name" name="name"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['name'];
                    } else {
                        echo $rank['name'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="benefits" class="form-label">Mô tả lợi ích:</label>
        <input type="text" class="form-control" id="benefits" name="benefits"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['benefits'];
                    } else {
                        echo $rank['benefits'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="discount_percent" class="form-label">Phần trăm được giảm:</label>
        <input type="number" class="form-control" id="discount_percent" name="discount_percent"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['discount_percent'];
                    } else {
                        echo $rank['discount_percent'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="level" class="form-label">Mốc điểm của thứ hạng:</label>
        <input type="number" class="form-control" id="level" name="level"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['level'];
                    } else {
                        echo $rank['level'];
                    } ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=ranks-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>