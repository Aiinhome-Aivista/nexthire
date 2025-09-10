<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function get_menu() {
        $menu = [];

        // Fetch main menu options
        $options = $this->db->get('options')->result_array();

        foreach ($options as $opt) {
            $menu[$opt['options_name']] = [];

            // Fetch sub-options
            $this->db->where('opt_id', $opt['id']);
            $sub_options = $this->db->get('sub_options')->result_array();

            foreach ($sub_options as $sub) {
                $children = [];

                switch ($sub['sub_types']) {
                    case 'Job categories':
                        $children = $this->db->select('id, category_name AS name')->get('jobs_categories')->result_array();
                        break;

                    case 'Jobs in demand':
                        $children = $this->db->select('id, demand_name AS name')->get('jobs_demand')->result_array();
                        break;

                    case 'Jobs by location':
                        $children = $this->db->select('id, location_name AS name')->get('jobs_locations')->result_array();
                        break;

                    case 'Explore categories':
                        $children = $this->db->select('id, category_name AS name')->get('company_categories')->result_array();
                        break;

                    // Corrected table name from 'company_collections' to the correct one
                    case 'Explore collections':
                        $children = $this->db->select('id, collections_name AS name')->get('company_collections')->result_array();
                        break;

                    // Corrected table and column names to match the database
                    case 'Research companies':
                        $children = $this->db->select('id, research_options AS name')->get('research_companies')->result_array();
                        break;

                    case 'Resume writing':
                        $children = $this->db->select('id, resume_types AS name')->get('resume_writing')->result_array();
                        break;

                    case 'Find Jobs':
                        $children = $this->db->select('id, job_info AS name')->get('find_jobs')->result_array();
                        break;

                    case 'Get recruiters attention':
                        $children = $this->db->select('id, resume_view AS name')->get('recruiter_attention')->result_array();
                        break;

                    case 'Monthly subscriptions':
                        $children = $this->db->select('id, plans AS name')->get('monthly_subscriptions')->result_array();
                        break;

                    case 'Free resume resources':
                        $children = $this->db->select('id, resources_type AS name')->get('resume_resources')->result_array();
                        break;
                }

                $menu[$opt['options_name']][] = [
                    'sub_type' => $sub['sub_types'],
                    'children' => $children
                ];
            }
        }

        return $menu;
    }
}