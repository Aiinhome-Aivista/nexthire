<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobnest | Job Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .search-results-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .results-count {
            font-size: 18px;
            color: #6c757d;
        }

        .filter-dropdown .btn {
            background-color: white;
            border: 1px solid #ced4da;
            color: #495057;
        }

        .jobs-layout {
            display: flex;
            gap: 20px;
        }

        .jobs-list {
            flex: 0 0 40%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .job-detail {
            flex: 1;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .job-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .job-card:hover,
        .job-card.active {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
            border-left: 4px solid #FFF44F;
        }

        .job-card.active {
            background-color: #f8f9fa;
        }

        .job-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #212529;
        }

        .company-name {
            font-size: 16px;
            color: #495057;
            margin-bottom: 8px;
        }

        .job-info {
            display: flex;
            gap: 15px;
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .job-salary {
            font-weight: 600;
            color: #db9610;
        }

        .job-tags {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .tag {
            background: #e9ecef;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 12px;
            color: #495057;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .detail-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .detail-company {
            font-size: 18px;
            color: #495057;
            margin-bottom: 15px;
        }

        .apply-btn {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 560;
            transition: background 0.2s;
        }

        .apply-btn:hover {
            background-color: #1d4ed8;
        }

        .detail-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item i {
            color: #6c757d;
            width: 20px;
        }

        .detail-section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #212529;
        }

        .job-description {
            line-height: 1.6;
            color: #495057;
        }

        .requirements-list {
            padding-left: 20px;
        }

        .requirements-list li {
            margin-bottom: 8px;
            color: #495057;
        }

        .back-to-search {
            display: inline-flex;
            align-items: center;
            color: #db9610;
            text-decoration: none;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .back-to-search i {
            margin-right: 8px;
        }

        /* New search bar styles */
        .search-bar-top {
            background: #fff;
            border-radius: 999px;
            padding: 13px 25px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.08);
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            border: none;
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
            font-family: 'Nunito', Arial, sans-serif;
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
            background-color: #2563eb;
            border: none;
            padding: 10px 30px;
            border-radius: 999px;
            font-size: 1rem;
            font-family: 'Nunito', Arial, sans-serif;
            font-weight: 560;
            color: #fff;
            margin-left: 15px;
            box-shadow: none;
            transition: background 0.2s;
        }

        .search-bar-top .btn-primary:hover {
            background-color: #174bbd;
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
            .jobs-layout {
                flex-direction: column;
            }

            .jobs-list {
                max-height: none;
                flex: 1;
            }

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

        .no-results {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="search-results-container">
        <!-- Back button -->
        <a href="<?php echo base_url('profile'); ?>" class="back-to-search">
            <i class="fas fa-arrow-left"></i> Back to profile
        </a>

        <!-- New search bar at the top -->
        <div class="search-bar-top">
            <div class="search-input-field-top">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" id="job-search-input" class="form-control" placeholder="software developer"
                        value="<?= isset($_GET['job']) ? htmlspecialchars($_GET['job']) : '' ?>">
                </div>
            </div>
            <div class="search-input-divider-top"></div>
            <div class="search-input-field-top" style="margin-right: 0;">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" id="location-search-input" class="form-control"
                        placeholder="City, state, zip code, or &quot;remote&quot;"
                        value="<?= isset($_GET['location']) ? htmlspecialchars($_GET['location']) : '' ?>">
                </div>
            </div>
            <button id="search-button" class="btn btn-primary"
                style="background-color: #FFF44F; color: black;">Search</button>
        </div>

        <div class="jobs-layout">
            <div class="jobs-list">
                <?php
                // Fetch jobs from DB (CodeIgniter style)
                $jobs = $this->db->get('posted_jobs')->result_array();
                ?>
                <?php foreach ($jobs as $index => $job): ?>
                    <div class="job-card <?= $index === 0 ? 'active' : '' ?>" data-job-id="<?= $job['id'] ?>">
                        <div class="job-title"><?= htmlspecialchars($job['title']) ?></div>
                        <div class="company-name"><?= htmlspecialchars($job['company']) ?></div>
                        <div class="job-info">
                            <span class="job-location"><i class="fas fa-map-marker-alt"></i>
                                <?= htmlspecialchars($job['location']) ?></span>
                            <span class="job-experience"><i class="fas fa-briefcase"></i>
                                <?= htmlspecialchars($job['experience']) ?></span>
                        </div>
                        <div class="job-salary"><?= htmlspecialchars($job['salary']) ?></div>
                        <div class="job-tags">
                            <span class="tag"><?= htmlspecialchars($job['job_type']) ?></span>
                            <span class="tag">Posted</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="job-detail" id="job-detail-panel">
                <!-- Job details will be dynamically loaded here -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Pass PHP jobs to JS
        const jobData = <?= json_encode($jobs, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

        // Function to show job details
        function showJobDetails(jobId) {
            const job = jobData.find(j => j.id == jobId);
            if (!job) return;

            const requirements = job.requirements ? job.requirements.split('\n') : [];
            const benefits = job.benefits ? job.benefits.split('\n') : [];

            const detailPanel = document.getElementById('job-detail-panel');
            detailPanel.innerHTML = `
                <div class="detail-header">
                    <div>
                        <h2 class="detail-title">${job.title}</h2>
                        <div class="detail-company">${job.company}</div>
                    </div>
                    <button class="apply-btn" style="background-color: #FFF44F; color: black;">Apply Now</button>
                </div>

                <div class="detail-info">
                    <div class="info-item"><i class="fas fa-map-marker-alt"></i><span>${job.location}</span></div>
                    <div class="info-item"><i class="fas fa-briefcase"></i><span>${job.experience}</span></div>
                    <div class="info-item"><i class="fas fa-money-bill-wave"></i><span>${job.salary}</span></div>
                    <div class="info-item"><i class="fas fa-clock"></i><span>${job.job_type}</span></div>
                    <div class="info-item"><i class="fas fa-building"></i><span>${job.industry}</span></div>
                    <div class="info-item"><i class="fas fa-users"></i><span>${job.employees}</span></div>
                </div>

                <div class="detail-section">
                    <h3 class="section-title">Job Description</h3>
                    <div class="job-description">${job.description}</div>
                </div>

                <div class="detail-section">
                    <h3 class="section-title">Requirements</h3>
                    <ul class="requirements-list">
                        ${requirements.map(req => `<li>${req}</li>`).join('')}
                    </ul>
                </div>

                <div class="detail-section">
                    <h3 class="section-title">Benefits</h3>
                    <ul class="requirements-list">
                        ${benefits.map(b => `<li>${b}</li>`).join('')}
                    </ul>
                </div>

                <button class="apply-btn" style="background-color: #FFF44F; color: black; width: 100%;">Apply for this job</button>
            `;
        }

        // Function to filter jobs on client side
        function filterJobs() {
            const searchTerm = document.getElementById('job-search-input').value.toLowerCase();
            const locationTerm = document.getElementById('location-search-input').value.toLowerCase();
            const jobCards = document.querySelectorAll('.job-card');
            let visibleCount = 0;
            let firstVisibleCard = null;

            jobCards.forEach(card => {
                const title = card.querySelector('.job-title').textContent.toLowerCase();
                const company = card.querySelector('.company-name').textContent.toLowerCase();
                const location = card.querySelector('.job-location').textContent.toLowerCase();
                const tags = Array.from(card.querySelectorAll('.tag')).map(tag => tag.textContent.toLowerCase());

                const matchesSearch = title.includes(searchTerm) || company.includes(searchTerm) ||
                    tags.some(tag => tag.includes(searchTerm));
                const matchesLocation = location.includes(locationTerm) || locationTerm === '';

                if (matchesSearch && matchesLocation) {
                    card.style.display = 'block';
                    visibleCount++;
                    if (!firstVisibleCard) firstVisibleCard = card;
                } else {
                    card.style.display = 'none';
                }
            });

            if (firstVisibleCard) {
                document.querySelectorAll('.job-card').forEach(c => c.classList.remove('active'));
                firstVisibleCard.classList.add('active');
                showJobDetails(firstVisibleCard.getAttribute('data-job-id'));
            } else {
                document.getElementById('job-detail-panel').innerHTML = `
                    <div class="no-results">
                        <h3>No jobs found</h3>
                        <p>Try adjusting your search criteria</p>
                    </div>
                `;
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function () {
            if (jobData.length > 0) {
                showJobDetails(jobData[0].id);
            }

            const jobCards = document.querySelectorAll('.job-card');
            jobCards.forEach(card => {
                card.addEventListener('click', function () {
                    jobCards.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    showJobDetails(this.getAttribute('data-job-id'));
                });
            });

            document.getElementById('search-button').addEventListener('click', filterJobs);

            document.getElementById('job-search-input').addEventListener('keyup', function (event) {
                if (event.key === 'Enter') filterJobs();
            });

            document.getElementById('location-search-input').addEventListener('keyup', function (event) {
                if (event.key === 'Enter') filterJobs();
            });
        });
    </script>
</body>

</html>