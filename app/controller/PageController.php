<?php
namespace App\controller;

use App\model\ProductModel;

class PageController extends CoreController{
    public function index(){
        $products = new ProductModel;
        $data['listItems'] = $products->getProducts();
        $this->loadViewSite('page_index',$data);
    }
    public function about(){
        
        $this->loadViewSite('page_about');
    }
}