<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
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

        .form-control:focus {
            border-color: #FFC107;
            box-shadow: none;
            outline: none;
        }

        .hero-section {
            padding: 60px 0;
            text-align: center;
        }

        .hero-section h1 {
            color: #000000ff;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hero-section p {
            color: #000000ff;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .select-experience {
            background: transparent;
            border: none;
            font-size: 1rem;
            color: #222;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            font-weight: 400;
            cursor: pointer;
            transition: color 0.2s;
        }

        .select-experience:focus {
            outline: none;
            color: #222;
        }

        .resume-section {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border-radius: 12px;
            padding: 30px;
            color: #fff;
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .resume-section h2 {
            font-size: 1.6rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .resume-section p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .resume-section .btn-light {
            background-color: #fff;
            color: #0072ff;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .resume-section .btn-light:hover {
            background-color: #f0f0f0;
            color: #0056b3;
        }

        .tagline-image {
            max-width: 100%;
            margin: 20px auto;
            text-align: center;
        }

        .tagline-image img {
            max-width: 60%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .job-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 15px;
            justify-content: center;
            margin: 30px auto;
            max-width: 1000px;
        }

        .category-card {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 15px;
            font-size: 14px;
            font-weight: 500;
            color: #111827;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .category-card i {
            font-size: 16px;
            color: #374151;
        }

        .category-card .arrow {
            margin-left: auto;
            font-size: 12px;
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
            flex: 1;
        }

        .company-card img {
            height: 45px;
            border-radius: 7px;
            background: #f9fafb;
            padding: 4px;
        }

        .companies-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .featured-companies {
            margin-top: 60px;
            text-align: center;
        }

        .featured-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .featured-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
        }

        .featured-card img {
            height: 40px;
            margin-bottom: 12px;
        }

        .featured-card h5 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .featured-card p {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 10px;
            min-height: 36px;
        }

        .featured-rating {
            font-size: 13px;
            margin-bottom: 6px;
            color: #333;
        }

        .view-all-btn {
            border-radius: 999px;
            padding: 10px 20px;
            font-size: 15px;
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

        .siemens-banner {
            background: transparent;
            border-radius: 12px;
            overflow: hidden;
            max-width: 100%;
            margin: 30px auto;
            height: auto;
            display: flex;
            flex-direction: column;
        }

        .banner-right {
            position: relative;
            width: 100%;
        }

        .banner-image {
            width: 60%;
            height: 60%;
            object-fit: cover;
        }

        .error-outline {
            border: 1px solid #d32f2f;
            border-radius: 50px;
        }

        @media (max-width: 576px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }

            .hero-section p {
                font-size: 0.95rem;
            }

            .company-card {
                flex: 1 1 100%;
            }

            .companies-wrapper {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Make search bar auto-adjust */
        .search-bar-top {
            background: #fff;
            border-radius: 999px;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 10px 25px;
            box-sizing: border-box;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.08);
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

        .search-bar-top .form-control {
            background: transparent;
            border: none;
            box-shadow: none;
            padding-left: 0;
            padding-right: 15px;
            font-size: 1.1rem;
            color: #222;
            font-family: 'Nunito', Arial, sans-serif !important;
            font-weight: 400;
            transition: color 0.2s;
        }


        .search-bar-top .input-group {
            width: 100%;
        }

        /* Input grows with screen */
        .search-bar-top .form-control {
            flex: 1 1 auto;
            min-width: 0;
        }

        /* Hide search icon on small screens */
        @media (max-width: 576px) {
            .search-bar-top .input-group-text {
                display: none;
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

            <div class="search-bar-top" id="search-container">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" id="job-search-input" class="form-control"
                        placeholder="Jobs / Designation / Location">
                    <button id="search-button" class="btn btn-primary"
                        style="background-color: #FFF44F; color: black; border-radius: 50px; border: none;">Search</button>
                </div>
            </div>

            <!-- Error Message -->
            <div id="search-error-message"
                style="display:none; color:#d32f2f; margin-top:5px; font-size:0.95em; font-weight:500;">
                Please enter keywords to search relevant jobs
            </div>



            <!-- Tagline Image -->
            <div class="tagline-image">
                <img src="assets/images/SahajJobs.png" alt="Apply for job !!!!">
            </div>

            <!-- Job Categories -->
            <div class="job-categories">
                <div class="category-card"><i class="fas fa-laptop-house"></i><span>Remote</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-building"></i><span>IT Services</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-user-graduate"></i><span>Internship</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-university"></i><span>Finance</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-users"></i><span>HR</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-chart-line"></i><span>Sales</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-cogs"></i><span>Engineer</span><i
                        class="fas fa-chevron-right arrow"></i></div>
                <div class="category-card"><i class="fas fa-user-friends"></i><span>Fresher</span><i
                        class="fas fa-chevron-right arrow"></i></div>
            </div>

            <!-- Top Companies -->
            <div class="container my-5">
                <h2 class="fw-bold text-center mb-4">Top companies hiring now</h2>
                <div class="companies-wrapper">
                    <div class="company-card">
                        <h5>Edtech <i class="fas fa-chevron-right"></i></h5>
                        <p>161 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <img src="assets/images/company1.gif" alt="">
                            <img src="assets/images/company2.gif" alt="">
                            <img src="assets/images/company3.gif" alt="">
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>Healthcare <i class="fas fa-chevron-right"></i></h5>
                        <p>599 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <img src="assets/images/company5.gif" alt="">
                            <img src="assets/images/company6.gif" alt="">
                            <img src="assets/images/company7.gif" alt="">
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>Unicorns <i class="fas fa-chevron-right"></i></h5>
                        <p>87 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <img src="assets/images/company9.gif" alt="">
                            <img src="assets/images/company10.gif" alt="">
                            <img src="assets/images/company11.gif" alt="">
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>B2C <i class="fas fa-chevron-right"></i></h5>
                        <p>2.3k+ are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <img src="assets/images/company13.gif" alt="">
                            <img src="assets/images/company14.gif" alt="">
                            <img src="assets/images/company15.gif" alt="">
                        </div>
                    </div>
                    <div class="company-card">
                        <h5>Internet <i class="fas fa-chevron-right"></i></h5>
                        <p>247 are actively hiring</p>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <img src="assets/images/company17.gif" alt="">
                            <img src="assets/images/company18.gif" alt="">
                            <img src="assets/images/company19.gif" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Companies -->
            <div class="container featured-companies">
                <h2 class="fw-bold text-center mb-4">Featured companies actively hiring</h2>
                <div class="featured-wrapper">
                    <div class="featured-card"><img src="assets/images/reliance.gif">
                        <h5>Reliance Industries (RIL)</h5>
                        <div class="featured-rating">⭐ 4.0 | 18.2K+ reviews</div>
                        <p>Indian multinational conglomerate company.</p><button class="btn btn-sm"
                            style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card"><img src="assets/images/capgemini.gif">
                        <h5>Capgemini</h5>
                        <div class="featured-rating">⭐ 3.7 | 48.1K+ reviews</div>
                        <p>Global leader in technology services.</p><button class="btn btn-sm"
                            style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card"><img src="assets/images/infosys.gif">
                        <h5>Infosys BPM</h5>
                        <div class="featured-rating">⭐ 3.5 | 11K+ reviews</div>
                        <p>Join us to navigate your next.</p><button class="btn btn-sm"
                            style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card"><img src="assets/images/amgen.gif">
                        <h5>Amgen Inc</h5>
                        <div class="featured-rating">⭐ 3.1 | 35 reviews</div>
                        <p>LIVE. WIN. THRIVE.</p><button class="btn btn-sm"
                            style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                    <div class="featured-card"><img src="assets/images/amazon.gif">
                        <h5>Amazon</h5>
                        <div class="featured-rating">⭐ 4.0 | 28.4K+ reviews</div>
                        <p>World's largest Internet company.</p><button class="btn btn-sm"
                            style="background:#FFF44F; color:#29374d;">View jobs</button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn view-all-btn">View all companies</button>
            </div>

            <!-- Siemens Video Banner -->
            <div class="container mt-5">
                <div class="siemens-banner">
                    <div class="banner-right position-relative">
                        <video autoplay muted loop playsinline class="banner-image">
                            <source src="assets/videos/image_video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <!-- Job Fair Banner -->
            <div class="container mt-4">
                <img src="assets/images/job-fair-banner.jpg" alt="Job Fair Banner"
                    style="display:block;max-width:100%;height:auto;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.1);margin:0 auto;">
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("search-button").addEventListener("click", function (e) {
            const input = document.getElementById("job-search-input");
            const search = input.value.trim();
            const errorMsg = document.getElementById("search-error-message");
            const container = document.getElementById("search-container");

            if (!search) {
                e.preventDefault();
                errorMsg.style.display = "block";
                container.classList.add("error-outline");
            } else {
                errorMsg.style.display = "none";
                container.classList.remove("error-outline");
                const query = new URLSearchParams();
                query.append("q", search);
                window.location.href = "<?= base_url('jobsearch'); ?>?" + query.toString();
            }
        });

        document.getElementById("job-search-input").addEventListener("keyup", function (event) {
            if (event.key === "Enter") {
                document.getElementById("search-button").click();
            }
        });

        document.getElementById("job-search-input").addEventListener("input", function () {
            document.getElementById("search-error-message").style.display = "none";
            document.getElementById("search-container").classList.remove("error-outline");
        });
    </script>
</body>

</html>