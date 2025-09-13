<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Post Management</title>
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
      background: var(--dark);
      color: white;
      height: 100vh;
      position: fixed;
      transition: all 0.3s ease;
      z-index: 1000;
      left: 0;
    }

    .sidebar-header {
      padding: 20px;
      background: var(--primary);
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
      color: #fff;
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

    img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
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
      .sidebar {
        transform: translateX(-100%);
        width: var(--sidebar-width);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .main-content {
        margin-left: 0;
        width: 100%;
      }

      .search-container {
        flex-direction: column;
        align-items: stretch;
      }

      .search-box {
        max-width: 100%;
      }

      .pagination {
        flex-wrap: wrap;
      }
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-header">
      <div style="display: flex; align-items: center; gap: 10px;">
        <i class="fas fa-briefcase"></i>
        <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="jobnest" style="height: 40px; width: 100px">
      </div>
    </div>
    <nav class="sidebar-menu">
      <ul>
        <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="<?= base_url('admin/candidate_management') ?>"><i class="fas fa-user-graduate"></i> <span>Candidates</span></a></li>
        <li><a href="<?= base_url('admin/employer_management') ?>"><i class="fas fa-users"></i> <span>Employers</span></a></li>
        <li><a href="<?= base_url('admin/job_post_management') ?>" class="active"><i class="fas fa-file-alt"></i> <span>Job Posts</span></a></li>
        <!-- <li><a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a></li> -->
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
      <h2>Manage Job Posts</h2>

      <!-- Search Box -->
      <div class="search-container">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" id="searchInput" placeholder="Search job posts...">
        </div>
      </div>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Employer ID</th>
            <th>Job Title</th>
            <th>Company</th>
            <th>Industry</th>
            <th>Location</th>
            <th>Employees</th>
            <th>Experience</th>
            <th>Job Type</th>
            <th>Salary</th>
            <!-- <th>Description</th> -->
            <!-- <th>Requirements</th> -->
            <!-- <th>Benefits</th> -->
            <th>Last Date</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="jobPostTableBody">
          <?php if (!empty($job_post)): ?>
            <?php foreach ($job_post as $job_post): ?>
              <tr>
                <td><?= htmlspecialchars($job_post->id) ?></td>
                <td><?= htmlspecialchars($job_post->employer_id) ?></td>
                <td><?= htmlspecialchars($job_post->title) ?></td>
                <td><?= htmlspecialchars($job_post->company) ?></td>
                <td><?= htmlspecialchars($job_post->industry) ?></td>
                <td><?= htmlspecialchars($job_post->location) ?></td>
                <td><?= htmlspecialchars($job_post->employees) ?></td>
                <td><?= htmlspecialchars($job_post->experience) ?></td>
                <td><?= htmlspecialchars($job_post->job_type) ?></td>
                <td><?= htmlspecialchars($job_post->salary) ?></td>
                <!-- <td><?= htmlspecialchars($job_post->description) ?></td>
                <td><?= htmlspecialchars($job_post->requirements) ?></td>
                <td><?= htmlspecialchars($job_post->benefits) ?></td> -->
                <td><?= htmlspecialchars($job_post->last_date) ?></td>
                <td><?= htmlspecialchars($job_post->email) ?></td>
                <td>
                  <button class="btn btn-table btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-table btn-delete" title="Delete"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr class="table-no-recruiters">
              <td colspan="6">No Job Post found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

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
  </div>

  <script>
    const logoutBtn = document.getElementById('logoutBtn');
    logoutBtn.addEventListener('click', function() {
      if (confirm('Are you sure you want to logout?')) {
        window.location.href = '<?= base_url("home"); ?>';
      }
    });

    // Search and Pagination functionality
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchInput');
      const tableBody = document.getElementById('jobPostTableBody');
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
      const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
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
        // Get all existing rows from the table (if any)
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        // Only reinitialize if we have rows and they haven't been processed yet
        if (rows.length > 0 && allRows.length === 0) {
          allRows = rows;
          filteredRows = [...allRows];

          // Show pagination controls
          paginationControls.style.display = 'flex';
          updatePagination();
        } else if (rows.length === 0) {
          // If no rows, display a message
          const noDataRow = document.createElement('tr');
          noDataRow.innerHTML = `<td colspan="12" style="text-align: center;">No job post data available</td>`;
          tableBody.appendChild(noDataRow);
          paginationControls.style.display = 'none';
        }
      }

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
        // If no rows, hide pagination and return
        if (filteredRows.length === 0) {
          paginationControls.style.display = 'none';
          return;
        }

        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

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
        // Hide all rows first
        allRows.forEach(row => row.style.display = 'none');

        // Show rows for current page
        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;

        const pageRows = filteredRows.slice(startIndex, endIndex);
        pageRows.forEach(row => {
          row.style.display = '';
        });

        // Show pagination controls if we have rows
        paginationControls.style.display = pageRows.length > 0 ? 'flex' : 'none';
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
  </script>
</body>

</html>