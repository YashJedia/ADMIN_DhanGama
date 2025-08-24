<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/kolkata');

class Api extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel', 'apiModel');
		$this->load->model('Web_model');
	}

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

	private function request($type, $url = '')
	{
		if ($_SERVER['REQUEST_METHOD'] !== $type) {
			return $this->sendResponse(false, "Cannot " . $_SERVER['REQUEST_METHOD'] . ' ' . $url);
		}
		return true;
	}

	public function register()
	{
		$this->request('POST', '/api/register');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.user_username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|numeric|min_length[10]|max_length[10]|is_unique[users.user_mobile]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$data = [
				'user_username' => $this->input->post('username', true),
				'user_password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
				'user_mobile' => $this->input->post('mobile_number', true),
				'user_email' => $this->input->post('email', true),
				'user_fcm' => $this->input->post('fcm_token', true),
			];

			$userId = $this->apiModel->register($data);

			if (!empty($userId)) {
				return $this->sendResponse(true, SUCCESS_MSG, [
					'user_id' => $userId
				]);
			}
			return $this->sendResponse(false, ERROR_MSG);
		}
	}

	public function login()
	{
		$this->request('POST', '/api/login');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);

			$userId = $this->apiModel->login($username, $password);

			if (!empty($userId)) {
				$this->apiModel->updateUser([
					'user_id' => $userId->user_id
				], [
					'user_last_login' => date('Y-m-d H:i:s'),
					'user_fcm' => $this->input->post('fcm_token', true),
				]);

				return $this->sendResponse(true, SUCCESS_MSG, [
					'user_id' => $userId->user_id,
					'isActive' => $userId->user_status === 'ENABLED'
				]);
			}
			return $this->sendResponse(false, ERROR_LOGIN);
		}
	}


	public function forgotPassword()
	{
		$this->request('POST', '/api/forgot-password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$username = $this->input->post('username', true);

			$user = $this->apiModel->forgetPassword($username);

			if (!empty($user)) {
				$mobile = $user->user_mobile;
				$email = $user->user_email;

				$OTP = rand(100000, 999999);

				if (!empty($mobile)) {
					// send OTP via SMS service LATER.
				}

				if (!empty($email)) {
					// send OTP via Email provider LATER.
				}

				$this->apiModel->updateUser([
					'user_id' => $user->user_id
				], [
					'user_otp' => $OTP
				]);

				return $this->sendResponse(true, SUCCESS_MSG, [
					'username' => $user->user_username,
					'OTP' => $OTP
				]);
			}
			return $this->sendResponse(false, ERROR_NOT_REGISTERED);
		}
	}

	public function newPassword()
	{
		$this->request('POST', '/api/new-password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('otp', 'OTP', 'trim|required|numeric');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$username = $this->input->post('username', true);
			$OTP = $this->input->post('otp', true);
			$password = $this->input->post('password', true);

			$result = $this->apiModel->updateUser([
				'user_username' => $username,
				'user_otp' => $OTP
			], [
				'user_password' => password_hash($password, PASSWORD_BCRYPT),
				'user_otp' => null
			]);

			if (!empty($result)) {
				return $this->sendResponse(true, SUCCESS_MSG);
			}
			return $this->sendResponse(false, 'INVALID OTP');
		}
	}

	public function getUserProfile($userId)
	{
		$this->request('GET', '/api/user-profile/:num');

		$profile = [];
		$user = $this->apiModel->getUser([
			'user_id' => $userId
		])->row();

		if (!empty($user)) {
			$profile = [
				"user_id" => $user->user_id,
				"user_username" => $user->user_username,
				"user_mobile" => $user->user_mobile,
				"user_email" => $user->user_email,
				"user_wallet" => $user->user_wallet,
				"user_status" => $user->user_status,
				"address" => $user->user_address,
				"district" => $user->user_district,
				"city" => $user->user_city,
				"state" => $user->user_state,
				"pincode" => $user->user_pincode,
				"country" => $user->user_country,
				"bank_account_holder_name" => $user->user_bankaccount_name,
				"bank_account_no" => $user->user_bankaccount_no,
				"bank_ifsc" => $user->user_bank_ifsc,
				"bank_name" => $user->user_bank_name,
				"google_pay_no" => $user->user_google_pay,
				"paytm_no" => $user->user_phonepe,
				"phone_pe_no" => $user->user_paytm

			];
		}

		return $this->sendResponse(true, SUCCESS_MSG, [
			'profile' => $profile
		]);
	}

	public function updateUserPassword($userId)
	{
		$this->request('POST', 'api/update-user-password/:num');

		$this->form_validation->set_rules('oldPassword', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$oldPassword = $this->input->post('oldPassword', true);
			$password = $this->input->post('password', true);

			$condition = [
				'user_id' => $userId,
			];

			$user = $this->apiModel->getUser([
				'user_id' => $userId
			])->row();

			if ($user) {
				$hash = $user->user_password;
				if (password_verify($oldPassword, $hash)) {
					$result = $this->apiModel->updateUser($condition, [
						'user_password' => password_hash($password, PASSWORD_BCRYPT),
					]);

					if (!empty($result)) {
						return $this->sendResponse(true, SUCCESS_MSG);
					}
				}

				return $this->sendResponse(false, 'Old Password is incorrect.');
			}
			return $this->sendResponse(false, 'INVALID OTP');
		}
	}

	public function updateProfile($userId)
	{
		$this->request('POST', '/api/update-profile/:num');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|numeric|min_length[10]|max_length[10]');


		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');

			$uniqueEmail = $this->apiModel->getUser([
				'user_id !=' => $userId,
				'user_email' => $email,
			])->num_rows();

			if ($uniqueEmail) {
				$this->sendResponse(false, 'Email is already in use.');
			}

			$uniqueMobile = $this->apiModel->getUser([
				'user_id !=' => $userId,
				'user_mobile' => $mobile,
			])->num_rows();

			if ($uniqueMobile) {
				$this->sendResponse(false, 'Mobile number is already in use.');
			}

			$result = $this->apiModel->updateUser([
				'user_id' => $userId
			], [
				'user_email' => $email,
				'user_mobile' => $mobile,
				'user_address' => $this->input->post('address', true),
				'user_district' => $this->input->post('district', true),
				'user_city' => $this->input->post('city', true),
				'user_state' => $this->input->post('state', true),
				'user_pincode' => $this->input->post('pincode', true),
				'user_country' => $this->input->post('country', true),
				'user_bankaccount_name' => $this->input->post('bank_account_holder_name', true),
				'user_bankaccount_no' => $this->input->post('bank_account_no', true),
				'user_bank_ifsc' => $this->input->post('bank_ifsc', true),
				'user_bank_name' => $this->input->post('bank_name', true),
				'user_google_pay' => $this->input->post('google_pay_no', true),
				'user_phonepe' => $this->input->post('paytm_no', true),
				'user_paytm' => $this->input->post('phone_pe_no', true),
			]);

			return $result ? $this->sendResponse(true, SUCCESS_MSG) : $this->sendResponse(false, ERROR_UPDATE);
		}
	}

	public function addTransactionRequest($userId)
	{
		$this->request('POST', '/api/add-transaction-request/:num');

		$this->form_validation->set_rules('amount', 'Transaction Amount', 'trim|numeric');
		$this->form_validation->set_rules('type', 'Transaction Type', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$amount = $this->input->post('amount', true);
			$type = $this->input->post('type', true);
			$method = $this->input->post('payment_method', true);

			if ($amount <= 0) {
				return $this->sendResponse(false, 'Amount is required.');
			}

			if (!in_array(strtoupper($type), ['WITHDRAW', 'DEPOSIT'])) {
				return $this->sendResponse(false, 'Invalid Transaction Type: Allowed values are : WITHDRAW, DEPOSIT');
			}

			if (strtoupper($type) === 'WITHDRAW') {
				$amt = $this->apiModel->getUser([
					'user_id' => $userId
				])->row('user_wallet');

				if ((float)$amt < $amount) {
					return $this->sendResponse(false, 'Wallet balance is low.');
				}
			}

			$data = [
				'txn_user_id' => $userId,
				'txn_req_amt' => number_format($amount, 2, '.', ''),
				'txn_details' => 'Requested by user.',
				'txn_type' => strtoupper($type),
				'payment_method' => $method,
			];

			$result = $this->apiModel->insertWalletTransactions($data);

			if ($result) {
				$this->apiModel->settleWalletBal($userId);
				return $this->sendResponse(true, SUCCESS_MSG);
			}
		}

		return $this->sendResponse(false, ERROR_MSG);
	}

	public function addTransactionDeposit($userId)
	{
		$this->request('POST', '/api/add-transaction-request/:num');

		$this->form_validation->set_rules('amount', 'Transaction Amount', 'trim|numeric');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$amount = $this->input->post('amount', true);
			$type = 'DEPOSIT';
			$method = $this->input->post('payment_method', true);

			if ($amount <= 0) {
				return $this->sendResponse(false, 'Amount is required.');
			}

			if (!in_array(strtoupper($type), ['WITHDRAW', 'DEPOSIT'])) {
				return $this->sendResponse(false, 'Invalid Transaction Type: Allowed values are : WITHDRAW, DEPOSIT');
			}

			if (strtoupper($type) === 'WITHDRAW') {
				$amt = $this->apiModel->getUser([
					'user_id' => $userId
				])->row('user_wallet');

				if ((float)$amt < $amount) {
					return $this->sendResponse(false, 'Wallet balance is low.');
				}
			}

			$data = [
				'txn_user_id' => $userId,
				'txn_req_amt' => number_format($amount, 2, '.', ''),
				'txn_details' => 'Requested by user.',
				'txn_type' => 'DEPOSIT',
				'txn_amount' => number_format($amount, 2, '.', ''),
				'payment_method' => $method,
				'txn_status' => 'APPROVED',
				'txn_req_approve_date' => date('y-m-d h:i:s'),
			];

			$result = $this->apiModel->insertWalletTransactions($data);

			if ($result) {
				$this->apiModel->depositWalletBal($userId);
				return $this->sendResponse(true, SUCCESS_MSG);
			}
		}

		return $this->sendResponse(false, ERROR_MSG);
	}

	/**
	 * @param $userId
	 */
	public function getWalletTransactions($userId)
	{
		$this->request('GET', '/api/get-transactions/:num');

		$transactions = $this->apiModel->getWalletTransactions([
			'txn_user_id' => $userId,
			'txn_type' => 'DEPOSIT'
		])->result();

		return $this->sendResponse(true, SUCCESS_MSG, [
			'transactions' => $transactions
		]);
	}

	/**
	 * @param $userId
	 */
	public function getWalletTransactionsWithdrawal($userId)
	{
		$this->request('GET', '/api/get-transactions/:num');

		$transactions = $this->apiModel->getWalletTransactions([
			'txn_user_id' => $userId,
			'txn_type' => 'WITHDRAW'
		])->result();

		return $this->sendResponse(true, SUCCESS_MSG, [
			'transactions' => $transactions
		]);
	}

	/**
	 * @metho  use for get game type data from game type table
	 */
	public function game_types()
	{
		$this->request('GET', '/api/game_types');

		$gametypes = $this->apiModel->getGameType();

		return $this->sendResponse(true, SUCCESS_MSG, [
			'gametypes' => $gametypes
		]);
	}


	/**
	 * @metho  use for get game type data from game type table
	 */
	public function games($id)
	{
		$this->request('GET', '/api/games/(:num)');

		$games = $this->apiModel->games();

		foreach ($games as $key => $game) {
			if ($id === '2' || $id === '6' || $id === '7') {
				$games[$key]->close = null;
			}
		}

		$bit_number = $this->apiModel->bid_number($id);

		return $this->sendResponse(true, SUCCESS_MSG, [
			'games' => $games,
			'bid_number' => $bit_number
		]);
	}

	/**
	 * @metho use for get the numbers
	 */
	public function bid_numbers($id)
	{
		$this->request('GET', '/api/bid_numbers/(:num)');

		$bit_number = $this->apiModel->bid_number($id);

		return $this->sendResponse(true, SUCCESS_MSG, [
			'bid_number' => $bit_number
		]);
	}

	/**
	 * @metho use for save bidding data
	 */
	public function set_bid_number()
	{
		$this->request('POST', '/api/set_bid');

		$this->form_validation->set_rules('user_id', 'User Id', 'trim|numeric');
		$this->form_validation->set_rules('game_id', 'Game', 'trim|required');
		$this->form_validation->set_rules('game_type', 'Game Type', 'trim|required');
		$this->form_validation->set_rules('txt', 'Numbers', 'trim|required');
		$this->form_validation->set_rules('bid_value', 'Values', 'trim|required');
		$this->form_validation->set_rules('bid_types', 'Bid Type', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {

			$check = $this->Web_model->fetch_single_data_game($this->input->post('user_id'));

			if ($this->input->post('total') < $check->user_wallet) {
				$result = $this->apiModel->save_user_bid();
				if ($result) {
					$this->Web_model->wallet_update($this->input->post('user_id'), $this->input->post('total'));
					return $this->sendResponse(true, SUCCESS_MSG, [
						'status' => 'success',
						'msg' => 'Your bid successfully submitted, Please wait for result'
					]);
					exit();
				} else {
					return $this->sendResponse(false, ERROR_MSG, [
						'msg' => 'There is the problem, please contact with support'
					]);
					exit();
				}
			} else {
				return $this->sendResponse(false, ERROR_MSG, [
					'msg' => 'Sorry you dont have enough wallet amount, please top-up your wallet'
				]);
				exit();
			}
		}
	}

	// change here
	/**
	 * @metho use for save bidding data
	 */
	public function set_bid_number_hf()
	{
		$this->request('POST', '/api/set_bid_hf');

		$this->form_validation->set_rules('user_id', 'User Id', 'trim|numeric');
		$this->form_validation->set_rules('game_id', 'Game', 'trim|required');
		$this->form_validation->set_rules('game_type', 'Game Type', 'trim|required');
		$this->form_validation->set_rules('pnt', 'Numbers', 'trim|required');
		$this->form_validation->set_rules('num1', 'Values', 'trim|required');
		$this->form_validation->set_rules('num2', 'Values', 'trim|required');
		$this->form_validation->set_rules('bid_types', 'Bid Type', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {

			$check = $this->Web_model->fetch_single_data_game($this->input->post('user_id'));

			if ($this->input->post('total') < $check->user_wallet) {
				$result = $this->apiModel->save_user_bid_hf();
				if ($result) {
					$this->Web_model->wallet_update($this->input->post('user_id'), $this->input->post('total'));
					return $this->sendResponse(true, SUCCESS_MSG, [
						'status' => 'success',
						'msg' => 'Your bid successfully submitted, Please wait for result'
					]);

					exit();
				} else {
					return $this->sendResponse(false, ERROR_MSG, [
						'msg' => 'There is the problem, please contact with support'
					]);
					exit();
				}
			} else {
				return $this->sendResponse(false, ERROR_MSG, [
					'msg' => 'Sorry you dont have enough wallet amount, please top-up your wallet'
				]);
				exit();
			}
		}
	}

	/**
	 * @param $userid
	 * @metho ude for get my bids
	 */
	public function my_bids($userid)
	{
		$results = $this->Web_model->get_my_bid($userid);

		foreach ($results as $key => $value) {

			$date = date('Y-m-d', strtotime($value->created));
			$result = $this->functions->check_result_bid($value->game_id, $date);

			if ($result) {
				$openSum = array_sum(str_split($result->result_open_panel));
				$closeSum = array_sum(str_split($result->result_close_panel));
				$closeDigit = substr($closeSum, -1);
				$openDigit = substr($openSum, -1);
				$jodiDigit = $result->result_jodi;


				//								For Single
				if ($value->game_type === '1' && $value->bid_type === 'open' && $result->result_open_panel > 0) {
					if ($openDigit === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} elseif ($value->game_type === '1' && $value->bid_type === 'close' && $result->result_close_panel > 0) {
					if ($closeDigit === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} // For Jodi
				elseif ($value->game_type === '2' && $value->bid_type === 'open' && $result->result_close_panel > 0) {
					if ($jodiDigit === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} // For Single Panel
				elseif ($value->game_type === '3' && $value->bid_type === 'open' && $result->result_open_panel > 0) {
					if ($result->result_open_panel === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} elseif ($value->game_type === '3' && $value->bid_type === 'close' && $result->result_close_panel > 0) {
					if ($result->result_close_panel === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} //								For Double Panel
				elseif ($value->game_type === '4' && $value->bid_type === 'open' && $result->result_open_panel > 0) {
					if ($result->result_open_panel === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} elseif ($value->game_type === '4' && $value->bid_type === 'close' && $result->result_close_panel > 0) {
					if ($result->result_close_panel === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} //								For Triple Panel
				elseif ($value->game_type === '5' && $value->bid_type === 'open' && $result->result_open_panel > 0) {
					if ($result->result_open_panel === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Win';
					}
				} elseif ($value->game_type === '5' && $value->bid_type === 'close' && $result->result_close_panel > 0) {
					if ($result->result_close_panel === $value->bid_number) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} //								Half Sanagam

				elseif ($value->game_type === '6' && $value->bid_type === 'open' && $result->result_close_panel > 0) {
					if ($closeDigit === $value->bid_number && $result->result_open_panel === $value->bid_panel) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} elseif ($result->result_close_panel === $value->bid_number && $openDigit === $value->bid_panel) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} //								Full Sanagam

				elseif ($value->game_type === '7' && $value->bid_type === 'open' && $result->result_close_panel > 0) {
					if ($result->result_open_panel === $value->bid_number && $result->result_close_panel === $value->bid_panel) {
						$this->functions->win_settled($value->user_id, $value->id);
						$winStatus = 'Win';
					} else {
						$winStatus = 'Loss';
					}
				} else {
					$winStatus = 'Pending';
				}
			} else {
				$winStatus = 'Pending';
			}
			$results[$key]->win_status = $winStatus;
		}


		if ($results) {
			return $this->sendResponse(true, SUCCESS_MSG, [
				'bids' => $results
			]);
		} else {
			return $this->sendResponse(false, ERROR_MSG, [
				'msg' => 'There is the problem, please contact with support'
			]);
			exit();
		}
	}

	/**
	 * @metho use for get data on mobile front
	 */
	public function home_api()
	{
		$this->request('GET', '/api/home_api');

		$games = $this->Admin_model->getAllGames();

		$data = [];

		foreach ($games as $key => $game) {
			$date = date('Y-m-d');
			$result = $this->functions->check_result($game->id, $date);
			if ($result) {
				$open = $result->result_open_panel ? $result->result_open_panel : '';
				$jodi = $result->result_jodi ? $result->result_jodi : $result->result_jodi;
				$close = $result->result_close_panel ? $result->result_close_panel : '';
			} else {
				$open = '';
				$jodi = '--';
				$close = '';
			}

			$data[$key]['id'] = $game->id;
			$data[$key]['name'] = $game->title;
			$data[$key]['open'] = $open;
			$data[$key]['jodi'] = $jodi;
			$data[$key]['close'] = $close;
			$data[$key]['open_time'] = ($game->sunday_start_time ? $game->sunday_start_time : ($game->monday_start_time ? $game->monday_start_time : ($game->tuesday_start_time ? $game->tuesday_start_time : ($game->wednesday_start_time ? $game->wednesday_start_time : ($game->thursday_start_time ? $game->thursday_start_time : ($game->friday_start_time ? $game->friday_start_time : ($game->saturday_start_time ? $game->saturday_start_time : '')))))));
			$data[$key]['close_time'] = ($game->sunday_close_time ? $game->sunday_close_time : ($game->monday_close_time ? $game->monday_close_time : ($game->tuesday_close_time ? $game->tuesday_close_time : ($game->wednesday_close_time ? $game->wednesday_close_time : ($game->thursday_close_time ? $game->thursday_close_time : ($game->friday_close_time ? $game->friday_close_time : ($game->saturday_close_time ? $game->saturday_close_time : '')))))));
		}

		return $this->sendResponse(true, SUCCESS_MSG, [
			'data' => $data
		]);
		exit();
	}


	/**
	 * @get seting data from setting table
	 */
	public function settings()
	{
		$result = $this->Admin_model->getSetting();
		$video = $this->db->get('video')->row('video_browse');
		$result->pn = $result->payment_key;
		$result->pa = $result->payment_marchent_key;
		$result->mc = $result->payment_secret_key;
		$result->video = base_url($video);

		return $this->sendResponse(true, SUCCESS_MSG, [
			'data' => $result
		]);
		exit();
	}


	public function payment_start()
	{
		$this->request('POST', '/api/payment_success');
		$this->form_validation->set_rules('user_id', 'User Id', 'trim|numeric');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {

			$result = $this->apiModel->payment_save();

			if ($result) {
				return $this->sendResponse(true, SUCCESS_MSG, [
					'msg' => 'Success',
				]);
			} else {
				return $this->sendResponse(false, ERROR_MSG, [
					'msg' => 'There is the problem, please contact with support'
				]);
				exit();
			}
		}
	}

	public function get_transactions($userId)
	{

		$this->request('GET', '/api/get-transactions/:num');

		$transactions = $this->apiModel->getWalletTransactions([
			'txn_user_id' => $userId,
		])->result();

		return $this->sendResponse(true, SUCCESS_MSG, [
			'transactions' => $transactions
		]);
	}


	public function get_notifications($userId)
	{

		$this->request('GET', '/api/get_notifications/:num');

		$notification = $this->db->where('userId', $userId)->order_by('id', 'DESC')->get('notification')->result();

		return $this->sendResponse(true, SUCCESS_MSG, [
			'notification' => $notification
		]);
	}

	public function addPaymentRequest()
	{

		$config['upload_path'] = './uploads/payment/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048000';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['max_width'] = '*';
		$config['max_height'] = '*';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')) {
			$data = array('upload_data' => $this->upload->data());
			$file = 'uploads/payment/' . $data['upload_data']['file_name'];
		}

		$this->request('POST', '/api/add-payment-request');

		$this->form_validation->set_rules('amount', 'Transaction Amount', 'trim|numeric');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$amount = $this->input->post('amount', true);
			$method = $this->input->post('payment_method', true);

			$data = [
				'txn_user_id' => $this->input->post('user_id'),
				'txn_amount' => number_format($amount, 2, '.', ''),
				'txn_req_amt' => number_format($amount, 2, '.', ''),
				'txn_details' => 'Amount deposit to wallet.',
				'txn_type' => 'DEPOSIT',
				'payment_method' => $method,
				'txn_status' => 'PENDING',
				'payment_txn_id' => $this->input->post('txnId'),
				'payment_image' => $file,
				'user_name' => $this->input->post('name')
			];

			$result = $this->apiModel->insertWalletTransactions($data);

			if ($result) {
				return $this->sendResponse(true, SUCCESS_MSG);
			}
		}

		return $this->sendResponse(false, ERROR_MSG);
	}


	public function withdrawPaymentRequest()
	{
		$this->request('POST', '/api/withdraw-payment-request');

		$this->form_validation->set_rules('amount', 'Transaction Amount', 'trim|numeric');

		if ($this->form_validation->run() === false) {
			return $this->sendResponse(false, strip_tags(validation_errors()));
		} else {
			$amount = $this->input->post('amount', true);
			$method = $this->input->post('payment_method', true);
			$userId = $this->input->post('user_id', true);
			$amt = $this->apiModel->getUser([
				'user_id' => $userId
			])->row('user_wallet');

			if ((float)$amt < $amount) {
				return $this->sendResponse(false, 'Wallet balance is low.');
			}

			$data = [
				'txn_user_id' => $userId,
				'txn_req_amt' => number_format($amount, 2, '.', ''),
				'txn_details' => 'Requested by user',
				'txn_type' => "WITHDRAW",
				'payment_method' => $method,
				'request_number' => $this->input->post('request_number'),
			];

			$result = $this->apiModel->insertWalletTransactions($data);

			if ($result) {
				$this->apiModel->settleWalletBal($userId);
				return $this->sendResponse(true, SUCCESS_MSG);
			}
		}

		return $this->sendResponse(false, ERROR_MSG);
	}

	public function video()
	{

		$this->request('GET', '/api/video');
		$video = $this->db->get('video')->row('video_browse');

		return $this->sendResponse(true, SUCCESS_MSG, base_url($video));
	}

	public function sendNotificationCrud()
	{

		$this->request('GET', '/api/sendNotificationCrud');

		$notification = $this->db->where('delivered', 'unsent')->get('notification')->result();

		foreach ($notification as $getData) {

			$message = array(
				"title" => $getData->title,
				"body" => $getData->message,
				'icon' => base_url('assets/dist/img/dpboss.jpeg'),
			);

			$this->push_notification($getData->token, $message);
			$this->db->where('delivered', 'unsent')->where('token', $getData->token)->update('notification', ['delivered' => 'sent']);
		}

		return $this->sendResponse(true, SUCCESS_MSG);
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
			'Authorization: key=AAAActrY7PI:APA91bGLrH0AsafmEONtapdJl-K8W4w1uXtmZAcnALDPXDN5BL-Cy1oxMcz0jso_zr0hAyG1Jji7J4KqqydqBY1qLPWWajE-GVGWtxYK2969otQRta8gRll0-pJWN3rUJ_fYuYIhBcDV',
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

		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}

		curl_close($ch);
	}

	// 	"IpAddress": "82.180.142.71",

	// 	function payGOrderCreate(){

	//         $this->request('POST', '/api/payGOrderCreate');

	//         $authenticationKey = "3c1c0798252e4df2b1deb53c9a441de9";

	//         $authenticationToken = "22f66c4ad4e94326ade0c275d7c4cc06";

	//         $merchantKeyId = "1F72003F3E07993";

	//         $token = base64_encode($authenticationKey.':'.$authenticationToken.':M:'.$merchantKeyId);

	//         $curl = curl_init();

	//         curl_setopt_array($curl, array(
	//           CURLOPT_URL => 'https://paygapi.payg.in/payment/api/order/create',
	//           CURLOPT_RETURNTRANSFER => true,
	//           CURLOPT_ENCODING => '',
	//           CURLOPT_MAXREDIRS => 10,
	//           CURLOPT_TIMEOUT => 0,
	//           CURLOPT_FOLLOWLOCATION => true,
	//           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	//           CURLOPT_CUSTOMREQUEST => 'POST',
	//           CURLOPT_POSTFIELDS =>'{
	//         		"CustomerData": {
	//         			"BillingAddress": "",
	//         			"BillingCity": "",
	//         			"BillingCountry": "",
	//         			"BillingState": "",
	//         			"BillingZipCode": "",
	//         			"CustomerId": "",
	//         			"CustomerNotes": "",
	//         			"Email": "",
	//         			"EmailReceipt": "",
	//         			"FirstName": "'.$this->input->post('name', true).'",
	//         			"LastName": "'.$this->input->post('name', true).'",
	//         			"MobileNo": "'.$this->input->post('mobile', true).'",
	//         			"ShippingAddress": "",
	//         			"ShippingCity": "",
	//         			"ShippingCountry": "",
	//         			"ShippingFirstName": "",
	//         			"ShippingLastName": "",
	//         			"ShippingMobileNo": "",
	//         			"ShippingState": "",
	//         			"ShippingZipCode": ""
	//         		},
	//         		"IntegrationData": {
	//         			"HashData": "",
	//         			"IntegrationType": "11",
	//         			"PlatformId": "",
	//         			"Source": "MobileSDK",
	//         			"UserName": ""
	//         		},
	//         		"MID": "'.$merchantKeyId.'",
	//         		"OrderAmount": "'.$this->input->post('amount', true).'",
	//         		"OrderAmountData": {
	//         			"Amount": "'.$this->input->post('amount', true).'",
	//         			"AmountTypeDesc": ""
	//         		},
	//         		"OrderStatus": "Initiating",
	//         		"OrderType": "MOBILE",
	//         		"RedirectUrl": "https://sattamatkaonlineplay.com/api/payg/order/success",
	//         		"RequestDateTime": "'.date('d/m/Y').'",
	//         		"TransactionData": {
	//         			"AcceptedPaymentTypes": "",
	//         			"IndustrySpecificationCode": "",
	//         			"PartialPaymentOption": "",
	//         			"PaymentType": "",
	//         			"RefTransactionId": "",
	//         			"SurchargeType": "",
	//         			"SurchargeValue": ""
	//         		},
	//         		"UniqueRequestId": "'.$this->input->post('uniqId', true).'",
	//         		"UserDefinedData": {
	//         			"UserDefined1": ""
	//         		}
	//         	}',
	//           CURLOPT_HTTPHEADER => array(
	//             'Authorization: Basic '.$token,
	//             'Content-Type: application/json',
	//           ),
	//         ));

	//         $response = curl_exec($curl);

	//         curl_close($curl);

	//         echo json_encode($response);

	// 	}

	function payGOrderCreate()
	{

		$this->request('POST', '/api/payGOrderCreate');

		$authenticationKey = "3c1c0798252e4df2b1deb53c9a441de9";

		$authenticationToken = "22f66c4ad4e94326ade0c275d7c4cc06";

		$merchantKeyId = "10404";

		$token = base64_encode($authenticationKey . ':' . $authenticationToken . ':M:' . $merchantKeyId);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://uatapi.payg.in/payment/api/order/create',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
        		"CustomerData": {
        			"BillingAddress": "",
        			"BillingCity": "",
        			"BillingCountry": "",
        			"BillingState": "",
        			"BillingZipCode": "",
        			"CustomerId": "",
        			"CustomerNotes": "",
        			"Email": "",
        			"EmailReceipt": "",
        			"FirstName": "' . $this->input->post('name', true) . '",
        			"LastName": "' . $this->input->post('name', true) . '",
        			"MobileNo": "' . $this->input->post('mobile', true) . '",
        			"ShippingAddress": "",
        			"ShippingCity": "",
        			"ShippingCountry": "",
        			"ShippingFirstName": "",
        			"ShippingLastName": "",
        			"ShippingMobileNo": "",
        			"ShippingState": "",
        			"ShippingZipCode": ""
        		},
        		"IntegrationData": {
        			"HashData": "",
        			"IntegrationType": "11",
        			"PlatformId": "",
        			"Source": "MobileSDK",
        			"UserName": ""
        		},
        		"MerchantKeyId": "' . $merchantKeyId . '",
        		"OrderAmount": "' . $this->input->post('amount', true) . '",
        		"OrderAmountData": {
        			"Amount": "' . $this->input->post('amount', true) . '",
        			"AmountTypeDesc": ""
        		},
        		"OrderStatus": "Initiating",
        		"OrderType": "MOBILE",
        		"RedirectUrl": "https://sattamatkaonlineplay.com/api/payg/order/success",
        		"RequestDateTime": "' . date('d/m/Y') . '",
        		"TransactionData": {
        			"AcceptedPaymentTypes": "",
        			"IndustrySpecificationCode": "",
        			"PartialPaymentOption": "",
        			"PaymentType": "",
        			"RefTransactionId": "",
        			"SurchargeType": "",
        			"SurchargeValue": ""
        		},
        		"UniqueRequestId": "' . $this->input->post('uniqId', true) . '",
        		"UserDefinedData": {
        			"UserDefined1": ""
        		}
        	}',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Basic MWU3MTczZjMwOTQ1NGViZWJhYzNiMmVjMTc2OTlhZWY6ZDJiZWJlMzNkNDI2NDJhZWI3YTBjNzhhZmFiNTlhYjE6TToxMDQwNA==',
				'Content-Type: application/json',
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		echo json_encode($response);
	}

	function payGOrderSuccess()
	{

		$this->request('GET', '/api/payGOrderSuccess');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://uatapi.payg.in/payment/api/order/Detail',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => '{
            "OrderKeyId": "76261231002M10404U10",
            "MerchantKeyId":"10404"
        }',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Basic MWU3MTczZjMwOTQ1NGViZWJhYzNiMmVjMTc2OTlhZWY6ZDJiZWJlMzNkNDI2NDJhZWI3YTBjNzhhZmFiNTlhYjE6TToxMDQwNA==',
				'Content-Type: application/json',
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}
}
