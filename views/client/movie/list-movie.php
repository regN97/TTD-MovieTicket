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

<form action="?action=movies-search" method="post" class="input-group w-25 mb-3">
    <input type="text" name="movies-search" id="name" class="form-control rounded me-3" 
           placeholder="Search"/>
    <button type="submit" class="btn btn-outline-primary">Search</button>
</form>

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
        <?php if(empty($_SESSION['result'])) { ?>
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
            <?php endforeach;?>
        <?php unset($_SESSION['result']); } ?>
    </tbody>
</table>