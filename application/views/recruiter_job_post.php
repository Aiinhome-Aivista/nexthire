<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobnest | Post Job</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: #2a5298;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 26px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #2a5298;
            border-left: 5px solid #2a5298;
            padding-left: 10px;
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
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2a5298;
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
            gap: 40px;
        }

        .row .form-group {
            flex: 1;
        }

        button {
            background: #2a5298;
            color: #fff;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #1e3c72;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
            margin-top: 40px;
        }

        .header {
            width: 100%;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            /* padding: 16px 0; */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .header-content {
            width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: left;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: right;
            gap: 100px;
        }

        .logo img {
            width: auto;
            height: 70px;
            display: block;
        }

        .logo span {
            font-size: 2rem;
            font-weight: 700;
            color: #1d4ed8;
            letter-spacing: -1px;
        }

        .page-title h3 {
            margin-left: 75px;
        }

        input[type="date"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #fff;
            color: #000;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0.5);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-content">
            <div class="logo">
                <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="JobNest">
            </div>
            <div class="page-title">
                <h3>Post a Job</h3>
            </div>
        </div>
    </div>


    <div class="container">
        <h2>Job Information</h2>
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
                    <label for="last_date">Employees</label>
                    <input type="text" id="employees" name="employees" placeholder="201-500" required>
                </div>
                <div class="form-group">
                    <label for="last_date">Experience</label>
                    <input type="text" id="experience" name="experience" placeholder="4-6 years" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="job-type">Job Type</label>
                    <select id="job-type" name="job-type">
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
</body>

</html>