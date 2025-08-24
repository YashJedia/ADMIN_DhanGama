<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Web extends CI_controller{

	public function __construct() {
		parent::__construct();
		$this->load->library('upload');

		$this->load->model('Web_model');

		$this->load->model('ApiModel', 'apiModel');

		$this->load->model('Admin_model','adminModel');

		
		// if(!$this->session->has_userdata('is_admin_login')){
		//     redirect(base_url('admin-login'), 'refresh');
		// }
	}

	public function index(){

		$games = $this->adminModel->getAllGames();
		$gameType = $this->adminModel->getGameType();

		$this->load->view('web/frontp',compact('games','gameType'));
	}


	public function frontp(){
		$games = $this->adminModel->getAllGames();
		$gameType = $this->adminModel->getGameType();
		$this->load->view('web/frontp' , compact('games' , 'gameType'));
	}

	public function game_play($id){

		$gameDetails = $this->adminModel->getGameTypeDetail($id);
		$numbers = $this->adminModel->getBetNumber($id);
		$game     = $this->adminModel->getAllGames();
		$this->load->view('web/single',compact('numbers' , 'gameDetails' , 'game' , 'id'));
	}

	public function jodi(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }

		$this->load->view('web/jodi');
	}
	public function single_patti(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/single_patti');
	}
	public function double_patti(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/double_patti');
	}
	public function triple_patti(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/triple_patti');
	}
	public function halfsangam($id){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$gameDetails = $this->adminModel->getGameTypeDetail($id);
		$game     = $this->adminModel->getAllGames();

		$this->load->view('web/halfsangam' , compact('game' , 'gameDetails' , 'id'));
	}
	public function fullsangam($id){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$gameDetails = $this->adminModel->getGameTypeDetail($id);
		$game     = $this->adminModel->getAllGames();
		$this->load->view('web/fullsangam' , compact('game' , 'gameDetails' , 'id'));
	}
	public function how(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/how');
	}
	public function kalyanstarline(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/kalyanstarline');
	}
	public function mumbaistarline(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/mumbaistarline');
	}
	public function gamerate(){
//        if(!$this->session->has_userdata('login')){
//            redirect(base_url('login'), 'refresh');
//         }
		$this->load->view('web/gamerate');
	}

	// @model for myacc details

	public function myacc()
	{
         if(!$this->session->has_userdata('login')){
        redirect(base_url('login'), 'refresh');
     }
		$this->load->view('web/myacc');
	}


	public function my_bids(){
		if(!$this->session->has_userdata('login')){
			redirect(base_url('login'), 'refresh');
		}
		$id = $_SESSION['user'];

		$result = $this->Web_model->get_my_bid($id);

		$this->load->view('web/my_bid', compact('result'));
	}

	// @model for profile details

	public function profile()
	{
          if(!$this->session->has_userdata('login')){
            redirect(base_url('login'), 'refresh');
         }
        else {
		$id = $_SESSION['user'];

		$result['data'] = $this->Web_model->fetch_single_data_game($id);

		$this->load->view('web/profile', $result);
        }
	}

	// @model for transaction details

	public function transaction($id = NULL)
	{
        if(!$this->session->has_userdata('login')){
            redirect(base_url('login'), 'refresh');
         }
         else {
		$id = $this->session->userdata('user');

		$result['fetch'] = $this->Web_model->fetch_single_trans_data($id);
		$this->load->view('web/transaction' , $result);
         }
	}

	public function change()
	{
		if(!$this->session->has_userdata('login')){
			redirect(base_url('login'), 'refresh');
		}
		else {
			$this->load->view('web/change');
		}

	}

	public function withdrawdepo(){
        if(!$this->session->has_userdata('login')){
            redirect(base_url('login'), 'refresh');
         }
         else {
		$id = $_SESSION['user'];

		$result['data'] = $this->Web_model->fetch_single_data_game($id);
		$this->load->view('web/withdrawdepo' , $result);
         }
	}

	//  login procedure

	public function login(){

		// $password = "password";
		// $hash = password_hash("password", PASSWORD_BCRYPT);
		// if (password_verify($password, $hash)) {
				
		// 		echo "yes";	
		// 	}
		// 	else
		// 	{
		// 		echo "no";
		// 	}
		// 	exit;

		$this->load->view('web/login');
	}

	public function register(){

		$this->load->view('web/register');
	}

	public function register_enter(){
		$this->load->model('Register_model');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirmpassword', 'Repeat Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata('error', $data['errors']);
			redirect(base_url('register'),'refresh');

		}
		else{
			$datas = array(
				'user_username ' => $this->input->post('username'),
				'user_password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
				'user_mobile' => $this->input->post('mobile'),
				'user_email' => $this->input->post('email'),

			);

			$result = $this->Register_model->register($datas);

			if($result) {
				$data = array(
					'success' => 'Registered successfully!!'
				);
				$this->session->set_flashdata('success', $data['success']);
				redirect(base_url().'login');
			}

			else{
				$data = array(
					'error' => 'Something went wrong!!'
				);
				$this->session->set_flashdata('errors', $data['error']);
				redirect(base_url().'register');
			}
		}
	}


	public function login_enter(){
		$this->load->model('Web_model');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata('error', $data['errors']);
			redirect(base_url('login'),'refresh');

		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->Web_model->login($username , $password);

		if($result) {
			$this->session->set_userdata(array('login' => true , 'user' => $result->user_id , 'users' => $result));
			redirect(base_url('frontp'), 'refresh');
		}
		else{
			$this->session->set_flashdata('error', 'Invalid Email or Password!');
			redirect(base_url('frontp'));
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('errors', 'Logged out, bay!');
		redirect(base_url('frontp'),'refresh');
	}

	public function change_pass()
	{
		if($this->input->post('change_pass'))
		{
			$old_pass=$this->input->post('old_pass');
			$new_pass = $this->input->post('new_pass');
			$confirm_pass=$this->input->post('confirm_pass');
			$session_id = $this->session->userdata('user');
			$que = $this->db->query("select * from users where user_id = '$session_id'");
			$row=$que->row();
			if(password_verify($old_pass, $row->user_password) && $new_pass === $confirm_pass){
				$this->Web_model->change_pass($session_id, password_hash($new_pass, PASSWORD_BCRYPT));
				$this->session->set_flashdata('success', 'Changed !');
				redirect(base_url('change'));
			}
			else{
				$this->session->set_flashdata('errors', 'Something miss matched !');
				redirect(base_url('change'));
			}
		}
	}

	public function insert_withdepo(){
		$this->form_validation->set_rules('points', 'Points', 'trim|required');
		$this->form_validation->set_rules('txn_type', 'Transaction Type', 'trim|required');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('errors', strip_tags(validation_errors()));
			redirect(base_url('withdrawdepo'));
		} else {
			$userData = $this->Web_model->fetch_single_data_game($this->input->post('id'));

			if($userData->user_wallet < $this->input->post('points') && $this->input->post('txn_type') === 'WITHDRAW' && $this->input->post('points') > 0){
				$this->session->set_flashdata('errors', 'Wallet amount is not sufficient');
				redirect(base_url('withdrawdepo'));
			}
			else{

			if($this->input->post('txn_type') === 'DEPOSIT' && $this->input->post('method') === 'Online'){
				$result['data'] = $_POST;

				$result['user'] = $userData;

				$api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);

				$result['order']  = $api->order->create([
					'receipt' => rand(),
					'amount'  => $this->input->post('points') * 100,
					'currency' => 'INR'
				]);


				$this->apiModel->payment_save_web($result['order']->id);

				$this->session->set_userdata('razorpay_order_id' , $result['order']->id);

				$this->load->view('web/payment_pay' , $result);
			}
			else {

				if ($this->input->post('points') < $this->input->post('walletAmnt') && $this->input->post('txn_type') === 'WITHDRAW') {
					$datas = array(
						'txn_user_id ' => $this->input->post('id'),
						'txn_req_amt' => $this->input->post('points'),
						'txn_type' => $this->input->post('txn_type'),
						'txn_details' => "Requested by User"
					);

					$result = $this->Web_model->create_withdepo($datas);
					$this->session->set_flashdata('success', 'Your request is submitted successfully!!');
					redirect(base_url('withdrawdepo'));
				} elseif ($this->input->post('txn_type') === 'DEPOSIT') {
					$datas = array(
						'txn_user_id ' => $this->input->post('id'),
						'txn_req_amt' => $this->input->post('points'),
						'txn_type' => $this->input->post('txn_type'),
						'txn_details' => "Requested by User",
						'payment_method' => $this->input->post('method'),
					);

					$result = $this->Web_model->create_withdepo($datas);
					$this->session->set_flashdata('success', 'Your request is submitted successfully!!');
					redirect(base_url('withdrawdepo'));
				} else {
					$this->session->set_flashdata('errors', 'You do not have sufficient account balance !');
					redirect(base_url('withdrawdepo'));
				}
			}
			}
		}
	}

	/**
	 * @metho use for save bid data
	 */

	public function save_bid_date(){
		if($this->input->post('game_name') || $this->input->post('bid_types') || $this->input->post('user_id') ) {
			$check = $this->Web_model->fetch_single_data_game($this->input->post('user_id'));
			if($this->input->post('total') < $check->user_wallet) {
				$result = $this->Web_model->save_user_bid();
				if ($result) {
					$this->Web_model->wallet_update($this->input->post('user_id') , $this->input->post('total'));
					$success = array('success' => true, 'status' => 'success', 'msg' => 'Your bid successfully submitted, Please wait for result');
					echo json_encode($success);
					exit();
				} else {

					$error = array('success' => false, 'status' => 'success', 'msg' => 'There is the problem, please contact with support');
					echo json_encode($error);
					exit();
				}
			}
			else{
				$error = array('success' => false, 'status' => 'success', 'msg' => 'Sorry you dont have enough wallet amount, please top-up your wallet');
				echo json_encode($error);
				exit();
			}

		}
		else{
			$results =  array('success' => false, 'status' => 'method must be post', 'msg' => 'error');
			echo json_encode($results);
		}
	}

	/**
	 * @metho use for save bid data
	 */

	public function save_bid_halfsanagam(){
		if($this->input->post('game_name') || $this->input->post('bid_types') || $this->input->post('user_id') ) {

			$check = $this->Web_model->fetch_single_data_game($this->input->post('user_id'));
			if($this->input->post('total_amount') < $check->user_wallet) {
				$result = $this->Web_model->save_user_bid_hf();
				if ($result) {
					$this->Web_model->wallet_update($this->input->post('user_id') , $this->input->post('total_amount'));
					$success = array('success' => true, 'status' => 'success', 'msg' => 'Your bid successfully submitted, Please wait for result');
					echo json_encode($success);
					exit();
				} else {

					$error = array('success' => false, 'status' => 'success', 'msg' => 'There is the problem, please contact with support');
					echo json_encode($error);
					exit();
				}
			}
			else{
				$error = array('success' => false, 'status' => 'success', 'msg' => 'Sorry you dont have enough wallet amount, please top-up your wallet');
				echo json_encode($error);
				exit();
			}

		}
		else{
			$results =  array('success' => false, 'status' => 'method must be post', 'msg' => 'error');
			echo json_encode($results);
		}
	}


	/**
	 * @metho use for save bid data
	 */

	public function save_bid_fullsanagam(){
		if($this->input->post('game_name') || $this->input->post('bid_types') || $this->input->post('user_id') ) {

			$check = $this->Web_model->fetch_single_data_game($this->input->post('user_id'));

			if($this->input->post('total_amount') < $check->user_wallet) {
				$result = $this->Web_model->save_user_bid_hf();
				if ($result) {
					$this->Web_model->wallet_update($this->input->post('user_id') , $this->input->post('total_amount'));
					$success = array('success' => true, 'status' => 'success', 'msg' => 'Your bid successfully submitted, Please wait for result');
					echo json_encode($success);
					exit();
				} else {

					$error = array('success' => false, 'status' => 'success', 'msg' => 'There is the problem, please contact with support');
					echo json_encode($error);
					exit();
				}
			}
			else{
				$error = array('success' => false, 'status' => 'success', 'msg' => 'Sorry you dont have enough wallet amount, please top-up your wallet');
				echo json_encode($error);
				exit();
			}

		}
		else{
			$results =  array('success' => false, 'status' => 'method must be post', 'msg' => 'error');
			echo json_encode($results);
		}
	}
	
	public function privacy_policy(){
	    $games = $this->adminModel->getAllGames();
		$gameType = $this->adminModel->getGameType();
	 $this->load->view('web/privacy_policy.php' , compact('games' , 'gameType'));   
	}

	public function payment(){
	
		$api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);

		$resp = $api->order->create(array('receipt' => 'Order Id Generate', 'amount' => 100, 'currency' => 'INR')); 
		
		$output['orderId'] = $resp['id'];
		$output['amount'] = $resp['amount'];
		$output['created_at'] = $resp['created_at'];

		$this->load->view('web/razorpay' , compact('output'));
	}

}
