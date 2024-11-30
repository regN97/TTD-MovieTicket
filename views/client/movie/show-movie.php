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
                            <div class="btn-block text-sm-left mb-3">
                                <a href="" class="btn btn-danger btn-sm">Mua vé</a>
                            </div>
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
        <!-- Chọn rạp, lịch chiếu -->
        <div class="col-12 w-50">
            <form action="<?= BASE_URL . '?action=picking-seat' ?>" method="post">
                <div class="card card-sm mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <select class="btn btn-outline-dark w-50" name="room_id">
                                    <option value="">Chọn định dạng</option>
                                    <?php foreach ($rooms as $room): ?>
                                        <option value="<?= $room['id'] ?>"><?= $room['type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // Lấy 6 ngày tiếp theo tính từ ngày hiện tại
                $get7Days = function () {
                    $today = new DateTime();
                    $next_days = [];

                    $today->modify("0 days");

                    for ($i = 0; $i < 6; $i++) {
                        $next_days[] = [
                            "date" => $today->format("Y-m-d"),
                            "day_of_week" => $today->format("l")
                        ];
                        $today->modify("+ 1 days");
                    }
                    return $next_days;
                };

                $daysPluck = array_column($get7Days(), 'date', 'day_of_week');

                ?>

                <div class="btn-group btn-block mb-3 w-100" id="dates">
                    <!-- Lấy ra giờ chiếu của từng ngày -->
                    <?php foreach ($daysPluck as $key => $value) { ?>
                        <a href="<?= BASE_URL . '?action=movies-schedule&date=' . $value . '&movie_id=' . $movies['id'] ?>" class="btn btn-light text-muted">
                            <?= date_format(date_create($value), "d/m") ?>
                            <br><span class="small text-nowrap">
                                <?php switch ($key) {
                                    case 'Monday':
                                        echo "Thứ 2";
                                        break;
                                    case 'Tuesday':
                                        echo "Thứ 3";
                                        break;
                                    case 'Wednesday':
                                        echo "Thứ 4";
                                        break;
                                    case 'Thursday':
                                        echo "Thứ 5";
                                        break;
                                    case 'Friday':
                                        echo "Thứ 6";
                                        break;
                                    case 'Saturday':
                                        echo "Thứ 7";
                                        break;
                                    case 'Sunday':
                                        echo "CN";
                                        break;
                                } ?>
                            </span>
                        </a>
                    <?php } ?>
                </div>
                <div class="card card-sm">
                    <div class="card-body d-flex">
                        <?php
                        // Lấy ra data từ table schedules để mang tới đặt vé
                        if (!empty($_SESSION['errors'])) { ?>
                            <p class="text-danger"><?= $_SESSION['errors']['schedule'] ?></p>
                        <?php } else { ?>
                            <select class="btn btn-outline-dark w-50" name="schedule_id">
                                <option value="">Lựa chọn giờ chiếu</option>
                                <?php foreach ($_SESSION['schedule'] as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= date_format(date_create($key['start_at']), "H:i") ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php unset($_SESSION['schedule']);
                        } ?>
                    </div>
                </div>
                <input type="text" name="movie_id" value="<?= $movies['id'] ?>" hidden>
                <button class="btn btn-danger my-3">Tới chọn ghế</button>
            </form>
        </div>
    </div>
    <?php unset($_SESSION['errors']) ?>