<?php 
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Model.php');
require_once('app/Models/Admin/Product.php');
require_once('app/Models/Admin/Discount.php');
require_once('core/Auth.php');
require_once('core/Unit.php');


class DiscountController extends BackendController
{
    public function index()
    {
        $product = new Product;
        $products = $product->findAll();
        return $this->view('discount/index.php',$products);
    }

    public function discount()
    {
        $product = new Product;
        $products = $product->findAll();
        $discount = new Discount;
        $discounts = $discount->show_discount();
        $data = [
            'products' => $products,
            'discounts' => $discounts
        ];
        return $this->view('discount/discount.php',$data);
    }

    public function create()
    {
        $discount = new Discount;
        $discount = $discount->create($_POST);
    }

    public function edit()
    {
        // print_r($_POST);die();
        $discount = new Discount;
        $discount = $discount->update($_POST,$_POST['dis_id']);
    }

    public function delete()
    {
        // print_r($_POST);die();
        $discount = new Discount;
        $discount = $discount->delete($_POST['id']);
    }
}