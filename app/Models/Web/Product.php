<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['id', 'category_id', 'name', 'price', 'thumbnail', 'amount', 'create_at' , 'update_at', 'description'];

    public function show_products()
    {
        $sql = "SELECT product.id,product.name,category_id,category.name as category_name,price,thumbnail,amount FROM product INNER JOIN category ON product.category_id = category.id";
        return $this->getAll($sql);
    }

    public function show_product($id)
    {   
        $sql = "SELECT * FROM product INNER JOIN category ON product.category_id = category.id WHERE product.id = $id ";
        return  $this->getFirst($sql);
    }

    public function show_product_id($id)
    {   
        $sql = "SELECT *,product.id as pro_id FROM product LEFT JOIN discount ON product.id = discount.product_id WHERE product.id = $id ";
        return  $this->getFirst($sql);
    }

    public function show_product_homepage()
    {   
        $sql = "SELECT *,product.id as pro_id,discount.id as discount_id FROM `product` left JOIN discount ON product.id = discount.product_id";
        return $this->getAll($sql);
    }

    public function filter($data)
    {
        // print_r($data);die();
        $sql = "SELECT *,product.id as pro_id FROM product LEFT JOIN discount ON discount.product_id = product.id WHERE 1 ";

        if(isset($data['brand'])) {
            $brand = implode("','",$data['brand']);
            $sql .= " AND brand IN ('$brand')";
        } else {
            if(!empty($data['search'])) {
                $search = $data['search'];
                $sql .= "AND product.name LIKE'%$search%' ";
            }
        }

        if(empty($data['category_id'])) {
            $sql .= '';
        } else {
            $id = $data['category_id'];

            $sql .= "AND category_id = '$id' ";
        }

        if(isset($data['price_min'],$data['price_max']) && !empty($data['price_min']) && !empty($data['price_max'])) {
            $min = $data['price_min'];
            $max = $data['price_max'];
            $sql .= "AND price BETWEEN '$min' AND '$max'";
        }



        // print_r($sql);die();


        return $this->getAll($sql);
    }

    public function update_quantity($quantity,$id)
    {
        $sql = "UPDATE `product` SET amount = amount - $quantity WHERE id = '$id' ";
        $result = $this->dbConnection->query($sql);
        return $result;
    }
}