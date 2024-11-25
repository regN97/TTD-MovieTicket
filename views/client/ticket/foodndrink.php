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
            <div class="col-6 mx-5">
                <div>
                    <table class="bg-light text-dark rounded">
                        <thead class="border-bottom fs-5 text-secondary">
                            <tr>
                                <th scope="col">COMBO</th>
                                <th style="width: 120px;" scope="col">GIÁ TIỀN</th>
                                <th style="width: 120px;" scope="col">SỐ LƯỢNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fw-semibold"><?= $foodndrinks[0]['name'] ?></p>
                                    <p class="text-secondary"><?= $foodndrinks[0]['description'] ?></p>
                                </td>
                                <td id="sweetPrice"><?= $foodndrinks[0]['price'] ?></td>
                                <td>
                                    <button onclick="removeSweet()" class="btn btn-sm btn-danger text-white" href="">-</button>
                                    <span id="sweetQuantity" class="mx-1">0</span>
                                    <input type="text" hidden>
                                    <button onclick="addSweet()" class="btn btn-sm btn-primary text-white" href="">+</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-semibold"><?= $foodndrinks[1]['name'] ?></p>
                                    <p class="text-secondary"><?= $foodndrinks[1]['description'] ?></p>
                                </td>
                                <td id="betaPrice"><?= $foodndrinks[1]['price'] ?></td>
                                <td>
                                    <button onclick="removeBeta()" class="btn btn-sm btn-danger text-white" href="">-</button>
                                    <span id="betaQuantity" class="mx-1">0</span>
                                    <input type="text" hidden>
                                    <button onclick="addBeta()" class="btn btn-sm btn-primary text-white" href="">+</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="fw-semibold"><?= $foodndrinks[2]['name'] ?></p>
                                    <p class="text-secondary"><?= $foodndrinks[2]['description'] ?></p>
                                </td>
                                <td id="familyPrice"><?= $foodndrinks[2]['price'] ?></td>
                                <td>
                                    <button onclick="removeFamily()" class="btn btn-sm btn-danger text-white" href="">-</button>
                                    <span id="familyQuantity" class="mx-1">0</span>
                                    <input type="text" hidden>
                                    <button onclick="addFamily()" class="btn btn-sm btn-primary text-white" href="">+</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <form action="?action=order-detail" method="POST">
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                        <input type="text" name="schedule_id" value="<?= $schedules['id'] ?>" hidden>
                        <input type="text" name="movie_id" value="<?= $movies['id'] ?>" hidden>
                        <input type="text" name="room_id" value="<?= $rooms['id'] ?>" hidden>
                        <input type="text" name="seats" value="<?= $data['seats'] ?>" hidden>
                        <input id="priceData" type="number" name="total_price" hidden>

                        <input id="sweet_id" type="text" name="sweet_id" hidden>
                        <input id="sweet_quantity" type="text" name="sweet_quantity" hidden>

                        <input id="beta_id" type="text" name="beta_id" hidden>
                        <input id="beta_quantity" type="text" name="beta_quantity" hidden>

                        <input id="family_id" type="text" name="family_id" hidden>
                        <input id="family_quantity" type="text" name="family_quantity" hidden>

                        <p class="h5"><?= mb_strtoupper($movies['name']) ?></p>
                        <p>Suất: <span class="fw-semibold"><?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?></span></p>
                        <p>Phòng chiếu: <span class="fw-semibold"><?= $rooms['name'] ?></span></p>
                        <p>Ghế: <span class="fw-semibold"><?= $data['seats'] ?></span></p>
                    </div>
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                        <p class="fs-5 fw-semibold text-black-50">TỔNG ĐƠN HÀNG</p>
                        <div class="d-flex">
                            <span id="totalPrice" class="fw-bold me-1 fs-5"><?= $data['total_price'] ?></span> <span>&#8363;</span>
                        </div>
                    </div>
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3 d-flex justify-content-between">
                        <a href=<?= "?action=movies-detail&id=" . $movies['id'] ?> class="w-25 btn btn-danger">Quay lại</a>
                        <button type="submit" class="w-50 h-25 btn btn-success text-center">Tiếp tục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const sweetId = document.getElementById('sweet_id');
    const sweetQuantity = document.getElementById('sweet_quantity');
    const betaId = document.getElementById('beta_id');
    const betaQuantity = document.getElementById('beta_quantity');
    const familyId = document.getElementById('family_id');
    const familyQuantity = document.getElementById('family_quantity');

    function updateQuantity(elementId, priceId, totalPriceId, operation, type) {
        const quantityElement = document.getElementById(elementId);
        const priceElement = document.getElementById(priceId);
        const totalPriceElement = document.getElementById(totalPriceId);

        const priceData = document.getElementById('priceData');

        if (!quantityElement || !priceElement || !totalPriceElement) {
            console.error("ID truyền vào không đúng, kiểm tra lại!");
            return;
        }

        let quantity = parseInt(quantityElement.textContent);
        const price = parseInt(priceElement.textContent);
        let totalPrice = parseInt(totalPriceElement.textContent);

        if (operation === 'add') {
            if (quantity < 10) {
                quantity++;
                totalPrice += price;
            }
        } else if (operation === 'remove') {
            if (quantity > 0) {
                quantity--;
                totalPrice -= price;
            }
        }

        switch (type) {
            case 'sweet':
                sweetId.value = 0;
                sweetQuantity.value = quantity;
                break;

            case 'beta':
                betaId.value = 1;
                betaQuantity.value = quantity;
                break;

            case 'family':
                familyId.value = 2;
                familyQuantity.value = quantity;
                break;

        }

        quantityElement.textContent = quantity;
        totalPriceElement.textContent = totalPrice;
        priceData.value = totalPrice;
    }

    function addSweet() {
        updateQuantity('sweetQuantity', 'sweetPrice', 'totalPrice', 'add', 'sweet');
    }

    function removeSweet() {
        updateQuantity('sweetQuantity', 'sweetPrice', 'totalPrice', 'remove', 'sweet');
    }

    function addBeta() {
        updateQuantity('betaQuantity', 'betaPrice', 'totalPrice', 'add', 'beta');
    }

    function removeBeta() {
        updateQuantity('betaQuantity', 'betaPrice', 'totalPrice', 'remove', 'beta');
    }

    function addFamily() {
        updateQuantity('familyQuantity', 'familyPrice', 'totalPrice', 'add', 'family');
    }

    function removeFamily() {
        updateQuantity('familyQuantity', 'familyPrice', 'totalPrice', 'remove', 'family');
    }
</script>