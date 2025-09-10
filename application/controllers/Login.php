<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    public function process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Login_model->get_user($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'user_name' => $user->full_name,
                'user_email' => $user->email,
                'logged_in' => TRUE
            ]);

            echo "Login successful! Welcome, " . $user->full_name;
            redirect('home');
        } else {
            echo "Invalid username or password!";
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
