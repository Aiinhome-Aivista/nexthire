<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
       // পেজ ডেটা প্রস্তুত করুন
        $data['page_title'] = 'Find Your Dream Job | Naukri Clone';
        $data['meta_description'] = 'Find the best jobs matching your skills and experience. Explore 5 lakh+ jobs from top companies.';
        
        // ভিউ লোড করুন
        $this->load->view('includes/header', $data);
        $this->load->view('home', $data);
        $this->load->view('includes/footer', $data);
    }

    public function policy()
    {
        $this->load->view('policy');
    }
}
