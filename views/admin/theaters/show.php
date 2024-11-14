<table class="table table-bordered">
    <tr>
        <th>Trường Dữ Liệu</th>
        <th>Giá Trị</th>
    </tr>
    <?php foreach($theater as $key => $value): ?>
        <tr>
            <td><?= strtoupper($key) ?></td>
            <td><?= $value ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?= BASE_URL_ADMIN . '&action=theaters-index' ?>" class="btn btn-danger">Quay lại danh sách</a>