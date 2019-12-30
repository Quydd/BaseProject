
<?php

// require 'db.php';

class Cart {

    var $product;
    var $soluong;
    public function __construct($product,$soluong)
    {
        $this->product = $product;
        $this->soluong = $soluong;
    }

    static function getList(){
        $carts = [];
        if(isset($_SESSION['cart']))
            $carts = unserialize($_SESSION['cart']);
        return $carts;
    }

    static function addOrEdit($cart,$is_count){
        // session_start();
        $list = Cart::getList();
        if(isset($list[$cart->product->id]) && !$is_count){
            $list[$cart->product->id]->soluong +=$cart->soluong;
        }else{
            $list[$cart->product->id] = $cart;
        }
        $_SESSION['cart'] = serialize($list);
    }

    static function delete($cart){
        // session_start();
        $list = Cart::getList();
        unset($list[$cart->product->id]);
        $_SESSION['cart'] = serialize($list);
    }

}