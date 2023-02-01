<?php 

require_once('app/Models/Model.php');


class Discount extends Model 
{
    protected $table = 'discount';
    protected $fillable = ['id', 'discount' , 'date_discount' , 'product_id'];

    public function show_discount()
    {
        $sql = "SELECT *,discount.id as dis_id FROM discount INNER JOIN product ON product.id = discount.product_id";
        return $this->getAll($sql);
    }
}