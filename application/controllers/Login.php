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

        // If not, create user
        if (!$user) {
            $user_id = $this->Login_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'name' => $userData['name'],
                'picture' => $userData['picture'],
                'provider' => $userData['provider'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user = $this->Login_model->get_user_by_id($user_id);
        }

        // Set session
        $this->session->set_userdata([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'user_picture' => $user['picture'],
            'logged_in' => TRUE
        ]);

        echo json_encode(['success' => true]);
    }
}