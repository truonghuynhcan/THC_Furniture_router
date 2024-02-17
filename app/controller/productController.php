<?php
namespace App\controller;

use App\model\ProductModel;

class ProductController extends CoreController
{
    public function detail()
    {
        $idsp = $_GET['id'];
        $products = new ProductModel;
        $data['pro'] = $products->getProductById($idsp)[0];
        $this->loadViewSite('pro_detail', $data);
    }
}
