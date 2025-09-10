<?php
class Recruiter_login_model extends CI_Model {

    public function get_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('employer_register');
        return $query->row();
    }
}
