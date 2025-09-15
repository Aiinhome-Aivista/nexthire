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

 
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold">Find your dream job now</h1>
            <p>5 lakh+ jobs for you to explore</p>
            <form id="search-form">
                <div class="search-bar-top" id="custom-search-bar">
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
                    <button id="search-button" class="btn btn-primary" type="submit">Search</button>

                </div>
            </form>
            <div id="search-error-message"
                style="display:none; color:#d32f2f; margin-top:-25px; font-size:0.95em; font-weight:500;margin-right:625px;padding: 5px;">
                Please enter keywords to search relevant jobs
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





        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  

    <!-- <script>
        document.getElementById('search-button').addEventListener('click', function () {
            const jobTerm = document.getElementById('job-search-input').value;
            const locationTerm = document.getElementById('location-search-input').value;
            window.location.href = "<?= base_url('job_search') ?>?job=" + encodeURIComponent(jobTerm) + "&location=" + encodeURIComponent(locationTerm);
        });

    </script> -->
   
    <script>
        const form = document.querySelector('#search-form');
        const jobInput = document.getElementById('job-search-input');
        const locationInput = document.getElementById('location-input') || document.getElementById('location-search-input');
        const searchBar = document.getElementById('custom-search-bar');
        const errorDiv = document.getElementById('search-error-message');

        form.addEventListener('submit', function (event) {
            const jobVal = jobInput.value.trim();
            const locationVal = locationInput ? locationInput.value.trim() : '';

            if (!jobVal) {
                event.preventDefault(); // Stop submission if job input is empty
                searchBar.classList.add('search-box-error');
                errorDiv.style.display = 'block';
            } else {
                event.preventDefault(); // Prevent normal submission to handle redirect manually
                searchBar.classList.remove('search-box-error');
                errorDiv.style.display = 'none';

                // Build search URL with parameters
                const searchUrl = `<?= base_url('job_search') ?>?job=${encodeURIComponent(jobVal)}&location=${encodeURIComponent(locationVal)}`;
                window.location.href = searchUrl;
            }
        });

        jobInput.addEventListener('input', function () {
            if (this.value.trim()) {
                searchBar.classList.remove('search-box-error');
                errorDiv.style.display = 'none';
            }
        });

        if (locationInput) {
            locationInput.addEventListener('input', function () {
                // Optional: remove any location-related error if implemented
            });
        }
    </script>
</body>

</html>