<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter extends CI_Controller {
    public function index() {
        $this->load->view('recruiter_register'); // recruiter registration view
    }
}
