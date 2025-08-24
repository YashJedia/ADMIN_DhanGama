<?php

class Login_model extends CI_model
{


    /**
     * @method use for admin login
     */
    public function admin_login() {

        $result = $this->db->where(['username' => $this->input->post('email') , 'password' => sha1($this->input->post('password')) ] )->get('admin');
        return $result;
        
    }



}
