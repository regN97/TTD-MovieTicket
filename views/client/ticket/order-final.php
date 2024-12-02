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

<div class="bg-detail mt-2 mb-3">
    <div class="container py-3 text-white">
        <h3 class="mb-3">Vé phim của <?= $_SESSION['user']['name'] ?></h3>
        <form action="?action=sendMail" method="post">
            <div class="row">
                <?php foreach ($seatNameArr as $key => $value): ?>
                    <div class="col-4 w-25 mx-3 mb-3 bg-div text-dark">
                        <div class="row mb-2 p-2">
                            <label for="movie_name" class="form-label h6">Phim:</label>
                            <input disabled class="form-control" type="text" name="movie_name" value="<?= $data['movie_name'] ?>">
                        </div>
                        <div class="row mb-2 p-2">
                            <label for="start_at" class="form-label h6">Suất chiếu:</label>
                            <input disabled class="form-control" type="text" name="start_at" value="<?= $data['start_at'] ?>">
                        </div>
                        <div class="row mb-2 p-2">
                            <label for="room_name" class="form-label h6">Phòng:</label>
                            <input disabled class="form-control" type="text" name="room_name" value="<?= $data['room_name'] ?>">
                        </div>
                        <div class="row mb-2 p-2">
                            <label for="seats" class="form-label h6">Ghế:</label>
                            <input disabled class="form-control" type="text" name="<?= $key ?>" value="<?= $value ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
                <hr class="my-3">
                <h3 class="mb-3">Vé bắp & nước của <?= $_SESSION['user']['name'] ?></h3>
                <?php if (isset($data['sweet_quantity']) && $data['sweet_quantity'] > 0): ?>
                    <div class="col-4 w-25 mx-3 bg-div text-dark">
                        <div class="row mb-2 p-2">
                            <label for="fnd_name" class="form-label">Combo:</label>
                            <input hidden type="number" name="sweet_id" value="<?= $data['sweet_id'] ?>">
                            <input disabled type="text" name="sweet_name" value="<?= $data['sweet_name'] ?>">
                        </div>
                        <div class="row mb-2 p-2">
                            <label for="sweet_quantity">Số lượng:</label>
                            <input disabled type="text" name="sweet_quantity" value="<?= $data['sweet_quantity'] ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($data['beta_quantity']) && $data['beta_quantity'] > 0): ?>
                    <div class="col-4 w-25 mx-3 bg-div text-dark">
                        <div class="row mb-2 p-2">
                            <label for="fnd_name" class="form-label">Combo:</label>
                            <input hidden type="number" name="beta_id" value="<?= $data['beta_id'] ?>">
                            <input disabled type="text" name="beta_name" value="<?= $data['beta_name'] ?>">
                        </div>
                        <div class="row mb-2 p-2">
                            <label for="beta_quantity">Số lượng:</label>
                            <input disabled type="text" name="beta_quantity" value="<?= $data['beta_quantity'] ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($data['family_quantity']) && $data['family_quantity'] > 0): ?>
                    <div class="col-4 w-25 mx-3 bg-div text-dark">
                        <div class="row mb-2 p-2">
                            <label for="fnd_name" class="form-label">Combo:</label>
                            <input hidden type="number" name="family_id" value="<?= $data['family_id'] ?>">
                            <input disabled type="text" name="family_name" value="<?= $data['family_name'] ?>">
                        </div>
                        <div class="row mb-2 p-2">
                            <label for="family_quantity">Số lượng:</label>
                            <input disabled type="text" name="family_quantity" value="<?= $data['family_quantity'] ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <input type="text" name="movie_id" value="<?= $data['movie_id'] ?>" hidden>
                <input type="text" name="schedule_id" value="<?= $data['schedule_id'] ?>" hidden>
                <input type="text" name="room_id" value="<?= $data['room_id'] ?>" hidden>
                <input type="text" name="user_id" value="<?= $data['user_id'] ?>" hidden>
                <input type="text" name="total_price" value="<?= $data['total_price'] ?>" hidden>
                <input type="text" name="paymentMethod" value="<?= $data['paymentMethod'] ?>" hidden>
                <input type="text" name="order_id" value="<?= $orderCount ?>" hidden>
                <input type="text" name="seats" value="<?= $data['seats'] ?>" hidden>
            </div>

            <button class="btn btn-success mt-3" type="submit">Nhận email</button>
        </form>
    </div>
</div>