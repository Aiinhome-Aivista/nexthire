<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function getTopHiringEmployers($limit = 5)
    {
        // Selecting the company name and picture from employer_register, and counting jobs
        $this->db->select('er.company, er.picture AS image_path, COUNT(pj.id) AS total_jobs');

        // Start with the top_hiring_companies table to filter for top hirers
        $this->db->from('top_hiring_companies AS thc');

        // LEFT JOIN to count jobs, allowing companies with 0 jobs to still be included
        $this->db->join('posted_jobs AS pj', 'thc.employer_id = pj.employer_id', 'left');

        // JOIN to get the company name and picture from the employer_register table
        $this->db->join('employer_register AS er', 'thc.employer_id = er.id');

        // Filter to only include companies marked as top hiring
        $this->db->where('thc.is_top_hiring', 1);

        // Group results by company to get a single job count per company
        $this->db->group_by('er.id');

        // Order by the number of jobs and limit the results
        $this->db->order_by('total_jobs', 'DESC');
        $this->db->limit($limit);

        $query = $this->db->get();
        return $query->result();
    }

    public function getFeaturedCompanies($limit = 5)
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

}