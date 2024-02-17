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

$router = new Router();
$router
    ->get('/', [PageController::class, 'index'])
    ->get('/product/detail', [ProductController::class, 'detail'])
    ->get('/user/login', [UserController::class, 'login'])
    ->post('/user/login', [UserController::class, 'login'])
    ->get('/user/signup', [UserController::class, 'signup'])
    ->get('/user/logout', [UserController::class, 'logout'])
    // ->get('/user/addpro', [UserController::class, 'addToCart'])
;

// echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

echo $router->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));

