<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{

    private $table = 'posts_add';
    private $categories_table = 'post_categories';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_post_by_id($id)
    {
        $this->db->select('posts_add.*, post_categories.name as category_name');
        $this->db->from($this->table);
        $this->db->join($this->categories_table, 'posts_add.category_id = post_categories.id', 'left');
        $this->db->where('posts_add.id', $id);
        $query = $this->db->get();
        return $query->row();
    }


    public function add_post($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_posts_with_categories($limit = null, $offset = null)
    {
        $this->db->select('posts_add.*, post_categories.name as category_name');
        $this->db->from($this->table);
        $this->db->join($this->categories_table, 'posts_add.category_id = post_categories.id', 'left');
        $this->db->order_by('posts_add.created_at', 'ASC');

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        $posts = $query->result();

        return $posts;
    }

    public function count_all_posts()
    {
        return $this->db->count_all($this->table);
    }


    public function search_posts($search_term, $limit = null, $offset = null)
    {
        $this->db->select('posts_add.*, post_categories.name as category_name');
        $this->db->from($this->table);
        $this->db->join($this->categories_table, 'posts_add.category_id = post_categories.id', 'left');

        $this->db->group_start();
        $this->db->like('posts_add.title', $search_term);
        $this->db->or_like('posts_add.content', $search_term);
        $this->db->or_like('post_categories.name', $search_term);
        $this->db->group_end();

        $this->db->order_by('posts_add.created_at', 'DESC');

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        $posts = $query->result();

        return $posts;
    }


    public function count_search_posts($search_term)
    {
        $this->db->from($this->table);
        $this->db->join($this->categories_table, 'posts_add.category_id = post_categories.id', 'left');

        $this->db->group_start();
        $this->db->like('posts_add.title', $search_term);
        $this->db->or_like('posts_add.content', $search_term);
        $this->db->or_like('post_categories.name', $search_term);
        $this->db->group_end();

        return $this->db->count_all_results();
    }


    public function delete_post($id)
    {
        // Fetch the post
        $post = $this->db->get_where('posts_add', ['id' => $id])->row();

        if ($post && !empty($post->featured_image)) {
            $file_path = FCPATH . $post->featured_image;

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // Delete record
        return $this->db->delete('posts_add', ['id' => $id]);
    }



    public function update_post($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_posts_by_category($category_id)
    {
        $this->db->select('posts_add.*, post_categories.name as category_name');
        $this->db->from($this->table); // which is 'posts_add'
        $this->db->join($this->categories_table, 'posts_add.category_id = post_categories.id', 'left');
        $this->db->where('posts_add.category_id', $category_id);
        $this->db->order_by('posts_add.created_at', 'ASC');
        $query = $this->db->get();
        $posts = $query->result();


        return $posts;
    }
}