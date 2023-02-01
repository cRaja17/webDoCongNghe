<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Model.php');
require_once('app/Models/Web/Product.php');
require_once('app/Models/Web/Cart.php');
require_once('core/Unit.php');
require_once('core/Auth.php');

class CartController extends WebController
{
    public function index()
    {   
        return $this->view('cart/index.php');
    }

    public function cart()
    {
        $cart = new Cart;
        if(Auth::getUser('user')) {
            $carts = $cart->cart_user(Auth::getUser('user')['id']);
            return $this->view('cart/cart.php',$carts);
        } else {
            $carts = $cart->cart_client($_SERVER['HTTP_USER_AGENT']);
            return $this->view('cart/cart.php',$carts);
        }
    }

    public function add_to_cart()
    {
        // print_r($_POST);die();
        $cart = new Cart;

        if(Auth::getUser('user')) {
            $handleCarts = $cart->cart_user(Auth::getUser('user')['id']);
            $product_id = $_POST['product_id'];
            foreach ($handleCarts as $check) {
                if($check['product_id'] == $product_id) {
                    exit();
                } else {
                    continue;
                }
            }

            $addCart = $cart->create($_POST);
        } else {
            
            $handleCarts = $cart->cart_client($_SERVER['HTTP_USER_AGENT']);
            $product_id = $_POST['product_id'];
            foreach ($handleCarts as $check) {
                if($check['product_id'] == $product_id) {
                    exit();
                } else {
                    continue;
                }
            }
            $data = [
                'client_id' => $_POST['client_id'],
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity']
            ];

            $addCart = $cart->create($data);
        }
    }

    public function delete_to_cart()
    {
        $cart = new Cart;
        $id = $_POST['id'];

        $deleteCart = $cart->delete($id);
    }

    public function update_quantity() {
        $cart = new Cart;
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        $updateQuantityCart = $cart->update_quantity($id,$quantity);
    }
}