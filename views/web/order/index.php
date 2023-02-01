<?php require_once('views/web/layouts/index.php') ?>
<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>



<?php startblock('title') ?>
Order
<?php endblock() ?>

<?php startblock('css') ?>
<link href="<?php echo asset('assets/web/css/checkout.css') ?>" rel="stylesheet">
<?php endblock() ?>

<?php startblock('content') ?>
<?php if(count($data) > 0) :?>
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="<?=url('')?>">Trang chủ</a></li>
                    <!-- <li><a href="#">Giỏ hàng</a></li> -->
                    <li>Thanh toán</li>
                </ul>
            </div>
            <h1>Thanh toán</h1>
        </div>
        <!-- /page_header -->

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <form action="<?=url('order/handleCheckout') ?>" method="POST">
                    <div class="step first">

                        <?php if(Auth::getUser('user')) : ?>
                        <h3>1. Địa chỉ nhận hàng</h3>
                        <?php else : ?>
                        <h3>1. Đăng nhâp hoặc đăng kí</h3>
                        <?php endif; ?>

                        <?php if(Auth::getUser('user')) : ?>
                        <input class="form-control" id="id" name="id" type="hidden"
                            value="<?php echo date("YmdHis") ?>" />
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Họ và tên" name="full_name"
                                id="full_name" value="">
                        </div>
                        <!-- /row -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Số điện thoại nhận hàng"
                                name="phone_number" id="phone_number" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <select class="form-select" name="calc_shipping_provinces" required="">
                                    <option value="">Tỉnh / Thành phố</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-select" name="calc_shipping_district" required="">
                                    <option value="">Quận / Huyện</option>
                                </select>
                            </div>
                            <input class="billing_address_1" name="city" type="hidden" value="">
                            <input class="billing_address_2" name="county" type="hidden" value="">
                        </div>

                        <div class="form-group">
                            <input type="text" name="country" class="form-control" placeholder="Số nhà , Xã/Phường">
                            <input class="form-control" name="address" id="address" type="hidden" value="">
                            <input class="form-control" name="user_id" id="user_id" type="hidden"
                                value="<?=Auth::getUser('user')['id']?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ghi chú" name="note">
                        </div>
                        <div>
                            <ul>
                                <h5>HỖ TRỢ KHÁCH HÀNG</h5>
                                <li>Liên hệ hợp tác kinh doanh</li>
                                <li>Thông tin tuyển dụng</li>
                                <li>Tin công nghệ</li>
                                <li>Hướng dẫn mua hàng trực tuyến</li>
                                <li>Gửi yêu cầu bảo hành</li>
                                <li>Góp ý, Khiếu Nại</li>
                            </ul>
                        </div>

                        <!-- /row -->
                        <?php else : ?>
                        
                        
                            <!-- /tab_1 -->
                            
                        </div>
                        <?php endif; ?>
                    </div>
            </div>
            <!-- tab2//////////////////////////////////// -->

            <div class="col-lg-4 col-md-6">
                <div class="step middle payments">
                    <h3>2. Thanh toán và Vận chuyển</h3>
                    <ul>
                        <li>
                            <label class="container_radio">Thanh toán VnPay<a href="#0" class="info" data-toggle="modal"
                                    data-target="#payments_method"></a>
                                <input type="radio" name="payment" value="1" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_radio">Thanh toán khi nhận hàng<a href="#0" class="info"
                                    data-toggle="modal" data-target="#payments_method"></a>
                                <input type="radio" name="payment" value="2" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                    <h6 class="pb-2">Đơn vị vận chuyển</h6>
                    <ul>
                        <li>
                            <label class="container_radio">Ninja Vận<a href="#0" class="info" data-toggle="modal"
                                    data-target="#payments_method"></a>
                                <input type="radio" name="shipping" value="1" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_radio">Hoàng Anh Express<a href="#0" class="info"
                                    data-toggle="modal" data-target="#payments_method"></a>
                                <input type="radio" name="shipping" value="2" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>


            <!--------------------------------- tab3 -->

            <div class="col-lg-4 col-md-6">
                <div class="step last">
                    <h3>3. Order Summary</h3>
                    <div class="box_general summary">
                        <ul>
                            <?php foreach($data as $key => $cart) : ?>
                            <li class="clearfix"><em><span style="color:red">x<?=$cart['quantity']?></span>
                                    <?=$cart['name']?></em><span><?=Unit::format_VND(Unit::total($cart))?></span></li>
                            <?php endforeach; ?>
                        </ul>
                        <ul>
                            <li class="clearfix"><em><strong>Tổng tiền</strong></em>
                                <span><?=Unit::format_VND(Unit::total_price($data))?></span></li>
                            <li class="clearfix"><em><strong>Tiền ship</strong></em> <span>0đ</span></li>
                        </ul>
                        <div class="total clearfix">Tổng thanh toán
                            <span><?=Unit::format_VND(Unit::total_price($data))?></span></div>
                        <input class="form-control" id="order_type" name="order_type" type="hidden" value="other" />
                        <input class="form-control" id="order_id" name="order_id" type="hidden"
                            value="<?php echo date("YmdHis") ?>" />
                        <input class="form-control" id="amount" name="amount" type="hidden"
                            value="<?=Unit::total_price($data)?>" />
                        <input class="form-control" id="order_desc" name="order_desc" type="hidden"
                            value="thanh toan don hang :<?php echo date("YmdHis") ?>" />
                        <input class="form-control" id="bank_code" name="bank_code" type="hidden" value="" />
                        <input class="form-control" id="language" name="language" type="hidden" value="vn" />
                        <input class="form-control" id="price" name="price" type="hidden"
                            value="<?=Unit::total_price($data)?>" />
                            <?php if(Auth::getUser('user')) { ?> 
                        <button type="submit" name="redirect" id="redirect" class="btn_1 full-width">Thanh toán</button>
                        <?php } else { ?> 
                        <button class="btn_1 full-width">Đăng nhập hoặc đăng kí</button>
                            <?php } ?>
                    </div>
                </div>
            </div>



            </form>
        </div>
    </div>
</main>

<?php else : ?>
<?php return redirect('cart')?>
<main class="bg_gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div id="confirm">
                    <div class="icon icon--order-success svg add_bottom_15">
                        <img src="<?=asset('assets/web/customs/shopping-cart.png')?>" width="200px" height="200px">
                    </div>
                    <!-- <h2>Không có sản phẩm nào trong giỏ hàng của bạn</h2> -->
                    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                    <a href="<?=url('homepage')?>" class="btn btn-warning">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>
<?php endif; ?>

<?php endblock() ?>

<?php startblock('js') ?>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>

<script>
$(function() {
    $(".btn_1").mouseenter(function() {
        const city = $("[name='city']").val();
        const county = $("[name='county']").val();
        const country = $("[name='country']").val();
        const all = country + '-' + county + '-' + city;
        var address = all;
        document.getElementById('address').value = address;
    })
})
</script>
<script>
//<![CDATA[
if (address_2 = localStorage.getItem('address_2_saved')) {
    $('select[name="calc_shipping_district"] option').each(function() {
        if ($(this).text() == address_2) {
            $(this).attr('selected', '')
        }
    })
    $('input.billing_address_2').attr('value', address_2)
}
if (district = localStorage.getItem('district')) {
    $('select[name="calc_shipping_district"]').html(district)
    $('select[name="calc_shipping_district"]').on('change', function() {
        var target = $(this).children('option:selected')
        target.attr('selected', '')
        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
        address_2 = target.text()
        $('input.billing_address_2').attr('value', address_2)
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.setItem('address_2_saved', address_2)
    })
}
$('select[name="calc_shipping_provinces"]').each(function() {
    var $this = $(this),
        stc = ''
    c.forEach(function(i, e) {
        e += +1
        stc += '<option value=' + e + '>' + i + '</option>'
        $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
        if (address_1 = localStorage.getItem('address_1_saved')) {
            $('select[name="calc_shipping_provinces"] option').each(function() {
                if ($(this).text() == address_1) {
                    $(this).attr('selected', '')
                }
            })
            $('input.billing_address_1').attr('value', address_1)
        }
        $this.on('change', function(i) {
            i = $this.children('option:selected').index() - 1
            var str = '',
                r = $this.val()
            if (r != '') {
                arr[i].forEach(function(el) {
                    str += '<option value="' + el + '">' + el + '</option>'
                    $('select[name="calc_shipping_district"]').html(
                        '<option value="">Quận / Huyện</option>' + str)
                })
                var address_1 = $this.children('option:selected').text()
                var district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('address_1_saved', address_1)
                localStorage.setItem('district', district)
                $('select[name="calc_shipping_district"]').on('change', function() {
                    var target = $(this).children('option:selected')
                    target.attr('selected', '')
                    $('select[name="calc_shipping_district"] option').not(target)
                        .removeAttr('selected')
                    var address_2 = target.text()
                    $('input.billing_address_2').attr('value', address_2)
                    district = $('select[name="calc_shipping_district"]').html()
                    localStorage.setItem('district', district)
                    localStorage.setItem('address_2_saved', address_2)
                })
            } else {
                $('select[name="calc_shipping_district"]').html(
                    '<option value="">Quận / Huyện</option>')
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.removeItem('address_1_saved', address_1)
            }
        })
    })
})
//]]>
</script>
<?php endblock() ?>