<?php 

require_once('app/Models/Model.php');


class Checkout extends Model {
    protected $table = 'checkout';
    protected $fillable = ['id', 'product_id', 'price_product', 'quantity_product', 'order_id'];

    public function showCheckout()
    {
        $sql = "SELECT * FROM checkout INNER JOIN product ON checkout.product_id = product.id ";
        return $this->getAll($sql);
    }

    public function showCheckoutId($id)
    {
        $sql = "SELECT * FROM checkout WHERE order_id = $id ";
        return $this->getAll($sql);
    }
    
    public function deleteCheckout($order_id)
    {
        $sql = "DELETE FROM checkout WHERE order_id = '$order_id' ";
        $result = $this->dbConnection->query($sql);
        // print_r($sql);die();
        return $result;
    }
    
}