<?php
// link router library
require_once(__DIR__.'/public/router.php');

// link xl_controller
// require_once(__DIR__.'/app/controller/index.php');

// link autoload namespaces
require_once realpath("vendor/autoload.php");
use App\controller\PageController;
use App\controller\ProductsController;
use App\model\products;

$router = new Router();
    $router
    ->get('/',[PageController::class,'index'])
    ->get('/product/detail/{id}',[ProductsController::class,'detail'])
    // ->get('/',[controller::class,'loadViewSite'])
    // ->get('/chitiet',[controller::class,'chitiet'])
    ;
    
    echo $router->resolve($_SERVER['REQUEST_URI'],
                strtolower($_SERVER['REQUEST_METHOD']));
