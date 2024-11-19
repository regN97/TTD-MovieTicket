<?php

include "./assets/inc/client/header.php";
// include "./assets/inc/client/slide_show.php";

?>

<div class="container">
    <?php
    if (isset($view)) {
        require_once PATH_VIEW_CLIENT . $view . '.php';
    }
    ?>
</div>

<?php
include "./assets/inc/client/footer.php";
?>