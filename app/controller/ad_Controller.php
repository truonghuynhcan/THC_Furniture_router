<?php
namespace App\controller;

use App\model\ProductModel;

class ad_Controller extends CoreController{
    public function showDashboard(){
        $this->loadViewAdmin('ad_dashboard');
    }
}