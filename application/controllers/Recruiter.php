<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruiter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Recruiter_model');
        $this->load->library('EmailService');
    }

    public function index()
    {
        $this->load->view('recruiter_register'); // recruiter registration view
    }

    public function submit()
    {
        $email = $this->input->post('email');

        // Check if email already registered
        $existing_user = $this->Recruiter_model->get_user_by_email($email);
        if ($existing_user) {
            $this->session->set_flashdata('error', 'This email is already registered. Please use a different email.');
            redirect(base_url('recruiter'));
            return;
        }

        // Generate verification token
        $verification_token = bin2hex(random_bytes(32));
        // Get plain password for email
        $plain_password = $this->input->post('password');
        // Collect full registration data, but DO NOT insert into DB yet
        $registration_data = [
            'full_name' => $this->input->post('fullname'),
            'email' => $email,
            'company' => $this->input->post('company'),
            'designation' => $this->input->post('designation'),
            'password' => password_hash($plain_password, PASSWORD_BCRYPT),
            'mobile_number' => $this->input->post('mobile'),
            'ip_address' => $this->input->ip_address(),
            // 'password' => $this->input->post('password') // for welcome email
        ];

        // Save registration data and token in session temporarily
        $this->session->set_userdata([
            'registration_data' => $registration_data,
            'plain_password' => $plain_password,
            'email_verification_token' => $verification_token,
            'email_verification_email' => $email,
            'email_verification_expires' => time() + 3600 // expires in 1 hour
        ]);

        // Create verification link
        $verification_link = base_url('recruiter/verify_email?email=' . urlencode($email) . '&token=' . $verification_token);

        // Load email content view
        $emailContent = $this->load->view("emails/recruiter_verification_email", [
            'verification_link' => $verification_link,
            'email' => $email,
            'full_name' => $this->input->post('fullname')
        ], TRUE);

        // Send verification email
        if ($this->emailservice->sendEmail($email, 'Verify your email - SahajJobs', $emailContent)) {
            $this->session->set_flashdata('success', 'Verification email sent. Please check your inbox and click the verification link to complete registration.');
        } else {
            $this->session->set_flashdata('error', 'Failed to send verification email. Please try again.');
        }

        redirect(base_url('employer_register'));
    }

    public function verify_email()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $session_token = $this->session->userdata('email_verification_token');
        $session_email = $this->session->userdata('email_verification_email');
        $session_expires = $this->session->userdata('email_verification_expires');

        if (!$session_token || !$session_email || !$session_expires || time() > $session_expires) {
            $this->session->set_flashdata('error', 'Verification link has expired or is invalid. Please register again.');
            redirect(base_url('employer_register'));
            return;
        }

        if ($token !== $session_token || $email !== $session_email) {
            $this->session->set_flashdata('error', 'Invalid verification link.');
            redirect(base_url('employer_register'));
            return;
        }

        // Retrieve registration data from session
        $registration_data = $this->session->userdata('registration_data');
        $plain_password = $this->session->userdata('plain_password');
        if (!$registration_data || !$plain_password) {
            $this->session->set_flashdata('error', 'No registration data found. Please register again.');
            redirect(base_url('employer_register'));
            return;
        }

        // Insert recruiter data into DB
        $insert_id = $this->Recruiter_model->insert_recruiter($registration_data);
        if (!$insert_id) {
            $this->session->set_flashdata('error', 'Failed to complete registration. Please try again.');
            redirect(base_url('employer_register'));
            return;
        }

        // Update email verified flag
        $this->Recruiter_model->update_email_verified($insert_id, 1);

        // Send welcome email (optional)
        $this->emailservice->sendWelcomeEmail($registration_data['email'], $registration_data['full_name'], $plain_password, 'recruiter_welcome_email');

        // Clear session temporary data
        $this->session->unset_userdata([
            'registration_data',
            'email_verification_token',
            'email_verification_email',
            'email_verification_expires'
        ]);

        // Flash success message for registration completed
        $this->session->set_flashdata('success', 'Thank you for your registration!.');

        // Redirect to login or any page
        redirect(base_url('employer_login'));
    }

    // public function submit()
    // {
    //     // Check if email is verified
    //     $email_verified = $this->input->post('email_verified');
    //     if ($email_verified !== '1') {
    //         $this->session->set_flashdata('error', 'Please verify your email before registering.');
    //         redirect(base_url('employer_register'));
    //         return;
    //     }
    //     $plainPassword = $this->input->post('password');
    //     $ip = $this->input->ip_address();

    //     $data = [
    //         'full_name' => $this->input->post('fullname'),
    //         'ip_address' => $ip,
    //         'email' => $this->input->post('email'),
    //         'company' => $this->input->post('company'),
    //         'designation' => $this->input->post('designation'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
    //         'mobile_number' => $this->input->post('mobile'),
    //     ];

    //     $insert_id = $this->Recruiter_model->insert_recruiter($data);


    //     if ($insert_id) {
    //         $emailSent = $this->emailservice->sendWelcomeEmail($data['email'], $data['full_name'], $plainPassword, 'recruiter_welcome_email');

    //         if ($emailSent) {
    //             $this->session->set_flashdata('success', 'Registration successful! A welcome email has been sent to your email address.');
    //         } else {
    //             $this->session->set_flashdata('success', 'Registration successful! However, we could not send the welcome email.');
    //         }

    //         redirect(base_url('employer_login'));
    //     } else {
    //         $this->session->set_flashdata('error', 'Something went wrong with your registration. Please try again.');
    //         redirect(base_url('employer_register'));
    //     }
    // }

    public function google_callback()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);

        if (!$userData || !isset($userData['email'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid data']);
            return;
        }

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
        // Check if user exists
        $user = $this->Recruiter_model->get_user_by_email($userData['email']);

        // If not, create user
        if (!$user) {
            $first_name = explode(' ', trim($userData['full_name']))[0];
            $plainPassword = $first_name . '@123';
            $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
            $user_id = $this->Recruiter_model->insert_google_user([
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
            $this->Recruiter_model->save_profile_photo($user_id, $file_name); // <--- Add this line
            $user = $this->Recruiter_model->get_user_by_id($user_id);

            $emailSent = $this->emailservice->sendWelcomeEmail($user['email'], $user['full_name'], $plainPassword, 'recruiter_welcome_email');
            if ($emailSent) {
                $this->session->set_flashdata('success', 'Registration successful! A welcome email has been sent to your email address.');
            } else {
                $this->session->set_flashdata('success', 'Registration successful! However, we could not send the welcome email.');
            }
        } else {
            // Update profile photo if new one downloaded successfully
            if ($file_name) {
                // Get existing photo filename for cleanup
                $existing_photo = $this->Recruiter_model->get_profile_photo($user['id']);

                if ($existing_photo && file_exists($upload_path . $existing_photo)) {
                    unlink($upload_path . $existing_photo);
                }

                $this->Recruiter_model->update_profile_photo($user['id'], $file_name);

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




    public function send_verification_email()
    {
        $email = $this->input->post('email');

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Invalid email format']);
            return;
        }

        // Generate verification token
        $verification_token = bin2hex(random_bytes(32));

        // Store token in session with expiration time (1 hour)
        $this->session->set_userdata([
            'email_verification_token' => $verification_token,
            'email_verification_email' => $email,
            'email_verification_expires' => time() + 3600 // 1 hour from now
        ]);

        // Create verification link
        // $verification_link = base_url('employer_register/verify_email?email=' . urlencode($email) . '&token=' . $verification_token);
        $verification_link = base_url('recruiter/verify_email?email=' . urlencode($email) . '&token=' . $verification_token);
        // Send verification email
        $ci = &get_instance();
        $emailContent = $ci->load->view("emails/recruiter_verification_email", [
            'verification_link' => $verification_link,
            'email' => $email
        ], TRUE);

        try {
            $this->emailservice->sendEmail($email, 'Verify your email - SahajJobs', $emailContent);
            echo json_encode(['success' => true, 'message' => 'Verification email sent successfully']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to send verification email']);
        }
    }

    // public function verify_email()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');

    //     $user = $this->Recruiter_model->get_user_by_email($email);

    //     // If user doesn't exist, insert only the email (and a blank full_name)
    //     if (!$user) {
    //         $data = [
    //             'email' => $email,
    //             'full_name' => '',  // required since 'full_name' is NOT NULL
    //             'email_verified' => 0, // initially not verified
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ];
    //         $insert_id = $this->Recruiter_model->insert_recruiter($data);

    //         if ($insert_id) {
    //             $user = $this->Recruiter_model->get_user_by_id($insert_id);
    //         } else {
    //             echo "<h2 style='text-align:center;color:red;margin-top:30px;'>Failed to add email to database.</h2>";
    //             exit;
    //         }
    //     }





    //     $session_token = $this->session->userdata('email_verification_token');
    //     $validToken = ($session_token === $token);

    //     if ($user && $validToken) {
    //         $this->Recruiter_model->update_email_verified($user['id'], 1);

    //         $this->session->unset_userdata([
    //             'email_verification_token',
    //             'email_verification_email',
    //             'email_verification_expires'
    //         ]);

    //         echo "<h2 style='text-align:center;color:green;margin-top:30px;'>Your email is verified! Please return to your registration tab.</h2>";
    //         exit;
    //     } else {
    //         echo "<h2 style='text-align:center;color:red;margin-top:30px;'>Invalid or expired verification link.</h2>";
    //         exit;
    //     }
    // }

    public function check_email_verification()
    {
        $email = $this->input->get('email');
        if (!$email) {
            echo json_encode(['verified' => false]);
            return;
        }
        $user = $this->Recruiter_model->get_user_by_email($email);
        $verified = $user && $user['email_verified'] ? true : false;
        echo json_encode(['verified' => $verified]);
    }
}
