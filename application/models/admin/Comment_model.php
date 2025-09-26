<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_comment($data)
    {
        return $this->db->insert('posts_comment', $data);
    }

    public function get_comments_by_post($post_id, $status = 'approved')
    {
        $this->db->select('posts_comment.*, register.full_name');
        $this->db->from('posts_comment');
        $this->db->join('register', 'posts_comment.user_id = register.id', 'left');
        $this->db->where('post_id', $post_id);
        $this->db->where('status', $status);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_comment_count_by_post($post_id, $status = 'approved')
    {
        $this->db->where('post_id', $post_id);
        $this->db->where('status', $status);
        return $this->db->count_all_results('posts_comment');
    }

    // New methods for comments management
    public function get_comments_with_details($limit = null, $offset = null)
    {
        $this->db->select('posts_comment.*, posts_add.title as post_title, register.full_name as user_name');
        $this->db->from('posts_comment');
        $this->db->join('posts_add', 'posts_comment.post_id = posts_add.id', 'left');
        $this->db->join('register', 'posts_comment.user_id = register.id', 'left');
        $this->db->order_by('posts_comment.created_at', 'ASC');

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get()->result();
    }

    public function get_total_comments()
    {
        return $this->db->count_all('posts_comment');
    }

    public function update_comment_status($comment_id, $status)
    {
        $this->db->where('id', $comment_id);
        return $this->db->update('posts_comment', ['status' => $status, 'updated_at' => date('Y-m-d H:i:s')]);
    }

}