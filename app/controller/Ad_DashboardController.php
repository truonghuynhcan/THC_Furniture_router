<?php
namespace App\controller;

use App\model\Ad_DashboardModel;

class Ad_DashboardController extends CoreController{
    public function showDashboard(){
        $dashboard = new Ad_DashboardModel();

        $data['countOder'] = $dashboard->countOrder()[0];
        $data['countUser'] = $dashboard->countUser()[0];
        $data['SumIncome'] = $dashboard->SumIncome()[0];
        $data['Orders'] = $dashboard->getOrderAll();
        $this->loadViewAdmin('ad_dashboard', $data);
    }
}