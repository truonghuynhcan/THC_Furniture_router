<?php
session_start();
// link router library
require_once(__DIR__ . '/public/router.php');
include_once(__DIR__ . '/app/config/config.php');
include_once(__DIR__ . '/app/Libraries/Helpers.php');

// link autoload namespaces
// require_once realpath("vendor/autoload.php");
require_once(__DIR__ . '/vendor/autoload.php');

use App\controller\PageController;
use App\controller\ProductController;
use App\controller\UserController;
use App\controller\CartController;
use App\controller\ad_Controller;

$router = new Router();
$router
    ->get('/', [PageController::class, 'index'])
    ->get('/about', [PageController::class, 'about'])
    // product
    ->get('/product/detail', [ProductController::class, 'detail'])
    // user
    ->get('/user/login', [UserController::class, 'login'])
    ->post('/user/login', [UserController::class, 'login'])
    ->get('/user/signup', [UserController::class, 'showSignup'])
    ->post('/user/signup', [UserController::class, 'signup'])
    ->get('/user/logout', [UserController::class, 'logout'])
    ->get('/user/order', [UserController::class, 'showOrder'])
    ->get('/user/deleteOrder', [UserController::class, 'checkDeleteOrder'])
    ->get('/user/deleteOrder2', [UserController::class, 'DeleteOrder'])
    ->get('/user/info', [UserController::class, 'showInfo'])
    ->post('/user/info', [UserController::class, 'updateInfo'])
    ->get('/user/info_order', [UserController::class, 'showInfoOrder'])
    ->get('/user/info_changePass', [UserController::class, 'showChangePass'])
    ->post('/user/info_changePass', [UserController::class, 'ChangePass'])
    
    // cart
    ->get('/cart', [CartController::class, 'showcart'])
    ->get('/cart/add', [CartController::class, 'addToCart'])
    ->get('/cart/cartItem', [CartController::class, 'cartItem'])
    ->get('/cart/remoteProduct', [CartController::class, 'remoteProduct'])
    ->get('/cart/checkout', [CartController::class, 'showCheckout'])
    ->post('/cart/checkout', [CartController::class, 'checkout'])
    
    ->get('/ad_dashboard/index', [ad_Controller::class, 'showDashboard'])
;

// echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

echo $router->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));

