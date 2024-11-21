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
                    <h1 class="mb-0 text-truncate"><?= $movies['name'] ?></h1>
                    <p class="mb-0 text-truncate">Thể loại</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="btn-block text-sm-left mb-3">
                            <a href="" class="btn btn-danger btn-sm">Mua vé</a>
                        </div>
                        <p class="mb-3 text-jusstify">Linh Miêu: Quỷ Nhập Tràng lấy cảm hứng từ truyền thuyết dân gian về “quỷ nhập tràng” để xây dựng cốt truyện. Phim lồng ghép những nét văn hóa đặc trưng của Huế như nghệ thuật khảm sành - một văn hóa đặc sắc của thời nhà Nguyễn, đề cập đến các vấn đề về giai cấp và quan điểm trọng nam khinh nữ. Đặc biệt, hình ảnh rước kiệu thây ma và những hình nhân giấy không chỉ biểu trưng cho tai ương hay điềm dữ mà còn là hiện thân của nghiệp quả.</p>
                        <div class="row mb-3">
                            <div class="col text-center text-sm-left">
                                <strong>
                                    <i class="">

                                    </i>
                                    <span class="d-none d-sm-inline-block">Khởi chiếu</span>
                                </strong>
                                <br>
                                <span>22/11/2024</span>
                            </div>
                            <div class="col text-center text-sm-left">
                                <strong>
                                    <i class="">

                                    </i>
                                    <span class="d-none d-sm-inline-block">Thời lượng</span>
                                </strong>
                                <br>
                                <span>109 phút</span>
                            </div>
                            <div class="col text-center text-sm-left">
                                <strong>
                                    <i class="">

                                    </i>
                                    <span class="d-none d-sm-inline-block">Giới hạn tuổi</span>
                                </strong>
                                <br>
                                <span>T18</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <p class="mb-2">
                            <strong>Diễn viên</strong>
                            <br>
                            <span>
                                <a href="" class="text-danger">Nguyễn Văn A</a>,
                                <a href="" class="text-danger">Trần Thị B</a>
                            </span>
                        </p>
                        <p class="mb-2">
                            <strong>Đạo diễn</strong>
                            <br>
                            <span>
                                <a href="" class="text-danger">Nguyễn Văn A</a>,
                                <a href="" class="text-danger">Trần Thị B</a>
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