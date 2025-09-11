<?php
class Login_model extends CI_Model {

    public function get_user($username) {
        $this->db->where('email', $username);
        $query = $this->db->get('register');
        return $query->row();
    }

    
    // For Google login: get user by email
    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('users')->row_array();
    }

    // For session fetch by ID
    public function get_user_by_id($id)
    {
        return $this->db->where('id', $id)->get('users')->row_array();
    }

    // Insert Google user
    public function insert_google_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

}
