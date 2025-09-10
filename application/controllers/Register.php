<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

   public function __construct() {
        parent::__construct();
        $this->load->model('Register_model'); 
    }
    
    public function index() {
        $this->load->view('register');
    }

    public function submit() {
        $data = [
            'full_name'   => $this->input->post('fullname'),
            'email'      => $this->input->post('email'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'mobile_number'     => $this->input->post('mobile'),
            'work_status'=> $this->input->post('workStatus'),
        ];

        $insert_id = $this->Register_model->insert($data);

        if ($insert_id) {
            echo "Registration successful!";
        } else {
            echo "Something went wrong!";
        }
    }
}