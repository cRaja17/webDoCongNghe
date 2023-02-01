<?php require_once('views/web/layouts/index.php') ?>
<?php startblock('title') ?>
Order
<?php endblock() ?>

<?php startblock('css') ?>
<link href="<?php echo asset('assets/web/css/checkout.css') ?>" rel="stylesheet">
<?php endblock() ?>

<?php startblock('content') ?>


<main class="bg_gray" >
    <div class="container" >
        <div class="row justify-content-center">
            <div id="confirm"  width=100%>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Điện thoại</th>
                                                <th scope="col">Giá đơn</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Tình trạng</th>
                                                <th scope="col">Thanh toán</th>
                                                <th scope="col">Ngày đặt hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['orders'] as $order) { ?>
                                            <tr>
                                                <td><?=$order['id']?></td>
                                                <td><?=$order['full_name']?></td>
                                                <td><?=$order['address']?></td>
                                                <td><?=$order['phone_number']?></td>
                                                <td><?=Unit::format_VND($order['price'])?></td>
                                                <td>
                                                    <?php foreach($data['checkouts'] as $checkout) {
                                                        if($checkout['order_id'] == $order['id']) { ?>
                                                        <p><?=$checkout['name']?> <span style="color: red">x<?=$checkout['quantity_product']?></span></p>
                                                        <p  style="color: blue"><?=Unit::format_VND($checkout['price_product'])?></p>
                                                    <?php }
                                                    } ?>
                                                </td>
                                                <td><?=checkOrder::statusOrder($order['status_order'])?></td>
                                                <td><?php if($order['payment'] == '2'){ echo CheckOrder::payment($order['payment']);} else if ($order['payment'] == '1') {echo CheckOrder::statusPayment($order['status_payment']); }?></td>
                                                <td><?=$order['date_order']?></td>
                                                <td></td>
                                            </tr>
                                            <?php } ?>
                            </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
</main>
<?php endblock() ?>

<?php startblock('js') ?>
<script>

</script>

<?php endblock() ?>