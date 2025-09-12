<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Static_pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the Menu_model in the constructor to make it available for all methods
        $this->load->model('Menu_model');
    }

    public function about_us()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('about_us', $data);
    }

    public function careers()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('careers', $data);
    }

    public function employer_home()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('employer_home', $data);
    }

    public function sitemap()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('sitemap', $data);
    }

    public function credits()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('credits', $data);
    }

    public function help_center()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('help_center', $data);
    }

    public function summons_notices()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('summons_notices', $data);
    }

    public function grievances()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('grievances', $data);
    }

    public function report_issue()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('report_issue', $data);
    }

    public function privacy_policy()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('privacy_policy', $data);
    }
    public function cookie_policy() {
    $data['menu'] = $this->Menu_model->get_menu();
    $this->load->view('cookie_policy', $data);
}

    public function terms_and_conditions()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('terms_and_conditions', $data);
    }

    public function fraud_alert()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('fraud_alert', $data);
    }

    public function trust_safety()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('trust_safety', $data);
    }
}