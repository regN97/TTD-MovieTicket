<a href="<?= BASE_URL_ADMIN . '&action=movie-artists-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

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
            <th>STT</th>
            <th>Tên phim</th>
            <th>Tên nghệ sĩ</th>
            <th>Vai trò nghệ sĩ</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1;
        foreach ($data as $movieArtist) : ?>
            <td><?= $stt++ ?></td>
            <td><?= $movieArtist['m_name'] ?></td>
            <td><?= $movieArtist['a_name'] ?></td>
            <td><?= $movieArtist['a_roles'] ?></td>
            <td class="d-flex justify-content-center">
                <a href="<?= BASE_URL_ADMIN . '&action=movie-artists-show&id=' . $movieArtist['ma_id'] ?>"
                    class="btn btn-info">Xem</a>
                <a href="<?= BASE_URL_ADMIN . '&action=movie-artists-updatePage&id=' . $movieArtist['ma_id'] ?>"
                    class="btn btn-warning mx-2">Sửa</a>
                <a href="<?= BASE_URL_ADMIN . '&action=movie-artists-delete&id=' . $movieArtist['ma_id'] ?>"
                    onclick="return confirm('Bạn có chắc muốn xóa?')"
                    class="btn btn-danger">Xóa</a>
            </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="container mb-3">
    <div class="d-flex justify-content-start">
        <?php if ($page > 1): ?>
            <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL_ADMIN . '&action=movie-artists-list' . '&page=' . ($page - 1) ?>">« Trước</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a class="totalPages btn btn-outline-dark mx-1 col-1 " href="<?= BASE_URL_ADMIN . '&action=movie-artists-list' . '&page=' . $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL_ADMIN . '&action=movie-artists-list' . '&page=' . ($page + 1) ?>">Sau »</a>
        <?php endif; ?>
    </div>
</div>