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
        
        .header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
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
            border-left: 4px solid #3b82f6;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
        }
        
        .credentials-title {
            font-weight: 600;
            margin-bottom: 12px;
            color: #3b82f6;
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
            color: #3b82f6;
            margin-right: 12px;
            flex-shrink: 0;
            margin-top: 2px;
        }
        
        .cta-button {
            display: block;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            text-align: center;
            padding: 14px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            margin: 28px 0;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(59, 130, 246, 0.2);
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
            <div class="logo">Jobnest Recruiter</div>
            <div class="logo-subtitle">Connect with top talent efficiently</div>
        </div>
        
        <div class="content">
            <p class="greeting">Dear <?php echo $name; ?>,</p>
            
            <p class="message">Welcome to Jobnest Recruiter Platform! Your recruiter account has been successfully created and is ready to help you find the perfect candidates.</p>
            
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
                <p>For your account security, we recommend changing your password after your first login and enabling two-factor authentication.</p>
            </div>
            
            <div class="features">
                <p class="features-title">With your Jobnest Recruiter account, you can:</p>
                
                <ul class="feature-list">
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        Access our advanced candidate search with intelligent matching
                    </li>
                    
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </span>
                        Post job listings that reach thousands of qualified candidates
                    </li>
                    
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </span>
                        Communicate directly with candidates through our messaging platform
                    </li>
                    
                    <li class="feature-item">
                        <span class="feature-icon">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </span>
                        Track application metrics and hiring pipeline analytics
                    </li>
                </ul>
            </div>
            
            
            <p class="message">Our dedicated recruiter support team is available to help you maximize your hiring success. Contact us at for assistance.</p>
            
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