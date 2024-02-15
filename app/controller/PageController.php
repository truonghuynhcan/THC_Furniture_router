<?php
namespace App\controller;

class PageController extends CoreController{
    public function index(){
        $this->loadViewSite('index');
    }
}