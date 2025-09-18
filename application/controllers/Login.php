<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Menu_model');
        $this->load->library('EmailService');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Login_model->get_user($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'user_name' => $user->full_name,
                'user_email' => $user->email,
                'user_mobile' => $user->mobile_number,
                'logged_in' => TRUE
            ]);

            redirect(base_url('profile'));
        } else {
            redirect(base_url('register'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function google_callback()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        if (!$userData || !isset($userData['email'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid data']);
            return;
        }

        // Check if user exists
        $user = $this->Login_model->get_user_by_email($userData['email']);

        // Define upload path for profile photos
        $upload_path = FCPATH . 'assets/profile_photos/';
        // Download and save Google profile picture locally
        $picture_url = $userData['picture'];
        $image_info = pathinfo($picture_url);
        $ext = isset($image_info['extension']) ? $image_info['extension'] : 'jpg'; // default to jpg if no ext

        // Generate unique filename
        $file_name = uniqid('profile_', true) . '.' . $ext;
        $file_path = $upload_path . $file_name;

        // Download image
        $image_content = @file_get_contents($picture_url);

        if ($image_content !== false) {
            // Save image locally
            file_put_contents($file_path, $image_content);
        } else {
            // If download fails, fallback to empty string or default image
            $file_name = '';
        }

        $ip = $this->input->ip_address();
        // If not, create user
        if (!$user) {
            $first_name = explode(' ', trim($userData['full_name']))[0];
            $plainPassword = $first_name . '@123';
            $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

            $user_id = $this->Login_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'ip_address' => $ip,
                'full_name' => $userData['full_name'],
                'picture' => $file_name,
                'provider' => $userData['provider'],
                'password' => $hashedPassword,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->Login_model->save_profile_photo($user_id, $file_name); // <--- Add this line
            $user = $this->Login_model->get_user_by_id($user_id);

            $emailSent = $this->emailservice->sendWelcomeEmail($user['email'], $user['full_name'], $plainPassword, 'welcome_email');
            if ($emailSent) {
                $this->session->set_flashdata('success', 'Registration successful! A welcome email has been sent to your email address.');
            } else {
                $this->session->set_flashdata('success', 'Registration successful! However, we could not send the welcome email.');
            }
        } else {
            // Update profile photo if new one downloaded successfully
            if ($file_name) {
                // Get existing photo filename for cleanup
                $existing_photo = $this->Login_model->get_profile_photo($user['id']);

                if ($existing_photo && file_exists($upload_path . $existing_photo)) {
                    unlink($upload_path . $existing_photo);
                }

                $this->Login_model->update_profile_photo($user['id'], $file_name);

                // Update user's picture field in user data for session
                $user['picture'] = $file_name;
            }
        }


        // Set session
        $this->session->set_userdata([
            'user_id' => $user['id'],
            'user_name' => $user['full_name'],
            'user_email' => $user['email'],
            'user_picture' => $user['picture'],
            'logged_in' => TRUE
        ]);

        echo json_encode(['success' => true]);
    }


    public function forgot()
    {
        $data['menu'] = $this->Menu_model->get_menu();
        $this->load->view('forgot_password_view', $data);
    }

    public function verify_email()
    {
        $email = $this->input->post('email');
        $user = $this->Login_model->get_user_by_email($email);

        if ($user) {
            $this->session->set_tempdata('reset_email', $email, 300);
            $response = ['success' => true, 'message' => 'Email verified successfully!'];
        } else {
            $response = ['success' => false, 'message' => 'Email not found.'];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update_password()
    {
        $email = $this->session->tempdata('reset_email');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if (!$email) {
            $response = ['success' => false, 'message' => 'Session expired. Please start over.'];
        } elseif ($new_password !== $confirm_password) {
            $response = ['success' => false, 'message' => 'Passwords do not match.'];
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            if ($this->Login_model->update_password($email, $hashed_password)) {
                $this->session->unset_tempdata('reset_email');
                $response = ['success' => true, 'message' => 'Password updated successfully!'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to update password.'];
            }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}