<?php
namespace App\model;
// use App\model\xl_data;
class ProductModel
{
    public function getProductById($IdPro)
    {
        $xl = new xl_data();
        $sql = "SELECT * FROM sanpham WHERE Id=" . $IdPro;
        $result = $xl->readitem($sql);
        return $result;

    }
    public function getProducts()
    {
        $xl = new xl_data();
        $sql = "select * from sanpham";
        $result = $xl->readitem($sql);
        return $result;
    }
}