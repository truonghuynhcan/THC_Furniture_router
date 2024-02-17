<?php
namespace App\controller;

use App\model\UserModel;

class UserController extends CoreController
{
    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: " . APPURL . "public/login");
        exit();
    }
    public function login(){
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
    public function signup(){
        $this->loadViewSite('user_signup');
    }
    public function addToCart()
    {
        $idsp = $_GET['id']; // lấy id so
        
        // $products = new UserModel;
        // $data['pro'] = $products->getProductById($idsp)[0];
        // $this->loadViewSite('pro_detail', $data);
    }

}
