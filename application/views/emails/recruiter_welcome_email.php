<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Jobnest Recruiter Platform</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #334155;
            background-color: #f8fafc;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            margin: 20px auto;
        }
        .content {
            padding: 32px;
        }
        .greeting {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1e293b;
        }
        .message {
            margin-bottom: 24px;
            font-size: 15px;
        }
        .credentials {
            background: linear-gradient(to right, #f0f4ff, #f5f3ff);
            padding: 20px;
            border-radius: 10px;
            margin: 24px 0;
            border-left: 4px solid #3b82f6;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
        }
        .credentials-title {
            font-weight: 600;
            margin-bottom: 12px;
            color: #3b82f6;
        }
        .credential-item {
            display: flex;
            margin-bottom: 8px;
        }
        .credential-label {
            font-weight: 500;
            min-width: 80px;
            color: #475569;
        }
        .credential-value {
            font-weight: 600;
            color: #1e293b;
        }
        .note {
            background-color: #eff6ff;
            padding: 18px;
            border-radius: 10px;
            margin: 24px 0;
            border-left: 4px solid #3b82f6;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
        }
        .note-title {
            font-weight: 600;
            margin-bottom: 8px;
            color: #1d4ed8;
        }
        .features {
            margin: 24px 0;
        }
        .features-title {
            font-weight: 600;
            margin-bottom: 12px;
            color: #1e293b;
        }
        .feature-list {
            list-style: none;
        }
        .feature-item {
            margin-bottom: 12px;
            padding-left: 8px;
            font-size: 14px;
        }
        .closing {
            margin-top: 28px;
        }
        .signature {
            font-weight: 600;
            color: #1e293b;
            margin-top: 8px;
        }
        .footer {
            text-align: center;
            font-size: 13px;
            color: #64748b;
            padding: 20px 0;
            border-top: 1px solid #e2e8f0;
            margin-top: 32px;
        }
        .footer-note {
            margin-bottom: 12px;
        }
        .copyright {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <p class="greeting">Dear <?php echo $name; ?>,</p>

            <p class="message">Welcome to Jobnest Recruiter Platform! Your recruiter account has been successfully created and is ready to help you find the perfect candidates.</p>

            <div class="credentials">
                <div class="credentials-title">Your Login Credentials</div>
                <div class="credential-item">
                    <span class="credential-label">Email:</span>
                    <span class="credential-value"><?php echo $email; ?></span>
                </div>
                <div class="credential-item">
                    <span class="credential-label">Password:</span>
                    <span class="credential-value"><?php echo $password; ?></span>
                </div>
            </div>

            <div class="note">
                <div class="note-title">Security Recommendation</div>
                <p>For your account security, we recommend changing your password after your first login and enabling two-factor authentication.</p>
            </div>

            <div class="features">
                <p class="features-title">With your Jobnest Recruiter account, you can:</p>
                <ul class="feature-list">
                    <li class="feature-item">✔ Access our advanced candidate search with intelligent matching</li>
                    <li class="feature-item">✔ Post job listings that reach thousands of qualified candidates</li>
                    <li class="feature-item">✔ Communicate directly with candidates through our messaging platform</li>
                    <li class="feature-item">✔ Track application metrics and hiring pipeline analytics</li>
                </ul>
            </div>

            <p class="message">Our dedicated recruiter support team is available to help you maximize your hiring success. Contact us for assistance.</p>

            <div class="closing">
                <p>Best regards,</p>
                <p class="signature">The Jobnest Recruiter Team</p>
            </div>
        </div>

        <div class="footer">
            <p class="footer-note">This is an automated message. Please do not reply to this email.</p>
            <p class="copyright">&copy; <?php echo date('Y'); ?> Jobnest Recruiter Platform. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
