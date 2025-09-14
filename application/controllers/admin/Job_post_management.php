<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_post_management extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('admin/Job_post_management_model');
    }

    public function index()
    {

        $data['job_post'] = $this->Job_post_management_model->get_all_job_posts();

        $this->load->view('admin/job_post_management', $data);
    }


    public function delete_job_post($id = null)
    {
        header('Content-Type: application/json');

        if ($id && $this->Job_post_management_model->delete($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function update_job_post()
    {
        $id = $this->input->post('id');
        $data = [
            'title' => $this->input->post('title'),
            'company' => $this->input->post('company'),
            'industry' => $this->input->post('industry'),
            'location' => $this->input->post('location'),
            'employees' => $this->input->post('employees'),
            'experience' => $this->input->post('experience'),
            'job_type' => $this->input->post('job_type'),
            'salary' => $this->input->post('salary'),
            'last_date' => $this->input->post('last_date')
        ];

        if ($this->Job_post_management_model->update($id, $data)) {
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
}