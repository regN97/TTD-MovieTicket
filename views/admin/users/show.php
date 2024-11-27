<table class="table">
    <tr>
        <th>TRƯỜNG DỮ LIỆU</th>
        <th>GIÁ TRỊ</th>
    </tr>

    <?php foreach ($user as $key => $value): ?>
        <?php if($key == 'u_password'): continue; ?>    
        <?php endif;?>
        <tr>
            <td><?= strtoupper($key) ?></td>
        

            <td>
                <?php

                switch ($key) {
                    case 'u_imageURL':
                        if (!empty($value)) {
                            $link = BASE_ASSETS_UPLOADS . $value;

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

<a href="<?= BASE_URL_ADMIN . '&action=users-list' ?>" class="btn btn-danger">Quay lại danh sách</a>