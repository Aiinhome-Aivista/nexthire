<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPreferences_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_profile($user_id) {
        // Change 'id' to 'user_id' to match the column name
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_profiles');
        return $query->row_array();
    }
    
    public function get_user_job_types($user_id) {
        $this->db->select('job_type');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_job_types');
        return array_column($query->result_array(), 'job_type');
    }

    public function update_user_profile($user_id, $data) {
        // Change 'id' to 'user_id' to match the column name
        $this->db->where('user_id', $user_id);
        return $this->db->update('user_profiles', $data);
    }

    public function update_job_types($user_id, $job_types) {
        $this->db->trans_start();

        // 1. Delete existing job types for the user
        $this->db->where('user_id', $user_id);
        $this->db->delete('user_job_types');

        // 2. Insert new job types if provided
        if (!empty($job_types)) {
            $insert_data = [];
            foreach ($job_types as $type) {
                $insert_data[] = [
                    'user_id' => $user_id,
                    'job_type' => $type
                ];
            }
            $this->db->insert_batch('user_job_types', $insert_data);
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    // A helper function to create an initial profile if one doesn't exist
    public function create_user_profile($user_id) {
        // Change 'id' to 'user_id' to match the foreign key constraint
        $data = ['user_id' => $user_id];
        $this->db->insert('user_profiles', $data);
        return $this->db->insert_id();
    }
}