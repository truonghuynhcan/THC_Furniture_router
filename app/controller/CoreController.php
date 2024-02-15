<?php
namespace App\controller;

class CoreController
{

    // function chạy trước tiên
    public function loadViewSite($viewName, $data = [])
    {
        // $data['dsSP']
        extract($data);
        // $dsSP
        include_once '../app/Views/layout_header.php';
        include_once '../app/Views/' . $viewName . '.php';
        include_once '../app/Views/layout_footer.php';
    }
}