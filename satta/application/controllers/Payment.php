<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once(APPPATH."libraries/razorpay-php/Razorpay.php");
// use Razorpay\Api\Api;
// use Razorpay\Api\Errors\SignatureVerificationError;

class Payment extends CI_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel', 'apiModel');
		$this->load->model('Web_model');
	}

	/**
	 * @param $status
	 * @param string $message
	 * @param array $data
	 */

	private function sendResponse($status, $message = '', $data = [])
	{
		header('Content-Type: application/json');
		echo json_encode([
			'status' => $status,
			'data' => $data,
			'message' => $message
		]);
		exit();
	}

	/**
	 * @param $type
	 * @param string $url
	 * @return bool|void
	 */

	private function request($type, $url = '')
	{
		if ($_SERVER['REQUEST_METHOD'] !== $type) {
			return $this->sendResponse(false, "Cannot " . $_SERVER['REQUEST_METHOD'] .' '. $url);
		}
		return true;
	}

	public function payment_start(){
		$this->request('POST', '/api/payment_start');
		$this->form_validation->set_rules('user_id' , 'User Id', 'trim|numeric');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {

			   // Razorpay code commented out above
			   /*
			   $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
			   $order  = $api->order->create([
				   'receipt' => rand(),
				   'amount'  => $this->input->post('amount') * 100,
				   'currency' => 'INR'
			   ]);
			   $result = $this->apiModel->payment_save($order->id);
			   if($result){
				   return $this->sendResponse(true, SUCCESS_MSG, [
					   'msg'       => 'Success',
					   'order_id'  => $order->id
				   ]);
			   }
			   else{
				   return $this->sendResponse(false, ERROR_MSG, [
					   'msg' => 'There is the problem, please contact with support'
				   ]);
				   exit();
			   }
			   */
			   return $this->sendResponse(false, 'Razorpay integration is disabled. Use /api/payu_payment_start for PayU payments.');
		}
	}

	/**
	 * @method use for save payment data
	 */
		// public function payment_success(){
		//     if(!empty($_POST['shopping_order_id']) && !empty($_POST['razorpay_payment_id'])){
		//         $result = $this->apiModel->get_payment_details($_POST['shopping_order_id'] , 'SUCCESS');
		//         if($result){
		//             redirect('https://theacademiz.com/sattabackend/api/payment_confirm?status=success');
		//         }
		//         else{
		//             redirect('https://theacademiz.com/sattabackend/api/payment_confirm?status=failed');
		//             exit();
		//         }
		//     }
		//     else{
		//         redirect('https://theacademiz.com/sattabackend/api/payment_confirm?status=failed');
		//         exit();
		//     }
		// }

	/**
	 * @success
	 */
	public function confirm_payment(){
		echo '<h1>redirecting...</h1>';
	}


	/**
	 * @payment accept by web
	 */
	   // public function payment_submit(){
	   //     $success = true;
	   //     $error = "Payment Failed";
	   //     if (empty($_POST['razorpay_payment_id']) === false)
	   //     {
	   //         $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
	   //         try
	   //         {
	   //             $attributes = array(
	   //                 'razorpay_order_id' => $_SESSION['razorpay_order_id'],
	   //                 'razorpay_payment_id' => $_POST['razorpay_payment_id'],
	   //                 'razorpay_signature' => $_POST['razorpay_signature']
	   //             );
	   //             $api->utility->verifyPaymentSignature($attributes);
	   //         }
	   //         catch(SignatureVerificationError $e)
	   //         {
	   //             $success = false;
	   //             $error = 'Razorpay Error : ' . $e->getMessage();
	   //         }
	   //     }
	   //     if ($success === true)
	   //     {
	   //         $result  = $this->apiModel->get_payment_details($_POST['razorpay_order_id'] , 'SUCCESS');
	   //         $results['order_id'] = $_POST['razorpay_order_id'];
	   //         if($result) {
	   //             $results['status'] = '1';
	   //             $this->load->view('web/success.php' , $results);
	   //         }
	   //         else {
	   //             $results['status'] = '2';
	   //             $this->load->view('web/success.php' , $results);
	   //         }
	   //     }
	   //     else
	   //     {
	   //         $results['status'] = '0';
	   //         $this->load->view('web/success.php' , $results);
	   //     }
	   // }

	   /**
		* PayU UPI Intent Payment Start
		* Endpoint: /api/payu_payment_start
		* Required: PayU credentials (merchant key, salt, etc.)
		*
		* This is a basic example. You must replace the placeholders with your actual PayU credentials and logic.
		*
		* For production, use PayU's official documentation: https://devguide.payu.in/upi-intent/
		*/
	   public function payu_payment_start() {
		   $this->request('POST', '/api/payu_payment_start');
		   $this->form_validation->set_rules('user_id' , 'User Id', 'trim|numeric');
		   $this->form_validation->set_rules('amount', 'Amount', 'trim|required');

		   if ($this->form_validation->run() === false) {
			   return $this->sendResponse(false, strip_tags(validation_errors()));
		   }

		   // TODO: Replace with your actual PayU credentials
		   $payu_merchant_key = 'YOUR_PAYU_MERCHANT_KEY';
		   $payu_salt = 'YOUR_PAYU_SALT';
		   $payu_base_url = 'https://secure.payu.in'; // or test URL: https://test.payu.in

		   $amount = $this->input->post('amount');
		   $user_id = $this->input->post('user_id');
		   $txnid = uniqid('txn_');
		   $productinfo = 'Add Points';
		   $firstname = 'User'; // You can fetch from DB if needed
		   $email = 'user@example.com'; // You can fetch from DB if needed
		   $phone = '9999999999'; // You can fetch from DB if needed

		   // UPI Intent URL format for PayU
		   $payee_vpa = 'YOUR_MERCHANT_VPA@payu'; // Replace with your VPA
		   $upi_url = "upi://pay?pa={$payee_vpa}&pn=PayU%20Merchant&tr={$txnid}&am={$amount}&cu=INR";

		   // Save transaction in DB if needed
		   // $this->apiModel->payment_save($txnid);

		   return $this->sendResponse(true, 'PayU UPI intent generated', [
			   'upi_url' => $upi_url,
			   'txnid' => $txnid
		   ]);
	   }


}
