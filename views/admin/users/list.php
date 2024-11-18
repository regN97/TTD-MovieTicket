<a href="<?= BASE_URL_ADMIN . '&action=users-create' ?>" class="btn btn-primary mb-3">Thêm mới</a>

<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>


<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên người dùng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Thứ Hạng</th>
        <th>Vai Trò</th>
        <th>Điểm</th>
        <th>Ảnh</th>
        <th>Thao Tác</th>
    </tr>

    <?php foreach ($data as $key => $user): ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $user['u_name'] ?></td>
            <td><?= $user['u_email'] ?></td>
            <td><?= $user['u_tel'] ?></td>
            <td><?php
                $maxLength = 20;
                $shortenData = mb_substr($user['u_address'], 0, $maxLength, 'UTF-8');
                echo $shortenData . ' ...';
                ?></td>
            <td><?= $user['ra_name'] ?></td>
            <td><?= $user['ro_name'] ?></td>
            <td><?= $user['u_points'] ?></td>

            <td>
                <?php if (!empty($user['u_imageURL'])) : ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $user['u_imageURL'] ?>" width="100px">
                <?php endif; ?>
            </td>

            <td>
                <a href="<?= BASE_URL_ADMIN . '&action=users-show&id=' . $user['u_id'] ?>"
                    class="btn btn-info">Xem</a>

                <a href="<?= BASE_URL_ADMIN . '&action=users-updatePage&id=' . $user['u_id'] ?>"
                    class="btn btn-warning ms-3 me-3">Sửa</a>

                <a href="<?= BASE_URL_ADMIN . '&action=users-delete&id=' . $user['u_id'] ?>"
                    onclick="return confirm('Bạn có chắc muốn xoá?')"
                    class="btn btn-danger">Xoá</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>