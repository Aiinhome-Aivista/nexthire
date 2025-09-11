<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserAvailability($user_id) {
        $this->db->select('is_available');
        $this->db->from('user_profiles');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->is_available;
        }
        return false;
    }

    public function updateUserAvailability($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_profiles');

        if ($query->num_rows() > 0) {
            $this->db->where('user_id', $user_id);
            $this->db->update('user_profiles', $data);
            return $this->db->affected_rows() > 0;
        } else {
            $data['user_id'] = $user_id;
            $this->db->insert('user_profiles', $data);
            return $this->db->insert_id() > 0;
        }
    }
}