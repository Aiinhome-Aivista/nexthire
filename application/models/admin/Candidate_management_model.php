<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_management_model extends CI_Model
{

    public function get_all_candidates()
    {
        $this->db->select('*');
        $this->db->order_by('full_name', 'ASC');
        $query = $this->db->get('register');
        return $query->result();
    }

    // Add this new method to count candidates
    public function count_candidates()
    {
        return $this->db->count_all('register');
    }


    //Delete candidate by ID
    public function delete_candidate($id)
    {
        return $this->db->delete('register', ['id' => $id]);
    }

    public function update_candidate($id, $data)
    {
        return $this->db->where('id', $id)->update('register', $data);
    }
}
