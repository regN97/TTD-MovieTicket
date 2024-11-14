<a href="<?= BASE_URL_ADMIN . '&action=genres-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên thể loại</th>
            <th>Mô tả</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $genre): ?>
            <tr>
                <td><?= $genre['id'] ?></td>
                <td><?= $genre['name'] ?></td>
                <td><?php 
                    $maxLength = 50;
                    $shortenData = mb_substr($genre['description'], 0, $maxLength, 'UTF-8');
                    echo $shortenData . ' ...';
                ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=genres-show&id=' . $genre['id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=genres-updatePage&id=' . $genre['id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=genres-delete&id=' . $genre['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>