<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recruiter_dashboard_model');
        $this->load->library('session');
    }

    public function index() {
        $employer_id = $this->session->userdata('recruiter_id');
        
        $data['candidates_count'] = $this->Recruiter_dashboard_model->count_candidates();
        $data['job_posts_count']  = $this->Recruiter_dashboard_model->count_job_posts();
        $data['recent_jobs'] = $this->Recruiter_dashboard_model->get_recent_jobs($employer_id, 5);
        $this->load->view('recruiter_dashboard', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('employer_login'));
    }
}