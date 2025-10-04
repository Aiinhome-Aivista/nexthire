<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_jobsearch extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_jobsearch_model');
        $this->load->model('Menu_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        $data['menu'] = $this->Menu_model->get_menu();

        // Collect all possible filters from GET params
        $filters = [
            'job' => $this->input->get('job'),
            'location' => $this->input->get('location'),
            'company' => $this->input->get('company'),
            'industry' => $this->input->get('industry'),
            'job_type' => $this->input->get('job_type'),
            'work_mode' => $this->input->get('work_mode'),
            'experience' => $this->input->get('experience'),
            'salary' => $this->input->get('salary')
        ];

        // Fetch jobs from the model
        $jobs = $this->Candidate_jobsearch_model->get_jobs($filters);

        // Check application status for each job
        // foreach ($jobs as $job) {
        //     if ($user_id) {
        //         $job['has_applied'] = $this->Candidate_jobsearch_model->has_applied($user_id, $job['id']);
        //         // echo '<pre>'; print_r($job);die();
        //     } else {
        //         $job['has_applied'] = false;
        //     }
        // }

        $jobs = $this->Candidate_jobsearch_model->get_jobs($filters);
        foreach ($jobs as &$job) {
            if ($user_id) {
                $job['has_applied'] = $this->Candidate_jobsearch_model->has_applied($user_id, $job['id']) ? 1 : 0;
                // echo '<pre>';
                // print_r($job);
                // // die();
            } else {
                $job['has_applied'] = 0;
            }
        }
        $data['jobs'] = $jobs;
        $data['featured_companies'] = $this->Candidate_jobsearch_model->get_featured_companies(5);

        $this->load->view('includes/login_header', $data);
        $this->load->view('candidate_job_search', $data);
        $this->load->view('includes/footer');
    }

    public function get_job_detail($id)
    {
        $job = $this->Candidate_jobsearch_model->get_job_by_id($id);
        echo json_encode($job);
    }

    public function apply()
    {
        $job_id = $this->input->get('job_id');
        $user_id = $this->session->userdata('user_id'); // Assuming user ID is in session
        $data['menu'] = $this->Menu_model->get_menu();
        $data['job'] = $this->Candidate_jobsearch_model->get_job_by_id($job_id);

        // Fetch user details, education, experience, and skills
        $data['user'] = $this->Candidate_jobsearch_model->get_user_info($user_id);
        $data['education'] = $this->Candidate_jobsearch_model->get_user_education($user_id);
        $data['experience'] = $this->Candidate_jobsearch_model->get_user_experience($user_id);
        $data['skills'] = $this->Candidate_jobsearch_model->get_user_skills($user_id);
        $data['resume'] = $this->Candidate_jobsearch_model->get_user_resume($user_id);
        $data['has_applied'] = $this->Candidate_jobsearch_model->has_applied($user_id, $job_id);

        // Determine user type (assuming you have a way to check this)
        $data['user_type'] = $this->session->userdata('user_type');

        $this->load->view('includes/login_header', $data);
        $this->load->view('job_application_view', $data);
        $this->load->view('includes/footer');
    }

    public function update_user_info()
    {
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->input->post('user');
        $job_id = $this->input->post('job_id');

        if ($user_id && $user_data) {
            $this->Candidate_jobsearch_model->update_user_info($user_id, $user_data);
        }

        redirect(base_url('candidate_jobsearch/apply?job_id=' . $job_id));
    }

    public function update_education()
    {
        $user_id = $this->session->userdata('user_id');
        $education_data = $this->input->post('education');
        $experience_data = $this->input->post('experience');
        $skills_data = $this->input->post('skills');
        $job_id = $this->input->post('job_id');

        if ($user_id) {
            if ($education_data) {
                $existing_education = $this->Candidate_jobsearch_model->get_user_education($user_id);
                if (empty($existing_education)) {
                    $education_data['user_id'] = $user_id;
                    $this->Candidate_jobsearch_model->insert_education($education_data);
                } else {
                    $this->Candidate_jobsearch_model->update_education($user_id, $education_data);
                }
            }

            if ($experience_data) {
                $existing_experience = $this->Candidate_jobsearch_model->get_user_experience($user_id);
                if (empty($existing_experience)) {
                    $experience_data['user_id'] = $user_id;
                    $this->Candidate_jobsearch_model->insert_experience($experience_data);
                } else {
                    $this->Candidate_jobsearch_model->update_experience($user_id, $experience_data);
                }
            }

            if (!empty($skills_data['skill_name'])) {
                $skill_names = explode(',', $skills_data['skill_name']);
                $this->Candidate_jobsearch_model->delete_skills($user_id);
                foreach ($skill_names as $skill) {
                    $this->Candidate_jobsearch_model->insert_skill($user_id, trim($skill));
                }
            }
        }

        redirect(base_url('candidate_jobsearch/apply?job_id=' . $job_id));
    }

    public function upload_resume()
    {
        $job_id = $this->input->post('job_id');
        $user_id = $this->session->userdata('user_id');

        if ($user_id) {
            // $config['upload_path'] = './assets/resumes/';
            $config['upload_path'] = '../All_Uploads/resumes/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('resume_file')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                // $file_path = 'assets/resumes/' . $file_name;
                $file_path = '../All_Uploads/resumes/' . $file_name;

                $this->Candidate_jobsearch_model->update_user_resume($user_id, $file_name, $file_path);
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
            }
        }

        redirect(base_url('candidate_jobsearch/apply?job_id=' . $job_id));
    }

    public function apply_job()
    {
        $user_id = $this->session->userdata('user_id');
        $jobpost_id = $this->input->post('job_id');

        if ($user_id && $jobpost_id) {
            $this->Candidate_jobsearch_model->apply_job($user_id, $jobpost_id);
            redirect(base_url('candidate_jobsearch'));
        }

        // redirect(base_url('candidate_jobsearch/apply?job_id=' . $jobpost_id));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
