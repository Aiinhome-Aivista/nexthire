<?php
class Login_model extends CI_Model {

    public function get_user($username) {
        $this->db->where('email', $username);
        $query = $this->db->get('register');
        return $query->row();
    }
}
