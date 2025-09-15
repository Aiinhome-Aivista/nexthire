<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #efda56ff;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --dark: #1e1e2c;
            --light: #f8f9fa;
            --gray: #6c757d;
            --danger: #e63946;
            --warning: #fca311;
            --sidebar-width: 250px;
            --header-height: 60px;
        }

        body {
            background-color: #f5f7fb;
            color: #333;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: #48434394;
            color: black;
            height: 100vh;
            position: fixed;
            transition: all 0.3s ease;
            z-index: 1000;
            left: 0;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: space-between;
            position: relative;
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close-sidebar {
            display: none;
            background: none;
            border: none;
            color: #000;
            font-size: 1.5rem;
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 15px;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            color: #000000;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-menu a.active {
            background: var(--primary);
            border-left: 4px solid var(--warning);
        }

        .sidebar-menu i {
            margin-right: 10px;
            font-size: 1.2rem;
            min-width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: margin-left 0.3s ease;
            width: calc(100% - var(--sidebar-width));
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 15px 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            position: relative;
            flex-wrap: wrap;
        }

        .header-title {
            flex: 1;
            min-width: 250px;
        }

        .title-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 5px;
            flex-wrap: wrap;
        }

        .header-title h1 {
            font-size: 1.8rem;
            color: var(--dark);
            margin: 0;
        }

        .welcome-text {
            color: var(--gray);
            font-size: 0.9rem;
            margin-left: 45px; /* Align with the title text */
            margin-top: -5px;
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

        /* Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-info h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .stat-info p {
            color: var(--gray);
            font-size: 0.85rem;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .candidates .stat-icon {
            background: rgb(67 97 238 / 9%);
            color: var(--primary);
        }

        .recruiters .stat-icon {
            background: rgba(76, 201, 240, 0.2);
            color: var(--success);
        }

        .jobs .stat-icon {
            background: rgba(252, 163, 17, 0.2);
            color: var(--warning);
        }

        .applications .stat-icon {
            background: rgba(230, 57, 70, 0.2);
            color: var(--danger);
        }

        /* Model Cards - Recent Job Posts */
        .model-cards {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .model-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .model-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            flex-wrap: wrap;
        }

        .model-card-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }

        .model-card-body {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            min-width: 600px;
        }

        .table thead {
            background: var(--light);
        }

        .table th,
        .table td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .table th {
            font-weight: 600;
            color: var(--dark);
        }

        .table tbody tr:hover {
            background: rgba(0, 0, 0, 0.03);
        }

        /* Status Badges */
        .status-active {
            background: rgba(76, 201, 240, 0.2);
            color: var(--success);
        }

        .status-pending {
            background: rgba(252, 163, 17, 0.2);
            color: var(--warning);
        }

        .status-closed {
            background: rgba(230, 57, 70, 0.2);
            color: var(--danger);
        }

        /* Toggle Button */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }
            
            .sidebar.show {
                transform: translateX(0);
                box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
            }
            
            .close-sidebar {
                display: block;
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .header-title h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-stats {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .user-info {
                align-self: flex-end;
            }
            
            .header-title, .user-info {
                width: 100%;
            }
            
            .title-container {
                justify-content: space-between;
            }
            
            .welcome-text {
                margin-left: 0;
                margin-top: 5px;
            }
            
            .stat-card {
                padding: 12px;
            }
            
            .stat-info h3 {
                font-size: 1.4rem;
            }
            
            /* Mobile table styles - NEW CODE */
            .model-card-body {
                overflow-x: visible;
            }
            
            .table {
                min-width: 100%;
                display: block;
                font-size: 0.8rem;
            }
            
            .table thead {
                display: none;
            }
            
            .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            
            .table tr {
                margin-bottom: 15px;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                padding: 10px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            }
            
            .table td {
                padding: 8px 10px;
                text-align: right;
                position: relative;
                padding-left: 50%;
                border-bottom: 1px solid #f0f0f0;
            }
            
            .table td:last-child {
                border-bottom: none;
            }
            
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 15px;
                text-align: left;
                font-weight: 600;
                color: var(--dark);
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px;
            }
            
            .header {
                padding: 12px 15px;
            }
            
            .header-title h1 {
                font-size: 1.3rem;
            }
            
            .user-info {
                justify-content: space-between;
            }
            
            .stat-info h3 {
                font-size: 1.3rem;
            }
            
            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
            
            .model-card {
                padding: 12px;
            }
            
            .table {
                font-size: 0.8rem;
            }
            
            .table td {
                padding: 8px 10px;
                padding-left: 50%;
            }
            
            .welcome-text {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 400px) {
            .sidebar {
                width: 100%;
            }
            
            .header-title h1 {
                font-size: 1.2rem;
            }
            
            .stat-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .stat-icon {
                align-self: flex-end;
            }
            
            .title-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .welcome-text {
                margin-left: 0;
            }
            
            /* Additional mobile adjustments for very small screens */
            .table td {
                padding-left: 45%;
            }
            
            .table td::before {
                width: 40%;
            }
        }

        /* No data message styling */
        .model-card-body > p {
            text-align: center;
            padding: 20px;
            color: var(--gray);
            font-style: italic;
        }

        footer {
            text-align: center;
            padding: 30px 0;
            color: var(--gray);
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <img src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJOB"
                    style="height:50px; width:135px;">
            </div>
            <button class="close-sidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="<?= base_url('admin/dashboard') ?>" class="active"><i class="fas fa-home"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="<?= base_url('admin/candidate_management') ?>"><i class="fas fa-user-graduate"></i>
                        <span>Candidates</span></a></li>
                <li><a href="<?= base_url('admin/employer_management') ?>"><i class="fas fa-users"></i>
                        <span>Employers</span></a></li>
                <li><a href="<?= base_url('admin/job_post_management') ?>"><i class="fas fa-file-alt"></i> <span>Job
                            Posts</span></a></li>
                <li>
                    <a href="#" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-title">
                <div class="title-container">
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Admin Dashboard</h1>
                </div>
                <p class="welcome-text">Welcome back, Admin!</p>
            </div>
            <div class="user-info">
                <div class="notifications">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="user-name">Admin</div>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="dashboard-stats">
            <div class="stat-card candidates">
                <div class="stat-info">
                    <h3><?php echo $candidate_count; ?></h3>
                    <p>Candidates</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
            </div>

            <div class="stat-card recruiters">
                <div class="stat-info">
                    <h3><?php echo $employer_count; ?></h3>
                    <p>Employers</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="stat-card jobs">
                <div class="stat-info">
                    <h3><?php echo $job_count; ?></h3>
                    <p>Job Posts</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>

            <div class="stat-card applications">
                <div class="stat-info">
                    <h3>10</h3>
                    <p>Applications</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
            </div>
        </div>

        <!-- Model Cards -->
        <div class="model-cards">
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
                                        <td data-label="Position"><?= $job->title; ?></td>
                                        <td data-label="Experience"><?= $job->experience; ?></td>
                                        <td data-label="Company"><?= $job->company; ?></td>
                                        <td data-label="Location"><?= $job->location; ?></td>
                                        <td data-label="Job Type"><?= $job->job_type; ?></td>
                                        <td data-label="Posted On"><?= date("d M Y", strtotime($job->created_at)); ?></td>
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
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>
    </div>

    <script>
        // Toggle sidebar functionality
        const sidebar = document.querySelector('.sidebar');
        const sidebarToggle = document.querySelector('.sidebar-toggle');
        const closeSidebar = document.querySelector('.close-sidebar');
        const mainContent = document.querySelector('.main-content');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('show');
        });

        // Close sidebar when clicking outside of it
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 992 &&
                !sidebar.contains(e.target) &&
                !sidebarToggle.contains(e.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        // Only handle tab switching for links with href="#"
        document.querySelectorAll('.sidebar-menu a').forEach(item => {
            item.addEventListener('click', function (e) {
                // Only prevent default for anchor tags with href="#"
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();

                    // Remove active class from all items
                    document.querySelectorAll('.sidebar-menu a').forEach(link => {
                        link.classList.remove('active');
                    });

                    // Add active class to clicked item
                    this.classList.add('active');
                }
                
                // Close sidebar on mobile after clicking a link
                if (window.innerWidth <= 992) {
                    sidebar.classList.remove('show');
                }
            });
        });

        // Logout functionality
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Admin_Dashboard/logout"); ?>';
            }
        });

        // Adjust table responsiveness on resize
        window.addEventListener('resize', function() {
            // This ensures proper rendering on orientation changes
            document.body.classList.toggle('resizing', true);
            setTimeout(() => {
                document.body.classList.toggle('resizing', false);
            }, 100);
        });
    </script>
</body>

</html>