<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Employer Post Job</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #fca911d4;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --dark: #1e1e2c;
            --light: #f8f9fa;
            --gray: #6c757d;
            --danger: #e63946;
            --warning: #fca311;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            background: #c9c9c9;
            color: black;
            height: 100vh;
            position: fixed;
            transition: all 0.3s ease;
            z-index: 1000;
            left: 0;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar.collapsed .sidebar-header h2,
        .sidebar.collapsed .sidebar-menu span {
            display: none;
        }

        .sidebar.collapsed .sidebar-menu a {
            justify-content: center;
            padding: 15px 0;
        }

        .sidebar.collapsed .sidebar-menu i {
            margin-right: 0;
            font-size: 1.4rem;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: space-between;
            position: relative;
        }

        .sidebar-toggle {
            display: none;
            position: absolute;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu ul {
            list-style: none;
            padding-left: 0;
            /* override Bootstrap reboot */
            margin: 0;
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
        }

        .sidebar.collapsed~.main-content {
            margin-left: var(--sidebar-collapsed-width);
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

        button[type="submit"] {
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

        button[type="submit"]:hover {
            background: #e38b05;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
            margin-top: 40px;
        }

        /* Mobile menu toggle */
        .mobile-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            background: var(--primary);
            border: none;
            border-radius: 4px;
            width: 40px;
            height: 40px;
            z-index: 1100;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Responsive styles */
        @media screen and (max-width: 1024px) {
            .sidebar {
                width: var(--sidebar-collapsed-width);
            }

            .sidebar .sidebar-header h2,
            .sidebar .sidebar-menu span {
                display: none;
            }

            .sidebar .sidebar-menu a {
                justify-content: center;
                padding: 15px 0;
            }

            .sidebar .sidebar-menu i {
                margin-right: 0;
                font-size: 1.4rem;
            }

            .main-content {
                margin-left: var(--sidebar-collapsed-width);
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar.collapsed {
                width: 0;
            }

            .sidebar.collapsed~.main-content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 768px) {
            .main-content {
                padding: 15px;
            }

            .container {
                padding: 10px;
            }

            .row {
                flex-direction: column;
                gap: 15px;
            }

            /* Form responsive styles */
            .form-group {
                width: 100%;
            }

            .mobile-toggle {
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

            .sidebar.show .sidebar-menu a {
                justify-content: flex-start;
                padding: 15px 20px;
            }

            .sidebar.show .sidebar-menu i {
                margin-right: 10px;
            }

            .main-content {
                margin-left: 0 !important;
            }

            .sidebar.collapsed {
                width: 0;
            }

            .page-header {
                padding-left: 60px;
                /* enough space for toggle button */
            }
        }

        @media screen and (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .page-header h2 {
                font-size: 1.5rem;
            }

            input[type="text"],
            input[type="email"],
            input[type="number"],
            select,
            textarea,
            input[type="date"] {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <button class="mobile-toggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <img src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJOB" style="height:50px; width:135px;">
            </div>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="<?= base_url('employer_dashboard'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="<?= base_url('employer_job_post'); ?>" class="active"><i class="fas fa-file-alt"></i> <span>Post Job</span></a></li>
                <li><a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase"></i> <span>Manage Jobs</span></a></li>
                <li><a href="#"><i class="fas fa-user-graduate"></i> <span>Candidates</span></a></li>
                <li><a href="#"><i class="fas fa-building"></i> <span>Employer Profile</span></a></li>
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
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>
    </div>

    <script>
        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.querySelector('.sidebar-toggle');
        const mobileToggle = document.querySelector('.mobile-toggle');
        const mainContent = document.querySelector('.main-content');

        // Helper to read CSS variable values
        function cssVar(name, fallback = '') {
            try {
                return getComputedStyle(document.documentElement).getPropertyValue(name) || fallback;
            } catch (e) {
                return fallback;
            }
        }

        // Desktop sidebar toggle
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function(e) {
                // toggle collapsed state
                sidebar.classList.toggle('collapsed');

                // toggle chevron icon safely
                const icon = sidebarToggle.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-chevron-left');
                    icon.classList.toggle('fa-chevron-right');
                }

                // adjust main content margin so layout stays consistent
                const collapsedWidth = cssVar('--sidebar-collapsed-width', '70px').trim();
                const fullWidth = cssVar('--sidebar-width', '250px').trim();
                if (sidebar.classList.contains('collapsed')) {
                    if (mainContent) mainContent.style.marginLeft = collapsedWidth;
                } else {
                    if (mainContent) mainContent.style.marginLeft = fullWidth;
                }
            });
        }

        // Mobile sidebar toggle
        if (mobileToggle && sidebar) {
            mobileToggle.addEventListener('click', function(e) {
                // prevent the document click handler from immediately closing the sidebar
                e.stopPropagation();

                sidebar.classList.toggle('show');

                // Prevent body scrolling when sidebar is open on mobile
                if (sidebar.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';
                    // ensure it's fully visible on mobile
                    sidebar.style.transform = 'translateX(0)';
                } else {
                    document.body.style.overflow = 'auto';
                    // hide it off-canvas
                    sidebar.style.transform = 'translateX(-100%)';
                }
            });

            // If sidebar receives clicks, do not let them bubble up to document click
            sidebar.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (!sidebar) return;
            // only for mobile/smaller screens
            if (window.innerWidth <= 768 &&
                !sidebar.contains(event.target) &&
                (!mobileToggle || !mobileToggle.contains(event.target)) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                document.body.style.overflow = 'auto';
                // hide off-canvas for good measure
                sidebar.style.transform = 'translateX(-100%)';
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (!sidebar) return;

            if (window.innerWidth > 768) {
                // Reset styles for desktop view
                sidebar.classList.remove('show');
                document.body.style.overflow = 'auto';
                sidebar.style.transform = 'translateX(0)';

                // Ensure collapsed class keeps width consistent
                if (!sidebar.classList.contains('collapsed')) {
                    sidebar.style.width = cssVar('--sidebar-width', '250px').trim();
                } else {
                    sidebar.style.width = cssVar('--sidebar-collapsed-width', '70px').trim();
                }

                // adjust main content margin
                if (mainContent) {
                    mainContent.style.marginLeft = sidebar.classList.contains('collapsed') ?
                        cssVar('--sidebar-collapsed-width', '70px').trim() :
                        cssVar('--sidebar-width', '250px').trim();
                }
            } else {
                // Mobile view - hide sidebar by default (unless explicitly shown)
                if (!sidebar.classList.contains('show')) {
                    sidebar.style.transform = 'translateX(-100%)';
                }
                // Remove collapsed on mobile (avoid layout issues)
                sidebar.classList.remove('collapsed');
                if (mainContent) mainContent.style.marginLeft = '0';
            }
        });

        // Initialize sidebar state based on screen size
        function initSidebar() {
            if (!sidebar) return;

            if (window.innerWidth <= 768) {
                sidebar.style.transform = 'translateX(-100%)';
                sidebar.classList.remove('collapsed');
                if (mainContent) mainContent.style.marginLeft = '0';
            } else {
                sidebar.style.transform = 'translateX(0)';
                // set main-content margin according to collapsed state
                if (mainContent) {
                    mainContent.style.marginLeft = sidebar.classList.contains('collapsed') ?
                        cssVar('--sidebar-collapsed-width', '70px').trim() :
                        cssVar('--sidebar-width', '250px').trim();
                }
            }
        }

        // Call initialization function
        initSidebar();

        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Recruiter_job_post/logout"); ?>';
            }
        });
    </script>
</body>

</html>