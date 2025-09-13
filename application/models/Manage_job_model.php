<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_job_model extends CI_Model
{
    public function get_all_jobs($employer_id)
    {
        return $this->db->where('employer_id', $employer_id)
            ->order_by('created_at', 'DESC')
            ->get('posted_jobs')
            ->result();
    }

}
