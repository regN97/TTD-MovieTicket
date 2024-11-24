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
    <div class="col-md-12">
        <div class="row grid">
            <?php if (isset($data)) { ?>
                <?php foreach ($data as $news) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                        <div class="card card-xs mb-4">
                            <a href="?action=new-content&id=<?= $news['id'] ?>" title="<?= mb_convert_case($news['title'], MB_CASE_TITLE, "UTF-8"); ?>">
                                <?php if (!empty($news['imageURL'])): ?>
                                    <img alt="<?= mb_convert_case($news['title'], MB_CASE_TITLE, "UTF-8"); ?>" src="<?= BASE_ASSETS_UPLOADS . $news['imageURL'] ?>" class="card-img-top lazyloaded">   
                                <?php endif; ?>
                            </a>
                            <div class="card-body border-top">
                                <div class="row no-gutters small">
                                    <div class="col text-muted">
                                       <h5 mb-0 text-truncate> <?= date_format(date_create($news['created_at']), "d-m") ?></h5>
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
    <!-- <div class="d-flex justify-content-end">
        <?php if ($page > 1): ?>
            <a class="btn btn-outline-dark  mx-1" href="<?= BASE_URL . '?action='.$action . '&page=' . ($page - 1) ?>">« Trước</a>
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
                   href="<?= BASE_URL_ADMIN . '&action='.$action.'&page=' . $p ?>"><?= $p ?></a>
            <?php endif;
        endforeach;
        ?>

        <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-dark mx-1" href="<?= BASE_URL . '?action='.$action . '&page=' . ($page + 1) ?>">Sau »</a>
        <?php endif; ?>
    </div> -->
</div>
    </div>
</div>
<style>
    .totalPages:hover {
        text-decoration: underline;
    }
    .card-img-top{
        aspect-ratio: 1 / 1.25;
    }
</style>