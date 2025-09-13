<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Manage_job_model');
        $this->load->model('Manage_candidate_model');
        $this->load->model('Employer_profile_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function manage_jobs()
    {

        $employer_id = $this->session->userdata('recruiter_id');
        $data['jobs'] = $this->Manage_job_model->get_all_jobs($employer_id);
        $this->load->view('manage_jobs', $data);
    }


    public function manage_candidates()
    {      
        $data['candidates'] = $this->Manage_candidate_model->get_all_candidates();
        $this->load->view('manage_candidates', $data);
    }


    public function manage_profile() {
         $employer_id = $this->session->userdata('recruiter_id');

        if (!$employer_id) {
            redirect(base_url('employer_login'));
        }

        $data['employer'] = $this->Employer_profile_model->get_employer_by_id($employer_id);
        $this->load->view('employer_profile', $data);
    }


}
