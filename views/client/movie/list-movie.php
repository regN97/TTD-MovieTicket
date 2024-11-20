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
        </tr>
    </thead>
    <tbody>
        <?php if (empty($_SESSION['result'])) { ?>
            <?php $stt = 1;
            foreach ($data as $movie): ?>
                <tr>
                    <td class="text-center"><?= $stt++; ?></td>
                    <td class="text-center"><?= $movie['name'] ?></td>
                    <td class="text-center"><?= mb_substr($movie['description'], 0, 50, 'UTF-8') . ' ...'; ?></td>
                    <td class="text-center"><?= $movie['duration'] ?></td>
                    <td class="text-center"><?= $movie['release_date'] ?></td>
                    <td class="text-center"><?= $movie['language'] ?></td>
                    <td class="text-center">
                        <?php if (!empty($movie['imageURL'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $movie['imageURL'] ?>" width="100px">
                        <?php endif; ?>
                    </td>
                    <td class="text-center"><?= $movie['type'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <?php $stt = 1;
            foreach ($_SESSION['result'] as $movie): ?>
                <tr>
                    <td class="text-center"><?= $stt++; ?></td>
                    <td class="text-center"><?= $movie['name'] ?></td>
                    <td class="text-center"><?= mb_substr($movie['description'], 0, 50, 'UTF-8') . ' ...'; ?></td>
                    <td class="text-center"><?= $movie['duration'] ?></td>
                    <td class="text-center"><?= $movie['release_date'] ?></td>
                    <td class="text-center"><?= $movie['language'] ?></td>
                    <td class="text-center">
                        <?php if (!empty($movie['imageURL'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $movie['imageURL'] ?>" width="100px">
                        <?php endif; ?>
                    </td>
                    <td class="text-center"><?= $movie['type'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php unset($_SESSION['result']);
        } ?>
    </tbody>
</table>

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
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card card-xs mb-4">
                <a href="/phim/paddington-gau-thu-chu-du/" title="Paddington: Gấu Thủ Chu Du">
                    <img alt="Paddington: Gấu Thủ Chu Du" src="https://cdn.moveek.com/storage/media/cache/short/6729c0ad0d674052301821.jpg" class="card-img-top lazyloaded">
                </a>
                <div class="card-body border-top">
                    <h3 class="text-truncate h5 mb-1">
                        <a href="/phim/paddington-gau-thu-chu-du/" title="Paddington: Gấu Thủ Chu Du">
                            Paddington: Gấu Thủ Chu Du
                        </a>
                    </h3>
                    <div class="row no-gutters small">
                        <div class="col text-muted">
                            29/01
                        </div>
                        <div class="col text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>