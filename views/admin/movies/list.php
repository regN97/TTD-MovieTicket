<a href="<?= BASE_URL_ADMIN . '&action=movies-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

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
            <th class="text-center">Tên phim</th>
            <th class="text-center">Mô tả</th>
            <th class="text-center">Thời lượng</th>
            <th class="text-center">Ngày công chiếu</th>
            <th class="text-center">Ngôn ngữ</th>
            <th class="text-center">Ảnh bìa</th>
            <th class="text-center">Phân loại phim</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1;
        foreach ($data as $movie): ?>
            <tr>
                <td class="text-center"><?= $stt++; ?></td>
                <td class="text-center"><?= $movie['name'] ?></td>
                <td class="text-center"><?php
                                        $maxLength = 50;
                                        $shortenData = mb_substr($movie['description'], 0, $maxLength, 'UTF-8');
                                        echo $shortenData . ' ...';
                                        ?></td>
                <td class="text-center"><?= $movie['duration'] ?></td>
                <td class="text-center"><?= $movie['release_date'] ?></td>
                <td class="text-center"><?= $movie['language'] ?></td>
                <td class="text-center">
                    <?php if (!empty($movie['imageURL'])): ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . $movie['imageURL'] ?>" width="100px">
                    <?php endif; ?>
                </td>
                <td class="text-center"><?= $movie['type'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=movies-show&id=' . $movie['id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=movies-updatePage&id=' . $movie['id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=movies-delete&id=' . $movie['id'] ?>"
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
            <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL_ADMIN . '&action=movies-list' . '&page=' . ($page - 1) ?>">« Trước</a>
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
                   href="<?= BASE_URL_ADMIN . '&action=movies-list&page=' . $p ?>"><?= $p ?></a>
            <?php endif;
        endforeach;
        ?>

        <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL_ADMIN . '&action=movies-list' . '&page=' . ($page + 1) ?>">Sau »</a>
        <?php endif; ?>
    </div>
</div>