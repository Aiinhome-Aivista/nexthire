<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_post_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model
        $this->load->model('Job_post_management_model');
    }

    public function index() {
       
        $data['job_post'] = $this->Job_post_management_model->get_all_job_posts();

        $this->load->view('admin/job_post_management', $data);
    }
}