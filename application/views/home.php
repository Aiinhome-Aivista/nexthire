<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .hero-section {
            padding: 80px 0;
            text-align: center;
        }

        .hero-section h1 {
            color: #000000ff;
            font-size: 2.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hero-section p {
            color: #000000ff;
            font-size: 1.25rem;
            margin-bottom: 40px;
        }

        .search-bar-container {
            background: #fff;
            border-radius: 999px;
            padding: 13px 35px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.08);
            display: flex;
            align-items: center;
            max-width: 950px;
            margin: 0 auto 50px auto;
            border: none;
        }

        .search-bar-container .input-group-text {
            background-color: transparent;
            border: none;
            color: #8893b3;
            font-size: 1.6rem;
            padding-right: 16px;
            padding-left: 0;
            display: flex;
            align-items: center;
        }

        .search-input-field {
            display: flex;
            align-items: center;
            flex-grow: 1;
            margin-right: 0;
            position: relative;
        }

        .search-bar-container .form-control {
            background: transparent;
            border: none;
            box-shadow: none;
            padding-left: 0;
            padding-right: 24px;
            font-size: 1.18rem;
            color: #222;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            font-weight: 400;
            transition: color 0.2s;
        }

        .search-bar-container .form-control::placeholder {
            color: #8893b3;
            opacity: 1;
            font-weight: 400;
        }

        .search-bar-container .form-control:focus {
            outline: none;
            color: #222;
        }

        .search-bar-container .form-control:not(:placeholder-shown) {
            color: #222;
        }

        .select-experience {
            background: transparent;
            border: none;
            font-size: 1.18rem;
            color: #222;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            font-weight: 400;
            padding-right: 24px;
            margin: 0;
            cursor: pointer;
            appearance: none;
            transition: color 0.2s;
        }

        .select-experience:focus {
            outline: none;
            color: #222;
        }

        .search-bar-container .btn-primary {
            background-color: #2563eb;
            border: none;
            padding: 14px 38px;
            border-radius: 999px;
            font-size: 1.09rem;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            font-weight: 700;
            color: #fff;
            margin-left: 18px;
            box-shadow: none;
            transition: background 0.2s;
        }

        .search-bar-container .btn-primary:hover {
            background-color: #174bbd;
        }

        .search-input-divider {
            content: '';
            display: block;
            width: 1px;
            height: 60%;
            background: #e3e7f0;
            margin: 0 18px;
            align-self: center;
        }

        .resume-section {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border-radius: 12px;
            padding: 40px;
            color: #fff;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .resume-section h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .resume-section p {
            font-size: 1.1rem;
            margin-bottom: 25px;
        }

        .resume-section .btn-light {
            background-color: #fff;
            color: #0072ff;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .resume-section .btn-light:hover {
            background-color: #f0f0f0;
            color: #0056b3;
        }

        .resume-section .naukri-logo {
            width: 100px;
            height: auto;
            margin-left: 20px;
        }

        .resume-section .illustration {
            position: absolute;
            right: 20px;
            bottom: -10px;
            width: 200px;
            /* Adjust size as needed */
            height: auto;
            opacity: 0.9;
        }

        .resume-section .illustration img {
            max-width: 100%;
            height: auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .search-bar-container {
        flex-direction: column;
        padding: 15px;
        border-radius: 24px;
        box-shadow: 0 4px 18px rgba(44, 62, 80, 0.08);
        max-width: 98vw;
        margin-bottom: 30px;
        align-items: stretch;
    }

    .search-input-field {
        width: 100%;
        margin-right: 0;
        margin-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
        display: flex;
        align-items: center;
        position: relative;
    }
    .search-input-divider {
        display: none !important;
    }

    .search-bar-container .input-group-text {
        font-size: 1.35rem;
        padding-right: 8px;
    }

    .search-bar-container .form-control,
    .select-experience {
        font-size: 1.1rem;
        padding: 10px 0;
    }

    .search-bar-container .btn-primary {
        width: 100%;
        margin-left: 0;
        margin-top: 8px;
        padding: 14px 0;
        font-size: 1.08rem;
        border-radius: 999px;
    }
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold">Find your dream job now</h1>
            <p>5 lakh+ jobs for you to explore</p>

            <div class="search-bar-container">
                <div class="search-input-field">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Enter skills / designations / companies">
                    </div>
                </div>
                <div class="search-input-field">
                    <div class="input-group">
                        <!-- <span class="input-group-text"><i class="fas fa-briefcase"></i></span> -->
                        <select class="form-select form-control">
                            <option selected>Select experience</option>
                            <option value="1">0-1 years</option>
                            <option value="2">1-3 years</option>
                            <option value="3">3-5 years</option>
                            <option value="4">5+ years</option>
                        </select>
                    </div>
                </div>
                <div class="search-input-field" style="margin-right: 0;">
                    <div class="input-group">
                        <!-- <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span> -->
                        <input type="text" class="form-control" placeholder="Enter location">
                    </div>
                </div>
                <button class="btn btn-primary">Search</button>
            </div>

            <!-- Need help with your resume? -->
            <div class="resume-section">
                <div>
                    <h2>Need help with your resume?</h2>
                    <p>Get experts to build your resume from scratch</p>
                    <button class="btn btn-light">View details</button>
                </div>
                <!-- Naukri 360 logo (You'd replace 'path/to/naukri_logo.png' with your actual logo) -->
                <div style="display: flex; align-items: center;">
                    <span style="font-weight: bold; font-size: 1.2rem; margin-right: 10px;">naukri</span>
                    <span style="font-weight: bold; font-size: 1.2rem;">360</span>
                </div>
                <!-- Illustration (You'd replace 'path/to/illustration.png' with your actual illustration) -->
                <div class="illustration">
                    <!-- This could be an SVG or a PNG. For this example, I'll use a placeholder. -->
                    <!-- In a real scenario, you'd have an image tag here. -->
                    <img src="https://i.imgur.com/example_illustration.png" alt="Resume Illustration" style="opacity: 0.8; width: 150px;">
                    <!-- Placeholder for the orange swoosh/design element -->
                    <div style="position: absolute; right: 80px; top: 50px; width: 30px; height: 30px; border-radius: 50%; background-color: #ff8c00; opacity: 0.6; transform: rotate(20deg);"></div>
                </div>
            </div>

        </div>
    </section>
    <!-- Login Popup HTML and CSS -->
    <style>
        .login-popup-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(40, 50, 80, 0.15);
            display: none;
            justify-content: flex-end;
            z-index: 9999;
            transition: background 0.3s;
        }

        .login-popup {
            width: 520px;
            background: #fff;
            box-shadow: 0 8px 40px rgba(30, 41, 60, 0.20);
            border-radius: 24px 0 0 24px;
            padding: 36px 38px 28px 38px;
            margin-top: 1px;
            margin-bottom: 3px;
            display: flex;
            flex-direction: column;
            position: relative;
            min-height: 540px;
            animation: slideInRight 0.28s cubic-bezier(.2, .75, .35, 1.1);
        }

        @keyframes slideInRight {
            from {
                transform: translateX(460px);
                opacity: 0.2;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #27365c;
        }

        .register-for-free {
            position: absolute;
            right: 38px;
            top: 38px;
            color: #3078e7;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
        }

        .login-form label {
            margin: 11px 0 6px 0;
            font-size: 15px;
            color: #224190;
            font-weight: 500;
            letter-spacing: 0.02em;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #dbe4fa;
            border-radius: 12px;
            font-size: 16px;
            margin-bottom: 18px;
            outline: none;
            background: #f6faff;
            color: #27365c;
            transition: border 0.22s;
        }

        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #3078e7;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: #3078e7;
            color: #fff;
            border: none;
            border-radius: 24px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            letter-spacing: .04em;
            transition: background 0.2s;
        }

        .login-form input[type="submit"]:hover {
            background: #255fb5;
        }

        .login-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 6px;
        }

        .login-link {
            color: #3078e7;
            font-size: 13px;
            text-decoration: none;
            font-weight: 500;
            margin-left: auto;
        }

        .login-divider {
            text-align: center;
            margin-top: 22px;
            margin-bottom: 12px;
            color: #a3afd6;
            font-size: 14px;
            position: relative;
        }

        .login-divider::before,
        .login-divider::after {
            content: "";
            display: inline-block;
            width: 46px;
            height: 1px;
            background: #e6eafd;
            vertical-align: middle;
            margin: 0 10px;
        }

        .login-google {
            display: block;
            width: 100%;
            text-align: center;
            background: #fff;
            border: 1px solid #3078e7;
            border-radius: 100px;
            padding: 12px 0;
            color: #3078e7;
            font-weight: 700;
            margin-top: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
        }

        .login-google:hover {
            background: #f4faff;
            border-color: #18418c;
            color: #18418c;
        }

        @media (max-width: 700px) {
            .login-popup-bg {
                justify-content: center;
            }

            .login-popup {
                width: 100vw;
                border-radius: 0;
                padding: 22px 12px;
                margin: 18px 0;
            }
        }

        .login-close {
            position: absolute;
            top: 27px;
            right: 18px;
            font-size: 22px;
            color: #b6bed7;
            cursor: pointer;
            line-height: 1;
            font-weight: 700;
            transition: color 0.15s;
        }

        .login-close:hover {
            color: #3078e7;
        }
    </style>
    <div class="login-popup-bg" id="loginPopupBg">
        <div class="login-popup">
            <span class="login-close" id="closeLoginPopup">&times;</span>
            <a href="<?= base_url('register'); ?>" class="register-for-free">Register for free</a>
            <span class="login-title">Login</span>
            <form class="login-form" method="post" action="<?= base_url('login/process'); ?>">
                <label for="login-username">Email ID / Username</label>
                <input type="text" id="login-username" name="username"
                    placeholder="Enter your active Email ID / Username" required>
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
                <div class="login-actions">
                    <a href="<?= base_url('login/forgot'); ?>" class="login-link">Forgot Password?</a>
                </div>
                <input type="submit" value="Login">
            </form>
            <div style="text-align:center; margin:20px 0 8px;">
                <span style="color:#3078e7;">Use OTP to Login</span>
            </div>
            <div class="login-divider">Or</div>
            <button class="login-google" onclick="window.location.href='<?= base_url('login/google'); ?>'">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"
                    style="height:17px; vertical-align:middle; margin-right:10px;"> Sign in with Google
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>