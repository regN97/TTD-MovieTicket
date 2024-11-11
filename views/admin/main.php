<?php include "./assets/inc/admin/header.php" ?>

<!-- Code bên trong admin-ct-right -->
<div class="admin-ct-right">
    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Admin Dashboard' ?></h1>

        <div class="row">
            <?php
                if(isset($view)){
                    require_once PATH_VIEW_ADMIN . $view . '.php';
                }
            ?>
        </div>
    </div>
</div>

<?php include "./assets/inc/admin/sidebar.php" ?>