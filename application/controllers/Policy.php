<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends CI_Controller {
    public function index() {
        $this->load->view('policy');  // Load your privacy policy page view
    }
}
