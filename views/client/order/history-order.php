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

<style>
    .nav-link {
        color: #000;
    }

    .nav-link:hover {
        color: red;
    }
</style>

<div class="container">
    <div class="row bg-light my-3">
        <!-- sidebar -->
        <nav class="col-md-3 sidebar p-3">
            <h4 class="text-danger fw-bold">TÀI KHOẢN TTD</h4>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="?action=info-user" class="nav-link active">THÔNG TIN CHUNG</a>
                </li>
                <li class="nav-item">
                    <a href="?action=form-update&id=<?= $users['u_id'] ?>" class="nav-link">CHI TIẾT TÀI KHOẢN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=info-rank&id=<?= $users['u_id'] ?>" class="nav-link">THẺ THÀNH VIÊN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=history-order&id=<?= $users['u_id'] ?>" class="nav-link text-danger">LỊCH SỬ GIAO DỊCH</a>
                </li>
            </ul>
        </nav>
        <div class="col-lg-9 p-4">
            <h3 class="text-center fw-bold">LỊCH SỬ GIAO DỊCH</h3>
            <div class="row mt-6">
                <div class="col-md-12">
                    <?php if (!empty($historyOrder)) { ?>
                        <h5>Xin chào <?= $historyOrder[0]['u_name'] ?>,</h5>
                        <p>Với trang này, bạn sẽ quản lý được tất cả các thông tin tài khoản của mình.</p>
                        <div class="row w-100">
                            <div class="row text-cente d-flex align-items-start justify-content-sm-around">
                                <?php
                                foreach ($historyOrder as $order): ?>
                                    <div class="transaction-card row">
                                        <div class="col-lg-8">
                                        <h3>Mã đơn hàng: <?= 'TTDMOVIE_' . $order['o_id']; ?></h3>
                                        <p><strong>Ngày tạo:</strong> <?= date_format(date_create($order['o_created_at']), "H:i / d-m-Y") ?></p>
                                        <p><strong>Trạng Thái:</strong> <?= $order['o_status'] ?></p>
                                        <p><strong>Phí Đơn hàng:</strong> <?= $order['o_total_price'] ?> VNĐ</p>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center justify-content-end">
                                        <a href="<?= BASE_URL . '?action=show-order&order-id=' . $order['o_id'] ?>"
                                            class="btn me-2 btn-outline-danger">Xem chi tiết</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <p>Chưa phát sinh giao dịch nào .</p>

                    <?php } ?>
                </div>

            </div>

        </div>
    </div>

</div>
</div>
</div>

<style>
    .transaction-card {
        background-color: rgb(254, 247, 221);
        /* Màu cam */
        color: #111111;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease;
    }

    .transaction-card h3 {
        margin: 0 0 10px;
        font-size: 16px;
    }

    .transaction-card p {
        margin: 5px 0;
    }

    .transaction-card:hover {
        transform: scale(1.02);
    }
</style>