<a href="<?= BASE_URL_ADMIN . '&action=news-create' ?>" class="btn btn-primary mb-3">Thêm mới</a>

<?php
if(isset($_SESSION['success'])){
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>" . $_SESSION['msg'] . "</div>";
    
    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>


<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tiêu đề/th>
        <th>Nội dung</th>
        <th>Mô tả</th>
        <th>Hình ảnh</th>
        <th>Thời điểm tạo</th>
        <th>Thao Tác</th>
    </tr>
    <?php foreach ($data as $news): ?>
        <tr>
        <td><?= $news['news_id'] ?></td>
        <td><?= $news['title'] ?></td>
        <td><?= $news['content'] ?></td>
        <td><?= $news['description'] ?></td>
        <td>  
            <?php if(!empty($news['image'])) : ?> 
            <img src="<?= BASE_ASSETS_UPLOADS . $news['image']?>" width="100px">
            <?php endif ;?>  
        </td>
        <td><?= $news['created_at'] ?></td>
        <td>
            <a href="<?= BASE_URL_ADMIN . '&action=news-show&id=' . $news['news_id'] ?>"
                    class="btn btn-info">Xem</a>

            <a href="<?= BASE_URL_ADMIN . '&action=news-edit&id=' . $news['news_id'] ?>"
                class="btn btn-warning ms-3 me-3">Sửa</a>

            <a href="<?= BASE_URL_ADMIN . '&action=news-delete&id=' . $news['news_id'] ?>"
                onclick="return confirm('Bạn có chắc muốn xoá?')"
                class="btn btn-danger">Xoá</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>