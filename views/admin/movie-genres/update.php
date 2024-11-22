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

<form action="<?= BASE_URL_ADMIN . '&action=movie-genres-update&id=' . $movieGenres['mg_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="movie_id" class="form-label">Tên phim:</label>
        <select class="form-select" name="movie_id" id="movie_id">
            <?php foreach ($moviePluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $movieGenres['m_id'] ? 'selected' : '' ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="genre_id" class="form-label">Tên thể loại:</label>
        <select class="form-select" name="genre_id" id="genre_id">
            <?php foreach ($genrePluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $movieGenres['g_id'] ? 'selected' : '' ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=movie-genres-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>