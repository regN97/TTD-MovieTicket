<a href="<?= BASE_URL_ADMIN . '&action=news-create' ?>" class="btn btn-primary mb-3">Thêm mới</a>

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
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Hình ảnh</th>
        <th>Thời điểm tạo</th>
        <th>Người tạo</th>
        <th>Thao tác</th>
    </tr>

    <?php foreach ($data as $key => $news):
        // debug($data);
    ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?php
                $maxLength = 20;
                $shortenData = mb_substr($news['n_title'], 0, $maxLength, 'UTF-8');
                echo $shortenData . ' ...';
                ?></td>
            <td><?php
                $maxLength = 50;
                $shortenData = mb_substr($news['n_content'], 0, $maxLength, 'UTF-8');
                echo $shortenData . ' ...';
                ?></td>
            <td>
                <?php if (!empty($news['n_imageURL'])) : ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $news['n_imageURL'] ?>" width="100px">
                <?php endif; ?>
            </td>
            <td><?= $news['n_created_at'] ?></td>
            <td><?= $news['u_name'] ?></td>
            <td>
                <a href="<?= BASE_URL_ADMIN . '&action=news-show&id=' . $news['n_id'] ?>"
                    class="btn btn-info">Xem</a>

                <a href="<?= BASE_URL_ADMIN . '&action=news-updatePage&id=' . $news['n_id'] ?>"
                    class="btn btn-warning ms-3 me-3">Sửa</a>

                <a href="<?= BASE_URL_ADMIN . '&action=news-delete&id=' . $news['n_id'] ?>"
                    onclick="return confirm('Bạn có chắc muốn xoá?')"
                    class="btn btn-danger">Xoá</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="container mb-3">
    <div class="d-flex justify-content-start">
        <?php if ($page > 1): ?>
            <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL_ADMIN . '&action=news-list' . '&page=' . ($page - 1) ?>">« Trước</a>
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
                    href="<?= BASE_URL_ADMIN . '&action=news-list&page=' . $p ?>"><?= $p ?></a>
        <?php endif;
        endforeach;
        ?>

        <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL_ADMIN . '&action=news-list' . '&page=' . ($page + 1) ?>">Sau »</a>
        <?php endif; ?>
    </div>
</div>