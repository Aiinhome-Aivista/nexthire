<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_jobsearch extends CI_Controller {
    public function index() {
        $this->load->model('Menu_model');
        $data['menu'] = $this->Menu_model->get_menu();

          $this->load->view('includes/login_header', $data);
          $this->load->view('candidate_job_search', $data);  
          $this->load->view('includes/footer');
    }
}