<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Log in</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url('assets/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo site_url(); ?>"><img src="<?php echo site_url('img/logo.png'); ?>" alt="logo" /></a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>

		<?php
			$data = array(
				'method' => 'post',
			);
			echo form_open('site/validate_credentials', $data);
			$opts = array(
				'placeholder' => "username",
				'name' => 'username',
				'id' => 'textbox2',
				'maxlength' => '20',
				'class'=>'form-control'
			);
			echo form_input($opts);

			$opts2 = array(
				'placeholder' => "password",
				'name' => 'password',
				'id' => 'textbox2',
				'maxlength' => '20',
				'class'=>'form-control'
			);
			echo form_password( $opts2 );

			echo '<br>';
			$opts3 = array(
				'name' => 'submit',
				'value' => 'Log In',
				'id' => 'btn',
				'class'=>'form-control'
			);
			echo form_submit($opts3);
			echo form_close();

		?>

	</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

<script src="<?php echo site_url('plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script src="<?php echo site_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script>
</body>
</html>