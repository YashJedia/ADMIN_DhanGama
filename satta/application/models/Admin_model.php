<?php

class Admin_model extends CI_model
{


	/**
	 * @method use to load file
	 */
	public function create_game($data)
	{

		$result = $this->db->insert('add_game', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	//Get All User List
	public function getAllUserList()
	{
		$this->db->select('user_id, user_username, user_mobile, user_email, user_status,user_fcm');
		$this->db->order_by('user_id');
		$res = $this->db->get('users');

		return $res->result();
	}

	//get new user
	public function getNewUser()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d ');
		$this->db->select('*');
		$this->db->where('DATE(user_created_at)', $curr_date);//use date function
		$res = $this->db->get('users');

		return $res->result();
	}

	//change User Status
	public function changeUserStatus($userid, $status)
	{
		$this->db->set('user_status', $status);
		$this->db->where('user_id', $userid);
		$this->db->update('users');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//get user detail  by user ID
	public function getUserDetailByUserId($user_id)
	{
		$this->db->where('user_id', $user_id);
		$res = $this->db->get('users');

		return $res->row();
	}

	//update user details
	public function updateUserDetails($user_id)
	{
		$this->db->set('user_address', $this->input->post('user_address', true));
		$this->db->set('user_city', $this->input->post('user_city', true));
		$this->db->set('user_district', $this->input->post('user_district', true));
		$this->db->set('user_state', $this->input->post('user_state', true));
		$this->db->set('user_pincode', $this->input->post('user_pincode', true));
		$this->db->set('user_country', $this->input->post('user_country', true));

		$this->db->set('user_mobile', $this->input->post('user_mobile', true));
		$this->db->set('user_email', $this->input->post('user_email', true));

		$this->db->set('user_bankaccount_name', $this->input->post('user_bankaccount_name', true));
		$this->db->set('user_bankaccount_no', $this->input->post('user_bankaccount_no', true));
		$this->db->set('user_bank_ifsc', $this->input->post('user_bank_ifsc', true));
		$this->db->set('user_bank_name', $this->input->post('user_bank_name', true));
		$this->db->set('user_bank_branch', $this->input->post('user_bank_branch', true));
		$this->db->set('user_google_pay', $this->input->post('user_google_pay', true));
		$this->db->set('user_paytm', $this->input->post('user_paytm', true));
		$this->db->set('user_phonepe', $this->input->post('user_phonepe', true));

		$this->db->set('user_wallet', $this->input->post('user_wallet', true));

		$this->db->where('user_id', $user_id);
		$this->db->update('users');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	//get All Game list
	public function getAllGames()
	{
		return $this->db->order_by('monday_start_time')->get('add_game')->result();

	}

	//get Game Detail by Game ID
	public function getGameDetails($game_id)
	{
		$this->db->where('id', $game_id);
		$res = $this->db->get('add_game');

		return $res->row();
	}

	//update game
	public function update_game($game_id, $data)
	{
		$this->db->where('id', $game_id);
		$this->db->update('add_game', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//delete game
	public function deleteGame($game_id)
	{
		$this->db->where('id', $game_id);
		$this->db->delete('add_game');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//get User credit transaction
	public function getUserCreditTransactions($user_id)
	{
		$this->db->select('users.user_username as name, wallet_transactions.*');
		$this->db->join('users', 'users.user_id = wallet_transactions.txn_user_id', 'inner');
		$this->db->where(['txn_user_id' => $user_id, 'txn_type' => "DEPOSIT"]);
		$this->db->order_by('txn_req_date', 'desc');
		$res = $this->db->get('wallet_transactions');

		return $res->result();
	}

	//get User credit transaction
	public function getUserDebitTransactions($user_id)
	{
		$this->db->select('users.user_username as name, wallet_transactions.*');
		$this->db->join('users', 'users.user_id = wallet_transactions.txn_user_id', 'inner');
		$this->db->where(['txn_user_id' => $user_id, 'txn_type' => "WITHDRAW"]);
		$this->db->order_by('txn_req_date', 'desc');
		$res = $this->db->get('wallet_transactions');
		return $res->result();
	}

	//check Title exist or not
	public function checkTitleExist($game_id, $title)
	{
		$this->db->where('title', $title);
		$this->db->where('id !=', $game_id);
		$res = $this->db->get('add_game');

		return $res->row();
	}

	//get total debit
	public function getTotalDebit()
	{
		$this->db->select('sum(txn_req_amt) as total');
		$this->db->where('txn_type', 'WITHDRAW');
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get total confirm deposit
	public function getTotalConfirmDeposit()
	{
		$this->db->select('sum(txn_req_amt) as total');
		$this->db->where('txn_type', 'DEPOSIT');
		$this->db->where('txn_status', 'APPROVED');
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get today confirm deposit
	public function getTodayConfirmDeposit()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d ');

		$this->db->select('sum(txn_req_amt) as total');
		$this->db->where('txn_type', 'DEPOSIT');
		$this->db->where('txn_status', 'APPROVED');
		$this->db->where('DATE(txn_req_date)', $curr_date);//use date function
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get today withdrawal request
	public function todayWithdrawalRequest()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d ');

		$this->db->select('count(txn_id) as total');
		$this->db->where('txn_type', 'WITHDRAW');
		// $this->db->where('txn_status','APPROVED');
		$this->db->where('DATE(txn_req_date)', $curr_date);//use date function
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get today withdrawal request
	public function todayConfirmWithdrawalRequest()
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d ');

		$this->db->select('count(txn_id) as total');
		$this->db->where('txn_type', 'WITHDRAW');
		$this->db->where('txn_status', 'APPROVED');
		$this->db->where('DATE(txn_req_date)', $curr_date);//use date function
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get total withdrawal request
	public function totalWithdrawalRequest()
	{

		$this->db->select('count(txn_id) as total');
		$this->db->where('txn_type', 'WITHDRAW');
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get total confirm withdrawal request
	public function totalConfirmWithdrawalRequest()
	{

		$this->db->select('count(txn_id) as total');
		$this->db->where('txn_type', 'WITHDRAW');
		$this->db->where('txn_status', 'APPROVED');
		$res = $this->db->get('wallet_transactions');

		return $res->row();
	}

	//get game type
	public function getGameType()
	{
		return $this->db->get('gametype')->result();
	}

	//get game type details by ID
	public function getGameTypeDetail($gameid)
	{
		$this->db->where('gt_id', $gameid);
		return $this->db->get('gametype')->row();
	}

	//get bet  numbers by game id
	public function getBetNumber($gameid)
	{
		$this->db->where('bn_game_id', $gameid);
		return $this->db->order_by('bn_id', 'desc')->get('bet_numbers')->result();
	}

	//add game result
	public function addGameResult()
	{
		$this->db->set('result_game_id', $this->input->post('game', true));
		$this->db->set('result_open_panel', $this->input->post('openpanel', true));
		$this->db->set('result_jodi', $this->input->post('jodi', true));
		$this->db->set('result_close_panel', $this->input->post('closepanel', true));
		$this->db->set('result_date', $this->input->post('date', true));
		$this->db->insert('game_results');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//add game result
	public function editGameResult()
	{
		$this->db->set('result_open_panel', $this->input->post('openpanel', true));
		$this->db->set('result_jodi', $this->input->post('jodi', true));
		$this->db->set('result_close_panel', $this->input->post('closepanel', true));
		$this->db->set('result_date', $this->input->post('date', true));
		$this->db->where('result_id', $this->input->post('result_id'))->update('game_results');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return mixed
	 * @metho use for check duplicate entry on result add
	 */
	public function check_duplicate()
	{
		$date = date('Y-m-d');
		$result = $this->db->where('result_game_id', $this->input->post('game', true))->where('DATE(result_date)', $this->input->post('date', true))->get('game_results');
		return $result->num_rows();
	}

	/**
	 * @return mixed
	 * @method use for show game result
	 */
	public function get_result()
	{
		$date = date('Y-m-d');
		$this->db->select('game_results.* , add_game.*');
		$this->db->from('game_results');
		$this->db->join('add_game', 'game_results.result_game_id = add_game.id', 'inner');
		$this->db->where('result_close_panel <=', 1);
		$this->db->or_where('result_open_panel <=', 1);
		$this->db->or_where('DATE(result_date)', $date);
		$this->db->or_where('DATE(result_date)', $date);
		$result = $this->db->get();
		return $result->result();
	}

	/**
	 * @param $id
	 * @return bool
	 * @metho use for delete results
	 */
	public function delete_result($id)
	{
		$this->db->where('result_id', $id)->delete('game_results');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//add game result
	public function addGameType()
	{
		$this->db->set('gt_name', $this->input->post('game_name', true));
		$this->db->set('gt_min_price', $this->input->post('game_min', true));
		$this->db->set('gt_rate', $this->input->post('game_rate', true));
		$this->db->insert('gametype');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//add game result
	public function editGameType()
	{
		$this->db->set('gt_name', $this->input->post('game_name', true));
		$this->db->set('gt_min_price', $this->input->post('game_min', true));
		$this->db->set('gt_rate', $this->input->post('game_rate', true));
		$this->db->where('gt_id', $this->input->post('gameid', true));
		$this->db->update('gametype');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	//check number exist
	public function checkNumberExist($number, $game)
	{
		$this->db->where(['bn_game_id' => $game, 'bn_number' => $number]);
		$get = $this->db->get('bet_numbers');

		return $get->num_rows();
	}


	//add game result
	public function addBetNumber()
	{
		$this->db->set('bn_game_id', $this->input->post('gametype', true));
		$this->db->set('bn_number', $this->input->post('number'), true);
		$this->db->insert('bet_numbers');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param $id
	 * @return bool
	 * @method use for delete bid number
	 */

	public function deleteNumber($id)
	{
		$this->db->where('bn_id', $id);
		$this->db->delete('bet_numbers');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param $game_id
	 * @param $status
	 * @return bool
	 * @method use for change the status of game
	 */
	public function game_status($game_id, $status)
	{
		$data = array("status" => $status);
		$this->db->where('id', $game_id);
		$this->db->update('add_game', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param $serVal
	 * @return mixed
	 */
	public function fetchUserDetail($serVal)
	{
		$this->db->like('user_mobile', $serVal);
		return $this->db->get('users')->result();
	}

	public function updateUserWallet($amount, $user_id, $detail)
	{

		if ($detail === 'DEPOSIT') {
			$this->db->where('user_id', $user_id);
			$user_wallet = $this->db->get('users')->row('user_wallet');
			if ($user_wallet) {
				$this->db->where('user_id', $user_id);
				$this->db->update('users', ['user_wallet' => $user_wallet + $amount]);
				if ($this->db->affected_rows() === 1) {
					return 'true';
				}
			}
		} else if ($detail === 'WITHDRAW') {
			$this->db->where('user_id', $user_id);
			$user_wallet = $this->db->get('users')->row('user_wallet');
			if ($user_wallet > $amount) {
				$this->db->where('user_id', $user_id);
				$this->db->update('users', ['user_wallet' => $user_wallet - $amount]);
				if ($this->db->affected_rows() === 1) {
					return 'true';
				}
			} else {
				return 'false';
			}
		}
	}

	public function create_withdepo_Credit($data)
	{

		$user_wallet_transaction = $this->db->insert('wallet_transactions', $data);
		if ($user_wallet_transaction) {
			return $this->db->insert_id();
		}
	}


	public function depositedTransaction()
	{
		$this->db->from('wallet_transactions');
		$this->db->join('users', 'users.user_id = wallet_transactions.txn_user_id', 'inner');
		$this->db->where('txn_type', 'DEPOSIT');
		return $this->db->order_by('wallet_transactions.txn_id', 'desc')->get()->result();
	}

	public function withdrawalTransaction()
	{
		$this->db->from('wallet_transactions');
		$this->db->join('users', 'users.user_id = wallet_transactions.txn_user_id', 'inner');
		$this->db->where('txn_type', 'WITHDRAW');
		return $this->db->order_by('wallet_transactions.txn_id', 'desc')->get()->result();
		// return $this->db->get_where('wallet_transactions',['txn_type'=>'WITHDRAW'])->result();
	}


	public function updateWalletTransaction($txn_id, array $data = [])
	{
		$this->db->where('txn_id', $txn_id);
		$this->db->update('wallet_transactions', $data);
		if ($this->db->affected_rows() == 1) {
			return true;
		}
	}

	public function getAllBidData()
	{
		$this->db->select('ab.* ,u.user_username,u.user_mobile,u.user_email,ag.title,gt.gt_name');
		$this->db->from('add_bid  ab');
		$this->db->join('users  u', 'u.user_id = ab.user_id', 'inner');
		$this->db->join('add_game  ag', 'ag.id = ab.game_id', 'inner');
		$this->db->join('gametype  gt', 'gt.gt_id = ab.game_type', 'inner');
		$this->db->order_by('ab.id', 'desc');
		return $this->db->get()->result();
	}

	public function getWinnerBidData()
	{
		$this->db->select('ab.* ,u.user_username,u.user_mobile,u.user_email,ag.title,gt.gt_name ,gt.gt_rate');
		$this->db->from('add_bid  ab');
		$this->db->join('users  u', 'u.user_id = ab.user_id', 'inner');
		$this->db->join('add_game  ag', 'ag.id = ab.game_id', 'inner');
		$this->db->join('gametype  gt', 'gt.gt_id = ab.game_type', 'inner');
		$this->db->where('ab.status', 1);
		$this->db->order_by('ab.id', 'desc');
		return $this->db->get()->result();
	}
	// P Ends


//	check result
	public function check_result($game_id, $date)
	{
		$result = $this->db->where('result_game_id', $game_id)->where('DATE(result_updated_at) <=', $date)->order_by('result_updated_at', 'desc')->get('game_results');
		return $result->row();
	}

	//  check result
	public function check_result_bid($game_id, $date)
	{
		$result = $this->db->where('result_game_id', $game_id)->where('DATE(result_date)', $date)->get('game_results');
		return $result->row();
	}

	/**
	 * @param $userid
	 * @param $bidid
	 * @return mixed
	 * @metho use for get bid details
	 */
	public function get_bid_details($userid, $bidid)
	{

		$result = $this->db->where('user_id', $userid)->where('id', $bidid)->get('add_bid')->row();
		$getBids = $this->db->where('gt_id', $result->game_type)->get('gametype')->row();

		$number = $result->bid_value / $getBids->gt_min_price;

		$getPoint = $number * $getBids->gt_rate;

		$user = $this->getUserDetailByUserId($userid);

		$userWallet['user_wallet'] = $user->user_wallet + $getPoint;
		$bidStatus['status'] = 1;
		if (!$result->status) {
			$this->db->where('id', $bidid)->update('add_bid', $bidStatus);
			$update = $this->db->where('user_id', $userid)->update('users', $userWallet);
		} else {
			$update = true;
		}
		if ($update) {
			return true;
		} else {
			return false;
		}

	}


	/**
	 * @return mixed
	 * @metho use for get setting data
	 */
	public function getSetting()
	{
		$result = $this->db->get('setting')->row();
		return $result;
	}


	/**
	 * @return bool
	 * @metho use for update setting
	 */
	public function updateSetting()
	{


		if ($this->input->post('show_wallet') === 'on') {
			$showwallet = 1;
		} else {
			$showwallet = 0;
		}

		$data = array(
			'mobile' => $this->input->post('mobile'),
			'show_wallet' => $showwallet,
			'email' => $this->input->post('email'),
			'payment_key' => $this->input->post('pn'),
			'payment_marchent_key' => $this->input->post('pa'),
			'payment_secret_key' => $this->input->post('mc')
		);

		$this->db->where('id', 1)->update('setting', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}


	public function change_password($session_id, $new_pass)
	{

		$update_pass = $this->db->query("UPDATE admin set password = '$new_pass'  where id = '$session_id'");
		return $update_pass;
	}

	public function videoUpload($file)
	{

		$this->db->update('video', ['video_browse' => $file]);
		if ($this->db->affected_rows() === 1) {
			return 'true';
		}
	}

}

