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
    <h4 class="text-center">Phim</h4>
    <div class="row grid">
        <?php if (!empty($_SESSION['result'])) { ?>
            <?php foreach ($_SESSION['result'] as $movie) { ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="card card-xs mb-4">
                        <a href="?action=movies-details&id=<?= $movie['id'] ?>" title="<?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>">
                            <?php if (!empty($movie['imageURL'])): ?>
                                <img alt="<?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>" src="<?= BASE_ASSETS_UPLOADS . $movie['imageURL'] ?>" class="card-img-top lazyloaded">
                            <?php endif; ?>
                        </a>
                        <div class="card-body border-top">
                            <h3 class="text-truncate h5 mb-1">
                                <a class="mv-title" href="?action=movies-details&id=<?= $movie['id'] ?>" title="<?= mb_convert_case($movie['name'], MB_CASE_TITLE, "UTF-8"); ?>">
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
        <?php } else { ?>
            <p>Không tìm thấy kết quả theo từ khóa '<?= $_SESSION['searchKey'] ?>'</p>
        <?php unset($_SESSION['searchKey']);
        } ?>
    </div>
</div>