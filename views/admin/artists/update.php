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

<form action="<?= BASE_URL_ADMIN . '&action=artists-update&id='.$artist['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên diễn viên/đạo diễn:</label>
        <input type="text" class="form-control" id="name" name="name"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['name'];
                    } else {
                        echo $artist['name'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="roles" class="form-label">Vai trò:</label>
        <select name="roles" id="roles" class="form-select">
            <option value="">Lựa chọn vai trò</option>
            <option value="Đạo diễn" <?php if(isset($artist['roles']) && $artist['roles'] === 'Đạo diễn') echo 'selected' ?>>Đạo diễn</option>
            <option value="Diễn viên" <?php if(isset($artist['roles']) && $artist['roles'] === 'Diễn viên') echo 'selected' ?>>Diễn viên</option>
        </select>
    </div>
    <div class="mb-3 mt-3">
        <label for="bio" class="form-label">Thông tin:</label>
        <input type="text" class="form-control" id="bio" name="bio"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['bio'];
                    } else {
                        echo $artist['bio'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="country" class="form-label">Quê quán:</label>
        <input type="text" class="form-control" id="country" name="country"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['country'];
                    } else {
                        echo $artist['country'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="imageURL" class="form-label">Hình ảnh:</label>
        <input type="file" class="form-control" name="imageURL" id="imageURL">
        <?php if(!empty($artist['imageURL'])): ?>
            <img src="<?= BASE_ASSETS_UPLOADS . $artist['imageURL']?>" width="100px">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=artists-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>