<?php 

require_once('app/Models/Model.php');

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'full_name', 'address', 'price', 'phone_number','user_id', 'note', 'payment', 'shipping'];

    public function updateStatus($id,$handleUpdate) {
        $sql = "UPDATE `orders` SET status_payment = $handleUpdate WHERE id = $id ";
        return $this->dbConnection->query($sql);
    }

    public function show_order($id)
    {
        $sql = "SELECT * FROM orders WHERE user_id = '$id' GROUP BY id DESC ";
        return $this->getAll($sql);
    }



}