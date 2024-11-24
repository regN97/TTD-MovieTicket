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
                        <a class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'A' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="row my-3">
                <?php foreach ($seatInRoom as $rowColumn): ?>
                    <?php if ($rowColumn['seat_row'] == 'B' && $rowColumn['status'] == 'Active') { ?>
                        <a class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'B' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="row my-3">
                <?php foreach ($seatInRoom as $rowColumn): ?>
                    <?php if ($rowColumn['seat_row'] == 'C' && $rowColumn['status'] == 'Active') { ?>
                        <a class="col btn mx-1 fw-semibold" style="background-color: #c9daf8;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'C' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="row my-3">
                <?php foreach ($seatInRoom as $rowColumn): ?>
                    <?php if ($rowColumn['seat_row'] == 'D' && $rowColumn['status'] == 'Active') { ?>
                        <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'D' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="row my-3">
                <?php foreach ($seatInRoom as $rowColumn): ?>
                    <?php if ($rowColumn['seat_row'] == 'E' && $rowColumn['status'] == 'Active') { ?>
                        <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'E' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="row my-3">
                <?php foreach ($seatInRoom as $rowColumn): ?>
                    <?php if ($rowColumn['seat_row'] == 'F' && $rowColumn['status'] == 'Active') { ?>
                        <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'F' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="row my-3">
                <?php foreach ($seatInRoom as $rowColumn): ?>
                    <?php if ($rowColumn['seat_row'] == 'G' && $rowColumn['status'] == 'Active') { ?>
                        <a class="col btn mx-1 fw-semibold text-light" style="background-color: #9900ff;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
                    <?php } elseif ($rowColumn['seat_row'] == 'G' && $rowColumn['status'] == 'Deactive') { ?>
                        <a class="col btn btn-dark mx-1 fw-semibold text-dark" style="background-color: #ccc;"><?= $rowColumn['seat_row'] . $rowColumn['seat_column'] ?></a>
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
            <div class="col-4">
                Thông tin giá tiền
            </div>
</div>
            </div>
</div>