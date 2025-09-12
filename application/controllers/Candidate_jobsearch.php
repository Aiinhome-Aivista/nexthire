<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_jobsearch extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Candidate_jobsearch_model');
        $this->load->model('Menu_model');
    }
    
    public function index() {
        
        $data['menu'] = $this->Menu_model->get_menu();

        $filters = [
            'job'      => $this->input->get('job'),
            'location' => $this->input->get('location')
        ];

        $data['jobs'] = $this->Candidate_jobsearch_model->get_jobs($filters);

         $this->load->view('includes/login_header', $data);
          $this->load->view('candidate_job_search', $data);  
        $this->load->view('includes/footer');
    }

    public function get_job_detail($id) {
        $job = $this->Candidate_jobsearch_model->get_job_by_id($id);
        echo json_encode($job);
    }
}
