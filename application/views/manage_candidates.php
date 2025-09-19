<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SahajJobs | Employer Manage Applications</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />

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
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', Arial, sans-serif;
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
            background: #FFF44F;
            border-left: 4px solid var(--warning);
        }

        .sidebar-menu i {
            margin-right: 10px;
            font-size: 1.2rem;
            min-width: 24px;
            text-align: center;
        }

        /* Main Content */
        .content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.collapsed~.content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Table Styling */
        .container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(236, 221, 2, 0.1);
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

        .table th {
            background: #FFF44F;
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

        .table-no-candidates td {
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

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
            margin-top: 140px;
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

            .content {
                margin-left: var(--sidebar-collapsed-width);
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar.collapsed {
                width: 0;
            }

            .sidebar.collapsed~.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 768px) {
            .content {
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

            .content {
                margin-left: 0 !important;
            }

            .sidebar.collapsed {
                width: 0;
            }
        }

        @media screen and (max-width: 480px) {
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
    <button class="mobile-toggle"><i class="fas fa-bars"></i></button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <img style="height:50px; width:135px;" src="<?= base_url('assets/images/sahajjobs1.png'); ?>" 
                    alt="SahajJobs">
            </div>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="<?= base_url('employer_dashboard'); ?>"><i class="fas fa-home me-2"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="<?= base_url('employer_job_post'); ?>"><i class="fas fa-file-alt me-2"></i>
                        <span>Post
                            Job</span></a></li>
                <li><a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase me-2"></i>
                        <span>Manage Jobs</span></a></li>
                <li><a href="<?= base_url('employer_manage_applications'); ?>" class="active"><i 
                            class="fas fa-user-graduate me-2"></i> <span>Applications</span></a>
                </li>
                <li><a href="<?= base_url('employer_profile'); ?>"><i class="fas fa-building"></i>
                        <span>Employer
                            Profile</span></a></li>
                <li>
                    <a href="#" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <div class="container">
            <h4 class="fw-bold" style="color: #f1e42cff; margin-bottom: 2rem;">Manage Applications</h4>

            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search Applications ..." />
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Job Position</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Work Experience</th>
                            <th>Resume (View / Download)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="candidateTableBody">
                        <?php if (!empty($candidates)): ?>
                            <?php $sl_no = 1; ?>
                            <?php foreach ($candidates as $candidate): ?>
                                <tr>
                                    <td data-label="SL No"><?= $sl_no++; ?></td>
                                    <td data-label="Job Positions">
                                        <?= htmlspecialchars($candidate->job_position); ?>
                                    </td>
                                    <td data-label="Name">
                                        <?= htmlspecialchars($candidate->full_name); ?>
                                    </td>
                                    <td data-label="Email">
                                        <?= htmlspecialchars($candidate->email); ?>
                                    </td>
                                    <td data-label="Phone Number">
                                        <?= htmlspecialchars($candidate->mobile_number); ?>
                                    </td>
                                    <td data-label="Work Experience">
                                        <?= htmlspecialchars($candidate->work_experience); ?>
                                    </td>
                                    <td data-label="Resume">
                                        <?php if (!empty($candidate->resume_path)): ?>
                                            <a href="<?= base_url($candidate->resume_path); ?>" target="_blank" title="View Resume">
                                                <i class="fas fa-eye" style="color:black;"></i>
                                            </a>
                                            &nbsp;|&nbsp;
                                            <a href="<?= base_url($candidate->resume_path); ?>" download title="Download Resume">
                                                <i class="fas fa-download" style="color:black;"></i>
                                            </a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>


                                    <td data-label="Action">

                                        <?php if ($candidate->application_status === 'Applied'): ?>
                                            <button type="button" class="btn btn-link p-0 open-confirm-modal" 
                                                data-id="<?= $candidate->application_id; ?>"
                                                data-status="Accepted" 
                                                data-message="Do you want to accept this application?" data-bs-toggle="modal" 
                                                data-bs-target="#confirmModal" title="Accept">
                                                <i class="fas fa-check" style="color: green; font-size: 1.25rem;"></i>
                                            </button>

                                            <button type="button" class="btn btn-link p-0 open-confirm-modal" 
                                                data-id="<?= $candidate->application_id; ?>"
                                                data-status="Rejected" 
                                                data-message="Do you want to reject this application?" data-bs-toggle="modal" 
                                                data-bs-target="#confirmModal" title="Reject">
                                                <i class="fas fa-times" style="color: red; font-size: 1.25rem;"></i>
                                            </button>

                                        <?php else: ?>

                                            <span><?= htmlspecialchars($candidate->application_status); ?></span>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="table-no-candidates">
                                <td colspan="8" class="text-center">No applications found
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination" id="paginationControls">
                <button id="firstPage">First</button>
                <button id="prevPage">Previous</button>
                <span id="pageNumbers"></span>
                <button id="nextPage">Next</button>
                <button id="lastPage">Last</button>
                <span class="page-info" id="pageInfo"></span>
            </div>

            <div>
                <?= isset($pagination_links) ? $pagination_links : ''; ?>
            </div>
        </div>
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="confirmModalMessage">Are you sure?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" style="background-color: #f1e42cff; color: black; border: none;" id="confirmModalOkBtn">OK</button>
                    </div>
                </div>
            </div>
        </div>


        <footer>&copy; 2025 SahajJobs Inc. All Rights Reserved.</footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Employer_controller/logout"); ?>';
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('candidateTableBody');
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
            const rowsPerPage = 8;

            function initializeTable() {
                const rows = Array.from(tableBody.querySelectorAll('tr'));
                if (rows.length > 0 && !rows[0].classList.contains('table-no-candidates')) {
                    allRows = rows;
                    filteredRows = [...allRows];
                    paginationControls.style.display = 'flex';
                    updatePagination();
                } else {
                    tableBody.innerHTML = '<tr class="table-no-candidates"><td colspan="8" class="text-center">No Applications found</td></tr>';
                    paginationControls.style.display = 'none';
                }
            }

            function updatePagination() {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

                if (filteredRows.length === 0) {
                    tableBody.innerHTML = '<tr class="table-no-candidates"><td colspan="8" class="text-center">No Applications found</td></tr>';
                    paginationControls.style.display = 'none';
                    return;
                }

                paginationControls.style.display = 'flex';
                firstPageBtn.disabled = currentPage === 1;
                prevPageBtn.disabled = currentPage === 1;
                nextPageBtn.disabled = currentPage === totalPages;
                lastPageBtn.disabled = currentPage === totalPages;

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
                    pageBtn.addEventListener('click', () => goToPage(i));
                    if (i === currentPage) {
                        pageBtn.style.fontWeight = 'bold';
                        pageBtn.style.backgroundColor = '#e6cf4d';
                    }
                    pageNumbers.appendChild(pageBtn);
                }

                const startItem = (currentPage - 1) * rowsPerPage + 1;
                const endItem = Math.min(currentPage * rowsPerPage, filteredRows.length);
                pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredRows.length} applications`;

                displayCurrentPage();
            }

            function displayCurrentPage() {
                tableBody.innerHTML = '';
                const startIndex = (currentPage - 1) * rowsPerPage;
                const endIndex = startIndex + rowsPerPage;
                const pageRows = filteredRows.slice(startIndex, endIndex);

                if (pageRows.length > 0) {
                    pageRows.forEach(row => tableBody.appendChild(row));
                } else {
                    tableBody.innerHTML = '<tr class="table-no-candidates"><td colspan="8" class="text-center">No Applications found</td></tr>';
                }
            }

            function goToPage(page) {
                currentPage = page;
                updatePagination();
            }

            searchInput.addEventListener('input', function () {
                const val = this.value.toLowerCase();
                filteredRows = allRows.filter(row => {
                    return Array.from(row.children).some(td => td.textContent.toLowerCase().includes(val));
                });
                currentPage = 1;
                updatePagination();
            });

            firstPageBtn.addEventListener('click', () => goToPage(1));
            prevPageBtn.addEventListener('click', () => goToPage(currentPage - 1));
            nextPageBtn.addEventListener('click', () => goToPage(currentPage + 1));
            lastPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
                goToPage(totalPages);
            });

            // Handle Accept/Reject Actions
            tableBody.addEventListener('click', function (e) {
                const button = e.target.closest('.update-status');
                if (!button) return;

                const applicationId = button.getAttribute('data-id');
                const status = button.getAttribute('data-status');
                const row = button.closest('tr');

                if (confirm(`Are you sure you want to ${status.toLowerCase()} this application?`)) {
                    fetch("<?= base_url('employer_controller/update_application_status'); ?>", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `application_id=${encodeURIComponent(applicationId)}&status=${encodeURIComponent(status)}`
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                location.reload(); // A simple way to refresh the view
                            } else {
                                alert(`Error: ${data.message}`);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                }
            });

            // Mobile sidebar toggle
            document.querySelector('.mobile-toggle').addEventListener('click', function () {
                document.getElementById('sidebar').classList.toggle('show');
            });

            initializeTable();
        });
    </script>

    <script>
        var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        var selectedApplicationId = null;
        var selectedStatus = null;

        // Open confirm modal on button click
        document.querySelectorAll('.open-confirm-modal').forEach(function (button) {
            button.addEventListener('click', function () {
                selectedApplicationId = this.getAttribute('data-id');
                selectedStatus = this.getAttribute('data-status');
                var message = this.getAttribute('data-message');
                document.getElementById('confirmModalMessage').textContent = message;
                confirmModal.show();
            });
        });

        // Handle OK button in modal
        document.getElementById('confirmModalOkBtn').addEventListener('click', function () {
            if (selectedApplicationId && selectedStatus) {
                fetch("<?= base_url('employer_controller/update_application_status'); ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'application_id=' + encodeURIComponent(selectedApplicationId) +
                        '&status=' + encodeURIComponent(selectedStatus)
                })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                        if (data.success) {
                            // Reload or update UI accordingly
                            location.reload();
                        }
                    });
            }
            confirmModal.hide();
        });
    </script>


   

</body>

</html>