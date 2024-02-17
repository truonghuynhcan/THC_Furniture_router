<?php
// link router library
require_once(__DIR__ . '/public/router.php');

// link autoload namespaces
// require_once realpath("vendor/autoload.php");
require_once(__DIR__ . '/vendor/autoload.php');

use App\controller\PageController;
use App\controller\ProductController;
use App\controller\UserController;

$router = new Router();
$router
    ->get('/', [PageController::class, 'index'])
    ->get('/product/detail', [ProductController::class, 'detail'])
    ->get('/user/login', [UserController::class, 'login'])
    ->get('/user/addpro', [UserController::class, 'addToCart']);
;

// echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

echo $router->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));

