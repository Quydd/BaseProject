<?php

session_start();
include_once('../../Models/DBConnect.php');
include_once('../../Models/Product.php');
include_once('../../Models/Cart.php');
// if($_SESSION['user'] == null){
//     header('Location: http://localhost/tiki/views/pages/login.php');
//     return ;
// }

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $action = $_REQUEST['action'];
    $product_id = $_REQUEST['product_id'];
    $soluong = $_REQUEST['soluong'];
    if($action == 'addOrEdit'){
        $is_count = false;
        if(isset($_REQUEST['is_count']) && $_REQUEST['is_count'] != null)
            $is_count = true;
        $product = Product::getProductById($product_id);
        $cart = new Cart($product,$soluong);
        Cart::addOrEdit($cart,$is_count);
    }
    if($action == 'delete'){
        $product = Product::getProductById($product_id);
        $cart = new Cart($product,null);
        Cart::delete($cart);
    }
    

    header('Location: '.$_SERVER['HTTP_REFERER']);
}
?>