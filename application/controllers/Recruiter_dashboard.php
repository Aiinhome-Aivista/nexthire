<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter_dashboard extends CI_Controller {

    public function index() {
        $this->load->view('recruiter_dashboard');
    }
}