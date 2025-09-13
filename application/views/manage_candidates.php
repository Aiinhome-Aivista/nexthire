<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SahajJobs | Employer Manage Candidates</title>
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
        <a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase me-2"></i> Manage Jobs</a>
        <a href="<?= base_url('employer_manage_candidates'); ?>" class="active"><i
                class="fas fa-user-graduate me-2"></i> Candidates</a>
        <a href="<?= base_url('employer_profile'); ?>"><i class="fas fa-building"></i> Employer Profile</a>
        <a href="#" id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold" style="color: #fca911;">Manage Candidates</h4>
        </div>

        <?php
        // Pagination setup
        $per_page = 5;
        $total_candidates = count($candidates);
        $total_pages = ceil($total_candidates / $per_page);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1)
            $page = 1;
        if ($page > $total_pages)
            $page = $total_pages;

        $start = ($page - 1) * $per_page;
        $paged_candidates = array_slice($candidates, $start, $per_page);
        ?>

        <div class="table-responsive">
            <!-- Search Bar -->
            <div class="mb-3 d-flex justify-content-between">
                <input type="text" id="candidateSearch" class="form-control w-25" placeholder="Search candidates...">
            </div>

            <table class="table table-hover table-bordered align-middle shadow-sm">
                <thead class="text-center">
                    <tr>
                        <th>Sl No.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Work Status</th>
                        <th>Registered On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="candidateTable">
                    <?php if (!empty($paged_candidates)) {
                        $i = $start + 1;
                        foreach ($paged_candidates as $candidate) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><strong><?= $candidate->full_name; ?></strong></td>
                                <td><?= $candidate->email; ?></td>
                                <td><?= $candidate->mobile_number; ?></td>
                                <td><?= $candidate->work_status; ?></td>
                                <td><?= date('d-M-Y', strtotime($candidate->created_at)); ?></td>
                                <td class="text-center">
                                    <button class="btn btn-table btn-edit" title="Edit" data-id="<?= $candidate->id; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-table btn-delete" title="Delete" data-id="<?= $candidate->id; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>

                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">No candidates found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Showing <?= $start + 1; ?> - <?= min($start + $per_page, $total_candidates); ?> of
                <?= $total_candidates; ?> candidates
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
            &copy; 2025 Jobnest Inc. All Rights Reserved.
        </footer>

        <!-- Edit Candidate Modal -->
        <div class="modal fade" id="editCandidateModal" tabindex="-1" aria-labelledby="editCandidateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCandidateModalLabel">Edit Candidate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="editCandidateForm">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="candidate_id">

                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="full_name" id="full_name">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="mb-3">
                                <label>Mobile</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile_number">
                            </div>

                            <div class="mb-3">
                                <label>Work Status</label>
                                <input type="text" class="form-control" name="work_status" id="work_status">
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
        document.getElementById("candidateSearch").addEventListener("keyup", function () {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#candidateTable tr");
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
        // Open edit modal with candidate data
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.dataset.id;
                fetch("<?= base_url('Employer_controller/get_candidate'); ?>/" + id)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById("candidate_id").value = data.id;
                        document.getElementById("full_name").value = data.full_name;
                        document.getElementById("email").value = data.email;
                        document.getElementById("mobile_number").value = data.mobile_number;
                        document.getElementById("work_status").value = data.work_status;

                        new bootstrap.Modal(document.getElementById("editCandidateModal")).show();
                    });
            });
        });

        // Submit Edit Form
        document.getElementById("editCandidateForm").addEventListener("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            fetch("<?= base_url('Employer_controller/update_candidate'); ?>", {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(response => {
                    alert(response.message);
                    location.reload();
                });
        });

        // Delete Candidate
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function () {
                if (confirm("Are you sure you want to delete this candidate?")) {
                    let id = this.dataset.id;
                    fetch("<?= base_url('Employer_controller/delete_candidate'); ?>/" + id, {
                        method: "POST"
                    })
                        .then(res => res.json())
                        .then(response => {
                            alert(response.message);
                            location.reload();
                        });
                }
            });
        });

    </script>
</body>

</html>