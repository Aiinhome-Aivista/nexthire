<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Post_model');
        $this->load->model('admin/Post_category_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function posts_add()
    {
        // Load categories for the dropdown
        $data['categories'] = $this->Post_category_model->get_categories_for_dropdown();
        $this->load->view('admin/posts_add', $data);
    }

    public function posts_manage()
    {
        // Get all posts with categories for client-side search and pagination
        $data['posts'] = $this->Post_model->get_posts_with_categories();
        $this->load->view('admin/posts_manage', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', validation_errors());
        } else {

            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'category_id' => $this->input->post('category_id'),
                'created_at' => date('Y-m-d H:i:s')
            );

            // Handle file upload
            if (!empty($_FILES['featured_image']['name'])) {
                // $config['upload_path'] = './assets/images/';
                $config['upload_path'] = '../All_Uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('featured_image')) {
                    $upload_data = $this->upload->data();
                    // $data['featured_image'] = './assets/images/' . $upload_data['file_name'];
                    $data['featured_image'] = '../All_Uploads/images/' . $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error_message', $this->upload->display_errors());
                    redirect('admin/posts_add');
                    return;
                }
            }

            if ($this->Post_model->add_post($data)) {
                $this->session->set_flashdata('success_message', 'Post added successfully!');
            } else {
                $this->session->set_flashdata('error_message', 'Failed to add post.');
            }
        }

        redirect('admin/posts_add');
    }

    public function delete($id)
    {
        if ($this->Post_model->delete_post($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function update_post()
    {
        $id = $this->input->post('id');

        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'category_id' => $this->input->post('category_id'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($_FILES['featured_image']['name'])) {
            // $config['upload_path'] = './assets/images/';
            $config['upload_path'] = '../All_Uploads/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('featured_image')) {
                $upload_data = $this->upload->data();
                // $data['featured_image'] = './assets/images/' . $upload_data['file_name'];
                $data['featured_image'] = '../All_Uploads/images/' . $upload_data['file_name'];

                // Delete old image if exists
                $old_post = $this->Post_model->get_post_by_id($id);
                if ($old_post && !empty($old_post->featured_image) && file_exists($old_post->featured_image)) {
                    unlink($old_post->featured_image);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        if ($this->Post_model->update_post($id, $data)) {

            echo json_encode([
                'status' => 'success',
                'data' => [
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'category_id' => $data['category_id'],
                    'featured_image' => $data['featured_image']
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}