<?php
namespace App\model;

use App\model\xl_data;

class Ad_OrderModel
{
    
    public function updateOrder_dcb($IdDh){
        $xl = new xl_data();
        $sql = "UPDATE `donhang` SET`TrangThai`='dang-giao-hang' WHERE Id=".$IdDh;
        $result = $xl->execute_item($sql);
        return $result;
    }
    public function updateOrder_cxn($IdDh){
        $xl = new xl_data();
        $sql = "UPDATE `donhang` SET`TrangThai`='dang-chuan-bi' WHERE Id=".$IdDh;
        $result = $xl->execute_item($sql);
        return $result;
    }
    public function getOrderById($IdDh){
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
                dh.Id = '.$IdDh;
        $result = $xl->readitem($sql);
        return $result;
    }
    public function sumIncome()
    {
        $xl = new xl_data();
        $sql = "SELECT 
                SUM(TongTien) AS TongDoanhThu
            FROM 
                donhang
            WHERE 
                TrangThai = 'giao-thanh-cong'
            GROUP BY TrangThai
            UNION ALL
            SELECT 0
        ";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function countTT_check()
    {
        $xl = new xl_data();
        $sql = "SELECT COUNT(*) as sl
        FROM donhang
        WHERE TrangThai = 'cho-xac-nhan' OR TrangThai = 'dang-chuan-bi' 
        GROUP BY TrangThai
        UNION ALL
        SELECT 0
        ";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function countTT_done()
    {
        $xl = new xl_data();
        $sql = "SELECT COUNT(*) as sl
        FROM donhang
        WHERE TrangThai = 'giao-thanh-cong' 
        GROUP BY TrangThai
        UNION ALL
        SELECT 0
        ";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function getListOrder()
    {
        $xl = new xl_data();
        $sql = "SELECT * FROM donhang";
        $result = $xl->readitem($sql);
        return $result;
    }
}