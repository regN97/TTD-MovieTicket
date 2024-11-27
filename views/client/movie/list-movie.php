<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $value): ?>
                <li><?= $value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php
    unset($_SESSION['errors']);
endif;
?>

<div class="bg-div row mt-2 mb-4 py-4">
    <div class="col-md-2">
        <div class="row">
            <div class="col-6 col-sm-12">
                <div class="dropdown genre-dropdown mb-4">
                    <a href="#" id="genresDropdown" class="btn btn-outline-dark dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        Tất cả
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="genresDropdown">
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Tất cả</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Hành động</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Kinh dị</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Gia đình</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Hài</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Tình cảm</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="setDropdownText(this)">Tâm lý</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="row grid">
            <?php if (isset($data)) { ?>
                <?php foreach ($data as $movie) { ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <div class="card card-xs mb-4">
                            <a href="?action=movies-detail&id=<?= $movie['id'] ?>" title="<?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>">
                                <?php if (!empty($movie['imageURL'])): ?>
                                    <img alt="<?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>" src="<?= BASE_ASSETS_UPLOADS . $movie['imageURL'] ?>" class="card-img-top lazyloaded">
                                <?php endif; ?>
                            </a>
                            <div class="card-body border-top">
                                <h3 class="text-truncate h5 mb-1">
                                    <a class="mv-title" href="?action=movies-detail&id=<?= $movie['id'] ?>" title="<?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>">
                                        <?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>
                                    </a>
                                </h3>
                                <div class="row no-gutters small">
                                    <div class="col text-muted">
                                        <?= date_format(date_create($movie['release_date']), "d/m") ?>
                                    </div>
                                    <div class="col text-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="container mb-2 ">
            <div class="d-flex justify-content-end">
                <?php if ($page > 1): ?>
                    <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL . '?action=' . $action . '&page=' . ($page - 1) ?>">« Trước</a>
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
                            href="<?= BASE_URL_ADMIN . '&action=' . $action . '&page=' . $p ?>"><?= $p ?></a>
                <?php endif;
                endforeach;
                ?>

                <?php if ($page < $totalPages): ?>
                    <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL . '?action=' . $action . '&page=' . ($page + 1) ?>">Sau »</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<style>
    .totalPages:hover {
        text-decoration: underline;
    }
</style>