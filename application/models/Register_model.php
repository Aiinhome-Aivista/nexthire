<?php
class Register_model extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('register', $data);
        return $this->db->insert_id();
    }
    // For Google login: get user by email and normally registered users
    public function get_user_by_email($email)
    {
        return $this->db->get_where('register', ['email' => $email])->row_array();
    }


    // For session fetch by ID
    public function get_user_by_id($id)
    {
        return $this->db->where('id', $id)->get('register')->row_array();
    }

    // Insert Google user
    // public function insert_google_user($data)
    // {
    //     $this->db->insert('register', $data);
    //     return $this->db->insert_id();
    // }
    // public function insert_google_user($data)
    // {
    //     // Fill missing keys with default values to match your DB columns
    //     $data = array_merge([
    //         'full_name' => '',           // must not be empty ideally, set Google's user.displayName here
    //         'password' => null,          // Google users have no password
    //         'mobile_number' => null,     // optional, can be null initially
    //         'work_status' => null,       // optional or set a default
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ], $data);

    //     $this->db->insert('register', $data);
    //     return $this->db->insert_id();
    // }
    public function insert_google_user($data)
    {
        $data = array_merge([
            'full_name' => '', // should be set by above
            'password' => null,
            'mobile_number' => null,
            // 'work_status' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], $data);

        $this->db->insert('register', $data);
        return $this->db->insert_id();
    }

}