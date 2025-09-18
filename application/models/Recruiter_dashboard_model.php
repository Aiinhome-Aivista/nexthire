<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruiter_dashboard_model extends CI_Model
{

    public function count_candidates()
    {
        return $this->db->count_all('register');
    }

    public function count_job_posts()
    {
        return $this->db->count_all('posted_jobs');
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
