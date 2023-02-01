<?php require_once('core/Unit.php') ?>
<?php require_once('core/Auth.php') ?>
<div class="row small-gutters">
    <?php if(!empty($data)) : ?>
        <?php foreach( $data as $product ) : ?>
            <?php if ( $product['amount'] > 0) :?>
            <?php if( $product['date_discount'] > date("Y-m-d h:i:s") && $product['discount'] ) : ?>
            <div class="col-6 col-md-4">
                <div class="grid_item">
                    <span class="ribbon off"><?=$product['discount']?>%</span>
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                    </figure>
                    <div style="color : red ;font-weight: bold;">Đang khuyến mại</div>

                    <a href="<?=url('product&id='.$product['pro_id'])?>">
                        <h3><?=$product['name']?></h3>
                    </a>
                    <div class="price_box">
                        <span
                            class="new_price"><?=Unit::format_VND($product['price']*(1 - $product['discount']/100))?></span>
                        <span class="old_price"><?=Unit::format_VND($product['price'])?></span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="javascript:void(0);" data-product="<?=$product['pro_id']?>"
                                data-user="<?=Auth::handleUser(Auth::getUser('User'))?>" class="tooltip-1 add_to_cart"
                                data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                    class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- ------------------- -->
            <?php else : ?>
            <div class="col-6 col-md-4">
                <div class="grid_item">
                    <span class="ribbon new">New</span>
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                    </figure>
                    <div style="color : purple;font-weight: bold;">Còn hàng</div>
                    <a href="<?=url('product&id='.$product['pro_id'])?>">
                        <h3><?=$product['name']?></h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price"><?=Unit::format_VND($product['price'])?></span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                        <li><a href="javascript:void(0);" data-product="<?=$product['pro_id']?>"
                                data-user="<?=Auth::handleUser(Auth::getUser('User'))?>" class="tooltip-1 add_to_cart"
                                data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                    class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <!-- /col -->
            <?php else : ?>
            <!-- /col -->
            <div class="col-6 col-md-4">
                <div class="grid_item">
                    <!-- <span class="ribbon hot">Heets</span> -->
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                    </figure>
                        <div style="color : green ;font-weight: bold;">Hết hàng</div>

                    <a href="<?=url('product&id='.$product['pro_id'])?>">
                        <h3><?=$product['name']?></h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price"><?=Unit::format_VND($product['price'])?></span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
    <?php else : ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:">
            <use xlink:href="#info-fill" />
        </svg>
        <div>
            Không có sản phẩm nào !
        </div>
    </div>
    <?php endif; ?>
    <!-- /col -->
</div>
<script>
< script src = "<?php echo asset('assets/web/js/main.js') ?>" >
</script>
<script src="<?php echo asset('assets/web/js/common_scripts.min.js') ?>"></script>
</script>