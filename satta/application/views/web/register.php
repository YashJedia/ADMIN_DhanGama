
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
			color:#000000;
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
<a href="frontp" class="previous">&laquo; Back</a>
<a href="frontp" class="next">Home &raquo;</a>
<br><br>
<?php $this->load->view('admin/include/messages.php');?>
<div align="center" class="satta_2"><br><br>
	<div style="color: Red;"><span style="color: #F0FFF0;"><span style="font-family: Calibri;">
<span style="font-size: x-large;">
<strong><em><big><bdo dir="ltr">Register here:</bdo></big></em></strong>
</span></span></span></div>
	<br><br>
	<div class="login1" style="background-color: orange">
		<?php
		if($this->session->flashdata('error')){
			echo $this->session->flashdata('error');
		}

		?>
		<form action="<?php echo base_url()?>user-register" method="post">
			<div class="container" >
			<div class="row" style="background-color: orange">
				<div class="col-sm-4">
					Username: </div>
				<div class="col-sm-6"><input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" placeholder="username" required>
				</div>
				<div class="col-sm-4">
					Password: </div>
				<div class="col-sm-6"><input type="text" name="password" class="form-control" placeholder="Password" required>
				</div>
				<div class="col-sm-4">
					Repeat Password: </div>
				<div class="col-sm-6"><input type="text" name="confirmpassword"  class="form-control" placeholder="Confirm Password" required>
				</div>
				<div class="col-sm-4">
					Mobile: </div>
				<div class="col-sm-6">
					<input type="text" name="mobile" value="<?= set_value('mobile') ?>" class="form-control" placeholder="mobile no." required>

				</div>

				<div class="col-sm-4">
					Email: </div>
				<div class="col-sm-6">
					<input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email" required>

				</div>
				<div class="col-sm-3">
					<input type="Submit" value="Register">
				</div>
				<div class="col-sm-6">
					<a href="<?php base_url()?>login"><input type="button" value="Already have an account"></a>
				</div>
			</div>
			</div>
		</form>
<br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="footer">&copy; 2021  sattamatkaonlineplay.com</div>
</body>
</html>
