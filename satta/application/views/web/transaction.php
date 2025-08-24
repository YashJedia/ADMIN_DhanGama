<!DOCTYPE html>
<html lang="en">
<head>
	<title>online play matka ,play matka online ,online matka play,online matka, matka online, online matka play, matka play, online Ashapura, Ashapura online, Ashapura online play, Ashapura online play , Ashapura fix game ,Ashapura fix jodi ,Ashapura fast Result ,Ashapura sure number, Ashapura today game,Ashapura fix  Registeration</title>
	<meta name="description" content="MagicMatka">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />
	<style>
		th ,td{
			border: 1px solid black;
			text-align: center;
			padding: 15px;
		}
	</style>
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
<a href="myacc" class="previous">&laquo; Back</a>
<a href="frontp" class="next">Home &raquo;</a>
<br><br>
<?php $this->load->view('admin/include/messages.php');?>
<div align="center" class="satta_2">
	<div style="color: Red;">
<span style="color: #F0FFF0;">
<span style="font-family: Calibri;">
<span style="font-size: x-large;">
<strong><em><big><bdo dir="ltr">Transaction status</bdo></big></em></strong>
		<?php
		if($this->session->has_userdata('login')){
			$userData = $this->session->get_userdata('users');
			$wallet_amount = $this->functions->getUserData($userData['user']);
			echo '<h4 style="color: darkblue; font-weight: bold">Wallet Amount: '.$wallet_amount->user_wallet.'</h4>';
		}?>
</span></span></span></div>
</div>
<br><br>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<div class="table table-responsive">
			<table style= "width:100%;" class="border table"  >
				<tr>
					<th>Sno.</th>
					<th>Transaction Type</th>
					<th>Available Balance for Withdraw</th>
					<th>Points</th>
					<th>Status</th>
				</tr>
				<?php
				$i = 1;
				foreach($fetch as $row){
					?>
					<tr align="center">
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['txn_type'];?></td>
						<td><?php echo $row['user_wallet'];?></td>
						<td><?php echo $row['txn_req_amt'];?></td>
						<td><?php
							if($row['txn_status'] === "APPROVED")
							{
								echo '<a href="#"><button class="btn btn-success text-white">Approved</button></a>';
							}
							elseif($row['txn_status'] === "PENDING")
							{
								echo '<a href="#"><button class="btn btn-warning text-white">Pending</button></a>';
							}
							?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
</div>
<br><br>
<div class="footer">&copy; 2021  sattamatkaonlineplay.com</div>
</body>
</html>
