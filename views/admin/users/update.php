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

<form action="<?= BASE_URL_ADMIN . '&action=users-update&id=' . $user['u_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="name" class="form-label">Tên Người dùng: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?php if (isset($_SESSION['data'])) {
                                                                                    echo $_SESSION['data']['name'];
                                                                                } else {
                                                                                    echo $user['u_name'];
                                                                                } ?>">
    </div>
    <div class="my-3">
        <label for="password" class="form-label">Mật Khẩu dùng: </label>
        <input type="password" class="form-control" name="password" id="password" value="<?php if (isset($_SESSION['data'])) {
                                                                                                echo $_SESSION['data']['password'];
                                                                                            } else {
                                                                                                echo $user['u_password'];
                                                                                            } ?>">
    </div>
    <div class="my-3">
        <label for="tel" class="form-label">Số điện thoại: </label>
        <input type="text" class="form-control" name="tel" id="tel" value="<?php if (isset($_SESSION['data'])) {
                                                                                echo $_SESSION['data']['tel'];
                                                                            } else {
                                                                                echo $user['u_tel'];
                                                                            } ?>">
    </div>
    <div class="my-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($_SESSION['data'])) {
                                                                                    echo $_SESSION['data']['email'];
                                                                                } else {
                                                                                    echo $user['u_email'];
                                                                                } ?>">
    </div>
    <div class="my-3">
        <label for="address" class="form-label">Địa chỉ: </label>
        <input type="text" class="form-control" name="address" id="address" value="<?php if (isset($_SESSION['data'])) {
                                                                                        echo $_SESSION['data']['address'];
                                                                                    } else {
                                                                                        echo $user['u_address'];
                                                                                    } ?>">
    </div>
    <div class="my-3">
        <label for="rank_id" class="form-label">Thứ hạng:</label>
        <select class="form-select" name="rank_id" id="rank_id">

            <?php foreach ($rankPluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $user['ra_id'] ? 'selected' : null ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="role_id" class="form-label">Vai trò:</label>
        <select class="form-select" name="role_id" id="role_id">

            <?php foreach ($rolePluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $user['ro_id'] ? 'selected' : null ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="points" class="form-label">Points:</label>
        <input type="number" class="form-control" name="points" id="points"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['points'];
                    } else {
                        echo $user['u_points'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="imageURL" class="form-label">Hình ảnh: </label>
        <input type="file" class="form-control" name="imageURL" id="imageURL" value="<?php if (isset($_SESSION['data'])) {
                                                                                            echo $_SESSION['data']['imageURL'];
                                                                                        } else {
                                                                                            echo $user['u_imageURL'];
                                                                                        } ?>">
        <?php if (!empty($user['u_imageURL'])): ?>
            <img src="<?= BASE_ASSETS_UPLOADS . $user['u_imageURL'] ?>" width="100px">
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=users-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>