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
use App\controller\Ad_DashboardController;
use App\controller\Ad_ProductController;
use App\controller\Ad_OrderController;

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
    ->get('/user/order_received', [UserController::class, 'order_received'])
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
    
    //  ADMIN ===========================================================================
    ->get('/ad_dashboard/index', [Ad_DashboardController::class, 'showDashboard'])
    
    ->get('/ad_products/index', [Ad_ProductController::class, 'showProducts'])
    ->get('/ad_products/update', [Ad_ProductController::class, 'update'])
    ->post('/ad_products/update', [Ad_ProductController::class, 'update'])
    ->get('/ad_products/change_status', [Ad_ProductController::class, 'change_status'])

    ->get('/ad_order/index', [Ad_OrderController::class, 'showListOrder'])
    ->get('/ad_order/detail', [Ad_OrderController::class, 'showOrder'])
    ->get('/ad_order/CancelOrder', [Ad_OrderController::class, 'checkCancelOrder'])
    ->get('/ad_order/CancelOrder2', [Ad_OrderController::class, 'CancelOrder'])
;

// echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

echo $router->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));

