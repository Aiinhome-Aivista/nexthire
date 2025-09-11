<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobsearch extends CI_Controller {
    public function index() {
        $this->load->model('Menu_model');
        $data['menu'] = $this->Menu_model->get_menu();

          $this->load->view('includes/header', $data);
          $this->load->view('job_search', $data);  
          $this->load->view('includes/footer');
    }
}