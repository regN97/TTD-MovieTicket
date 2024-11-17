<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";

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

<!-- Form Thêm Tin tức -->

<form action="<?= BASE_URL_ADMIN . '&action=news-update&id=' . $news['n_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="name" class="form-label">Tiêu đề: </label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $news['n_title'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="address" class="form-label">Nội dung: </label>
        <textarea type="" class="form-control" name="content" id="content"><?= $news['n_content'] ?? null ?></textarea>
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Hình ẩnh: </label>
        <input type="file" class="form-control" name="imageURL" id="imageURL">

        <?php if (!empty($news['n_imageURL'])) : ?>
            <img src="<?= BASE_ASSETS_UPLOADS . $news['n_imageURL'] ?>" width="100px">
        <?php endif; ?>
    </div>
    <div class="my-3">
        <label for="user_id" class="form-label">Người đăng:</label>
        <select class="form-select" name="user_id" id="user_id">
            <option value="">Lựa chọn người đăng</option>
            <?php foreach ($userPluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $news['u_id'] ? 'selected' : null ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=news-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>