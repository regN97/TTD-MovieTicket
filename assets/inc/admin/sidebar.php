<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="<?= BASE_URL_ADMIN ?>" class="logo logo-light">
            <span class="logo-lg mt-4">
                <h3 class="display-7 mt-4" style="color: #ffffff !important; display: inline;">Movie Ticket </h3>
                <h3 class="display-7 mt-4" style="color: #ff0000 !important; display: inline;">TTD</h3>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=/">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Trang chủ</span>
                    </a>
                </li>
                <!-- Start Quản lý phim -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMovies" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMovies">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí phim</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMovies">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=movies-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách phim
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="sidebarMovies">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=genres-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách thể loại
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="sidebarMovies">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=artists-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách nghệ sĩ
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý phim -->

                <!-- Start Quản lý Phòng Chiếu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarRooms" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarRooms">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí phòng chiếu</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarRooms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=rooms-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách phòng chiếu
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="sidebarRooms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=seats-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách ghế
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="sidebarRooms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=seatType-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách loại ghế
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý Phòng Chiếu -->

                <!-- Start Quản lý lịch chiếu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSchedules" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSchedules">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí lịch chiếu phim</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSchedules">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=schedules-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách lịch chiếu phim
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý lịch chiếu -->

                <!-- Start Quản lý nghệ sĩ -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarArtists" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarArtists">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí nghệ sĩ</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarArtists">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=artists-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách nghệ sĩ
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý nghệ sĩ -->

                <!-- Start Quản lý đồ ăn & đồ uống -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarFoodAndDrink" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarFoodAndDrink">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí đồ ăn & đồ uống</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarFoodAndDrink">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=foodanddrinks-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách đồ ăn & đồ uống
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý đồ ăn & đồ uống -->

                <!-- Start Quản lý tài khoản -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUsers">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí tài khoản</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=users-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách tài khoản
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=ranks-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách thứ hạng
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=roles-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách vai trò
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý tài khoản -->

                <!-- Start Quản lý tin tức -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNews" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarNews">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí tin tức</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNews">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN . '&action=news-list' ?>" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách tin tức
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Quản lý tin tức -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>