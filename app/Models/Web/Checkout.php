<?php 

require_once('app/Models/Model.php');


class Checkout extends Model {
    protected $table = 'checkout';
    protected $fillable = 'id, product_id, price_product, quantity_product, order_id';

    public function createCheckout($product_id,$quantity,$price,$order_id)
    {
        $sql = "INSERT INTO checkout(product_id, quantity_product, price_product, order_id) VALUES ('$product_id','$quantity','$price','$order_id')";
        return $this->dbConnection->query($sql);
    }

    public function showCheckout()
    {
        $sql = "SELECT * FROM checkout INNER JOIN product ON checkout.product_id = product.id ";
        return $this->getAll($sql);
    }

}