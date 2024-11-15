<?php include "./assets/inc/admin/header.php" ?>

<!-- Code bên trong admin-ct-right -->
<div class="admin-ct-right">   
        <h1 class="mb-3"><?= $title ?? 'Admin Dashboard' ?></h1>

        <div>
            <?php
                if(isset($view)){
                    require_once PATH_VIEW_ADMIN . $view . '.php';
                }
            ?>
        </div>
</div>

<?php include "./assets/inc/admin/sidebar.php" ?>