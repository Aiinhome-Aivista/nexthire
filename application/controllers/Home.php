<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

     public function __construct() {
        parent::__construct();
        // Load model with alias 'menu_model'
        $this->load->model('Menu_model', 'menu_model');
    }

    public function index()
    {
        $data['page_title'] = 'Find Your Dream Job | Naukri Clone';
        $data['meta_description'] = 'Find the best jobs matching your skills and experience. Explore 5 lakh+ jobs from top companies.';

        $data['menu'] = $this->menu_model->get_menu();
        
        $this->load->view('includes/header', $data);
        $this->load->view('home', $data);
        $this->load->view('includes/footer', $data);
    }

   public function policy()
    {
        $data['menu'] = $this->menu_model->get_menu();

        $this->load->view('policy', $data);
    }
}
