<?php

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Model.php');
require_once('app/Models/Admin/User.php');
require_once('core/Auth.php');
require_once('core/Unit.php');
require_once('app/Models/Role.php');

class UserController extends BackendController
{
    public function index()
    {
        $user = new User;
        $users = $user->findAll();
        // print_r($users);die();
        return $this->view('user/index.php',$users);
    }
}