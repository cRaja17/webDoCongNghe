<?php if(!empty(Auth::getUser('user'))) : ?>
<?php return redirect('homepage') ?>
<?php endif; ?>
<?php require_once('views/web/layouts/index.php') ?>

<?php startblock('title') ?>
Đăng nhập
<?php endblock() ?>

<?php startblock('content') ?>
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div>
		<h1><a href="<?php echo url('auth/register') ?>">Đăng ký</a></h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Đăng nhập</h3>
					<!-- form -->
					<form action="<?php echo url('auth/handleLogin') ?>" method="POST">
					<div class="form_container">
						<?php if(Flash::has('error')) { ?>
							<p style='color : red'><?php echo Flash::get('error'); ?></p> 
						<?php } ?>
						<div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="#0" class="social_bt facebook">Login with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="#0" class="social_bt google">Login with Google</a>
							</div>
						</div>
						<div class="divider"><span>Or</span></div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password*">
						</div>
						<div class="clearfix add_bottom_15">
							<div class="checkboxes float-left">
								<label class="container_check" >Nhớ tài khoản
									<input type="checkbox" name="remember_me">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="float-right"><a id="forgot" href="javascript:void(0);">Quên mật khẩu? </a></div>
						</div>
						<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
						<div id="forgot_pw">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A new password will be sent shortly.</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
						</div>
					</div>
				</form>
					<!-- /form -->
				</div>
				<!-- /box_account -->
				<div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Tìm vị trí</li>
							<li>Kiểm tra vị trí chất lượng</li>
							<li>Bảo vệ dữ liệu</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Thanh toán an toàn</li>
							<li>Hỗ trợ 24H</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
<?php endblock() ?>