<div class="bg-detail text-white mt-2 mb-3">
    <div class="container py-3">
        <div class="row row-sm">
            <div class="d-none d-sm-block col-2">
                <a href="" title="ảnh phim">
                    <img src="<?= BASE_ASSETS_UPLOADS . $movies['imageURL'] ?>" class="img-fluid rounded border ls-is-cached lazyloaded">
                </a>
            </div>
            <div class="col-12 col-sm-10">
                <div class="mb-3 text-sm-left">
                    <h1 class="mb-0 text-truncate"><?= mb_convert_case($movies['name'], MB_CASE_TITLE, "UTF-8"); ?></h1>
                    <p class='mb-0 text-truncate'>
                        <?php
                        $arr = [];
                        foreach ($movieGenre as $mg) {
                            $arr[] = $mg['g_name'];
                        }

                        $actor = implode(", ", $arr);

                        echo $actor;
                        ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <p class="mb-3 text-jusstify"><?= $movies['description'] ?></p>
                        <div class="row mb-3">
                            <div class="col text-center text-sm-left">
                                <strong>
                                    <i class="">

                                    </i>
                                    <span class="d-none d-sm-inline-block">Khởi chiếu</span>
                                </strong>
                                <br>
                                <span><?= date_format(date_create($movies['release_date']), "d/m/Y") ?></span>
                            </div>
                            <div class="col text-center text-sm-left">
                                <strong>
                                    <i class="">

                                    </i>
                                    <span class="d-none d-sm-inline-block">Thời lượng</span>
                                </strong>
                                <br>
                                <span><?= $movies['duration'] ?> phút</span>
                            </div>
                            <div class="col text-center text-sm-left">
                                <strong>
                                    <i class="">

                                    </i>
                                    <span class="d-none d-sm-inline-block">Giới hạn tuổi</span>
                                </strong>
                                <br>
                                <span><?= $movies['type'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <p class="mb-2">
                            <strong>Diễn viên</strong>
                            <br>
                            <span>
                                <?php
                                $arr = [];
                                foreach ($movieArtist as $ma) {
                                    if ($ma['a_roles'] == 'Diễn viên') {
                                        $arr[] = "<a href='' class='text-danger'>{$ma['a_name']}</a>";
                                    }
                                }

                                $actor = implode(", ", $arr);

                                echo $actor;
                                ?>
                            </span>
                        </p>
                        <p class="mb-2">
                            <strong>Đạo diễn</strong>
                            <br>
                            <span>
                                <?php
                                $arr = [];
                                foreach ($movieArtist as $ma) {
                                    if ($ma['a_roles'] == 'Đạo diễn') {
                                        $arr[] = "<a href='' class='text-danger'>{$ma['a_name']}</a>";
                                    }
                                }

                                $actor = implode(", ", $arr);

                                echo $actor;
                                ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h1><?= $title ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-6 me-5">
                <div class="row mt-3 mb-4">
                    <button class="rounded-5 rounded-bottom-0">Screen</button>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'A' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'A' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'B' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'B' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'C' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'C' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'D' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'D' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'E' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'E' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'F' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'F' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="row my-3">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'G' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } elseif ($rowColumn['seat_row'] == 'G' && $rowColumn['status'] == 'Deactive') { ?>
                            <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>

                <div class="row my-3 d-flex justify-content-center">
                    <?php foreach ($seatInRoom as $rowColumn): ?>
                        <?php if ($rowColumn['seat_row'] == 'H' && $rowColumn['status'] == 'Active') { ?>
                            <a onclick="getSeat(this)" class="col-2 btn mx-1 fw-semibold text-light" style="background-color: #ff00ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
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
            <div class="col-4">
                <form action="?action=fndOptions" method="POST">
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                        <input type="text" name="schedule_id" value="<?= $schedules['id'] ?>" hidden>
                        <input type="text" name="room_id" value="<?= $rooms['id'] ?>" hidden>
                        <input id="seats" type="text" name="seats" hidden>
                        <input id="total_price" type="number" name="total_price" hidden>
                        <input type="text" name="movie_id" value="<?= $movies['id'] ?>" hidden>

                        <p>Suất: <span class="fw-semibold"><?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?></span></p>
                        <p>Phòng chiếu: <span class="fw-semibold"><?= $rooms['name'] ?></span></p>
                        <p>Ghế: <span class="pickedSeat fw-semibold"></span></p>
                    </div>
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                        <p class="fs-5 fw-semibold text-black-50">TỔNG ĐƠN HÀNG</p>
                        <div class="d-flex">
                            <span class="totalPrice fw-bold me-1"></span> <span class="fw-semibold">&#8363;</span>
                        </div>
                    </div>
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3 d-flex justify-content-between">
                        <a href=<?= "?action=movies-detail&id=" . $movies['id'] ?> class="w-25 btn btn-danger">Quay lại</a>
                        <button type="submit" class="w-50 h-25 btn btn-success text-center">Tiếp tục</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    const pickedSeat = document.querySelector('.pickedSeat');
    const totalPrice = document.querySelector('.totalPrice');
    const seatsInput = document.getElementById('seats');
    const totalPriceInput = document.getElementById('total_price');

    const selectedSeats = [];

    const priceRegular = <?= $seatTypes[1]['price'] ?>;
    const priceVIP = <?= $seatTypes[0]['price'] ?>;
    const priceSweetBox = <?= $seatTypes[2]['price'] ?>;

    const rowA = ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8'];
    const rowB = ['B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8'];
    const rowC = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8'];
    const rowD = ['D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8'];
    const rowE = ['E1', 'E2', 'E3', 'E4', 'E5', 'E6', 'E7', 'E8'];
    const rowF = ['F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8'];
    const rowG = ['G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7', 'G8'];
    const rowH = ['H1', 'H2', 'H3'];

    function getSeat(e) {
        const seatId = e.innerHTML;
        const index = selectedSeats.indexOf(seatId);

        if (index !== -1) {
            // Nếu ghế đã được chọn, xóa khỏi mảng và nội dung hiển thị
            selectedSeats.splice(index, 1);
            pickedSeat.innerHTML = pickedSeat.innerHTML.replace(seatId, '');
            calculateTotalPrice();

            const seatsString = selectedSeats.join(' ');
            seatsInput.value = seatsString;

        } else {
            // Nếu ghế chưa được chọn, thêm vào mảng và hiển thị
            selectedSeats.push(seatId);
            pickedSeat.innerHTML += `${seatId} `;
            calculateTotalPrice();

            const seatsString = selectedSeats.join(' ');
            seatsInput.value = seatsString;

        }


        if (e.classList.contains('btn-success')) {
            // Nếu có, xóa class và thêm style
            e.classList.remove('btn-success');
            for (let i = 0; i < rowA.length; i++) {
                if (e.innerHTML === rowA[i]) {
                    e.style.backgroundColor = '#c9daf8';
                }
            }
            for (let i = 0; i < rowB.length; i++) {
                if (e.innerHTML === rowB[i]) {
                    e.style.backgroundColor = '#c9daf8';
                }
            }
            for (let i = 0; i < rowC.length; i++) {
                if (e.innerHTML === rowC[i]) {
                    e.style.backgroundColor = '#c9daf8';
                }
            }
            for (let i = 0; i < rowD.length; i++) {
                if (e.innerHTML === rowD[i]) {
                    e.style.backgroundColor = '#9900ff';
                }
            }
            for (let i = 0; i < rowE.length; i++) {
                if (e.innerHTML === rowE[i]) {
                    e.style.backgroundColor = '#9900ff';
                }
            }
            for (let i = 0; i < rowF.length; i++) {
                if (e.innerHTML === rowF[i]) {
                    e.style.backgroundColor = '#9900ff';
                }
            }
            for (let i = 0; i < rowG.length; i++) {
                if (e.innerHTML === rowG[i]) {
                    e.style.backgroundColor = '#9900ff';
                }
            }
            for (let i = 0; i < rowH.length; i++) {
                if (e.innerHTML === rowH[i]) {
                    e.style.backgroundColor = '#ff00ff';
                }
            }

        } else {
            // Nếu chưa có, thêm class và xóa style
            e.classList.add('btn-success');
            e.removeAttribute('style');
        }
    }

    function calculateTotalPrice() {
        let totalPriceValue = 0;
        for (const seat of selectedSeats) {
            if (rowA.includes(seat) || rowB.includes(seat) || rowC.includes(seat)) {
                totalPriceValue += priceRegular;
            } else if (rowD.includes(seat) || rowE.includes(seat) || rowF.includes(seat) || rowG.includes(seat)) {
                totalPriceValue += priceVIP;
            } else if (rowH.includes(seat)) {
                totalPriceValue += priceSweetBox;
            }
        }
        totalPrice.innerHTML = `${totalPriceValue}`;
        totalPriceInput.value = totalPriceValue;
    }
</script>