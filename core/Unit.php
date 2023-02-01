<?php 

class Unit
{
    public static function format_VND($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        } else {
            return false;
        }
    }

    // giá tiền sản phẩm 
    public static function total($check)
    {
        
        if($check['amount'] > 0) {
            if( ($check['date_discount']) > date("Y-m-d h:i:s") && ($check['discount']) > 0) {
                $price = $check['price'] - $check['price']*$check['discount']/100;
                return $price;
            } else {
                return $check['price'];
            }
        } else {
            return $check['price'];
        }
    }
        

    // giá tiền + số lượng
    public static function total_quantity($check)
    {
        $newPrice = $check['quantity'] * Unit::total($check);
        return $newPrice;
    }

    public static function total_price($carts)
    {
        $price = 0;
        foreach($carts as $cart){
            $total = Unit::total_quantity($cart);
            $price += $total;
        };
        return $price;
    }

    public static function total_price_ship($ship)
    {
        $price = Unit::total_price($carts);
        $price = $price + $price_ship;
    }

}
