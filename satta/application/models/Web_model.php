<?php

class Web_model extends CI_model
{


    /**
     * @method use for admin login
     */
    public function login($username, $password)
	{

		$this->db->where('user_username', $username);
		$this->db->where('user_status', 'ENABLED');
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

	//  @method to fetch data for webpage from the  user database created by minni
    
    public function fetch_data_web(){
        $this->db->select('*');
        $show = $this->db->get('users');
        return $show->result_array();
	}
	
	public function fetch_single_data_game($id){
        $this->db->select('*');
        $show = $this->db->where('user_id', $id)->get('users');
        return $show->row();
	}

	
	
	function fetch_pass($session_id)
	{
	$fetch_pass=$this->db->query("select * from users where user_id='$session_id'");
	$res=$fetch_pass->result();
	}
	
	function change_pass($session_id,$new_pass)
	{
	$update_pass=$this->db->query("UPDATE users set user_password='$new_pass'  where user_id='$session_id'");
	}

	//  To insert the data into the withdraw-deposit request
    public function create_withdepo($data) {

        $result = $this->db->insert('wallet_transactions' , $data);
        if($this->db->affected_rows() > 0 ) {
            return true;
        }
        else {
            return false;
        }
	}
	
	// to fetch data for transaction status
	public function fetch_single_trans_data($id){
		$this->db->select('wallet_transactions.* , users.user_wallet');
        $this->db->from('wallet_transactions');
        $this->db->join('users' , 'wallet_transactions.txn_user_id = users.user_id');
        $show = $this->db->where('txn_user_id ', $id)->get();
        return $show->result_array();
    }

	/**
	 * @return bool
	 * @metho use for save bid data
	 */

    public function save_user_bid() {

		foreach ($this->input->post('txt') as $key => $item) {
			if($item > 0) {
				$data = array(
					'user_id' => $this->input->post('user_id'),
					'game_id' => $this->input->post('game_name'),
					'game_type' => $this->input->post('s'),
					'bid_number' => $_POST['number'][$key],
					'bid_value' => $item,
					'bid_type' => $this->input->post('bid_types'),
				);

				$this->db->insert('add_bid', $data);
			}
    	}
//		$this->wallet_update($this->input->post('user_id') , $this->input->post('total'));
		if($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return  false;
		}
	}

	/**
	 * @return bool
	 * @metho use for save bid data
	 */

	public function save_user_bid_hf() {

		foreach ($this->input->post('pnt') as $key => $item) {
			if($item > 0) {
				$data = array(
					'user_id' => $this->input->post('user_id'),
					'game_id' => $this->input->post('game_name'),
					'game_type' => $this->input->post('s'),
					'bid_number' => $_POST['num1'][$key],
					'bid_panel' => $_POST['num2'][$key],
					'bid_value' => $item,
					'bid_type' => $this->input->post('bid_types'),
				);

				$this->db->insert('add_bid', $data);
			}
		}
//		$this->wallet_update($this->input->post('user_id') , $this->input->post('total_amount'));
		if($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return  false;
		}
	}

	/**
	 * @param $userid
	 * @param $total
	 * @return bool
	 * @method use for update user wallet data
	 */
	public function wallet_update($userid , $total){
    	$userData = $this->fetch_single_data_game($userid);
    	$data['user_wallet'] = $userData->user_wallet - $total;
    	$this->db->where('user_id' , $userid)->update('users', $data);
		if($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return  false;
		}
	}

	/**
	 * @param $user
	 * @return mixed
	 */
	public function get_my_bid($user) {
		$this->db->select('ab.* ,u.user_username,u.user_mobile,u.user_email,ag.title,gt.gt_name');
		$this->db->from('add_bid  ab');
		$this->db->join('users  u','u.user_id = ab.user_id','inner');
		$this->db->join('add_game  ag','ag.id = ab.game_id','inner');
		$this->db->join('gametype  gt','gt.gt_id = ab.game_type','inner');
		$this->db->where('ab.user_id' , $user);
		$this->db->order_by('id' , 'desc');
		return $this->db->get()->result();
	}
}
