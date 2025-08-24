<!DOCTYPE html>
<html lang="en">
<head>
	<title>Play Matka online  Ashapura of all markets Play Single</title>
	<meta name="description" content="Play Online Ashapura of all markets Play Single">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/dist/css/toast.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- CSS only -->
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
			/*border: 1px solid #999999;*/
			-moz-box-shadow: 1px 1px 15px #999999;

			-webkit-box-shadow:1px 1px 15px rgb(150,150,150);
			box-shadow:1px 1px 15px rgb(150,150,150);
		}

		@media screen and (max-width: 600px) {
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
			}

		}
		#load{
			width:100%;
			height:100%;
			position:fixed;
			z-index:9999;
			background:url("../assets/loder.gif") no-repeat center center rgba(0,0,0,0.25);
			background-size: 150px 150px;
		}
	</style>
</head>
<body>
<div id="load"></div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a href="<?= base_url('/')?>" class="previous">&laquo; Back</a>

			<div align ="center" class="satta_2">
				<div style="color: Red;"><span style="color: #F0FFF0;"><span style="font-family: Calibri;"><span style="font-size: x-large;"><strong><em><big><bdo dir="ltr">sattamatkaonlineplay.com</bdo></big></em></strong></span></span></span></div><a href="frontp">sattamatkaonlineplay.com</a>
				<?php
				$setting = $this->functions->getSettingData();
				if($this->session->has_userdata('login')){
					$userData = $this->session->get_userdata('users');
					$wallet_amount = $this->functions->getUserData($userData['user']);
					echo '<h4 style="color: darkblue; font-weight: bold">Wallet Amount: '.$wallet_amount->user_wallet.'</h4>';
				}?>
			</div>

			<div class="detail"><marquee behavior="alternate">After Registration, for online play Contact us on <?=$setting->mobile?>
				</marquee></div>
		</div>
	</div>
<!--			<div class="scroll">-->
				<form action="#" id="form1" method="post">
					<input type="hidden" name="s" value="<?=$id?>" />
					<input name="selrs" type="text" value="" style="display: none">
					<div class="container">
					<div class="row text-white  font-weight-bold">
						<?php
						foreach ($game as $games) {
							$time = date('H:i:s');
							$day = date('D');
							// echo $time;
							// 	echo $games->sunday_start_time;
							switch ($day) {
								case 'Sun': if($games->sunday) {
									if($games->sunday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><input type="radio"   name="game_bit_type" value="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->sunday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->sunday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->sunday_start_time)).'</span></div>';

								}
								break;
								case 'Mon': if($games->monday) {
									if($games->monday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->monday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->monday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class=" " style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->monday_start_time)).'</span></div>';

								}
								break;

								case 'Tue': if($games->tuesday) {
									if($games->tuesday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden  name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date ('h:i A' , strtotime($games->tuesday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->tuesday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->tuesday_start_time)).'</span></div>';

								}
								break;

								case 'Wed': if($games->wednesday) {
									if($games->wednesday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->wednesday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->wednesday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->wednesday_start_time)).'</span></div>';

								}
								break;

								case 'Thu':if($games->thursday) {
									if($games->thursday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden  name="game_name" value="'.$games->id.'" data-bit_type="open" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->thursday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->thursday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->thursday_start_time)).'</span></div>';

								}
								break;

								case 'Fri' : if($games->friday) {
									if($games->friday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->friday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->friday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->friday_start_time)).'</span></div>';

								}
								break;

								case 'Sat':if($games->saturday) {
									if($games->saturday_start_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->saturday_start_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->saturday_start_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->saturday_start_time)).'</span></div>';

								}
								break;
							}
						}
						?>
					</div>
					<div class="row text-white font-weight-bold">
						<?php

						foreach ($game as $games) {

							$time = date('H:i:s');
							$day = date('D');
							switch ($day) {
								case 'Sun': if($games->sunday && $id != '2') {
									if($games->sunday_close_time > $time && $games->status ) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->sunday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->sunday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->sunday_close_time)).'</span></div>';

								}
									break;
								case 'Mon': if($games->monday && $id != '2') {
									if($games->monday_close_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->monday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->monday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->monday_close_time)).'</span></div>';

								}
									break;

								case 'Tue': if($games->tuesday && $id != '2') {
									if($games->tuesday_close_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->tuesday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->tuesday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->tuesday_close_time)).'</span></div>';

								}
									break;

								case 'Wed': if($games->wednesday && $id != '2') {
									if($games->wednesday_close_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input hidden type="radio"  name="game_name" value="'.$games->id.'" data-bit_type="close">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->wednesday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->wednesday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->wednesday_close_time)).'</span></div>';

								}
									break;

								case 'Thu':if($games->thursday && $id != '2') {
									if($games->thursday_close_time > $time && $games->status && $id != '2') {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden  name="game_name" value="'.$games->id.'" data-bit_type="close" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->thursday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->thursday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->thursday_close_time)).'</span></div>';

								}
									break;

								case 'Fri' : if($games->friday && $id != '2') {
									if($games->friday_close_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" data-id="'.$games->id.'" value="'.$games->id.'" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->friday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->friday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->friday_close_time)).'</span></div>';

								}
									break;

								case 'Sat': if($games->saturday && $id != '2') {
									if($games->saturday_close_time > $time && $games->status) {

										echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->saturday_close_time)).'</span></label></div>';

									}
									else{

										echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->saturday_close_time)).'</span></div>';
									}
								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->saturday_close_time)).'</span></div>';

								}
									break;
							}
						}
						?>
					</div>
					<div class="row">
						<div class="col-sm-11  border">
							<p class="m-3 font-weight-bolder">Game: <?php echo $gameDetails->gt_min_price.':'.$gameDetails->gt_rate; ?></p>
						</div>
						<div class="col-sm-1 border bg-success">
							Points
						</div>
					</div>
					<div class="row bg-danger">
						<?php
						foreach ($numbers as $num){
							echo '<div class=" d-inline" style="width: 20%"> <div class="form-group text-white font-weight-bold"><lable>'.$num->bn_number.'&nbsp;&nbsp;&nbsp;<input type="hidden" name="number[]" value="'.$num->bn_number.'"><input type="number" class="bid_number" data-id="'.$num->bn_number.'" name="txt[]" onkeypress="return isNumberKey(event)" min="10" style="width: 40%"></lable></div></div>';
						}
						?>
						<div class="col-sm-2 bg-success border">
							<label class="mb-4" style="width: 100%">Total <input type="text" id="totalNumber"  name="total" readonly style="width: 100%"></label>
						</div>
					</div>
					<div class="row ">
						<input type="hidden" name="user_id" value="<?=$this->session->userdata('user')?>">
						<div class="col-sm-10"></div>
						<div class="col-sm-2 pull-right">
							<?php  if($this->session->has_userdata('login')){
							echo '<button type="submit" class="btn btn-info pull-right submit_button">Submit</button>';
							}
							else{
							echo '<a href="'.base_url('/login').'"> <button type="button" class="btn btn-info pull-right submit_button">Submit</button></a>';

							 }?>

						</div>
					</div>

<!--					<table class="player" align='center' cellspacing='2' cellpadding='6' border='0' width="100%">-->
<!--						<tr>-->
<!--							<td>-->
<!--								<div class="left_gopt">Game: --><?php //echo $gameDetails->gt_min_price.':'.$gameDetails->gt_rate; ?><!--</div>-->
<!--								<input type="hidden" name="game" value="SK">-->
<!--							</td>-->
<!--							<td></td>-->
<!--							<td></td>-->
<!--							<td></td>-->
<!--							<td></td>-->
<!--							<td class="colored totx">Points</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td class="colored">1&nbsp;<input id="x_0_0" onKeyup="refresh('0');" name="txt[1]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td><td class="colored">2&nbsp;<input id="x_0_1" onKeyup="refresh('0');" name="txt[2]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" />-->
<!--							</td>-->
<!--							<td class="colored">3&nbsp;<input id="x_0_2" onKeyup="refresh('0');" name="txt[3]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored">4&nbsp;<input id="x_0_3" onKeyup="refresh('0');" name="txt[4]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored">5&nbsp;<input id="x_0_4" onKeyup="refresh('0');" name="txt[5]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored totx"><span class="smd" id="t_r_0">00</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td class="colored">6&nbsp;<input id="x_1_0" onKeyup="refresh('1');" name="txt[6]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored">7&nbsp;<input id="x_1_1" onKeyup="refresh('1');" name="txt[7]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored">8&nbsp;<input id="x_1_2" onKeyup="refresh('1');" name="txt[8]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored">9&nbsp;<input id="x_1_3" onKeyup="refresh('1');" name="txt[9]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored">0&nbsp;<input id="x_1_4" onKeyup="refresh('1');" name="txt[0]" type="text" onkeypress="return isNumberKey(event)" style="height: 15px; width: 45px; vertical-align: baseline; border-color: red" /></td>-->
<!--							<td class="colored totx"><span class="smd" id="t_r_1">00</td></tr><tr><td></td><td></td><td></td><td></td><td class="colored smx"><b>Total -></b></td><td class="colored totx"><span id="whole">00</td></tr></table>-->
					<div style="color: red; padding:5px;" align="center">
						You can not play game. Your account balance should be greater than 5. contact to administrator.</div>
					<center><font color=blue>*After Confirm Submission no changes will be made at any cost and it will be fixed bidding</font><br><b>Note - Minimum Bet on any any number should be 10 points</b></center>
					<div class="footer">&copy; 2021  sattamatkaonlineplay.com</div>
				</form>
			</div>
			</div>
<!--		</div>-->
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bid Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-responsive-md">
							<thead>
							<tr>
								<th>Bit Number</th>
								<th>Points</th>
							</tr>
							</thead>
							<tbody id="tabledata">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary confirm_click">Confirm</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script src="<?=base_url('assets/dist/js/toast.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
	// function refresh(id)
	// {
	// 	sum=0;
	// 	for(i=0; i<5; i++)
	// 	{
	// 		points=document.getElementById("x_" + id + "_" + i).value;
	// 		if(points > )
	// 		{
	// 			alert("You dont have that much point.");
	// 		}
	// 	else{
	// 		sum = +sum + +points;
	// 	}
	// 		document.getElementById("t_r_" + id).innerHTML = sum;
	// 	}
	// 	refreshall('2');
	// }

	// function refreshall(all)
	// {
	// 	sum = 0;
	// 	for(i=0; i<all; i++)
	// 	{
	// 		sum = +sum + +document.getElementsByClassName("smd")[i].innerHTML;
	// 	}
	// 	document.getElementById("whole").innerHTML = sum;
	// 	if(sum > )
	// 	{
	// 		alert("You dont have that much point.");
	// 	}
	// }

	// function rst(tot)
	// {
	// 	document.getElementById("form1").reset();
	// 	document.getElementById("whole").innerHTML = "00";
	// 	for(i=0; i < tot; i++)
	// 	{
	// 		document.getElementsByClassName("smd")[i].innerHTML = "00";
	// 	}
	// }

	$(function (e){

		var options = {
			autoClose: true,
			progressBar: true,
			enableSounds: true,
			sounds: {
				info: "<?=base_url('assets/info.mp3')?>",
// path to sound for successfull message:
				success: "<?=base_url('assets/success.mp3')?>",
// path to sound for warn message:
				warning: "<?=base_url('assets/warning.mp3')?>",
// path to sound for error message:
				error: "<?=base_url('assets/error.mp3')?>",
			},
		};
		var toast = new Toasty(options);
		toast.configure(options);


		$('#load').hide();
		$('.game-bid').on('click' , function (e){

			if($(this).hasClass('bg-success')) {
				$('.game-bid').removeClass('bg-danger').addClass('bg-success');
				$(this).removeClass('bg-success').addClass('bg-danger');
				// $(this).
				// $('#game_type_bid_open'+values).prop('checked' , false);
			}
			else{
				// $('#game_type_bid_open'+values).prop('checked' , true);
				// $('#game_type_bid_open'+values).prop('checked' , false);
				// $(this).removeClass('bg-danger').addClass('bg-success');
			}
		})


		$('.bid_number').on('keyup' , function (e) {

			// var number = parseInt($(this).val() ? $(this).val() : 0 );
			var number   =   $("input[name='txt[]']").map(function(){ return $(this).val();}).get();;

			// var totals = parseInt($('#totalNumber').val() ? $('#totalNumber').val() : 0)
			var sum = 0;
			for (var i = 0; i < number.length; i++ ) {
				sum += Number(number[i]);
			}
			// console.log(sum);
			// var totalNum = (parseInt(sum) + totals);
			$('#totalNumber').val(sum);

		});

		$('#form1').on('submit' , function (e) {
			e.preventDefault();
			var game_name   =   $("input[name='game_name']:checked").map(function(){
				return $(this).val();
			}).get();;

			if(game_name.length > 0) {

				var array = new Array();
				var number = $("input[name='txt[]']").map(function () {
					array.push($(this).val());
				}).get();
				;

				var totalNum = $('#totalNumber').val();

				if(totalNum > 0) {

					var bidArray = new Array();

					var bidid = $("input[name='txt[]']").map(function () {
						bidArray.push($(this).data('id'));
					}).get();

					var dataConfirm = [];
					$.map(array, function (item, index) {
						var innerObj = {};
						if (item) {
							innerObj['number'] = item;
							innerObj['value'] = bidArray[index];
							dataConfirm.push(innerObj);
						}
					})

					var html = '';
					$.map(dataConfirm, function (item, index) {
						html += '<tr><td>' + item.value + '</td><td>' + item.number + '</td></tr>';
					})

					$('#tabledata').html(html);

					$('#exampleModal').modal('toggle');

					// var data = $('#form1').serializeArray().reduce(function (obj, item) {
					// 	console.log(item.name);
					// 	obj[item.name] = item.value;
					// 	return obj;
					// }, {});
				}
				else{
					toast.error('Please select a bid');
				}
			}
			else{
				toast.error('Please choose market');
			}

		})

		$('.confirm_click').on('click' , function (e){
			e.preventDefault();
			// var formData =  new FormData("#form1");
			var form = $('#form1')[0];
			// Create an FormData object
			var data = new FormData(form);
			var values = $("input[name='game_name']:checked").data('bit_type');
			data.append('bid_types' , values);

			$.ajax({
				url: "<?= base_url('web/save_game_bid') ?>",
				type: "POST",
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				beforeSend: function () {
					$('#load').show()
				},
				success: function (result) {
					console.log(result);
					if (result.success) {
						$('#exampleModal').modal('toggle');
						toast.success(result.msg);
						setTimeout( function (){
							location.reload();
						}, 1000);
					} else {
						$('#exampleModal').modal('toggle');
						toast.error(result.msg);
					}
				},
				complete: function () {
					$('#exampleModal').modal('toggle');
					$('#load').hide()
				},
				error: function (jqXHR, exception) {
					$('#add-button').prop('disabled', false);
					console.log(jqXHR.responseText);
				}
			});
		})


	})



</script>

</body>
</html>
