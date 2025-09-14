<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SahajJobs | Employer Manage Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
            margin-top: 240px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="JobNest">
        <a href="<?= base_url('employer_dashboard'); ?>"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>"><i class="fas fa-file-alt me-2"></i> Post Job</a>
        <a href="<?= base_url('employer_manage_jobs'); ?>" class="active"><i class="fas fa-briefcase me-2"></i> Manage
            Jobs</a>
        <a href="<?= base_url('employer_manage_candidates'); ?>"><i class="fas fa-user-graduate me-2"></i>
            Candidates</a>
        <a href="<?= base_url('employer_profile'); ?>"><i class="fas fa-building"></i> Employer Profile</a>
        <a href="#" id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
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
            <!-- Search Bar -->
            <div class="mb-3 d-flex justify-content-between">
                <input type="text" id="jobSearch" class="form-control w-25" placeholder="Search job posts...">
            </div>

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
                <tbody id="jobTable">
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
                                    <button class="btn btn-table btn-edit" data-id="<?= $job->id; ?>"
                                        data-employer="<?= $job->employer_id; ?>" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-table btn-delete" data-id="<?= $job->id; ?>"
                                        data-employer="<?= $job->employer_id; ?>" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Showing <?= $start + 1; ?> - <?= min($start + $per_page, $total_jobs); ?> of <?= $total_jobs; ?> job
                posts
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=1">First</a>
                    </li>
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a>
                    </li>
                    <li class="page-item active">
                        <span class="page-link"><?= $page; ?></span>
                    </li>
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page + 1; ?>">Next</a>
                    </li>
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $total_pages; ?>">Last</a>
                    </li>
                </ul>
            </nav>
        </div>

        <footer>
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>

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

    </div>

    <!-- Search Script -->
    <script>
        document.getElementById("jobSearch").addEventListener("keyup", function () {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#jobTable tr");
            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
            });
        });
    </script>

    <script>
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function () {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Employer_controller/logout"); ?>';
            }
        });
    </script>

    <script>
        document.querySelectorAll(".btn-edit").forEach(btn => {
            btn.addEventListener("click", function () {
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


        document.getElementById("editJobForm").addEventListener("submit", function (e) {
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
            btn.addEventListener("click", function () {
                let jobId = this.getAttribute("data-id");
                let employerId = this.getAttribute("data-employer");

                if (confirm("Are you sure you want to delete this job?")) {
                    fetch("<?= base_url('Employer_controller/delete_job'); ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({ id: jobId, employer_id: employerId })
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