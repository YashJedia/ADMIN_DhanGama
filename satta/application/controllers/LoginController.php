<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_controller{

    public function __construct() {
        parent::__construct();

        if($this->session->has_userdata('is_admin_login')){
            redirect(base_url('admin-dashboard'), 'refresh');
        }
    }

    //login view
    public function index()
    {
        $this->load->view('admin/login');
    }


    /**
     * @method use for login check for admin
     */

    public function login_submit(){


        $this->load->model('Login_model');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data = array(
                'errors' => validation_errors()
            );
                $this->session->set_flashdata('error', $data['errors']);
                redirect(base_url('admin-login'),'refresh');

        }

        $result = $this->Login_model->admin_login();
        if($result->num_rows() > 0) {
            $results = $result->row();
           
            $admin_data = array(
                'admin_id' => $results->id,
                'username' => $results->username,
                'is_admin_login' => TRUE,
                'admin_type' => $results->admin_type,
                );
                $this->session->set_userdata($admin_data);

                if($results->admin_type === 'SUPERADMIN') {
                    redirect(base_url('admin-dashboard'), 'refresh');
                }
                elseif($results->admin_type === 'ADMIN'){
                    redirect(base_url('subadmin-dashboard'), 'refresh');   
                }
        }
        else{
            $this->session->set_flashdata('errors', 'Invalid Email or Password!');
            redirect(base_url('admin-login'));
        }

    
    }


}
