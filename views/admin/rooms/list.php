<a href="<?= BASE_URL_ADMIN . '&action=rooms-create' ?>" class="w-25 btn btn-primary mb-3">Thêm mới</a>

<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Tên phòng</th>
            <th class="text-center">Loại phòng</th>
            <th class="text-center">Mô tả</th>
            <th class="text-center">Tổng số ghế đang hoạt động</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1;
        foreach ($data as $room): ?>
            <tr>
                <td class="text-center"><?= $stt++; ?></td>
                <td class="text-center"><?= $room['name'] ?></td>
                <td class="text-center"><?= $room['type'] ?></td>
                <td class="text-center"><?php
                                        $maxLength = 50;
                                        $shortenData = mb_substr($room['description'], 0, $maxLength, 'UTF-8');
                                        echo $shortenData . ' ...';
                                        ?></td>
                <td class="text-center">
                    <?php
                    echo $totalSeats = $this->seat->count('room_id = :room_id AND status = :status', ['room_id' => $room['id'], 'status' => 'Active']);
                    ?>
                </td>
                <td class="text-center"><?= $room['status'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?= BASE_URL_ADMIN . '&action=rooms-show&id=' . $room['id'] ?>"
                        class="btn btn-info">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=rooms-updatePage&id=' . $room['id'] ?>"
                        class="btn btn-warning mx-2">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=rooms-delete&id=' . $room['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>