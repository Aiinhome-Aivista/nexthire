<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter_dashboard_model extends CI_Model {

    public function get_recent_jobs($limit = 5) {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('posted_jobs');
        return $query->result();
    }
}
