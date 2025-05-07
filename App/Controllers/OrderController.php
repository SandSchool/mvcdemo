<?php
require_once __DIR__ . '/../Model/OrderModel.php';
require_once __DIR__ . '/../Model/ProductModel.php';


class OrderController
{
    public function checkout()
    {
        if (session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
        $config = require 'config.php';            
        $baseURL = $config['baseURL'];           

        // 1. Neu nguoi dung chua login ==>yeu cau login 
        if (!isset($_SESSION['user_id']))
        {   
            header('Location:'. $baseURL . 'user/login');
            exit();
        }
        // 2. Tạo Order
        $ordermodel = new OrderModel();
        $now = (new DateTime())->format('Y-m-d H:i:s');
   
        $orderModel = new OrderModel();
        $productModel = new ProductModel();
        $total = 0;
        $orderId  = $ordermodel->insertOrder($now,$_SESSION['user_id'],0);
        // 3. Tạo Order Detail
        foreach ($_SESSION['cart'] as $item) {
            $product = $productModel->getProductById($item['product_id']);
            $orderModel->insertOrderItem($orderId , $item['product_id'], 
                                $item['quantity'], $product['Price']);
            $total += $item['quantity']* $product['Price'];
        }
        $orderModel->updateOrderTotal($orderId , $total);
        // 4. Xoa gio hang
        unset($_SESSION['cart']);        
        //5. Redirect về trang báo checkout thành công
        include __DIR__ . '/../Views/Order/checkout_success.php';
    }

    public function history()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            $config = require './config.php';
            header("Location: " . $config['baseURL'] . "user/login");
            exit;
        }

        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);

        $config = require './config.php';
        $baseURL = $config['baseURL'];

        include './App/Views/Order/history.php';
    }
    
   
}
