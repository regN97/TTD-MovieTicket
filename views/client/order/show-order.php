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
                
                    <?php $stt = 1;
                    $schedule_id = '';
                   
                    foreach ($tickets as $ticket): $schedule_id = $ticket['t_schedule_id'] ?>
                        <div class="cardWrap col-md-6">
                            <div class="card cardLeft">
                                <h1>TTD<span>Movie</span></h1>
                                <div class="title">
                                    <h2><?= $ticket['m_name'] ?></h2>
                                    <span>Tên Phim</span>
                                </div>
                                <div class="ticket">
                                <div class="name">
                                    <h2><?= $ticket['se_seat_row'] . $ticket['se_seat_column'] ?></h2>
                                    <span>Vị trí ghế</span>
                                </div>
                                <div class="time">
                                    <h2><?= date_format(date_create($ticket['sch_start_at']), "H:i / d-m-Y") ?></h2>
                                    <span>Lịch chiếu</span>
                                </div>
                                </div>
                            </div>
                            <div class="card cardRight">
                                <div class="number">
                                    <h3><?= $ticket['se_seat_row'] . $ticket['se_seat_column'] ?></h3>
                                    <span>Vị trí ghế</span>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-lg-3 my-3">
                            <?php if ($orderStatus['status'] == "Chưa thanh toán"): ?>
                        <a href="<?= BASE_URL . '?action=delete-order&id=' . $id . '&schedule-id=' . $schedule_id ?>"
                            onclick="return confirm('Bạn có chắc muốn xóa?')"
                            class="btn btn-danger mb-3">Hủy đơn hàng</a>
                            <?php endif; ?>
                        <a href="<?= BASE_URL . '?action=history-order&id=' . $users['u_id'] ?>" class="btn btn-outline-danger mb-3">Quay lại danh sách</a>
                    </div>

            </div>

        </div>
    </div>

</div>
</div>
</div>

<style>
    .cardWrap {
        width: 45%;
        margin: 10px;
        flex-wrap: wrap;
        color: #fff;
        font-family: sans-serif;
    }

    .card {
        background: linear-gradient(to bottom, #e84c3d 0%, #e84c3d 26%, #ecedef 26%, #ecedef 100%);
        height: 125px;
        float: left;
        position: relative;
        padding: 1em;
        margin-top: 10px;
    }

    .cardLeft {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        width: 60%;
    }

    .cardRight {
        width: 25%;
        border-left: .18em dashed #fff;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;

        &:before,
        &:after {
            content: "";
            position: absolute;
            display: block;
            width: .9em;
            height: .9em;
            background: #fff;
            border-radius: 50%;
            left: -.5em;
        }

        &:before {
            top: -.4em;
        }

        &:after {
            bottom: -.4em;
        }
    }

    h1 {
        font-size: 13px;
        margin-top: -5px;

        span {
            font-weight: normal;
        }
    }

    .ticket{
        display: flex;
        gap: 15px;
    }
    .title,
    .name,
    .seat,
    .time {
        text-transform: uppercase;
        font-weight: normal;

        h2 {
            font-size: 10px;
            color: #525252;
            margin: 0;
        }

        span {
            font-size: 10px;
            color: #a2aeae;
        }
    }

    .title {
        margin: 3px 0 0 0;
    }

    .name,
    .seat {
        margin: 3px 0 0 0;
    }

    .time {
        margin: 3px 0 1em;
    }

    .seat,
    .time {
        float: left;
    }

    .number {
        text-align: center;
        text-transform: uppercase;

        h3 {
            color: #e84c3d;
            margin: .9em 0 0 0;
           

        }

        span {
            display: block;
            font-size: 10px;
            color: #a2aeae;
        }
    }
</style>