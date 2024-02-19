<?php
namespace App\controller;

use App\model\UserModel;

class UserController extends CoreController
{
    public function DeleteOrder()
    {
        $idDH = $_GET["IdDh"];
        $user = new UserModel(); //load model
        $kq = $user->deleteOrderById($idDH); //lấy danh sách
        header("Location:" . APPURL . "user/order?idDh=" . $idDH);
    }
    public function checkDeleteOrder()
    {
        $idDH = $_GET["IdDh"];
        echo '
        <script>
            var result = confirm("Xác nhận hủy đơn hàng id:' . $idDH . '?");
            if (result) {
                window.location.href = "' . APPURL . 'user/deleteOrder2?IdDh=' . $idDH . '";
            }else{
                window.location.href = "' . APPURL . 'user/order?idDh=' . $idDH . '";
            }
        </script>
        ';
    }
    public function showInfo()
    {
        $idTK = $_SESSION['user']['Id'];
    }
    public function showOrder()
    {
        $idDH = $_GET['idDh'];
        $oder = new UserModel(); //load model
        $data['order'] = $oder->getOrderById($idDH, $_SESSION['user']['Id']); //lấy danh sách
        
        if ($data['order'] == null) {
            echo "Không thể truy cập đơn hàng";
        } else {
            // print_r($data['order']);
            $this->loadViewSite('user_order',$data);
        }

    }
    // cart
    public function addToCart()
    {
        $idsp = $_GET['id']; // lấy id so

        // $products = new UserModel;
        // $data['pro'] = $products->getProductById($idsp)[0];
        // $this->loadViewSite('pro_detail', $data);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: " . APPURL . "user/login");
        exit();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $user = new UserModel();
            $kq = $user->login($_POST['email'], $_POST['pass'])[0];
            if ($kq) {
                // Lưu session
                $_SESSION['user'] = $kq;
                // chuyển trang
                header('Location: ' . APPURL);
                exit();
            } else {
                // báo lỗi
                showNoti("Sai email hoặc mật khẩu!", "danger");
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['repass'])) {
            $user = new UserModel();
            if ($user->checkEmail($_POST['email'])) {
                // email có trong db
                $kq = $user->rePass($_POST['email']);
                if ($kq) {
                    showNoti("Mật khẩu mới đã gửi đến email", "success");
                } else {
                    showNoti("Gửi email thất bại", "danger");
                }
            } else {
                showNoti("Email không tồn tại", "warning");
            }
        }

        $this->loadViewSite('user_login');
    }
    public function signup()
    {
        $this->loadViewSite('user_signup');
    }
}
