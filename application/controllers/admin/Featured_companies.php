<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Featured_companies extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('admin/Featured_companies_model');
    }

    public function index()
    {
        $data['employers'] = $this->Featured_companies_model->get_all_employers();
        $data['companies'] = $this->Featured_companies_model->get_all_company();
        $data['featured_companies'] = $this->Featured_companies_model->get_all_featured_companies_with_job_count();
        $this->load->view('admin/featured_companies', $data);
    }


    public function delete_featured_companies($id = null)
    {
        header('Content-Type: application/json');

        if ($id && $this->Featured_companies_model->delete($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function update_featured_companies()
    {
        header('Content-Type: application/json');

        $id = $this->input->post('id');
        $employer_id = $this->input->post('employer_id');
        // Handle file upload
        $logo_path = $this->input->post('logo'); // Default to existing path

        if (!empty($_FILES['logo_file']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = $_FILES['logo_file']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_file')) {
                $upload_data = $this->upload->data();
                $logo_path = 'assets/images/' . $upload_data['file_name'];
            } else {
                // Upload failed, return error
                $error = $this->upload->display_errors();
                echo json_encode(['status' => 'error', 'message' => $error]);
                return;
            }
        }
        // As per your request, the employer_id field is not updated
        $data = [
            'company_name' => $this->input->post('company_name'),
            'logo' => $logo_path,
            'rating' => $this->input->post('rating'),
            'reviews' => $this->input->post('reviews'),
            'description' => $this->input->post('description'),
            'is_featured' => $this->input->post('is_featured'),
        ];

         $top_hiring_data = [
            'employer_id' => $employer_id,
            'is_top_hiring' => $this->input->post('is_top_hiring'),
        ];

        $update1 = $this->Featured_companies_model->update($id, $data);
        $update2 = $this->Featured_companies_model->update_top_hiring($employer_id, $top_hiring_data);

        if ($update1 && $update2) {

            $updated_company = $this->Featured_companies_model->get_company_by_id($id);
            echo json_encode([
                'status' => 'success',
                'message' => 'Company updated successfully.',
                'data' => [
                    'company_name' => $updated_company->company_name,
                    'logo' => $updated_company->logo,
                    'rating' => $updated_company->rating,
                    'reviews' => $updated_company->reviews,
                    'description' => $updated_company->description,
                    'is_featured' => $updated_company->is_featured,
                    'is_top_hiring' => $updated_company->is_top_hiring,
                    'active_hiring_count' => $updated_company->active_hiring_count
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }



   public function add_featured_company()
    {
        header('Content-Type: application/json');

        // Handle file upload
        $logo_path = '';

        if (!empty($_FILES['logo_file']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = $_FILES['logo_file']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_file')) {
                $upload_data = $this->upload->data();
                $logo_path = 'assets/images/' . $upload_data['file_name'];
            } else {
                // Upload failed, return error
                $error = $this->upload->display_errors();
                echo json_encode(['status' => 'error', 'message' => $error]);
                return;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Logo file is required']);
            return;
        }

        $data = [
            'employer_id' => $this->input->post('employer_id'),
            'company_name' => $this->input->post('company_name'),
            'logo' => $logo_path,
            'rating' => $this->input->post('rating'),
            'reviews' => $this->input->post('reviews'),
            'description' => $this->input->post('description'),
            'is_featured' => $this->input->post('is_featured'),
        ];

        if ($this->Featured_companies_model->insert($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            // Log the actual database error for debugging
            log_message('error', 'Database insertion failed: ' . $this->db->error()['message']);

            echo json_encode([
                'status' => 'error',
                'message' => 'Database insertion failed. Please check if the Employer ID is unique.'
            ]);
        }
    }
}