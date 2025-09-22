<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Sitemap Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', Arial, sans-serif;
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
            --sidebar-collapsed-width: 70px;
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

        .sidebar-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            transition: opacity 0.3s;
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

        /* --- Student Management Table CSS --- */
        .container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding-top: 40px;
            padding-left: 30px;
        }

        .container h2 {
            margin-left: 5px;
            /* Push it a bit right */
            position: relative;
            z-index: 1;
            /* Keep it above toggle bar */
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .active {
            background: #28a745;
            color: white;
        }

        .inactive {
            background: #ffc107;
            color: black;
        }

        /* Search and Pagination Styles */


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
                padding: 15px;
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
        }

        @media screen and (max-width: 480px) {


            h2 {
                font-size: 1.5rem;
            }


        }
    </style>
</head>

<body>
    <button class="mobile-toggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <img src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJOB"
                    style="height:50px; width:135px;">
            </div>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li><a href="<?= base_url('admin/candidate_management') ?>"><i class="fas fa-user-graduate"></i>
                        <span>Candidates</span></a></li>
                <li><a href="<?= base_url('admin/employer_management') ?>"><i class="fas fa-users"></i>
                        <span>Employers</span></a></li>
                <li><a href="<?= base_url('admin/job_post_management') ?>"><i class="fas fa-file-alt"></i> <span>Job
                            Posts</span></a></li>
                <li><a href="<?= base_url('admin/featured_companies') ?>"><i class="fas fa-building"></i>
                        <span>Featured Companies</span></a></li>
                <li><a href="<?= base_url('admin/sitemap_settings') ?>" class="active"><i class="fas fa-sitemap"></i>
                        <span>Sitemap Settings</span></a></li>
                <li>
                    <a href="#" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="container">
            <h2>Sitemap Settings</h2>
        </div>

        <!-- Footer added here -->
        <footer style="text-align:center; padding-top: 130px;">
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>
    </div>
</body>
<script>
    // Sidebar toggle functionality (fixed)
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

    // Desktop sidebar toggle (guarded)
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function (e) {
            // toggle collapsed state
            sidebar.classList.toggle('collapsed');

            // toggle chevron icon safely
            const icon = sidebarToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-chevron-left');
                icon.classList.toggle('fa-chevron-right');
            }

            // adjust main content margin so layout stays consistent
            // This is defensive — CSS should handle it, but ensures immediate visual update.
            const collapsedWidth = cssVar('--sidebar-collapsed-width', '70px').trim();
            const fullWidth = cssVar('--sidebar-width', '250px').trim();
            if (sidebar.classList.contains('collapsed')) {
                if (mainContent) mainContent.style.marginLeft = collapsedWidth;
            } else {
                if (mainContent) mainContent.style.marginLeft = fullWidth;
            }
        });
    }

    // Mobile sidebar toggle (guarded + stopPropagation to avoid immediate close)
    if (mobileToggle && sidebar) {
        mobileToggle.addEventListener('click', function (e) {
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
        sidebar.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    }

    // Close sidebar when clicking outside on mobile (guarded)
    document.addEventListener('click', function (event) {
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
    window.addEventListener('resize', function () {
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
    logoutBtn.addEventListener('click', function () {
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = '<?= base_url("admin/sitemap_settings/logout"); ?>';
        }
    });
</script>

</html>