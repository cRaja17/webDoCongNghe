<?php require_once('views/web/layouts/index.php') ?>
<?php require_once('core/Unit.php') ?>
<?php require_once('core/Auth.php') ?>

<?php startblock('title') ?>
Homepage
<?php endblock() ?>

<?php startblock('css') ?>
<link href="<?php echo asset('assets/web/css/home_1.css') ?>" rel="stylesheet">
<?php endblock() ?>

<?php startblock('content') ?>
<main>

    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            <div class="owl-slide cover" style="background-image: url(<?=asset('assets/web/img/1.jpg')?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-right white">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        ...
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            ......
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url(<?=asset('assets/web/img/backgroud3.jpg')?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">...</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        .........................
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                            href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url(<?=asset('assets/web/img/background2.jpg')?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center black">
                                    <h2 class="owl-slide-animated owl-slide-title">...</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        ................
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                            href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->


    <!--/banners_grid -->
    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Sản phẩm mới nhất</h2>
            <span>Products</span>
            <p>......................................................................................................
            </p>
        </div>
        <div class="row small-gutters">
            <?php foreach( array_slice($data,0,12) as $product ) : ?>
            <?php if ( $product['amount'] > 0) :?>
            <?php if( $product['date_discount'] > date("Y-m-d h:i:s") && $product['discount'] ) : ?>
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon off"><?=$product['discount']?>%</span>
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                        <div data-countdown="<?=$product['date_discount']?>" class="countdown"></div>
                    </figure>
                    <div style="color : blue ;font-weight: bold;">Đang khuyến mại</div>
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
            <div class="col-6 col-md-4 col-xl-3">
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
                    <div style="color : green;font-weight: bold;">Còn hàng</div>
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
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                    </figure>
                    <div style="color : red;font-weight: bold;">Hết hàng</div>
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
            <!-- /col -->

            <!-- /col -->
        </div>
        <!-- /col -->
        <!-- /row -->
    </div>

    <!-- /container -->

    <div class="featured lazy" data-bg="url(<?=asset('assets/web/img/background2.jpg')?>)">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container margin_60">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-lg-6 wow" data-wow-offset="150">
                        <h3>Laptop Acer Swift 3 <br>SF314-43-R4X3</h3>
                        <p>Màn hình 15.6Inch OLED FHD</p>
                        <div class="feat_text_block">
                            <div class="price_box">
                                <span class="new_price">16.739.100đ</span>
                                <span class="old_price">18.599.000đ</span>
                            </div>
                            <a class="btn_1" href="http://localhost/webbanhang/category?id=2" role="button">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /featured -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Sản phẩm khuyến mại</h2>
            <span>Sản phẩm</span>
            <p>......................................................................................................
            </p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            <?php foreach( $data as $product ) : ?>
            <?php if ( $product['amount'] > 0) :?>
            <?php if( $product['date_discount'] > date("Y-m-d h:i:s") && $product['discount'] ) : ?>
            <div class="item">
                <div class="grid_item">
                    <span class="ribbon off"><?=$product['discount']?>%</span>
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                            data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                        <div data-countdown="<?=$product['date_discount']?>" class="countdown"></div>
                    </figure>
                    <div style="color : blue ;font-weight: bold;">Đang khuyến mại</div>
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
                <div class="item">
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
                    <div style="color : green;font-weight: bold;">Còn hàng</div>
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
            <div class="item">
                <div class="grid_item">
                    <figure>
                        <a href="<?=url('product&id='.$product['pro_id'])?>">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                            <img class="img-fluid lazy" src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>"
                                data-src="<?=asset('storage/thumbnail/'.$product['thumbnail']) ?>" alt="">
                        </a>
                    </figure>
                    <div style="color : red;font-weight: bold;">Hết hàng</div>
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
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->


    <!-- /bg_gray -->


    <!-- /container -->
</main>



<?php endblock() ?>

<?php startblock('js') ?>
<script src="<?php echo asset('assets/web/js/carousel-home.min.js') ?>"></script>
<?php endblock() ?>