<table class="table table-bordered">
    <thead>
        <tr>
            <th>Trường dữ liệu</th>
            <th>Giá trị</th>
        </tr>
    </thead>
    <?php foreach ($artist as $key => $value) : ?>
        <tr>
            <td><?= strtoupper($key) ?></td>
            <td>
                <?php

                    switch ($key){
                        case 'imageURL':
                            if(!empty($value)){
                                $link = BASE_ASSETS_UPLOADS . $artist['imageURL'];

                                echo "<img src='$link' width='100px'";
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