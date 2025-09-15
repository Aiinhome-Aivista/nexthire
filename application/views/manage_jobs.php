<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Employer Manage Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
            display: flex;
            min-height: 100vh;
            background: #f5f7fa;
            color: #333;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: #c9c9c9;
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
            background: #fca911d4;
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

        /* Container */
        .container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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
            background: #fca911d4;
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

        .table-no-jobposts td {
            text-align: center;
            font-style: italic;
            color: #888;
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
                padding: 60px;
            }

            .container {
                padding: 15px;
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
                <img style="height:40px; width:90px;" src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJobs">
            </div>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="<?= base_url('employer_dashboard'); ?>"><i class="fas fa-home me-2"></i> <span>Dashboard</span></a></li>
                <li><a href="<?= base_url('employer_job_post'); ?>"><i class="fas fa-file-alt me-2"></i> <span>Post Job</span></a></li>
                <li><a href="<?= base_url('employer_manage_jobs'); ?>" class="active"><i class="fas fa-briefcase me-2"></i> <span>Manage Jobs</span></a></li>
                <li><a href="<?= base_url('employer_manage_candidates'); ?>"><i class="fas fa-user-graduate me-2"></i> <span>Candidates</span></a></li>
                <li><a href="<?= base_url('employer_profile'); ?>"><i class="fas fa-building"></i> <span>Employer Profile</span></a></li>
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
            <h2>Manage Jobs</h2>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold" style="color: #fca911;">Manage Jobs</h4>
                <a href="<?= base_url('employer_job_post'); ?>" class="btn btn-warning text-dark">
                    <i class="fas fa-plus me-1"></i> Post New Job
                </a>
            </div>

            <!-- Search Box -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search job posts...">
                </div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Job Type</th>
                            <th>Salary</th>
                            <th>Last Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="jobTableBody">
                        <?php if (!empty($jobs)): ?>
                            <?php foreach ($jobs as $index => $job): ?>
                                <tr data-id="<?= $job->id ?>">
                                    <td data-label="ID"><?= $index + 1 ?></td>
                                    <td data-label="Job Title"><?= htmlspecialchars($job->title) ?></td>
                                    <td data-label="Company"><?= htmlspecialchars($job->company) ?></td>
                                    <td data-label="Location"><?= htmlspecialchars($job->location) ?></td>
                                    <td data-label="Job Type"><?= htmlspecialchars($job->job_type) ?></td>
                                    <td data-label="Salary"><?= htmlspecialchars($job->salary) ?></td>
                                    <td data-label="Last Date"><?= htmlspecialchars($job->last_date) ?></td>
                                    <td data-label="Actions">
                                        <button class="btn btn-table btn-edit" data-id="<?= $job->id; ?>" data-employer="<?= $job->employer_id; ?>" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-table btn-delete" data-id="<?= $job->id; ?>" data-employer="<?= $job->employer_id; ?>" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="table-no-jobposts">
                                <td colspan="8">No jobs found</td>
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

            <footer style="text-align:center; padding-top: 20px;">
                &copy; 2025 SahajJobs Inc. All Rights Reserved.
            </footer>
        </div>
    </div>

    <!-- Edit Job Modal -->
    <div class="modal fade" id="editJobModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editJobForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editJobId">
                        <input type="hidden" name="employer_id" id="editEmployerId">

                        <div class="mb-3">
                            <label class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="title" id="editTitle">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="company" id="editCompany">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" id="editLocation">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Job Type</label>
                            <input type="text" class="form-control" name="job_type" id="editJobType">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            <input type="text" class="form-control" name="salary" id="editSalary">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Date</label>
                            <input type="date" class="form-control" name="last_date" id="editLastDate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
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

        // Search and Pagination functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('jobTableBody');
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
            const rowsPerPage = 5;

            // Initialize table
            function initializeTable() {
                const rows = Array.from(tableBody.querySelectorAll('tr:not(.table-no-jobposts)'));

                // Only reinitialize if we have rows and they haven't been processed yet
                if (rows.length > 0 && allRows.length === 0) {
                    allRows = rows;
                    filteredRows = [...allRows];

                    // Show pagination controls
                    paginationControls.style.display = 'flex';
                    updatePagination();
                } else if (tableBody.querySelector('.table-no-jobposts')) {
                    // If no data row is present, hide pagination
                    paginationControls.style.display = 'none';
                } else if (rows.length === 0) {
                    // If no rows at all, show "no data" row
                    tableBody.innerHTML = '<tr class="table-no-jobposts"><td colspan="8" style="text-align: center;">No job posts found</td></tr>';
                    paginationControls.style.display = 'none';
                }
            }

            // Initialize table
            initializeTable();

            // Search functionality
            searchInput.addEventListener('input', function() {
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
                    tableBody.innerHTML = '<tr class="table-no-jobposts"><td colspan="8" style="text-align: center;">No job posts found</td></tr>';
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
                pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredRows.length} job posts`;

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

        // Logout functionality
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Employer_controller/logout"); ?>';
            }
        });

        // Edit and Delete functionality
        document.querySelectorAll(".btn-edit").forEach(btn => {
            btn.addEventListener("click", function() {
                let jobId = this.getAttribute("data-id");
                let employerId = this.getAttribute("data-employer");

                fetch("<?= base_url('Employer_controller/get_job'); ?>/" + jobId + "/" + employerId)
                    .then(res => res.json())
                    .then(job => {
                        if (job) {
                            document.getElementById("editJobId").value = job.id;
                            document.getElementById("editEmployerId").value = job.employer_id;
                            document.getElementById("editTitle").value = job.title;
                            document.getElementById("editCompany").value = job.company;
                            document.getElementById("editLocation").value = job.location;
                            document.getElementById("editJobType").value = job.job_type;
                            document.getElementById("editSalary").value = job.salary;
                            document.getElementById("editLastDate").value = job.last_date;

                            new bootstrap.Modal(document.getElementById("editJobModal")).show();
                        }
                    });
            });
        });

        document.getElementById("editJobForm").addEventListener("submit", function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("<?= base_url('Employer_controller/update_job'); ?>", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Job updated successfully!");
                        location.reload();
                    } else {
                        alert("Error: " + data.message);
                    }
                });
        });

        document.querySelectorAll(".btn-delete").forEach(btn => {
            btn.addEventListener("click", function() {
                let jobId = this.getAttribute("data-id");
                let employerId = this.getAttribute("data-employer");

                if (confirm("Are you sure you want to delete this job?")) {
                    fetch("<?= base_url('Employer_controller/delete_job'); ?>", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: JSON.stringify({
                                id: jobId,
                                employer_id: employerId
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                alert("Job deleted successfully!");
                                location.reload();
                            } else {
                                alert("Error: " + data.message);
                            }
                        });
                }
            });
        });
    </script>
</body>

</html>