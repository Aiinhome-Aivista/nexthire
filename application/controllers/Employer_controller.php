<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Manage_job_model');
        $this->load->model('Manage_candidate_model');
        $this->load->model('Employer_profile_model');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // manage job functions
    public function manage_jobs()
    {
        $employer_id = $this->session->userdata('recruiter_id');
        $data['jobs'] = $this->Manage_job_model->get_all_jobs($employer_id);
        $this->load->view('manage_jobs', $data);
    }

    public function delete_job()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $id = $data['id'];
        $employer_id = $data['employer_id'];

        if ($this->Manage_job_model->delete_job($id, $employer_id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Delete failed']);
        }
    }

    public function get_job($id, $employer_id)
    {
        $job = $this->Manage_job_model->get_job($id, $employer_id);
        echo json_encode($job);
    }

    public function update_job()
    {
        $post = $this->input->post();
        if ($this->Manage_job_model->update_job($post)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Update failed']);
        }
    }



    //manage candidates functions
    public function manage_candidates()
    {
        $employer_id = $this->session->userdata('recruiter_id');

        // Pagination Config
        $config['base_url'] = base_url('employer_controller/manage_candidates');
        $config['total_rows'] = $this->Manage_candidate_model->count_candidates_by_employer($employer_id);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

        $offset = $this->uri->segment(3, 0);

        $data['candidates'] = $this->Manage_candidate_model->get_candidates_by_employer($employer_id, $config['per_page'], $offset);
        $data['pagination_links'] = $this->pagination->create_links();

        $this->load->view('manage_candidates', $data);
    }

    public function update_application_status()
    {
        $application_id = $this->input->post('application_id');
        $status = $this->input->post('status'); // 'Accepted' or 'Rejected'

        if ($this->Manage_candidate_model->update_application_status($application_id, $status)) {
            echo json_encode(['success' => true, 'message' => "Application status updated to $status"]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }
    }


    //manage employer profile functions
    public function manage_profile()
    {
        $employer_id = $this->session->userdata('recruiter_id');

        if (!$employer_id) {
            redirect(base_url('employer_login'));
        }

        $data['employer'] = $this->Employer_profile_model->get_employer_by_id($employer_id);
        $this->load->view('employer_profile', $data);
    }


    public function getEmployerById($id)
    {
        $data = $this->Employer_profile_model->getEmployerById($id);
        echo json_encode($data);
    }

    public function updateEmployer()
    {
        $id = $this->input->post('id');

        $updateData = [
            'full_name' => $this->input->post('full_name'),
            'designation' => $this->input->post('designation'),
            'company' => $this->input->post('company'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number')
        ];

        $this->Employer_profile_model->updateEmployer($id, $updateData);
        echo json_encode(["status" => true, "message" => "Profile updated successfully"]);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('employer_login'));
    }


}
