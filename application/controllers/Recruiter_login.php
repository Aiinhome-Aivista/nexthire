<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recruiter_login_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    // Show Login Page
    public function index() {
        $this->load->view('recruiter_login');
    }

    // Handle Login Form Submission
    public function submit() {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $recruiter = $this->Recruiter_login_model->get_by_email($email);

        if ($recruiter && password_verify($password, $recruiter->password)) {
            // set session
            $this->session->set_userdata(array(
                'recruiter_id'    => $recruiter->id,
                'recruiter_name'  => $recruiter->full_name,
                'recruiter_email' => $recruiter->email,
                'logged_in'       => TRUE
            ));
            // echo "Employer Login successful!";
            redirect(base_url('employer_dashboard'));

        } else {
            $this->session->set_flashdata('error', 'Invalid Email or Password');
            redirect(base_url('recruiter_login'));

        }
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('recruiter_login');
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
        $user = $this->Recruiter_login_model->get_user_by_email($userData['email']);

        // If not, create user
        if (!$user) {
            $user_id = $this->Recruiter_login_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'full_name' => $userData['name'],
                'picture' => $userData['picture'],
                'provider' => $userData['provider'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user = $this->Recruiter_login_model->get_user_by_id($user_id);
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
