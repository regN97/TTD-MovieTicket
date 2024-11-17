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
        <th>STT</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Hình ảnh</th>
        <th>Thời điểm tạo</th>
        <th>Người đăng</th>
        <th>Thao tác</th>
    </tr>
    
    <?php foreach ($data as $key => $news): 
        // debug($data);
        ?>
        <tr>
        <td><?= $key+1 ?></td>
        <td><?= $news['n_title'] ?></td>
        <td><?= $news['n_content'] ?></td>
        <td>  
            <?php if(!empty($news['n_imageURL'])) : ?> 
            <img src="<?= BASE_ASSETS_UPLOADS . $news['n_imageURL']?>" width="100px">
            <?php endif ;?>  
        </td>
        <td><?= $news['n_created_at'] ?></td>
        <td><?= $news['u_name'] ?></td>
        <td>
            <a href="<?= BASE_URL_ADMIN . '&action=news-show&id=' . $news['n_id'] ?>"
                    class="btn btn-info">Xem</a>

            <a href="<?= BASE_URL_ADMIN . '&action=news-updatePage&id=' . $news['n_id'] ?>"
                class="btn btn-warning ms-3 me-3">Sửa</a>

            <a href="<?= BASE_URL_ADMIN . '&action=news-delete&id=' . $news['n_id'] ?>"
                onclick="return confirm('Bạn có chắc muốn xoá?')"
                class="btn btn-danger">Xoá</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>