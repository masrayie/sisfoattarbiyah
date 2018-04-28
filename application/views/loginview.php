<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sisfo At-Tarbiyah Al-Islamiyah</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="<?php echo base_url("assets/images/logo_kecil.png");?>" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/vendor/bootstrap/css/bootstrap.min.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/vendor/animate/animate.css");?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/vendor/css-hamburgers/hamburgers.min.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/vendor/animsition/css/animsition.min.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/vendor/select2/select2.min.css");?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/vendor/daterangepicker/daterangepicker.css");?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/css/util.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login_assets/css/mains.css");?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<?php echo form_open(base_url().'index.php/Login/verifyLogin'); ?>
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					<center><img src="<?php echo base_url("assets/images/logoattarbiy.svg");?>" alt="logo" width="80%" height="80%"/></center>
					<span class="login100-form-title p-b-5">

					</span>
					<span class="txt1 p-b-11">
						NIP
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="nip" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/vendor/jquery/jquery-3.2.1.min.js");?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/vendor/animsition/js/animsition.min.js");?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/vendor/bootstrap/js/popper.js");?>"></script>
	<script src="<?php echo base_url("assets/login_assets/vendor/bootstrap/js/bootstrap.min.js");?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/vendor/select2/select2.min.js");?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/vendor/daterangepicker/moment.min.js");?>"></script>
	<script src="<?php echo base_url("assets/login_assets/vendor/daterangepicker/daterangepicker.js");?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/vendor/countdowntime/countdowntime.js");?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("assets/login_assets/js/main.js");?>"></script>

</body>
</html>