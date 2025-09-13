<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobnest | Employer Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #c9c9c9;
            color: black;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 30px;
            text-align: center;
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
            background: #fca911d4;
        }

        /* Main Content */
        .main {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        h1 {
            font-size: 24px;
            color: #fca911d4;
            margin-bottom: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 10px;
        }

        .stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat-box {
            flex: 1;
            background: #f0f4ff;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-box h3 {
            margin: 0;
            font-size: 22px;
            color: #fca911d4;
        }

        .stat-box p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #f0f4ff;
            color: #fca911d4;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            color: #fff;
        }

        .active {
            background: #28a745;
        }

        .draft {
            background: #ffc107;
        }

        .expired {
            background: #dc3545;
        }

        button {
            background: #fca911d4;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #ffc107;
        }

        .model-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .model-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .model-card-header {
            padding: 4px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .model-card-header h3 {
            font-size: 1.2rem;
            color: var(--dark);
        }

        .model-card-header i {
            color: var(--gray);
            font-size: 1.2rem;
        }

        .model-card-body {
            padding: 20px;
        }

        .model-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .model-item:last-child {
            border-bottom: none;
        }

        .model-item img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
        }

        .model-info h4 {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .model-info p {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .model-status {
            margin-left: auto;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .model-cards {
                grid-template-columns: 1fr;
            }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 10px;
            position: relative;
        }

        .header-title h1 {
            font-size: 1.8rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-title p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        @media (max-width: 576px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .header-title h1 {
                justify-content: center;
            }
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/jobnest2.png'); ?>" alt="JobNest"><br>
        <a href="<?= base_url('employer_dashboard'); ?>" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>"> <i class="fas fa-file-alt"></i> Post Job</a>
        <a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase"></i> Manage Jobs</a>

        <a href="<?= base_url('employer_manage_candidates'); ?>"><i class="fas fa-user-graduate"></i> Candidates</a>
        <a href="<?= base_url('employer_profile'); ?>"><i class="fas fa-building"></i> Employer Profile</a>
        <a href="#" id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="header">
            <div class="header-title">
                <h1>
                    Employer Dashboard
                </h1>
                <p>Welcome back, Employer! </p>
            </div>
            <div class="user-info">
                <div class="notifications">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="user-name">Employer</div>
            </div>
        </div>

        <!-- Dashboard -->
        <div class="card">
            <div class="stats">
                <div class="stat-box">
                    <h3><?= $candidates_count ?></h3>
                    <p>Candidates</p>
                </div>
                <div class="stat-box">
                    <h3><?= $job_posts_count ?></h3>
                    <p>Job Posts</p>
                </div>
                <div class="stat-box">
                    <h3>2</h3>
                    <p>Active Jobs</p>
                </div>
                <div class="stat-box">
                    <h3>10</h3>
                    <p>Total Applications</p>
                </div>
            </div>
        </div>

        <!-- Model Cards -->
        <div class="model-cards">
            <!-- Job Posts Card -->
            <div class="model-card">
                <div class="model-card-header">
                    <h3>Recent Job Posts</h3>
                    <i class="fas fa-ellipsis-v"></i>
                </div>
                <div class="model-card-body">
                    <?php if (!empty($recent_jobs)): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Experience</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>Job Type</th>
                                    <th>Posted On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_jobs as $job): ?>
                                    <tr>
                                        <td><?= $job->title; ?></td>
                                        <td><?= $job->experience; ?></td>
                                        <td><?= $job->company; ?></td>
                                        <td><?= $job->location; ?></td>
                                        <td><?= $job->job_type; ?></td>
                                        <td><?= date("d M Y", strtotime($job->created_at)); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No job posts available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <footer>
            &copy; 2025 Jobnest Inc. All Rights Reserved.
        </footer>
    </div>

    <script>
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("employer_login"); ?>';
            }
        });
    </script>
</body>

</html>