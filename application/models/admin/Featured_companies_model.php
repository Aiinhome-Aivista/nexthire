<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Featured_companies_model extends CI_Model
{
    public function get_all_employers()
    {
        $this->db->select('id, full_name');
        $this->db->from('employer_register');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_company()
    {
        $this->db->select('company');
        $this->db->from('employer_register');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_featured_companies_with_job_count()
    {
        $this->db->select('fc.*, IFNULL(th.is_top_hiring, 0) as is_top_hiring, COUNT(jp.id) as active_hiring_count');
        $this->db->from('featured_companies fc');
        $this->db->join('posted_jobs jp', 'jp.employer_id = fc.employer_id AND jp.last_date >= CURDATE()', 'left');
        $this->db->join('top_hiring_companies th', 'th.employer_id = fc.employer_id', 'left');
        $this->db->group_by('fc.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_company_by_id($id)
    {
        $this->db->select('fc.*, IFNULL(th.is_top_hiring, 0) as is_top_hiring, COUNT(jp.id) as active_hiring_count');
        $this->db->from('featured_companies fc');
        $this->db->join('posted_jobs jp', 'jp.employer_id = fc.employer_id AND jp.last_date >= CURDATE()', 'left');
        $this->db->join('top_hiring_companies th', 'th.employer_id = fc.employer_id', 'left');
        $this->db->where('fc.id', $id);
        $this->db->group_by('fc.id');
        $query = $this->db->get();
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('featured_companies');
        return $this->db->affected_rows() > 0;
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('featured_companies', $data);
    }

    public function update_top_hiring($employer_id, $data)
    {
        $this->db->where('employer_id', $employer_id);
        $query = $this->db->get('top_hiring_companies');
        if ($query->num_rows() > 0) {
            $this->db->where('employer_id', $employer_id);
            return $this->db->update('top_hiring_companies', $data);
        } else {
            return $this->db->insert('top_hiring_companies', $data);
        }
    }

    public function insert($data)
    {
        return $this->db->insert('featured_companies', $data);
    }
}