<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model
        $this->load->model('Candidate_management_model');
    }

    public function index() {
       
        $data['candidates'] = $this->Candidate_management_model->get_all_candidates();

        $this->load->view('admin/candidate_management', $data);
    }
}