<?php
namespace App\controller;

use App\model\CartModel;

class CartController extends CoreController
{
    public function checkout()
    {
        // xử lý đặt hàng
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order'])) {
            // lấy thông tin người dùng
            $SoLuongSP = $_POST['countPro'];
            $TongTien = $_POST['totalBill'];
            $NguoiNhan = $_POST['fullname'];
            $SDT = $_POST['sdt'];
            $DiaChiGiaoHang = $_POST['address'];
            $MaTK = $_SESSION['user']['Id'];

            //lấy thông tin dơn hàng
            $MaDH = $_POST['madh'];

            // cập nhật giỏ hàng
            $order = new CartModel(); //load model
            // $order->orderById($SoLuongSP, $TongTien, $NguoiNhan, $SDT, $DiaChiGiaoHang, $MaTK);
            showNoti('Bạn đã đặt hàng thành công', 'info');
            header('location: ' . APPURL . 'user/order?idDh=' . $MaDH);
            // header('location: ' . APPURL . 'user/order');
        }
    }
    public function showCheckout()
    {
        if (isset($_SESSION['user'])) {
            // load view
            # ĐÃ đăng nhập
            $oder = new CartModel(); //load model
            $data['cart'] = $oder->getProductInCart($_SESSION['user']['Id']); //lấy danh sách
        } else {
            # CHƯA đăng nhập
            //lấy danh sách từ session
            // $cart = $_SESSION['cart'];
            // $data['cart'] = $cart;
        }
        $this->loadViewSite('cart_checkout', $data);
    }
    public function cartItem()
    {
        $MaDH = $_GET['MaDH'];
        $MaSP = $_GET['MaSP'];
        $type = $_GET['type'];
        $order = new CartModel();
        if ($type == "increase") {
            $order->increaseItem($MaDH, $MaSP);
        } else {
            $order->decreaseItem($MaDH, $MaSP);
        }
        header('Location: ' . APPURL . 'cart');
    }

    public function addToCart()
    {
        $MaSP = $_GET['id'];
        // echo "Them san pham" . $MaSP;
        if (isset($_SESSION['user'])) {
            $MaTK = $_SESSION['user']['Id'];
            // da dang nhap -> luu db
            $order = new CartModel();
            $cart = $order->getCartbyUser($MaTK)[0];

            if (!$cart) {
                // chưa có giỏ hàng?
                #tạo giỏ hàng
                $order->addCart($MaTK);
                $cart = $order->getCartbyUser($MaTK)[0];
            }
            #thêm sp vào giỏ
            $order->addProduct($cart['Id'], $MaSP);
        } else {
            //  chua dang nhap --> lưu vào session
            // // có giỏ hàng chưa
            // // chưa thì tạo giỏ hàng
            // if (!isset($_SESSION['cart'])) {
            //     $_SESSION['cart'] = [];
            // }

            // $timthay = false;
            // $i = 0;

            // foreach ($_SESSION['cart'] as $sp) {
            //     if ($sp['Id'] == $MaSP) {
            //         //đã có sp trong cart
            //         $_SESSION['cart'][$i]['SoLuong']++;
            //         $timthay = true;
            //         break;
            //     }
            //     $i++;
            // }
            // if (!$timthay) {
            //     //Chưa có trong giỏ
            //     array_push($_SESSION['cart'], [
            //         "Id" => $MaSP,
            //         "SoLuong" => 1,
            //     ]);
            // }

        }
        // echo `<pre>`;
        // print_r($_SESSION['cart']);
        // echo `</pre>`;

        header("Location:" . APPURL . 'cart');
        // $this->cart();

    }

    public function showcart()
    {
        $idUser = $_SESSION['user']['Id'];

        if (isset($idUser)) {
            $oder = new CartModel();
            $data['cart'] = $oder->getProductInCart($idUser);
            $this->loadViewSite('cart_show', $data);
        } else {
            showNoti('Cần đăng nhập để thực hiện chức năng', 'info');
            header('Location: ' . APPURL . 'user/login');
        }

    }

    // public function cartItem($MaDH, $MaSP, $type)
    // {
    //     $order = $this->loadModel('order');
    //     if ($type == "increase") {
    //         $order->increaseItem($MaDH, $MaSP);
    //     } else {
    //         $order->decreaseItem($MaDH, $MaSP);
    //     }
    //     header('Location: ' . APPURL . 'product/cart');
    // }
}