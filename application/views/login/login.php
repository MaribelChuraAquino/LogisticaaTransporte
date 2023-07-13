<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Log In</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet"
		  href="<?= base_url('assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet"
		  href="<?= base_url('assets/backend/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/googlefont.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<!--<h4>Admin Login</h4>-->
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<div class="img-logo text-center">
			<img src="<?= $company->logo; ?>" alt="" style="margin-bottom: 15px;" width="250px" height="150px">
		</div>
		<p class="login-box-msg">para comprar contacta a tusolutionweb@gmail.com</p>
		<div class="text-center text-danger">
			<?php
			if (isset($this->session->message)) {
				echo htmlspecialchars($this->session->message);
			}
			?>
		</div>

		<form action="<?= base_url('login/check_login'); ?>" method="post">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Usuario o Email" name="user_name">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<span>
					<?php echo form_error('user_name', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<span>
					<?php echo form_error('password', '<div class="error" style="color: red">', '</div>'); ?>
				</span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> Recordar
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/backend/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/backend/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/backend/'); ?>plugins/iCheck/icheck.min.js"></script>
<!--login js-->
<script src="<?php echo base_url('assets/backend/dist/js/login.js') ?>"></script>
</body>
</html>
