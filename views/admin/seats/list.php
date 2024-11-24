<a href="<?= BASE_URL_ADMIN . '&action=seats-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

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
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Phòng chiếu</th>
            <th class="text-center">Loại ghế</th>
            <th class="text-center">Hàng ghế</th>
            <th class="text-center">Cột ghế</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1;
        foreach ($data as $seats): ?>
            <tr>
                <td class="text-center"><?= $stt++; ?></td>
                <td class="text-center"><?= $seats['r_name'] ?></td>
                <td class="text-center"><?= $seats['st_type'] ?></td>
                <td class="text-center"><?= $seats['s_seat_row'] ?></td>
                <td class="text-center"><?= $seats['s_seat_column'] ?></td>
                <td class="text-center"><?= $seats['s_status'] ?></td>

                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=seats-show&id=' . $seats['s_id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=seats-updatePage&id=' . $seats['s_id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=seats-delete&id=' . $seats['s_id'] ?>"
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
            <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL_ADMIN . '&action=seats-list' . '&page=' . ($page - 1) ?>">« Trước</a>
        <?php endif; ?>

        <?php
        // Trang đầu tiên luôn hiển thị
        $pages = [];
        $pages[] = 1;

        // Nếu trang hiện tại xa trang đầu, thêm dấu "..."
        if ($page > 3) {
            $pages[] = '...';
        }

        // Hiển thị các trang xung quanh trang hiện tại
        for ($i = max(2, $page - 1); $i <= min($totalPages - 1, $page + 1); $i++) {
            $pages[] = $i;
        }

        // Nếu trang hiện tại xa trang cuối, thêm dấu "..."
        if ($page < $totalPages - 2) {
            $pages[] = '...';
        }

        // Trang cuối cùng luôn hiển thị
        if ($totalPages > 1) {
            $pages[] = $totalPages;
        }

        foreach ($pages as $p):
            if ($p === '...'): ?>
            
                <span class="btn btn-light mx-1 disabled">...</span>
                <?php elseif ($p == $page): ?>
                <span class="btn btn-dark mx-1 active"><?= $p ?></span>
            <?php else: ?>
                <a class="btn btn-outline-dark mx-1" 
                   href="<?= BASE_URL_ADMIN . '&action=seats-list&page=' . $p ?>"><?= $p ?></a>
            <?php endif;
        endforeach;
        ?>

        <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL_ADMIN . '&action=seats-list' . '&page=' . ($page + 1) ?>">Sau »</a>
        <?php endif; ?>
    </div>
</div>