<?php

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Model.php');
require_once('app/Models/Admin/Order.php');
require_once('core/Auth.php');
require_once('app/Models/Role.php');

class SalesController extends BackendController
{
    public function index()
    {
        $order = new Order;
        $orders = $order->findAll();
        return $this->view('sales/index.php',$orders);
    }
}