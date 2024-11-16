<a href="<?= BASE_URL_ADMIN . '&action=roles-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

<?php

if(isset($_SESSION['success'])){
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên vai trò</th>
            <th>Mô tả</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; foreach ($data as $role) : ?>
            <td><?= $stt++ ?></td>
            <td><?= $role['name'] ?></td>
            <td><?= $role['description'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=roles-show&id=' . $role['id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=roles-updatePage&id=' . $role['id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=roles-delete&id=' . $role['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>