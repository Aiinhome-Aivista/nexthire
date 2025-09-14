<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_management extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('admin/Candidate_management_model');
    }

    public function index()
    {

        $data['candidates'] = $this->Candidate_management_model->get_all_candidates();

        $this->load->view('admin/candidate_management', $data);
    }

    // Delete candidate (AJAX request)
    public function delete_candidate($id = null)
    {

        header('Content-Type: application/json'); // important for fetch()

        if ($id && $this->Candidate_management_model->delete_candidate($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function update_candidate()
    {
        $id = $this->input->post('id');
        $data = [
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number'),
            'work_status' => $this->input->post('work_status'),
        ];

        // $password = $this->input->post('password');
        // if (!empty($password)) {
        //     $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        // }

        if ($this->Candidate_management_model->update_candidate($id, $data)) {
            // Do not return password in response
            // unset($data['password']);
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
}
