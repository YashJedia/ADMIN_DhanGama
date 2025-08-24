<!DOCTYPE html>
<html lang="en">
<head>
<title>online play matka ,play matka online ,online matka play,online matka, matka online, online matka play, matka play, online Ashapura, Ashapura online, Ashapura online play, Ashapura online play , Ashapura fix game ,Ashapura fix jodi ,Ashapura fast Result ,Ashapura sure number, Ashapura today game,Ashapura fix  Registeration</title>
<meta name="description" content="MagicMatka">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<a href="myacc" class="previous">&laquo; Back</a>
<?php $this->load->view('admin/include/messages.php');?>
<div align="center" class="satta_2"><br><br>
<div style="color: Red;"><span style="color: #F0FFF0;">
<span style="font-family: Calibri;">
<span style="font-size: x-large;">
<strong><em><big><bdo dir="ltr">Change Password</bdo></big></em></strong><br><br>
</span></span></span></div>

<div class="login1" style="background-color: orange">
<?php
  if($this->session->flashdata('error')){
      echo $this->session->flashdata('error'); 
  }
?>
<form action="<?php echo base_url()?>change-pass" method="post">
<table class="center">
<tr>
<td width="40%">Old Password: </td>
<td><input type="text" name="old_pass" value="<?= set_value('username') ?>" class="form-control" placeholder="old password" required></td>
</tr>
<tr>
<td width="40%">New Password: </td>
<td><input type="password" name="new_pass" class="form-control" placeholder="New password" required></td>
</tr>
<tr>
<td width="40%">Confirm Password: </td>
<td><input type="password" name="confirm_pass" class="form-control" placeholder="repeat password" required></td>
</tr>

<tr><td width="40%">&nbsp;</td><td><input type="Submit" name="change_pass" value="Submit"></td><br>


</tr>

	</table>
<br><br><br>
</div></div></div>
<div class="footer">&copy; 2021  Ratan Matka Inc.</div>
</body>
