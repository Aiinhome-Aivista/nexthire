<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_management_model extends CI_Model
{

    public function get_all_employers()
    {
        $this->db->select('*');
        $query = $this->db->get('employer_register');
        return $query->result();
    }

    public function count_employers()
    {
        return $this->db->count_all('employer_register');
    }


    public function delete($id)
    {
        return $this->db->delete('employer_register', ['id' => $id]);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('employer_register', $data);
    }
}
