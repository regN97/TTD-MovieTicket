<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<style>
    .totalPages:hover {
        text-decoration: underline;
    }
</style>

<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên người dùng</th>
        <th>Email</th>
        <th>Điểm</th>
        <th>Ảnh</th>
        <th>Thao Tác</th>
    </tr>

    <?php foreach ($data as $key => $user): ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $user['u_name'] ?></td>
            <td><?= $user['u_email'] ?></td>
            <td><?= $user['u_points'] ?></td>

            <td class="text-center">
                <?php if (!empty($user['u_imageURL'])) : ?>
                    <img class="rounded" src="<?= BASE_ASSETS_UPLOADS . $user['u_imageURL'] ?>" width="100px" height="100px">
                <?php endif; ?>
            </td>

            <td class="d-flex justify-content-center">
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


<div class="container mb-3">
    <div class="d-flex justify-content-start">
        <?php if ($page > 1): ?>
            <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL_ADMIN . '&action=users-list' . '&page=' . ($page - 1) ?>">« Trước</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a class="totalPages btn btn-outline-dark mx-1 col-1" href="<?= BASE_URL_ADMIN . '&action=users-list' . '&page=' . $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL_ADMIN . '&action=users-list' . '&page=' . ($page + 1) ?>">Sau »</a>
        <?php endif; ?>
    </div>
</div>