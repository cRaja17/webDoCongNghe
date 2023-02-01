<?php require_once('core/Unit.php') ?>
<?php if(!empty($data)) : ?>
<div class="overflow-auto" style="height:150px ; overflow-y: hidden;">
    <?php foreach ($data as $key => $cart) : ?>
    <ul>
        <li>
            <a href="<?=url('product&id='.$cart['product_id'])?>">
                <figure><img src="<?=asset('storage/thumbnail/'.$cart['thumbnail'])?>" data-src="<?=asset('storage/thumbnail/'.$cart['thumbnail'])?>" alt="" width="50" height="50" class="lazy"></figure>
                <strong><span><?php echo $cart['name'] ?></span><?=Unit::format_VND(Unit::total($cart))?></strong>
            </a>
            <a href="javascript:void(0);" data-cart-id="<?=$cart['id']?>" class="action delete_cart"><i class="ti-trash"></i></a>
        </li>
    </ul>
    <?php endforeach; ?>
</div>

<div class="total_drop">
    <div class="clearfix"><strong>Tổng Tiền :</strong><span><?=Unit::format_VND(Unit::total_price($data))?></span></div>
    <a href="<?php echo url('cart') ?>" class="btn_1 outline">Giỏ hàng</a><a href="<?php if (!Auth::getUser('user')) { echo url('auth/login'); } else { echo url('order'); }?>" class="btn_1">Thanh toán</a>
</div>
<?php else : ?>
<div class="row justify-content-center">
    <div class="col-md-7">
        <div id="" >
            <div class="icon icon--order-success svg add_bottom_15">
                <img src="<?=asset('assets/web/customs/shopping-cart.png')?>" width="100" height="100">
            </div>
        <span>Không có sản phẩm</span>
        </div>
    </div>
</div>
<?php endif; ?>


