<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Admin/Order.php');
require_once('app/Models/Admin/Checkout.php');
require_once('app/Models/CheckOrder.php');
require_once('core/Auth.php');
require_once('core/Unit.php');

class OrderController extends BackendController
{
    public function index()
    {
        $order = new Order;
        $orders = $order->findAll();
        $count = count($orders);
        $pages = $count%5==0?$count/5:floor($count/5)+1;
        $data = [
            'pages'  => $pages
        ];
        return $this->view('order/index.php',$data);
    }

    public function order()
    {
        $order = new Order;
        $orders = $order->show_orders(($_GET['page']-1)*5);
        $checkout = new Checkout;
        $checkouts = $checkout->showCheckout();
        $data = [
            'orders' => $orders,
            'checkouts' => $checkouts,
        ];
        return $this->view('order/order.php', $data);
    }

    public function edit()
    {
        $order = new Order;
        $order = $order->find($_GET['id']);
        return $this->view('order/edit.php',$order);
    }

    public function update()
    {
        $order = new Order;
        $order = $order->update($_POST,$_GET['id']);
        return redirect('admin/order');
    }

    public function confirm()
    {
        // print_r($_POST);die();
        $order = new Order;
        $order = $order->update($_POST,$_POST['id']);
    }

    public function confirmPayment()
    {
        // print_r($_POST);die();
        $order = new Order;
        $order = $order->update($_POST,$_POST['id']);
    }

    public function delete()
    {
        $checkout = new Checkout;
        $deleteCheckout = $checkout->deleteCheckout($_POST['id']);
        if($checkout) {
            $order = new Order;
            $deleteOrder = $order->delete($_POST['id']);
            if($order) {
                return true;
            } else {
                return false;
            }
        }
    }
}
