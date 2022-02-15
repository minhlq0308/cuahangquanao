<!--======= SUB BANNER =========-->
<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
        <div class="container">
            <h4>Kiểm tra đơn đặt hàng</h4>
            <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Cửa hàng</a></li>
                <li class="active">Thanh toán</li>
            </ol>
        </div>
    </div>
</section>

<!-- Content -->
<div id="content">

    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
        <?php if (isset($_SESSION['cart']) && $_SESSION['cart'] != null){ ?>
        <div class="container">
            <style>
                .format_select {
                    min-height: 44px;
                    margin-top: 5px;
                }
            </style>
            <!-- Payments Steps -->
            <div class="shopping-cart">

                <!-- SHOPPING INFORMATION -->
                <div class="cart-ship-info">
                    <div class="row">

                        <!-- ESTIMATE SHIPPING & TAX -->
                        <div class="col-sm-7">
                            <h6>Thông tin thanh toán</h6>
                            <form class="update-info" id="update-info" method="post" onSubmit="return false">
                                <ul class="row">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> *TÊN
                                                <input type="text" id="uFirstName" name="uFirstName"
                                                       value="<?= $dataViews['profile']['uFirstName'] ?>"
                                                       placeholder="FIRST NAME" required>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- LAST NAME -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> *HỌ
                                                <input type="text" id="uLastName" name="uLastName"
                                                       value="<?= $dataViews['profile']['uLastName'] ?>"
                                                       placeholder="LAST NAME" required>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- ADDRESS -->
                                            <label>*TỈNH/THÀNH PHỐ
                                                <select id="province" name="province" class="form-control format_select"
                                                        required>
                                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- ADDRESS -->
                                            <label>*QUẬN/HUYỆN
                                                <select id="district" name="district" class="form-control format_select"
                                                        required>
                                                    <option value="" selected>Chọn Quận/Huyện</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- ADDRESS -->
                                            <label>*XÃ/PHƯỜNG
                                                <select id="wards" name="wards" class="form-control format_select"
                                                        required>
                                                    <option value="" selected>Chọn Xã/Phường</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- ADDRESS -->
                                            <label>*Địa chỉ cụ thể
                                                <input type="text" id="uAddress" name="uAddress"
                                                       value="<?= $dataViews['profile']['uAddress'] ?>"
                                                       placeholder="Địa chỉ" required>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- EMAIL ADDRESS -->
                                    <div class="col-md-6">
                                        <label> *EMAIL
                                            <input type="text" value="<?= $dataViews['profile']['uEmail'] ?>"
                                                   placeholder="Nhập Email của bạn" readonly disabled>
                                        </label>
                                    </div>
                                    <!-- PHONE -->
                                    <div class="col-md-6">
                                        <label> *Số điện thoại
                                            <input type="text" id="uMobile" name="uMobile"
                                                   value="<?= $dataViews['profile']['uMobile'] ?>" placeholder="Nhập SĐT của bạn"
                                                   required>
                                        </label>
                                    </div>
                                </ul>
                            </form>
                            <!-- SHIPPING info -->
                            <h6 class="margin-top-50">Mã giảm giá</h6>
                            <!-- PAGES INNER -->
                            <div class="row padding-bottom-50">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <input type="text" id="code-discount" value=""
                                           placeholder="Nhập mã giảm giá của bạn">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" onclick="addDiscount();" class="btn">Áp dụng mã</button>
                                </div>
                            </div>
                        </div>

                        <!-- SUB TOTAL -->
                        <div class="col-sm-5">
                            <h6>Đơn hàng của bạn</h6>
                            <div class="order-place">
                                <div class="order-detail">
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $proID => $product) {
                                        foreach ($product as $key => $pro) { ?>
                                            <p>
                                                <?= substr($pro['name'], 0, 30) . "..." . " - " . $pro['color']; ?>
                                                <span id="total-<?= $key . "-" . $proID ?>">$<?= $pro['price'] * $pro['numProduct']; ?> </span>
                                            </p>
                                            <?php
                                            $total = $total + $pro['price'] * $pro['numProduct'];
                                        }
                                    } ?>
                                    <p>Shipping <?php if ($total >= 1000) {
                                            echo "<span id='fee-shipping'>0</span>";
                                        } else echo "<span id='fee-shipping'>30</span>"; ?> <span>$</span></p>
                                    <p>VAT <span id="vat"> <?= (int)$total * 0.1 ?></span><span>$</span></p>
                                    <input type="hidden" id="total-product" value="<?= $total ?>">
                                    <!-- SUB TOTAL -->
                                    <p class="all-total">Tổng thanh toán <span
                                                id="total-cost-checkout"> 998</span><span>$</span></p>
                                </div>
                                <div class="pay-meth">
                                    <ul>
                                        <?php foreach ($dataViews['payment'] as $key => $pay) { ?>
                                            <li>
                                                <div class="radio" id="div-checkbox-payment">
                                                    <input type="radio" name="radioPayment" id="radio<?= $key ?>"
                                                           value="<?= $pay['payID'] ?>" <?php if ($pay['payStatus'] == 1) echo "disabled"; ?> >
                                                    <label for="radio<?= $key ?>"> <?= $pay['payName'] ?></label>
                                                </div>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <div class="checkbox" id="div-checkbox-accept">
                                                <input id="checkbox-accept" class="styled" type="checkbox">
                                                <label for="checkbox-accept"> Tôi đã đọc và chấp nhận các <span
                                                            class="color"> Điều khoản và điều kiện </span> </label>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" id="confirm-order" class="btn  btn-dark pull-right margin-top-30">Đặt hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
            <div class="container">
                <!-- Payments Steps -->
                <div class="shopping-cart text-center">
                    <div class="p-3 mb-2 bg-warning text-dark">Không tìm thấy sản phẩm trong giỏ hàng. Đi đến <a
                                href="?mod=shop" class="text-primary">Cửa hàng</a> và mua sản phẩm.
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- About -->
    <section class="small-about">
        <div class="container-full">
            <div class="news-letter padding-top-150 padding-bottom-150">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Nếu bạn muốn phát triển, hãy tìm kiếm một cơ hội thật tốt. Nếu bạn muốn có một công ty lớn, bạn hãy nghĩ đến những vấn đề mà bạn phải đối mặt trước khi nghĩ đến thành công.</h3>
                        <ul class="social_icons">
                            <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                            <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                            Tuyệt vời!                     <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                            <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                            <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h3>Đăng kí nhận tin của chúng tôi  </h3>
                        <form>
                            <input type="email" placeholder="Nhập địa chỉ Email của bạn" required>
                            <button type="submit">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- FOOTER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    function sortArrayByName(item1, item2) {
        if (item1.name > item2.name) {
            return 1;
        }
        if (item1.name < item2.name) {
            return -1;
        }
        return 0;
    }

    const wardsCurr = "<?=$dataViews['profile']['uWards']?>";
    const districtCurr = "<?=$dataViews['profile']['uDistrict']?>";
    const provinceCurr = "<?=$dataViews['profile']['uProvince']?>";

    const province = document.getElementById('province');
    const district = document.getElementById('district');
    const wards = document.getElementById('wards');
    fetch('public/assets/json/nested-divisions.json')
        .then(response => response.json())
        .then(dt => {
            if (wardsCurr !== "" && districtCurr !== "" && provinceCurr !== "") {
                dt.sort(sortArrayByName);
                const tinhOp = dt.map((tinh) => `<option value="${tinh.code}">${tinh.name}</option>`)
                province.innerHTML = tinhOp;
                const arrValueProvince = [];

                const arrValueWards = [];

                $('#province option').each(function () {
                    arrValueProvince.push(this.value);
                });

                for (let i = 0; i < arrValueProvince.length; i++) {
                    if (arrValueProvince[i] == parseInt(provinceCurr) ) {
                        $('#province option').eq(i).prop('selected', true);
                    }
                }

                dt.map((tinh, index) => {
                    if (tinh.code == province.value) {
                        const arrHuyen = dt[index].districts;
                        arrHuyen.sort(sortArrayByName);
                        const huyenOp = arrHuyen.map((huyen) => `<option value="${huyen.code}">${huyen.name}</option>`)
                        huyenOp.unshift('<option value="" selected>Select District</option>');
                        district.innerHTML = huyenOp;
                        wards.innerHTML = '<option value="" selected>Select Ward/Commune</option>';
                    }
                })

                const arrValueDistrict = [];
                $('#district option').each(function () {
                    arrValueDistrict.push(this.value);
                });
                for (let i = 0; i < arrValueDistrict.length; i++) {
                    if (arrValueDistrict[i] == parseInt(districtCurr)) {
                        $('#district option').eq(i).prop('selected', true);
                    }
                }

                dt.map((tinh, indexTinh) => {
                    if (tinh.code == province.value) {
                        const arrHuyen = dt[indexTinh].districts;
                        arrHuyen.sort(sortArrayByName);
                        const huyenOp = arrHuyen.map((huyen, index) => {
                            if (huyen.code == district.value) {
                                const arrXa = dt[indexTinh].districts[index].wards;
                                arrXa.sort(sortArrayByName);
                                const xaOp = arrXa.map((xa) => `<option value="${xa.code}">${xa.name}</option>`)
                                xaOp.unshift('<option value="" selected>Select Ward/Commune</option>');
                                wards.innerHTML = xaOp;
                            }
                        });
                    }
                })

                $('#wards option').each(function () {
                    arrValueWards.push(this.value);
                });
                for (let i = 0; i < arrValueWards.length; i++) {
                    if (arrValueWards[i] == parseInt(wardsCurr)) {
                        $('#wards option').eq(i).prop('selected', true);
                    }
                }

                // event change
                province.addEventListener('change', (e) => {
                    e.preventDefault();
                    const tinhOp = dt.map((tinh, index) => {
                        if (tinh.code == e.target.value) {
                            const arrHuyen = dt[index].districts;
                            arrHuyen.sort(sortArrayByName);
                            const huyenOp = arrHuyen.map((huyen) => `<option value="${huyen.code}">${huyen.name}</option>`);
                            huyenOp.unshift('<option value="" selected>Select District</option>');
                            district.innerHTML = huyenOp;
                            wards.innerHTML = '<option value="" selected>Select Ward/Commune</option>';
                        }
                    })
                });
                district.addEventListener('change', (e) => {
                    e.preventDefault();
                    dt.map((tinh, indexTinh) => {
                        if (tinh.code == province.value) {
                            const arrHuyen = dt[indexTinh].districts;
                            arrHuyen.sort(sortArrayByName);
                            const huyenOp = arrHuyen.map((huyen, index) => {
                                if (huyen.code == e.target.value) {
                                    const arrXa = dt[indexTinh].districts[index].wards;
                                    arrXa.sort(sortArrayByName);
                                    const xaOp = arrXa.map((xa) => `<option value="${xa.code}">${xa.name}</option>`);
                                    xaOp.unshift('<option value="" selected>Select Ward/Commune</option>');
                                    wards.innerHTML = xaOp;
                                }
                            });
                        }
                    });
                });
                wards.addEventListener('change', (e) => {
                    e.preventDefault();
                });
            } else {
                dt.sort(sortArrayByName);
                const tinhOp = dt.map((tinh) => `<option value="${tinh.code}">${tinh.name}</option>`)
                province.innerHTML = tinhOp;

                province.addEventListener('change', (e) => {
                    e.preventDefault();
                    const tinhOp = dt.map((tinh, index) => {
                        if (tinh.code == e.target.value) {
                            const arrHuyen = dt[index].districts;
                            arrHuyen.sort(sortArrayByName);
                            const huyenOp = arrHuyen.map((huyen) => `<option value="${huyen.code}">${huyen.name}</option>`)
                            huyenOp.unshift('<option value="" selected>Select District</option>');
                            district.innerHTML = huyenOp;
                            wards.innerHTML = '<option value="" selected>Select Ward/Commune</option>';
                        }
                    })
                });


                district.addEventListener('change', (e) => {
                    e.preventDefault();
                    dt.map((tinh, indexTinh) => {
                        if (tinh.code == province.value) {
                            const arrHuyen = dt[indexTinh].districts;
                            arrHuyen.sort(sortArrayByName);
                            const huyenOp = arrHuyen.map((huyen, index) => {
                                if (huyen.code == e.target.value) {
                                    const arrXa = dt[indexTinh].districts[index].wards;
                                    arrXa.sort(sortArrayByName);

                                    const xaOp = arrXa.map((xa) => `<option value="${xa.code}">${xa.name}</option>`)
                                    xaOp.unshift('<option value="" selected>Select Ward/Commune</option>');
                                    wards.innerHTML = xaOp;
                                }
                            });
                        }
                    })
                })
                wards.addEventListener('change', (e) => {
                    e.preventDefault();
                });
            }

        });

</script>