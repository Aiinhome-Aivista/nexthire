<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_category_model extends CI_Model
{
    private $table = 'post_categories';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_categories()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function add_category($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_category_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    public function update_category($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_category($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function get_categories_for_dropdown()
{
    $categories = $this->get_all_categories();
    $dropdown = array();
    foreach ($categories as $category) {
        $dropdown[$category->id] = $category->name;
    }
    return $dropdown;
}
}