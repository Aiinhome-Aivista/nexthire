<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Manage Candidates</title>
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

        /* --- Student Management Table CSS --- */
        .container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
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
            padding: 20px 25px 15px;
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
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
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
    </style>
</head>

<body>
    <div class="sidebar">
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
                <li><a href="<?= base_url('admin/candidate_management') ?>" class="active"><i
                            class="fas fa-user-graduate"></i> <span>Candidates</span></a></li>
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

    <div class="main-content">
        <div class="container">
            <h2>Manage Candidates</h2>

            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search candidates...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Work Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="candidateTableBody">
                        <?php if (!empty($candidates)): ?>
                            <?php $ui_id = 1; ?>
                            <?php foreach ($candidates as $candidate): ?>
                                <tr data-id="<?= $candidate->id ?>">
                                    <td><?= $ui_id++; ?></td>
                                    <td class="col-name"><?= $candidate->full_name ?></td>
                                    <td class="col-email"><?= $candidate->email ?></td>
                                    <td class="col-mobile"><?= $candidate->mobile_number ?></td>
                                    <td class="col-work"><?= $candidate->work_status ?></td>
                                    <td>
                                        <button class="btn btn-table btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-table btn-delete" title="Delete"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="table-no-candidates">
                                <td colspan="6">No candidates found</td>
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
        </div>

        <!-- Footer added here -->
        <footer style="text-align:center; padding-top: 170px;">
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>
    </div>


    <!-- Edit Candidate Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Candidate</h3>
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
                        <label for="edit_mobile_number">Mobile Number</label>
                        <input type="text" id="edit_mobile_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit_work_status">Work Status</label>
                        <input type="text" id="edit_work_status" class="form-control">
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
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("admin/candidate_management/logout"); ?>';
            }
        });

        // Search and Pagination functionality
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
                const rows = Array.from(tableBody.querySelectorAll('tr:not(.table-no-candidates)'));

                // Only reinitialize if we have rows and they haven't been processed yet
                if (rows.length > 0 && allRows.length === 0) {
                    allRows = rows;
                    filteredRows = [...allRows];

                    // Show pagination controls
                    paginationControls.style.display = 'flex';
                    updatePagination();
                } else if (tableBody.querySelector('.table-no-candidates')) {
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
                    tableBody.innerHTML = '<tr class="table-no-candidates"><td colspan="6">No candidates found</td></tr>';
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
                pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredRows.length} candidates`;

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


        // 🔹 Function to re-number the IDs in the first column
        function renumberTable() {
            const rows = document.querySelectorAll("#candidateTableBody tr");
            rows.forEach((row, index) => {
                row.querySelector("td").textContent = index + 1; // প্রথম কলামে S.No বসাবে
            });
        }


        // 🔹 Delete functionality
        document.addEventListener('click', function (e) {
            if (e.target.closest('.btn-delete')) {
                const row = e.target.closest('tr');
                const candidateId = row.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this candidate?')) {
                    fetch('<?= base_url("admin/candidate_management/delete_candidate/") ?>' + candidateId)
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Remove row from UI
                                row.remove();

                                // Recalculate S.No
                                renumberTable();

                                alert('Candidate deleted successfully.');
                            } else {
                                alert('Error deleting candidate.');
                            }
                        })
                        .catch(err => console.error(err));
                }
            }
        });



        // Open Modal with Candidate Data
        document.addEventListener('click', function (e) {
            if (e.target.closest('.btn-edit')) {
                const row = e.target.closest('tr');
                const candidateId = row.getAttribute('data-id');

                // Fill modal with row data
                document.getElementById('edit_id').value = candidateId;
                document.getElementById('edit_full_name').value = row.querySelector('.col-name').textContent;
                document.getElementById('edit_email').value = row.querySelector('.col-email').textContent;
                document.getElementById('edit_mobile_number').value = row.querySelector('.col-mobile').textContent;
                document.getElementById('edit_work_status').value = row.querySelector('.col-work').textContent;

                // Show modal
                document.getElementById('editModal').classList.add('show');
            }
        });

        // Close Modal
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('editModal').classList.remove('show');
        });

        // Update Candidate
        document.getElementById('updateBtn').addEventListener('click', function () {
            const formData = new FormData();
            formData.append('id', document.getElementById('edit_id').value);
            formData.append('full_name', document.getElementById('edit_full_name').value);
            formData.append('email', document.getElementById('edit_email').value);
            formData.append('mobile_number', document.getElementById('edit_mobile_number').value);
            formData.append('work_status', document.getElementById('edit_work_status').value);
            // formData.append('password', document.getElementById('edit_password').value); // Add password

            fetch('<?= base_url("admin/candidate_management/update_candidate") ?>', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Update row in UI
                        const row = document.querySelector(`tr[data-id="${formData.get('id')}"]`);
                        row.querySelector('.col-name').textContent = data.data.full_name;
                        row.querySelector('.col-email').textContent = data.data.email;
                        row.querySelector('.col-mobile').textContent = data.data.mobile_number;
                        row.querySelector('.col-work').textContent = data.data.work_status;

                        document.getElementById('editModal').classList.remove('show');
                        alert('Candidate updated successfully.');
                    } else {
                        alert('Error updating candidate.');
                    }
                })
                .catch(err => console.error(err));
        });
    </script>
</body>

</html>
