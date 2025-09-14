<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_post_management_model extends CI_Model
{

    public function get_all_job_posts()
    {
        $this->db->select('*');
        $query = $this->db->get('posted_jobs');
        return $query->result();
    }

    public function count_jobs()
    {
        return $this->db->count_all('posted_jobs');
    }

    public function delete($id)
    {
        return $this->db->delete('posted_jobs', ['id' => $id]);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('posted_jobs', $data);
    }
}