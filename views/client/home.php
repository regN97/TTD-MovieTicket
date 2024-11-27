<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?= BASE_ASSETS_CSS . 'main.css'; ?>" rel="stylesheet" />
</head>

<style>
    .movies{
        text-decoration: none;
        font-size: x-large;
        color: #000;
    }
    .movies:hover{
        color: red;
        text-decoration: underline;
    }
</style>

<body class="bg-image bg-body">
    <?php require_once PATH_ASSETS_INC_CLIENT . 'navigation.php'; ?>
    <?php require_once PATH_ASSETS_INC_CLIENT . 'header.php'; ?>

    <!-- Section-->
    <section class="container mt-3">
        <div class="row bg-div">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_CLIENT . $view . '.php';
            } else { ?>
                <div class="d-flex justify-content-center text-center align-items-center">
                    <a href="<?= BASE_URL . '?action=movies-isShowing' ?>" class="movies fw-bold mx-4 my-2">Đang chiếu</a>
                    <span class="movies">|</span>
                    <a href="<?= BASE_URL . '?action=movies-upcoming' ?>" class="movies fw-bold mx-4 my-2">Sắp chiếu</a>
                </div>

                <!-- Phim Mới -->
                <section class="container my-5 d-flex justify-content-center">
                    <div class="col-md-10 d-flex flex-column ">
                    <h2 class="mb-4">Danh sách phim</h2>
                        <div class="row grid">
                            <?php if (isset($movie)) { ?>
                                <?php foreach ($movie as $movie) { ?>
                                    <div class="col-lg-2 col-md-4 col-sm-4 col-6">
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
                            <div class="d-flex justify-content-center">
                                <?php if ($page > 1): ?>
                                    <a class="btn btn-outline-dark  mx-1" href="<?= '?action=/' . '&page=' . ($page - 1) ?>">« Trước</a>
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
                                            href="<?= '?action=/' . '&page=' . $p ?>"><?= $p ?></a>
                                <?php endif;
                                endforeach;
                                ?>

                                <?php if ($page < $totalPages): ?>
                                    <a class="btn btn-outline-dark mx-1" href="<?= '?action=/' . '&page=' . ($page + 1) ?>">Sau »</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tin Tức -->
                <section class="container my-5">

                    <div class="row d-flex justify-content-center">
                    <h2 class="mb-4">Tin Tức</h2>

                        <div class="col-md-6">
                            <div class="card">
                            <a href="?action=new-content&id=<?= $hotnews['n_id'] ?>" class="list-group-item list-group-item-action">
                                <img src="<?= BASE_ASSETS_UPLOADS . $hotnews['n_imageURL'] ?>" class="card-img-top" alt="Tin 1">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate"><?= $hotnews['n_title'] ?></h5>
                                    <p class="card-text text-truncate"><?= $hotnews['n_content'] ?></< /p>
                                </div>
                                <small class="text-muted mx-3"><?= $hotnews['u_name'] ?> · <?= date_format(date_create($hotnews['n_created_at']), "d-m-Y") ?></small>
                                </a>
                            </div>
                        </div>

                        <div class="list-group col-md-5">
                            <?php if (isset($news)) {
                                $counter=0;
                            ?>
                                <?php foreach ($news as $news) {
                                    
                                    $counter++; ?>

                                    <?php if ($news['n_id'] == $hotnews['n_id']): continue; ?>
                                    <?php endif; ?>
                                    <a href="?action=new-content&id=<?= $news['n_id'] ?>" class="list-group-item list-group-item-action">
                                        <h6 class="mb-1"><?= $news['n_title'] ?></h6>
                                        <small class="text-muted"><?= $news['u_name'] ?> · <?= date_format(date_create($news['n_created_at']), "d-m-Y") ?></small>
                                    </a>

                                <?php
                                    if ($counter == 7) {
                                        break;
                                    }
                                } ?>
                            <?php } ?>
                        </div>

                    </div>
                </section>

            <?php } ?>
        </div>
    </section>

    <?php require_once PATH_ASSETS_INC_CLIENT . 'footer.php'; ?>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="/../duan1_TTDMovieTicket/assets/js/main.js"></script>
</body>

</html>