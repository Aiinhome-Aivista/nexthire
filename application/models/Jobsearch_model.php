<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobsearch_model extends CI_Model {

    public function get_jobs($filters = []) {
        $this->db->select('*');
        $this->db->from('posted_jobs');

        if (!empty($filters['job'])) {
            $this->db->like('title', $filters['job']);
            $this->db->or_like('company', $filters['job']);
        }

        if (!empty($filters['location'])) {
            $this->db->like('location', $filters['location']);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_job_by_id($id) {
        return $this->db->get_where('posted_jobs', ['id' => $id])->row_array();
    }
}
