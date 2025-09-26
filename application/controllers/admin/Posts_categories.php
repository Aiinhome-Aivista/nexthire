<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts_categories extends CI_Controller
{
          public function __construct()
          {
                    parent::__construct();
                    $this->load->model('admin/Post_category_model');
                    $this->load->library('form_validation');
          }

          public function index()
          {
                    $data['categories'] = $this->Post_category_model->get_all_categories();
                    $this->load->view('admin/posts_categories', $data);
          }

          public function add_category()
          {
                    $this->form_validation->set_rules('name', 'Category Name', 'required|is_unique[post_categories.name]');

                    if ($this->form_validation->run() == FALSE) {
                              $response = array(
                                        'status' => 'error',
                                        'message' => strip_tags(validation_errors()) // HTML tag বাদ দিন
                              );
                    } else {
                              $data = array(
                                        'name' => $this->input->post('name')
                              );

                              if ($this->Post_category_model->add_category($data)) {
                                        $response = array(
                                                  'status' => 'success',
                                                  'message' => 'Category added successfully'
                                        );
                              } else {
                                        $response = array(
                                                  'status' => 'error',
                                                  'message' => 'Failed to add category'
                                        );
                              }
                    }

                    echo json_encode($response);
          }

          public function update_category()
          {
                    $id = $this->input->post('id');
                    $this->form_validation->set_rules('name', 'Category Name', 'required');

                    if ($this->form_validation->run() == FALSE) {
                              $response = array(
                                        'status' => 'error',
                                        'message' => validation_errors()
                              );
                    } else {
                              $data = array(
                                        'name' => $this->input->post('name')
                              );

                              if ($this->Post_category_model->update_category($id, $data)) {
                                        $response = array(
                                                  'status' => 'success',
                                                  'message' => 'Category updated successfully'
                                        );
                              } else {
                                        $response = array(
                                                  'status' => 'error',
                                                  'message' => 'Failed to update category'
                                        );
                              }
                    }

                    echo json_encode($response);
          }

          public function delete_category($id)
          {
                    if ($this->Post_category_model->delete_category($id)) {
                              $response = array(
                                        'status' => 'success',
                                        'message' => 'Category deleted successfully'
                              );
                    } else {
                              $response = array(
                                        'status' => 'error',
                                        'message' => 'Failed to delete category'
                              );
                    }

                    echo json_encode($response);
          }

          public function get_categories_json()
          {
                    $categories = $this->Post_category_model->get_all_categories();
                    echo json_encode($categories);
          }
}
