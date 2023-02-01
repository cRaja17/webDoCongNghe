<?php 

require_once('app/Models/Model.php');

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'fullname', 'email', 'phone_number', 'address', 'password', 'role_id'];

    public function authenticate($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password')";
        return $this->getFirst($sql);
    }

}