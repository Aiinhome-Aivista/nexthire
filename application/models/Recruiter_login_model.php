<?php
class Recruiter_login_model extends CI_Model {

    public function get_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('employer_register');
        return $query->row();
    }
     // For Google login: get user by email
    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('employer_register')->row_array();
    }

    // For session fetch by ID
    public function get_user_by_id($id)
    {
        return $this->db->where('id', $id)->get('employer_register')->row_array();
    }

    // Insert Google user
    public function insert_google_user($data)
    {
        $data = array_merge([
            'full_name' => '',
            'password' => '',           // Use '' not null
            'mobile_number' => null,
            'company' => null,          // since Google users won't supply
            'designation' => null,      // These can be updated later from profile
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], $data);


        $this->db->insert('employer_register', $data);
        return $this->db->insert_id();
    }
}
