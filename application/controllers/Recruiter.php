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

        // Check if user exists
        $user = $this->Recruiter_model->get_user_by_email($userData['email']);

        // If not, create user
        if (!$user) {
            $user_id = $this->Recruiter_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'full_name' => $userData['name'],
                'picture' => $userData['picture'],
                'provider' => $userData['provider'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user = $this->Recruiter_model->get_user_by_id($user_id);
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
