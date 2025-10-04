<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Add New Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!-- Include Select2 CSS for better dropdown styling -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
            padding: 10px 0;
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
            padding: 14px 20px;
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

        /* New Submenu Styles */
        .sidebar-menu .submenu {
            padding-left: 40px;
            /* Indent sub-options */
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .sidebar-menu .submenu.show {
            max-height: 200px;
            /* Arbitrary large number to allow content to show */
        }

        .sidebar-menu .submenu a {
            padding: 10px 20px;
            /* Smaller padding for sub-items */
            font-size: 0.95rem;
            position: relative;
        }

        .sidebar-menu .submenu a::before {
            /* content: ''; */
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 5px;
            background-color: var(--warning);
            border-radius: 50%;
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
            margin-left: 2px;
            /* Align with the title text */
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
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .user-info {
                align-self: flex-end;
            }

            .header-title,
            .user-info {
                width: 100%;
            }

            .title-container {
                justify-content: space-between;
            }

            .welcome-text {
                margin-left: 0;
                margin-top: 5px;
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

            .title-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .welcome-text {
                margin-left: 0;
            }
        }

        footer {
            text-align: center;
            padding: 30px 0;
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Form Styles */
        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(239, 218, 86, 0.2);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }

        .btn-submit {
            background-color: var(--primary);
            color: black;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #e0c841;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .text-danger {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        /* Select2 Custom Styling */
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ccc;
            border-radius: 4px;
            min-height: 38px;
            padding: 5px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: var(--primary);
            outline: 0;
            box-shadow: 0 0 0 2px rgba(239, 218, 86, 0.2);
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: var(--primary);
            border: 1px solid #e0c841;
            border-radius: 4px;
            color: #333;
            font-size: 0.9rem;
            margin-right: 5px;
            margin-top: 5px;
            padding: 2px 8px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #666;
            margin-right: 4px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #333;
        }

        .sidebar-menu .submenu .submenu {
            padding-left: 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .sidebar-menu .submenu .submenu.show {
            max-height: 150px;
        }

        .sidebar-menu .submenu .submenu a {
            padding: 8px 20px;
            font-size: 0.9rem;
            position: relative;
        }

        .sidebar-menu .submenu .submenu a::before {
            /* content: '›'; */
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: var(--warning);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <!-- <div style="display: flex; align-items: center; gap: 10px;">
                <img src="<?php //base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJOB"
                    style="height:50px; width:135px;">
            </div> -->
            <div style="display: flex; align-items: center; gap: 10px;">
                <img src="<?= base_url('../All_Uploads/images/sahajjobs1.png'); ?>" alt="SahajJOB"
                    style="height:50px; width:135px;">
            </div>
            <button class="close-sidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="<?= base_url('admin/candidate_management') ?>"><i class="fas fa-user-graduate"></i>
                        <span>Candidates</span></a></li>
                <li><a href="<?= base_url('admin/employer_management') ?>"><i class="fas fa-users"></i>
                        <span>Employers</span></a></li>
                <li><a href="<?= base_url('admin/job_post_management') ?>"><i class="fas fa-file-alt"></i> <span>Job
                            Posts</span></a></li>
                <li><a href="<?= base_url('admin/featured_companies') ?>"><i class="fas fa-building"></i>
                        <span>Featured Companies</span></a></li>
                <li>
                    <a href="#" class="has-submenu" id="posts-menu-toggle">
                        <i class="fas fa-newspaper"></i>
                        <span>Posts</span>
                        <i class="fas fa-caret-down" style="margin-left: auto;"></i>
                    </a>
                    <ul class="submenu show" id="posts-submenu">
                        <li>
                            <a href="<?= base_url('admin/posts_manage'); ?>" class="active">Blog</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/posts_categories'); ?>">Categories</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin/comments'); ?>"><i class="fas fa-message"></i>
                        Comments</a>
                </li>
                <li>
                    <a href="#" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <div class="title-container">
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Create New Blog</h1>
                </div>
            </div>
        </div>

        <div class="form-container">
            <?php if ($this->session->flashdata('success_message')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success_message'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error_message')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error_message'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/posts/add') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= set_value('title'); ?>">
                    <?= form_error('title', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control"
                        rows="10"><?= set_value('content'); ?></textarea>
                    <?= form_error('content', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="">Select a Category</option>
                        <?php foreach ($categories as $id => $name): ?>
                            <option value="<?= $id ?>" <?= set_select('category_id', $id) ?>>
                                <?= htmlspecialchars($name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('category_id', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" id="featured_image" name="featured_image" class="form-control" accept="image/*">
                    <small style="color: var(--gray); font-size: 0.85rem;">Recommended size: 1200x630 pixels. Max file
                        size: 2MB</small>
                    <?= form_error('featured_image', '<div class="text-danger">', '</div>'); ?>
                </div>

                <button type="submit" class="btn-submit">Add Blog</button>
            </form>

        </div>

        <footer>
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>
    </div>

    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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

        const postsMenuToggle = document.getElementById('posts-menu-toggle');
        const postsSubmenu = postsMenuToggle.nextElementSibling;


        // Toggle submenu visibility for 'Posts'
        postsMenuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            if (postsSubmenu) {
                postsSubmenu.classList.toggle('show');
            }
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

        // Highlight parent menu items based on the active child on page load
        const activeLink = document.querySelector('.sidebar-menu a.active');
        if (activeLink) {
            let parentSubmenu = activeLink.closest('.submenu');
            while (parentSubmenu) {
                const parentLink = parentSubmenu.previousElementSibling;
                if (parentLink && parentLink.classList.contains('has-submenu')) {
                    parentLink.classList.add('active-parent');
                    parentSubmenu.classList.add('show');
                }
                parentSubmenu = parentLink.closest('.submenu');
            }
        }

        // Only handle tab switching for links with valid href
        document.querySelectorAll('.sidebar-menu a').forEach(item => {
            item.addEventListener('click', function (e) {
                // Check if the clicked link has a valid URL
                if (this.getAttribute('href') !== '#' && this.getAttribute('href') !== '') {
                    // Find the parent submenus and collapse them
                    let parentSubmenu = this.closest('.submenu.show');
                    while (parentSubmenu) {
                        parentSubmenu.classList.remove('show');
                        parentSubmenu = parentSubmenu.parentElement.closest('.submenu.show');
                    }

                    if (window.innerWidth <= 992) {
                        sidebar.classList.remove('show');
                    }
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
        window.addEventListener('resize', function () {
            // This ensures proper rendering on orientation changes
            document.body.classList.toggle('resizing', true);
            setTimeout(() => {
                document.body.classList.toggle('resizing', false);
            }, 100);
        });

        // Function to update categories dropdown
        function updateCategoriesDropdown() {
            fetch('<?= base_url("admin/posts_categories/get_categories_json") ?>')
                .then(response => response.json())
                .then(categories => {
                    const categorySelect = document.getElementById('category_id');
                    const currentValue = categorySelect.value;

                    // Clear existing options except the first one
                    while (categorySelect.options.length > 1) {
                        categorySelect.remove(1);
                    }

                    // Add new categories
                    categories.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        categorySelect.appendChild(option);
                    });

                    // Restore selected value if it still exists
                    if (currentValue) {
                        categorySelect.value = currentValue;
                    }
                })
                .catch(error => console.error('Error fetching categories:', error));
        }

        // Update dropdown when page loads
        document.addEventListener('DOMContentLoaded', function () {
            updateCategoriesDropdown();
            setInterval(updateCategoriesDropdown, 30000);
        });
        document.querySelector('form').addEventListener('submit', function (e) { });

    </script>
</body>

</html>