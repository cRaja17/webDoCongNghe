<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['id', 'category_id', 'name', 'price' , 'thumbnail', 'amount', 'brand' , 'images', 'description'];

    public function show_products()
    {
        $sql = "SELECT product.id,product.name as product_name ,category_id,category.name as category_name,price,thumbnail,amount FROM product INNER JOIN category ON product.category_id = category.id";
        return $this->getAll($sql);
    }

    public function show_product($id)
    {   
        $sql = "SELECT * ,product.name as product_name, category.id as category_id, category.name as category_name FROM product INNER JOIN category ON product.category_id = category.id WHERE product.id = $id ";
        return  $this->getFirst($sql);
    }

    public function changeCategory($id,$page)
    {
        $sql = "SELECT *, product.id as product_id ,product.name as product_name, category.name as category_name FROM product 
        INNER JOIN category ON product.category_id = category.id  WHERE 1";
        if($id == '') {
            $sql .=" ORDER BY product.id DESC LIMIT 5 offset $page";
            // print_r($sql);die();
            return $this->getAll($sql);
        } else {
            $sql .= " AND product.category_id = $id ORDER BY product.id DESC LIMIT 5 offset $page ";
            return $this->getAll($sql);
        }
    }
}