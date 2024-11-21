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
        <form action="" method="post">
            <div class="card card-sm mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <select class="form-control">
                                <option value="">Phòng chiếu</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control">
                                <option value="">Định dạng</option>
                                <option value="2d">2D</option>
                                <option value="3d">3D</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-group btn-block mb-3 w-100" id="dates">
                <button class="btn btn-light text-muted date active" data-date="2024-11-21">
                    21/11
                    <br><span class="small text-nowrap">Th 5</span>
                </button>
                <button class="btn btn-light text-muted date" data-date="2024-11-22">
                    22/11
                    <br><span class="small text-nowrap">Th 6</span>
                </button>
                <button class="btn btn-light text-muted date" data-date="2024-11-23">
                    23/11
                    <br><span class="small text-nowrap">Th 7</span>
                </button>
                <button class="btn btn-light text-muted date" data-date="2024-11-24">
                    24/11
                    <br><span class="small text-nowrap">CN</span>
                </button>
                <button class="btn btn-light text-muted date" data-date="2024-11-25">
                    25/11
                    <br><span class="small text-nowrap">Th 2</span>
                </button>
                <button class="btn btn-light text-muted date" data-date="2024-11-26">
                    26/11
                    <br><span class="small text-nowrap">Th 3</span>
                </button>
            </div>

            <div class="card card-sm">
                <div class="card-body">
                    <button class="btn btn-dark">19:30</button>
                    <button class="btn btn-dark">19:30</button>
                    <button class="btn btn-dark">19:30</button>
                    <button class="btn btn-dark">19:30</button>
                    <button class="btn btn-dark">19:30</button>
                </div>
            </div>
        </form>

    </div>
</div>