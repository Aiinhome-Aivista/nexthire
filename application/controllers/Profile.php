<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->model('User_model');
        $this->load->helper(['form', 'url', 'download']);
        $this->load->library('session');
    }

    // ===============================
    // PROFILE MAIN PAGE
    // ===============================
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

        $data['user'] = $this->Profile_model->get_user_profile($user_id);
        $data['location'] = $this->Profile_model->get_contact($user_id);
        $data['resume'] = $this->Profile_model->get_resume($user_id);
        $data['profile_photo'] = $this->Profile_model->get_profile_photo($user_id);

        $qualifications = $this->Profile_model->get_user_qualifications($user_id);
        $data = array_merge($data, $qualifications);

        $this->load->view('profile_view', $data);
    }

    // ===============================
    // READY TO WORK FEATURE
    // ===============================
    public function readyToWork()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

        $data['user_availability'] = $this->User_model->getUserAvailability($user_id);
        $this->load->view('ready_to_work_view', $data);
    }

    public function updateAvailability()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in.']);
            return;
        }

        if ($this->input->is_ajax_request() && $this->input->post()) {
            $is_available = $this->input->post('is_available');
            $update_data = ['is_available' => $is_available];
            $result = $this->User_model->updateUserAvailability($user_id, $update_data);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Availability updated successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update availability.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        }
    }

    // ===============================
    // CONTACT INFO
    // ===============================
    public function edit_contact()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

        $data['user'] = $this->Profile_model->get_user_profile($user_id);
        $data['location'] = $this->Profile_model->get_contact($user_id);
        $this->load->view('edit_contact', $data);
    }

    public function update_contact()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

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
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $data = $this->Profile_model->get_user_qualifications($user_id);
        $this->load->view('qualifications_view', $data);
    }

    public function submit_qualification()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in']);
            return;
        }

        $type = $this->input->post('type');
        $item = $this->input->post();
        unset($item['type']);
        $item['user_id'] = $user_id;

        if ($this->Profile_model->save_qualification($type, $item)) {
            $id = $this->db->insert_id();
            echo json_encode(['success' => true, 'id' => $id]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save qualification.']);
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

    public function get_qualification_details()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in.']);
            return;
        }

        $id = $this->input->get('id');
        $type = $this->input->get('type');

        if (empty($id) || empty($type)) {
            echo json_encode(['success' => false, 'message' => 'Missing ID or type.']);
            return;
        }

        $item = $this->Profile_model->get_qualification_by_id($id, $type, $user_id);

        if ($item) {
            echo json_encode(['success' => true, 'item' => $item]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Item not found or does not belong to the user.']);
        }
    }

    public function update_qualification()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in.']);
            return;
        }

        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $data = $this->input->post();
        unset($data['id']);
        unset($data['type']);

        $existing_item = $this->Profile_model->get_qualification_by_id($id, $type, $user_id);

        if (!$existing_item) {
            echo json_encode(['success' => false, 'message' => 'Item not found or unauthorized update attempt.']);
            return;
        }

        if ($this->Profile_model->update_qualification($id, $type, $data)) {
            $updated_item = $this->Profile_model->get_qualification_by_id($id, $type, $user_id);
            echo json_encode(['success' => true, 'updated_item' => $updated_item]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update qualification.']);
        }
    }

    public function delete_qualifications_batch()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'User not logged in.']);
            return;
        }

        $items = $this->input->post('items');

        if (empty($items) || !is_array($items)) {
            echo json_encode(['success' => false, 'message' => 'No items provided for deletion.']);
            return;
        }

        $success = true;
        foreach ($items as $item) {
            if (!$this->Profile_model->delete_qualification($item['type'], $item['id'], $user_id)) {
                $success = false;
                break;
            }
        }

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Selected items deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'An error occurred during batch deletion.']);
        }
    }

    public function upload_photo()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');

        $config['upload_path'] = FCPATH . 'assets/profile_photos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024; // 1MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->load->model('Profile_model');

        if (!$this->upload->do_upload('profile_photo')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $file_path = 'assets/profile_photos/' . $file_name;

            $existing_photo = $this->Profile_model->get_profile_photo($user_id);

            if ($existing_photo) {
                if (file_exists(FCPATH . $existing_photo)) {
                    unlink(FCPATH . $existing_photo);
                }
                $this->Profile_model->update_profile_photo($user_id, $file_name);
            } else {
                $this->Profile_model->save_profile_photo($user_id, $file_name);
            }

            $this->session->set_flashdata('success', 'Profile photo uploaded successfully!');
        }
        redirect('profile');
    }
}