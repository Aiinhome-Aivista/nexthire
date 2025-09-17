<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function getTopHiringEmployers($limit = 5)
    {
        $this->db->select('employer_id, company, COUNT(*) as total_jobs');
        $this->db->from('posted_jobs');
        $this->db->group_by('employer_id');
        $this->db->order_by('total_jobs', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function getFeaturedCompanies($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('featured_companies');
        $this->db->where('is_featured', 1);
        $this->db->order_by('rating', 'DESC');       
        $this->db->order_by('reviews', 'DESC'); 
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

}