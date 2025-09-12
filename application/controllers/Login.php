<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->helper('url');

    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Login_model->get_user($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'user_name' => $user->full_name,
                'user_email' => $user->email,
                'user_mobile' => $user->mobile_number,
                'logged_in' => TRUE
            ]);

            redirect(base_url('profile'));
        } else {
            echo "Invalid username or password!";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function google_callback()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        if (!$userData || !isset($userData['email'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid data']);
            return;
        }

        // Check if user exists
        $user = $this->Login_model->get_user_by_email($userData['email']);

        // Define upload path for profile photos
        $upload_path = FCPATH . 'assets/profile_photos/';
        // Download and save Google profile picture locally
        $picture_url = $userData['picture'];
        $image_info = pathinfo($picture_url);
        $ext = isset($image_info['extension']) ? $image_info['extension'] : 'jpg'; // default to jpg if no ext

        // Generate unique filename
        $file_name = uniqid('profile_', true) . '.' . $ext;
        $file_path = $upload_path . $file_name;

        // Download image
        $image_content = @file_get_contents($picture_url);

        if ($image_content !== false) {
            // Save image locally
            file_put_contents($file_path, $image_content);
        } else {
            // If download fails, fallback to empty string or default image
            $file_name = '';
        }

        // If not, create user
        if (!$user) {
            $user_id = $this->Login_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'full_name' => $userData['full_name'],
                'picture' => $file_name,
                'provider' => $userData['provider'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user = $this->Login_model->get_user_by_id($user_id);
        }  else {
        // Update profile photo if new one downloaded successfully
        if ($file_name) {
            // Get existing photo filename for cleanup
            $existing_photo = $this->Login_model->get_profile_photo($user['id']);

            if ($existing_photo && file_exists($upload_path . $existing_photo)) {
                unlink($upload_path . $existing_photo);
            }

            $this->Login_model->update_profile_photo($user['id'], $file_name);

            // Update user's picture field in user data for session
            $user['picture'] = $file_name;
        }
    }


        // Set session
        $this->session->set_userdata([
            'user_id' => $user['id'],
            'user_name' => $user['full_name'],
            'user_email' => $user['email'],
            'user_picture' => $user['picture'],
            'logged_in' => TRUE
        ]);

        echo json_encode(['success' => true]);
    }
}