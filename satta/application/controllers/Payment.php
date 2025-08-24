<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

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

			$api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);

			$order  = $api->order->create([
				'receipt' => rand(),
				'amount'  => $this->input->post('amount') * 100,
				'currency' => 'INR'
			]);

			$result = $this->apiModel->payment_save($order->id);

			if($result){
				return $this->sendResponse(true, SUCCESS_MSG, [
					'msg' 		=> 'Success',
					'order_id'  => $order->id
				]);
			}
			else{
				return $this->sendResponse(false, ERROR_MSG, [
					'msg' => 'There is the problem, please contact with support'
				]);
				exit();
			}
		}
	}

	/**
	 * @method use for save payment data
	 */
	public function payment_success(){
		if(!empty($_POST['shopping_order_id']) && !empty($_POST['razorpay_payment_id'])){
			$result = $this->apiModel->get_payment_details($_POST['shopping_order_id'] , 'SUCCESS');
			if($result){

				redirect('https://theacademiz.com/sattabackend/api/payment_confirm?status=success');

			}
			else{
				redirect('https://theacademiz.com/sattabackend/api/payment_confirm?status=failed');
				exit();
			}

		}
		else{
			redirect('https://theacademiz.com/sattabackend/api/payment_confirm?status=failed');
			exit();
		}
	}

	/**
	 * @success
	 */
	public function confirm_payment(){
		echo '<h1>redirecting...</h1>';
	}


	/**
	 * @payment accept by web
	 */
	public function payment_submit(){

		$success = true;

		$error = "Payment Failed";


		if (empty($_POST['razorpay_payment_id']) === false)
		{
			$api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);

			try
			{
				// Please note that the razorpay order ID must
				// come from a trusted source (session here, but
				// could be database or something else)
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);

				$api->utility->verifyPaymentSignature($attributes);
			}
			catch(SignatureVerificationError $e)
			{
				$success = false;
				$error = 'Razorpay Error : ' . $e->getMessage();
			}
		}

		if ($success === true)
		{

			$result  = $this->apiModel->get_payment_details($_POST['razorpay_order_id'] , 'SUCCESS');

			$results['order_id'] = $_POST['razorpay_order_id'];
			if($result) {
				$results['status'] = '1';
				$this->load->view('web/success.php' , $results);
//				$html = "<p>Your payment was successful</p>
//             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
			}
			else {
				$results['status'] = '2';
				$this->load->view('web/success.php' , $results);
			}
		}
		else
		{
			$results['status'] = '0';
			$this->load->view('web/success.php' , $results);
		}


	}


}
