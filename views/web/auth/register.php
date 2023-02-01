<?php require_once('views/web/layouts/index.php') ?>

<?php startblock('title') ?>
Đăng ký
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
		<h1><a href="<?php echo url('auth/login') ?>">Đăng Nhập</a></h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
				<div class="box_account">
					<h3 class="new_client">Đăng ký</h3> <small class="float-right pt-2">* Phần bắt buộc</small>
                    <form method="POST" action="<?php echo url('auth/handleRegister') ?>">
					<div class="form_container">
						<div class="form-group">
                        <input class="form-control" placeholder="Họ và Tên" type="text" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''?>" name="fullname">
						</div>
                        <div class="form-group">
                        <input class="form-control <?php echo isset($errors['address']) ?'is-invalid' : '' ?>" placeholder="Địa chỉ" type="text" name="address" value="<?php echo isset($data['address']) ? $data['address'] : ''?>">
                            <?php if(isset($errors['address'])) { ?>
                                <div class="invalid-feedback"><?php echo $errors['address'] ?></div> 
                            <?php } ?>  
                        </div>
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
                                    <input class="form-control <?php echo isset($errors['email']) ?'is-invalid' : '' ?>" placeholder="Email" type="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''?>">
                                    <?php if(isset($errors['email'])) { ?>
                                        <div class="invalid-feedback"><?php echo $errors['email'] ?></div> 
                                    <?php } ?>
								</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
                                    <input class="form-control <?php echo isset($errors['phone_number']) ?'is-invalid' : '' ?>" placeholder="Số điện thoại" type="text" name="phone_number" value="<?php echo isset($data['phone_number']) ? $data['phone_number'] : ''?>">
                                        <?php if(isset($errors['phone_number'])) { ?>
                                            <div class="invalid-feedback"><?php echo $errors['phone_number'] ?></div> 
                                        <?php } ?>									
                                    </div>
								</div>
								<div class="col-12">
									<div class="form-group">
                                        <input class="form-control <?php echo isset($errors['password']) ?'is-invalid' : '' ?>" placeholder="Mật khẩu" type="password" name="password">
                                        <?php if(isset($errors['password'])) { ?>
                                            <div class="invalid-feedback"><?php echo $errors['password'] ?></div> 
                                        <?php } ?>
									</div>
								</div>
                                <div class="col-12">
									<div class="form-group">
                                        <input class="form-control <?php echo isset($errors['password_confirmation']) ?'is-invalid' : '' ?>" placeholder="Nhập lại mật khẩu" type="password" name="password_confirmation">
                                        <?php if(isset($errors['password_confirmation'])) { ?>
                                            <div class="invalid-feedback"><?php echo $errors['password_confirmation'] ?></div> 
                                        <?php } ?>									
                                    </div>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="container_check">Tôi đồng ý với <a href="#0">Chính sách bảo mật</a>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="text-center"><input type="submit" value="Register" class="btn_1 full-width"></div>
					</div>
                    </form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
		    </div>
		</div>
	</main>
<?php endblock() ?>