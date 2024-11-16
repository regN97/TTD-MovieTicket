<a href="<?= BASE_URL_ADMIN . '&action=ranks-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

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
            <th>Tên thứ hạng</th>
            <th>Mô tả lợi ích</th>
            <th>Mốc điểm của thứ hạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; foreach ($data as $rank) : ?>
            <td><?= $stt++ ?></td>
            <td><?= $rank['name'] ?></td>
            <td><?= $rank['benefits'] ?></td>
            <td><?= $rank['level'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=ranks-show&id=' . $rank['id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=ranks-updatePage&id=' . $rank['id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=ranks-delete&id=' . $rank['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>