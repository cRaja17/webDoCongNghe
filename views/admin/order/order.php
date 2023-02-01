<?php foreach($data['orders'] as $order) : ?>
<tr>
    <td><a href="" data-toggle="modal" id="order" data-target="#order_detail_<?=$order['orders_id']?>"
            data-id="<?=$order['orders_id']?>" data-toggle="modal" data-placement="right"
            title="Xem chi tiết"><?php echo $order['orders_id'] ?></a>
        <div class="modal fade bd-example-modal-lg" id="order_detail_<?=$order['orders_id']?>" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hóa đơn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
                    <div class="modal-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$order['name_user']?></td>
                                    <td><?=$order['email_user']?></td>
                                    <td><?=$order['phone_user']?></td>
                                    <td><?=$order['address_user']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn hàng</h5>
                    <div class="modal-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Địa chỉ đơn hàng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Hình thức</th>
                                    <th scope="col">Vận chuyển</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$order['name_order']?></td>
                                    <td><?=$order['address_order']?></td>
                                    <td><?=Unit::format_VND($order['price_order'])?></td>
                                    <td><?=CheckOrder::payment($order['payment_order'])?></td>
                                    <td><?=CheckOrder::shipping($order['shipping_order'])?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn hàng</h5>
                    <div class="modal-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Giá tiền</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['checkouts'] as $key => $checkout) : ?>
                                <?php if($checkout['order_id'] == $order['orders_id'] ) { ?>
                                <tr>
                                    <th scope="row"><?=$key+1?></th>
                                    <td><?=$checkout['name']?></td>
                                    <td><img src="<?=asset('storage/thumbnail/'.$checkout['thumbnail'])?>"
                                            width=100px /></td>
                                    <td><?=Unit::format_VND($checkout['price_product'])?></td>
                                    <td><?=$checkout['quantity_product']?></td>
                                    <?php  }?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td><?php echo $order['name_order'] ?></td>
    <td><?=Unit::format_VND($order['price_order']) ?></td>
    <td><?php echo $order['phone_order'] ?></td>
    <td><a href="#" role="button" data-toggle="dropdown"
            aria-expanded="false"><?=checkOrder::statusOrder($order['status_order'])?></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" id="order_confirm" href="#" data-status_order="1"
                data-id="<?=$order['orders_id']?>">Xác nhận đơn</a>
            <a class="dropdown-item" id="order_shipping" href="#" data-status_order="2"
                data-id="<?=$order['orders_id']?>" href="#">Đang vận chuyển</a>
            <a class="dropdown-item" id="order_success" href="#" data-status_order="3"
                data-id="<?=$order['orders_id']?>">Đã nhận hàng và thanh toán</a>
            <a class="dropdown-item" id="order_error" href="#" data-status_order="4"
                data-id="<?=$order['orders_id']?>">Trả hàng</a>
        </div>
    </td>
    <td><?php if($order['payment_order'] == '2'){
        echo CheckOrder::payment($order['payment_order']);
    } else if ($order['payment_order'] == '1') {echo CheckOrder::statusPayment($order['status_payment']); }?> </td>
    <td><?php echo $order['date_order'] ?></td>
    <td class="text-right">
        <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="<?php echo url('admin/order/edit/'.$order['orders_id']) ?>">Sửa</a>
                <button class="dropdown-item drop_order" value="<?=$order['orders_id']?>" href="">Xóa</button>
            </div>
        </div>
    </td>
</tr>
<?php endforeach; ?>