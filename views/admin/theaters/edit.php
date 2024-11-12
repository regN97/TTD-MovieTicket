<?php
if(isset($_SESSION['success'])){
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";
    
    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if(!empty($_SESSION['errors'])): ?>

    <ul>

        <div>
            <?php foreach($_SESSION['errors'] as $value): ?>
                <li><?= $value ?></li>
            <?php endforeach; ?>
        </div>

    </ul>

<?php 
    unset($_SESSION['errors']);
    endif;            
?>

<form action="<?= BASE_URL_ADMIN . '&action=theaters-update&id=' .$theater['id'] ?>" method="post" enctype="multipart/form-data">
<div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên rạp: </label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $theater['name'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="address" class="form-label">Địa chỉ: </label>
        <input type="text" class="form-control" name="address" id="address"  value="<?= $theater['address'] ?? null ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    
    <a href="<?= BASE_URL_ADMIN . '&action=theaters-index' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>