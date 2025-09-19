<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Featured_companies_model extends CI_Model
{

    public function get_all_featured_companies()
    {
        $this->db->select('*');
        $query = $this->db->get('featured_companies');
        return $query->result();
    }

    public function count_featured_jobs()
    {
        return $this->db->count_all('featured_companies');
    }

    public function delete($id)
    {
        return $this->db->delete('featured_companies', ['id' => $id]);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('featured_companies', $data);
    }
}