<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Comment_model');
        // Load necessary helpers
        $this->load->helper('url');
    }
    
    public function index() {
        // Get all comments with post and user details
        $data['comments'] = $this->Comment_model->get_comments_with_details();
        $this->load->view('admin/comments_management', $data);
    }
    
    public function update_status() {
        // Set header for JSON response
        header('Content-Type: application/json');
        
        $comment_id = $this->input->post('comment_id');
        $status = $this->input->post('status');
        
        if (empty($comment_id)) {
            echo json_encode(['status' => 'error', 'message' => 'Comment ID is required.']);
            return;
        }
        
        $result = $this->Comment_model->update_comment_status($comment_id, $status);
        
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Comment status updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update comment status.']);
        }
    }
    
}