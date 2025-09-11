<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPreferences extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('JobPreferences_model');
        // Ensure user is logged in - replace with your actual auth check
        if (!$this->session->userdata('user_id')) { // Assuming 'user_id' is set upon login
             redirect('login'); // Or your appropriate login route
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id'); 

        // Fetch user preferences
        $user_profile_data = $this->JobPreferences_model->get_user_profile($user_id);
        
        // If no main profile exists, create one.
        if (empty($user_profile_data)) {
            if ($this->JobPreferences_model->create_user_profile($user_id)) {
                // Re-fetch the profile after creation
                $user_profile_data = $this->JobPreferences_model->get_user_profile($user_id);
            } else {
                // Handle error if profile creation fails
                // You might want to show an error message to the user
                log_message('error', 'Failed to create user profile for user ID: ' . $user_id);
                $this->session->set_flashdata('error', 'Could not load your job preferences. Please try again.');
                redirect('profile'); // Redirect to a safe page
                return; // Stop execution
            }
        }

        // Populate data array for the view
        $data = [
            'job_title' => $user_profile_data['job_title'] ?? null,
            'job_types' => $this->JobPreferences_model->get_user_job_types($user_id),
            'min_base_pay' => $user_profile_data['min_base_pay'] ?? null,
            'pay_period' => $user_profile_data['pay_period'] ?? null,
            'is_willing_to_relocate' => isset($user_profile_data['is_willing_to_relocate']) ? (bool)$user_profile_data['is_willing_to_relocate'] : false,
            'work_setting' => $user_profile_data['work_setting'] ?? null,
        ];

        $this->load->view('job_preferences', $data);
    }

    public function update_job_title() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id'); 
        $job_title = $this->input->post('job_title');
        
        // Basic validation
        if (empty($job_title)) {
            echo json_encode(['success' => false, 'message' => 'Job title cannot be empty.']);
            return;
        }

        $data = ['job_title' => $job_title];
        
        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Job title updated successfully.']
            : ['success' => false, 'message' => 'Failed to update job title.'];
        
        echo json_encode($response);
    }
    
    public function update_pay() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id'); 
        $min_base_pay = $this->input->post('min_base_pay');
        $pay_period = $this->input->post('pay_period');

        // Basic validation
        if (empty($min_base_pay) || empty($pay_period)) {
            echo json_encode(['success' => false, 'message' => 'Pay and period cannot be empty.']);
            return;
        }

        $data = [
            'min_base_pay' => $min_base_pay,
            'pay_period' => $pay_period
        ];

        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Pay preference updated successfully.']
            : ['success' => false, 'message' => 'Failed to update pay preference.'];

        echo json_encode($response);
    }

    public function update_relocation() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id'); 
        // The input will be 'true' or 'false' string from the checkbox's name attribute
        $is_willing_to_relocate_input = $this->input->post('is_willing_to_relocate');
        // Convert to integer (1 for true, 0 for false)
        $is_willing_to_relocate = ($is_willing_to_relocate_input === 'true' || $is_willing_to_relocate_input === 'on') ? 1 : 0;

        $data = ['is_willing_to_relocate' => $is_willing_to_relocate];

        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Relocation preference updated successfully.']
            : ['success' => false, 'message' => 'Failed to update relocation preference.'];

        echo json_encode($response);
    }

    public function update_work_setting() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id'); 
        $work_setting = $this->input->post('work_setting');
        
        // Basic validation
        if (empty($work_setting)) {
            echo json_encode(['success' => false, 'message' => 'Work setting cannot be empty.']);
            return;
        }
        
        $data = ['work_setting' => $work_setting];
        
        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Work setting updated successfully.']
            : ['success' => false, 'message' => 'Failed to update work setting.'];
        
        echo json_encode($response);
    }

    public function update_job_types() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $user_id = $this->session->userdata('user_id'); 
        $job_types = $this->input->post('job_types'); // This will be an array

        // Ensure $job_types is an array, even if empty
        if (!is_array($job_types)) {
            $job_types = [];
        }

        if ($this->JobPreferences_model->update_job_types($user_id, $job_types)) {
            $response = ['success' => true, 'message' => 'Job types updated successfully.'];
        } else {
            $response = ['success' => false, 'message' => 'Failed to update job types.'];
        }
        echo json_encode($response);
    }

    // --- Delete Methods ---
    public function delete_job_title() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id'); 
        $data = ['job_title' => null]; // Set to null to indicate deletion
        
        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Job title deleted successfully.']
            : ['success' => false, 'message' => 'Failed to delete job title.'];
        
        echo json_encode($response);
    }

    public function delete_job_types() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id');
        $job_types = []; // An empty array to represent no selected job types
        
        if ($this->JobPreferences_model->update_job_types($user_id, $job_types)) {
            $response = ['success' => true, 'message' => 'Job types cleared successfully.'];
        } else {
            $response = ['success' => false, 'message' => 'Failed to clear job types.'];
        }
        echo json_encode($response);
    }

    public function delete_pay() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id');
        $data = ['min_base_pay' => null, 'pay_period' => null]; // Set to null
        
        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Pay preference deleted successfully.']
            : ['success' => false, 'message' => 'Failed to delete pay preference.'];
        
        echo json_encode($response);
    }

    public function delete_relocation() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id'); 
        // Assuming 0 represents "not willing" or "deleted"
        $data = ['is_willing_to_relocate' => 0]; 
        
        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Relocation preference deleted successfully.']
            : ['success' => false, 'message' => 'Failed to delete relocation preference.'];
        
        echo json_encode($response);
    }

    public function delete_work_setting() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->session->userdata('user_id');
        $data = ['work_setting' => null]; // Set to null
        
        $response = $this->JobPreferences_model->update_user_profile($user_id, $data)
            ? ['success' => true, 'message' => 'Work setting deleted successfully.']
            : ['success' => false, 'message' => 'Failed to delete work setting.'];
        
        echo json_encode($response);
    }
}