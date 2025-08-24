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

</head>
<body>
<a href="myacc" style='text-decoration:none;'class="previous">&laquo; Back</a>
<a href="frontp" style='text-decoration:none;' class="next">Home &raquo;</a>
<br><br>
<div align="center" class="satta_2"><br>
	<div style="color: black;"><span style="color: #F0FFF0;">
<span style="font-family: Calibri;">
<span style="font-size: x-large;">
<strong><em><big><bdo dir="ltr">Withdraw-Deposit</bdo></big>
</em></strong></span></span></span></div>
	<br>

	<?php $this->load->view('admin/include/messages.php');?>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-sm-12">

					<!-- general form elements -->
					<div align="center" style="height: 250px">
						<div class="card card-primary" >
							<div class="card-header text-center padding-bottom-25 padding-top-30 " >
								<h3>Awesome.</h3>
								<p >You're ready to one stem away from complete your deposit with sattamatkaonlineplay.com </p>
							</div>
							<div class="card-body text-center bg-info padding-top-60 padding-bottom-60" >
															<form action="<?=base_url().'payment_web'?>" method="POST">
															<script src="https://checkout.razorpay.com/v1/checkout.js"
																	data-key="rzp_test_2JFcdrnRAMyVK5"
																	data-amount="<?=$data['points'] * 100;?>"
																	data-buttontext="Pay <?=$data['points']?> INR"
																	data-name="<?=$user->user_username;?>"
																	data-description="Deposit money"
																	data-image="https://dashboard.razorpay.com/img/logo_full.png"
																	data-prefill.name="<?=$user->user_username;?>"
																	data-prefill.email="<?=$user->user_email;?>"
																	data-prefill.contact="<?=$user->user_mobile;?>"
																	data-notes.shopping_order_id="<?=uniqid(time())?>"
																	data-order_id="<?php echo $order->id;?>"
																	data-theme.color="#f5de37">
															</script>
															<input type="hidden" custom="Hidden Element" value="<?=$user->user_id;?>" name="userid">
																</form>
							</div>
						</div>

					</div>
				</div>
			</div>

			<br><br>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

			<script>

				$(function(){
					$('#userAmnt , #selected').on('keyup , change' , function(){

						var point =  $('#userAmnt').val();
						var wallet = $('#walletAmnt').val();
						var selected = $('#selected').val();

						if(parseFloat(point) > parseFloat(wallet) && selected === 'WITHDRAW') {
							alert('You dont have enough amount for withdrawal');
							$('#userAmnt').val('');
						}

					})

					$('.select2').on('change' , function (e){
						var value = $('.select2').val();
						if(value === 'DEPOSIT') {
							$('#typemethod').html('<td><label>Payment Method :</label></td>  ' +
								'<td><select class="form-control select3" style="width: 100%;" name="method" required>' +
								'<option value="">Select</option>' +
								'<option>Online</option>' +
								'<option>Bank Transfer</option>' +
								'<option>Paytm</option>' +
								'<option>Airtel Money</option>' +
								'<option>Bhim</option>' +
								'</select></td>');
						}
						else{
							$('#typemethod').html('');
						}
					})

					// $('body').on('change' , '.select3' ,  function (e){
					//
					// })
				})
			</script>
