<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_profile_model extends CI_Model {

    public function get_employer_by_id($id) {
        return $this->db->get_where('employer_register', ['id' => $id])->row_array();
    }

}
