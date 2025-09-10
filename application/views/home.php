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
            color: #2563eb;
            border: 1.8px solid #2563eb;
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

            <!-- Tagline Image -->
            <div class="tagline-image">
                <img src="assets/images/home_tag_1.png"
                    alt="Result stays private - Practice customized mock interview with AI!">
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
                        <button class="btn btn-primary btn-sm">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/capgemini.gif" alt="Capgemini">
                        <h5>Capgemini</h5>
                        <div class="featured-rating">⭐ 3.7 | 48.1K+ reviews</div>
                        <p>Global leader in technology services.</p>
                        <button class="btn btn-primary btn-sm">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/infosys.gif" alt="Infosys BPM">
                        <h5>Infosysy BPM</h5>
                        <div class="featured-rating">⭐ 3.5 | 11K+ reviews</div>
                        <p>Join us to navigate your next.</p>
                        <button class="btn btn-primary btn-sm">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/amgen.gif" alt="Amgen Inc">
                        <h5>Amzen Inc</h5>
                        <div class="featured-rating">⭐ 3.1 | 35 reviews</div>
                        <p>LIVE. WIN. THRIVE.</p>
                        <button class="btn btn-primary btn-sm">View jobs</button>
                    </div>
                    <div class="featured-card">
                        <img src="assets/images/amazon.gif" alt="Amazon">
                        <h5>Amazon</h5>
                        <div class="featured-rating">⭐ 4.0 | 28.4K+ reviews</div>
                        <p>World's largest Internet company.</p>
                        <button class="btn btn-primary btn-sm">View jobs</button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-outline-primary view-all-btn">View all companies</button>
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
                <img src="assets/images/banner.jpg" alt="Young Turks Contest Banner"
                    style="display:block;max-width:100%;height:auto;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.1);margin:0 auto;">
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
                <img style="height: 30px; width: 30px;" src="<?= base_url('assets/images/google.png'); ?>" alt="google">
                Sign in with Google
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>