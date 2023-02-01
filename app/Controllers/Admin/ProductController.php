<?php

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Model.php');
require_once('app/Models/Admin/Category.php');
require_once('app/Models/Admin/Product.php');
require_once('app/Models/Admin/Discount.php');
require_once('core/Storage.php');
require_once('core/Unit.php');
require_once('core/Auth.php');


class ProductController extends BackendController
{

    public function index()
    {
        $category = new Category;
        $categories = $category->findAll();
        $product = new Product;
        $product = $product->findAll();
        $count = count($product);

        $pages = $count%5==0?$count/5:floor($count/5)+1;
        // print_r($pages);die();
        $data = [
            'categories' => $categories,
            'pages' => $pages
        ];
        return $this->view('product/index.php',$data);
    }

    public function create()
    {
        return $this->view('product/create.php');
    }

    public function store()
    {

        $product = new Product();
        Storage::upload('thumbnail',$_FILES['thumbnail']);
        $_POST['thumbnail'] = $_FILES['thumbnail']['name'];
        $product = $product->create($_POST);
        return redirect('admin/product');
    }

    
    public function edit()
    {
        $id = $_GET['id'];
        $product = new Product;
        $product = $product->find($id);
        return $this->view('product/edit.php',$product);
    }

    public function update()
    {
        $id = $_GET['id'];
        $create = new Product();
        if(!empty($_FILES['thumbnail']['name'])) {
            Storage::upload('thumbnail',$_FILES['thumbnail']);
            $_POST['thumbnail'] = $_FILES['thumbnail']['name'];
        } 
        $create = $create->update($_POST,$id);
        
        return redirect('admin/product');
        
    }


    public function delete()
    {
        $id = $_POST['id'];
        $product = new Product;
        $product = $product->delete($id);
        if($product == true){
            return true;
        } else {
            return false;
        }
    }

    public function product()
    {
        if(empty($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];        
        }
        $id = $_GET['id'];
        $pages = ($page-1)*5;
        $product = new Product;
        $products = $product->changeCategory($id,$pages);
        $discount = new Discount;
        $discounts = $discount->findAll();
        $data = [
            'products' => $products,
            'discounts' => $discounts
        ];
        return $this->view('product/product.php' , $data);
    }

    public function upload_ckeditor()
    {
        if(isset($_FILES['upload'])) {
            $fileName = $_FILES['upload']['name'];
            Storage::upload('test',$_FILES['upload']);
            $url = asset('storage/test/'.$fileName);
        }
        return $url;
    }

}