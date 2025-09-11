<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $qualification_tables = [
        'skills' => 'user_skills',
        'work_experience' => 'user_work_experience',
        'education' => 'user_education',
        'licenses' => 'user_licenses',
        'certifications' => 'user_certifications',
        'languages' => 'user_languages'
    ];

    // ================= USER & RESUME =================

    public function get_user($user_id)
    {
        return $this->db->get_where('register', ['id' => $user_id])->row_array();
    }

    public function get_resume($user_id)
    {
        return $this->db->get_where('resumes', ['user_id' => $user_id])->row_array();
    }

    public function get_resume_by_id($doc_id)
    {
        return $this->db->get_where('resumes', ['doc_id' => $doc_id])->row_array();
    }

    public function save_resume($data)
    {
        $existing = $this->db->get_where('resumes', ['user_id' => $data['user_id']])->row_array();
        if ($existing) {
            $this->db->where('user_id', $data['user_id']);
            return $this->db->update('resumes', $data);
        } else {
            return $this->db->insert('resumes', $data);
        }
    }

    public function delete_resume($doc_id)
    {
        return $this->db->delete('resumes', ['doc_id' => $doc_id]);
    }

    // ================= CONTACT =================

    public function save_contact($data)
    {
        $query = $this->db->get_where('user_contact', ['user_id' => $data['user_id']]);
        if ($query->num_rows() > 0) {
            $this->db->where('user_id', $data['user_id']);
            return $this->db->update('user_contact', $data);
        } else {
            return $this->db->insert('user_contact', $data);
        }
    }

    public function get_contact($user_id)
    {
        return $this->db->get_where('user_contact', ['user_id' => $user_id])->row_array();
    }

    // ================= QUALIFICATIONS =================

    public function save_qualification($type, $data)
    {
        if (!isset($this->qualification_tables[$type]))
            return false;

        $table = $this->qualification_tables[$type];
        
        // Filter the data to only include columns that exist in the database table
        $filtered_data = [
            'user_id' => $data['user_id']
        ];
        
        // Dynamically add fields based on the type, ensuring they exist in your DB schema
        switch ($type) {
            case 'skills':
                $filtered_data['skill_name'] = $data['skill_name'];
                break;
            case 'work_experience':
                $filtered_data['job_title'] = $data['job_title'];
                $filtered_data['company_name'] = $data['company_name'] ?? null;
                break;
            case 'education':
                $filtered_data['school_name'] = $data['school_name'];
                $filtered_data['degree'] = $data['degree'] ?? null;
                break;
            case 'licenses':
                $filtered_data['license_name'] = $data['license_name'];
                break;
            case 'certifications':
                $filtered_data['cert_name'] = $data['cert_name'];
                break;
            case 'languages':
                $filtered_data['language_name'] = $data['language_name'];
                break;
        }

        $this->db->insert($table, $filtered_data);
        return $this->db->insert_id();
    }

    public function delete_qualification($type, $id, $user_id)
    {
        if (!isset($this->qualification_tables[$type]))
            return false;

        $table = $this->qualification_tables[$type];
        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        return $this->db->delete($table);
    }

    public function get_user_qualifications($user_id)
    {
        $result = [];
        foreach ($this->qualification_tables as $type => $table) {
            $this->db->where('user_id', $user_id);
            $query = $this->db->get($table);
            $result[$type] = $query->result_array();
        }
        return $result;
    }
}