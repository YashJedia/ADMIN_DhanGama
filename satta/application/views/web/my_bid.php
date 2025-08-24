<!DOCTYPE html>
<html lang="en">
<head>
	<title>online play matka ,play matka online ,online matka play,online matka, matka online, online matka play, matka play, online Ashapura, Ashapura online, Ashapura online play, Ashapura online play , Ashapura fix game ,Ashapura fix jodi ,Ashapura fast Result ,Ashapura sure number, Ashapura today game,Ashapura fix  Registeration</title>
	<meta name="description" content="MagicMatka">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		th ,td{
			border: 1px solid black;
			text-align: center;
			padding: 15px;
		}

		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}

		.btn-success{
			color:#4CAF50;
		}
		.btn-warning{
			color:#4CAF50;
		}

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
<strong><em><big><bdo dir="ltr">My Bids</bdo></big></em></strong>
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
			<table id="example2" style="width:100%;" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>Sno.</th>
					<th>Date</th>
					<th>Game</th>
					<th>Bid Name</th>
					<th>Number</th>
					<th>Price</th>
					<th>Type</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php  foreach ($result as $key => $value):?>
					<tr>
						<td><?php echo ++$key; ?></td>
						<td><?php echo $value->created; ?></td>
						<td><?php echo $value->title; ?></td>
						<td><?php echo $value->gt_name; ?></td>
						<td><?php echo $value->bid_number ; if($value->bid_panel) {echo ' - ' .$value->bid_panel;} ?></td>
						<td><?php echo $value->bid_value; ?></td>
						<td><?php echo $value->bid_type; ?></td>
						<td><?php
							$date = date('Y-m-d' , strtotime($value->created));

							$result = $this->functions->check_result_bid($value->game_id , $date);

							if($result){
								$openSum = array_sum(str_split($result->result_open_panel));
								$closeSum = array_sum(str_split($result->result_close_panel));
								$closeDigit =  substr($closeSum, -1);
								$openDigit  =  substr($openSum, -1);
								$jodiDigit  =  $result->result_jodi;
//				 				For Single

//								echo $value->game_type;
								if($value->game_type === '1' && $value->bid_type === 'open' && $result->result_open_panel > 0){
									if($openDigit === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}
								elseif($value->game_type === '1' && $value->bid_type === 'close' && $result->result_close_panel > 0){
									if($closeDigit === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										 echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

								// For Jodi
								elseif($value->game_type === '2' && $value->bid_type === 'open' && $result->result_close_panel > 0 ){
									if($jodiDigit === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

								// For Single Panel
								elseif($value->game_type === '3' && $value->bid_type === 'open' && $result->result_open_panel > 0){
									if($result->result_open_panel === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}
								elseif($value->game_type === '3' && $value->bid_type === 'close' && $result->result_close_panel > 0){
									if($result->result_close_panel === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

//								For Double Panel
								elseif($value->game_type === '4' && $value->bid_type === 'open' && $result->result_open_panel > 0){
									if($result->result_open_panel === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}
								elseif($value->game_type === '4' && $value->bid_type === 'close' && $result->result_close_panel > 0){
									if($result->result_close_panel === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

							//								For Triple Panel
								elseif($value->game_type === '5' && $value->bid_type === 'open' && $result->result_open_panel > 0){
									if($result->result_open_panel === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}
								elseif($value->game_type === '5' && $value->bid_type === 'close' && $result->result_close_panel > 0){
									if($result->result_close_panel === $value->bid_number){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

							//								Half Sanagam

								elseif($value->game_type === '6' && $value->bid_type === 'open' && $result->result_open_panel > 0){
									if($closeDigit === $value->bid_number && $result->result_open_panel === $value->bid_panel){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									elseif($result->result_close_panel === $value->bid_number && $openDigit === $value->bid_panel){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

								elseif($value->game_type === '6' && $value->bid_type === 'open' && $result->result_close_panel > 0){
									if($closeDigit === $value->bid_number && $result->result_open_panel === $value->bid_panel){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									elseif($result->result_close_panel === $value->bid_number && $openDigit === $value->bid_panel){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

								//								Full Sanagam

								elseif($value->game_type === '7' && $value->bid_type === 'open' && $result->result_open_panel > 0){

									if($result->result_open_panel === $value->bid_number && $result->result_close_panel === $value->bid_panel){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}

								elseif($value->game_type === '7' && $value->bid_type === 'open' && $result->result_close_panel > 0){

									if($result->result_open_panel === $value->bid_number && $result->result_close_panel === $value->bid_panel){
										$this->functions->win_settled($value->user_id , $value->id);
										echo '<button class="btn btn-success" style="background-color: green; color: white">Win</button>';
									}
									else{
										echo '<button class="btn btn-success" style="background-color: red; color: white">Loss</button>';
									}
								}
								else{
									echo '<button class="btn btn-warning" style="color: white; background-color: #e17c28">Pending</button>';
								}

							}
							else{
								echo '<button class="btn btn-warning" style="color: white; background-color: #e17c28">Pending</button>';
							}

							?></td>

					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>
<br><br>
<div class="footer">&copy; 2021  sattamatkaonlineplay.com</div>
</body>
</html>
