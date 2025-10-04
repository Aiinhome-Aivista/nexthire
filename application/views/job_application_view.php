<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Apply for Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .application-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h3 {
            font-weight: 600;
            color: #212529;
        }

        .card-body p {
            margin-bottom: 8px;
            color: #495057;
        }

        .info-item i {
            width: 20px;
            color: #6c757d;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #FFF44F;
            color: black;
            border: none;
            font-weight: 500;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #FFD700;
            color: black;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
        }

        .resume-upload-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .resume-upload-card .btn {
            white-space: nowrap;
        }

        /* New styles for resume view */
        .resume-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: #f9f9f9;
            padding: 8px 12px;
            margin-top: 15px;
        }

        .resume-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pdf-icon {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .resume-details {
            display: flex;
            flex-direction: column;
        }

        .resume-details h4 {
            margin: 0;
            font-size: 16px;
            color: #222;
        }

        .resume-details p {
            margin: 2px 0 0;
            font-size: 13px;
            color: #555;
        }

        .options-menu {
            position: relative;
        }

        .options-menu-icon {
            cursor: pointer;
            padding: 8px;
            color: #6c757d;
        }

        .options-dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 8px;
            min-width: 150px;
            padding: 8px 0;
        }

        .options-dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }

        .options-dropdown a:hover {
            background-color: #f1f1f1;
        }

        .options-dropdown a i {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="application-container">
        <div class="card">
            <div class="card-header">
                <h3>Job Details</h3>
            </div>
            <div class="card-body">
                <?php if (isset($job)): ?>
                    <h4><?= htmlspecialchars($job['title']) ?></h4>
                    <p><strong>Company:</strong> <?= htmlspecialchars($job['company']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
                    <p><strong>Experience:</strong> <?= htmlspecialchars($job['experience']) ?></p>
                <?php else: ?>
                    <p>Job details not found.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Your Information</h3>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            <div class="card-body">
                <?php if (isset($user)): ?>
                    <p><strong>Full Name:</strong> <?= htmlspecialchars($user['full_name'] ?? $user['name'] ?? 'N/A') ?></p>
                    <p><strong>Work Status:</strong> <?= htmlspecialchars($user['work_status'] ?? 'N/A') ?></p>
                    <p><strong>Mobile Number:</strong> <?= htmlspecialchars($user['mobile_number'] ?? 'N/A') ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <?php else: ?>
                    <p>User details not found. Please <a href="<?= base_url('login') ?>">login</a>.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Educational & Work Experience</h3>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editEducationModal">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            <div class="card-body">
                <h5>Education</h5>
                <?php if (!empty($education)): ?>
                    <?php foreach ($education as $edu): ?>
                        <p><strong>School:</strong> <?= htmlspecialchars($edu['school_name']) ?></p>
                        <p><strong>Degree:</strong> <?= htmlspecialchars($edu['degree']) ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No educational details found.</p>
                <?php endif; ?>

                <h5 class="mt-4">Work Experience</h5>
                <?php if (!empty($experience)): ?>
                    <?php foreach ($experience as $exp): ?>
                        <p><strong>Job Title:</strong> <?= htmlspecialchars($exp['job_title']) ?></p>
                        <p><strong>Company:</strong> <?= htmlspecialchars($exp['company_name']) ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No work experience found.</p>
                <?php endif; ?>

                <h5 class="mt-4">Skills</h5>
                <?php if (!empty($skills)): ?>
                    <p><?= htmlspecialchars(implode(', ', array_column($skills, 'skill_name'))) ?></p>
                <?php else: ?>
                    <p>No skills found.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header resume-upload-card">
                <h3>Resume</h3>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadResumeModal">
                    <i class="fas fa-upload"></i> Upload/Update Resume
                </button>
            </div>
            <div class="card-body">
                <?php if (isset($resume)): ?>
                    <div class="resume-container">
                        <div class="resume-info">
                            <!-- <img src="<?php //base_url('assets/images/pdf.png'); ?>" alt="PDF icon" class="pdf-icon"> -->
                            <img src="<?= base_url('../All_Uploads/images/pdf.png'); ?>" alt="PDF icon" class="pdf-icon">
                            <div class="resume-details">
                                <h4><?= htmlspecialchars($resume['file_name']); ?></h4>
                                <p>Uploaded on <?= date('d M Y', strtotime($resume['uploaded_at'] ?? date('Y-m-d'))); ?></p>
                            </div>
                        </div>
                        <div class="options-menu">
                            <i class="fas fa-ellipsis-h options-menu-icon" onclick="showOptions(this)"></i>
                            <div class="options-dropdown">
                                <a href="<?= base_url('profile/view_resume/' . $resume['doc_id']); ?>"><i
                                        class="fas fa-file-alt icon"></i> View</a>
                                <a href="<?= base_url('profile/download_resume/' . $resume['doc_id']); ?>"><i
                                        class="fas fa-download icon"></i> Download</a>
                                <a href="<?= base_url('profile/delete_resume/' . $resume['doc_id']); ?>"><i
                                        class="fas fa-trash-alt icon"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p>No resume uploaded yet.</p>
                <?php endif; ?>
            </div>
        </div>


        <div class="text-center mt-4">
            <form action="<?= base_url('candidate_jobsearch/apply_job') ?>" method="post">
                <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                <?php if (isset($has_applied) && $has_applied): ?>
                    <button type="button" class="btn btn-success btn-lg" disabled>
                        <i class="fas fa-check"></i> Applied
                    </button>
                <?php else: ?>
                    <button type="submit" class="btn btn-lg" style="background-color: #FFF44F; color: black;">
                        Apply Now
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('candidate_jobsearch/update_user_info') ?>" method="post">
                    <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                    <input type="hidden" name="user_type" value="<?= $user_type ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit Your Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="user[full_name]"
                                value="<?= htmlspecialchars($user['full_name'] ?? $user['name'] ?? '') ?>"
                                <?= $user_type == 'google' ? 'disabled' : '' ?>>
                        </div>
                        <div class="mb-3">
                            <label for="workStatus" class="form-label">Work Status</label>
                            <input type="text" class="form-control" id="workStatus" name="user[work_status]"
                                value="<?= htmlspecialchars($user['work_status'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mobileNumber" class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" id="mobileNumber" name="user[mobile_number]"
                                value="<?= htmlspecialchars($user['mobile_number'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="user[email]"
                                value="<?= htmlspecialchars($user['email']) ?>" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEducationModal" tabindex="-1" aria-labelledby="editEducationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('candidate_jobsearch/update_education') ?>" method="post">
                    <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEducationModalLabel">Edit Education & Experience</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Education</h6>
                        <div class="mb-3">
                            <label for="school" class="form-label">School Name</label>
                            <input type="text" class="form-control" id="school" name="education[school_name]"
                                value="<?= htmlspecialchars($education[0]['school_name'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="text" class="form-control" id="degree" name="education[degree]"
                                value="<?= htmlspecialchars($education[0]['degree'] ?? '') ?>">
                        </div>
                        <hr>
                        <h6>Work Experience</h6>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="experience[job_title]"
                                value="<?= htmlspecialchars($experience[0]['job_title'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" name="experience[company_name]"
                                value="<?= htmlspecialchars($experience[0]['company_name'] ?? '') ?>">
                        </div>
                        <hr>
                        <h6>Skills</h6>
                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills (comma-separated)</label>
                            <input type="text" class="form-control" id="skills" name="skills[skill_name]"
                                value="<?= htmlspecialchars(implode(', ', array_column($skills, 'skill_name'))) ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadResumeModal" tabindex="-1" aria-labelledby="uploadResumeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('candidate_jobsearch/upload_resume') ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadResumeModalLabel">Upload/Update Resume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="resumeFile" class="form-label">Select Resume File (PDF, DOC, DOCX)</label>
                            <input class="form-control" type="file" id="resumeFile" name="resume_file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showOptions(icon) {
            const dropdown = icon.nextElementSibling;
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const dropdowns = document.querySelectorAll('.options-dropdown');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target) && !event.target.classList.contains(
                    'options-menu-icon')) {
                    dropdown.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>