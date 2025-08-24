


<!DOCTYPE html>
<html lang="en">
   <head>
      <title>online play matka ,play matka online ,online matka play,online matka, matka online, online matka play, matka play, online Ashapura, Ashapura online, Ashapura online play, Ashapura online play , Ashapura fix game ,Ashapura fix jodi ,Ashapura fast Result ,Ashapura sure number, Ashapura today game,Ashapura fix  Registeration</title>
      <meta name="description" content="MagicMatka">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>
    
     <h1 class="loader">Processing....</h1>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script>
         var options = {
             "key": "<?= RAZOR_KEY_ID?>", // Enter the Key ID generated from the Dashboard
             "amount": "<?= $output['amount']?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
             "currency": "INR",
             "name": "Ashapura",
             "description": "Wallet Deposit",
             "order_id": "<?= $output['orderId']?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
             "handler": function (response){
                 alert(response.razorpay_payment_id);
                 alert(response.razorpay_order_id);
                 alert(response.razorpay_signature)
                 "modal": {
                    "ondismiss": function(){
                        alert('cancelled')
                    }
                }
             },
             "prefill": {
                 "name": "Gaurav Kumar",
                 "email": "gaurav.kumar@example.com",
                 "contact": "9999999999"
             },
         };
         var rzp1 = new Razorpay(options);
         rzp1.on('payment.failed', function (response){
                 alert(response.error.code);
                 alert(response.error.description);
                 alert(response.error.source);
                 alert(response.error.step);
                 alert(response.error.reason);
                 alert(response.error.metadata.order_id);
                 alert(response.error.metadata.payment_id);
         });

        $(function(){
            alert('open')
            rzp1.open();
        })
      </script>
