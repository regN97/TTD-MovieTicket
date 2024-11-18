<?php
if(isset($_SESSION['success'])){
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";
    
    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if(!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">
<ul>
        <?php foreach($_SESSION['errors'] as $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
</ul>
</div>

<?php 
unset($_SESSION['errors']);
endif;            
?>

<!-- Form Thêm Tin tức -->
 
<form action="<?= BASE_URL_ADMIN . '&action=news-store' ?>" method="post" enctype="multipart/form-data">
<div class="my-3">
        <label for="title" class="form-label">Tiêu đề: </label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $_SESSION['data']['title'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="content" class="form-label">Nội dung: </label>
        <textarea type="" class="form-control" name="content" id="content" ><?= $_SESSION['data']['content'] ?? null ?></textarea>
    </div>
    <div class="mb-3 mt-3">
        <label for="imageURL" class="form-label">Hình ảnh: </label>
        <input type="file" class="form-control" name="imageURL" id="imageURL" value="<?= $_SESSION['data']['imageURL'] ?? null ?>">
    </div>
    <div class="my-3">
        <label for="user_id" class="form-label">Người đăng:</label>
        <select class="form-select" name="user_id" id="user_id">
            <option value="">Lựa chọn người đăng</option>
            <?php  foreach($userPluck as $id =>$name): ?>

            <option value="<?= $id?>" ><?= $name?></option>
            
            <?php endforeach;?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    
    <a href="<?= BASE_URL_ADMIN . '&action=news-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>
