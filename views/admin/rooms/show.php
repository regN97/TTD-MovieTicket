<table class="table">
    <tr>
        <th>TRƯỜNG DỮ LIỆU</th>
        <th>GIÁ TRỊ</th>
    </tr>

    <?php foreach ($room as $key => $value): ?>
        <tr>
            <td><?= strtoupper($key) ?></td>
            <td>
                <?php

                switch ($key) {
                    case 'imageURL':
                        if (!empty($value)) {
                            $link = BASE_ASSETS_UPLOADS . $value;

                            echo "<img src='$link' width='100px'>";
                        }
                        break;

                    default:
                        echo $value;
                        break;
                }

                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?= BASE_URL_ADMIN . '&action=rooms-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
<hr>
<div class="container w-50">
    <div class="row mt-3 mb-4">
        <button class="rounded-5 rounded-bottom-0">Screen</button>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'A' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'A' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'B' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'B' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'C' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'C' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'D' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'D' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'E' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'E' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'F' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'F' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <div class="row my-3">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'G' && $rowColumn['status'] == 'Active') { ?>
                <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'G' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>

    <div class="row my-3 d-flex justify-content-center">
        <?php foreach ($seatInRoom as $rowColumn): ?>
            <?php if ($rowColumn['seat_row'] == 'H' && $rowColumn['status'] == 'Active') { ?>
                <a class="col-2 btn mx-1 fw-semibold text-light" style="background-color: #ff00ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } elseif ($rowColumn['seat_row'] == 'H' && $rowColumn['status'] == 'Deactive') { ?>
                <a class="col-2 btn btn-dark  mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <?php if (!empty($seatInRoom)): ?>
        <div class="row my-3 d-flex justify-content-center">
            <h4>Chú thích:</h4>
            <div>
                <label for="">Ghế thường:</label>
                <button class="btn" style="background-color: #c9daf8;"></button>
            </div>
            <div>
                <label for="">Ghế VIP:</label>
                <button class="btn" style="background-color: #9900ff;"></button>
            </div>
            <div>
                <label for="">Ghế SweetBox:</label>
                <button class="btn" style="background-color: #ff00ff;"></button>
            </div>
            <div>
                <label for="">Deactive:</label>
                <button class="btn" style="background-color: #ccc;"></button>
            </div>
        </div>
    <?php endif; ?>
</div>