<?php
namespace App\controller;

use App\model\Ad_ProductModel;

class Ad_ProductController extends CoreController
{
    public function change_status()
    {
        $idSP = $_GET['idSP'];
        $st = $_GET['st']; #trạng thái 1:hiện 0:ẩn
        $products = new Ad_ProductModel();
        if ($st == 1) {
            # cho ẩn
            $products->change_status($idSP, 0);
        } else {
            # cho hiện
            $products->change_status($idSP, 1);
        }
        header("Location:" . APPURL . "ad_products/index");
    }

    public function showProducts()
    {
        $products = new Ad_ProductModel();
        $data['products'] = $products->showProAll();
        $data['countSP'] = $products->countSP()[0];

        // load view    
        $this->loadViewAdmin('ad_products', $data);
    }

    public function update()
    {
        $IdSP = $_GET['id'];
        $products = new Ad_ProductModel();

        // Kiểm tra nếu form đã được submit
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_pro'])) {
            $pro = $products->showProUpdate($IdSP)[0];
            /*
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
                            // ... Các xử lý khác ...

                            // Xử lý upload ảnh mới
                            if (isset($_FILES['newImage'])) {
                                $newImageName = uploadNewImage($_FILES['newImage']);
                                if ($newImageName) {
                                    // Lấy ID hình ảnh cần cập nhật (giả sử được lấy từ form)
                                    $imageId = $_POST['imageId']; // Bạn cần thay đổi tùy thuộc vào cách bạn tổ chức form

                                    // Nếu upload ảnh thành công, gọi hàm lưu tên ảnh và thay thế đường dẫn cũ
                                    saveImageNameAndReplace($imageId, $newImageName);
                                }
                            }
                        }
                        */
            // Lấy thông tin sách từ CSDL để so sánh với dữ liệu mới nhập từ form
            // Kiểm tra sự thay đổi trong dữ liệu so với dữ liệu cũ
            if (
                $_POST['tensp'] != $pro['TenSanPham'] || $_POST['thuonghieu'] != $pro['ThuongHieu'] || $_POST['dongia'] != $pro['DonGia'] ||
                $_POST['giamgia'] != $pro['GiamGia'] || $_POST['kichthuoc'] != $pro['KichThuoc'] ||
                $_POST['mausac'] != $pro['MauSac'] || $_POST['tonkho'] != $pro['TonKho'] || $_POST['mota'] != $pro['MoTa'] ||
                $_POST['motact'] != $pro['MoTaCT'] || $_POST['trangthai'] != $pro['TrangThai']
            ) {
                if ($_POST['tonkho'] == 0 && $_POST['trangthai'] == 1) {
                    # code...
                    echo '<script>';
                    echo 'alert("Hàng đã hết không thể đặt trạng thái là HIỆN!");';
                    // echo 'window.location.href = "index.php?pg=ad&active=book_update&bookId=' . $bookId . '";';
                    echo '</script>';
                } else {
                    // 2. Thực hiện cập nhật thông tin sách
                    $products->updateProduct($IdSP, $_POST['tensp'], $_POST['thuonghieu'], $_POST['dongia'], $_POST['giamgia'], $_POST['kichthuoc'], $_POST['mausac'], $_POST['tonkho'], $_POST['mota'], $_POST['motact'], $_POST['trangthai']);

                    echo '<script>';
                    echo 'alert("Cập nhật thành công!");';
                    // echo 'window.location.href = "index.php?pg=ad&active=book_update&bookId=' . $bookId . '";';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("Bạn chưa thay đổi dữ liệu nào cả!");';
                // echo 'window.location.href = "index.php?pg=ad&active=book_update&bookId=' . $bookId . '";';
                echo '</script>';
            }
        }

        // lấy lại dữ liệu mới
        $data['pro'] = $products->showProUpdate($IdSP)[0];
        $data['listImg'] = $products->showProUpdate_img($IdSP);

        $this->loadViewAdmin('ad_products_update', $data);
    }
}