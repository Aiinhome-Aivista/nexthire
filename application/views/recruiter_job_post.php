<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Employer Post Job</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8fafc;
            color: #333;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 300px;
            background: #c9c9c9;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            min-height: 100vh;
        }

        .sidebar img {
            margin-bottom: 30px;
        }

        .sidebar a {
            color: #000000;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 8px;
            display: block;
            margin-bottom: 8px;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #fca311;
            color: #fff;
        }

        /* Main content */
        .main-content {
            flex: 1;
            margin-left: 60px;
            padding: 20px 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h2 {
            font-size: 24px;
            color: #1e1e2c;
        }

        /* Container (form card) */
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            display: inline-block;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.3s ease;
            background-color: #fff;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #fca311;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .row {
            display: flex;
            gap: 30px;
        }

        .row .form-group {
            flex: 1;
        }

        button {
            background: #fca311;
            color: #fff;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: #e38b05;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="JobNest Logo">
        <a href="<?= base_url('employer_dashboard'); ?>"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>" class="active"><i class="fas fa-file-alt"></i> Post Job</a>
        <a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase"></i> Manage Jobs</a>
        <a href="#"><i class="fas fa-user-graduate"></i> Candidates</a>
        <a href="#"><i class="fas fa-building"></i> Employer Profile</a>
        <a href="#" id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-header">
            <h4 class="fw-bold" style="color: #fca911;">Post a Job</h4>
        </div>

        <div class="container">
            <form action="<?= base_url('recruiter_job_post/store'); ?>" method="post">
                <div class="row">
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" id="title" name="title" placeholder="e.g., Software Engineer" required>
                    </div>
                    <div class="form-group">
                        <label for="industry">Industry</label>
                        <input type="text" id="industry" name="industry" placeholder="e.g., IT Service" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" id="company" name="company" placeholder="Company name" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="City, Country" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="employees">Employees</label>
                        <input type="text" id="employees" name="employees" placeholder="201-500" required>
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <input type="text" id="experience" name="experience" placeholder="4-6 years" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="job_type">Job Type</label>
                        <select id="job_type" name="job_type">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Internship">Internship</option>
                            <option value="Contract">Contract</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary Range</label>
                        <input type="text" id="salary" name="salary" placeholder="Rs.50,000 - Rs.70,000">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Job Description</label>
                    <textarea id="description" name="description" placeholder="Enter Job Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <textarea id="requirements" name="requirements" placeholder="Enter Job Requirements"></textarea>
                </div>

                <div class="form-group">
                    <label for="benefits">Benefits</label>
                    <textarea id="benefits" name="benefits" placeholder="Enter benefits provided"></textarea>
                </div>

                <div class="form-group">
                    <label for="last_date">Last Date to apply</label>
                    <input type="date" id="last_date" name="last_date" required>
                </div>

                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="email" id="email" name="email" placeholder="hr@company.com" required>
                </div>

                <button type="submit">Post Job</button>
            </form>
        </div>

        <footer>
            &copy; 2025 Jobnest Inc. All Rights Reserved.
        </footer>
    </div>


    <script>
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Recruiter_job_post/logout"); ?>';
            }
        });
    </script>
</body>

</html>