<?php
namespace App\controller;

// use App\model\ProductModel;

class NewsController extends CoreController{
    // display page news
    public function news(){
        $this->loadViewSite('news');
    }
}