<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_profile_model extends CI_Model
{

    public function get_employer_by_id($id)
    {
        return $this->db->get_where('employer_register', ['id' => $id])->row_array();
    }

    public function getEmployerById($id)
    {
        return $this->db->where('id', $id)->get('employer_register')->row_array();
    }

    public function updateEmployer($id, $data)
    {
        return $this->db->where('id', $id)->update('employer_register', $data);
    }

}
