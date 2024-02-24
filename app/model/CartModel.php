<?php
namespace App\model;

use App\model\xl_data;

class CartModel
{
    public function orderById($SoLuongSP, $TongTien, $PhiVanChuyen, $NguoiNhan, $SDT, $DiaChiGiaoHang, $MaDH)
    {
        $xl = new xl_data();
        $sql = "UPDATE `donhang` 
        SET 
            SoLuongSP = ".$SoLuongSP.", 
            TongTien = ".$TongTien.", 
            PhiVanChuyen = ".$PhiVanChuyen.", 
            TrangThai = 'cho-xac-nhan', 
            NguoiNhan = '".$NguoiNhan."',
            SDT = '".$SDT."',
            DiaChiGiaoHang = '".$DiaChiGiaoHang."'
        WHERE Id =".$MaDH;

        $result = $xl->execute_item($sql);
        return $result;
    }

    public function remoteProduct($IdSP, $IdUser)
    {
        $xl = new xl_data();
        $sql = "DELETE FROM chitietdonhang 
        WHERE MaDH IN (SELECT Id FROM donhang WHERE MaTK = " . $IdUser . ") AND MaSP = " . $IdSP;
        $result = $xl->execute_item($sql);
        return $result;
    }


    // tăng giảm số lượng sp START
    public function increaseItem($MaDH, $MaSP)
    {
        $xl = new xl_data();
        $sql = "UPDATE chitietdonhang 
            SET SoLuong = SoLuong+1
            WHERE  MaDH =" . $MaDH . " AND MaSP =" . $MaSP;

        $result = $xl->execute_item($sql);
        return $result;
    }
    public function decreaseItem($MaDH, $MaSP)
    {
        $xl = new xl_data();
        $sql = "UPDATE chitietdonhang 
            SET SoLuong = SoLuong-1
            WHERE  MaDH =" . $MaDH . " AND MaSP =" . $MaSP;

        $result = $xl->execute_item($sql);
        return $result;
    }
    // tăng giảm số lượng sp END


    // sử lý voucher
    // public function addVoucher($MaDH, $voucher)
    // {
    //     return $this->db->pdo_execute("UPDATE donhang SET MaGG =? WHERE Id =?", $voucher, $MaDH);
    // }
    // public function isValidVoucher($voucher)
    // {
    //     return $this->db->pdo_query_one("SELECT * FROM magiamgia WHERE MaGG =?", $voucher);
    // }

    public function getCartbyUser($MaTK)
    { // kiểm tra lại
        $xl = new xl_data();
        $sql = "SELECT * FROM donhang WHERE MaTK =" . $MaTK . " AND TrangThai='gio-hang'";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function addCart($MaTK)
    {
        $xl = new xl_data();
        $sql = "INSERT INTO donhang (`MaTK`) VALUES(" . $MaTK . ")";
        $result = $xl->execute_item($sql);
        return $result;
    }

    public function addProduct($MaDH, $sp)
    {
        $kq = $this->hasCart($MaDH, $sp['Id']);
        // nếu chưa có sp trong cart
        if ($kq) {
            // có sp trong cart -> #tăng số lượng sp
            $sql = "UPDATE chitietdonhang SET SoLuong = SoLuong+1 WHERE MaDH =" . $MaDH . " AND MaSP =" . $sp['Id'];
        } else {
            // KO sp trong cart -> #thêm sp vào
            $sql = "INSERT INTO chitietdonhang (`MaDH`, `MaSP`, `DonGia`) VALUES(" . $MaDH . "," .$sp['Id'] . "," . $sp['DonGia']*(1-$sp['GiamGia']/100) . ")";
        }

        $xl = new xl_data();
        $result = $xl->execute_item($sql);
        return $result;
    }

    // kiểm tra sp có trong cart chưa
    public function getProductById($IdPro)
    {
        $xl = new xl_data();
        $sql = "SELECT Id, DonGia, GiamGia FROM sanpham WHERE Id =" . $IdPro;
        $result = $xl->readitem($sql);
        return $result;
    }
    // kiểm tra sp có trong cart chưa
    public function hasCart($MaDH, $MaSP)
    {
        $xl = new xl_data();
        $sql = "SELECT * FROM chitietdonhang WHERE MaDH =" . $MaDH . " AND MaSP =" . $MaSP;
        $result = $xl->readitem($sql);
        return $result;
    }

    public function getProductInCart($IdUser)
    {
        $xl = new xl_data();
        $sql = "SELECT 
                sp.Id,
                sp.Anh AS AnhSP,
                sp.TenSanPham AS TenSP,
                sp.DonGia,
                sp.GiamGia AS GiamGiaSP,
                sp.TonKho,
                ctdh.SoLuong,
                dh.Id as MaDH
            FROM 
                donhang dh
            JOIN 
                chitietdonhang ctdh ON dh.Id = ctdh.MaDH
            JOIN 
                sanpham sp ON ctdh.MaSP = sp.Id
            JOIN 
                taikhoan tk ON dh.MaTK = tk.Id
            WHERE 
                tk.Id = " . $IdUser . " AND dh.TrangThai='gio-hang'";

        $result = $xl->readitem($sql);
        return $result;
    }
}