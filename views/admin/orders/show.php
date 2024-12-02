<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Tên Phim</th>
            <th class="text-center">Vị trí ghế</th>
            <th class="text-center">Lịch chiếu</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1;
        $schedule_id = '';
        foreach ($tickets as $ticket): $schedule_id = $ticket['t_schedule_id'] ?>
            <tr>
                <td class="text-center"><?= $stt++; ?></td>
                <td class="text-center"><?= $ticket['m_name'] ?></td>
                <td class="text-center"><?= $ticket['se_seat_row'] . $ticket['se_seat_column'] ?></td>
                <td class="text-center"><?= date_format(date_create($ticket['sch_start_at']), "H:i / d-m-Y") ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?= BASE_URL_ADMIN . '&action=order-list' ?>" class="btn btn-danger">Quay lại danh sách</a>
<a href="<?= BASE_URL_ADMIN . '&action=order-delete&id=' . $id . '&schedule-id=' . $schedule_id ?>"
    onclick="return confirm('Bạn có chắc muốn xóa?')"
    class="btn btn-danger">Hủy đơn hàng</a>