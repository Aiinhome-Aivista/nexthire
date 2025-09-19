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

        $data['featured_companies'] = $this->Featured_companies_model->get_all_featured_companies();

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
        $id = $this->input->post('id');
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

        $data = [
            'employer_id' => $this->input->post('id'),
            'company_name' => $this->input->post('company_name'),
            'logo' => $logo_path,
            'rating' => $this->input->post('rating'),
            'reviews' => $this->input->post('reviews'),
            'description' => $this->input->post('description'),
            'is_featured' => $this->input->post('is_featured'),
        ];

        if ($this->Featured_companies_model->update($id, $data)) {
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
