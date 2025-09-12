<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobnest | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Firebase SDK (compat version for v8 style) -->
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script>
        // Your Firebase config
        const firebaseConfig = {
            apiKey: "AIzaSyArPK3Lb2xtZXeBXWXCq4_g4BopsjpNrN0",
            authDomain: "jobnest-1353e.firebaseapp.com",
            projectId: "jobnest-1353e",
            storageBucket: "jobnest-1353e.firebasestorage.app",
            messagingSenderId: "649093243578",
            appId: "1:649093243578:web:8f9745abeacc310a229883",
            measurementId: "G-SXWKWBFB8P"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .search-bar-container .form-control,
        .select-experience,
        .search-bar-container .btn-primary,
        .custom-footer {
            font-family: 'Nunito', Arial, sans-serif !important;
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

        /* New tagline image styling */
        .tagline-image {
            max-width: 900px;
            margin: 0 auto 40px auto;
            text-align: center;
        }

        .tagline-image img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Job category icons styling */
        .job-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin: 30px auto;
            max-width: 950px;
        }

        .category-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px 18px;
            font-size: 15px;
            font-weight: 500;
            color: #111827;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            min-width: 160px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .category-card i {
            font-size: 16px;
            color: #374151;
        }

        .category-card .arrow {
            margin-left: auto;
            font-size: 14px;
            color: #9ca3af;
        }

        .category-card:hover {
            background: #f9fafb;
            transform: translateY(-2px);
        }

        .company-card {
            min-width: 220px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .company-card h5 {
            font-weight: 600;
            font-size: 16px;
        }

        .company-card p {
            font-size: 14px;
            color: #6b7280;
        }

        .company-card img {
            height: 50px;
            border-radius: 7px;
            background: #f9fafb;
            padding: 4px;
        }

        .companies-wrapper {
            display: flex;
            gap: 15px;
            justify-content: center;
        }


        .job-categories {
            gap: 15px;
        }

        .category-item {
            width: 80px;
        }

        .category-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }

        .category-name {
            font-size: 12px;
        }

        /* Featured Companies Section */
        .featured-companies {
            margin-top: 60px;
            text-align: center;
        }

        .featured-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
            /* Exact same gaping as screenshot */
            justify-content: center;
        }

        .featured-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px 20px;
            /* balanced spacing */
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
        }

        .featured-card img {
            height: 45px;
            margin-bottom: 14px;
        }

        .featured-card h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .featured-card p {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 12px;
            min-height: 36px;
            /* maintains same height across cards */
        }

        .featured-rating {
            font-size: 14px;
            margin-bottom: 6px;
            color: #333;
        }

        .featured-card .btn {
            border-radius: 999px;
            font-size: 14px;
            padding: 6px 18px;
        }

        /* View All Companies Button */
        .view-all-btn {
            border-radius: 999px;
            padding: 10px 28px;
            font-size: 16px;
            font-weight: 500;
            color: #050203;
            border: 1.8px solid #FFF44F;
            background: #fff;
            transition: all 0.2s ease;
        }

        .view-all-btn:hover {
            background: #d8dff0ff;
            color: #5b3ce6ff;
        }

        /* Siemens Banner Section */
        .siemens-banner {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
            max-width: 900px;
            margin: 40px auto;
            height: 280px;
            /* Fixed height to match image */
            display: flex;
        }

        .banner-left {
            flex: 1;
            padding: 30px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)),
                url('https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80') center/cover no-repeat;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .banner-logo {
            height: 40px;
            width: auto;
            margin-bottom: 15px;
        }

        .banner-title {
            font-weight: 700;
            margin: 10px 0;
            font-size: 1.8rem;
            line-height: 1.2;
        }

        .banner-link {
            color: #2d7ef7;
            font-weight: 600;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
        }

        .banner-right {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .play-button-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #000;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .play-button-overlay:hover {
            background: rgba(255, 255, 255, 1);
            transform: translate(-50%, -50%) scale(1.05);
        }


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

        }
    </style>
    <style>
        .custom-footer {
            font-family: 'Montserrat', Arial, sans-serif;
            /* background: #fff; */
            padding: 40px 0 0 0;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 50px;
        }

        .footer-logo-social {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-width: 180px;
            margin-right: 10px;
        }

        .footer-logo img {
            width: 140px;
            margin-bottom: 28px;
        }

        .footer-social-label {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 9px;
            color: #232a35;
        }

        .footer-social-icons a {
            margin-right: 10px;
            display: inline-block;
            background: #f4f6fb;
            border-radius: 4px;
            padding: 4px;
            transition: box-shadow 0.15s;
        }

        .footer-social-icons a img {
            width: 24px;
            height: 24px;
        }

        .footer-social-icons a:hover {
            box-shadow: 0 0 0 2px #e4eaf1;
        }

        .footer-links {
            display: flex;
            justify-content: flex-start;
            gap: 60px;
            flex: 1;
            margin-left: 30px;
            margin-right: 30px;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links ul li {
            margin-bottom: 14px;
        }

        .footer-links ul li a {
            color: #232a35;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.2s;
        }

        .footer-links ul li a:hover {
            color: #0073e6;
            text-decoration: underline;
        }

        .footer-app-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 0 0 1px #edf0f5;
            padding: 28px 28px 21px 34px;
            min-width: 340px;
            max-width: 340px;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-app-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 7px;
            color: #232a35;
        }

        .footer-app-desc {
            font-size: 15px;
            color: #495057;
            margin-bottom: 19px;
        }

        .footer-app-buttons {
            display: flex;
            gap: 12px;
        }

        .footer-app-buttons a img {
            width: 146px;
            height: 44px;
            box-shadow: 0 1px 4px rgba(60, 72, 88, 0.09);
            border-radius: 7px;
            transition: transform 0.15s;
        }

        .footer-app-buttons a img:hover {
            transform: scale(1.03);
        }

        .footer-divider {
            border-top: 1px solid #edf0f5;
            margin: 46px 50px 0 50px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            max-width: 1280px;
            margin: 0 auto;
            padding: 18px 50px 32px 50px;
            flex-wrap: wrap;
        }

        .footer-infoedge {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .footer-infoedge-logo {
            width: 112px;
            height: auto;
        }

        .footer-infoedge-text div {
            color: #859ac3;
            font-size: 16px;
            line-height: 1.65;
        }

        .footer-business-scroller {
            width: 100%;
            margin-top: 18px;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: nowrap;
            overflow: hidden;
            max-width: 700px;
        }

        .business-label {
            color: #859ac3;
            font-size: 16px;
            font-weight: 400;
            margin-right: 12px;
            white-space: nowrap;
        }

        .business-logos-scroller {
            display: flex;
            gap: 32px;
            align-items: center;
            margin: 0;
            padding: 0;
            list-style: none;
            animation: scroll-logos 50s linear infinite;
        }

        .business-logos-scroller li {
            flex: 0 0 auto;
            display: inline-block;
        }

        .business-logos-scroller li a img {
            height: 40px;
            width: 150px;
            object-fit: contain;
            transition: filter 0.15s;
            filter: brightness(1);
        }

        .business-logos-scroller li a img:hover {
            filter: brightness(0.85);
        }

        @keyframes scroll-logos {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .footer-top {
                flex-direction: column;
                padding: 0 20px;
            }

            .footer-links {
                margin: 20px 0;
                gap: 30px;
                flex-wrap: wrap;
            }

            .footer-app-card {
                margin-left: 0;
                margin-top: 20px;
                max-width: 100%;
            }

            .footer-business-scroller {
                max-width: 100%;
                width: 100%;
            }

            .business-logos-scroller li a img {
                width: 110px;
                height: 30px;
            }
        }
    </style>
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
            color: #29374d;
        }

        .register-for-free {
            position: absolute;
            right: 45px;
            top: 45px;
            color: #29374d;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
        }

        .login-form label {
            margin: 11px 0 6px 0;
            font-size: 15px;
            color: #1b212b;
            font-weight: 500;
            letter-spacing: 0.02em;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #808080;
            border-radius: 12px;
            font-size: 16px;
            margin-bottom: 18px;
            outline: none;
            background: #fff !important;
            color: #27365c;
            transition: border 0.22s;
        }

        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #808080;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #FFF44F;
            color: #29374d;
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
            background: #d3c830ff;
        }

        .login-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 6px;
        }

        .login-link {
            color: #1b212b;
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
            border: 1px solid #FFF44F;
            border-radius: 100px;
            padding: 7px 0;
            color: #3078e7;
            font-weight: 700;
            margin-top: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
        }

        .login-google:hover {
            background: #f4faff;
            border-color: #FFF44F;
            color: #3078e7;
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
            top: 2px;
            right: 22px;
            font-size: 35px;
            color: #575b67ff;
            cursor: pointer;
            line-height: 1;
            font-weight: 700;
            transition: color 0.15s;
        }

        .login-close:hover {
            color: #b6bed7;
        }

        /* Search bar styles */
        .search-bar-top {
            background: #fff;
            border-radius: 999px;
            padding: 13px 25px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.08);
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            margin-left: 9rem;
            border: none;
            width: 1000px;
        }

        .search-bar-top .input-group-text {
            background-color: transparent;
            border: none;
            color: #8893b3;
            font-size: 1.3rem;
            padding-right: 12px;
            padding-left: 0;
            display: flex;
            align-items: center;
        }

        .search-input-field-top {
            display: flex;
            align-items: center;
            flex-grow: 1;
            margin-right: 0;
            position: relative;
        }

        .search-bar-top .form-control {
            background: transparent;
            border: none;
            box-shadow: none;
            padding-left: 0;
            padding-right: 15px;
            font-size: 1.1rem;
            color: #222;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            font-weight: 400;
            transition: color 0.2s;
        }

        .search-bar-top .form-control::placeholder {
            color: #8893b3;
            opacity: 1;
            font-weight: 400;
        }

        .search-bar-top .form-control:focus {
            outline: none;
            color: #222;
        }

        .search-bar-top .btn-primary {
            background-color: #FFF44F;
            border: none;
            padding: 10px 30px;
            border-radius: 999px;
            font-size: 1rem;
            font-weight: 560;
            color: #29374d;
            margin-left: 15px;
            box-shadow: none;
            transition: background 0.2s;
        }

        .search-bar-top .btn-primary:hover {
            background-color: #d3c830ff;
        }

        .search-input-divider-top {
            content: '';
            display: block;
            width: 1px;
            height: 60%;
            background: #e3e7f0;
            margin: 0 15px;
            align-self: center;
        }

        @media (max-width: 992px) {
            .search-bar-top {
                flex-direction: column;
                padding: 15px;
                border-radius: 24px;
            }

            .search-input-field-top {
                width: 100%;
                margin-right: 0;
                margin-bottom: 15px;
                border-bottom: 1px solid #e0e0e0;
                padding-bottom: 15px;
            }

            .search-input-divider-top {
                display: none !important;
            }

            .search-bar-top .btn-primary {
                width: 100%;
                margin-left: 0;
                margin-top: 8px;
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

            <div class="search-bar-top">
                <div class="search-input-field-top">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" id="job-search-input" class="form-control" placeholder="Designation">
                    </div>
                </div>
                <div class="search-input-divider-top"></div>
                <div class="search-input-field-top" style="margin-right: 0;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" id="location-search-input" class="form-control"
                            placeholder="City, state, zip code, or &quot;remote&quot;">
                    </div>
                </div>
                <button id="search-button" class="btn btn-primary">Search</button>
            </div>



            <!-- Tagline Image -->
            <div class="tagline-image">
                <img src="assets/images/job-recruitment.jpg" alt="Apply for job !!!!">
            </div>

            <!-- Job Categories from the image -->
            <div class="job-categories">
                <div class="category-card">
                    <i class="fas fa-laptop-house"></i>
                    <span>Remote</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-building"></i>
                    <span>MNC</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-user-graduate"></i>
                    <span>Internship</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-tasks"></i>
                    <span>Project Mgmt</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-university"></i>
                    <span>Banking & Finance</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-truck"></i>
                    <span>Supply Chain</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-users"></i>
                    <span>HR</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-chart-line"></i>
                    <span>Sales</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-cogs"></i>
                    <span>Engineering</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-crown"></i>
                    <span>Fortune 500</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
                <div class="category-card">
                    <i class="fas fa-user-friends"></i>
                    <span>Fresher</span>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>

            <!-- Top Companies Hiring Now -->
            <div class="container my-5">
                <h2 class="fw-bold text-center mb-4">Top companies hiring now</h2>
                <div class="companies-wrapper flex-wrap">
                    <div class="company-card">
                        <h5>Edtech <i class="fas fa-chevron-right"></i></h5>
                        <p>161 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <img src="assets/images/company1.gif" alt="">
                            <img src="assets/images/company2.gif" alt="">
                            <img src="assets/images/company3.gif" alt="">
                            <!-- <img src="assets/images/company4.gif" alt=""> -->
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>Healthcare <i class="fas fa-chevron-right"></i></h5>
                        <p>599 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <img src="assets/images/company5.gif" alt="">
                            <img src="assets/images/company6.gif" alt="">
                            <img src="assets/images/company7.gif" alt="">
                            <!-- <img src="assets/images/company8.gif" alt=""> -->
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>Unicorns <i class="fas fa-chevron-right"></i></h5>
                        <p>87 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <img src="assets/images/company9.gif" alt="">
                            <img src="assets/images/company10.gif" alt="">
                            <img src="assets/images/company11.gif" alt="">
                            <!-- <img src="assets/images/company12.gif" alt=""> -->
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>B2C <i class="fas fa-chevron-right"></i></h5>
                        <p>2.3k+ are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <img src="assets/images/company13.gif" alt="">
                            <img src="assets/images/company14.gif" alt="">
                            <img src="assets/images/company15.gif" alt="">
                            <!-- <img src="assets/images/company16.gif" alt=""> -->
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>Internet <i class="fas fa-chevron-right"></i></h5>
                        <p>247 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <img src="assets/images/company17.gif" alt="">
                            <img src="assets/images/company18.gif" alt="">
                            <img src="assets/images/company19.gif" alt="">
                            <!-- <img src="assets/images/company20.gif" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Companies Section -->
            <div class="container featured-companies">
                <h2 class="fw-bold text-center mb-4">Featured companies actively hiring</h2>
                <div class="featured-wrapper">
                    <div class="featured-card">
                        <img src="assets/images/reliance.gif" alt="Reliance Industries (RIL)">
                        <h5>Reliance Industries (RIL)</h5>
                        <div class="featured-rating">⭐ 4.0 | 18.2K+ reviews</div>
                        <p>Indian multinational conglomerate company.</p>
                        <button class="btn  btn-sm" style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/capgemini.gif" alt="Capgemini">
                        <h5>Capgemini</h5>
                        <div class="featured-rating">⭐ 3.7 | 48.1K+ reviews</div>
                        <p>Global leader in technology services.</p>
                        <button class="btn btn-sm" style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/infosys.gif" alt="Infosys BPM">
                        <h5>Infosysy BPM</h5>
                        <div class="featured-rating">⭐ 3.5 | 11K+ reviews</div>
                        <p>Join us to navigate your next.</p>
                        <button class="btn btn-sm" style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/amgen.gif" alt="Amgen Inc">
                        <h5>Amzen Inc</h5>
                        <div class="featured-rating">⭐ 3.1 | 35 reviews</div>
                        <p>LIVE. WIN. THRIVE.</p>
                        <button class="btn btn-sm" style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/amazon.gif" alt="Amazon">
                        <h5>Amazon</h5>
                        <div class="featured-rating">⭐ 4.0 | 28.4K+ reviews</div>
                        <p>World's largest Internet company.</p>
                        <button class="btn btn-sm" style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn view-all-btn">View all companies</button>
            </div>

            <!-- Siemens Style Banner Section -->
            <div class="container mt-5">
                <div class="siemens-banner">
                    <div class="row g-0">
                        <div class="col-md-5 banner-left">
                            <div class="d-flex align-items-center mb-2">
                                <img src="assets/images/siemens.gif" alt="Siemens" class="banner-logo">
                                <span class="ms-2 fw-bold">Siemens</span>
                                <span class="ms-2 text-warning">⭐ 4.0</span>
                            </div>
                            <h3 class="banner-title">Belong, Inspire, Transform Together</h3>
                            <a href="#" class="banner-link">Learn more</a>
                        </div>
                        <div class="col-md-7 banner-right position-relative">
                            <img src="assets/images/siemens-collage.jpg" alt="Siemens team" class="banner-image">
                            <div class="play-button-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Young Turks Contest Banner -->
            <div class="container mt-4">
                <img src="assets/images/job-fair-banner.jpg" alt="Job Fair Banner"
                    style="display:block;max-width:100%;height:auto;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.1);margin:0 auto;">
            </div>

            <footer class="custom-footer">
                <div class="footer-top">
                    <div class="footer-logo-social">
                        <a href="https://www.naukri.com" class="footer-logo">
                            <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="JobNest">
                        </a>
                        <div class="footer-social">
                            <div class="footer-social-label">Connect with us</div>
                            <div class="footer-social-icons">
                                <a href="https://www.facebook.com/Naukri" target="_blank" rel="noopener">
                                    <img src="https://static.naukimg.com/s/0/0/i/new-homepage/facebook.svg"
                                        alt="Facebook" />
                                </a>
                                <a href="https://instagram.com/naukridotcom/" target="_blank" rel="noopener">
                                    <img src="https://static.naukimg.com/s/0/0/i/new-homepage/instagram.svg"
                                        alt="Instagram" />
                                </a>
                                <a href="https://twitter.com/naukri" target="_blank" rel="noopener">
                                    <img src="https://static.naukimg.com/s/0/0/i/new-homepage/twitter_v1.svg" alt="X" />
                                </a>
                                <a href="http://www.linkedin.com/company/naukri.com" target="_blank" rel="noopener">
                                    <img src="https://static.naukimg.com/s/0/0/i/new-homepage/linkedin.svg"
                                        alt="LinkedIn" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="footer-links">
                        <ul>
                            <li><a href="<?= base_url('about-us'); ?>">About us</a></li>
                            <li><a href="<?= base_url('careers'); ?>">Careers</a></li>
                            <li><a href="<?= base_url('employer-home'); ?>">Employer home</a></li>
                            <li><a href="<?= base_url('sitemap'); ?>">Sitemap</a></li>
                            <li><a href="<?= base_url('credits'); ?>">Credits</a></li>
                        </ul>
                        <ul>
                            <li><a href="<?= base_url('help-center'); ?>">Help center</a></li>
                            <li><a href="<?= base_url('summons-notices'); ?>">Summons/Notices</a></li>
                            <li><a href="<?= base_url('grievances'); ?>">Grievances</a></li>
                            <li><a href="<?= base_url('report-issue'); ?>">Report issue</a></li>
                        </ul>
                        <ul>
                            <li><a href="<?= base_url('privacy-policy'); ?>">Privacy policy</a></li>
                            <li><a href="<?= base_url('terms-and-conditions'); ?>">Terms & conditions</a></li>
                            <li><a href="<?= base_url('fraud-alert'); ?>">Fraud alert</a></li>
                            <li><a href="<?= base_url('trust-safety'); ?>">Trust & safety</a></li>
                        </ul>
                    </div>

                    <div class="footer-app-card">
                        <div class="footer-app-title">Apply on the go</div>
                        <div class="footer-app-desc">Get real-time job updates on our App</div>
                        <div class="footer-app-buttons">
                            <a href="https://play.google.com/store/apps/details?id=naukriApp.appModules.login&amp;hl=en&amp;utm_source=naukri&amp;utm_medium=footer"
                                target="_blank" rel="noopener">
                                <img src="https://static.naukimg.com/s/0/0/i/new-homepage/android-app_v1.png"
                                    alt="Google Play" />
                            </a>
                            <a href="https://itunes.apple.com/in/app/naukri.com-job-search/id482877505?mt=8"
                                target="_blank" rel="noopener">
                                <img src="https://static.naukimg.com/s/0/0/i/new-homepage/ios-app_v1.png"
                                    alt="App Store" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="footer-divider"></div>

                <div class="footer-bottom">
                    <div class="footer-infoedge">
                        <img src="https://static.naukimg.com/s/0/0/i/new-homepage/infoedge-logo.svg"
                            alt="Info Edge Logo" class="footer-infoedge-logo" />
                        <div class="footer-infoedge-text">
                            <div>All trademarks are the property of their respective owners</div>
                            <div>All rights reserved © 2025 Info Edge (India) Ltd.</div>
                        </div>
                    </div>

                    <div class="footer-business-scroller">
                        <span class="business-label">Our businesses</span>
                        <ul class="business-logos-scroller">
                            <li><a href="https://www.99acres.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/nnacres.png"
                                        alt="99acres" /></a></li>
                            <li><a href="https://www.jeevansathi.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jeevansathi.png"
                                        alt="Jeevansathi.com" /></a></li>
                            <li><a href="https://www.naukrigulf.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/ng_v1.png"
                                        alt="Naukri Gulf" /></a></li>
                            <li><a href="https://www.shiksha.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/shiksha.png"
                                        alt="Shiksha.com" /></a></li>
                            <li><a href="https://www.iimjobs.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/iimjobs.png"
                                        alt="IIMJobs.com" /></a></li>
                            <li><a href="https://www.hirist.tech/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/hirist_v1.png"
                                        alt="hirist.tech" /></a></li>
                            <li><a href="https://www.jobhai.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jobhai.png"
                                        alt="JobHai.com" /></a></li>
                            <li><a href="https://doselect.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/doselect.png"
                                        alt="Doselect.com" /></a></li>
                            <li><a href="https://www.naukri.com/minis" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/minis.png"
                                        alt="Minis" /></a></li>
                            <li><a href="https://www.codingninjas.com/?utm_source=naukri&amp;utm_medium=desktop-footer"
                                    target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/coding_ninjas.png"
                                        alt="Coding Ninjas" /></a></li>

                            <!-- Repeat logos for smooth infinite scroll -->
                            <li><a href="https://www.99acres.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/nnacres.png"
                                        alt="99acres" /></a></li>
                            <li><a href="https://www.jeevansathi.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jeevansathi.png"
                                        alt="Jeevansathi.com" /></a></li>
                            <li><a href="https://www.naukrigulf.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/ng_v1.png"
                                        alt="Naukri Gulf" /></a></li>
                            <li><a href="https://www.shiksha.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/shiksha.png"
                                        alt="Shiksha.com" /></a></li>
                            <li><a href="https://www.iimjobs.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/iimjobs.png"
                                        alt="IIMJobs.com" /></a></li>
                            <li><a href="https://www.hirist.tech/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/hirist_v1.png"
                                        alt="hirist.tech" /></a></li>
                            <li><a href="https://www.jobhai.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jobhai.png"
                                        alt="JobHai.com" /></a></li>
                            <li><a href="https://doselect.com/" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/doselect.png"
                                        alt="Doselect.com" /></a></li>
                            <li><a href="https://www.naukri.com/minis" target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/minis.png"
                                        alt="Minis" /></a></li>
                            <li><a href="https://www.codingninjas.com/?utm_source=naukri&amp;utm_medium=desktop-footer"
                                    target="_blank"><img
                                        src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/coding_ninjas.png"
                                        alt="Coding Ninjas" /></a></li>
                        </ul>
                    </div>
                </div>
            </footer>



        </div>
    </section>

    <div class="login-popup-bg" id="loginPopupBg">
        <div class="login-popup">
            <span class="login-close" id="closeLoginPopup">&times;</span>
            <a href="<?= base_url('register'); ?>" class="register-for-free">Register for free</a>
            <span class="login-title">Candidate Login</span>
            <form class="login-form" method="post" action="<?= base_url('login/process'); ?>" autocomplete="off">
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
                <span style="color:#1b212b;">Use OTP to Login</span>
            </div>
            <div class="login-divider">Or</div>
            <button id="googleSignInBtn" class="login-google">
                <img style="height:30px; width:30px;" src="<?= base_url('assets/images/google.png'); ?>" alt="google" />
                Sign in with Google
            </button>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('googleSignInBtn').addEventListener('click', function () {
            var provider = new firebase.auth.GoogleAuthProvider();
            firebase.auth().signInWithPopup(provider)
                .then(function (result) {
                    var user = result.user;

                    // Send user info to CodeIgniter backend
                    fetch('<?= base_url('login/google_callback') ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            uid: user.uid,
                            name: user.displayName,
                            email: user.email,
                            picture: user.photoURL,
                            provider: 'google'
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                window.location.href = '<?= base_url('profile') ?>';
                            } else {
                                alert('Login failed: ' + data.message);
                            }
                        });
                })
                .catch(function (error) {
                    alert(error.message);
                });
        });

    </script>

    <script>
        document.getElementById('search-button').addEventListener('click', function () {
            const jobTerm = document.getElementById('job-search-input').value;
            const locationTerm = document.getElementById('location-search-input').value;
            window.location.href = "<?= base_url('job_search') ?>?job=" + encodeURIComponent(jobTerm) + "&location=" + encodeURIComponent(locationTerm);
        });

    </script>

</body>

</html>