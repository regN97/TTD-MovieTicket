<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<style>
    .totalPages:hover {
        text-decoration: underline;
    }
</style>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">Mã đơn hàng</th>
            <th class="text-center">Tài khoản</th>
            <th class="text-center">Thành tiền</th>
            <th class="text-center">Phương thức thanh toán</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $order): ?>
            <tr>
                <td class="text-center"><?= $order['id'] ?></td>

                <td class="text-center"><?php
                                        foreach ($users as $user) {
                                            if ($user['id'] == $order['user_id']) {
                                                echo $user['name'];
                                            }
                                        }
                                        ?></td>

                <td class="text-center"><?= $order['total_price'] . "đ  " ?></td>
                <td class="text-center"><?= $order['paymentMethod'] ?></td>
                <td class="text-center"><?= $order['status'] ?> <a href="<?= BASE_URL_ADMIN . '&action=order-update&status=' . $order['status'] . '&id=' . $order['id'] ?>"
                        class="btn btn-success btn-sm mb-2 rounded-pill">Change</a></td>
                <td class="text-center"><?= date_format(date_create($order['created_at']), "H:i / d-m-Y") ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=order-show&order-id=' . $order['id'] ?>"
                        class="btn btn-info me-2">Chi tiết</a>
                </td>
            </tr>
        <?php
        endforeach; ?>
    </tbody>
</table>