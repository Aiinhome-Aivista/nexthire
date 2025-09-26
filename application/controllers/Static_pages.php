<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Static_pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the Menu_model in the constructor to make it available for all methods
        $this->load->model('Menu_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function about_us()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('about_us', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('about_us', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function careers()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('careers', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('careers', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function employer_home()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('employer_home', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('employer_home', $data);
            $this->load->view('includes/footer', $data);
        }
    }


    public function help_center()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('help_center', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('help_center', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function report_issue()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('report_issue', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('report_issue', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function privacy_policy()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('privacy_policy', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('privacy_policy', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    public function cookie_policy()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('cookie_policy', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('cookie_policy', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function terms_and_conditions()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('terms_and_conditions', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('terms_and_conditions', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function trust_safety()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('trust_safety', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('trust_safety', $data);
            $this->load->view('includes/footer', $data);
        }
    }
}