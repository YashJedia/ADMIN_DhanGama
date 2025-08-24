<?php
class Functions{

	public function  __construct()
	{
		$this->CI =& get_instance();


	}

	public function check_result($game_id , $date){

		$result = $this->CI->Admin_model->check_result($game_id , $date);

		return $result;

	}

	public function check_result_bid($game_id , $date){

		$result = $this->CI->Admin_model->check_result_bid($game_id , $date);
		return $result;

	}

	public function win_settled($userid = null , $bidId = null) {
		$data = $this->CI->Admin_model->get_bid_details($userid , $bidId);
	}

	/**
	 * @return mixed
	 * @method use for get data of settings
	 */
	public function getSettingData(){
		$data = $this->CI->Admin_model->getSetting();
		return $data;
	}

	public function getUserData($userid) {
		$data = $this->CI->Admin_model->getUserDetailByUserId($userid);
		return $data;
	}

}
