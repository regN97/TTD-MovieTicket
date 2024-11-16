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

<form action="<?= BASE_URL_ADMIN . '&action=user-store' ?>" method="post" enctype="multipart/form-data">
<div class="my-3">
        <label for="name" class="form-label">Tên Người dùng: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="password" class="form-label">Mật Khẩu dùng: </label>
        <input type="password" class="form-control" name="password" id="password" value="<?= $_SESSION['data']['password'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="tel" class="form-label">Số điện thoại: </label>
        <input type="text" class="form-control" name="tel" id="tel" value="<?= $_SESSION['data']['tel'] ?? null ?>">
    </div> 
    <div class="my-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['data']['email'] ?? null ?>">
    </div> 
    <div class="my-3">
        <label for="address" class="form-label">Địa chỉ: </label>
        <input type="text" class="form-control" name="address" id="address" value="<?= $_SESSION['data']['address'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="rank_id" class="form-label">Thứ hạng:</label>
        <select class="form-select" name="rank_id" id="rank_id">
        <option value="">Lựa chọn thứ hạng</option>
        <?php  foreach($rankPluck as $id =>$name):?>
            <option value="<?= $id?>" <?php if (isset($_SESSION['data']['rank']) && $_SESSION['data']['rank'] === $name ) echo 'selected' ?>><?= $name?></option>
            <?php endforeach;?>
        </select>
    </div>
<div class="my-3">
        <label for="role_id" class="form-label">Vai trò:</label>
        <select class="form-select" name="role_id" id="role_id">
            <option value="">Lựa chọn vai trò</option>
            <?php  foreach($rolePluck as $id =>$name):?>
            <option value="<?= $id?>" <?php if (isset($_SESSION['data']['role']) && $_SESSION['data']['role'] === $name ) echo 'selected' ?>><?= $name?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="my-3">
        <label for="points" class="form-label">Points:</label>
        <input type="number" class="u+form-control" name="points" id="points"
            value="<?= $_SESSION['data']['points'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="imageURL" class="form-label">Hình ảnh: </label>
        <input type="file" class="form-control" name="imageURL" id="imageURL" value="<?= $_SESSION['data']['imageURL'] ?? null ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=user-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>