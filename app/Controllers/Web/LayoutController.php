<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Web/Cart.php');
require_once('core/Auth.php');

class layoutController extends WebController
{
    public function show_cart_to_header()
    {
        $cart = new Cart;
        if(!empty(Auth::getUser('user'))) {
            $showCarts = $cart->cart_user(Auth::getUser('user')['id']);
            return $this->view('layouts/includes/header_cart.php',$showCarts);
        } else {
            $showCarts = $cart->cart_client($_SERVER['HTTP_USER_AGENT']);
            return $this->view('layouts/includes/header_cart.php',$showCarts);
        }
    }

    public function getCountCart()
    {
        $cart = new Cart;
        if(!empty(Auth::getUser('user'))) {
            $carts = $cart->cart_user(Auth::getUser('user')['id']);
            return count($carts);
        } else {
            $carts = $cart->cart_client($_SERVER['HTTP_USER_AGENT']);
            return count($carts);
        }
    }

    
}