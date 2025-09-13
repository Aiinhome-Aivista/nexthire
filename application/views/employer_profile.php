<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jobnest | Employer Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f5f7fa;
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
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/jobnest2.png'); ?>" alt="JobNest">
        <a href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>"><i class="fas fa-file-alt me-2"></i> Post Job</a>
        <a href="<?= base_url('employer_manage_jobs'); ?>"><i class="fas fa-briefcase me-2"></i> Manage Jobs</a>
        <a href="<?= base_url('employer_manage_candidates'); ?>"><i class="fas fa-user-graduate me-2"></i>
            Candidates</a>
        <a href="<?= base_url('employer_profile'); ?>" class="active"><i class="fas fa-building"></i> Employer
            Profile</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body text-center p-5">

                            <!-- Profile Avatar -->
                            <?php if (!empty($employer['picture'])): ?>
                                <!-- If picture exists -->
                                <img src="<?= base_url('uploads/employers/' . $employer['picture']); ?>"
                                    alt="Profile Picture" class="rounded-circle mb-3 border border-3 border-primary"
                                    width="130" height="130">
                            <?php else: ?>
                                <!-- If no picture, show first letter avatar -->
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 border border-3"
                                    style="width: 80px; height: 80px; background: #fca911d4; color: #fff; font-size: 28px; font-weight: bold;">
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
                            <a href="<?= base_url('employer/edit-profile'); ?>"
                                class="btn btn-primary mt-4 px-4 rounded-pill"
                                style="background-color: #fca911d4; color: #000000; border-color: #fca911d4; ">
                                <i class="fas fa-edit me-2"></i> Edit Profile
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer>
            &copy; 2025 Jobnest Inc. All Rights Reserved.
        </footer>
    </div>
</body>

</html>