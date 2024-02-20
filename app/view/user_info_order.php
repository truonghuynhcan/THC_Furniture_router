<!-- Breadcrumb star-->
<section class="position-relative">
    <img src="<?=APPURL?>public/upload/banners/breadcrumb.webp" class="w-100" alt="">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"
        class="position-absolute top-50 start-50 translate-middle d-flex flex-column align-items-center">
        <h1>Trang đơn hàng</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=APPURL?>" class="text-primary">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Trang đơn hàng</li>
        </ol>
    </nav>
</section>
<!-- Breadcrumb end-->

<!-- cart star -->
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-body-secondary">Xin chào</h6>
                        <h5 class="card-title">Trương Huỳnh Can</h5>
                        <div class="list-group list-group-flush mt-4">
                            <a href="<?= APPURL ?>user/info" class="list-group-item list-group-item-action "
                                aria-current="true">
                                Thông tin tài khoản
                            </a>
                            <a href="<?= APPURL ?>user/info_order" class="list-group-item list-group-item-action active">Đơn hàng</a>
                            <a href="<?= APPURL ?>user/info_changePass" class="list-group-item list-group-item-action">Đổi mật
                                khẩu</a>
                            <a href="<?= APPURL ?>user/logout" class="list-group-item list-group-item-action">Đăng
                                xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-9">
                <h2>Đơn hàng</h2>
                <table class="table table-bordered table-hover">
                    <style>
                        th,
                        td {
                            text-align: center;
                        }
                    </style>
                    <thead>
                        <tr class="table-warning">
                            <th scope="col">Đơn hàng</th>
                            <th scope="col">Ngày</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Giá trị đơn hàng</th>
                            <th scope="col">TT Thanh toán</th>
                            <th scope="col">TT Giao hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listOder as $o):?>
                        <tr>
                            <th class="text-primary" scope="row">
                                <a href="<?=APPURL?>user/order?idDh=<?=$o['Id']?>">#<?=$o['Id']?></a>
                            </th>
                            <td><?=$o['NgayDat']?></td>
                            <td>
                                <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                <?=$o['DiaChiGiaoHang']?>
                                </span>
                            </td>
                            <td><?=$o['TongTien']?> ₫</td>
                            <td class="text-primary fw-bold">Chưa thanh toán</td>
                            <td class="text-primary"><?=$o['TrangThai']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- cart end -->