<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Manage Blog Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            padding: 14px 10px;
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
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .sidebar-menu .submenu.show {
            max-height: 250px;
        }

        .sidebar-menu .submenu a {
            padding: 10px 20px;
            font-size: 0.95rem;
            position: relative;
        }

        .sidebar-menu .submenu a::before {
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

        /* Table Container Styles - Matching job_post_management.php */
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
            position: relative;
            z-index: 1;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
        }

        th {
            background: #fff567;
            color: #48494a;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        /* Action buttons */
        .btn-table {
            border: none;
            padding: 6px 10px;
            font-size: 0.85rem;
            cursor: pointer;
            background: none;
        }

        .btn-table i {
            font-size: 0.9rem;
        }

        .btn-view {
            color: #1e1e2c;
        }

        .btn-edit {
            color: #d97706;
        }

        .btn-delete {
            color: #b91c1c;
        }

        /* Search and Pagination Styles */
        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination button {
            padding: 8px 12px;
            background-color: var(--primary);
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .pagination button:hover:not(:disabled) {
            background-color: #e6cf4d;
        }

        .pagination button:disabled {
            background-color: #f5f7fb;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .pagination span {
            padding: 8px 12px;
            font-size: 14px;
        }

        .page-info {
            margin-left: 15px;
            color: #6c757d;
        }

        /* Table responsive fixes */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table-no-posts td {
            text-align: center;
            font-style: italic;
            color: #888;
        }

        /* Image thumbnail */
        .thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .no-image {
            width: 50px;
            height: 50px;
            background: #f0f0f0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-size: 12px;
        }

        /* Content preview */
        .content-preview {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        /* Modal Styles - FIXED: Remove scrollbar */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 600px;
            max-width: 90vh;
            /* Removed max-height and overflow to eliminate scrollbar */
            transform: translateY(-50px);
            transition: transform 0.4s ease;
        }

        .modal.show .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            padding: 15px 25px 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .modal-header h3 {
            font-size: 1.4rem;
            color: #333;
            font-weight: 600;
            margin: 0;
        }

        .modal-body {
            padding: 1rem;
            /* Removed overflow-y to eliminate scrollbar */
            flex: 1;
            overflow-y: auto;
            max-height: calc(90vh - 130px);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(239, 218, 86, 0.2);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .modal-footer {
            padding: 15px 25px 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-shrink: 0;
        }

        .modal-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .modal-btn-primary {
            background-color: var(--primary);
            color: #333;
        }

        .modal-btn-primary:hover {
            background-color: #e6cf4d;
        }

        .modal-btn-secondary {
            background-color: #f0f0f0;
            color: #555;
        }

        .modal-btn-secondary:hover {
            background-color: #e2e2e2;
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
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: var(--warning);
        }

        /* Select2 Custom Styling for Modal */
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ddd;
            border-radius: 6px;
            min-height: 42px;
            padding: 5px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: var(--primary);
            outline: 0;
            box-shadow: 0 0 0 3px rgba(239, 218, 86, 0.2);
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

        ol,
        ul {
            padding-left: 1rem !important;
        }

        /* Image preview styling */
        #current_image_container {
            margin-top: 10px;
            text-align: center;
        }

        #current_image {
            max-width: 200px;
            max-height: 150px;
            border-radius: 4px;
            border: 1px solid #ddd;
            display: none;
        }

        #current_image_name {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 5px;
            word-break: break-all;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
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
        <!-- Separate Header Div like job_post_management.php -->
        <div class="header">
            <div class="header-title">
                <div class="title-container d-flex justify-content-between align-items-center mb-4">
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Manage Blogs</h1>
                    <a href="<?= base_url('admin/posts_add'); ?>" class="btn text-dark"
                        style="background-color: #f1e42cff;">
                        <i class="fas fa-plus me-1"></i> Create Blog
                    </a>
                </div>
            </div>
        </div>

        <!-- Separate Container Div like job_post_management.php -->
        <div class="container">
            <!-- Search Box -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search blog posts...">
                </div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content Preview</th>
                            <th>Category</th>
                            <th>Featured Image</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="postTableBody">
                        <?php if (!empty($posts)): ?>
                            <?php foreach ($posts as $post): ?>
                                <tr data-id="<?= $post->id ?>" data-category-id="<?= $post->category_id ?>">
                                    <td data-label="ID" class="col-id"><?= htmlspecialchars($post->id) ?></td>
                                    <td data-label="Title" class="col-title"><?= htmlspecialchars($post->title) ?></td>
                                    <td data-label="Content" class="col-content">
                                        <div class="content-preview" title="<?= htmlspecialchars($post->content) ?>">
                                            <?= htmlspecialchars(substr($post->content, 0, 50)) ?>...
                                        </div>
                                    </td>
                                    <td data-label="Category" class="col-category"><?= htmlspecialchars($post->category_name) ?>
                                    </td>
                                    <td data-label="Featured Image" class="col-image">
                                        <?php if (!empty($post->featured_image)): ?>
                                            <img src="<?= base_url($post->featured_image) ?>" alt="Featured Image"
                                                class="thumbnail">
                                        <?php else: ?>
                                            <div class="no-image">No Image</div>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="Created Date" class="col-created">
                                        <?= date('M d, Y', strtotime($post->created_at)) ?>
                                    </td>
                                    <td data-label="Action">
                                        <button class="btn btn-table btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-table btn-delete" data-id="<?= $post->id ?>" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="table-no-posts">
                                <td colspan="8">No blog posts found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="pagination" id="paginationControls">
                <button id="firstPage">First</button>
                <button id="prevPage">Previous</button>
                <span id="pageNumbers"></span>
                <button id="nextPage">Next</button>
                <button id="lastPage">Last</button>
                <span class="page-info" id="pageInfo"></span>
            </div>
        </div>

        <footer>
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>
    </div>

    <!-- Edit Modal (Same structure as job_post_management.php) -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Blog Post</h3>
            </div>

            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="edit_id">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="edit_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="edit_content" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="edit_category_id" name="category_id" class="form-control">
                            <option value="">Select a Category</option>
                            <!-- Categories will be populated dynamically -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_featured_image">Featured Image</label>
                        <input type="file" id="edit_featured_image" name="featured_image" class="form-control"
                            style="padding: 8px 12px;">
                        <div id="current_image_container">
                            <img id="current_image" src="" alt="Current Image">
                            <div id="current_image_name"></div>
                        </div>
                        <small style="color: var(--gray); font-size: 0.8rem; display: block; margin-top: 5px;">
                            Leave blank to keep current image. Allowed: jpg, jpeg, png, gif. Max: 2MB
                        </small>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="updateBtn" class="modal-btn modal-btn-primary">Update</button>
                <button type="button" id="closeModal" class="modal-btn modal-btn-secondary">Cancel</button>
            </div>
        </div>
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
        const postsMenuToggle = document.getElementById('posts-menu-toggle');
        const postsSubmenu = document.querySelector('.submenu');
        const blogMenuToggle = document.getElementById('blog-menu-toggle');
        const blogSubmenu = document.querySelector('.submenu .submenu');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('show');
        });

        // Toggle submenu visibility
        postsMenuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            postsSubmenu.classList.toggle('show');
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
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    document.querySelectorAll('.sidebar-menu a').forEach(link => {
                        link.classList.remove('active');
                    });
                    this.classList.add('active');
                }
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

        // Function to update categories dropdown
        function updateCategoriesDropdown() {
            fetch('<?= base_url("admin/posts_categories/get_categories_json") ?>')
                .then(response => response.json())
                .then(categories => {
                    const categorySelect = document.getElementById('edit_category_id');
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

        // Search and Pagination functionality (Client-side like job_post_management.php)
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('postTableBody');
            const firstPageBtn = document.getElementById('firstPage');
            const prevPageBtn = document.getElementById('prevPage');
            const nextPageBtn = document.getElementById('nextPage');
            const lastPageBtn = document.getElementById('lastPage');
            const pageNumbers = document.getElementById('pageNumbers');
            const pageInfo = document.getElementById('pageInfo');
            const paginationControls = document.getElementById('paginationControls');

            let allRows = [];
            let filteredRows = [];
            let currentPage = 1;
            const rowsPerPage = 10;

            // Initialize table
            function initializeTable() {
                const rows = Array.from(tableBody.querySelectorAll('tr:not(.table-no-posts)'));

                if (rows.length > 0 && allRows.length === 0) {
                    allRows = rows;
                    filteredRows = [...allRows];
                    paginationControls.style.display = 'flex';
                    updatePagination();
                } else if (tableBody.querySelector('.table-no-posts')) {
                    paginationControls.style.display = 'none';
                } else if (rows.length === 0) {
                    tableBody.innerHTML = '<tr class="table-no-posts"><td colspan="8" style="text-align: center;">No blog posts found</td></tr>';
                    paginationControls.style.display = 'none';
                }
            }

            searchInput.addEventListener('input', function () {
                const searchText = this.value.toLowerCase();

                if (searchText === '') {
                    filteredRows = [...allRows];
                } else {
                    filteredRows = allRows.filter(row => {
                        const title = row.querySelector('.col-title').textContent.toLowerCase();
                        const content = row.querySelector('.col-content').textContent.toLowerCase();
                        const category = row.querySelector('.col-category').textContent.toLowerCase();

                        return title.includes(searchText) ||
                            content.includes(searchText) ||
                            category.includes(searchText);
                    });
                }

                currentPage = 1;
                updatePagination();
            });

            // Pagination functionality
            function updatePagination() {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

                if (filteredRows.length === 0) {
                    paginationControls.style.display = 'none';
                    tableBody.innerHTML = '<tr class="table-no-posts"><td colspan="8" style="text-align: center;">No blog posts found</td></tr>';
                    return;
                }

                paginationControls.style.display = 'flex';

                // Update button states
                firstPageBtn.disabled = currentPage === 1;
                prevPageBtn.disabled = currentPage === 1;
                nextPageBtn.disabled = currentPage === totalPages;
                lastPageBtn.disabled = currentPage === totalPages;

                // Generate page numbers
                pageNumbers.innerHTML = '';
                const maxVisiblePages = 5;
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                if (endPage - startPage + 1 < maxVisiblePages) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                for (let i = startPage; i <= endPage; i++) {
                    const pageBtn = document.createElement('button');
                    pageBtn.textContent = i;
                    if (i === currentPage) {
                        pageBtn.style.fontWeight = 'bold';
                        pageBtn.style.backgroundColor = '#e6cf4d';
                    }
                    pageBtn.addEventListener('click', () => goToPage(i));
                    pageNumbers.appendChild(pageBtn);
                }

                // Update page info
                const startItem = (currentPage - 1) * rowsPerPage + 1;
                const endItem = Math.min(currentPage * rowsPerPage, filteredRows.length);
                pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredRows.length} posts`;

                // Show current page rows
                displayCurrentPage();
            }

            function displayCurrentPage() {
                tableBody.innerHTML = '';

                const startIndex = (currentPage - 1) * rowsPerPage;
                const endIndex = startIndex + rowsPerPage;

                const pageRows = filteredRows.slice(startIndex, endIndex);
                pageRows.forEach(row => {
                    tableBody.appendChild(row);
                });
            }

            function goToPage(page) {
                currentPage = page;
                updatePagination();
            }

            // Pagination button event listeners
            firstPageBtn.addEventListener('click', () => goToPage(1));
            prevPageBtn.addEventListener('click', () => goToPage(currentPage - 1));
            nextPageBtn.addEventListener('click', () => goToPage(currentPage + 1));
            lastPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
                goToPage(totalPages);
            });

            // Initialize table
            initializeTable();

            // Update dropdown when page loads
            updateCategoriesDropdown();

            // Listen for custom event when new category is added (from categories page)
            window.addEventListener('storage', function (e) {
                if (e.key === 'categoryAdded') {
                    updateCategoriesDropdown();
                }
            });

            // Alternative: Poll for updates every 30 seconds (fallback)
            setInterval(updateCategoriesDropdown, 30000);
        });

        // Delete post functionality

        $(document).on('click', '.btn-delete', function () {
            let postId = $(this).data('id');
            if (confirm("Are you sure you want to delete this post?")) {
                $.ajax({
                    url: "<?= base_url('admin/posts/delete') ?>/" + postId,
                    type: "POST",
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 'success') {
                            alert("Post deleted successfully!");
                            $("tr[data-id='" + postId + "']").remove(); // remove row from table
                        } else {
                            alert("Failed to delete post.");
                        }
                    },
                    error: function () {
                        alert("Error deleting post.");
                    }
                });
            }
        });


        // Edit post functionality - Open modal
        document.addEventListener('click', e => {
            if (e.target.closest('.btn-edit')) {
                const row = e.target.closest('tr');
                const postId = row.getAttribute('data-id');
                const categoryId = row.getAttribute('data-category-id');

                // FIXED: Get the full content from the title attribute correctly
                const fullContent = row.querySelector('.col-content div').getAttribute('title');

                document.getElementById('edit_id').value = postId;
                document.getElementById('edit_title').value = row.querySelector('.col-title').textContent;
                document.getElementById('edit_content').value = fullContent;

                // Set the category in the dropdown
                const categorySelect = document.getElementById('edit_category_id');
                categorySelect.value = categoryId;

                // Get and display current image

                const imageCell = row.querySelector('.col-image');
                let imageUrl = '';
                let imagePath = '';

                const imgElement = imageCell.querySelector('img.thumbnail');
                if (imgElement) {
                    imageUrl = imgElement.src;
                    imagePath = imgElement.getAttribute('src').replace('<?= base_url() ?>', '');
                }

                displayCurrentImage(imageUrl, imagePath);

                document.getElementById('editModal').classList.add('show');
            }
        });

        // Close modal
        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('editModal').classList.remove('show');
        });

        // Update post functionality
        document.getElementById('updateBtn').addEventListener('click', () => {
            const formData = new FormData();
            formData.append('id', document.getElementById('edit_id').value);
            formData.append('title', document.getElementById('edit_title').value);
            formData.append('content', document.getElementById('edit_content').value);
            formData.append('category_id', document.getElementById('edit_category_id').value);
            const featuredImageInput = document.getElementById('edit_featured_image');
            if (featuredImageInput.files[0]) {
                formData.append('featured_image', featuredImageInput.files[0]);
            }

            fetch('<?= base_url("admin/posts/update_post") ?>', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        const row = document.querySelector(`tr[data-id="${formData.get('id')}"]`);
                        row.querySelector('.col-title').textContent = data.data.title;

                        // Update content preview and title attribute
                        const contentCell = row.querySelector('.col-content');
                        contentCell.innerHTML = `<div class="content-preview" title="${data.data.content}">${data.data.content.substring(0, 50)}...</div>`;

                        // Update category name in the table
                        const selectedOption = document.getElementById('edit_category_id').options[document.getElementById('edit_category_id').selectedIndex];
                        row.querySelector('.col-category').textContent = selectedOption.textContent;
                        row.setAttribute('data-category-id', formData.get('category_id'));

                        if (data.data.featured_image) {
                            const imageCell = row.querySelector('.col-image');
                            imageCell.innerHTML = `<img src="<?= base_url() ?>${data.data.featured_image}" alt="Featured Image" class="thumbnail">`;
                        }

                        document.getElementById('editModal').classList.remove('show');
                        alert('Post updated successfully.');
                    } else {
                        alert('Error updating post.');
                    }
                })
                .catch(err => console.error(err));
        });

        // Adjust table responsiveness on resize
        window.addEventListener('resize', function () {
            document.body.classList.toggle('resizing', true);
            setTimeout(() => {
                document.body.classList.toggle('resizing', false);
            }, 100);
        });

        // Function to display current image in edit modal
        function displayCurrentImage(imageUrl, imagePath) {
            const currentImage = document.getElementById('current_image');
            const currentImageName = document.getElementById('current_image_name');

            if (imageUrl && imageUrl !== '' && !imageUrl.includes('No Image')) {
                currentImage.src = imageUrl;
                currentImage.style.display = 'block';

                // Extract filename from path for display
                const fileName = imagePath.split('/').pop();
                currentImageName.textContent = 'Current: ' + fileName;
                currentImageName.style.display = 'block';
            } else {
                currentImage.style.display = 'none';
                currentImageName.textContent = 'No current image';
                currentImageName.style.display = 'block';
            }
        }
    </script>
</body>

</html>