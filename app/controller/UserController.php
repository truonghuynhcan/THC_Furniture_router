<?php
namespace App\controller;

use App\model\UserModel;

class UserController extends CoreController
{
    public function login(){
        $this->loadViewSite('user_login');
    }
    public function addToCart()
    {
        $idsp = $_GET['id']; // lấy id so
        
        // $products = new UserModel;
        // $data['pro'] = $products->getProductById($idsp)[0];
        // $this->loadViewSite('pro_detail', $data);
    }

}
