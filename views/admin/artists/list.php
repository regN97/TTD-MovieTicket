<a href="<?= BASE_URL_ADMIN . '&action=artists-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

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
            <th>Ảnh</th>
            <th>Tên nghệ sĩ</th>
            <th>Vai trò</th>
            <th>Thông tin</th>
            <th>Quê quán</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=1; foreach ($data as $artist) : ?>
            <td><?= $stt++ ?></td>
            <td>
                <?php if(!empty($artist['imageURL'])) : ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $artist['imageURL'] ?>" width="100px">
                <?php endif; ?>
            </td>
            <td><?= $artist['name'] ?></td>
            <td><?= $artist['roles'] ?></td>
            <td><?php
                $maxLength = 50;
                $shortenData = mb_substr($artist['bio'], 0, $maxLength, 'UTF-8');
                echo $shortenData . ' ...';
            ?></td>
            <td><?= $artist['country'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=artists-show&id=' . $artist['id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=artists-updatePage&id=' . $artist['id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=artists-delete&id=' . $artist['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>