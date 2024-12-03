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
                    <a href="?action=form-update&id=<?= $user['u_id'] ?>" class="nav-link">CHI TIẾT TÀI KHOẢN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=info-rank&id=<?= $user['u_id'] ?>" class="nav-link text-danger">THẺ THÀNH VIÊN</a>
                </li>
                <li class="nav-item">
                    <a href="?action=history-order&id=<?= $user['u_id'] ?>" class="nav-link">LỊCH SỬ GIAO DỊCH</a>
                </li>
            </ul>
        </nav>
        <div class="col-lg-9 p-4">
            <h3 class="text-center fw-bold">THÔNG TIN THỨ HẠNG</h3>
            <div class="row mt-6">
                <!-- Profile Picture -->
                <div class="col-md-3 text-center d-flex flex-column align-items-center">
                    <img src="<?= BASE_ASSETS_UPLOADS . $user['u_imageURL'] ?>" alt="Avatar" class="rounded-circle mb-3" style="width: 150px;height: 150px;">
                </div>
                <!-- User Details -->
                <div class="col-md-7">
                    <h5>Xin chào <?= $user['u_name'] ?>,</h5>
                    <p>Với trang này, bạn sẽ quản lý được tất cả các thông tin tài khoản của mình.</p>
                    <div class="row border border-dark rounded ">
                        <div class="row text-cente d-flex align-items-start justify-content-sm-around">
                            <div class="col-4 d-flex align-items-center flex-column">
                                <p class="mb-1 fw-semibold">Thứ hạng</p>
                                <p class="mb-1 p-2 mx-1 badge bg-danger"><?= $user['ra_name'] ?></p>
                            </div>
                            <div class="col-4 d-flex align-items-center flex-column">
                                <p class="mb-1 fw-semibold">Điểm CGV</p>
                                <p class="mb-1 mx-1"><?= $user['u_points'] ?> P</p>
                            </div>
                        </div>
                        <div class="mx-1 my-3">
                            <p class="mb-0 text-wrap text-success">👉 <?= $user['ra_benefits'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row rounded border border-dark">
                    <div class="col-7 me-5">
                        <h5 class="my-2">Các Thứ Hạng Hiện Có</h5>
                        <?php foreach ($rank as $ra): ?>
                            <div class="row mb-3">
                                <span class="mb-1">✅<?= $ra['level'] ?> điểm</span>
                                <span class="w-25 mb-1 mx-2 badge bg-danger col-2 py-2"><?= $ra['name'] ?></span> 👉
                                <span class="col text-success fw-semibold"><?= $ra['benefits'] ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-4">
                        <h5 class="my-2">Cấp độ tiếp theo</h5>
                        <?php
                        $rankName = array_column($rank, 'name');
                        foreach ($rank as $ra) {
                            if ($ra['level'] < $user['u_points'] && $user['ra_name'] == "Diamond") {
                                echo "<span class='text-success fw-bold'>Bạn đã đạt thứ hạng cao nhất 🎉</span>";
                                break;
                            }
                            if ($user['ra_name'] == "Member") {
                                echo "<span class='text-success fw-bold'>Bạn cần " . 500 - (int)$user['u_points']  . " điểm nữa để tới rank tiếp theo 🎉</span>";
                                break;
                            }
                            if ($user['ra_name'] == "Silver") {
                                echo "<span class='text-success fw-bold'>Bạn cần " . 1200 - (int)$user['u_points']  . " điểm nữa để tới rank tiếp theo 🎉</span>";
                                break;
                            }
                            if ($user['ra_name'] == "Gold") {
                                echo "<span class='text-success fw-bold'>Bạn cần " . 2000 - (int)$user['u_points'] . " điểm nữa để tới rank tiếp theo 🎉</span>";
                                break;
                            }
                            if ($user['ra_name'] == "Platinum") {
                                echo "<span class='text-success fw-bold'>Bạn cần " . 3000 - (int)$user['u_points'] . " điểm nữa để tới rank tiếp theo 🎉</span>";
                                break;
                            }
                        ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


</div>