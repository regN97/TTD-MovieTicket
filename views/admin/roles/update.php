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

<form action="<?= BASE_URL_ADMIN . '&action=roles-update&id='.$role['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên vai trò:</label>
        <input type="text" class="form-control" id="name" name="name"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['name'];
                    } else {
                        echo $role['name'];
                    } ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="description" class="form-label">Mô tả:</label>
        <input type="text" class="form-control" id="description" name="description"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['description'];
                    } else {
                        echo $role['description'];
                    } ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="<?= BASE_URL_ADMIN . '&action=roles-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>