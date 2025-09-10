<?php
class Recruiter_model extends CI_Model {

    public function insert_recruiter($data) {
        $this->db->insert('employer_register', $data);
        return $this->db->insert_id();
    }
}