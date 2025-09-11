<?php
class Recruiter_post_model extends CI_Model {

     public function insert_job($data) {
        $this->db->insert('posted_jobs', $data);
         return $this->db->insert_id();
    }
}