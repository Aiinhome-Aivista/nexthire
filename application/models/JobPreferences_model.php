<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPreferences_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_profile($user_id)
{
    // First, fetch the user's main profile data from the `user_profiles` table.
    $profile_query = $this->db->get_where('user_profiles', ['user_id' => $user_id]);
    $user_profile_data = $profile_query->row_array();

    // Check if a profile was found.
    if (!empty($user_profile_data)) {
        // Now, fetch all job types from the `user_job_types` table that belong to this user.
        // The foreign key `user_profiles.id` is linked to `user_job_types.user_id`.
        $job_types_query = $this->db->get_where('user_job_types', ['user_id' => $user_profile_data['id']]);
        $job_types_results = $job_types_query->result_array();

        // Extract the 'job_type' values into a simple array.
        $job_types = array_column($job_types_results, 'job_type');

        // Add the job types to the main profile data array.
        $user_profile_data['job_types'] = json_encode($job_types);
    }
    
    return $user_profile_data;
}
    
    public function get_user_job_types($user_id) {
        // You need to get the profile_id first.
        $profile_id = $this->db->select('id')->get_where('user_profiles', ['user_id' => $user_id])->row('id');
        
        if (!$profile_id) {
            return []; // No profile, no job types
        }
        
        $this->db->select('job_type');
        $this->db->where('user_id', $profile_id); // Use the profile's ID, not the user's session ID
        $query = $this->db->get('user_job_types');
        
        if ($query->num_rows() > 0) {
            return array_column($query->result_array(), 'job_type');
        }
        return [];
    }

    public function update_user_profile($user_id, $data) {
        // Check if profile exists, if not, create it first
        $profile_exists = $this->db->get_where('user_profiles', ['user_id' => $user_id])->num_rows() > 0;
        if (!$profile_exists) {
            $this->create_user_profile($user_id);
        }
        
        $this->db->where('user_id', $user_id);
        return $this->db->update('user_profiles', $data);
    }

    public function update_job_types($user_id, $job_types) {
        $this->db->trans_start();

        // Get the profile ID first to use in the child table
        $profile = $this->db->get_where('user_profiles', ['user_id' => $user_id])->row_array();
        
        // If profile doesn't exist, create it.
        if (empty($profile)) {
            $profile_id = $this->create_user_profile($user_id);
            if (!$profile_id) {
                $this->db->trans_rollback();
                return false;
            }
        } else {
            $profile_id = $profile['id'];
        }

        // Delete existing job types for the user based on the profile_id
        $this->db->where('user_id', $profile_id);
        $this->db->delete('user_job_types');

        // Insert new job types if provided
        if (!empty($job_types) && is_array($job_types)) {
            $insert_data = [];
            foreach ($job_types as $type) {
                $insert_data[] = [
                    'user_id' => $profile_id, // THIS IS THE CRITICAL CHANGE
                    'job_type' => $type
                ];
            }
            if (!empty($insert_data)) {
                $this->db->insert_batch('user_job_types', $insert_data);
            }
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    // A helper function to create an initial profile if one doesn't exist
    public function create_user_profile($user_id) {
        // Prevent duplicate entries
        $exists = $this->db->get_where('user_profiles', ['user_id' => $user_id])->row_array();
        if (!$exists) {
            $data = ['user_id' => $user_id];
            $this->db->insert('user_profiles', $data);
            return $this->db->insert_id();
        }
        return $exists['id']; // Return the existing ID if it already exists
    }
}