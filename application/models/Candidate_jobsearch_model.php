<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_jobsearch_model extends CI_Model
{

    public function get_jobs($filters = [])
    {
        $this->db->select('*');
        $this->db->from('posted_jobs');

        if (!empty($filters['job'])) {
            $this->db->like('title', $filters['job']);
        }

        if (!empty($filters['location'])) {
            $this->db->where('location', $filters['location']);
        }

        if (!empty($filters['company'])) {
            $this->db->where('company', $filters['company']);
        }

        if (!empty($filters['industry'])) {
            $this->db->where('industry', $filters['industry']);
        }

        if (!empty($filters['job_type'])) {
            $this->db->where('job_type', $filters['job_type']);
        }

        if (!empty($filters['work_mode'])) {
            $this->db->where('work_mode', $filters['work_mode']);
        }

        if (!empty($filters['experience'])) {
            $this->db->like('experience', $filters['experience']);
            // (Later: better to store min/max experience as integers for proper range filtering)
        }

        if (!empty($filters['salary'])) {
            // Example: salary filter is "300000+" → strip "+" and compare
            $minSalary = intval(str_replace('+', '', $filters['salary']));
            $this->db->where("CAST(REPLACE(REPLACE(salary, '₹',''), ',', '') AS UNSIGNED) >=", $minSalary);
        }

        return $this->db->get()->result_array();
    }

    public function get_featured_companies($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('featured_companies');
        $this->db->where('is_featured', 1);
        $this->db->order_by('rating', 'DESC');
        $this->db->order_by('reviews', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_job_by_id($id)
    {
        return $this->db->get_where('posted_jobs', ['id' => $id])->row_array();
    }

    public function get_user_info($user_id)
    {
        $this->db->select('full_name, work_status, mobile_number, email');
        $this->db->where('id', $user_id);
        $query = $this->db->get('register');
        return $query->row_array();
    }

    public function get_user_education($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_education');
        return $query->result_array();
    }

    public function get_user_experience($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_work_experience');
        return $query->result_array();
    }

    public function get_user_skills($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_skills');
        return $query->result_array();
    }

    public function get_user_resume($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('resumes');
        return $query->row_array();
    }

    public function update_user_info($user_id, $data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('register', $data);
    }

    public function update_education($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update('user_education', $data);
    }

    public function insert_education($data)
    {
        return $this->db->insert('user_education', $data);
    }

    public function update_experience($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update('user_work_experience', $data);
    }

    public function insert_experience($data)
    {
        return $this->db->insert('user_work_experience', $data);
    }

    public function delete_skills($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('user_skills');
    }

    public function insert_skill($user_id, $skill_name)
    {
        $data = ['user_id' => $user_id, 'skill_name' => $skill_name];
        return $this->db->insert('user_skills', $data);
    }

    public function update_user_resume($user_id, $file_name, $file_path)
    {
        $data = [
            'file_name' => $file_name,
            'file_path' => $file_path,
            'uploaded_at' => date('Y-m-d H:i:s')
        ];

        $existing_resume = $this->db->get_where('resumes', ['user_id' => $user_id])->row_array();

        if ($existing_resume) {
            $this->db->where('user_id', $user_id);
            return $this->db->update('resumes', $data);
        } else {
            $data['user_id'] = $user_id;
            return $this->db->insert('resumes', $data);
        }
    }

    public function has_applied($user_id, $jobpost_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('jobpost_id', $jobpost_id);
        $query = $this->db->get('applied_jobs');
        return $query->num_rows() > 0;
    }

    public function apply_job($user_id, $jobpost_id)
    {
        $data = [
            'user_id' => $user_id,
            'jobpost_id' => $jobpost_id,
            'application_status' => 'Applied'
        ];
        return $this->db->insert('applied_jobs', $data);
    }
}
