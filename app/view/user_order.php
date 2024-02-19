<!-- bill start -->
<div class="container mt-5 py-3">
    <h1 class="h3 text-center">Chi tiết đơn hàng</h1>
    <div class="row mt-3">
        <div class="col-12 col-lg-8 d-flex flex-column gap-3">
            <!-- Mã đơn hàng -->
            <section class="bg-secondary-subtle border border-1 border-dark-subtle rounded-1">
                <div class="container">
                    <div class="mb-1 fw-bold d-inline">Đơn hàng: <span class="text-primary">
                            <?= $order[0]['Id'] ?>
                        </span> </div>
                    <span class="ms-2 text-info fw-bold">(
                        <?= $order[0]['TrangThai'] ?>)
                    </span>
                    <p class="mb-1">02/01/2024 - 22:51
                        <?= $order[0]['NgayDat'] ?>
                    </p>
                </div>
            </section>

            <!-- Thông tin khách hàng | người nhận -->
            <div class="row">
                <div class="col-5">
                    <section class="border border-1 border-dark-subtle rounded-1">
                        <div class="container bg-secondary-subtle">
                            <span class="text-uppercase text-black-50">
                                khách hàng
                            </span>
                        </div>
                        <div class="container">
                            <div class="d-flex flex-column">
                                <span class=" fw-bold">
                                    <?= $order[0]['HoVaTen'] ?>
                                </span>
                                <span class="text-black-50 fw-medium">
                                    <?= $order[0]['SDTTK'] ?>
                                </span>
                                <br>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-7">
                    <section class="border border-1 border-dark-subtle rounded-1">
                        <div class="container bg-secondary-subtle">
                            <span class="text-uppercase text-black-50">
                                người nhận
                            </span>
                        </div>
                        <div class="container">
                            <div class="d-flex flex-column">
                                <span class=" fw-bold">
                                    <?= $order[0]['NguoiNhan'] ?>
                                </span>
                                <span class="text-black-50 fw-medium">
                                    <?= $order[0]['SDT'] ?>
                                </span>
                                <span class="text-black-50 fw-medium">
                                    <?= $order[0]['DiaChiGiaoHang'] ?>
                                </span>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

            <!-- Thông tin sp -->
            <section class="border border-1 border-dark-subtle rounded-1">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-end">Đơn giá</th>
                            <th scope="col" class="text-end">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalPro = 0 ;
                        foreach ($order as $sp): 
                            $totalPro += ($sp['DonGia']*$sp['SoLuong']);
                        ?>
                            <tr>
                                <th scope="row" class="fw-medium"><?=$sp['TenSanPham']?></th>
                                <td class="text-center"><?=$sp['SoLuong']?></td>
                                <td class="text-end"><?=$sp['DonGia']?> ₫</td>
                                <td class="text-end"><?=($sp['DonGia']*$sp['SoLuong'])?> ₫</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column gap-3">
            <!-- Phương thức thanh toán -->
            <section class="border border-1 border-dark-subtle rounded-1">
                <div class="container bg-secondary-subtle">
                    <span class="text-uppercase text-black-50">
                        Phương thức thanh toán
                    </span>
                </div>
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <span class="text-black-50 fw-bold">Tiền mặt</span>
                        <span class="fw-bold text-body-secondary"><?=$order[0]['TongTien']?> ₫</span>
                    </div>
                </div>
            </section>
            <!-- thanh toán -->
            <section class="border border-1 border-dark-subtle rounded-1">
                <div class="container">
                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Tạm tính</span>
                        <span class="fw-bold text-body-secondary"><?=$totalPro?> ₫</span>
                    </div>

                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Phí vận chuyển</span>
                        <span class="fw-bold text-body-secondary"><?=$order[0]['PhiVanChuyen']?> ₫</span>
                    </div>

                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Mã giảm giá</span>
                        <span class="fw-bold text-danger">- 10.000 ₫</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Thành tiền</span>
                        <span class="fw-bold text-danger fs-4"><?=$order[0]['TongTien']?> ₫</span>
                    </div>

                    <div class="row">
                        <div class="col-8"><button class="btn container-fluid btn-secondary">Đã nhận hàng </button></div>
                        <div class="col-4"><button class="btn container-fluid btn-secondary">Hủy Đơn </button></div>
                    </div>

                    <div>
                        <a href="<?=APPURL?>" class="container-fluid btn btn-primary my-3 fs-5">Đóng</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
<!-- bill end-->