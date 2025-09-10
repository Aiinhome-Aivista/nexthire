<?php
class Register_model extends CI_Model {

    public function insert($data) {
        $this->db->insert('register', $data);
        return $this->db->insert_id();
    }

    public function get_user_by_email($email) {
        
        return $this->db->get_where('register', ['email' => $email])->row_array();

    }
}