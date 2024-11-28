
<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<style>
    .totalPages:hover {
        text-decoration: underline;
    }
</style>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Tên Phim</th>
            <th class="text-center">Ngày tạo </th>            
            <th class="text-center">Vị trí ghế</th>
            <th class="text-center">Lịch chiếu</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt = 1;
        foreach ($data as $ticket): ?>
            <tr>
                <td class="text-center"><?= $stt++; ?></td>
                <td class="text-center"><?= $ticket['m_name'] ?></td>
                <td class="text-center"><?= $ticket['t_created_at'] ?></td>
                <td class="text-center"><?= $ticket['se_seat_row'].$ticket['se_seat_column'] ?></td>
                <td class="text-center"><?= $ticket['sch_start_at'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=history-show&id=' . $ticket['t_id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=history-updatePage&id=' . $ticket['t_id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=history-delete&id=' . $ticket['t_id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Hủy</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>