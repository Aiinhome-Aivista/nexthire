<?php
class Login_model extends CI_Model
{

    public function get_user($username)
    {
        $this->db->where('email', $username);
        $query = $this->db->get('register');
        return $query->row();
    }


    // For Google login: get user by email
    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('register')->row_array();
    }

    // For session fetch by ID
    public function get_user_by_id($id)
    {
        return $this->db->where('id', $id)->get('register')->row_array();
    }

    // Insert Google user
    public function insert_google_user($data)
    {
        $this->db->insert('register', $data);
        return $this->db->insert_id();
    }


    // Profile photo methods
    public function get_profile_photo($user_id)
    {
        // $result = $this->db->get_where('profile_photos', ['user_id' => $user_id])->row_array();
        // return $result ? 'assets/profile_photos/' . $result['file_name'] : null;

         $result = $this->db->get_where('profile_photos', ['user_id' => $user_id])->row_array();
        return $result ? '../All_Uploads/profile_photos/' . $result['file_name'] : null;
    }

    public function save_profile_photo($user_id, $file_name)
    {
        $data = [
            'user_id' => $user_id,
            'file_name' => $file_name,
            'uploaded_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('profile_photos', $data);
    }

    public function update_profile_photo($user_id, $file_name)
    {
        $data = [
            'file_name' => $file_name,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('user_id', $user_id)->update('profile_photos', $data);
        return $this->db->affected_rows() > 0;
    }


    public function verify_email()
    {
        $email = $this->input->post('email');
        $user = $this->Login_model->get_user_by_email($email);

        if ($user) {
            // Store the email in a session for the next step
            $this->session->set_tempdata('reset_email', $email, 300); // Expires in 5 minutes
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Email not found.']);
        }
    }

    public function update_password($email, $hashed_password)
    {
        $data = [
            'password' => $hashed_password
        ];

        $this->db->where('email', $email);
        $this->db->update('register', $data);

        return $this->db->affected_rows() > 0;
    }

}
