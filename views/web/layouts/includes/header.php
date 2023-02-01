<?php require_once('app/Models/Web/Category.php'); ?>
<?php require_once('core/Auth.php') ?>
<?php require_once('core/Flash.php') ?>

<?php   $category = new Category;
        $categories = $category->findAll();

		// print_r($cart);die();
?>
<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<!-- main_header -->
        <div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="<?=url('')?>"><img src="<?=asset('assets/web/img/logo.svg')?>" alt="" width="100" height="35"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="index.html"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li>
									<a href="<?=url('')?>" style="text-decoration: none">Trang chủ</a>
								</li>
								<li>
									<a href="#0" style="text-decoration: none">Chính sách và hướng dẫn</a>
								</li>
								<li>
									<a href="#0" style="text-decoration: none">Hệ thống showroom</a>
								</li>
								<li>
									<a href="#0" style="text-decoration: none">Tin tức</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
					<a class="phone_top" href="tel://9438843343" style="text-decoration: none"><strong><span>Hỗ trợ ?</span>0166666666</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li>
									<span>	
									<a>
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Danh sách sản phẩm
										</a>
									</span>
									<div id="menu">
										<ul>
											<?php foreach ($categories as $category) { ?>
											<li><span><a href="<?=url('category&id='.$category['id'])?>" id="category" ><?=$category['name']?></a></span></li>
											<?php } ?>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<form action="<?=url('category')?>">
							<input type="text" name="search" placeholder="Tìm theo tên sản phẩm">
							<button type="submit" id="button"><i class="header-icon_search_custom"></i></button>
							</form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
					<ul class="top_tools">
    <li>
        <div class="dropdown dropdown-cart">
            <a href="#" class="cart_bt" style="text-decoration: none"><strong class="getCountCart"></strong></a>
            <div class="dropdown-menu" id="show_cart">
                <!-- show_cart_to_header -->
                <!-- -------- -->
            </div>
        </div>
        <!-- /dropdown-cart-->
    </li>
    <li>
        <a href="#0" class="wishlist" style="text-decoration: none"><span>Wishlist</span></a>
    </li>
    <li>
        <div class="dropdown dropdown-access">
            <a href="#" class="access_link" style="text-decoration: none" ><span>Account</span></a>
            <div class="dropdown-menu">
				<?php if(!Auth::getUser('user')) : ?>
				<a href="<?=url('auth/login')?>" class="btn_1" >Đăng kí hoặc đăng nhập</a>
                <?php else : ?>
				<a href="#" class="btn_1">Hi: <?=Auth::getUser('user')['fullname']?></a>
                <ul>
                    <li>
                        <a href="<?=url('order/detail')?>"><i class="ti-truck"></i>Kiểm tra đơn hàng của bạn</a>
                    </li>
                    <li>
                        <a href="#"><i class="ti-user"></i>Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="<?php echo url('auth/logout') ?>"><i class="ti-logout"></i>Đăng xuất</a>
                    </li>
                </ul>
				<?php endif; ?>
            </div>
        </div>
        <!-- /dropdown-access-->
    </li>
    <li>
        <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
    </li>
</ul>
</div>
</div>
		<!-- /row -->
	</div>
	<div class="search_mob_wp">
		<input type="text" class="form-control" placeholder="Search over 10.000 products">
		<input type="submit" class="btn_1 full-width" value="Search">
	</div>
	<!-- /search_mobile -->
</div>
<!-- /main_nav -->
</header>

	
	


