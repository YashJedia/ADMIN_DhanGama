<!DOCTYPE html>
<html lang="en">
<head>
	<title>online play matka ,play matka online ,online matka play,online matka, matka online, online matka play, matka play, online Ashapura, Ashapura online, Ashapura online play, Ashapura online play , Ashapura fix game ,Ashapura fix jodi ,Ashapura fast Result ,Ashapura sure number, Ashapura today game,Ashapura fix  Registeration</title>
	<meta name="description" content="MagicMatka">
<!--	<meta name="viewport" content="width=1024">-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script>
		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

			return true;
		}
	</script>
	<style>
		body
		{
			/*width: 1050px;*/
			margin:0px auto;
			padding:0px;
			font-family:Tahoma, Times New Roman,"Comic Sans MS",Helvetica,sans-serif;
			font-size:13px;
			color:#000000;F
		background-color:#fff;
			max-width: 950px;
			border: 1px solid #999999;
			-moz-box-shadow: 1px 1px 15px #999999;
			-webkit-box-shadow:1px 1px 15px rgb(150,150,150);
			box-shadow:1px 1px 15px rgb(150,150,150);
		}
	</style>

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a href="<?=base_url();?>" class="btn btn-info">&laquo; Back</a> &nbsp;&nbsp;
			<a href="<?=base_url();?>" class="btn btn-success text-white">Home &raquo;</a>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-sm-12">
			<?php $this->load->view('admin/include/messages.php');?>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-sm-12">
			<div align="center" class="sattabr_2">
				<span style="font-family: sans-serif;">
				<span style="font-size: x-large;">
				<h3 class="text-success">Login Details</h3><br><br>
				</span></span>
			</div>
		</div>
		<div class="row">
			<!--			<div class="col-sm-3"></div>-->
			<div class="col-sm-12 text-center">
				<div class="login1 " style="background-color: orange">
					<?php
					if($this->session->flashdata('error')){
						echo $this->session->flashdata('error');
					}
					?>
					<!-- <form action="<?php echo base_url()?>login-allow" method="post"><input type="hidden" name="s" value="1" /> -->
					<?php echo form_open(base_url().'login-allow'); ?>
					<div class="form-group ">
						<label class="mt-4">Username:
							<input type="text" name="username" value="<?= set_value('username')?>" class="form-control" placeholder="username" required></label>
					</div>
					<div class="form-group mt-3">
						<label>Password:
							<input type="password" name="password" class="form-control" placeholder="password" required></label>
					</div>
					<div class="form-group mt-3">
						<button type="submit" value="Submit" class="btn btn-info">Submit</button>
					</div><br>
					<div class="form-group mt-3 mb-4"><a href="<?php base_url()?>register"><button type="button" class="btn btn-success" value="Don't have an account">Don't have an account</button></a></div>
				</div>
			</div>
		</div>
	</div></td></tr> </div><br><br>
<br><br><br><br><br><br><br><br>
</div>
<div class="footer">&copy; 2021  Ratan Matka Inc.</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
