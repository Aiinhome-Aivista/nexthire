<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_job_model extends CI_Model
{
    public function get_all_jobs($employer_id)
    {
        return $this->db->where('employer_id', $employer_id)
            ->order_by('created_at', 'DESC')
            ->get('posted_jobs')
            ->result();
    }


    public function delete_job($id, $employer_id)
    {
        return $this->db->where('id', $id)
            ->where('employer_id', $employer_id)
            ->delete('posted_jobs');
    }

    public function get_job($id, $employer_id)
    {
        return $this->db->where('id', $id)
            ->where('employer_id', $employer_id)
            ->get('posted_jobs')
            ->row();
    }

    public function update_job($data)
    {
        return $this->db->where('id', $data['id'])
            ->where('employer_id', $data['employer_id'])
            ->update('posted_jobs', $data);
    }


}
