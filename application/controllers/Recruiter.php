<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recruiter_model'); 
    }

    public function index() {
        $this->load->view('recruiter_register'); // recruiter registration view
    }


    public function submit() {
        $data = [
            'full_name'   => $this->input->post('fullname'),
            'email'      => $this->input->post('email'),
            'company'      => $this->input->post('company'),
            'designation'      => $this->input->post('designation'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'mobile_number'     => $this->input->post('mobile'),
        ];

        $insert_id = $this->Recruiter_model->insert_recruiter($data);

        if ($insert_id) {
            echo "Registration successful!";
        } else {
            echo "Something went wrong!";
        }
    }
}
