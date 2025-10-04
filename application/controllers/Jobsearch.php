<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobsearch extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jobsearch_model');
        $this->load->model('Menu_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['menu'] = $this->Menu_model->get_menu();

        // Collect all possible filters from GET params
        $filters = [
            'job' => $this->input->get('job'),
            'location' => $this->input->get('location'),
            'company' => $this->input->get('company'),
            'industry' => $this->input->get('industry'),
            'job_type' => $this->input->get('job_type'),
            'work_mode' => $this->input->get('work_mode'),
            'experience' => $this->input->get('experience'),
            'salary' => $this->input->get('salary')
        ];

        // Pass filters to model
        $data['jobs'] = $this->Jobsearch_model->get_jobs($filters);
        $data['featured_companies'] = $this->Jobsearch_model->get_featured_companies(5);

        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('job_search', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('job_search', $data);
            $this->load->view('includes/footer', $data);
        }
    }


    public function get_job_detail($id)
    {
        $job = $this->Jobsearch_model->get_job_by_id($id);
        echo json_encode($job);
    }
}
