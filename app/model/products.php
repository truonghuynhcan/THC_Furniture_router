<?php
namespace App\model;

class products{
    public function getProducts()
    {
        $xl = new xl_data();
        $sql = "select * from sanpham";
        $result = $xl->readitem($sql);
        return $result;
    }
}