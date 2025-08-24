<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubAdmin extends CI_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Admin_model', 'adminModel');
		if (!$this->session->has_userdata('is_admin_login')) {
			redirect(base_url('admin-login'), 'refresh');
		}
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

		$this->load->view('subadmin/dashboard', compact('totalUsers', 'newUser', 'totalDebit', 'totalConfirmDeposit', 'todayConfirmDeposit', 'todayWithdrawalRequest', 'todayConfirmWithdrawalRequest', 'totalWithdrawalRequest', 'totalConfirmWithdrawalRequest'));
	}

//Add Result and Game Result List of Current date
	public function add_result()
	{
		$this->load->model('Admin_model', 'adminModel');
		$games = $this->adminModel->getAllGames();
		$result = $this->adminModel->get_result();

		$this->load->view('subadmin/add_result', compact('games', 'result'));
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


	public function change_password()
	{


		$this->load->view('subadmin/change_password');

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
				redirect(base_url('subadmin/change_password'));
			} else {

				$this->session->set_flashdata('errors', 'Something miss matched !');
				redirect(base_url('subadmin/change_password'));
			}
		}
	}

}
