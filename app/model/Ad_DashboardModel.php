<?php
namespace App\model;

use App\model\xl_data;

class Ad_DashboardModel
{
    public function SumIncome()
    {
        $xl = new xl_data();
        $sql = "SELECT SUM('ThanhTien') AS DoanhThu FROM donhang";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function countOrder()
    {
        $xl = new xl_data();
        $sql = "SELECT COUNT(*) AS SoDH FROM donhang";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function countUser()
    {
        $xl = new xl_data();
        $sql = "SELECT COUNT(*) AS SoTK FROM taikhoan";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function getOrderAll()
    {
        $xl = new xl_data();
        $sql = "SELECT 
                dh.*,
                tk.HoVaTen AS 'TaiKhoan'
            FROM 
                donhang dh
            JOIN 
                taikhoan tk ON dh.MaTK = tk.Id;
        ";
        $result = $xl->readitem($sql);
        return $result;
    }
}