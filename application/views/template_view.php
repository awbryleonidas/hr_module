<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<title><?php echo $title;?></title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/yolophp.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/datatables/js/dataTables.responsive.min.js"></script>

	<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>

	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.css" />
	<link type="text/css" rel="stylesheet" href="http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/datatables/css/dataTables.responsive.css" />
	<link type="text/css" rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css"/>
	<style>

	</style>

	<script>
		function logout_btn()
		{
			if(confirm("Are you sure you want to logout?")){
				return true;
			}
			else{
				return false;
			}
		}

	</script>

</head>
<body>
<div class="container">
	<div class="jumbotron col-md-12 row">
		<div id="header" class="col-md-9">
			<img style="height: 100px" src="<?php echo base_url()?>images/logo.jpg" alt="logo">
		</div>
		<div class="col-md-3">
			<i class="fa fa-user" aria-hidden="true"></i> Welcome, <?php echo $username;?>! <br>
			<a href="<?php echo site_url('site/logout')?>" style="text-decoration: none; font-family: arial; position: absolute;color: blue; font-size: 15px;" onclick="return logout_btn();"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>

		</div>
	</div>
	<div class="col-md-12 row">
		<?php echo $this->load->view($view)?>
	</div>
</div>
</body>