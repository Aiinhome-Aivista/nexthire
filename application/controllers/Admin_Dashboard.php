<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Candidate_management_model');
        $this->load->model('admin/Employer_management_model');
        $this->load->model('admin/Job_post_management_model');
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function dashboard()
    {
        // Get candidate count
        $data['candidate_count'] = $this->Candidate_management_model->count_candidates();
        $data['employer_count'] = $this->Employer_management_model->count_employers();
        $data['job_count'] = $this->Job_post_management_model->count_jobs();
        $this->load->view('admin/dashboard', $data);
    }

    public function candidate_management()
    {
        $data['candidates'] = $this->Candidate_management_model->get_all_candidates();
        $this->load->view('admin/candidate_management', $data);
    }

    public function employer_management()
    {
        $data['employers'] = $this->Employer_management_model->get_all_employers();
        $this->load->view('admin/employer_management', $data);
    }

    public function job_post_management()
    {
        $data['job_post'] = $this->Job_post_management_model->get_all_job_posts();
        $this->load->view('admin/job_post_management', $data);
    }
}
