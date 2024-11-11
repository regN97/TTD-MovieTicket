<a href="<?= BASE_URL_ADMIN . '&action=theaters-create' ?>" class="btn btn-primary mb-3">Thêm mới</a>

<?php
if(isset($_SESSION['success'])){
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";
    
    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên Rạp</th>
        <th>Địa Chỉ</th>
        <th>Thời điểm tạo</th>
        <th>Thao Tác</th>
    </tr>
    <?php foreach ($data as $theater): ?>
        <tr>
        <td><?= $theater['theater_id'] ?></td>
        <td><?= $theater['name'] ?></td>
        <td><?= $theater['address'] ?></td>
        <td><?= $theater['created_at'] ?></td>
        <td>
            <a href="<?= BASE_URL_ADMIN . '&action=theaters-show&id=' . $theater['theater_id'] ?>"
                    class="btn btn-info">Xem</a>

            <a href="<?= BASE_URL_ADMIN . '&action=theaters-edit&id=' . $theater['theater_id'] ?>"
                class="btn btn-warning ms-3 me-3">Sửa</a>

            <a href="<?= BASE_URL_ADMIN . '&action=theaters-delete&id=' . $theater['theater_id'] ?>"
                onclick="return confirm('Bạn có chắc muốn xoá?')"
                class="btn btn-danger">Xoá</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>