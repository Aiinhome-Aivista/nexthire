<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Manage Post Categories</title>
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
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .sidebar-menu .submenu.show {
            max-height: 200px;
        }

        .sidebar-menu .submenu a {
            padding: 10px 20px;
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
        }

        .sidebar.collapsed~.main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

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

        .btn-table {
            border: none;
            padding: 6px 10px;
            font-size: 0.85rem;
            cursor: pointer;
        }

        .btn-table i {
            font-size: 0.9rem;
        }

        .btn-edit {
            color: #d97706;
        }

        .btn-delete {
            color: #b91c1c;
        }

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

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table-no-categories td {
            text-align: center;
            font-style: italic;
            color: #888;
        }

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
            padding: 1rem;
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

        .add-btn-container {
            margin-bottom: 15px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-add {
            background-color: var(--primary);
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add:hover {
            background-color: #e6cf4d;
        }

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

        @media screen and (max-width: 768px) {
            .main-content {
                padding: 15px;
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
                <li><a href="<?= base_url('admin/featured_companies') ?>"><i class="fas fa-building"></i> <span>Featured
                            Companies</span></a></li>
                <li>
                    <a href="#" class="has-submenu" id="posts-menu-toggle">
                        <i class="fas fa-newspaper"></i>
                        <span>Posts</span>
                        <i class="fas fa-caret-down" style="margin-left: auto;"></i>
                    </a>
                    <ul class="submenu show" id="posts-submenu">
                        <li>
                            <a href="<?= base_url('admin/posts_manage'); ?>">Blog</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/posts_categories'); ?>" class="active">Categories</a>
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h2>Manage Post Categories</h2>

            <!-- Add Button -->
            <div class="add-btn-container">
                <button id="addButton" class="btn-add">
                    <i class="fas fa-plus"></i> Add New Category
                </button>
            </div>

            <!-- Search Box -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search categories...">
                </div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="categoriesTableBody">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <tr data-id="<?= $category->id ?>">
                                    <td data-label="ID" class="col-id"><?= htmlspecialchars($category->id) ?></td>
                                    <td data-label="Category Name" class="col-name"><?= htmlspecialchars($category->name) ?>
                                    </td>
                                    <td data-label="Action">
                                        <button class="btn btn-table btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-table btn-delete" title="Delete"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="table-no-categories">
                                <td colspan="3">No categories found</td>
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

    <!-- Add/Edit Modal -->
    <div id="categoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Category</h3>
            </div>
            <div class="modal-body">
                <form id="categoryForm">
                    <input type="hidden" id="category_id">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" id="category_name" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="saveCategoryBtn" class="modal-btn modal-btn-primary">Save</button>
                <button type="button" id="closeModal" class="modal-btn modal-btn-secondary">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        // Sidebar and pagination functionality (same as featured_companies.php)
        const sidebar = document.getElementById('sidebar');
        const mobileToggle = document.querySelector('.mobile-toggle');

        // Mobile sidebar toggle
        if (mobileToggle && sidebar) {
            mobileToggle.addEventListener('click', function (e) {
                e.stopPropagation();
                sidebar.classList.toggle('show');
                if (sidebar.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';
                    sidebar.style.transform = 'translateX(0)';
                } else {
                    document.body.style.overflow = 'auto';
                    sidebar.style.transform = 'translateX(-100%)';
                }
            });

            sidebar.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        }

        document.addEventListener('click', function (event) {
            if (!sidebar) return;
            if (window.innerWidth <= 768 &&
                !sidebar.contains(event.target) &&
                (!mobileToggle || !mobileToggle.contains(event.target)) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                document.body.style.overflow = 'auto';
                sidebar.style.transform = 'translateX(-100%)';
            }
        });

        // Pagination functionality
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('categoriesTableBody');
            const firstPageBtn = document.getElementById('firstPage');
            const prevPageBtn = document.getElementById('prevPage');
            const nextPageBtn = document.getElementById('nextPage');
            const lastPageBtn = document.getElementById('lastPage');
            const pageNumbers = document.getElementById('pageNumbers');
            const pageInfo = document.getElementById('pageInfo');
            const paginationControls = document.getElementById('paginationControls');

            let allRows = Array.from(tableBody.querySelectorAll('tr:not(.table-no-categories)'));
            let filteredRows = [...allRows];
            let currentPage = 1;
            const rowsPerPage = 10;

            function initializeTable() {
                const rows = Array.from(tableBody.querySelectorAll('tr:not(.table-no-categories)'));
                if (rows.length > 0 && allRows.length === 0) {
                    allRows = rows;
                    filteredRows = [...allRows];
                    paginationControls.style.display = 'flex';
                    updatePagination();
                } else if (tableBody.querySelector('.table-no-categories')) {
                    paginationControls.style.display = 'none';
                }
            }

            searchInput.addEventListener('input', function () {
                const searchText = this.value.toLowerCase();
                filteredRows = searchText === '' ? [...allRows] : allRows.filter(row => {
                    const cells = row.querySelectorAll('td');
                    for (let i = 0; i < cells.length - 1; i++) {
                        if (cells[i].textContent.toLowerCase().includes(searchText)) return true;
                    }
                    return false;
                });
                currentPage = 1;
                updatePagination();
            });

            function updatePagination() {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
                if (filteredRows.length === 0) {
                    paginationControls.style.display = 'none';
                    tableBody.innerHTML = '<tr class="table-no-categories"><td colspan="3" style="text-align: center;">No categories found</td></tr>';
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
                    if (i === currentPage) {
                        pageBtn.style.fontWeight = 'bold';
                        pageBtn.style.backgroundColor = '#e6cf4d';
                    }
                    pageBtn.addEventListener('click', () => goToPage(i));
                    pageNumbers.appendChild(pageBtn);
                }

                const startItem = (currentPage - 1) * rowsPerPage + 1;
                const endItem = Math.min(currentPage * rowsPerPage, filteredRows.length);
                pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredRows.length} categories`;

                displayCurrentPage();
            }

            function displayCurrentPage() {
                tableBody.innerHTML = '';
                const startIndex = (currentPage - 1) * rowsPerPage;
                const endIndex = startIndex + rowsPerPage;
                filteredRows.slice(startIndex, endIndex).forEach(row => {
                    tableBody.appendChild(row);
                });
            }

            function goToPage(page) {
                currentPage = page;
                updatePagination();
            }

            firstPageBtn.addEventListener('click', () => goToPage(1));
            prevPageBtn.addEventListener('click', () => goToPage(currentPage - 1));
            nextPageBtn.addEventListener('click', () => goToPage(currentPage + 1));
            lastPageBtn.addEventListener('click', () => goToPage(Math.ceil(filteredRows.length / rowsPerPage)));

            initializeTable();
        });

        // Category CRUD operations
        document.getElementById('addButton').addEventListener('click', () => {
            document.getElementById('modalTitle').textContent = 'Add New Category';
            document.getElementById('categoryForm').reset();
            document.getElementById('category_id').value = '';
            document.getElementById('categoryModal').classList.add('show');
        });

        document.addEventListener('click', e => {
            if (e.target.closest('.btn-edit')) {
                const row = e.target.closest('tr');
                document.getElementById('modalTitle').textContent = 'Edit Category';
                document.getElementById('category_id').value = row.getAttribute('data-id');
                document.getElementById('category_name').value = row.querySelector('.col-name').textContent;
                document.getElementById('categoryModal').classList.add('show');
            }
        });

        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('categoryModal').classList.remove('show');
        });
        document.getElementById('saveCategoryBtn').addEventListener('click', () => {
            const categoryId = document.getElementById('category_id').value;
            const categoryName = document.getElementById('category_name').value;

            const formData = new FormData();
            formData.append('name', categoryName);
            if (categoryId) formData.append('id', categoryId);

            const url = categoryId ?
                '<?= base_url("admin/posts_categories/update_category") ?>' :
                '<?= base_url("admin/posts_categories/add_category") ?>';

            fetch(url, {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        document.getElementById('categoryModal').classList.remove('show');

                        // Trigger event to update dropdowns in other tabs
                        if (typeof (Storage) !== 'undefined') {
                            localStorage.setItem('categoryAdded', Date.now());
                            setTimeout(() => localStorage.removeItem('categoryAdded'), 100);
                        }

                        // Reload the page to show the new category
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(err => console.error(err));
        });

        document.addEventListener('click', e => {
            if (e.target.closest('.btn-delete')) {
                const row = e.target.closest('tr');
                const categoryId = row.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this category?')) {
                    fetch('<?= base_url("admin/posts_categories/delete_category/") ?>' + categoryId)
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                row.remove();
                                alert('Category deleted successfully.');
                                location.reload();
                            } else {
                                alert('Error deleting category.');
                            }
                        })
                        .catch(err => console.error(err));
                }
            }
        });

        // Logout functionality
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Admin_Dashboard/logout"); ?>';
            }
        });
    </script>
    <script>

        document.getElementById('posts-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('posts-submenu').classList.toggle('show');
        });

        // Tab switcher - active class
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
    </script>
</body>

</html>