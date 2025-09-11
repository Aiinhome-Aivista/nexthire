<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Jobnest</title>
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
        
        .header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 32px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 20px;
            background: white;
            border-radius: 20px 20px 0 0;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }
        
        .logo-subtitle {
            font-weight: 300;
            opacity: 0.9;
            font-size: 16px;
        }
        
        .content {
            padding: 32px;
            position: relative;
            z-index: 1;
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
            border-left: 4px solid #4f46e5;
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.1);
        }
        
        .credentials-title {
            font-weight: 600;
            margin-bottom: 12px;
            color: #4f46e5;
            display: flex;
            align-items: center;
            gap: 8px;
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
            background-color: #fffbeb;
            padding: 18px;
            border-radius: 10px;
            margin: 24px 0;
            border-left: 4px solid #f59e0b;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.1);
        }
        
        .note-title {
            font-weight: 600;
            margin-bottom: 8px;
            color: #d97706;
            display: flex;
            align-items: center;
            gap: 8px;
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
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            padding-left: 8px;
        }
        
        .feature-icon {
            color: #4f46e5;
            margin-right: 12px;
            flex-shrink: 0;
            margin-top: 2px;
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
        
        .icon {
            width: 18px;
            height: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Jobnest</div>
            <div class="logo-subtitle">Your career journey begins here</div>
        </div>
        
        <div class="content">
            <p class="greeting">Dear <?php echo $name; ?>,</p>
            
            <p class="message">Thank you for registering with Jobnest. Your account has been successfully created and is ready to use.</p>
            
            <div class="credentials">
                <div class="credentials-title">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    Your Login Credentials
                </div>
                
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
                <div class="note-title">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Security Recommendation
                </div>
                <p>For your account security, we recommend changing your password after your first login.</p>
            </div>
            
            <div class="features">
                <p class="features-title">With your Jobnest account, you can:</p>
                
                <ul class="feature-list">
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        Build your professional profile and let recruiters find you
                    </li>
                    
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        Get personalized job postings delivered to your email
                    </li>
                    
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        Find your dream job and accelerate your career growth
                    </li>
                </ul>
            </div>
            
            <p class="message">If you have any questions or need assistance, our support team is here to help you.</p>
            
            <div class="closing">
                <p>Best regards,</p>
                <p class="signature">The Jobnest Team</p>
            </div>
        </div>
        
        <div class="footer">
            <p class="footer-note">This is an automated message. Please do not reply to this email.</p>
            <p class="copyright">&copy; <?php echo date('Y'); ?> Jobnest. All rights reserved.</p>
        </div>
    </div>
</body>
</html>