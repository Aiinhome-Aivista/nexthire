<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
    }

    public function index()
    {
        $this->load->view('register');
    }
    public function submit()
    {

        $plainPassword = $this->input->post('password');

        $data = [
            'full_name' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'mobile_number' => $this->input->post('mobile'),
            'work_status' => $this->input->post('workStatus'),
        ];

        $insert_id = $this->Register_model->insert($data);

        if ($insert_id) {
            // Load email service library
            $this->load->library('emailservice');
            $emailSent = $this->emailservice->sendWelcomeEmail($data['email'], $data['full_name'], $plainPassword);

            if ($emailSent) {
                $this->session->set_flashdata('success', 'Registration successful! A welcome email has been sent to your email address.');
            } else {
                $this->session->set_flashdata('success', 'Registration successful! However, we could not send the welcome email.');
            }

            redirect('home');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong with your registration. Please try again.');
            redirect('register');
        }
    }
}