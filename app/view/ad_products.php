<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Quản lý sản phẩm</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Quản lý sách</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Trang chủ</a>
                </li>
            </ul>
        </div>
        <!-- <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download'></i>
            <span class="text">Download PDF</span>
        </a> -->
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Sản phẩm (
                    <?= $countSP['sl'] ?>)
                </h3>
                <!-- <p><?php print_r($_SERVER)?></p> -->
                <p><?php
// Lấy URL hiện tại
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Tách URL thành các phần
$url_parts = parse_url($current_url);

// Kiểm tra nếu có phần path trong URL
if (isset($url_parts['path'])) {
    // Tách phần path thành các phần con
    $path_parts = explode('/', $url_parts['path']);
    
    // Lặp qua các phần con để tìm phần bạn quan tâm (ad_products)
    foreach ($path_parts as $part) {
        switch ($part) {
            case 'ad_products':
                # code...
            echo "Tìm thấy phần ad_products!";
                break;
            
            default:
                # code...
                break;
        }
    }
} else {
    echo "Không có phần path trong URL.";
}
?>
</p>
                <!-- <i class='bx bx-search'></i> -->
                <!-- <i class='bx bx-filter'></i> -->
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tên sp</th>
                        <th scope="col">Loại sp</th>
                        <th scope="col" class="text-end">Giá</th>
                        <th scope="col" class="text-end">Tồn kho</th>
                        <th scope="col" class="text-end">Lượt bán</th>
                        <th scope="col" class="text-center">Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $pro): ?>
                        <tr>
                            <td scope="row" class="text-center"> 
                                <a href="<?= APPURL ?>ad_products/update?id=<?= $pro['Id'] ?>">#<?= $pro['Id'] ?></a>
                            </td>
                            <td>
                                <?= $pro['TenSanPham'] ?>
                            </td>
                            <td>
                                <?= $pro['Loai'] ?>
                            </td>
                            <td class="text-end">
                                <?= number_format($pro['DonGia'], 0, ',', '.') ?> ₫
                            </td>
                            <td class="text-end">
                                <?= number_format($pro['TonKho'], 0, ',', '.') ?>
                            </td>
                            <td class="text-end">
                                <?= number_format($pro['LuotBan'], 0, ',', '.') ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= APPURL ?>ad_products/update?id=<?= $pro['Id'] ?>"
                                    class="btn btn-sm btn-warning">Xửa</a>
                                <a href="<?= APPURL ?>ad_products/change_status?idSP=<?= $pro['Id'] ?>&&st=<?= $pro['TrangThai'] ?>"
                                    class="btn btn-sm <?= ($pro['TonKho'] == 0) ? 'disabled' : '' ?> <?= ($pro['TrangThai'] == 1) ? 'btn-secondary' : 'btn-info' ?>">
                                    <?= ($pro['TrangThai'] == 1) ? 'Ẩn' : 'Hiện' ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="table-data d-none" style="flex-direction: row; gap:20px; padding: 0; background-color: var(--grey)">
            <div class="order">
                <div class="head">
                    <h3>Thể loại (
                        <?= $categoryCount ?>)
                    </h3>
                    <a href="#" style="color: var(--blue);">Thêm thể loại mới</a>
                    <!-- <i class='bx bx-search'></i> -->
                    <!-- <i class='bx bx-filter'></i> -->
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên thể loại</th>
                            <th style="text-align: center;">Số lượng sách</th>
                            <th style="text-align: center;">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listGenres as $genres):
                            ?>
                            <tr>
                                <td>
                                    <?= $genres['Id'] ?>
                                </td>
                                <td>
                                    <?= $genres['TenTheLoai'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= $genres['bookCount'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="index.php?pg=ad&active=book_genreUpdate&genreId=<?= $genres['Id'] ?>"
                                        class="btn-update">
                                        <i class="fa-regular fa-pen-to-square fa-xl" style="color: var(--blue);"></i>
                                    </a>
                                    <a href="index.php?pg=ad&active=book_management&deleteCategoryId=<?= $genres['Id'] ?>"
                                        class="btn-del">
                                        <i class="fa-solid fa-trash fa-xl"
                                            style="color: var(--red); margin-left: 1rem;"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- MAIN -->