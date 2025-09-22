<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->model('Home_model');
        $this->load->library('EmailService');
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function submit()
    {
        $email = $this->input->post('email');

        // Check if email already registered
        $existing_user = $this->Register_model->get_user_by_email($email);
        if ($existing_user) {
            $this->session->set_flashdata('error', 'This email is already registered. Please use a different email.');
            redirect(base_url('register'));
            return;
        }

        // Generate verification token
        $verification_token = bin2hex(random_bytes(32));

        // Get plain password for welcome email
        $plain_password = $this->input->post('password');

        // Collect registration data, hash password for DB
        $registration_data = [
            'full_name' => $this->input->post('fullname'),
            'ip_address' => $this->input->ip_address(),
            'email' => $email,
            'password' => password_hash($plain_password, PASSWORD_BCRYPT),
            'mobile_number' => $this->input->post('mobile'),
            'work_status' => $this->input->post('workStatus'),
            // email_verified = 0 until verification completes
            'email_verified' => 0,
        ];

        // Save registration data + token + plain password in session temporarily
        $this->session->set_userdata([
            'registration_data' => $registration_data,
            'plain_password' => $plain_password,
            'email_verification_token' => $verification_token,
            'email_verification_email' => $email,
            'email_verification_expires' => time() + 3600, // 1 hour expiry
        ]);

        // Create verification link
        $verification_link = base_url('register/verify_email?email=' . urlencode($email) . '&token=' . $verification_token);

        // Load email content view
        $emailContent = $this->load->view("emails/register_verification_email", [
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

        redirect(base_url('register'));
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
            redirect(base_url('register'));
            return;
        }

        if ($token !== $session_token || $email !== $session_email) {
            $this->session->set_flashdata('error', 'Invalid verification link.');
            redirect(base_url('register'));
            return;
        }

        // Retrieve registration data and plain password from session
        $registration_data = $this->session->userdata('registration_data');
        $plain_password = $this->session->userdata('plain_password');

        if (!$registration_data || !$plain_password) {
            $this->session->set_flashdata('error', 'No registration data found. Please register again.');
            redirect(base_url('register'));
            return;
        }

        // Insert recruiter data into DB
        $insert_id = $this->Register_model->insert($registration_data);
        if (!$insert_id) {
            $this->session->set_flashdata('error', 'Failed to complete registration. Please try again.');
            redirect(base_url('register'));
            return;
        }

        // Update email_verified flag to 1
        $this->Register_model->update_email_verified($insert_id, 1);

        // Send welcome email with plain password
        $this->emailservice->sendWelcomeEmail($registration_data['email'], $registration_data['full_name'], $plain_password, 'welcome_email');

        // Clear related session data
        $this->session->unset_userdata([
            'registration_data',
            'plain_password',
            'email_verification_token',
            'email_verification_email',
            'email_verification_expires'
        ]);

        $this->session->set_flashdata('success', 'Thank you for your registration! Your email has been verified.');
        $data['page_title'] = 'Find Your Dream Job';
        $data['meta_description'] = 'Find the best jobs matching your skills and experience. Explore 5 lakh+ jobs from top companies.';

        $data['top_companies'] = $this->Home_model->getTopHiringEmployers();
        $data['featured_companies'] = $this->Home_model->getFeaturedCompanies();
        $data['menu'] = $this->menu_model->get_menu();

        $data['showLoginPopup'] = true;  // or false depending on condition
        $this->load->view('includes/header', $data);
        $this->load->view('home', $data);
        $this->load->view('includes/footer', $data);
        // redirect(base_url());  // Redirect to login or welcome page as needed
    }


    // public function submit()
    // {

    //     // Check if email is verified
    //     $email_verified = $this->input->post('email_verified');
    //     if ($email_verified !== '1') {
    //         $this->session->set_flashdata('error', 'Please verify your email before registering.');
    //         redirect(base_url('register'));
    //         return;
    //     }
    //     $plainPassword = $this->input->post('password');
    //     $ip = $this->input->ip_address();

    //     $data = [
    //         'full_name' => $this->input->post('fullname'),
    //         'ip_address' => $ip,
    //         'email' => $this->input->post('email'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
    //         'mobile_number' => $this->input->post('mobile'),
    //         'work_status' => $this->input->post('workStatus'),
    //         'email_verified' => 1 // Mark email as verified
    //     ];

    //     $insert_id = $this->Register_model->insert($data);

    //     if ($insert_id) {
    //         $emailSent = $this->emailservice->sendWelcomeEmail($data['email'], $data['full_name'], $plainPassword, 'welcome_email');

    //         if ($emailSent) {
    //             $this->session->set_flashdata('success', 'Registration successful! A welcome email has been sent to your email address.');
    //         } else {
    //             $this->session->set_flashdata('success', 'Registration successful! However, we could not send the welcome email.');
    //         }

    //         redirect(base_url('home'));
    //     } else {
    //         $this->session->set_flashdata('error', 'Something went wrong with your registration. Please try again.');
    //         redirect(base_url('register'));
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

        // Check if user exists
        $user = $this->Register_model->get_user_by_email($userData['email']);

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
        if (!$user) {
            $first_name = explode(' ', trim($userData['full_name']))[0];
            $plainPassword = $first_name . '@123';
            $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

            $user_id = $this->Register_model->insert_google_user([
                'uid' => $userData['uid'],
                'email' => $userData['email'],
                'ip_address' => $ip,
                'full_name' => $userData['full_name'],
                'picture' => $file_name,
                'provider' => $userData['provider'],
                'password' => $hashedPassword,
                'mobile_number' => null,
                'email_verified' => 1,
                // 'work_status' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->Register_model->save_profile_photo($user_id, $file_name); // <--- Add this line
            $user = $this->Register_model->get_user_by_id($user_id);

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
                $existing_photo = $this->Register_model->get_profile_photo($user['id']);

                if ($existing_photo && file_exists($upload_path . $existing_photo)) {
                    unlink($upload_path . $existing_photo);
                }

                $this->Register_model->update_profile_photo($user['id'], $file_name);

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
        $verification_link = base_url('register/verify_email?email=' . urlencode($email) . '&token=' . $verification_token);

        // Send verification email
        $ci = &get_instance();
        $emailContent = $ci->load->view("emails/register_verification_email", [
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

    //     $user = $this->Register_model->get_user_by_email($email);

    //     // If user doesn't exist, insert only the email (and a blank full_name)
    //     if (!$user) {
    //         $data = [
    //             'email' => $email,
    //             'full_name' => '',  // required since 'full_name' is NOT NULL
    //             'email_verified' => 0, // initially not verified
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s')
    //         ];
    //         $insert_id = $this->Register_model->insert($data);

    //         if ($insert_id) {
    //             $user = $this->Register_model->get_user_by_id($insert_id);
    //         } else {
    //             echo "<h2 style='text-align:center;color:red;margin-top:30px;'>Failed to add email to database.</h2>";
    //             exit;
    //         }
    //     }


    //     $session_token = $this->session->userdata('email_verification_token');
    //     $validToken = ($session_token === $token);

    //     if ($user && $validToken) {
    //         $this->Register_model->update_email_verified($user['id'], 1);

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
        $user = $this->Register_model->get_user_by_email($email);
        $verified = $user && $user['email_verified'] ? true : false;
        echo json_encode(['verified' => $verified]);
    }
}
