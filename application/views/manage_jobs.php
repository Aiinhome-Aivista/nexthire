<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jobnest | Employer Manage Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f5f7fa;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #c9c9c9;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            height: 100%;
        }


        .sidebar img {
            display: block;
            margin: 0 0 30px;
        }

        .sidebar a {
            color: #000000;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 8px;
            display: block;
            margin-bottom: 8px;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #fca911d4;
        }

        /* Content */
        .content {
            margin-left: 280px;
            padding: 30px;
            flex: 1;
        }

        /* Table Styling */
        .table th {
            background: #f0f4ff;
            color: #fca911d4;
            font-weight: 600;
            text-transform: uppercase;
        }

        .table th,
        .table td {
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .table-hover tbody tr:hover {
            background: #fff6e0;
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

        /* Pagination */
        .pagination .page-link {
            color: #1e1e2c;
        }

        .pagination .active .page-link {
            background-color: #fca911;
            border-color: #fca911;
            color: #1e1e2c;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
            margin-top: 300px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/jobnest2.png'); ?>" alt="JobNest">
        <a href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>"><i class="fas fa-file-alt me-2"></i> Post Job</a>
        <a href="<?= base_url('employer_manage_jobs'); ?>" class="active"><i class="fas fa-briefcase me-2"></i> Manage
            Jobs</a>
        <a href="<?= base_url('employer_manage_candidates'); ?>"><i class="fas fa-user-graduate me-2"></i>
            Candidates</a>
        <a href="<?= base_url('employer_profile'); ?>"><i class="fas fa-building"></i> Employer Profile</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold" style="color: #fca911;">Manage Jobs</h4>
            <a href="<?= base_url('employer_job_post'); ?>" class="btn btn-warning text-dark">
                <i class="fas fa-plus me-1"></i> Post New Job
            </a>
        </div>

        <?php
        // Pagination setup
        $per_page = 5; // jobs per page
        $total_jobs = count($jobs);
        $total_pages = ceil($total_jobs / $per_page);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1)
            $page = 1;
        if ($page > $total_pages)
            $page = $total_pages;

        $start = ($page - 1) * $per_page;
        $paged_jobs = array_slice($jobs, $start, $per_page);
        ?>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm">
                <thead class="text-center">
                    <tr>
                        <th>Sl No.</th>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Job Type</th>
                        <th>Salary</th>
                        <th>Last Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($paged_jobs)) {
                        $i = $start + 1;
                        foreach ($paged_jobs as $job) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><strong><?= $job->title; ?></strong></td>
                                <td><?= $job->company; ?></td>
                                <td><?= $job->location; ?></td>
                                <td><?= $job->job_type; ?></td>
                                <td><?= $job->salary; ?></td>
                                <td><?= $job->last_date; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-table btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-table btn-delete" title="Delete"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">No jobs found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                    <li class="page-item <?= ($p == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $p; ?>"><?= $p; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1; ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <footer>
            &copy; 2025 Jobnest Inc. All Rights Reserved.
        </footer>
    </div>
</body>

</html>