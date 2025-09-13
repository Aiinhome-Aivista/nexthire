<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruiter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Recruiter_model');
    }

    public function index()
    {
        $this->load->view('recruiter_register'); // recruiter registration view
    }


    public function submit()
    {
        $plainPassword = $this->input->post('password');

        $data = [
            'full_name' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'company' => $this->input->post('company'),
            'designation' => $this->input->post('designation'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'mobile_number' => $this->input->post('mobile'),
        ];

        $insert_id = $this->Recruiter_model->insert_recruiter($data);


        if ($insert_id) {
            // Load email service library
            $this->load->library('emailservice');
            $emailSent = $this->emailservice->sendWelcomeEmail($data['email'], $data['full_name'], $plainPassword, 'recruiter_welcome_email');

            if ($emailSent) {
                $this->session->set_flashdata('success', 'Registration successful! A welcome email has been sent to your email address.');
            } else {
                $this->session->set_flashdata('success', 'Registration successful! However, we could not send the welcome email.');
            }

            redirect(base_url('employer_login'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong with your registration. Please try again.');
            redirect(base_url('employer_register'));
        }
    }

    public function google_callback()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        if (!$userData || !isset($userData['email'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid data']);
            return;
        }
       
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


        // Check if user exists
        $user = $this->Recruiter_model->get_user_by_email($userData['email']);

        // If not, create user
        if (!$user) {
            $user_id = $this->Recruiter_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'full_name' => $userData['full_name'],
                'picture' => $file_name,
                'provider' => $userData['provider'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->Recruiter_model->save_profile_photo($user_id, $file_name); // <--- Add this line
            $user = $this->Recruiter_model->get_user_by_id($user_id);
        } else {
            // Update profile photo if new one downloaded successfully
            if ($file_name) {
                // Get existing photo filename for cleanup
                $existing_photo = $this->Recruiter_model->get_profile_photo($user['id']);

                if ($existing_photo && file_exists($upload_path . $existing_photo)) {
                    unlink($upload_path . $existing_photo);
                }

                $this->Recruiter_model->update_profile_photo($user['id'], $file_name);

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
