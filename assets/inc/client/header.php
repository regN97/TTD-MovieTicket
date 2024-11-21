<!-- Header-->
<header class="bg-header py-2">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <?php
            if (isset($view) && isset($title)) { ?>
                <h1 class="display-4 fw-bolder"><?= $title ?></h1>
                <p class="lead fw-normal text-white-50 mb-0"><?= $description ?></p>
            <?php } else { ?>
                <h1 class="display-4 fw-bolder">TTD Movie Ticket</h1>
                <p class="lead fw-normal text-white-50 mb-0">Đặt vé xem phim dễ dàng hơn với TTD Movie Ticket</p>
            <?php } ?>
        </div>
    </div>
</header>
<!-- End header -->