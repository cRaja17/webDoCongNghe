<?php 
require_once('app/Controllers/Web/WebController.php') ;
require_once('app/Models/Web/Product.php');

class ProductController extends WebController
{
    public function index()
    {
        $id = $_GET['id'];
        $product = new Product;
        $showProduct = $product->show_product_id($id);
        return $this->view('product/index.php',$showProduct);
    }
}


?>