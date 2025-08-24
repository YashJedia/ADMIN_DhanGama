<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/kolkata');

class Admin extends CI_controller
{
    
    

	public function __construct()
	{
	    
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Admin_model', 'adminModel');
		if (!$this->session->has_userdata('is_admin_login')) {
			redirect(base_url('admin-login'), 'refresh');
		}
		$this->deposit = $this->db->from('wallet_transactions')->where(['txn_type' => 'DEPOSIT', 'txn_status' => 'PENDING'])->count_all_results();
		$this->withdrawl = $this->db->from('wallet_transactions')->where(['txn_type' => 'WITHDRAW', 'txn_status' => 'PENDING'])->count_all_results();
	}

	public function dashboard()
	{

		$this->load->model('Admin_model', 'adminModel');

		$newUser = count($this->adminModel->getNewUser());
		$totalUsers = count($this->adminModel->getAllUserList());
		$totalDebit = $this->adminModel->getTotalDebit();
		$totalConfirmDeposit = $this->adminModel->getTotalConfirmDeposit();
		$todayConfirmDeposit = $this->adminModel->getTodayConfirmDeposit();
		$todayWithdrawalRequest = $this->adminModel->todayWithdrawalRequest();
		$todayConfirmWithdrawalRequest = $this->adminModel->todayConfirmWithdrawalRequest();
		$totalWithdrawalRequest = $this->adminModel->totalWithdrawalRequest();
		$totalConfirmWithdrawalRequest = $this->adminModel->totalConfirmWithdrawalRequest();

		$type = $this->session->get_userdata('admin_type')['admin_type'];
		if ($type === 'SUPERADMIN') {
			$this->load->view('admin/dashboard', compact('totalUsers', 'newUser', 'totalDebit', 'totalConfirmDeposit', 'todayConfirmDeposit', 'todayWithdrawalRequest', 'todayConfirmWithdrawalRequest', 'totalWithdrawalRequest', 'totalConfirmWithdrawalRequest'));
		} elseif ($type === 'ADMIN') {
			redirect(base_url('subadmin-dashboard'), 'refresh');
		}


	}

	/**
	 * @method use to logout
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('errors', 'Logged out, bay!');
		redirect(base_url(''), 'refresh');
	}

	public function loginsuccess()
	{

		$this->load->view('admin/loginsuccess');
	}

	public function simple()
	{
		$this->load->view('admin/simple');
	}

	public function data()
	{
		$this->load->view('admin/data');
	}

	public function jsgrid()
	{
		$this->load->view('admin/jsgrid');
	}


	public function add_fund()
	{
		// P Starts
		$depositedTransaction = $this->adminModel->depositedTransaction();
		// echo '<pre>';
		// print_r($depositedTransaction);
		// exit();
		$this->load->view('admin/add_fund', compact('depositedTransaction'));
		// P Ends
	}

//Add Result and Game Result List of Current date
	public function add_result()
	{
		$this->load->model('Admin_model', 'adminModel');
		$games = $this->adminModel->getAllGames();
		$result = $this->adminModel->get_result();

		$this->load->view('admin/add_result', compact('games', 'result'));
	}

	/**
	 * @param $id
	 * @method use for delete result
	 */
	public function delete_result($id)
	{

		$result = $this->adminModel->delete_result($id);
		if ($result) {
			$this->session->set_flashdata('success', "Game Bid Number Deleted Successfully");
			redirect(base_url('admin-add_result'), 'refresh');
		} else {
			$this->session->set_flashdata('error', "Something went wrong");
			redirect(base_url('admin-add_result'), 'refresh');
		}

	}


	/**
	 * @metho use for show all bids
	 */
	public function all_bid()
	{
		$all_bid_data = $this->adminModel->getAllBidData();
		// echo '<pre>';
		// print_r($all_bid_data);
		// exit();
		$this->load->view('admin/all_bid', compact('all_bid_data'));
	}

	public function bid_type()
	{
		$this->load->view('admin/bid_type');
	}

//Games List
	public function create_game()
	{
		$this->load->model('Admin_model', 'adminModel');

		$games = $this->adminModel->getAllGames();
		$this->load->view('admin/create_game', compact('games'));
	}

	public function sended_amt()
	{
		$this->load->view('admin/sended_amt');
	}

	public function withdraw_fund()
	{
		$withdrawalTransaction = $this->adminModel->withdrawalTransaction();
		$this->load->view('admin/withdraw_fund', compact('withdrawalTransaction'));
	}

	public function winner_res()
	{
		$result = $this->adminModel->getWinnerBidData();

		$this->load->view('admin/winner_res', compact('result'));
	}

	public function users_list()
	{
		$this->load->model('Admin_model', 'adminModel');

		$users = $this->adminModel->getAllUserList();
		$this->load->view('admin/users_list', compact('users'));
	}

	public function add_game()
	{
		$this->load->view('admin/add_game');
	}

//User Details by ID
	public function user_detail($user_id)
	{
		$this->load->model('Admin_model', 'adminModel');

		$this->form_validation->set_rules('user_address', 'Address', 'trim|required');
		$this->form_validation->set_rules('user_city', 'City', 'trim|required');
		$this->form_validation->set_rules('user_district', 'District', 'trim|required');
		$this->form_validation->set_rules('user_state', 'State', 'trim|required');
		$this->form_validation->set_rules('user_pincode', 'Pin-code', 'trim|required');
		$this->form_validation->set_rules('user_country', 'Country', 'trim|required');

		$this->form_validation->set_rules('user_mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');

		$this->session->set_userdata('user_datail', 'user_detail_page');

		if ($this->form_validation->run() === false) {

			if (validation_errors()) {
				$this->session->set_flashdata('error', validation_errors());
			}


			$userDetail = $this->adminModel->getUserDetailByUserId($user_id);

			$this->load->view('admin/user_detail', compact('userDetail'));
		} else {
			$result = $this->adminModel->updateUserDetails($user_id);

			if ($result) {
				$this->session->set_flashdata('success', "Successfully Updated");
			} else {
				$this->session->set_flashdata('error', "You have made no changes");
			}

			redirect(base_url('admin-user_detail/' . $user_id));


		}

	}

	public function create_bid()
	{
		$this->load->view('admin/create_bid');
	}

//user credit transactions
	public function credit($user_id)
	{
		$this->load->model('Admin_model', 'adminModel');
		$userCredit = $this->adminModel->getUserCreditTransactions($user_id);
		$this->load->view('admin/credit', compact('userCredit'));
	}

	public function debit($user_id)
	{
		$this->load->model('Admin_model', 'adminModel');
		$userDebit = $this->adminModel->getUserDebitTransactions($user_id);
		$this->load->view('admin/debit', compact('userDebit'));
	}

	public function create_game2()
	{
		$this->load->view('admin/create_game2');
	}

	public function insert_game()
	{

		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[add_game.title]');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata('error', $data['errors']);
			redirect(base_url('admin-create_game2'), 'refresh');

		}

		$this->load->model('Admin_model', 'adminModel');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2048000';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['max_width'] = '*';
		$config['max_height'] = '*';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('choose_file')) {
			$data = array('upload_data' => $this->upload->data());
			$file = 'uploads/' . $data['upload_data']['file_name'];
		} else {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			$file = '';
		}


		if (isset($_POST['Sunday'])) {
			$sunday = '1';
			$sundayOpenTime = $this->input->post('sunday_open');
			$sundayCloseTime = $this->input->post('sunday_close');
		} else {
			$sunday = '0';
			$sundayOpenTime = null;
			$sundayCloseTime = null;
		}


		if (isset($_POST['Monday'])) {
			$monday = '1';
			$mondayOpenTime = $this->input->post('monday_open');
			$mondayCloseTime = $this->input->post('monday_close');
		} else {
			$monday = '0';
			$mondayOpenTime = null;
			$mondayCloseTime = null;
		}


		if (isset($_POST['Tuesday'])) {
			$tuesday = '1';
			$tuesdayOpenTime = $this->input->post('tuesday_open');
			$tuesdayCloseTime = $this->input->post('tuesday_close');
		} else {
			$tuesday = '0';
			$tuesdayOpenTime = null;
			$tuesdayCloseTime = null;
		}


		if (isset($_POST['Wednesday'])) {
			$wednesday = '1';
			$wednesdayOpenTime = $this->input->post('wednesday_open');
			$wednesdayCloseTime = $this->input->post('wednesday_close');
		} else {
			$wednesday = '0';
			$wednesdayOpenTime = null;
			$wednesdayCloseTime = null;
		}


		if (isset($_POST['Thursday'])) {
			$thursday = '1';
			$thursdayOpenTime = $this->input->post('thursday_open');
			$thursdayCloseTime = $this->input->post('thursday_close');
		} else {
			$thursday = '0';
			$thursdayOpenTime = null;
			$thursdayCloseTime = null;
		}


		if (isset($_POST['Friday'])) {
			$friday = '1';
			$fridayOpenTime = $this->input->post('friday_open');
			$fridayCloseTime = $this->input->post('friday_close');
		} else {
			$friday = '0';
			$fridayOpenTime = null;
			$fridayCloseTime = null;
		}


		if (isset($_POST['Saturday'])) {
			$saturday = '1';
			$saturdayOpenTime = $this->input->post('saturday_open');
			$saturdayCloseTime = $this->input->post('saturday_close');
		} else {
			$saturday = '0';
			$saturdayOpenTime = null;
			$saturdayCloseTime = null;
		}


		$datas = array(
			'title' => $this->input->post('title'),
			'file' => $file,
			'sunday' => $sunday,
			'sunday_start_time' => $sundayOpenTime,
			'sunday_close_time' => $sundayCloseTime,
			'monday' => $monday,
			'monday_start_time' => $mondayOpenTime,
			'monday_close_time' => $mondayCloseTime,
			'tuesday' => $tuesday,
			'tuesday_start_time' => $tuesdayOpenTime,
			'tuesday_close_time' => $tuesdayCloseTime,
			'wednesday' => $wednesday,
			'wednesday_start_time' => $wednesdayOpenTime,
			'wednesday_close_time' => $wednesdayCloseTime,
			'thursday' => $thursday,
			'thursday_start_time' => $thursdayOpenTime,
			'thursday_close_time' => $thursdayCloseTime,
			'friday' => $friday,
			'friday_start_time' => $fridayOpenTime,
			'friday_close_time' => $fridayCloseTime,
			'saturday' => $saturday,
			'saturday_start_time' => $saturdayOpenTime,
			'saturday_close_time' => $saturdayCloseTime,

		);

		$result = $this->adminModel->create_game($datas);

		if ($result) {
			$data = array(
				'success' => 'Game Created !'
			);
			$this->session->set_flashdata('success', $data['success']);
			redirect(base_url() . 'admin-create_game2');
		}

	}


	//Change user Status
	public function changeUserStatus($userid, $status)
	{
		$this->load->model('Admin_model', 'adminModel');
		$result = $this->adminModel->changeUserStatus($userid, $status);

		if ($result) {
			$this->session->set_flashdata('success', "User Status Updated Successfully");

		} else {
			$this->session->set_flashdata('error', "Something went wrong, please try again");
		}


		redirect(base_url('admin-users-list'));
	}

	//Edit Game View
	public function editGame($game_id)
	{

		$this->load->model('Admin_model', 'adminModel');

		$game = $this->adminModel->getGameDetails($game_id);

		$this->load->view('admin/editGame', compact('game'));


	}

	//Update Game
	public function updateGame($game_id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata('error', $data['errors']);


		} else {
			$this->load->model('Admin_model', 'adminModel');

			$check = $this->adminModel->checkTitleExist($game_id, $this->input->post('title'));

			if ($check) {
				$this->session->set_flashdata('error', "Title already exist.");
				redirect(base_url('admin/edit-game/' . $game_id), 'refresh');

			}


			$old_image = $this->input->post('old_image');

			if ($_FILES['choose_file']['name']) {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048000';
				$config['overwrite'] = TRUE;
				$config['encrypt_name'] = TRUE;
				$config['max_width'] = '*';
				$config['max_height'] = '*';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('choose_file')) {
					$data = array('upload_data' => $this->upload->data());
					$file = 'uploads/' . $data['upload_data']['file_name'];
					@unlink($old_image);

				} else {

					$this->session->set_flashdata('error', $this->upload->display_errors());

					// $this->load->view('custom_view', $error);
				}
			} else {
				$file = $old_image;
			}


			if (isset($_POST['Sunday'])) {
				$sunday = '1';
				$sundayOpenTime = $this->input->post('sunday_open');
				$sundayCloseTime = $this->input->post('sunday_close');
			} else {
				$sunday = '0';
				$sundayOpenTime = null;
				$sundayCloseTime = null;
			}


			if (isset($_POST['Monday'])) {
				$monday = '1';
				$mondayOpenTime = $this->input->post('monday_open');
				$mondayCloseTime = $this->input->post('monday_close');
			} else {
				$monday = '0';
				$mondayOpenTime = null;
				$mondayCloseTime = null;
			}


			if (isset($_POST['Tuesday'])) {
				$tuesday = '1';
				$tuesdayOpenTime = $this->input->post('tuesday_open');
				$tuesdayCloseTime = $this->input->post('tuesday_close');
			} else {
				$tuesday = '0';
				$tuesdayOpenTime = null;
				$tuesdayCloseTime = null;
			}


			if (isset($_POST['Wednesday'])) {
				$wednesday = '1';
				$wednesdayOpenTime = $this->input->post('wednesday_open');
				$wednesdayCloseTime = $this->input->post('wednesday_close');
			} else {
				$wednesday = '0';
				$wednesdayOpenTime = null;
				$wednesdayCloseTime = null;
			}


			if (isset($_POST['Thursday'])) {
				$thursday = '1';
				$thursdayOpenTime = $this->input->post('thursday_open');
				$thursdayCloseTime = $this->input->post('thursday_close');
			} else {
				$thursday = '0';
				$thursdayOpenTime = null;
				$thursdayCloseTime = null;
			}


			if (isset($_POST['Friday'])) {
				$friday = '1';
				$fridayOpenTime = $this->input->post('friday_open');
				$fridayCloseTime = $this->input->post('friday_close');
			} else {
				$friday = '0';
				$fridayOpenTime = null;
				$fridayCloseTime = null;
			}


			if (isset($_POST['Saturday'])) {
				$saturday = '1';
				$saturdayOpenTime = $this->input->post('saturday_open');
				$saturdayCloseTime = $this->input->post('saturday_close');
			} else {
				$saturday = '0';
				$saturdayOpenTime = null;
				$saturdayCloseTime = null;
			}


			$datas = array(
				'title' => $this->input->post('title'),
				'file' => $file,
				'sunday' => $sunday,
				'sunday_start_time' => $sundayOpenTime,
				'sunday_close_time' => $sundayCloseTime,
				'monday' => $monday,
				'monday_start_time' => $mondayOpenTime,
				'monday_close_time' => $mondayCloseTime,
				'tuesday' => $tuesday,
				'tuesday_start_time' => $tuesdayOpenTime,
				'tuesday_close_time' => $tuesdayCloseTime,
				'wednesday' => $wednesday,
				'wednesday_start_time' => $wednesdayOpenTime,
				'wednesday_close_time' => $wednesdayCloseTime,
				'thursday' => $thursday,
				'thursday_start_time' => $thursdayOpenTime,
				'thursday_close_time' => $thursdayCloseTime,
				'friday' => $friday,
				'friday_start_time' => $fridayOpenTime,
				'friday_close_time' => $fridayCloseTime,
				'saturday' => $saturday,
				'saturday_start_time' => $saturdayOpenTime,
				'saturday_close_time' => $saturdayCloseTime,
			);

			$result = $this->adminModel->update_game($game_id, $datas);

			if ($result) {

				$this->session->set_flashdata('success', "Updated Successfully");

			} else {
				$this->session->set_flashdata('error', "You have not made any changes");
			}


		}

		redirect(base_url('admin/edit-game/' . $game_id), 'refresh');

	}

	//delete game
	public function deleteGame($game_id)
	{
		$this->load->model('Admin_model', 'adminModel');

		$res = $this->adminModel->deleteGame($game_id);

		if ($res) {
			$this->session->set_flashdata('success', "Game Deleted");
			$output['status'] = true;

		} else {
			$this->session->set_flashdata('success', "Something went wrong, please try again");
			$output['status'] = false;

		}

		echo json_encode($output);
		exit;
	}

	//Game Type
	public function gameType()
	{
		$this->load->model('Admin_model', 'adminModel');
		$gameType = $this->adminModel->getGameType();

		$this->load->view('admin/gameType', compact('gameType'));
	}

	//bet Numbers
	public function betNumbers($gameid)
	{

		$this->load->model('Admin_model', 'adminModel');

		$numbers = $this->adminModel->getBetNumber($gameid);
		$game = $this->adminModel->getGameTypeDetail($gameid);

		// print_r($game);
		// echo "<br>";
		// print_r($numbers);
		// exit;
		$this->load->view('admin/betNumbers', compact('numbers', 'game'));
	}

	//add game result
	public function addGameResult()
	{

		$this->form_validation->set_rules('game', 'Select Game', 'required');
//		$this->form_validation->set_rules('openpanel','Open Panel','trim|required|is_numeric');
		$this->form_validation->set_rules('jodi', 'Jodi', 'trim|required|is_numeric');

		if ($this->form_validation->run() === false) {
			$output['status'] = false;
			$output['msg'] = validation_errors();

		} else {

			$check = $this->adminModel->check_duplicate();
			if ($check <= 0) {

				$res = $this->adminModel->addGameResult();

				if ($res) {
					$game = $this->db->where('id', $this->input->post('game'))->get('add_game')->row('title');

					$users = $this->adminModel->getAllUserList();

					foreach ($users as $user) {

						$token = $user->user_fcm;
						$message = array(
							"title" => $game,
							"body" => $this->input->post('openpanel') . '-' . $this->input->post('jodi') . '-' . $this->input->post('closepanel'),
							'icon' => base_url('assets/dist/img/dpboss.jpeg'),
						);
						if (!empty($token)) {
//							$this->push_notification($token, $message);
							$this->db->insert('notification', array('token' => $token,'title' => $game, 'message' => $this->input->post('openpanel') . '-' . $this->input->post('jodi') . '-' . $this->input->post('closepanel'), 'status' => 'unread', 'userId' => $user->user_id));
						}
					}

					$this->session->set_flashdata('success', "Result Added Successfully");
					$output['status'] = true;

				} else {
					$output['status'] = false;
					$output['msg'] = "Something went wrong, please try again";
				}
			} else {
				$output['status'] = false;
				$output['msg'] = "Duplicate Entry";
			}
		}
		echo json_encode($output);
	}

	public function edit_result()
	{
		$this->form_validation->set_rules('game', 'Select Game', 'required');
		$this->form_validation->set_rules('openpanel', 'Open Panel', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jodi', 'Jodi', 'trim|required|is_numeric');

		if ($this->form_validation->run() === false) {
			$output['status'] = false;
			$output['msg'] = validation_errors();

		} else {
//			$check = $this->adminModel->check_duplicate();
//			if($check <= 0) {
			$res = $this->adminModel->editGameResult();

			if ($res) {

				$game = $this->db->where('id', $this->input->post('game'))->get('add_game')->row('title');

				$users = $this->adminModel->getAllUserList();

				foreach ($users as $user) {

					$token = $user->user_fcm;
					$message = array(
						"title" => $game,
						"body" => $this->input->post('openpanel') . '-' . $this->input->post('jodi') . '-' . $this->input->post('closepanel'),
						'icon' => base_url('assets/dist/img/dpboss.jpeg'),
					);
					if (!empty($token)) {
//						$this->push_notification($token, $message);
						$this->db->insert('notification', array('token' => $token,'title' => $game, 'message' => $this->input->post('openpanel') . '-' . $this->input->post('jodi') . '-' . $this->input->post('closepanel'), 'status' => 'unread', 'userId' => $user->user_id));
					}
				}

				$this->session->set_flashdata('success', "Result Added Successfully");
				$output['status'] = true;

			} else {
				$output['status'] = false;
				$output['msg'] = "Something went wrong, please try again";
			}
//			}
//			else{
//				$output['status'] = false;
//				$output['msg'] = "Duplicate Entry";
//			}
		}
		echo json_encode($output);

	}

	//add game type
	public function addGameType()
	{

		$this->form_validation->set_rules('game_name', 'Game Name', 'required');
		$this->form_validation->set_rules('game_min', 'Game Min Bet Price', 'trim|required|is_numeric');
		$this->form_validation->set_rules('game_rate', 'Game Win Price', 'trim|required|is_numeric');

		if ($this->form_validation->run() === false) {
			$output['status'] = false;
			$output['msg'] = validation_errors();

		} else {

			$this->load->model('Admin_model', 'adminModel');

			$res = $this->adminModel->addGameType();

			if ($res) {
				$this->session->set_flashdata('success', "Game Type Added Successfully");
				$output['status'] = true;
				$output['msg'] = "Game Type Added Successfully";

			} else {

				$output['status'] = false;
				$output['msg'] = "Something went wrong, please try again";

			}
		}

		echo json_encode($output);
	}

	//add game type
	public function addBetNumber()
	{


		$this->form_validation->set_rules('number', 'Number', 'required|is_numeric');


		if ($this->form_validation->run() === false) {
			$output['status'] = false;
			$output['msg'] = validation_errors();

		} else {

			$this->load->model('Admin_model', 'adminModel');


			$check = $this->adminModel->checkNumberExist($this->input->post('number', true), $this->input->post('gametype'));


			if ($check <= 0) {
				$res = $this->adminModel->addBetNumber();

				if ($res) {
					$this->session->set_flashdata('success', "Game Type Added Successfully");
					$output['status'] = true;
					$output['msg'] = "Game Type Added Successfully";

				} else {

					$output['status'] = false;
					$output['msg'] = "Something went wrong, please try again";

				}
			} else {
				$output['status'] = false;
				$output['msg'] = "Number Already Exist";
			}


		}

		echo json_encode($output);
	}

	//add game type
	public function editGameType()
	{


		$this->form_validation->set_rules('game_name', 'Game Name', 'required');
		$this->form_validation->set_rules('game_min', 'Game Min Bet Price', 'trim|required|is_numeric');
		$this->form_validation->set_rules('game_rate', 'Game Win Price', 'trim|required|is_numeric');

		if ($this->form_validation->run() === false) {
			$output['status'] = false;
			$output['msg'] = validation_errors();

		} else {

			$res = $this->adminModel->editGameType();

			if ($res) {
				$this->session->set_flashdata('success', "Game Type Updated Successfully");
				$output['status'] = true;
				$output['msg'] = "Game Type Updated Successfully";

			} else {

				$output['status'] = false;
				$output['msg'] = "Something went wrong, please try again";

			}
		}

		echo json_encode($output);
	}


	/**
	 * @param $id
	 * @method use for delete numbers
	 */
	public function delete_number($id, $game)
	{
		$this->load->model('Admin_model', 'adminModel');
		$result = $this->adminModel->deleteNumber($id);

		if ($result) {
			$this->session->set_flashdata('success', "Game Bid Number Deleted Successfully");
			redirect(base_url('admin/game-type/bet/numbers/' . $game), 'refresh');
		} else {
			$this->session->set_flashdata('error', "Something went wrong");
			redirect(base_url('admin/game-type/bet/numbers/' . $game), 'refresh');
		}

	}

	/**
	 * @param $id
	 * @param $status
	 * @metho use for change the status of game
	 */
	public function change_game_status($id, $status)
	{
		$this->load->model('Admin_model', 'adminModel');
		$result = $this->adminModel->game_status($id, $status);
		if ($result) {
			$this->session->set_flashdata('success', "Game Bid Number Deleted Successfully");
			redirect(base_url('admin-create_game'), 'refresh');
		} else {
			$this->session->set_flashdata('error', "Something went wrong");
			redirect(base_url('admin-create_game'), 'refresh');
		}
	}


	// P Starts
	public function searchUserDetail($serVal)
	{
		$user_detail = $this->adminModel->fetchUserDetail($serVal);
		echo json_encode($user_detail);
	}

	public function addWalletAmount()
	{
		$userWalletUpdation = $this->adminModel->updateUserWallet($this->input->post('credit_amount'), $this->input->post('user_id'), 'DEPOSIT');
		if ($userWalletUpdation) {
			$datas = array(
				'txn_user_id ' => $this->input->post('user_id'),
				'txn_amount' => $this->input->post('credit_amount'),
				'txn_req_amt' => $this->input->post('credit_amount'),
				'txn_details' => 'Deposit by admin',
				'txn_type' => 'DEPOSIT',
				'txn_status' => 'APPROVED'
			);
			$result = $this->adminModel->create_withdepo_Credit($datas);
			echo json_encode($result);
		}
	}


	public function addRefund()
	{
		$txn_id = $this->input->post('txn_id');
		$user_id = $this->input->post('txn_user_id');
		$req_amount = $this->input->post('txn_req_amount');
		$amount = $this->input->post('txn_amount');

		if ($this->input->post('approveAddFund')) {
			$query = $this->adminModel->updateUserWallet($req_amount, $user_id, 'DEPOSIT');
			if ($query) {
				$data = ['txn_status' => 'APPROVED', 'txn_req_approve_date' => date('Y-m-d h:i:s')];
				$query2 = $this->adminModel->updateWalletTransaction($txn_id, $data);
				if ($query2) {
					$this->session->set_flashdata('add_fund_approve', 'Successfully deposited fund.');
				}
			}
			redirect(base_url('admin-add_fund'), 'refresh');
		} else {

			$data = ['txn_status' => 'REJECT'];
			$query2 = $this->adminModel->updateWalletTransaction($txn_id, $data);
			if ($query2) {
				$this->session->set_flashdata('add_fund_reject', 'Rejected fund depositing request.');
			}
			redirect(base_url('admin-add_fund'), 'refresh');
		}


	}

	// public function addRefundReject($txn_id){

	// }

	public function withdrawalRequest()
	{

		$txn_id = $this->input->post('txn_id');
		$user_id = $this->input->post('txn_user_id');
		$amount = $this->input->post('txn_req_amount');

		if ($this->input->post('approveWithdrawFund')) {

			$config['upload_path'] = './uploads/payment/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048000';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['max_width'] = '*';
			$config['max_height'] = '*';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('payment_image')) {
				$data = array('upload_data' => $this->upload->data());
				$file = 'uploads/payment/' . $data['upload_data']['file_name'];
			}

			$query = $this->adminModel->updateUserWallet($amount, $user_id, 'WITHDRAW');
			if ($query != 'false') {
				$data = ['txn_status' => 'APPROVED', 'txn_amount' => $amount, 'payment_image' => $file];
				$query2 = $this->adminModel->updateWalletTransaction($txn_id, $data);
				if ($query2) {
					$this->session->set_flashdata('withdrawal_request_approve', 'Successfully withdrawal fund.');
				}
			} else {
				$this->session->set_flashdata('wallet_low', 'Wallet amount is low.');
			}
			redirect(base_url('admin-withdraw_fund'), 'refresh');
		} else {
			$data = ['txn_status' => 'REJECT'];
			$query2 = $this->adminModel->updateWalletTransaction($txn_id, $data);
			if ($query2) {
				$this->session->set_flashdata('withdrawal_request_reject', 'Rejected Fund withdrawal request.');
			}
			redirect(base_url('admin-withdraw_fund'), 'refresh');
		}
	}


	/**
	 * @metho use for show setting page
	 */
	public function setting()
	{
		$result = $this->Admin_model->getSetting();
//		print_r($result);
		$this->load->view('admin/setting', compact('result'));
	}

	public function update_setting()
	{
		$result = $this->Admin_model->updateSetting();
		if ($result) {
			$this->session->set_flashdata('success', 'Successfully Updated.');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong');
		}
		redirect(base_url('admin-setting'));
	}

	public function change_password()
	{


		$this->load->view('admin/change_password');

	}

	public function send_notification()
	{
		$this->load->view('admin/notification');
	}

	public function submit_notification()
	{
		$users = $this->adminModel->getAllUserList();

		foreach ($users as $user) {
			$this->db->insert('notification', array('title' => 'Notification', 'message' => $this->input->post('message'), 'status' => 'unread', 'userId' => $user->user_id));
		}
		$this->session->set_flashdata('success', 'Sent Successfully.');
		redirect(base_url('notification'), 'refresh');

	}

	/**
	 * @Method use for send push notification to device
	 *
	 */
	function push_notification($token, $message)
	{

		$fcmUrl = 'https://fcm.googleapis.com/fcm/send';

		$notification = $message;
		$extraNotificationData = ["message" => $notification];

		$fcmNotification = [
			//'registration_ids' => $tokenList, //multple token array
			'to' => $token, //single token
			'notification' => $notification,
			'data' => $extraNotificationData
		];

		$headers = [
			// 'Authorization: key=AAAAc62wJGg:APA91bFaIgVhyQhOKPqTy1k-PVUGd4oLO8dMJvH7dJi5TcyHWL7EKT7r3S2P7PeigYvzuhByKhGtyQaNlEWmh98TKronBjlVJP7niX6hxmcpszyyESdm0qGrkX6VytaQgqAtws8mgpYz',
			'Authorization: key=AAAACzdZzP4:APA91bF_8UfIeX5gfI9EZnyY3BkzlgPBefvLuYhD6-Wr96q8L8FBs9gW1Er6LjMGpNk76fHcHY0m6tIzSJV_5YHfArTuQstgh5kwWFl9QoePKGz_AA2Rmbz3_nAs3InEETSe_x7NvRRm',
			'Content-Type: application/json'
		];


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $fcmUrl);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;

		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}

		curl_close($ch);

	}


	public function change_password_submit($value = '')

	{

		if ($this->input->post('confirm_password')) {
			$old_pass = $this->input->post('old_password');
			$new_pass = $this->input->post('new_password');
			$confirm_pass = $this->input->post('confirm_password');
			$session_id = $this->session->userdata('admin_id');

			$que = $this->db->query("select * from admin where id = '$session_id'");
			$row = $que->row();

			if (sha1($old_pass) === $row->password && $new_pass === $confirm_pass) {
				$this->adminModel->change_password($session_id, sha1($new_pass));
				$this->session->set_flashdata('success', 'Changed !');
				redirect(base_url('admin/change_password'));
			} else {

				$this->session->set_flashdata('errors', 'Something miss matched !');
				redirect(base_url('admin/change_password'));
			}
		}
	}

	public function video_view(){

		$video = $this->db->get('video')->row();

		$this->load->view('admin/video_upload',compact('video'));
	}

	public function videoUpload()
	{

			$config['upload_path'] = './uploads/video/';
			$config['allowed_types'] = 'mp4';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) {
				$data = array('upload_data' => $this->upload->data());
				$file = 'uploads/video/' . $data['upload_data']['file_name'];
			}

			$query = $this->adminModel->videoUpload($file);
			if ($query) {
				$this->session->set_flashdata('success', 'Successfully uploaded.');
				redirect(base_url('admin/video_upload'), 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Something went wrong');
				redirect(base_url('admin/video_upload'), 'refresh');
			}
	}

}
