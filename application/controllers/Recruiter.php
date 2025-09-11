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
            echo "Registration successful!";
        } else {
            echo "Something went wrong!";
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
