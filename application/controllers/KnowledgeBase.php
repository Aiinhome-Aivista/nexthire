<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KnowledgeBase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Post_model');
        $this->load->library('session');
    }

    public function index()
    {
        $category_id = $this->input->get('category');
        if (!empty($category_id)) {
            $data['posts'] = $this->Post_model->get_posts_by_category($category_id);
        } else {
            $data['posts'] = $this->Post_model->get_posts_with_categories();
        }

        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $this->load->view('includes/login_header', $data);
            $this->load->view('knowledge_based', $data);
            $this->load->view('includes/footer', $data);
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('knowledge_based', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function post($id)
    {
        $data['post'] = $this->Post_model->get_post_by_id($id);

        if (!$data['post']) {
            show_404();
        }

        $this->load->view('includes/login_header');
        $this->load->view('post_details', $data);
        $this->load->view('includes/footer');
    }
}