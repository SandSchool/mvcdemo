<?php
require_once __DIR__ .'/../Model/ProductModel.php';
class HomeController
{
    public function index()
    {
        $product = new ProductModel();
        $productlist = $product->getAllProducts();
        include __DIR__ . '/../Views/Home/index.php';
    }
    
}
