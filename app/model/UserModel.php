<?php
namespace App\model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UserModel
{
    public function ChangePass($idUser, $newPass){
        $xl = new xl_data();
        $sql = "UPDATE taikhoan SET `MatKhau`='".$newPass."' WHERE Id = ".$idUser;
        $result = $xl->execute_item($sql);
        return true;
    }


    public function getInfoOrder($idUser){
        $xl = new xl_data();
        $sql = 'SELECT * FROM donhang WHERE TrangThai!="gio-hang" AND MaTK='.$idUser;
        $result = $xl->readitem($sql);
        return $result;
    }


    public function updateInfoUser($idUser, $ten, $sdt, $dc){
        $xl = new xl_data();
        $sql = "UPDATE taikhoan SET `HoVaTen`='".$ten."', `SDT`='".$sdt."', `DiaChi`='".$dc."' WHERE Id = ".$idUser;
        $result = $xl->execute_item($sql);
        return $result;
    }


    public function getInfoUser($idUser){
        $xl = new xl_data();
        $sql = 'SELECT * FROM taikhoan WHERE Id="'.$idUser.'"';
        $result = $xl->readitem($sql);
        return $result;
    }


    public function order_received($idDH){
        $xl = new xl_data();
        $sql = "UPDATE donhang SET `TrangThai`='giao-thanh-cong' WHERE Id = ".$idDH;
        $result = $xl->execute_item($sql);
        return $result;
    }
    public function deleteOrderById($idDH){
        $xl = new xl_data();
        $sql = "UPDATE donhang SET `TrangThai`='huy-don' WHERE Id = ".$idDH;
        $result = $xl->execute_item($sql);
        return $result;
    }


    // lấy thông tin đơn hàng đã đặt từ id đơn hàng
    public function getOrderById($IdDh, $IdTK){
        $xl = new xl_data();
        $sql = 'SELECT 
                dh.* ,
                tk.HoVaTen,
                tk.SDT AS SDTTK, 
                sp.TenSanPham, 
                ctdh.SoLuong, 
                ctdh.DonGia
            FROM 
                donhang dh
            INNER JOIN 
                taikhoan tk ON dh.MaTK = tk.Id
            INNER JOIN 
                chitietdonhang ctdh ON dh.Id = ctdh.MaDH
            INNER JOIN 
                sanpham sp ON ctdh.MaSP = sp.Id
            WHERE 
                dh.Id = '.$IdDh.' AND dh.MaTK = '.$IdTK;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function rePass($email)
    {
        // Tạo mật khẩu ngẫu nhiên có 8 chữ số
        $pass = mt_rand(10000000, 99999999);

        $isSent = $this->sendPasswordResetEmail($email, $pass);

        if ($isSent) {
            // Mã hóa mật khẩu mới
            $hashedPassword = md5($pass);

            // Cập nhật mật khẩu mới vào cơ sở dữ liệu
            $xl = new xl_data();
            $sql = 'UPDATE taikhoan SET MatKhau = "'.$hashedPassword.'" WHERE taikhoan.Email = "'.$email.'"';
            $result = $xl->execute_item($sql);
            return true;
        } else {
            return false;
        }
    }
    function sendPasswordResetEmail($email, $newPassword)
    {
        $mail = new PHPMailer(true); // True cho phép bắt lỗi

        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Thay thế bằng địa chỉ SMTP của bạn
            $mail->SMTPAuth = true;
            $mail->Username = 'truonghuynhcan@gmail.com'; // Thay thế bằng tên đăng nhập SMTP của bạn
            $mail->Password = 'vuqu tohl krhh uwlb'; // Thay thế bằng mật khẩu SMTP của bạn
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Thiết lập thông tin người gửi và địa chỉ email
            $mail->setFrom('truonghuynhcan@gmail.com', 'THC Furniture'); // Thay thế bằng địa chỉ email của bạn và tên của bạn

            // Địa chỉ người nhậnq
            $mail->addAddress($email);

            // Chủ đề email
            $mail->Subject = 'New password';

            // Nội dung email
            $mail->Body = 'Mật khẩu mới của bạn là: ' . $newPassword;

            // Gửi email
            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function checkEmail($email)
    {
        $xl = new xl_data();
        $sql = 'SELECT * FROM taikhoan WHERE Email="' . $email.'"';
        $result = $xl->readitem($sql);
        return $result;
    }
    public function signup($fullname, $sdt, $address, $email, $pass)
    {
        $hashedPassword = md5($pass);
        $xl = new xl_data();
        $sql = 'INSERT INTO taikhoan (Id, HoVaTen, SDT, DiaChi, Email, MatKhau, Quyen) VALUES (null,"' . $fullname . '","' . $sdt . '","' . $address . '","' . $email . '","' . $hashedPassword . '",0)';
        $result = $xl->execute_item($sql);
        return true;
    }

    public function login($email, $pass)
    {
        $hashedPassword = md5($pass);
        $xl = new xl_data();
        // $sql = "SELECT * FROM taikhoan WHERE Email=" . $email . " AND MatKhau=" . $hashedPassword;
        $sql = 'SELECT * FROM taikhoan WHERE Email="'.$email.'" AND MatKhau="'.$hashedPassword.'"';
        $result = $xl->readitem($sql);
        return $result;
    }
}