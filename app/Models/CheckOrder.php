<?php 

require_once('app/Models/Model.php');

class CheckOrder extends Model
{

    // status_payment
    public const UNPAID = 0;
    public const PAID = 1;
    public const PAYMENT_FAILED = 2;

    // status_order
    public const UNCONFIRMED = 0;
    public const CONFIRM = 1;
    public const TRANSPORTED = 2;

    public static function payment($payment)
    {
        if($payment == '1' ) {
            echo "Thanh toán qua VNPay";
        } else if($payment == '2'){
            echo "Thanh toán khi nhận hàng";
        } 
    }

    public static function shipping($payment)
    {
        if($payment == '1' ) {
            echo "Ninja Vận";
        } else if($payment == '2'){
            echo "Hoàng Anh Express";
        } 
    }

    public static function statusPayment($status)
    {
        if($status == '0'){
            echo "<div style='color : blue'>Chưa thanh toán<i class='ni ni-air-baloon text-blue'></i></div>";
        } else if ($status == '1' ) {
            echo "<div style='color : green'>Thanh toán thành công<i class='ni ni-check-bold text-green'></i></div>";
        } else if($status == '2' ) {
            echo "<div style='color : red'>Thanh toán thất bại<i class='ni ni-fat-remove text-red'></i></div>";
        }
    }

    public static function statusOrder($status)
    {
        if($status == NULL){
            echo "<div style='color : orange'>Chưa xác nhận<i class='ni ni-air-baloon text-yellow'></i>";
        } else if ($status == '1' ) {
            echo "<div style='color : green'>Đã xác nhận<i class='ni ni-check-bold text-green'></i></div>";
        } else if($status == '2' ) {
            echo "<div style='color : green'>Đang vận chuyển<i class='ni ni-delivery-fast text-blue'></i></div>";
        } else if($status == '3' ) {
            echo "<div style='color : blue'>Đã giao hàng và thanh toán<i class='ni ni-delivery-fast text-blue'></i></div>";
        } else if($status == '4' ) {
            echo "<div style='color : red'>Trả lại hàng<i class='ni ni-delivery-fast text-blue'></i></div>";
        }
    }
}