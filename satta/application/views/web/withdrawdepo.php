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
            <div align="center">
            <div class="card card-primary">
            <form action="<?=base_url('withdepo')?>" method="POST">
              <!-- /.card-header -->
              <!-- form start -->
              <input  type="hidden" name="id" value="<?php echo $data->user_id;?>">

              <table>
              <tr>
              <td><label for="exampleInputEmail1">Username :</label></td>
              <td><input type="username" value="<?php echo $data->user_username;?>" class="form-control" readonly id="exampleInputEmail1"></td>
              </tr>
                 
              <tr>
                 <td><label>Transaction Type :</label></td>
                  <td><select class="form-control select2" style="width: 100%;" id="selected" name="txn_type" required>
                    <option >Select Type</option>
                    <option value="DEPOSIT">Deposit</option>
                    <option value="WITHDRAW">Withdraw</option>
                  </select></td>
               </tr>
				  <tr id="typemethod">

				  </tr>
                
                  <tr>  
                    <td><label for="exampleInputPassword1">Available Balance for Withdraw :</label></td>
                    <td><input type="text" id="walletAmnt" name="walletAmnt" value="<?php echo $data->user_wallet;?>" class="form-control" readonly></td>
                  </tr>  
                  
                  <tr>
                    <td><label for="exampleInputPassword1">Points :</label></td>
                    <td><input type="number" min="1" class="form-control"  id="userAmnt" name="points" required></td>
                  </tr>
                  
                 </table> 
                 <br>
                 <br>
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button class= "button-color" type="submit" class="btn btn-primary" >Submit</button>
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
						// '<option>Online</option>' +
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
