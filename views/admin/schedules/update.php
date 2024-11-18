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

<form action="<?= BASE_URL_ADMIN . '&action=schedules-update&id=' . $schedule['s_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="room_id" class="form-label">Phòng chiếu:</label>
        <select class="form-select" name="room_id" id="room_id">
            <?php foreach ($roomPluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $schedule['r_id'] ? 'selected' : null ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="movie_id" class="form-label">Phim:</label>
        <select class="form-select" name="movie_id" id="movie_id">
            <?php foreach ($moviePluck as $id => $name): ?>

                <option value="<?= $id ?>"
                    <?= $id == $schedule['m_id'] ? 'selected' : null ?>><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="start_at" class="form-label">Bắt đầu vào:</label>
        <input type="datetime-local" name="start_at" id="start_at" class="form-control"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['start_at'];
                    } else {
                        echo $schedule['s_start_at'];
                    } ?>">
    </div>
    <div class="my-3">
        <label for="end_at" class="form-label">Kết thúc vào:</label>
        <input type="datetime-local" name="end_at" id="end_at" class="form-control"
            value="<?php if (isset($_SESSION['data'])) {
                        echo $_SESSION['data']['end_at'];
                    } else {
                        echo $schedule['s_end_at'];
                    } ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=schedules-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>