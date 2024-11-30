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
        <label for="role_id" class="form-label">Vai trò:</label>
        <select class="form-select" name="role_id" id="role_id">

            <?php foreach ($rolePluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $user['ro_id'] ? 'selected' : null ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=users-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>