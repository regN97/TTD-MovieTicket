<?php
    if (isset($_SESSION['success'])) {
        $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

        echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

        unset($_SESSION['success']);
        unset($_SESSION['msg']);
    }
    ?>
<div class="bg-detail text-white mt-2 mb-3">
<div class="container py-3">
<div class="row row-sm">
                <div class="d-none d-sm-block col-2">
                    <a href="" title="ảnh phim">
                        <img src="<?= BASE_ASSETS_UPLOADS . $news['n_imageURL'] ?>" class="img-fluid rounded border ls-is-cached lazyloaded">
                    </a>
                </div>
                <div class="col-12 col-sm-10">
                <div class="mb-3 text-sm-left d-flex align-item-center justify-content-between">
                    <span class="mb-0  text-danger fs-1"> <?= $news['n_title']?></span>
                    <div class="mb-3 text-sm-right">
                    <h6 class="mb-0 ">Người đăng: <?= $news['u_name'] ?></h6>
                    <h7 class="mb-0 ">Ngày đăng: <?= date_format(date_create( $news['n_created_at']), " H:i - d-m-Y") ?> </h7>
                    </div>
                </div>
                
                <div class="row">
                <span class="mb-0" style="white-space: pre-wrap;"><?= htmlspecialchars($news['n_content']) ?></span>
                </div>
                </div>
</div>
</div>

</div>
