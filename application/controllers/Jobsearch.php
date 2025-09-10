<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobsearch extends CI_Controller {
    public function index() {
          $this->load->view('includes/header');
          $this->load->view('job_search');  
          $this->load->view('includes/footer');
    }
}