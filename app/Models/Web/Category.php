<?php 

require_once('app/Models/Model.php');


class Category extends Model {
    protected $table = 'category';
    protected $fillable = ['id','name'];

    public function brand($id)
    {
        $sql = "SELECT DISTINCT brand FROM product WHERE 1 ";
        if(empty($id)) {
            return $this->getAll($sql);
        } else {
            $sql .= "AND category_id = '$id'";
            // print_r($sql);die();
            return $this->getAll($sql);
        }
    }
}