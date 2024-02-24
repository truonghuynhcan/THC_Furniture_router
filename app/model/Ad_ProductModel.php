<?php
namespace App\model;

use App\model\xl_data;

class Ad_ProductModel
{
    public function countSP()
    {
        $xl = new xl_data();
        $sql = "SELECT COUNT(*) as sl
        FROM sanpham
        ";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function change_status($idSP,$st){
        $xl = new xl_data();
        $sql = "UPDATE sanpham
        SET
            TrangThai = ".$st." WHERE Id= ".$idSP;
        $result = $xl->execute_item($sql);
        return $result;
    }
    public function updateProduct($IdSP, $TenSP, $ThuonHieu, $DonGia, $GiamGia, $KichThuoc, $MauSac, $TonKho, $MoTa, $MoTaCT, $TrangThai)
    {
        $xl = new xl_data();
        $sql = "UPDATE sanpham
        SET
            TenSanPham = '".$TenSP."',
            ThuongHieu = '".$ThuonHieu."',
            DonGia = ".$DonGia.",
            GiamGia = ".$GiamGia.",
            KichThuoc = '".$KichThuoc."',
            MauSac = '".$MauSac."',
            TonKho = ".$TonKho.",
            MoTa = '".$MoTa."',
            MoTaCT = '".$MoTaCT."',
            TrangThai = ".$TrangThai." WHERE Id= ".$IdSP;
        $result = $xl->execute_item($sql);
        return $result;

    }
    public function showProUpdate_img($IdSP)
    {
        $xl = new xl_data();
        $sql = "SELECT a.* FROM anhsp a WHERE IdSP =" . $IdSP;
        $result = $xl->readitem($sql);
        return $result;

    }
    public function showProUpdate($IdSP)
    {
        $xl = new xl_data();
        $sql = "SELECT 
                    sp.*,
                    dm.Ten AS 'Loai',
                    IFNULL(COUNT(ctdh.MaSP), 0) AS 'LuotBan'
                FROM 
                    sanpham sp
                JOIN danhmuc dm ON sp.IdDM = dm.Id
                LEFT JOIN 
                    chitietdonhang ctdh ON sp.Id = ctdh.MaSP
                LEFT JOIN 
                    donhang dh ON ctdh.MaDH = dh.Id
                WHERE sp.Id = ".$IdSP;
        $result = $xl->readitem($sql);
        return $result;

    }
    public function showProAll()
    {
        $xl = new xl_data();
        $sql = "SELECT 
                    sp.*,
                    dm.Ten AS 'Loai',
                    IFNULL(COUNT(ctdh.MaSP), 0) AS 'LuotBan'
                FROM 
                    sanpham sp
                JOIN danhmuc dm ON sp.IdDM = dm.Id
                LEFT JOIN 
                    chitietdonhang ctdh ON sp.Id = ctdh.MaSP
                LEFT JOIN 
                    donhang dh ON ctdh.MaDH = dh.Id
                GROUP BY
                    sp.Id";
        $result = $xl->readitem($sql);
        return $result;
    }
    // public function getOrderAll()
    // {
    //     $xl = new xl_data();
    //     $sql = "";
    //     $result = $xl->readitem($sql);
    //     return $result;
    // }
}