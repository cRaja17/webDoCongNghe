<?php 

require_once('app/Models/Model.php');

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'full_name', 'address', 'price', 'phone_number','user_id', 'note', 'payment', 'shipping', 'date_order', 'status_payment', 'status_order'];

    public function show_orders($page)
    {
        $sql = "SELECT orders.id as orders_id, orders.full_name as name_order, orders.address as address_order, orders.price as price_order, orders.phone_number as phone_order,
         orders.note as note_order,orders.payment as payment_order, orders.shipping as shipping_order , orders.date_order as date_order,orders.status_order as status_order,
         orders.status_payment as status_payment,
          users.fullname as name_user, users.email email_user , users.phone_number as phone_user , users.address as address_user FROM `orders` 
          INNER JOIN users ON orders.user_id = users.id GROUP BY orders.id DESC LIMIT $page,5";
        //   print_r($sql);die();
        return $this->getAll($sql);
    }

    
    public function turnoverDate($date)
    {
        $sql = "SELECT DATE_FORMAT(date_order,'%e-%m') as day ,sum(price) as turnover FROM `orders` WHERE status_order = 3 AND DATE(date_order) >= CURDATE() - INTERVAL 
        $date DAY GROUP BY DATE_FORMAT(date_order,'%e-%m') ";
        return $this->getAll($sql);
    }

    public function turnoverWeek()
    {
        $sql = "SELECT sum(price) as turnover, count(id) as orders FROM `orders` WHERE status_order = 3 AND DATE(date_order) >= CURDATE() - INTERVAL 7 DAY";
        return $this->getFirst($sql);
    }

    public function turnoverMonth()
    {
        $sql = "SELECT sum(price) as turnover,count(id) as orders FROM `orders` WHERE status_order = 3 AND DATE(date_order) >= CURDATE() - INTERVAL 30 DAY";
        return $this->getFirst($sql);
    }

    public function turnoverDay()
    {
        $sql = "SELECT sum(price) as turnover, count(id) as orders FROM `orders` WHERE status_order = 3 AND DATE(date_order) = CURDATE() ";
        // print_r($sql);die();
        return $this->getFirst($sql);
    }
}