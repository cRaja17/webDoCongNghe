<?php 

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Web/Product.php');
require_once('app/Models/Web/Category.php');
require_once('app/Models/Model.php');
require_once('core/Unit.php');
require_once('core/Auth.php');


class CategoryController extends WebController
{
    public function index()
    {
        if(empty($_GET['id'])) {
            $id = false;
        } else {
            $id = $_GET['id'];
        }
        // print_r($id);die();
        $brand = new Category;
        $brands = $brand->brand($id);
        $dataFilter = [
            'brand' => $brands
        ];
    

 

 

        return $this->view('category/index.php',$dataFilter);
    }

    public function product() 
    {
        // print_r($_GET);
        // die();
        if(empty($_GET['category_id'])) {
            $_GET['category_id'] = false;
        } 
        $product = new Product;
        $products = $product->filter($_GET);
        return $this->view('category/product.php',$products);
    }

}

