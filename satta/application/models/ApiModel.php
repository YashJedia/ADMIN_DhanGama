<?php
date_default_timezone_set('Asia/kolkata');
class ApiModel extends CI_model
{
	public function register($data)
	{
		$this->db->insert('users', $data);

		if ($this->db->affected_rows() === 1) {
			return $this->db->insert_id();
		}
		return false;
	}

	public function login($username, $password)
	{
		$this->db->where('user_username', $username);
		// 		$this->db->where('user_status', 'ENABLED');
		$user = $this->db->get('users');

		if ($user->num_rows() === 1) {
			$user = $user->row();
			$hash = $user->user_password;
			if (password_verify($password, $hash)) {
				return $user;
			}

			return false;
		}

		return false;
	}

	public function forgetPassword($username)
	{
		if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
			$this->db->where('user_mobile', $username);
		} else {
			$this->db->where('user_mobile', $username);
		}

		$user = $this->db->get('users');

		if ($user->num_rows() === 1) {
			return $user->row();
		}

		return false;
	}

	public function updateUser($condition, $data)
	{
		$this->db->where($condition);
		$this->db->update('users', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}

		return false;
	}

	public function getUser($condition = [])
	{
		if ($condition) {
			$this->db->where($condition);
		}

		return $this->db->get('users');
	}

	public function insertWalletTransactions($data)
	{
		$this->db->insert('wallet_transactions', $data);

		if ($this->db->affected_rows() === 1) {
			return true;
			exit();
		} else {
			return false;
			exit();
		}
	}


	public function depositWalletBal($userId)
	{
		$transactions = $this->getWalletTransactions([
			'txn_user_id' => $userId,
			'txn_status' => 'APPROVED',
			'txn_type' => 'DEPOSIT'
		])->result();

		$amt = 0;

		foreach ($transactions as $transaction) {
			$amt = (float)$transaction->txn_req_amt;
		}

		$this->db->where('user_id', $userId);
		$user = $this->db->get('users');
		$user = $user->row();

		return $this->updateUser([
			'user_id' => $userId
		], [
			'user_wallet' => $user->user_wallet + number_format($amt, 2, '.', ''),
		]);
	}

	public function settleWalletBal($userId)
	{
		$transactions = $this->getWalletTransactions([
			'txn_user_id' => $userId,
			'txn_status' => 'APPROVED',
			'txn_type' => 'DEPOSIT'
		])->result();

		$amt = 0;
		foreach ($transactions as $transaction) {
			$amt += (float)$transaction->txn_amount;
		}

		return $this->updateUser([
			'user_id' => $userId
		], [
			'user_wallet' => number_format($amt, 2, '.', ''),
		]);
	}

	public function getWalletTransactions($condition = [])
	{
		if ($condition) {
			$this->db->where($condition);
		}

		return $this->db->get('wallet_transactions');
	}

	/**
	 * @return mixed
	 * @method use for get game types
	 */
	public function getGameType()
	{
		$result = $this->db->get('gametype');
		return $result->result();
	}

	/**
	 * @return mixed
	 * @method use for get games
	 */
	public function games()
	{

		$day = date('D');

		switch ($day) {
			case 'Sun':
				$result =  $this->db->select('id , title , sunday as day, sunday_start_time as open, sunday_close_time as close, status')->order_by('monday_start_time')->get('add_game');
				break;

			case 'Mon':
				$result =  $this->db->select('id , title , monday as day, monday_start_time as open, monday_close_time as close, status')->order_by('monday_start_time')->get('add_game');
				break;

			case 'Tue':
				$result =  $this->db->select('id , title , tuesday as day , tuesday_start_time as open, tuesday_close_time as close, status')->order_by('monday_start_time')->get('add_game');
				break;

			case 'Wed':
				$result =  $this->db->select('id , title , wednesday as day, wednesday_start_time as open , wednesday_close_time as close , status')->order_by('monday_start_time')->get('add_game');
				break;

			case 'Thu':
				$result =  $this->db->select('id , title , thursday as day, thursday_start_time as open, thursday_close_time as close , status')->order_by('monday_start_time')->get('add_game');
				break;

			case 'Fri':
				$result =  $this->db->select('id , title , friday as day, friday_start_time as open , friday_close_time as close , status')->order_by('monday_start_time')->get('add_game');
				break;

			case 'Sat':
				$result =  $this->db->select('id , title , saturday as day, saturday_start_time as open , saturday_close_time as close , status')->order_by('monday_start_time')->get('add_game');
				break;
		}

		//		print_r($result->result());

		return $result->result();
	}

	/**
	 * @param $id
	 * @return mixed
	 * @metho use for get bid number
	 */
	public function bid_number($id)
	{
		$result = $this->db->where('bn_game_id', $id)->get('bet_numbers');
		return $result->result();
	}

	/**
	 * @return bool
	 * @metho use for save bid data
	 */

	public function save_user_bid()
	{

		$number  = json_decode($this->input->post('txt'));
		$value   = json_decode($this->input->post('bid_value'));
		foreach ($number as $key => $item) {
			$data = array(
				'user_id' 		=> $this->input->post('user_id'),
				'game_id' 		=> $this->input->post('game_id'),
				'game_type' 	=> $this->input->post('game_type'),
				'bid_number' 	=> $item,
				'bid_value' 	=> $value[$key],
				'bid_type' 		=> $this->input->post('bid_types'),
				'created'          => date('Y-m-d h:i:s'),
			);

			$this->db->insert('add_bid', $data);
		}
		//		$this->wallet_update($this->input->post('user_id') , $this->input->post('total'));
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return  false;
		}
	}

	/**
	 * @return bool
	 * @metho use for save bid data
	 */

	public function save_user_bid_hf()
	{
		$num1 = json_decode($this->input->post('num1'));
		$num2 = json_decode($this->input->post('num2'));
		$pnt =  json_decode($this->input->post('pnt'));

		foreach ($pnt as $key => $item) {
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'game_id' => $this->input->post('game_id'),
				'game_type' => $this->input->post('game_type'),
				'bid_number' => $num1[$key],
				'bid_panel' =>  $num2[$key],
				'bid_value' => $item,
				'bid_type' => $this->input->post('bid_types'),
				'created'          => date('Y-m-d h:i:s'),
			);

			$this->db->insert('add_bid', $data);
		}
		//		$this->wallet_update($this->input->post('user_id') , $this->input->post('total_amount'));
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return  false;
		}
	}

	/**
	 * @return bool
	 * @post method use for insert payment in payment table initial
	 */
	public function payment_save($orderid)
	{

		$data = array(
			'amount'   => $this->input->get('amount'),
			'order_id' => $orderid,
			'order_status' => 'FAILED',
			'user_id'  => $this->input->get('user_id'),
		);

		$this->db->insert('payments', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return  false;
		}
	}

	/**
	 * @method save payment success
	 */
	public function get_payment_details($order_id, $status)
	{
		$paymentData = $this->db->where('order_id', $order_id)->get('payments')->row();

		$data = array(
			'order_status' => $status,
			'updated'      =>  date('Y-m-d h:i:s')
		);
		$this->db->where('order_id', $order_id);
		$this->db->update('payments', $data);
		if ($this->db->affected_rows() > 0) {
			$userData  = $this->db->where('user_id', $paymentData->user_id)->get('users')->row();
			$datas['user_wallet'] = $userData->user_wallet + $paymentData->amount;
			$this->db->where('user_id', $paymentData->user_id)->update('users', $datas);

			return true;
		} else {
			return  false;
		}
	}


	//	/**
	//	 * @return bool
	//	 * @post method use for insert payment in payment table initial
	//	 */
	//	public function payment_save_web($data){
	//		$this->db->insert('payments' , $data);
	//		if($this->db->affected_rows() > 0) {
	//			$userData  = $this->db->where('user_id' , $this->input->post('user_id'))->get('users')->row();
	//			$datas['user_wallet'] = $userData->user_wallet + $this->input->post('amount');
	//			$this->db->where('user_id' , $this->input->post('user_id'))->update('users', $datas);
	//
	//			return true;
	//		}
	//		else{
	//			return  false;
	//		}
	//	}

	/**
	 * @return bool
	 * @post method use for insert payment in payment table initial
	 */
	public function payment_save_web($orderid)
	{

		$data = array(
			'amount'   => $this->input->post('points'),
			'order_id' => $orderid,
			'order_status' => 'FAILED',
			'user_id'  => $this->input->post('id'),
		);

		$this->db->insert('payments', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return  false;
		}
	}
}
