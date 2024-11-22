<table class="table table-bordered">
    <thead>
        <tr>
            <th>Trường dữ liệu</th>
            <th>Giá trị</th>
        </tr>
    </thead>
    <?php foreach ($movieArtists as $key => $value) : ?>
        <tr>
            <td><?= strtoupper($key) ?></td>
            <td><?= $value ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="<?= BASE_URL_ADMIN . '&action=movie-artists-list' ?>" class="btn btn-danger">Quay lại danh sách</a>