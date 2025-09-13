<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_candidate_model extends CI_Model
{
    public function get_all_candidates()
    {
        return $this->db->get('register')->result();
    }

}
