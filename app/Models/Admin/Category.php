<?php 

require_once('app/Models/Model.php');

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['id', 'name'];

    public function show_categories()
    {
        return $this->findAll();
    }

    public function show_category($id)
    {
        return $this->find($id);
    }
}
