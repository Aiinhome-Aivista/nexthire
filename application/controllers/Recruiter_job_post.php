<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter_job_post extends CI_Controller {

    // public function __construct() {
    //     parent::__construct();
    //     $this->load->model('Recruiter_post_model');
    // }

    public function index() {
        $this->load->view('recruiter_job_post');
    }


    // public function store() {
    //     $data = array(
    //         'title'       => $this->input->post('title'),
    //         'company'     => $this->input->post('company'),
    //         'location'    => $this->input->post('location'),
    //         'job_type'    => $this->input->post('job_type'),
    //         'salary'      => $this->input->post('salary'),
    //         'description' => $this->input->post('description'),
    //         'last_date'   => $this->input->post('last_date'),
    //         'email'       => $this->input->post('email')
    //     );

    //     if ($this->Recruiter_post_model->insert_job($data)) {
    //         $this->session->set_flashdata('success', 'Job posted successfully!');
    //     } else {
    //         $this->session->set_flashdata('error', 'Failed to post job.');
    //     }

    //     redirect(base_url('job-form')); // redirect to your form page
    // }
}