<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Employer Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: #f5f7fa;
            font-family: 'Nunito', Arial, sans-serif;

        }

        /* Sidebar */
        .sidebar {
            width: 300px;
            background: #c9c9c9;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            height: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
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
            background: #FFF44F;
        }

        /* Sidebar Toggle Button */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background: #FFF44F;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
        }

        /* Content */
        .content {
            margin-left: 280px;
            padding: 30px;
            flex: 1;
            transition: all 0.3s ease;
        }

        /* Table Styling */
        .table th {
            background: #f0f4ff;
            color: #FFF44F;
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
            margin-top: 20px;
        }

        /* Profile Avatar Responsive */
        .profile-avatar {
            width: 130px;
            height: 130px;
        }

        /* Responsive Styles */
        @media (max-width: 1199.98px) {
            .sidebar {
                width: 250px;
            }

            .content {
                margin-left: 230px;
            }
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 220px;
            }

            .content {
                margin-left: 200px;
                padding: 20px;
            }
        }

        @media (max-width: 767.98px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .sidebar-toggle {
                display: block;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 575.98px) {
            .card-body {
                padding: 1.5rem !important;
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Toggle Button for Mobile -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="JobNest">
        <a href="<?= base_url('employer_dashboard'); ?>"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>"><i class="fas fa-file-alt me-2"></i> Post Job</a>
        <a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase me-2"></i> Manage Jobs</a>
        <a href="<?= base_url('employer_manage_candidates'); ?>"><i class="fas fa-user-graduate me-2"></i>
            Candidates</a>
        <a href="<?= base_url('employer_profile'); ?>" class="active"><i class="fas fa-building"></i> Employer
            Profile</a>
        <a href="#" id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
    </div>

    <!-- Content -->
    <div class="content" id="content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body text-center p-5">

                            <!-- Profile Avatar -->
                            <?php if (!empty($employer['picture'])): ?>
                                <!-- If picture exists -->
                                <img src="<?= base_url('uploads/employers/' . $employer['picture']); ?>"
                                    alt="Profile Picture"
                                    class="rounded-circle mb-3 border border-3 border-primary profile-avatar">
                            <?php else: ?>
                                <!-- If no picture, show first letter avatar -->
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 border border-3 profile-avatar"
                                    style="background: #FFF44F; color: #fff; font-size: 28px; font-weight: bold;">
                                    <?= strtoupper(substr($employer['full_name'], 0, 1)); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Name & Designation -->
                            <h3 class="fw-bold mb-0"><?= $employer['full_name']; ?></h3>
                            <p class="text-muted"><?= $employer['designation']; ?> @ <?= $employer['company']; ?></p>

                            <hr class="my-4">

                            <!-- Profile Info -->
                            <div class="row text-start px-4">
                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-envelope text-warning me-2"></i>
                                    <strong>Email:</strong> <?= $employer['email']; ?>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-phone text-warning me-2"></i>
                                    <strong>Mobile:</strong> <?= $employer['mobile_number']; ?>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-calendar-alt text-warning me-2"></i>
                                    <strong>Joined On:</strong>
                                    <?= date("d M Y", strtotime($employer['created_at'])); ?>
                                </div>
                            </div>


                            <!-- Edit Profile Button -->
                            <button type="button" class="btn btn-primary mt-4 px-4 rounded-pill"
                                style="background-color: #FFF44F; color: #000000; border-color: #FFF44F;"
                                data-bs-toggle="modal" data-bs-target="#editProfileModal"
                                data-id="<?= $employer['id']; ?>">
                                <i class="fas fa-edit me-2"></i> Edit Profile
                            </button>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer>
            &copy; 2025 SahajJobs Inc. All Rights Reserved.
        </footer>

        <!-- Edit Profile Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileLabel">Edit Employer Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editProfileForm">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="employer_id">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" id="designation" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <input type="text" name="company" id="company" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" name="mobile_number" id="mobile_number" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background:#FFF44F; color:#29374d;">Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Sidebar toggle functionality
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        sidebarToggle.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickInsideToggle = sidebarToggle.contains(event.target);

            if (window.innerWidth < 768 && !isClickInsideSidebar && !isClickInsideToggle && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Logout functionality
        const logoutBtn = document.getElementById('logoutBtn');
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '<?= base_url("Employer_controller/logout"); ?>';
            }
        });

        // Profile edit modal functionality
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('[data-bs-target="#editProfileModal"]').forEach(button => {
                button.addEventListener("click", function () {
                    let employerId = this.getAttribute("data-id");

                    fetch("<?= base_url('Employer_controller/getEmployerById'); ?>/" + employerId)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("employer_id").value = data.id;
                            document.getElementById("full_name").value = data.full_name;
                            document.getElementById("designation").value = data.designation;
                            document.getElementById("company").value = data.company;
                            document.getElementById("email").value = data.email;
                            document.getElementById("mobile_number").value = data.mobile_number;
                        })
                        .catch(err => console.error("Error fetching data:", err));
                });
            });

            // Handle form submission
            document.getElementById("editProfileForm").addEventListener("submit", function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                fetch("<?= base_url('Employer_controller/updateEmployer'); ?>", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.text())
                    .then(result => {
                        alert("Profile updated successfully!");
                        location.reload();
                    })
                    .catch(err => console.error("Error updating:", err));
            });
        });
    </script>

</body>

</html>