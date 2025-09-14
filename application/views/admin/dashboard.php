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
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: space-between;
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
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
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
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

        /* Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-info h3 {
            font-size: 1.8rem;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .stat-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
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
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .model-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
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
        }

        .table thead {
            background: var(--light);
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
            white-space: nowrap;
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
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-header h2,
            .sidebar-menu span {
                display: none;
            }

            .sidebar-menu i {
                margin-right: 0;
                font-size: 1.5rem;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 15px;
            }

            .main-content {
                margin-left: 70px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-stats {
                grid-template-columns: 1fr 1fr;
            }

            .model-cards {
                grid-template-columns: 1fr;
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar.show .sidebar-header h2,
            .sidebar.show .sidebar-menu span {
                display: block;
            }

            .sidebar.show .sidebar-menu i {
                margin-right: 10px;
            }

            .sidebar.show .sidebar-menu a {
                justify-content: flex-start;
                padding: 15px 20px;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar-header {
                justify-content: space-between;
            }

            .close-sidebar {
                display: block;
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
            }
        }

        @media (max-width: 576px) {
            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .header-title h1 {
                justify-content: center;
            }
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
                <h1>
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    Admin Dashboard
                </h1>
                <p>Welcome back, Admin! </p>
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
                    <!-- Replace the hardcoded 0 with the dynamic count -->
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

        <footer style="text-align:center; padding: 50px;">
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
            if (window.innerWidth <= 768 &&
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
            });
        });

        // Show close button only when sidebar is visible on mobile
        function checkSidebarView() {
            if (window.innerWidth <= 768) {
                document.querySelector('.close-sidebar').style.display = 'block';
            } else {
                document.querySelector('.close-sidebar').style.display = 'none';
            }
        }

        // Initial check and event listener for window resize
        checkSidebarView();
        window.addEventListener('resize', checkSidebarView);
    </script>

    <script>
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Admin_Dashboard/logout"); ?>';
            }
        });
    </script>
</body>

</html>