<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_candidate_model extends CI_Model
{
    // Get candidates who applied to jobs posted by employer
    public function get_candidates_by_employer($employer_id, $limit, $offset)
    {
        $this->db->select('
            applied_jobs.id as application_id,
            posted_jobs.title as job_position,
            register.full_name,
            register.email,
            register.mobile_number,
            register.work_status as work_experience,
            resumes.file_name as resume_file,
            resumes.file_path as resume_path,
            applied_jobs.application_status
        ');
        $this->db->from('applied_jobs');
        $this->db->join('posted_jobs', 'applied_jobs.jobpost_id = posted_jobs.id');
        $this->db->join('register', 'applied_jobs.user_id = register.id');
        $this->db->join('resumes', 'register.id = resumes.user_id', 'left');
        $this->db->where('posted_jobs.employer_id', $employer_id);
        $this->db->order_by('applied_jobs.applied_at', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result();
    }

    public function count_candidates_by_employer($employer_id)
    {
        $this->db->from('applied_jobs');
        $this->db->join('posted_jobs', 'applied_jobs.jobpost_id = posted_jobs.id');
        $this->db->where('posted_jobs.employer_id', $employer_id);
        return $this->db->count_all_results();
    }

    public function update_application_status($application_id, $status)
    {
        $this->db->where('id', $application_id);
        return $this->db->update('applied_jobs', ['application_status' => $status]);
    }

    public function get_application_by_id($application_id)
    {
        $this->db->select('applied_jobs.id, applied_jobs.application_status, register.full_name, register.email, posted_jobs.title as job_position, posted_jobs.company');
        $this->db->from('applied_jobs');
        $this->db->join('register', 'applied_jobs.user_id = register.id');
        $this->db->join('posted_jobs', 'applied_jobs.jobpost_id = posted_jobs.id');
        $this->db->where('applied_jobs.id', $application_id);
        $query = $this->db->get();
        return $query->row_array();
    }


}
