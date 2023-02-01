<?php 

require_once('app/Models/Model.php');

class Role extends Model
{
    public const ADMIN = 1;
    public const USER = 2;

    public static function check($id)
    {
        if($id == 1) {
            echo "admin";
        } elseif ($id == 2) {
            echo "user";
        }
    }
}