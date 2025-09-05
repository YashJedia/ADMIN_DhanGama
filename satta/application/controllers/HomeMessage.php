<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeMessage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // GET: /index.php/HomeMessage/get_message
    public function get_message() {
        $query = $this->db->get_where('settings', ['key' => 'home_message']);
        $row = $query->row();
        $message = $row ? $row->value : 'Welcome to DHAN GAMA ENTERTAINMENT APP!';
        echo json_encode(['message' => $message]);
    }

    // POST: /index.php/HomeMessage/update_message
    public function update_message() {
        $input = json_decode(file_get_contents('php://input'), true);
        error_log('POST DATA: ' . print_r($input, true)); // Debug POST data
        $message = isset($input['message']) ? $input['message'] : '';
        if ($message) {
            $this->db->where('key', 'home_message');
            $exists = $this->db->get('settings')->row();
            if ($exists) {
                $result = $this->db->update('settings', ['value' => $message], ['key' => 'home_message']);
            } else {
                $result = $this->db->insert('settings', ['key' => 'home_message', 'value' => $message]);
            }
            error_log('DB RESULT: ' . print_r($result, true)); // Debug DB result
            echo json_encode(['success' => (bool)$result]);
        } else {
            error_log('ERROR: Message required');
            echo json_encode(['success' => false, 'error' => 'Message required']);
        }
    }
}
