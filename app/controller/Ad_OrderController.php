<?php
namespace App\controller;

use App\model\Ad_OrderModel;
use App\model\UserModel;

class Ad_OrderController extends CoreController{
    public function CancelOrder(){
        $idDH = $_GET["IdDh"];
        $user = new UserModel(); //load model
        $kq = $user->deleteOrderById($idDH); //lấy danh sách
        header("Location:" . APPURL . "ad_order/detail?idDh=" . $idDH);
    }
    public function checkCancelOrder(){
        $idDH = $_GET["IdDh"];
        echo '
        <script>
            var result = confirm("Xác nhận hủy đơn hàng id:' . $idDH . '?");
            if (result) {
                window.location.href = "' . APPURL . 'ad_order/CancelOrder2?IdDh=' . $idDH . '";
            }else{
                window.location.href = "' . APPURL . 'ad_order/detail?idDh=' . $idDH . '";
            }
        </script>
        ';
    }
    public function showOrder(){
        $oder = new Ad_OrderModel(); //load model
        $idDH = $_GET['idDh'];

        if (isset($_GET['tt'])) {
            $tt = $_GET['tt'];
            if ($tt == 'cho-xac-nhan') {
                $oder->updateOrder_cxn($idDH);
            }else {
                $oder->updateOrder_dcb($idDH);
            }
            header('location:'.APPURL.'ad_order/detail?idDh='.$idDH);
            return;
        }

        $data['order'] = $oder->getOrderById($idDH); //lấy danh sách

        if ($data['order'] == null) {
            echo "Không thể truy cập đơn hàng";
        } else {
            // print_r($data['order']);
            $this->loadViewAdmin('ad_order', $data);
        }
    }
    public function showListOrder(){
        $dashboard = new Ad_OrderModel();
        $data['countTT_done'] = $dashboard->countTT_done()[0];
        $data['countTT_check'] = $dashboard->countTT_check()[0];
        $data['sumIncome'] = $dashboard->sumIncome()[0];
        $data['listOder'] = $dashboard->getListOrder();
        $this->loadViewAdmin('ad_listOder', $data);
    }
}