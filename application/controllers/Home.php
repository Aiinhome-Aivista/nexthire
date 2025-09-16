<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model with alias 'menu_model'
        $this->load->model('Menu_model', 'menu_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['page_title'] = 'Find Your Dream Job';
        $data['meta_description'] = 'Find the best jobs matching your skills and experience. Explore 5 lakh+ jobs from top companies.';

        $data['menu'] = $this->menu_model->get_menu();

        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('home', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('home', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function policy()
    {
        $data['menu'] = $this->menu_model->get_menu();

        $this->load->view('policy', $data);
    }
}
