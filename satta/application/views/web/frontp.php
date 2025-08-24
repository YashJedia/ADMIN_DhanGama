<!DOCTYPE html>
<html lang="en">
<head>
	<title> online play matka ,play matka online , online Ashapura, Ashapura online, Ashapura online play , Ashapura fix game ,Ashapura fix jodi ,Ashapura fast Result ,Ashapura sure number, Ashapura today game,Ashapura fix </title>

	<meta name="description" content="5 Star Matka">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url();?>assets/frontpcss.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

		.topnav {
			overflow: hidden;
			background-color: #333;
		}

		.topnav a {
			float: left;
			display: block;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.topnav a.active {
			background-color: #04AA6D;
			color: white;
		}

		.topnav .icon {
			display: none;
		}

		@media screen and (max-width: 600px) {
			.topnav a:not(:first-child) {display: none;}
			.topnav a.icon {
				float: right;
				display: block;
			}
		}

		@media screen and (max-width: 600px) {
			.password {
				margin-top: 10px;
				margin-bottom: 10px;
			}
			.user-name {
				margin-top: 5px;
			}
		}

		@media screen and (max-width: 600px) {
			.topnav.responsive {position: relative;}
			.topnav.responsive .icon {
				position: absolute;
				right: 0;
				top: 0;
			}
			.topnav.responsive a {
				float: none;
				display: block;
				text-align: left;
			}
		}
	</style>
	<!-- Global site tag (gtag.js) - Google Ads: 708255506 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-708255506"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-708255506');
</script>
<script>
  gtag('event', 'conversion', {'send_to': 'AW-708255506/po3zCJPfz-ECEJK-3NEC'});
</script>
</head>
<body>
	<?php $setting = $this->functions->getSettingData();		?>
<div align="center" class="satta_2">
	<div style="color: Red;"><span style="color: #F0FFF0;"><span style="font-family: Calibri;"><span style="font-size: x-large;"><strong><em><big><bdo dir="ltr"><img style="height:100px;width:200px" src="assets/dist/img/dpboss.jpeg"></bdo></big></em></strong></span></span></span></div><a href="https://sattamatkaonlineplay.com/">sattamatkaonlineplay.com</a>
</div>

<?php if(isset($_SESSION['login']) && $_SESSION['login']){
	?>
	<div class="purple">
		<a href="<?=base_url();?>myacc"><input type="button" name="My Account" value="My Account" class="btn"></a>
		<a href="<?=base_url();?>user-logout"><input type="button" name="Logout" value="logout" class="btn"></a>

		<?php
		if($this->session->has_userdata('login')){
			$userData = $this->session->get_userdata('users');
			$wallet_amount = $this->functions->getUserData($userData['user']);
			echo '<h4 style="color: #ffffff; font-weight: bold">Wallet Amount: '.$wallet_amount->user_wallet.'</h4>';
		}?>
	</div>
<?php


}else {?>
	<div class="purple">
		<?php
		if($this->session->flashdata('error')){
			echo $this->session->flashdata('error');
		}
		echo form_open(base_url().'login-allow'); ?>
		UserName:<input type="text" name="username" class="user-name" value="<?= set_value('username')?>" placeholder="username" required></label>
		Password:<input type="password" name="password" class="password" placeholder="password" required></label>
		<button type="submit" value="Submit" class="btn btn-info">Submit</button>
		<a href="<?php base_url()?>register"><button type="button" class="btn btn-success" value="Don't have an account">Don't have an account</button></a>

<!--		<a href="--><?//=base_url();?><!--login"><input type="button" name="Login" value="Login" class="btn"></a>-->
<!--		<a href="--><?//=base_url();?><!--register"><input type="button" name="Register" value="Register" class="btn"></a> </div>-->
<?php }?>

<div class="detail topnav" id="myTopnav">
	<a href="<?=base_url();?>" class="game">Home</a>
	<?php foreach($gameType as $k => $gty):
		$gam = strtolower(str_replace(" ", "-", $gty->gt_name));
		if(strtolower($gty->gt_name) === 'half sangam'){
	  		echo  '<a href="'.base_url('halfsangam/'.$gty->gt_id).'" class="game" >'. $gty->gt_name.'</a>';
	 	}
		elseif(strtolower($gty->gt_name) === 'full sangam'){
			echo  '<a href="'.base_url('fullsangam/'.$gty->gt_id).'" class="game" >'. $gty->gt_name.'</a>';
		}
		else{
			echo  '<a href="'.base_url('game-play/'.$gty->gt_id).'" class="game" >'. $gty->gt_name.'</a>';
		}
		endforeach;
	if($this->session->has_userdata('login')){

	echo ' <a href="profile " class="game">My profile</a>
      <a href="change"  class="game">Change Password</a>
      <a href="withdrawdepo"  class="game"> Withdraw-Deposit</a>
      <a href="transaction" class="game">Transaction Status</a>
      <a href="my_bid" class="game">My Bid</a>
		<a href="how"  class="game">How To Play?</a>
      ';
	}
	else{
	echo '<a href="how" class="game">How To Play?</a>';
		}

	echo '<a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>';
		?>

</div>

</div><div class="double">
	PLAY ONLINE Ashapura<br/>
	<?php

	$count = count($games);
	foreach($games as $key => $game){ ++$key
		?>
	<font color="green"><?= $game->title ?></font>
    <?php
    	echo ($count != $key)?"|":"";
     } ?>
	<br>
	<font color="black">Game Rate Full x10</font><br/>
	<?php foreach($gameType as $ke => $gt){ ?>
	<?= $gt->gt_min_price.":".$gt->gt_rate." (".$gt->gt_name.")" ?> <br>
<?php } ?>
	<font color="red">
				WITHDRAWAL TIME MORNING 7 am To 11.00 am</font>
			<br/>
			Minimum Deposit 1000/- Minimum Withdrawal 500/-<br />Withdrawal Free Hai No Charge<br><bR>      DEPOSIT  BOUNS
			ALL TIME<br>10000 per 1000<br >20000 per 2000<br >50000 per 6000<br><br><font color="green"> <br><font color="red">For Account Number Details And All Other Details,Contact Admin Sir </font><font color="green"><b> WhatsApp sms <br>  <?=$setting->mobile?></font><br/></font> </p></div><div>   <div align="center">
			<h5><b>Download Ashapura App Now
		</b></h5>
	<div class="container" style="text-align:center;" align="center"><a href="https://play.google.com/store/apps/details?id=com.satta"><img src="playstore.png" width="200px"></img></a></div></div>  <br><br></div>

<br/>
<br></div></div></div>

<div style="text-align:center" align="center" class="google_play"><a href="whatsapp://send?text=Hello Admin Sir&phone=<?=$setting->mobile?>"><img src="whatsapp.png" width="200px" /></a><br />

	<div class="container" style="text-align: center;">
		<h5><b>Whatsapp Link  photo par cilck karo</b></h5>
		<!--<a href="https://www.youtube.com/watch?v=xD7IUXtNtRM&t=50s" target="_blank"><img src="youtube.png" style="text-align:center" width="150"></img></a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;-->
		<!--</br><br><br> <h5><a href="https://www.youtube.com/watch?v=xD7IUXtNtRM&t=50s" style="color:red">Click To Subscribe Channel</a>-->
		</h5>
	</div>Plzz Subscribe My YouTube Channel photo par cilck karo </br></br>
	<div class="container">
	<div class="row" style="background-color: orange">
		<div class="col-sm-12" style="background-color: orange">
			<h2>Result Menu</h2>
		</div>
		<?php

			echo '<div class="col-sm-12 mt-2 clock">
					<font size ="15"><div id="myClock"></div></font>
				</div>';

		foreach ($games as $key => $game) {
			$date = date('Y-m-d');
			$result = $this->functions->check_result($game->id , $date);
//			print_r($result->result_jodi);
			if($result){
				$open = $result->result_open_panel ? $result->result_open_panel : '**';
				$jodi = $result->result_jodi  ? $result->result_jodi : $result->result_jodi;
				$close = $result->result_close_panel ? $result->result_close_panel : '***';
			}
			else{
				$open = '***';
				$jodi = '00';
				$close = '***';
			}



	echo '<div class="col-sm-12 mt-2" style="background-color: lightyellow;  border: 1px #0a0e14">
				<span class="p-4" style="font-size: 22px"> '.$game->title.'</span>
					<br>
				<span style="font-size: 22px; color: red">'.$open.'-'.$jodi.'-'.$close.'</span>
		</div>';
	}?>
	</div>

		<script>
			// select the myClock div
			var myClock = document.getElementById('myClock');

			function renderTime () {

				var currentTime = new Date();
				var h = currentTime.getHours();
				var m = currentTime.getMinutes();
				var s = currentTime.getSeconds();
				if (h<12) { pkk= "AM"; } else {pkk= "PM"; }

				if(h==0){h=12;}
				else if(h>12){h-=12;}


				if (m < 10)
				{ m = "0" + m;
				}


				if (s < 10)
				{ s = "0" + s;
				}

				myClock.textContent = h + ":" + m + ":" + s   +   pkk;
				myClock.innerText = h + ":" + m + ":" + s   +   pkk;

			} // don't forget to close your function

			// you actually want to use setInterval, not setTimeout
			setInterval(function(){
				renderTime();
			}, 1000);

			function myFunction() {
				var x = document.getElementById("myTopnav");

				if (x.className === "detail topnav") {
					x.className += " responsive";
				} else {
					x.className = "detail";
					x.className += " topnav";

				}
			}
		</script>
	</div>

	<div class="footer">&copy; 2021  sattamatkaonlineplay.com</div>

</div>

</body>
