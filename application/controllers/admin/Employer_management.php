<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model
        $this->load->model('Employer_management_model');
    }

    public function index() {
       
        $data['employers'] = $this->Employer_management_model->get_all_employers();

        $this->load->view('admin/employer_management', $data);
    }
}