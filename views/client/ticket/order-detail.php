<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $value): ?>
                <li><?= $value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php
    unset($_SESSION['errors']);
endif;
?>

<div class="bg-detail mt-2 mb-3">
    <div class="container py-3 text-white">
        <div class="row">
            <div class="col-7">
            <table class="table">
                <h2>Chi tiết vé</h2>
                <thead>
                    <tr>
                        <th>Mô tả</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $data['seats'] ?></td>
                        <td><?= $quantitySeats ?></td>
                        <td><span id="seatsPrice"></span> đ</td>
                    </tr>
                    <?php if(!empty($data['sweet_id']) || !empty($data['sweet_quantity'])): ?>
                    <tr>
                        <td><?= $foodndrinks[0]['name'] ?></td>
                        <td><?= $data['sweet_quantity'] ?></td>
                        <td><span class="price"><?= $foodndrinks[0]['price']*$data['sweet_quantity'] ?></span> đ</td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($data['beta_id']) || !empty($data['beta_quantity'])): ?>
                    <tr>
                        <td><?= $foodndrinks[1]['name'] ?></td>
                        <td><?= $data['beta_quantity'] ?></td>
                        <td><span class="price"><?= $foodndrinks[1]['price']*$data['beta_quantity'] ?></span> đ</td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($data['family_id']) || !empty($data['family_quantity'])): ?>
                    <tr>
                        <td><?= $foodndrinks[2]['name'] ?></td>
                        <td><?= $data['family_quantity'] ?></td>
                        <td><span class="price"><?= $foodndrinks[2]['price']*$data['family_quantity'] ?></span> đ</td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Tổng</td>
                        <td></td>
                        <td><?= $data['total_price'] ?>đ</td>
                    </tr>
                </tbody>
            </table>
            <hr>
                <form action="">
                    <h2>Phương thức thanh toán</h2>
                        <div class="bg-light text-dark rounded-3 mb-3 p-3">
                        <div class="form-check">
                            <input onclick="isChecked(this)" class="form-check-input" type="radio" name="paymenMethod" value="Thanh toán tại quầy">
                            <label class="form-check-label" for="paymenMethod">Thanh toán tại quầy</label>
                        </div>
                        <div class="form-check">
                            <input onclick="isChecked(this)" class="form-check-input" type="radio" name="paymenMethod" value="T1">
                            <label class="form-check-label" for="paymenMethod">Thanh toán tại quầy</label>
                        </div>
                        <div class="form-check">
                            <input onclick="isChecked(this)" class="form-check-input" type="radio" name="paymenMethod" value="T2">
                            <label class="form-check-label" for="paymenMethod">Thanh toán tại quầy</label>
                        </div>
                    </div>
                </form>        
            <hr>
            <form action="">
                <h2>Thông tin người đặt vé</h2>
                <div class="form-group my-2">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" name="u_name" class="form-control" value="<?= !empty($user['u_name']) ? $user['u_name'] : ""?>">
                </div>
                <div class="form-group my-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="u_email" class="form-control" value="<?= !empty($user['u_email']) ? $user['u_email'] : ""?>">
                </div>
                <div class="form-group my-2">
                    <label for="tel" class="form-label">Số điện thoại</label>
                    <input type="text" name="u_tel" class="form-control" value="<?= !empty($user['u_tel']) ? $user['u_tel'] : ""?>">
                </div>
            </form>
            </div>
            <div class="col-4 mx-5 mt-5">
                <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                    <p class="fs-5 fw-semibold text-black-50">TỔNG ĐƠN HÀNG</p>
                    <h3><?= $data['total_price'] ?>₫</h3>
                </div>
                <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                    <p>Vé đã mua không thể đổi hoặc hoàn tiền.
                    Mã vé sẽ được gửi <b>01</b> lần qua số điện thoại và email đã nhập. Vui lòng kiểm tra lại thông tin trước khi tiếp tục.</p>
                </div>
                <div class="row bg-light rounded-3 mb-3 p-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tiếp tục
                </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5 text-dark" id="exampleModalLabel">Thông tin vé</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3 row">
                            <label for="r_name" class="col-sm-3 col-form-label text-dark">Phim</label>
                            <div class="col-sm-9">
                                <input type="text" readonly name="movie_name" class="form-control-plaintext" id="" value="<?= $movies['name'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="r_name" class="col-sm-3 col-form-label text-dark">Xuất</label>
                            <div class="col-sm-9">
                                <input type="text" readonly name="schedule_start_at" class="form-control-plaintext" id="" value="<?= $schedules['start_at'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="r_name" class="col-sm-3 col-form-label text-dark">Ghế</label>
                            <div class="col-sm-9">
                                <input type="text" readonly name="seats" class="form-control-plaintext" id="" value="<?= $data['seats'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="r_name" class="col-sm-3 col-form-label text-dark">Thông tin cá nhân</label>
                            <div class="col-sm-9">
                                    <input type="text" readonly name="user_name" class="form-control-plaintext" id="" value="<?= $user['u_name'] ?>">
                                    <input type="text" readonly name="user_email" class="form-control-plaintext" id="" value="<?= $user['u_email'] ?>">
                                    <input type="text" readonly name="user_tel" class="form-control-plaintext" id="" value="<?= $user['u_tel'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="r_name" class="col-sm-3 col-form-label text-dark">Tổng tiền</label>
                            <div class="col-sm-9">
                                <input type="text" readonly name="total_price" class="form-control-plaintext" id="" value="<?= $data['total_price'] ?>₫">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="r_name" class="col-sm-3 col-form-label text-dark">Phương thức thanh toán</label>
                            <div class="col-sm-9">
                                <input type="text" readonly name="payMethod" class="form-control-plaintext" id="payMethod">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Tiến hành thanh toán</button>
                    </div>

                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const seatTypePrice = {
        'A': <?= $seatTypes[1]['price'] ?>,
        'B': <?= $seatTypes[1]['price'] ?>,
        'C': <?= $seatTypes[1]['price'] ?>,
        'D': <?= $seatTypes[0]['price'] ?>,
        'E': <?= $seatTypes[0]['price'] ?>,
        'F': <?= $seatTypes[0]['price'] ?>,
        'G': <?= $seatTypes[0]['price'] ?>,
        'H': <?= $seatTypes[2]['price'] ?>,
    }

    const seatsArray = '<?= $data['seats'] ?>'.split(' ');
    
    let seatsPrice = 0;
    let fndPrice = 0;
    seatsArray.forEach( seat => {
        const firstLetter = seat[0]        
        seatsPrice += seatTypePrice[firstLetter];
    })

    document.getElementById('seatsPrice').textContent = seatsPrice;
    // const paymenMethod = document.querySelector('.paymenMethod');
    // const paymenMethod1 = document.querySelector('.paymenMethod1');
    // const paymenMethod2 = document.querySelector('.paymenMethod2');

    function isChecked(e){
        const e = document.getElementsByName('paymenMethod');
        for (let i = 0; i < e.length; i++) {
            if(e[i] !== radio){
                e[i].checked = false;
            }else{
                e[i].checked = true;
            }
            
        }
    }    
</script>