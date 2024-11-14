<table class="table table-bordered">
    <tr>
        <th>Trường Dữ Liệu</th>
        <th>Giá Trị</th>
    </tr>
    <?php foreach($news as $key => $value): ?>
        <tr>
            <td><?= strtoupper($key) ?></td>
            <td>
                <?php 
                switch ($key) {
                    case 'image':
                        if(!empty($value)){
                            $link = BASE_ASSETS_CLIENT_IMAGE . $value ;
                            echo "<img src='$link' width='100px'>";
                        }
                        
                        break;
                    
                    default:
                       echo $value;
                        break;
                }
                
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?= BASE_URL_ADMIN . '&action=news-list' ?>" class="btn btn-danger">Quay lại danh sách</a>