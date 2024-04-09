<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Danh sách đơn hàng</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Đơn hàng</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Trang chủ</a>
                </li>
            </ul>
        </div>
        <!-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a> -->
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bx-cart'></i>
            <span class="text">
                <h3><?=$countTT_check['sl']?></h3>
                <p>Chờ xác nhận</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-cylinder'></i>
            <span class="text">
                <h3><?=$countTT_done['sl']?></h3>
                <p>Đã giao thành công</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3><?=number_format($sumIncome['TongDoanhThu'],0,',','.')?> ₫</h3>
                <p>Tổng doanh thu</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Danh sách sản phẩm</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <style>
                    th,
                    td {
                        text-align: center !important;
                    }

                    tr td:first-child {
                        justify-content: center;
                    }
                </style>
                <thead>
                    <tr>
                        <th scope="col">Đơn hàng</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listOder as $o): ?>
                        <tr>
                            <td scope="row"><a href="<?=APPURL?>ad_order/detail?idDh=<?= $o['Id'] ?>">#
                                    <?= $o['Id'] ?>
                                </a></td>
                            <td>
                                <?= $o['NgayDat'] ?>
                            </td>
                            <td><span class="status <?=($o['TrangThai']=='giao-thanh-cong'||$o['TrangThai']=='huy-don')?'completed':(($o['TrangThai']=='gio-hang')?'process':'pending')?>"><?=$o['TrangThai']?></span></td>
                            <td>
                                <?= number_format($o['TongTien'],0,',','.') ?> ₫
                            </td>
                            <td><span class="d-inline-block text-truncate" style="max-width: 250px;">
                                    <?= $o['DiaChiGiaoHang'] ?>
                                </span></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <td scope="row"><a href="#">#1</a></td>

                        <td>01-10-2021</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td scope="row"><a href="#">#1</a></td>

                        <td>01-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td scope="row"><a href="#">#1</a></td>

                        <td>01-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MAIN -->