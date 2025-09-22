<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sitemap_settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/sitemap_settings');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
}