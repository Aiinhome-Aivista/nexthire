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
        $this->mail->setFrom('no-reply@jobnest.com', 'Jobnest');
        $this->mail->isHTML(true); // Set email format to HTML
    }

  public function sendWelcomeEmail($toEmail, $toName, $password, $template = 'welcome_email')
{
    try {
        $this->mail->addAddress($toEmail, $toName);
        $this->mail->Subject = 'Welcome to Jobnest - Registration Successful';

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

}