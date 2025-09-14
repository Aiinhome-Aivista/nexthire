<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_management extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Employer_management_model');
    }

    public function index()
    {

        $data['employers'] = $this->Employer_management_model->get_all_employers();
        $this->load->view('admin/employer_management', $data);
    }


    public function delete_employer($id = null)
    {
        header('Content-Type: application/json');

        if ($id && $this->Employer_management_model->delete($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function update_employer()
    {
        $id = $this->input->post('id');
        $data = [
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'company' => $this->input->post('company'),
            'designation' => $this->input->post('designation'),
            'mobile_number' => $this->input->post('mobile_number')
        ];

        if ($this->Employer_management_model->update($id, $data)) {
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