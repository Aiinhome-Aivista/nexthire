<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Post_model');
        $this->load->model('admin/Comment_model'); 
    }

    public function index($post_id = null)
    {
        // If no post ID is provided, show 404 or redirect
        if (!$post_id) {
            show_404();
        }
        
        // Get the specific post by ID
        $data['post'] = $this->Post_model->get_post_by_id($post_id);
        
        // If post doesn't exist, show 404
        if (!$data['post']) {
            show_404();
        }

         // Get comments for this post
        $data['comments'] = $this->Comment_model->get_comments_by_post($post_id);
        $data['comment_count'] = $this->Comment_model->get_comment_count_by_post($post_id);
        
        $this->load->view('includes/login_header'); 
        $this->load->view('admin/post_details', $data);
        $this->load->view('includes/footer');
    }

    public function add_comment()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            echo json_encode(['success' => false, 'message' => 'Please log in to post a comment.']);
            return;
        }

        $post_id = $this->input->post('post_id');
        $comment = $this->input->post('comment');

        if (empty($comment)) {
            echo json_encode(['success' => false, 'message' => 'Comment cannot be empty.']);
            return;
        }

        $data = [
            'post_id' => $post_id,
            'user_id' => $this->session->userdata('user_id'),
            'comment' => $comment,
            'status' => 'pending', // comments need approval
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Comment_model->add_comment($data)) {
            echo json_encode(['success' => true, 'message' => 'Your comment has been successfully submitted.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to submit comment. Please try again.']);
        }
    }
}