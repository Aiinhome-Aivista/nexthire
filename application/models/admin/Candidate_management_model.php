<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_management_model extends CI_Model {

    public function get_all_candidates() {
        $this->db->select('*');
        $query = $this->db->get('register');
        return $query->result();
    }
}