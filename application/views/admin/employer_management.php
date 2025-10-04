<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SahajJobs | Manage Employers</title>
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

    .badge {
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: bold;
      display: inline-block;
    }

    .active {
      background: #28a745;
      color: white;
    }

    .inactive {
      background: #ffc107;
      color: black;
    }

    /* Action buttons */
    .btn-table {
      border: none;
      padding: 6px 10px;
      font-size: 0.85rem;
      cursor: pointer;
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

    .table-no-employers td {
      text-align: center;
      font-style: italic;
      color: #888;
    }

    /* Enhanced Modal Styles */
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
    }

    .modal.show {
      opacity: 1;
      visibility: visible;
    }

    .modal-content {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 450px;
      max-width: 90%;
      max-height: 90vh;
      overflow-y: auto;
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
    }

    .modal-header h3 {
      font-size: 1.4rem;
      color: #333;
      font-weight: 600;
      margin: 0;
    }

    .modal-body {
      padding: 15px;
    }

    .form-group {
      margin-bottom: 10px;
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

    .modal-footer {
      padding: 15px 25px 20px;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: flex-end;
      gap: 12px;
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
        padding: 15px;
        padding-left: 15px;
      }

      .container h2 {
        margin-left: 50px;
      }

      .search-container {
        flex-direction: column;
        align-items: stretch;
      }

      .search-box {
        max-width: 100%;
      }

      table,
      thead,
      tbody,
      th,
      td,
      tr {
        display: block;
      }

      thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      tr {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        border-radius: 5px;
      }

      td {
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
        text-align: right;
      }

      td:before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: bold;
      }

      /* Modified pagination for mobile */
      .pagination {
        flex-direction: row;
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: center;
        align-items: center;
        padding-bottom: 5px;
      }

      .pagination button {
        flex-shrink: 0;
        padding: 6px 10px;
        font-size: 13px;
      }

      .page-info {
        margin: 0;
        flex-shrink: 0;
        font-size: 13px;
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
      .modal-content {
        width: 95%;
      }

      .modal-body {
        padding: 15px;
      }

      .modal-footer {
        padding: 15px;
        flex-direction: column;
      }

      .modal-btn {
        width: 100%;
        margin-bottom: 10px;
      }

      td {
        padding-left: 40%;
      }

      td:before {
        width: 35%;
      }

      h2 {
        font-size: 1.5rem;
      }

      /* Further adjustments for pagination on very small screens */
      .pagination {
        gap: 4px;
      }

      .pagination button {
        padding: 5px 8px;
        font-size: 12px;
      }

      .pagination span {
        padding: 5px 8px;
        font-size: 12px;
      }
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
      max-height: 250px;
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
  </style>
</head>

<body>
  <button class="mobile-toggle">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <!-- <div style="display: flex; align-items: center; gap: 10px;">
                <img src="<?php //base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJOB"
                    style="height:50px; width:135px;">
            </div> -->
      <div style="display: flex; align-items: center; gap: 10px;">
        <img src="<?= base_url('../All_Uploads/images/sahajjobs1.png'); ?>" alt="SahajJOB"
          style="height:50px; width:135px;">
      </div>
    </div>
    <nav class="sidebar-menu">
      <ul>
        <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="<?= base_url('admin/candidate_management') ?>"><i class="fas fa-user-graduate"></i>
            <span>Candidates</span></a></li>
        <li><a href="<?= base_url('admin/employer_management') ?>" class="active"><i class="fas fa-users"></i>
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
          <ul class="submenu" id="posts-submenu">
            <li>
              <a href="<?= base_url('admin/posts_manage'); ?>">Blog</a>
            </li>
            <li>
              <a href="<?= base_url('admin/posts_categories'); ?>">Categories</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url('admin/comments'); ?>"><i class="fas fa-message"></i> Comments</a>
        </li>
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
    <div class="container">
      <h2>Manage Employers</h2>

      <!-- Search Box -->
      <div class="search-container">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" id="searchInput" placeholder="Search employers...">
        </div>
      </div>

      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>S.No</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Company</th>
              <th>Designation</th>
              <th>Mobile Number</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="recruiterTableBody">
            <?php if (!empty($employers)): ?>
              <?php $i = 1; ?>
              <?php foreach ($employers as $employer): ?>
                <tr data-id="<?= $employer->id ?>">
                  <td data-label="S.No"><?= $i++; ?></td>
                  <td data-label="Full Name" class="col-name"><?= $employer->full_name ?></td>
                  <td data-label="Email" class="col-email"><?= $employer->email ?></td>
                  <td data-label="Company" class="col-company"><?= $employer->company ?></td>
                  <td data-label="Designation" class="col-designation"><?= $employer->designation ?></td>
                  <td data-label="Mobile Number" class="col-mobile"><?= $employer->mobile_number ?></td>
                  <td data-label="Action">
                    <button class="btn btn-table btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-table btn-delete" title="Delete"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr class="table-no-employers">
                <td colspan="7">No employers found</td>
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
    <footer style="text-align:center; padding-top: 130px;">
      &copy; 2025 SahajJobs Inc. All Rights Reserved.
    </footer>
  </div>

  <!-- Edit Employer Modal -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Edit Employer</h3>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="edit_id">

          <div class="form-group">
            <label for="edit_full_name">Full Name</label>
            <input type="text" id="edit_full_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_company">Company</label>
            <input type="text" id="edit_company" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_designation">Designation</label>
            <input type="text" id="edit_designation" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_mobile_number">Mobile</label>
            <input type="text" id="edit_mobile_number" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="updateBtn" class="modal-btn modal-btn-primary">Update</button>
        <button type="button" id="closeModal" class="modal-btn modal-btn-secondary">Cancel</button>
      </div>
    </div>
  </div>

  <script>
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const mobileToggle = document.querySelector('.mobile-toggle');
    const mainContent = document.querySelector('.main-content');

    document.getElementById('posts-menu-toggle').addEventListener('click', function (e) {
      e.preventDefault();
      document.getElementById('posts-submenu').classList.toggle('show');
    });

    // Helper to read CSS variable values
    function cssVar(name, fallback = '') {
      try {
        return getComputedStyle(document.documentElement).getPropertyValue(name) || fallback;
      } catch (e) {
        return fallback;
      }
    }

    // Mobile sidebar toggle
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

    // Close sidebar when clicking outside on mobile
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

        // Ensure sidebar has proper width
        sidebar.style.width = cssVar('--sidebar-width', '250px').trim();

        // adjust main content margin
        if (mainContent) {
          mainContent.style.marginLeft = cssVar('--sidebar-width', '250px').trim();
        }
      } else {
        // Mobile view - hide sidebar by default (unless explicitly shown)
        if (!sidebar.classList.contains('show')) {
          sidebar.style.transform = 'translateX(-100%)';
        }
        if (mainContent) mainContent.style.marginLeft = '0';
      }
    });

    // Initialize sidebar state based on screen size
    function initSidebar() {
      if (!sidebar) return;

      if (window.innerWidth <= 768) {
        sidebar.style.transform = 'translateX(-100%)';
        if (mainContent) mainContent.style.marginLeft = '0';
      } else {
        sidebar.style.transform = 'translateX(0)';
        // set main-content margin
        if (mainContent) {
          mainContent.style.marginLeft = cssVar('--sidebar-width', '250px').trim();
        }
      }
    }

    // Call initialization function
    initSidebar();

    const logoutBtn = document.getElementById('logoutBtn');
    logoutBtn.addEventListener('click', function () {
      if (confirm('Are you sure you want to logout?')) {
        window.location.href = '<?= base_url("admin/employer_management/logout"); ?>';
      }
    });

    // Search and Pagination functionality (Employer Management)
    document.addEventListener('DOMContentLoaded', function () {
      const searchInput = document.getElementById('searchInput');
      const tableBody = document.getElementById('recruiterTableBody');
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

      // Use MutationObserver to detect when table content is loaded
      const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          if (mutation.addedNodes.length) {
            initializeTable();
          }
        });
      });

      // Start observing the table body for changes
      observer.observe(tableBody, {
        childList: true
      });

      // Also try to initialize after a short delay in case content is already there
      setTimeout(initializeTable, 500);

      function initializeTable() {
        const rows = Array.from(tableBody.querySelectorAll('tr:not(.table-no-employers)'));

        // Only reinitialize if we have rows and they haven't been processed yet
        if (rows.length > 0 && allRows.length === 0) {
          allRows = rows;
          filteredRows = [...allRows];

          // Show pagination controls
          paginationControls.style.display = 'flex';
          updatePagination();
        } else if (tableBody.querySelector('.table-no-employers')) {
          // If no data row is present, hide pagination
          paginationControls.style.display = 'none';
        }
      }

      // Search functionality
      searchInput.addEventListener('input', function () {
        const searchText = this.value.toLowerCase();

        if (searchText === '') {
          filteredRows = [...allRows];
        } else {
          filteredRows = allRows.filter(row => {
            const cells = row.querySelectorAll('td');
            for (let i = 0; i < cells.length - 1; i++) { // Skip action column
              if (cells[i].textContent.toLowerCase().includes(searchText)) {
                return true;
              }
            }
            return false;
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
          tableBody.innerHTML = '<tr class="table-no-employers"><td colspan="7">No employers found</td></tr>';
          return;
        }

        // Show pagination controls
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
        pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredRows.length} employers`;

        // Show current page rows
        displayCurrentPage();
      }

      function displayCurrentPage() {
        // Clear existing table content
        tableBody.innerHTML = '';

        // Show rows for current page
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
    });


    // Re-number table
    function renumberTable() {
      const rows = document.querySelectorAll("#recruiterTableBody tr");
      rows.forEach((row, index) => {
        row.querySelector("td").textContent = index + 1;
      });
    }

    // Delete employer
    document.addEventListener('click', e => {
      if (e.target.closest('.btn-delete')) {
        const row = e.target.closest('tr');
        const employerId = row.getAttribute('data-id');

        if (confirm('Are you sure you want to delete this employer?')) {
          fetch('<?= base_url("admin/employer_management/delete_employer/") ?>' + employerId)
            .then(res => res.json())
            .then(data => {
              if (data.status === 'success') {
                row.remove();
                renumberTable();
                alert('Employer deleted successfully.');
              } else {
                alert('Error deleting employer.');
              }
            })
            .catch(err => console.error(err));
        }
      }
    });

    // Open edit modal
    document.addEventListener('click', e => {
      if (e.target.closest('.btn-edit')) {
        const row = e.target.closest('tr');
        const id = row.getAttribute('data-id');
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_full_name').value = row.querySelector('.col-name').textContent;
        document.getElementById('edit_email').value = row.querySelector('.col-email').textContent;
        document.getElementById('edit_company').value = row.querySelector('.col-company').textContent;
        document.getElementById('edit_designation').value = row.querySelector('.col-designation').textContent;
        document.getElementById('edit_mobile_number').value = row.querySelector('.col-mobile').textContent;

        document.getElementById('editModal').classList.add('show');
      }
    });

    // Close modal
    document.getElementById('closeModal').addEventListener('click', () => {
      document.getElementById('editModal').classList.remove('show');
    });

    // Update employer
    document.getElementById('updateBtn').addEventListener('click', () => {
      const formData = new FormData();
      formData.append('id', document.getElementById('edit_id').value);
      formData.append('full_name', document.getElementById('edit_full_name').value);
      formData.append('email', document.getElementById('edit_email').value);
      formData.append('company', document.getElementById('edit_company').value);
      formData.append('designation', document.getElementById('edit_designation').value);
      formData.append('mobile_number', document.getElementById('edit_mobile_number').value);

      fetch('<?= base_url("admin/employer_management/update_employer") ?>', {
        method: 'POST',
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          if (data.status === 'success') {
            const row = document.querySelector(`tr[data-id="${formData.get('id')}"]`);
            row.querySelector('.col-name').textContent = data.data.full_name;
            row.querySelector('.col-email').textContent = data.data.email;
            row.querySelector('.col-company').textContent = data.data.company;
            row.querySelector('.col-designation').textContent = data.data.designation;
            row.querySelector('.col-mobile').textContent = data.data.mobile_number;

            document.getElementById('editModal').classList.remove('show');
            alert('Employer updated successfully.');
          } else {
            alert('Error updating employer.');
          }
        })
        .catch(err => console.error(err));
    });
  </script>
</body>

</html>