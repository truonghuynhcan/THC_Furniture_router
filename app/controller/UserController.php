<?php
namespace App\controller;

use App\model\UserModel;

class UserController extends CoreController
{
    public function ChangePass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $oldPass = $_POST['pwd_old'];
            $newPass = $_POST['pwd_new'];
            $reNewPass = $_POST['repwd_new'];

            $oldPass_md5 = md5($oldPass);

            $user = new UserModel();
            $u = $user->getInfoUser($_SESSION['user']['Id'])[0];

            // bắt lỗi start -------------------------------------
            if (empty($oldPass) || empty($newPass) || empty($reNewPass)) {
                // Nếu bất kỳ trường nào thiếu, hiển thị thông báo lỗi và chuyển hướng người dùng
                showNoti('Dữ liệu không hợp lệ', 'danger');
                header('Location:' . APPURL . 'user/info_changePass');
                exit();
            }
            #kiểm tra mật khẩu cũ so với db
            if ($u['MatKhau'] != $oldPass_md5) {
                showNoti('Mật khẩu cũ không đúng', 'danger');
                header('Location:' . APPURL . 'user/info_changePass');
                exit();
            }
            // MK MỚI TRÙNG MK CŨ
            if ($oldPass == $newPass) {
                showNoti('Mật khẩu mới trùng với mật khẩu cũ', 'danger');
                header('Location:' . APPURL . 'user/info_changePass');
                exit();
            }
            // MK MỚI KHÔNG ĐỦ DÀI >6 KÝ TỰ
            if (strlen($newPass) < 6) {
                showNoti('Mật khẩu mới quá ngắn. Yêu cầu từ 6 ký tự trở lên', 'danger');
                header('Location:' . APPURL . 'user/info_changePass');
                exit();
            }
            // MK MỚI KHÔNG TRÙNG NHAU
            if ($newPass !== $reNewPass) {
                showNoti('Mật khẩu mới không trùng khớp', 'danger');
                header('Location:' . APPURL . 'user/info_changePass');
                exit();
            }
            
            // bắt lỗi end -------------------------------------

            $newPass_md5 = md5($newPass);
            $user->ChangePass($_SESSION['user']['Id'], $newPass_md5);
            
            // ĐỔI MK THÀNH CÔNG
            showNoti('Đổi mật khẩu thành công', 'info');
            header('Location:' . APPURL . 'user/info');
        }
    }


    public function showChangePass()
    {
        $this->loadViewSite('user_info_changePass', );
    }


    public function showInfoOrder()
    {
        $user = new UserModel();
        $data['listOder'] = $user->getInfoOrder($_SESSION['user']['Id']);

        $this->loadViewSite('user_info_order', $data);
    }


    public function updateInfo()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['fullname']) && isset($_POST['tel']) && isset($_POST['address'])) {
                $fullname = $_POST['fullname'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];

                // XỬ LÝ THÔNG TIN
                # lấy dữ liệu trên db so sánh
                $idUser = $_SESSION['user']['Id'];
                $user = new UserModel();
                $u = $user->getInfoUser($idUser)[0];
                if ($fullname != $u['HoVaTen'] || $tel != $u['SDT'] || $address != $u['DiaChi']) {
                    # Dữ liệu có thay đổi
                    $user->updateInfoUser($idUser, $fullname, $tel, $address);

                    // thông báo cập nhật thành công
                    showNoti('Cập nhật thông tin thành công', 'info');
                    header('location:' . APPURL . 'user/info');
                    
                } else {
                    # Dữ liệu không thay đổi gì cả
                    showNoti('Dữ liệu chưa được thay đổi', 'info');
                    header('location:' . APPURL . 'user/info');
                }
            } else {
                // thông báo xử lý lỗi
                showNoti('Vui lòng nhập đầy đủ thông tin', 'danger');
                header('location:' . APPURL . 'user/info');
            }
        }
    }


    public function showInfo()
    {
        $user = new UserModel();
        $data['user'] = $user->getInfoUser($_SESSION['user']['Id'])[0];
        $this->loadViewSite('user_info', $data);
    }


    public function order_received()
    {
        $idDH = $_GET["IdDh"];
        $user = new UserModel(); //load model
        $kq = $user->order_received($idDH); //lấy danh sách
        header("Location:" . APPURL . "user/order?idDh=" . $idDH);
    }
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


    public function showOrder()
    {
        $idDH = $_GET['idDh'];
        $oder = new UserModel(); //load model
        $data['order'] = $oder->getOrderById($idDH, $_SESSION['user']['Id']); //lấy danh sách

        if ($data['order'] == null) {
            echo "Không thể truy cập đơn hàng";
        } else {
            // print_r($data['order']);
            $this->loadViewSite('user_order', $data);
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
            // bắt lỗi
            // Form submitted, process data
            $fullname = $_POST['fullname'];
            $sdt = $_POST['sdt'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $repass = $_POST['repass'];

            // Validate form fields
            $errors = [];

            // Validate Fullname
            if (empty($fullname)) {
                $errors['fullname'] = 'Họ và tên không được để trống';
            }

            // Validate Phone Number
            if (empty($sdt)) {
                $errors['sdt'] = 'Số điện thoại không được để trống';
            } elseif (!preg_match('/^\d{10,11}$/', $sdt)) {
                $errors['sdt'] = 'Số điện thoại không hợp lệ';
            }

            // Validate Address
            if (empty($address)) {
                $errors['address'] = 'Địa chỉ không được để trống';
            }

            // Validate Email
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }

            // Validate Password
            if (empty($pass)) {
                $errors['pass'] = 'Mật khẩu không được để trống';
            } elseif (strlen($pass) < 6) {
                $errors['pass'] = 'Mật khẩu phải có ít nhất 6 ký tự';
            }

            // Validate Password Match
            if ($pass !== $repass) {
                $errors['repass'] = 'Mật khẩu không khớp';
            }

            $user = new UserModel();
            // Instead of JavaScript alerts
            if (!empty($errors)) {
                // Store errors in the session variable
                showNoti($errors, 'danger');
            } else if ($user->checkEmail($email)) {
                // Email already used, display notification
                showNoti("Email đã được sử dụng!", "danger");
            } else {
                $kq_login = $user->signup($fullname, $sdt, $address, $email, $pass);
                if (!$kq_login) {
                    // Registration unsuccessful, display notification
                    showNoti("Đăng ký người dùng không thành công!", "danger");
                } else {
                    // Registration successful, perform login
                    showNoti("Đăng ký thành công, bắt đầu đăng nhập", "success");
                    header("Location: " . APPURL . "user/login");
                    exit();
                }
            }
        }
        $this->loadViewSite('user_signup');
    }
    public function showSignup()
    {
        $this->loadViewSite('user_signup');
    }
}
