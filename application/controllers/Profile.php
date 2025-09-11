<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->helper(['form', 'url', 'download']);
        $this->load->library('session');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

        $data['user'] = $this->Profile_model->get_user($user_id);
        $data['location'] = $this->Profile_model->get_contact($user_id);
        $data['resume'] = $this->Profile_model->get_resume($user_id);
        
        $qualifications = $this->Profile_model->get_user_qualifications($user_id);
        $data = array_merge($data, $qualifications);

        $this->load->view('profile_view', $data);
    }

    // ===============================
    // CONTACT INFO
    // ===============================
    public function edit_contact()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id)
            redirect('login');

        $data['user'] = $this->Profile_model->get_user($user_id);
        $data['location'] = $this->Profile_model->get_contact($user_id);

        $this->load->view('edit_contact', $data);
    }

    public function update_contact()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id)
            redirect('login');

        $updateUser = [
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number')
        ];
        $this->db->where('id', $user_id)->update('register', $updateUser);

        $updateContact = [
            'user_id' => $user_id,
            'country' => $this->input->post('country'),
            'street' => $this->input->post('street'),
            'city_state' => $this->input->post('city_state'),
            'area' => $this->input->post('area'),
            'pincode' => $this->input->post('pincode'),
            'relocation' => $this->input->post('relocation') ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Profile_model->save_contact($updateContact);

        $this->session->set_flashdata('success', 'Profile updated successfully!');
        redirect('profile');
    }

    // ===============================
    // RESUME HANDLING
    // ===============================
    public function upload_resume()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

        $config['upload_path'] = FCPATH . 'assets/resumes/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('resume_file')) {
            echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
            return;
        }

        $fileData = $this->upload->data();
        $resumeData = [
            'user_id' => $user_id,
            'file_name' => $fileData['client_name'],
            'file_path' => 'assets/resumes/' . $fileData['file_name'],
            'uploaded_at' => date('Y-m-d H:i:s')
        ];
        $this->Profile_model->save_resume($resumeData);

        $this->session->set_flashdata('success', 'Resume uploaded successfully!');
        redirect('profile');
    }

    public function view_resume($doc_id)
    {
        $resume = $this->Profile_model->get_resume_by_id($doc_id);
        if ($resume) {
            redirect(base_url($resume['file_path']));
        } else {
            show_404();
        }
    }

    public function download_resume($doc_id)
    {
        $resume = $this->Profile_model->get_resume_by_id($doc_id);
        if ($resume) {
            force_download(FCPATH . $resume['file_path'], NULL);
        } else {
            show_404();
        }
    }

    public function delete_resume($doc_id)
    {
        $resume = $this->Profile_model->get_resume_by_id($doc_id);
        if ($resume && file_exists(FCPATH . $resume['file_path'])) {
            unlink(FCPATH . $resume['file_path']);
            $this->Profile_model->delete_resume($doc_id);
            $this->session->set_flashdata('success', 'Resume deleted successfully!');
        }
        redirect('profile');
    }

    // ===============================
    // QUALIFICATIONS
    // ===============================

    public function qualifications()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');
        $data = $this->Profile_model->get_user_qualifications($user_id);

        $this->load->view('qualifications_view', $data);
    }

    public function submit_qualifications()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in']);
            return;
        }

        $data = json_decode($this->input->raw_input_stream, true);

        if (!$data) {
            echo json_encode(['success' => false, 'message' => 'No data received']);
            return;
        }

        $this->db->trans_start();
        $all_success = true;

        foreach ($data as $type => $items) {
            foreach ($items as $item) {
                // Ensure user_id is always present
                $item['user_id'] = $user_id;

                if (!$this->Profile_model->save_qualification($type, $item)) {
                    $all_success = false;
                    break 2; // Exit both loops if one save fails
                }
            }
        }

        if ($all_success) {
            $this->db->trans_commit();
            echo json_encode(['success' => true]);
        } else {
            $this->db->trans_rollback();
            echo json_encode(['success' => false, 'message' => 'Failed to save one or more qualifications.']);
        }
    }

    public function delete_qualification()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in.']);
            return;
        }

        $id = $this->input->post('id');
        $type = $this->input->post('type');

        if ($this->Profile_model->delete_qualification($type, $id, $user_id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete qualification.']);
        }
    }
}