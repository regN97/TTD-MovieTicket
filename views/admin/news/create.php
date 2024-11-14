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

<!-- Form Thêm Tin tức -->
 
<form action="<?= BASE_URL_ADMIN . '&action=news-store' ?>" method="post" enctype="multipart/form-data">
<div class="my-3">
        <label for="name" class="form-label">Tiêu Đề: </label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="address" class="form-label">Nội dung: </label>
        <textarea type="" class="form-control" name="content" id="content" >
        <?= $_SESSION['data']['address'] ?? null ?>
        </textarea>
    </div>
    <div class="my-3">
        <label for="name" class="form-label">Mô tả: </label>
        <input type="text" class="form-control" name="description" id="description" value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Hình Ảnh: </label>
        <input type="file" class="form-control" name="image" id="image" value="<?= $_SESSION['data']['name'] ?? null ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    
    <a href="<?= BASE_URL_ADMIN . '&action=news-index' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>
