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
                <form action="?action=" method="POST">
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                        <p class="h5"><?= mb_strtoupper($movies['name']) ?></p>
                        <p>Suất: <span class="fw-semibold"><?= date_format(date_create($schedules['start_at']), "H:i d/m/Y") ?></span></p>
                        <p>Phòng chiếu: <span class="fw-semibold"><?= $rooms['name'] ?></span></p>
                        <p>Ghế: <span class="fw-semibold"><?= $data['seats'] ?></span></p>
                    </div>
                    <div class="row bg-light text-dark rounded-3 mb-3 p-3">
                        <p class="fs-5 fw-semibold text-black-50">TỔNG ĐƠN HÀNG</p>
                        <div class="d-flex">
                            <span class="totalPrice fw-bold me-1 fs-5"><?= $data['total_price'] ?></span> <span>&#8363;</span>
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
    const sweetQuantity = document.getElementById('sweetQuantity');
    const sweetPrice = document.getElementById('sweetPrice');
    const betaQuantity = document.getElementById('betaQuantity');
    const betaPrice = document.getElementById('betaPrice');
    const familyQuantity = document.getElementById('familyQuantity');
    const familyPrice = document.getElementById('familyPrice');

    const currentTotalPrice = document.querySelector('.totalPrice');

    function addSweet() {
        let quantity = parseInt(sweetQuantity.textContent);
        const price = parseInt(sweetPrice.textContent);
        let sum = parseInt(currentTotalPrice.textContent);

        if (quantity < 10 && quantity >= 0) {
            quantity++;
            sum += price;

            sweetQuantity.textContent = quantity;
            currentTotalPrice.textContent = sum;
        }
    }

    function removeSweet() {
        let quantity = parseInt(sweetQuantity.textContent);
        const price = parseInt(sweetPrice.textContent);
        let sum = parseInt(currentTotalPrice.textContent);

        if (quantity > 0) {
            quantity--;
            sum -= price;

            sweetQuantity.textContent = quantity;
            currentTotalPrice.textContent = sum;
        }
    }

    function addBeta() {
        let quantity = parseInt(betaQuantity.textContent);
        const price = parseInt(betaPrice.textContent);
        let sum = parseInt(currentTotalPrice.textContent);

        if (quantity < 10 && quantity >= 0) {
            quantity++;
            sum += price;

            betaQuantity.textContent = quantity;
            currentTotalPrice.textContent = sum;
        }
    }

    function removeBeta() {
        let quantity = parseInt(betaQuantity.textContent);
        const price = parseInt(betaPrice.textContent);
        let sum = parseInt(currentTotalPrice.textContent);

        if (quantity > 0) {
            quantity--;
            sum -= price;

            betaQuantity.textContent = quantity;
            currentTotalPrice.textContent = sum;
        }
    }

    function addFamily() {
        let quantity = parseInt(familyQuantity.textContent);
        const price = parseInt(familyPrice.textContent);
        let sum = parseInt(currentTotalPrice.textContent);

        if (quantity < 10 && quantity >= 0) {
            quantity++;
            sum += price;

            familyQuantity.textContent = quantity;
            currentTotalPrice.textContent = sum;
        }
    }

    function removeFamily() {
        let quantity = parseInt(familyQuantity.textContent);
        const price = parseInt(familyPrice.textContent);
        let sum = parseInt(currentTotalPrice.textContent);

        if (quantity > 0) {
            quantity--;
            sum -= price;

            familyQuantity.textContent = quantity;
            currentTotalPrice.textContent = sum;
        }
    }
</script>