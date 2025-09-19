<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruiter_dashboard_model extends CI_Model
{

    public function count_total_applications($employer_id)
    {
        $this->db->select('COUNT(applied_jobs.id) as total');
        $this->db->from('applied_jobs');
        $this->db->join('posted_jobs', 'applied_jobs.jobpost_id = posted_jobs.id');
        $this->db->where('posted_jobs.employer_id', $employer_id);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function get_employer($employer_id)
    {
        $this->db->where('id', $employer_id);
        $query = $this->db->get('employer_register');
        return $query->row();
    }

    public function count_active_jobs($employer_id)
    {
        // Get today's date in 'Y-m-d' format
        $today = date('Y-m-d');
        $this->db->where('employer_id', $employer_id);
        $this->db->where('last_date >=', $today);
        return $this->db->count_all_results('posted_jobs');
    }
    
    public function count_job_posts($employer_id)
    {
        $this->db->where('employer_id', $employer_id);
        return $this->db->count_all_results('posted_jobs');
    }


    public function get_recent_jobs($employer_id, $limit = 5)
    {
        $this->db->where('employer_id', $employer_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('posted_jobs');
        return $query->result();
    }

}
