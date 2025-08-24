<?php

class Register_model extends CI_model
{


    /**
     * @method use for admin login
     */
    public function register($data) {

        $result = $this->db->insert('users' , $data);
        if($this->db->affected_rows() > 0 ) {
            return true;
        }
        else {
            return false;
        }
        
    }
}