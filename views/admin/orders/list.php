
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
            <th class="text-center">STT</th>
            <th class="text-center">Giá</th>
            <th class="text-center">Ngày tạo</th>            
            <th class="text-center">Người mua</th>
            <th class="text-center">Phương thức thanh toán</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt = 1;
        foreach ($data as $order): ?>
            <tr>
                <td class="text-center"><?= $stt++; ?></td>
                <td class="text-center"><?= $order['o_total_price'] ?></td>
                <td class="text-center"><?= $order['o_created_at'] ?></td>
                <td class="text-center"><?= $order['u_name'] ?></td>
                <td class="text-center"><?= $order['o_paymentMethod'] ?></td>
                <td class="text-center"><?= $order['o_status'] ?></td>
                <td class="text-center"><?= $order['t_description'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=order-show&id=' . $order['o_id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=order-updatePage&id=' . $order['o_id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=order-delete&id=' . $order['o_id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Hủy</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>