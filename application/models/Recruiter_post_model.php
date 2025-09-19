<?php
class Recruiter_post_model extends CI_Model {

     public function insert_job($data) {
        $this->db->insert('posted_jobs', $data);
         return $this->db->insert_id();
    }
    
     public function get_company_name($employer_id)
     {
          $this->db->select('company');
          $this->db->where('id', $employer_id);
          $query = $this->db->get('employer_register');
          return $query->row();
     }
}