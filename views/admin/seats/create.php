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

<form action="<?= BASE_URL_ADMIN . '&action=seats-store' ?>" method="post" enctype="multipart/form-data">
    <div class="my-3">
        <label for="room_id" class="form-label">Phòng chiếu:</label>
        <select class="form-select" name="room_id" id="room_id">
            <?php foreach ($roomPluck as $id => $name): ?>

                <option value="<?= $id ?>"><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="type_id" class="form-label">Loại ghế:</label>
        <select class="form-select" name="type_id" id="type_id">
            <?php foreach ($seatTypePluck as $id => $name): ?>

                <option value="<?= $id ?>"><?= $name ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="my-3">
        <label for="seat_row" class="form-label">Hàng ghế:</label>
        <input type="text" name="seat_row" id="seat_row" class="form-control"
            value="<?= $_SESSION['data']['seat_row'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="type" class="form-label">Cột ghế:</label>
        <input type="text" name="seat_column" id="seat_column" class="form-control"
            value="<?= $_SESSION['data']['seat_column'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="status" class="form-label">Trạng thái:</label>
        <select class="form-select" name="status" id="status">
            <option value="Active" <?php if (isset($_SESSION['data']['status']) && $_SESSION['data']['status'] === 'Active') echo 'selected' ?>>Active</option>
            <option value="Deactive" <?php if (isset($_SESSION['data']['status']) && $_SESSION['data']['status'] === 'Deactive') echo 'selected' ?>>Deactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASE_URL_ADMIN . '&action=seats-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>