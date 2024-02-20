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
        // Sử dụng hằng số __DIR__ để xác định đường dẫn tuyệt đối tới thư mục hiện tại
        $viewsPath = __DIR__ . '/../../app/view/';
        
        // Bao gồm các tệp từ đường dẫn tuyệt đối
        include_once $viewsPath . 'layout_header.php';
        include_once $viewsPath . $viewName . '.php';
        include_once $viewsPath . 'layout_footer.php';
    }
    public function loadViewAdmin($viewName, $data = [])
    {
        // $data['dsSP']
        extract($data);
        // $dsSP
        // Sử dụng hằng số __DIR__ để xác định đường dẫn tuyệt đối tới thư mục hiện tại
        $viewsPath = __DIR__ . '/../../app/view/';
        
        // Bao gồm các tệp từ đường dẫn tuyệt đối
        include_once $viewsPath . 'ad_layout_header.php';
        include_once $viewsPath . $viewName . '.php';
        include_once $viewsPath . 'ad_layout_footer.php';
    }
}