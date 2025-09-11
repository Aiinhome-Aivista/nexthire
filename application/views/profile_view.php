<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Base Styles */
    * {
      box-sizing: border-box;
      font-family: 'Inter', Arial, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: #f7f8fa;
      color: #222;
    }

    /* New Header Styles */
    .menu-item-underline:hover .menu-underline {
      display: block !important;
    }

    .menu-link {
      position: relative;
      z-index: 2;
    }

    /* Enhanced button hover effects */
    .login-button:hover {
      background-color: #ebf2ff !important;
      box-shadow: 0 2px 4px rgba(48, 120, 231, 0.2);
    }

    .register-button:hover {
      background-color: #e64a19 !important;
      box-shadow: 0 2px 4px rgba(252, 90, 54, 0.3);
      transform: translateY(-1px);
    }

    .login-button {
      cursor: pointer;
    }

    .employer-dropdown {
      position: relative;
      display: inline-block;
    }

    .employer-link {
      color: #27365c;
      font-size: 18px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      padding-bottom: 4px;
      cursor: pointer;
    }

    .caret {
      border: solid #27365c;
      border-width: 0 2px 2px 0;
      display: inline-block;
      padding: 3px;
      transform: rotate(45deg);
      margin-top: 2px;
      transition: transform 0.3s ease;
    }

    .employer-underline {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 3px;
      background: #fc5a36;
      border-radius: 2px;
      transform: scaleX(0);
      transform-origin: center;
      transition: transform 0.3s ease;
    }

    /* Active state underline */
    .employer-dropdown.active .employer-underline {
      transform: scaleX(1);
    }

    .employer-menu {
      display: none;
      position: absolute;
      top: 46px;
      left: 50%;
      transform: translateX(-50%);
      min-width: 180px;
      background: #fff;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      border-radius: 12px;
      padding: 12px 0;
      z-index: 100;
    }

    .employer-menu a {
      display: block;
      padding: 10px 20px;
      color: #27365c;
      font-size: 16px;
      text-decoration: none;
      transition: background 0.2s;
    }

    .employer-menu a:hover {
      background: #f7f8fa;
    }

    /* Active state shows menu */
    .employer-dropdown.active .employer-menu {
      display: block;
    }

    /* Active state flips caret */
    .employer-dropdown.active .caret {
      transform: rotate(-135deg);
    }

    /* Main Container */
    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
      min-height: calc(100vh - 150px);
      /* Adjusted to account for header and footer */
    }

    /* Profile Card */
    .profile-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 900px;
      padding: 40px;
    }

    @media (max-width: 768px) {
      .profile-card {
        padding: 24px;
      }
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 24px;
    }

    .profile-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: #eef4ff;
      color: #1d4ed8;
      font-size: 36px;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .profile-info h1 {
      font-size: 28px;
      font-weight: 600;
      margin: 0;
      color: #1a1a1a;
    }

    .profile-info .contact-details {
      margin-top: 15px;
    }

    .profile-info p {
      font-size: 16px;
      color: #555;
      margin: 8px 0;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .profile-info .icon {
      color: #777;
      font-size: 14px;
    }

    .profile-info a {
      color: #555;
      text-decoration: none;
      font-weight: 400;
      transition: color 0.2s;
    }

    .profile-info a:hover {
      color: #1d4ed8;
    }

    .profile-info .arrow {
      margin-left: 10px;
      font-size: 12px;
      color: #aaa;
    }

    /* Section Styling */
    .section {
      border-top: 1px solid #e8e8e8;
      padding-top: 30px;
      margin-top: 30px;
    }

    .section h2 {
      font-size: 22px;
      font-weight: 600;
      margin-top: 0;
      margin-bottom: 16px;
      color: #1a1a1a;
    }

    .visibility-bar {
      background: #eef4ff;
      color: #1d4ed8;
      padding: 16px 20px;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 24px;
      cursor: pointer;
      transition: background 0.2s;
    }

    .visibility-bar:hover {
      background: #dbe7ff;
    }

    .visibility-bar .icon {
      margin-right: 12px;
    }

    /* Resume Info Card */
    .info-card {
      border: 1px solid #e0e0e0;
      border-radius: 12px;
      padding: 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 12px;
      background: #f9f9f9;
    }

    .info-card-left {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .info-details {
      display: flex;
      flex-direction: column;
    }

    .info-details h4 {
      font-size: 17px;
      font-weight: 500;
      margin: 0;
      color: #1a1a1a;
    }

    .info-details p {
      font-size: 13px;
      color: #888;
      margin: 4px 0 0;
    }

    .pdf-icon {
      width: 48px;
      height: 48px;
      flex-shrink: 0;
    }

    .options-menu {
      position: relative;
    }

    .options-menu-icon {
      color: #aaa;
      cursor: pointer;
      font-size: 22px;
      padding: 8px;
      transition: color 0.2s;
    }

    .options-menu-icon:hover {
      color: #666;
    }

    .options-dropdown {
      display: none;
      /* Initially hidden */
      position: absolute;
      top: 40px;
      right: 0;
      background: #fff;
      border: 1px solid #e0e0e0;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      min-width: 220px;
      z-index: 10;
    }

    .options-dropdown a {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 18px;
      font-size: 15px;
      color: #333;
      text-decoration: none;
      transition: background 0.2s, color 0.2s;
    }

    .options-dropdown a:hover {
      background: #f5f5f5;
      color: #1d4ed8;
    }

    .options-dropdown .icon {
      font-size: 16px;
      color: #888;
    }

    .options-dropdown a:hover .icon {
      color: #1d4ed8;
    }

    /* File Upload Form */
    .file-upload-container {
      padding: 20px;
      border: 2px dashed #e8e8e8;
      border-radius: 12px;
      text-align: center;
      transition: border-color 0.2s;
    }

    .file-upload-container:hover {
      border-color: #1d4ed8;
    }

    .file-upload-container p {
      margin: 0 0 15px;
      color: #888;
    }

    .file-upload-container .file-label {
      display: inline-block;
      background: #1d4ed8;
      color: #fff;
      padding: 12px 24px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      font-size: 15px;
      transition: background 0.2s;
    }

    .file-upload-container .file-label:hover {
      background: #1742b0;
    }

    .file-input {
      display: none;
    }

    /* Footer */
    .footer {
      margin-top: 50px;
      text-align: center;
      padding: 24px 20px 8px;
      background: transparent;
      border-top: 1px solid #e0e0e0;
    }

    .footer-links {
      display: inline-flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 20px;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .footer-links a {
      color: #555;
      text-decoration: none;
      transition: color 0.2s;
      font-weight: 500;
    }

    .footer-links a:hover {
      color: #1d4ed8;
    }

    .footer-copyright {
      font-size: 12px;
      color: #7a86a1;
      margin-top: 5px;
    }

    /* Modal Styles */
    .menu-modal {
      display: none;
      /* Hidden by default */
      position: absolute;
      top: 70px;
      /* Below the header */
      background: #fff;
      padding: 24px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      z-index: 100;
      /* Increased z-index */
      border-radius: 12px;
      width: 700px;
      /* Example width, adjust as needed */
      left: 50%;
      transform: translateX(-50%);
      /* Centers the modal */
    }

    .section {
      margin-top: 20px;
    }

    .info-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #fff;
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 6px;
      transition: background 0.2s ease;
    }

    .info-card:hover {
      background: #f9f9f9;
    }

    .info-details h4 {
      margin: 0;
      font-size: 16px;
      font-weight: 600;
    }

    .info-details p {
      margin: 2px 0 0;
      font-size: 13px;
      color: #666;
    }

    .arrow-link {
      font-size: 20px;
      text-decoration: none;
      color: #333;
    }

    .arrow-link:hover {
      color: #007bff;
    }
  </style>
</head>

<body>

  <header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
    <div
      style="display:flex; align-items:center; justify-content:space-between; padding:0 150px; height:70px; position:relative;">
      <div style="position:relative;">
        <a href="<?= base_url(); ?>">

          <img src="<?= base_url('assets/images/jobnest.png'); ?>"
            style="height:75px; width:auto; display:block; position:absolute; top:-45px; left:0;" alt="jobnest">
        </a>
      </div>
      <nav style="display:flex; align-items:center; gap:24px;">
        <a href="#" class="menu-link" data-modal-target="jobsModal"
          style="color:#27365c; font-size:17px; text-decoration:none;">Jobs</a>
        <a href="#" class="menu-link" data-modal-target="companiesModal"
          style="color:#27365c; font-size:17px; text-decoration:none;">Companies</a>
        <a href="#" class="menu-link" data-modal-target="servicesModal"
          style="color:#27365c; font-size:17px; text-decoration:none;">Services</a>
          <a href="<?= base_url('job_search'); ?>" class="menu-link" data-modal-target="servicesModal"
          style="color:#27365c; font-size:17px; text-decoration:none;">Job Search</a>
      </nav>
    </div>
  </header>

  <div class="container">
    <div class="profile-card">
      <div class="profile-header">
        <div class="profile-avatar">
          <?= isset($user['full_name']) ? substr($user['full_name'], 0, 1) : '?' ?>
        </div>
        <div class="profile-info">
          <h1><?= htmlspecialchars($user['full_name'] ?? 'User Name'); ?></h1>
          <div class="contact-details">
            <p><i class="fas fa-envelope icon"></i><?= htmlspecialchars($user['email'] ?? 'user@example.com'); ?></p>
            <p><i class="fas fa-phone icon"></i>+91 <?= htmlspecialchars($user['mobile_number'] ?? 'N/A'); ?>
              <a href="<?= base_url('profile/edit_contact'); ?>"><i class="fas fa-chevron-right arrow"></i></a>
            </p>
          </div>
        </div>
      </div>

      <div class="section">
        <h2>Resume</h2>
        <?php if (!empty($resume)): ?>
          <div class="info-card">
            <div class="info-card-left"
              style="display:flex; align-items:center; gap:12px; padding:8px 12px; border:1px solid #e0e0e0; border-radius:8px; background:#f9f9f9; margin-bottom:8px;">
              <!-- PDF Icon -->
              <img src="<?= base_url('assets/images/pdf.png'); ?>" alt="PDF icon" class="pdf-icon"
                style="width:40px; height:40px; object-fit:contain;">

              <!-- File Details -->
              <div class="info-details" style="display:flex; flex-direction:column;">
                <h4 style="margin:0; font-size:16px; color:#222;">
                  <?= htmlspecialchars($resume['file_name']); ?>
                </h4>
                <p style="margin:2px 0 0; font-size:13px; color:#555;">
                  Uploaded on <?= date('d M Y', strtotime($resume['uploaded_at'] ?? date('Y-m-d'))); ?>
                </p>
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
          <div class="file-upload-container">
            <p>No resume uploaded. Upload one to get noticed by recruiters! 🚀</p>
            <form action="<?= base_url('profile/upload_resume'); ?>" method="post" enctype="multipart/form-data">
              <label for="file-input" class="file-label">Upload Resume</label>
              <input type="file" name="resume_file" id="file-input" class="file-input" accept=".pdf,.doc,.docx">
              <button type="submit" style="display: none;">Submit</button>
            </form>
          </div>
        <?php endif; ?>
      </div>
      <div class="section">
        <h2>Improve your job matches</h2>

        <div class="info-card">
          <div class="info-details">
            <h4>Qualifications</h4>
            <p>Highlight your skills and experience.</p>
          </div>
          <a href="<?= base_url('profile/qualifications'); ?>" class="arrow-link">›</a>
        </div>

        <div class="info-card">
          <div class="info-details">
            <h4>Job preferences</h4>
            <p>Save specific details like minimum desired pay and schedule.</p>
          </div>
          <a href="<?= base_url('profile/job_preferences'); ?>" class="arrow-link">›</a>
        </div>

        <div class="info-card">
          <div class="info-details">
            <h4>Hide jobs with these details</h4>
            <p>Manage the qualifications or preferences you used to hide jobs from your search.</p>
          </div>
          <a href="<?= base_url('profile/hide_jobs'); ?>" class="arrow-link">›</a>
        </div>

        <div class="info-card">
          <div class="info-details">
            <h4>Ready to work</h4>
            <p>Let employers know that you’re available to start working as soon as possible.</p>
          </div>
          <a href="<?= base_url('profile/ready_to_work'); ?>" class="arrow-link">›</a>
        </div>
      </div>


    </div>
  </div>

  <footer class="footer">
    <div class="footer-links">
      <a href="#">About Us</a>
      <a href="#">Contact Us</a>
      <a href="#">FAQs</a>
      <a href="#">Terms and Conditions</a>
      <a href="#">Privacy Policy</a>
    </div>
    <div class="footer-copyright">
      All rights reserved © <?= date('Y'); ?> Info Edge India Ltd.
    </div>
  </footer>

  <script>
    function showOptions(element) {
      const dropdown = element.nextElementSibling;
      document.querySelectorAll('.options-dropdown').forEach(d => {
        if (d !== dropdown) d.style.display = "none";
      });
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.options-menu')) {
        document.querySelectorAll('.options-dropdown').forEach(d => d.style.display = "none");
      }
    });
    const fileInput = document.getElementById('file-input');
    if (fileInput) fileInput.addEventListener('change', () => fileInput.form.submit());
  </script>

</body>

</html>