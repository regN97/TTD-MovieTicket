<table class="table table-bordered">
    <thead>
        <tr>
            <th>Trường dữ liệu</th>
            <th>Giá trị</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($genre as $key => $value): ?>
            <tr>
                <td><?= strtoupper($key) ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= BASE_URL_ADMIN . '&action=genres-list' ?>" class="btn btn-danger w-25">Quay lại danh sách</a>