<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php'; // Load Composer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Server settings (configure with your SMTP details)
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'aiinhome.tech@gmail.com'; // Your email
        $this->mail->Password = 'iyja wheu ufit ubcj'; // Your app password (for Gmail)
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use ENCRYPTION_SMTPS for port 465
        $this->mail->Port = 465; // Adjust port if needed

        // Sender info
        $this->mail->setFrom('no-reply@SahajJobs.com', 'SahajJobs');
        $this->mail->isHTML(true); // Set email format to HTML
    }

    public function sendWelcomeEmail($toEmail, $toName, $password, $template = 'welcome_email')
    {
        try {
            $this->mail->addAddress($toEmail, $toName);
            $this->mail->Subject = 'Welcome to SahajJobs - Registration Successful';

            $ci =& get_instance();
            $emailContent = $ci->load->view("emails/{$template}", [
                'name' => $toName,
                'email' => $toEmail,
                'password' => $password
            ], TRUE);

            $this->mail->Body = $emailContent;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            log_message('error', 'Email could not be sent. Error: ' . $this->mail->ErrorInfo);
            return false;
        }
    }

    public function sendApplicationStatusEmail($toEmail, $toName, $jobPosition, $status, $company)
    {
        try {
            $this->mail->clearAddresses(); // Clear previous addresses if any
            $this->mail->addAddress($toEmail, $toName);

            $this->mail->Subject = 'Your Job Application Status at SahajJobs';

            if (strtolower($status) === 'accepted') {
                $body = "
                <p>Dear <strong>$toName</strong>,</p>
                <p>Congratulations! We are pleased to inform you that your application for the position of <strong>$jobPosition</strong> has been <span style='color:green; font-weight:bold;'>accepted</span> for the <strong>$company</strong>.</p>
                <p>Our team will be reaching out to you shortly with further details. We look forward to having you join us.</p>
                <p>Best wishes,<br/>SahajJobs Team</p>
            ";
            } else {  // rejected case
                $body = "
                <p>Dear <strong>$toName</strong>,</p>
                <p>Thank you for your interest in the <strong>$jobPosition</strong> position at <strong>$company</strong>.</p>
                <p>After careful consideration, we regret to inform you that your application has not been accepted at this time.</p>
                <p>We encourage you to keep an eye on future opportunities and wish you success in your job search.</p>
                <p>Sincerely,<br/>SahajJobs Team</p>
            ";
            }

            $this->mail->Body = $body;
            $this->mail->isHTML(true);

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            log_message('error', 'Application status email failed to send. Error: ' . $this->mail->ErrorInfo);
            return false;
        }
    }
    public function sendEmail($toEmail, $subject, $content)
    {
        try {
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = $subject;
            $this->mail->Body = $content;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            log_message('error', 'Email could not be sent. Error: ' . $this->mail->ErrorInfo);
            return false;
        }
    }

}