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
                    <p class="mb-1"><?= $order[0]['NgayDat'] ?>
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
                                <td class="text-end"><?=number_format($sp['DonGia'],0,',','.')?> ₫</td>
                                <td class="text-end"><?=number_format($sp['DonGia']*$sp['SoLuong'],0,',','.')?> ₫</td>
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
                        <span class="fw-bold text-body-secondary"><?=number_format($order[0]['TongTien'],0,',','.')?> ₫</span>
                    </div>
                </div>
            </section>
            <!-- thanh toán -->
            <section class="border border-1 border-dark-subtle rounded-1">
                <div class="container">
                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Tạm tính</span>
                        <span class="fw-bold text-body-secondary"><?=number_format($totalPro,0,',','.')?> ₫</span>
                    </div>

                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Phí vận chuyển</span>
                        <span class="fw-bold text-body-secondary"><?=number_format($order[0]['PhiVanChuyen']??0,0,',','.')?> ₫</span>
                    </div>

                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Mã giảm giá</span>
                        <span class="fw-bold text-danger">- 10.000 ₫</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mt-1">
                        <span class="text-black-50 fw-medium">Thành tiền</span>
                        <span class="fw-bold text-danger fs-4"><?=number_format($order[0]['TongTien'],0,',','.')?> ₫</span>
                    </div>

                    <div class="row">
                        <div class="col-8"><a href="<?=APPURL?>user/order_received?IdDh=<?=$order[0]['Id']?>" class="btn container-fluid btn-warning <?=($order[0]['TrangThai']=='dang-giao-hang')?'':'disabled btn-outline-warning'?>">Đã nhận hàng </a></div>
                        <div class="col-4"><a href="<?=APPURL?>user/deleteOrder?IdDh=<?=$order[0]['Id']?>" class="btn container-fluid btn-secondary <?=($order[0]['TrangThai']=='huy-don')?'disabled btn-outline-secondary':''?>">Hủy Đơn </a></div>
                    </div>

                    <div>
                        <a href="<?=APPURL?>user/info_order" class="container-fluid btn btn-primary my-3 fs-5">Đóng</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
<!-- bill end-->