<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_candidate_model extends CI_Model
{
    public function get_all_candidates()
    {
        return $this->db
            ->order_by('created_at', 'DESC')
            ->get('register')
            ->result();
    }

    public function get_candidate_by_id($id) {
        return $this->db->get_where('register', ['id' => $id])->row();
    }

    public function update_candidate($id, $data) {
        return $this->db->where('id', $id)->update('register', $data);
    }

    public function delete_candidate($id) {
        return $this->db->where('id', $id)->delete('register');
    }

}
