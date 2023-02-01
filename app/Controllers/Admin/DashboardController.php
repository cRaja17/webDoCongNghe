<?php

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Admin/Product.php');
require_once('app/Models/Admin/Order.php');
require_once('core/Auth.php');
require_once('core/Unit.php');


class DashboardController extends BackendController
{    
    
    public function index()
    {
        $turnover = new Order;
        $turnoverWeek = $turnover->turnoverWeek();
        $turnoverMonth = $turnover->turnoverMonth();
        $turnoverDay = $turnover->turnoverDay();
        $data = [
            'turnoverDay' => $turnoverDay,
            'turnoverWeek' => $turnoverWeek,
            'turnoverMonth' => $turnoverMonth
        ];
        return $this->view('dashboard/index.php',$data);
    }

    public function getChart()
    {        
        $order = new Order;
        $orders = $order->turnoverDate($_GET['days']);
        $data = [];

        if(date('d') < $_GET['days']) { 
    
            $allDayLastMonth = (new Datetime( date('Y-m-d', strtotime(" -1 month")) ))->format('t'); //số ngày của tháng trước
    
            $dayLastMonth = $allDayLastMonth - ( $_GET['days'] - date('d') ); // ngày bắt đầu tháng trước

            for($i = $dayLastMonth ; $i <= $allDayLastMonth ; $i++) {
                $key = $i.'-'.date('m', strtotime(" -1 month"));
                $data[$key] = 0;
            }
            $dayAfterMonth = 1;                                  
        } else {
            $dayAfterMonth = date('d') - $_GET['days'];
        }

        for($i = $dayAfterMonth ; $i <= date('d') ; $i++) {
            $key = $i.'-'.date('m');
            $data[$key] = 0;
        }

        foreach ($orders as $value) {
            $data[$value['day']] = $value['turnover'];
        }
        echo json_encode($data);
    }
}