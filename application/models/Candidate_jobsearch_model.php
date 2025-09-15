<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_jobsearch_model extends CI_Model
{

    public function get_jobs($filters = [])
    {
        $this->db->select('*');
        $this->db->from('posted_jobs');

        if (!empty($filters['job'])) {
            $this->db->like('title', $filters['job']);
        }

        if (!empty($filters['location'])) {
            $this->db->where('location', $filters['location']);
        }

        if (!empty($filters['company'])) {
            $this->db->where('company', $filters['company']);
        }

        if (!empty($filters['industry'])) {
            $this->db->where('industry', $filters['industry']);
        }

        if (!empty($filters['job_type'])) {
            $this->db->where('job_type', $filters['job_type']);
        }

        if (!empty($filters['work_mode'])) {
            $this->db->where('work_mode', $filters['work_mode']);
        }

        if (!empty($filters['experience'])) {
            $this->db->like('experience', $filters['experience']);
            // (Later: better to store min/max experience as integers for proper range filtering)
        }

        if (!empty($filters['salary'])) {
            // Example: salary filter is "300000+" → strip "+" and compare
            $minSalary = intval(str_replace('+', '', $filters['salary']));
            $this->db->where("CAST(REPLACE(REPLACE(salary, '₹',''), ',', '') AS UNSIGNED) >=", $minSalary);
        }

        return $this->db->get()->result_array();
    }

    public function get_job_by_id($id)
    {
        return $this->db->get_where('posted_jobs', ['id' => $id])->row_array();
    }
}
