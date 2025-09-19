<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruiter_job_post extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Recruiter_post_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $recruiter_id = $this->session->userdata('recruiter_id');
        
        $company = $this->Recruiter_post_model->get_company_name($recruiter_id);
        $this->load->view('recruiter_job_post', $company);
    }


    public function store()
    {
        $recruiter_id = $this->session->userdata('recruiter_id');

        $data = array(
            'employer_id' => $recruiter_id,
            'title' => $this->input->post('title'),
            'industry' => $this->input->post('industry'),
            'company' => $this->input->post('company'),
            'location' => $this->input->post('location'),

            // Experience
            'experience' => $this->input->post('experience_min') . '-' . $this->input->post('experience_max') . ' years',

            // Job type & work mode
            'job_type' => $this->input->post('job_type'),
            'work_mode' => $this->input->post('work_mode'),

            // Salary
            'salary' => '₹' . number_format($this->input->post('salary_min')) . ' - ₹' . number_format($this->input->post('salary_max')) . 'a year',

            'description' => $this->input->post('description'),
            'requirements' => $this->input->post('requirements'),
            'benefits' => $this->input->post('benefits'),
            'last_date' => $this->input->post('last_date')
        );

        if ($this->Recruiter_post_model->insert_job($data)) {
            $this->session->set_flashdata('success', 'Job posted successfully!');
            redirect(base_url('employer_dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Failed to post job.');
            redirect(base_url('employer_job_post'));
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('employer_login'));
    }
}