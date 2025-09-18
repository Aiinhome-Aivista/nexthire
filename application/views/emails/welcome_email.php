<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SahajJobs</title>
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
            margin-bottom: 16px;
            color: #1e293b;
        }
        
        .highlight {
            font-size: 16px;
            margin-bottom: 20px;
            color: #4f46e5;
            font-weight: 600;
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
            padding: 16px;
            border-radius: 10px;
            margin: 16px 0;
            border-left: 4px solid #f59e0b;
            font-size: 14px;
            color: #92400e;
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
            padding-left: 4px;
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
        
        .copyright {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">  
        <div class="content">
            <p class="greeting">Dear <?php echo $name; ?>,</p>
            
            <p class="highlight">🎉 Congratulations! Your career journey takes off today with SahajJobs.</p>
            
            <p class="message">Your registration is complete, and your account is now active. This is the first step toward shaping the career you’ve always envisioned.</p>
            
            <div class="credentials">
                <div class="credentials-title">🔑 Your Login Credentials</div>
                <div class="credential-item">
                    <span class="credential-label">Email:</span>
                    <span class="credential-value"><?php echo $email; ?></span>
                </div>
                <div class="credential-item">
                    <span class="credential-label">Password:</span>
                    <span class="credential-value"><?php echo $password; ?></span>
                </div>
            </div>
            
            <div class="note">For your security, please change your password after your first login.</div>
            
            <div class="features">
                <p class="features-title">🚀 What’s Next for You?</p>
                <ul class="feature-list">
                    <li class="feature-item">Showcase your talent – Create a profile that highlights your strengths and attracts leading recruiters.</li>
                    <li class="feature-item">Discover opportunities – Get personalized job postings delivered directly to you.</li>
                    <li class="feature-item">Achieve your dreams – Move confidently toward your career aspirations and future growth.</li>
                </ul>
            </div>
            
            <p class="message">Remember, every great achievement begins with a single step—and today, you’ve taken yours. Now it’s time to explore, apply, and unlock the opportunities waiting for you.</p>
            
            <p class="message">If you ever need support, our team is just a click away—we’re here to help you succeed.</p>
            
            <div class="closing">
                <p>Wishing you success and growth,</p>
                <p class="signature">The SahajJobs Team</p>
            </div>
        </div>
        
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
            <p class="copyright">&copy; <?php echo date('Y'); ?> SahajJobs. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
