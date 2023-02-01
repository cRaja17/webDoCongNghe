<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Model.php');
require_once('app/Models/Web/Product.php');
require_once('app/Models/Web/Category.php');
require_once('app/Models/Web/Discount.php');
require_once('app/Models/Web/Cart.php');
require_once('core/Auth.php');

class HomepageController extends WebController
{

    public function index()
    {
        $product = new Product;
        $products = $product->show_product_homepage();
        return $this->view('homepage/index.php',$products);
    }
}
