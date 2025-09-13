<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_management_model extends CI_Model {

    public function get_all_employers() {
        $this->db->select('*');
        $query = $this->db->get('employer_register');
        return $query->result();
    }

    public function count_employers()
    {
        return $this->db->count_all('employer_register');
    }
}