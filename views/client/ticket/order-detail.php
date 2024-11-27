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
        <div class="row">
            <div class="col-7">
                <table class="table">
                    <h2>Chi tiết vé</h2>
                    <thead>
                        <tr>
                            <th>Hạng mục</th>
                            <th>Chi tiết</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Giảm giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ghế</td>
                            <td><?= $data['seats'] ?></td>
                            <td><?= $quantitySeats ?></td>
                            <td><span id="seatsPrice"></span> đ</td>
                            <td></td>
                        </tr>
                        <?php if (isset($data['sweet_id']) && isset($data['sweet_quantity'])): ?>
                            <?php if ($data['sweet_quantity'] > 0): ?>
                                <tr>
                                    <td>Bắp & nước</td>
                                    <td><?= $foodndrinks[0]['name'] ?></td>
                                    <td><?= $data['sweet_quantity'] ?></td>
                                    <td><span class="price"><?= $foodndrinks[0]['price'] * $data['sweet_quantity'] ?></span> đ</td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (isset($data['beta_id']) && isset($data['beta_quantity'])): ?>
                            <?php if ($data['beta_quantity'] > 0): ?>
                                <tr>
                                    <td>Bắp & nước</td>
                                    <td><?= $foodndrinks[1]['name'] ?></td>
                                    <td><?= $data['beta_quantity'] ?></td>
                                    <td><span class="price"><?= $foodndrinks[1]['price'] * $data['beta_quantity'] ?></span> đ</td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (isset($data['family_id']) && isset($data['family_quantity'])): ?>
                            <?php if ($data['family_quantity'] > 0): ?>
                                <tr>
                                    <td>Bắp & nước</td>
                                    <td><?= $foodndrinks[2]['name'] ?></td>
                                    <td><?= $data['family_quantity'] ?></td>
                                    <td><span class="price"><?= $foodndrinks[2]['price'] * $data['family_quantity'] ?></span> đ</td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>
                        <!-- Áp dụng discount vào tổng giá trị đơn hàng -->
                        <?php foreach ($ranks as $rank): ?>
                            <?php if ($user['u_points'] >= $rank['level'] && $user['ra_name'] == $rank['name']): ?>
                                <tr>
                                    <td>Thứ hạng</td>
                                    <td><?= $rank['name'] ?></td>
                                    <td></td>
                                    <td>
                                        <?php
                                        $discount = (int)$data['total_price'] * $rank['discount_percent'] / 100;
                                        echo $discount . " đ";
                                        ?>
                                    </td>
                                    <td><?= $rank['benefits'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tổng</td>
                                    <td>After discount</td>
                                    <td></td>
                                    <td><?= $total = (int)$data['total_price'] - $discount; ?> đ</td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!-- End discount -->
                    </tbody>
                </table>
                <hr>
                <form action="">
                    <h2>Thông tin người đặt vé</h2>
                    <div class="form-group my-2">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" name="u_name" class="form-control" value="<?= !empty($user['u_name']) ? $user['u_name'] : "" ?>">
                    </div>
                    <div class="form-group my-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="u_email" class="form-control" value="<?= !empty($user['u_email']) ? $user['u_email'] : "" ?>">
                    </div>
                    <div class="form-group my-2">
                        <label for="tel" class="form-label">Số điện thoại</label>
                        <input type="text" name="u_tel" class="form-control" value="<?= !empty($user['u_tel']) ? $user['u_tel'] : "" ?>">
                    </div>
                </form>
                <hr>

                <div class="row">
                    <form action="?action=fndOptions" method="POST">
                        <input type="text" name="room_id" value="<?= $data['room_id'] ?>" hidden>
                        <input type="text" name="schedule_id" value="<?= $data['schedule_id'] ?>" hidden>
                        <input type="text" name="movie_id" value="<?= $data['movie_id'] ?>" hidden>
                        <input type="text" name="seats" value="<?= $data['seats'] ?>" hidden>

                        <input type="text" name="total_price" value="<?php
                                                                        $previousTotalPrice = $data['total_price'];

                                                                        if (
                                                                            $data['sweet_quantity'] > 0
                                                                            || $data['beta_quantity'] > 0
                                                                            || $data['family_quantity'] > 0
                                                                        ) {
                                                                            if ($data['sweet_quantity'] > 0) {
                                                                                $previousTotalPrice -= $foodndrinks[0]['price'];
                                                                            }
                                                                            if ($data['beta_quantity'] > 0) {
                                                                                $previousTotalPrice -= $foodndrinks[1]['price'];
                                                                            }
                                                                            if ($data['family_quantity'] > 0) {
                                                                                $previousTotalPrice -= $foodndrinks[2]['price'];
                                                                            }
                                                                            echo $previousTotalPrice;
                                                                        } else {
                                                                            echo $data['total_price'];
                                                                        }
                                                                        ?>" hidden>

                        <?php if ($data['sweet_quantity'] > 0) { ?>
                            <input type="text" name="sweet_quantity" value="<?= $data['sweet_quantity'] ?>" hidden>
                        <?php } ?>
                        <?php if ($data['beta_quantity'] > 0) { ?>
                            <input type="text" name="beta_quantity" value="<?= $data['beta_quantity'] ?>" hidden>
                        <?php } ?>
                        <?php if ($data['family_quantity'] > 0) { ?>
                            <input type="text" name="family_quantity" value="<?= $data['family_quantity'] ?>" hidden>
                        <?php } ?>
                        <button type="submit" class="btn btn-danger text-center">Quay lại</button>
                    </form>
                </div>
            </div>
            <div class="col-4 mx-5 mt-5">
                <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                    <p class="fs-5 fw-semibold text-black-50">TỔNG ĐƠN HÀNG</p>
                    <p class="h3"><?= $total = (int)$data['total_price'] - $discount; ?> ₫</p>
                </div>
                <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                    <p>Vé đã mua không thể đổi hoặc hoàn tiền.
                        Mã vé sẽ được gửi <b>01</b> lần qua email đã nhập. Vui lòng kiểm tra lại thông tin trước khi tiếp tục.</p>
                </div>
                <div class="row bg-light rounded-3 mb-3 p-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tiếp tục
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <?php
                    if (
                        $data['beta_quantity'] > 0
                        || $data['sweet_quantity'] > 0
                        || $data['family_quantity'] > 0
                    ) { ?>
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content px-3">
                                <form action="?action=order-final" method="POST">
                                    <div class="row">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5 text-dark" id="exampleModalLabel">Vé của <?= $user['u_name'] ?></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        if (
                                            $data['beta_quantity'] > 0
                                            || $data['sweet_quantity'] > 0
                                            || $data['family_quantity'] > 0
                                        ) { ?>
                                            <div class="modal-body col-sm-6">
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phim</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="movie_name" class="form-control-plaintext" value="<?= mb_strtoupper($movies['name']) ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Suất chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="start_at" class="form-control-plaintext" value="<?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phòng chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="room_name" class="form-control-plaintext" value="<?= $rooms['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Ghế</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="seats" class="form-control-plaintext" value="<?= $data['seats'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Thông tin cá nhân</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="user_name" class="form-control-plaintext" value="<?= $user['u_name'] ?>">
                                                        <input type="text" readonly name="user_email" class="form-control-plaintext" value="<?= $user['u_email'] ?>">
                                                        <input type="text" readonly name="user_tel" class="form-control-plaintext" value="<?= $user['u_tel'] ?>">
                                                        <input type="text" hidden name="user_id" value="<?= $user['u_id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Tổng tiền</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="total_price" class="form-control-plaintext" value="<?php

                                                                                                                                                if (!empty($_SESSION['errors'])) {
                                                                                                                                                    echo $data['total_price'];
                                                                                                                                                } elseif ($discount > 0) {
                                                                                                                                                    echo (int)$data['total_price'] - $discount;
                                                                                                                                                } else {
                                                                                                                                                    echo "Lỗi";
                                                                                                                                                }
                                                                                                                                                ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phương thức thanh toán</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="paymentMethod">
                                                            <option value="">Lựa chọn phương thức thanh toán</option>
                                                            <option value="cash">Tiền mặt</option>
                                                            <option value="momo">Momo</option>
                                                            <option value="vnpay">Vnpay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body col-sm-6">
                                                <?php if (isset($data['sweet_id']) && isset($data['sweet_quantity'])): ?>
                                                    <?php if ($data['sweet_quantity'] > 0): ?>
                                                        <div class="mb-3 row">
                                                            <label for="sweet" class="fw-semibold col-sm-3 col-form-label text-dark">Bắp & nước</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="sweet_name" class="form-control-plaintext" value="<?= $foodndrinks[0]['name'] ?>">
                                                                <input type="text" readonly name="sweet_id" value="<?= $data['sweet_id'] ?>" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="sweet" class="fw-semibold col-sm-3 col-form-label text-dark">Số lượng</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="sweet_quantity" class="form-control-plaintext" value="<?= $data['sweet_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (isset($data['beta_id']) && isset($data['beta_quantity'])): ?>
                                                    <?php if ($data['beta_quantity'] > 0): ?>
                                                        <div class="mb-3 row">
                                                            <label for="beta" class="fw-semibold col-sm-3 col-form-label text-dark">Bắp & nước</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="beta_name" class="form-control-plaintext" value="<?= $foodndrinks[1]['name'] ?>">
                                                                <input type="text" readonly name="beta_id" value="<?= $data['beta_id'] ?>" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="beta" class="fw-semibold col-sm-3 col-form-label text-dark">Số lượng</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="beta_quantity" class="form-control-plaintext" value="<?= $data['beta_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if (isset($data['family_id']) && isset($data['family_quantity'])): ?>
                                                    <?php if ($data['family_quantity'] > 0): ?>
                                                        <div class="mb-3 row">
                                                            <label for="family" class="fw-semibold col-sm-3 col-form-label text-dark">Bắp & nước</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="family_name" class="form-control-plaintext" value="<?= $foodndrinks[2]['name'] ?>">
                                                                <input type="text" readonly name="family_id" value="<?= $data['family_id'] ?>" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="family" class="fw-semibold col-sm-3 col-form-label text-dark">Số lượng</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="family_quantity" class="form-control-plaintext" value="<?= $data['family_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php
                                        } else { ?>
                                            <div class="modal-body">
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phim</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="movie_name" class="form-control-plaintext" value="<?= mb_strtoupper($movies['name']) ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Suất chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="start_at" class="form-control-plaintext" value="<?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phòng chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="room_name" class="form-control-plaintext" value="<?= $rooms['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Ghế</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="seats" class="form-control-plaintext" value="<?= $data['seats'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Thông tin cá nhân</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="user_name" class="form-control-plaintext" value="<?= $user['u_name'] ?>">
                                                        <input type="text" readonly name="user_email" class="form-control-plaintext" value="<?= $user['u_email'] ?>">
                                                        <input type="text" readonly name="user_tel" class="form-control-plaintext" value="<?= $user['u_tel'] ?>">
                                                        <input type="text" hidden name="user_id" value="<?= $user['u_id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Tổng tiền</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="total_price" class="form-control-plaintext" value="<?php
                                                                                                                                                $discount = (int)$data['total_price'] * $rank['discount_percent'] / 100;
                                                                                                                                                if (!empty($_SESSION['errors'])) {
                                                                                                                                                    echo $data['total_price'];
                                                                                                                                                } elseif ($discount > 0) {
                                                                                                                                                    echo (int)$data['total_price'] - $discount;
                                                                                                                                                } else {
                                                                                                                                                    echo "Lỗi";
                                                                                                                                                }
                                                                                                                                                ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phương thức thanh toán</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="paymentMethod">
                                                            <option value="">Lựa chọn phương thức thanh toán</option>
                                                            <option value="cash">Tiền mặt</option>
                                                            <option value="momo">Momo</option>
                                                            <option value="vnpay">Vnpay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="modal-footer">
                                            <input type="text" name="room_id" value="<?= $data['room_id'] ?>" hidden>
                                            <input type="text" name="schedule_id" value="<?= $data['schedule_id'] ?>" hidden>
                                            <input type="text" name="movie_id" value="<?= $data['movie_id'] ?>" hidden>
                                            <button type="submit" class="btn btn-success">Tiến hành tạo vé và gửi mail chi tiết</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="modal-dialog">
                            <div class="modal-content px-3">
                                <form action="?action=order-final" method="POST">
                                    <div class="row">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5 text-dark" id="exampleModalLabel">Vé của <?= $user['u_name'] ?></h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        if (
                                            $data['beta_quantity'] > 0
                                            || $data['sweet_quantity'] > 0
                                            || $data['family_quantity'] > 0
                                        ) { ?>
                                            <div class="modal-body col-sm-6">
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phim</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="movie_name" class="form-control-plaintext" value="<?= mb_strtoupper($movies['name']) ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Suất chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="start_at" class="form-control-plaintext" value="<?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phòng chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="room_name" class="form-control-plaintext" value="<?= $rooms['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Ghế</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="seats" class="form-control-plaintext" value="<?= $data['seats'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Thông tin cá nhân</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="user_name" class="form-control-plaintext" value="<?= $user['u_name'] ?>">
                                                        <input type="text" readonly name="user_email" class="form-control-plaintext" value="<?= $user['u_email'] ?>">
                                                        <input type="text" readonly name="user_tel" class="form-control-plaintext" value="<?= $user['u_tel'] ?>">
                                                        <input type="text" hidden name="user_id" value="<?= $user['u_id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Tổng tiền</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="total_price" class="form-control-plaintext" value="<?php

                                                                                                                                                if (!empty($_SESSION['errors'])) {
                                                                                                                                                    echo $data['total_price'];
                                                                                                                                                } elseif ($discount > 0) {
                                                                                                                                                    echo (int)$data['total_price'] - $discount;
                                                                                                                                                } else {
                                                                                                                                                    echo "Lỗi";
                                                                                                                                                }
                                                                                                                                                ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phương thức thanh toán</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="paymentMethod">
                                                            <option value="">Lựa chọn phương thức thanh toán</option>
                                                            <option value="cash">Tiền mặt</option>
                                                            <option value="momo">Momo</option>
                                                            <option value="vnpay">Vnpay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body col-sm-6">
                                                <?php if (isset($data['sweet_id']) && isset($data['sweet_quantity'])): ?>
                                                    <?php if ($data['sweet_quantity'] > 0): ?>
                                                        <div class="mb-3 row">
                                                            <label for="sweet" class="fw-semibold col-sm-3 col-form-label text-dark">Bắp & nước</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="sweet_name" class="form-control-plaintext" value="<?= $foodndrinks[0]['name'] ?>">
                                                                <input type="text" readonly name="sweet_id" value="<?= $data['sweet_id'] ?>" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="sweet" class="fw-semibold col-sm-3 col-form-label text-dark">Số lượng</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="sweet_quantity" class="form-control-plaintext" value="<?= $data['sweet_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (isset($data['beta_id']) && isset($data['beta_quantity'])): ?>
                                                    <?php if ($data['beta_quantity'] > 0): ?>
                                                        <div class="mb-3 row">
                                                            <label for="beta" class="fw-semibold col-sm-3 col-form-label text-dark">Bắp & nước</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="beta_name" class="form-control-plaintext" value="<?= $foodndrinks[1]['name'] ?>">
                                                                <input type="text" readonly name="beta_id" value="<?= $data['beta_id'] ?>" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="beta" class="fw-semibold col-sm-3 col-form-label text-dark">Số lượng</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="beta_quantity" class="form-control-plaintext" value="<?= $data['beta_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if (isset($data['family_id']) && isset($data['family_quantity'])): ?>
                                                    <?php if ($data['family_quantity'] > 0): ?>
                                                        <div class="mb-3 row">
                                                            <label for="family" class="fw-semibold col-sm-3 col-form-label text-dark">Bắp & nước</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="family_name" class="form-control-plaintext" value="<?= $foodndrinks[2]['name'] ?>">
                                                                <input type="text" readonly name="family_id" value="<?= $data['family_id'] ?>" hidden>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="family" class="fw-semibold col-sm-3 col-form-label text-dark">Số lượng</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" readonly name="family_quantity" class="form-control-plaintext" value="<?= $data['family_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php
                                        } else { ?>
                                            <div class="modal-body">
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phim</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="movie_name" class="form-control-plaintext" value="<?= mb_strtoupper($movies['name']) ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Suất chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="start_at" class="form-control-plaintext" value="<?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phòng chiếu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="room_name" class="form-control-plaintext" value="<?= $rooms['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Ghế</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="seats" class="form-control-plaintext" value="<?= $data['seats'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Thông tin cá nhân</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="user_name" class="form-control-plaintext" value="<?= $user['u_name'] ?>">
                                                        <input type="text" readonly name="user_email" class="form-control-plaintext" value="<?= $user['u_email'] ?>">
                                                        <input type="text" readonly name="user_tel" class="form-control-plaintext" value="<?= $user['u_tel'] ?>">
                                                        <input type="text" hidden name="user_id" value="<?= $user['u_id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Tổng tiền</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly name="total_price" class="form-control-plaintext" value="<?php

                                                                                                                                                if (!empty($_SESSION['errors'])) {
                                                                                                                                                    echo $data['total_price'];
                                                                                                                                                } elseif ($discount > 0) {
                                                                                                                                                    echo (int)$data['total_price'] - $discount;
                                                                                                                                                } else {
                                                                                                                                                    echo "Lỗi";
                                                                                                                                                }
                                                                                                                                                ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="r_name" class="fw-semibold col-sm-3 col-form-label text-dark">Phương thức thanh toán</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="paymentMethod">
                                                            <option value="">Lựa chọn phương thức thanh toán</option>
                                                            <option value="cash">Tiền mặt</option>
                                                            <option value="momo">Momo</option>
                                                            <option value="vnpay">Vnpay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="modal-footer">
                                            <input type="text" name="room_id" value="<?= $data['room_id'] ?>" hidden>
                                            <input type="text" name="schedule_id" value="<?= $data['schedule_id'] ?>" hidden>
                                            <input type="text" name="movie_id" value="<?= $data['movie_id'] ?>" hidden>
                                            <button type="submit" class="btn btn-success">Tiến hành tạo vé và gửi mail chi tiết</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Logic hiển thị thông tin lên table tóm tắt đơn hàng
    const seatTypePrice = {
        'A': <?= $seatTypes[1]['price'] ?>,
        'B': <?= $seatTypes[1]['price'] ?>,
        'C': <?= $seatTypes[1]['price'] ?>,
        'D': <?= $seatTypes[0]['price'] ?>,
        'E': <?= $seatTypes[0]['price'] ?>,
        'F': <?= $seatTypes[0]['price'] ?>,
        'G': <?= $seatTypes[0]['price'] ?>,
        'H': <?= $seatTypes[2]['price'] ?>,
    }

    const seatsArray = '<?= $data['seats'] ?>'.split(' ');

    let seatsPrice = 0;
    let fndPrice = 0;
    seatsArray.forEach(seat => {
        const firstLetter = seat[0]
        seatsPrice += seatTypePrice[firstLetter];
    })

    document.getElementById('seatsPrice').textContent = seatsPrice;
</script>