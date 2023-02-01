<?php 

require_once('app/Models/Model.php');
require_once('app/Models/Web/Product.php');

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['id','client_id','product_id','quantity','users_id'];

    public function show_carts()
    {
        $sql = 'SELECT cart.id,cart.client_id as client_id,cart.product_id as product_id,cart.quantity as quantity,product.name as name,product.price as price,product.thumbnail as thumbnail,product.discount as discount FROM cart INNER JOIN product ON cart.product_id = product.id ';
        // print_r($sql);die();
        return $this->getAll($sql);
    }

    public function cart_user($id)
    {
        $sql = "SELECT *,cart.id,cart.client_id as client_id,cart.product_id as product_id,cart.quantity as quantity,product.name as name,product.price as price,product.thumbnail as thumbnail,cart.users_id as users FROM cart INNER JOIN product ON cart.product_id = product.id LEFT JOIN discount ON discount.product_id = product.id WHERE users_id = '$id' ";
        return $this->getAll($sql);
    }

    public function cart_client($id)
    {
        $sql = "SELECT *,cart.id,cart.client_id as client_id,cart.product_id as product_id,cart.quantity as quantity,product.name as name,product.price as price,product.thumbnail as thumbnail,cart.users_id as users FROM cart INNER JOIN product ON cart.product_id = product.id LEFT JOIN discount ON discount.product_id = product.id WHERE client_id = '$id' ";
        // print_r($sql);die();
        return $this->getAll($sql);
    }

    public function show_cart($id)
    {
        return $this->find($id);
    }

    public function deleteCartUserId($id) 
    {
        $sql = "DELETE FROM `cart` WHERE users_id = $id ";
        // print_r($sql);die();
        return $this->dbConnection->query($sql);

    }
    public function update_quantity($id,$quantity)
    {
        $sql = "UPDATE cart SET quantity = $quantity WHERE id = $id ";
        $result = $this->dbConnection->query($sql);
        // print_r($sql);die();
        $this->data = $result;
        return $this->data;
    }


}


?>
