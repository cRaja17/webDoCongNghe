<?php require_once ('views/web/layouts/index.php') ?>
<?php require_once ('core/Unit.php') ?>

<?php startblock('title') ?>
<?=$data['name']?>
<?php endblock() ?>

<?php startblock('css') ?>
<link href="<?=asset('assets/web/css/product_page.css') ?>" rel="stylesheet">
<style>
.description {
    text-align: center;
    width: 100%
}
</style>
<?php endblock() ?>


<?php startblock('content') ?>
<main>
    <?php if ( $data['amount'] > 0) :?>
    <?php if( $data['date_discount'] > date("Y-m-d h:i:s") && $data['discount'] ) : ?>
    <div class="container margin_30">
        <div class="countdown_inner">-<?=$data['discount']?>% Giảm giá còn -<div
                data-countdown="<?=$data['date_discount']?>" class="countdown">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            <div style="background-image: url(<?=asset('storage/thumbnail/'.$data['thumbnail'])?>);"
                                class="item-box"></div>
                            <?php
                        preg_match_all('@src="([^"]+)"@', $data['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                            <div style="background-image: url(<?=$image?>);" class="item-box"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <?php
                        preg_match_all('@src="([^"]+)"@', $data['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                            <div style="background-image: url(<?=$image?>);" class="item"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Danh mục sản phẩm</a></li>
                        <li><?=$data['name']?></li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1><?=$data['name']?></h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star"></i><em></em></span>
                    <p><?=$data['name']?></p>
                    <div class="prod_options">


                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong></strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">


                            <div class="price_main"><span
                                    class="new_price"><?=Unit::format_VND(Unit::total($data))?></span><span
                                    class="percentage">-<?=$data['discount']?>%</span> <span
                                    class="old_price"><?=Unit::format_VND($data['price'])?></span></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn"><a href="javascript:void(0)" data-product="<?=$data['id']?>"
                                    data-user="<?=Auth::handleUser(Auth::getUser('User'))?>"
                                    class="btn_1 add_to_cart">Thêm vào giỏ</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Yêu thích</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>So sánh</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
                <!-- <div class="table-responsive">
                    <h3>Specifications</h3>

                    <table class="table table-sm table-striped" width=40%>
                        <tbody>
                            <tr>
                                <td><strong>Color</strong></td>
                                <td>Blue, Purple</td>
                            </tr>
                            <tr>
                                <td><strong>Size</strong></td>
                                <td>150x100x100</td>
                            </tr>
                            <tr>
                                <td><strong>Weight</strong></td>
                                <td>0.6kg</td>
                            </tr>
                            <tr>
                                <td><strong>Manifacturer</strong></td>
                                <td>Manifacturer</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <?php else : ?>
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            <div style="background-image: url(<?=asset('storage/thumbnail/'.$data['thumbnail'])?>);"
                                class="item-box"></div>
                            <?php
                        preg_match_all('@src="([^"]+)"@', $data['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                            <div style="background-image: url(<?=$image?>);" class="item-box"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <?php
                        preg_match_all('@src="([^"]+)"@', $data['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                            <div style="background-image: url(<?=$image?>);" class="item"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Danh mục sản phẩm</a></li>
                        <li><?=$data['name']?></li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1><?=$data['name']?></h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star"></i><em></em></span>
                    <p><?=$data['name']?></p>
                    <div class="prod_options">


                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong></strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">


                            <div class="price_main"><span
                                    class="new_price"><?=Unit::format_VND(Unit::total($data))?></span></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn"><a href="javascript:void(0)" data-product="<?=$data['pro_id']?>"
                                    data-user="<?=Auth::handleUser(Auth::getUser('User'))?>"
                                    class="btn_1 add_to_cart">Thêm vào giỏ</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Yêu thích</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>So sánh</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
                <!-- <div class="table-responsive">
                    <h3>Specifications</h3>

                    <table class="table table-sm table-striped" width=40%>
                        <tbody>
                            <tr>
                                <td><strong>Color</strong></td>
                                <td>Blue, Purple</td>
                            </tr>
                            <tr>
                                <td><strong>Size</strong></td>
                                <td>150x100x100</td>
                            </tr>
                            <tr>
                                <td><strong>Weight</strong></td>
                                <td>0.6kg</td>
                            </tr>
                            <tr>
                                <td><strong>Manifacturer</strong></td>
                                <td>Manifacturer</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <?php endif; ?>
    <?php else : ?>
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            <div style="background-image: url(<?=asset('storage/thumbnail/'.$data['thumbnail'])?>);"
                                class="item-box"></div>
                            <?php
                        preg_match_all('@src="([^"]+)"@', $data['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                            <div style="background-image: url(<?=$image?>);" class="item-box"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <?php
                        preg_match_all('@src="([^"]+)"@', $data['images'] , $match_img);
                        $srcImg = array_pop($match_img);
                        // print_r($srcImg);
                        foreach($srcImg as $key => $image) : ?>
                            <div style="background-image: url(<?=$image?>);" class="item"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Danh mục sản phẩm</a></li>
                        <li><?=$data['name']?></li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1><?=$data['name']?></h1>
                    <div style="color : red ;font-weight: bold;">Hết hàng</div>
                    <p><?=$data['name']?></p>
                    <div class="prod_options">


                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong></strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">

                            <div class="price_main"><span
                                    class="new_price"><?=Unit::format_VND(Unit::total($data))?></span></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn"><a href="javascript:void(0)" class="btn_1">Đặt hàng</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Yêu thích</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>So sánh</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
                <!-- <div class="table-responsive">
                    <h3>Specifications</h3>

                    <table class="table table-sm table-striped" width=40%>
                        <tbody>
                            <tr>
                                <td><strong>Color</strong></td>
                                <td>Blue, Purple</td>
                            </tr>
                            <tr>
                                <td><strong>Size</strong></td>
                                <td>150x100x100</td>
                            </tr>
                            <tr>
                                <td><strong>Weight</strong></td>
                                <td>0.6kg</td>
                            </tr>
                            <tr>
                                <td><strong>Manifacturer</strong></td>
                                <td>Manifacturer</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <?php endif; ?>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Đánh giá</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                aria-controls="collapse-A">
                                Giới thiệu
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="description" width=100%>
                            <?=$data['description']?>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                aria-controls="collapse-B">
                                Đánh giá
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">


                        <div class="fb-comments" data-href="<?=url('product&'.$_GET['id'])?>" data-width="100%" data-numposts="5"></div>


                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->


    <!-- /container -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Miễn phí giao hàng</h3>
                            <p>Với mọi đơn hàng</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Thanh toán qua VNPay</h3>
                            <p>Thanh toán an toàn 100%</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>Hỗ trợ 24/7</h3>
                            <p>Hỗ trợ trực tuyến hàng đầu</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--/feat-->

</main>
<?php endblock() ?>


<?php startblock('js') ?>
<script src="<?=asset('assets/web/js/carousel_with_thumbs.js')?>"></script>
<?php endblock() ?>