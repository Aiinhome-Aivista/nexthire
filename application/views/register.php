<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SahajJobs | Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Firebase SDK (compat version for v8 style) -->
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
  <script>
    // Your Firebase config
    const firebaseConfig = {
      apiKey: "AIzaSyArPK3Lb2xtZXeBXWXCq4_g4BopsjpNrN0",
      authDomain: "jobnest-1353e.firebaseapp.com",
      projectId: "jobnest-1353e",
      storageBucket: "jobnest-1353e.firebasestorage.app",
      messagingSenderId: "649093243578",
      appId: "1:649093243578:web:8f9745abeacc310a229883",
      measurementId: "G-SXWKWBFB8P"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Nunito', Arial, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: #f7f8fa;
      color: #222;
    }

    .spinner {
      border: 3px solid #f3f3f3;
      /* Light gray */
      border-top: 3px solid #555;
      /* Darker gray */
      border-radius: 50%;
      width: 18px;
      height: 18px;
      animation: spin 1s linear infinite;
      display: inline-block;
      margin-left: 8px;
      vertical-align: middle;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .header {
      width: 100%;
      background: #fff;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
      padding: 10px 0;
      position: relative;
      z-index: 100;
    }

    .header-content {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      position: relative;
    }

    .logo img {
      width: auto;
      height: 60px;
      display: block;
    }

    .login-link {
      font-size: 14px;
      color: #666;
      white-space: nowrap;
    }

    .login-link a {
      color: #7b7a6e;
      text-decoration: none;
      font-weight: 900;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
      margin: 30px auto;
      padding: 0 20px;
      gap: 30px;
      max-width: 1300px;
      position: relative;
    }

    .left-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
      padding: 30px 25px;
      width: 100%;
      max-width: 320px;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: sticky;
      top: 100px;
      height: fit-content;
      max-height: calc(100vh - 120px);
      overflow-y: auto;
    }

    .left-card img {
      width: 180px;
      height: auto;
      margin-bottom: 16px;
    }

    .left-card h3 {
      font-size: 20px;
      font-weight: 600;
      text-align: left;
      width: 100%;
      margin-bottom: 18px;
    }

    .left-card ul {
      list-style: none;
      padding: 0;
      margin: 0;
      width: 100%;
    }

    .left-card ul li {
      font-size: 16px;
      margin-bottom: 14px;
      display: flex;
      align-items: flex-start;
      gap: 8px;
      color: #222;
      line-height: 1.4;
    }

    .left-card ul li .green-dot {
      min-width: 16px;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #38b200;
      display: inline-block;
      margin-right: 4px;
      position: relative;
      flex-shrink: 0;
      margin-top: 3px;
    }

    .left-card ul li .green-dot::before {
      content: '✔';
      color: #fff;
      position: absolute;
      left: 2px;
      top: -1px;
      font-size: 13px;
      font-weight: bold;
    }

    .form-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
      width: 100%;
      max-width: 900px;
      padding: 30px;
      position: relative;
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .form-title {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .form-subtitle {
      font-size: 14px;
      color: #666;
      margin-bottom: 28px;
    }

    .form-row {
      display: flex;
      gap: 24px;
      align-items: flex-start;
      position: relative;
    }

    .form-fields {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 22px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
      position: relative;
    }

    .form-group label {
      font-size: 15px;
      font-weight: 500;
      color: #1b212b;
      margin-bottom: 1px;
    }

    .form-group input {
      padding: 13px 18px;
      font-size: 16px;
      border: 1px solid #808080;
      border-radius: 8px;
      outline: none;
      background: #fff;
      transition: border 0.2s;
    }

    .form-group input:focus {
      border: 1px solid #808080;
      background: #fff;
    }

    .form-group .input-hint {
      font-size: 13px;
      color: #8a95ad;
      margin-top: 2px;
    }

    .form-group input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-right: 6px;
    }

    .work-status-group {
      display: flex;
      gap: 18px;
      margin-top: 4px;
      flex-wrap: wrap;
    }

    .work-status-card {
      border: 1.5px solid #d7dbe3;
      border-radius: 12px;
      padding: 18px 20px;
      background: #f7f8fa;
      cursor: pointer;
      flex: 1;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: border 0.2s, box-shadow 0.2s;
      font-size: 15px;
      position: relative;
      min-width: 180px;
    }

    .work-status-card.selected {
      border: 2px solid #FFF44F;
      background: #eef4ff;
      box-shadow: 0 2px 8px rgba(29, 78, 216, 0.08);
    }

    .work-status-card .icon {
      width: 28px;
      height: 28px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      border: 1.5px solid #e1e6ef;
      flex-shrink: 0;
    }

    .work-status-card .info {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .work-status-card .info .title {
      font-weight: 600;
      color: #222;
      font-size: 15px;
    }

    .work-status-card .info .desc {
      font-size: 13px;
      color: #8a95ad;
    }

    .checkbox-row {
      margin-top: 16px;
      display: flex;
      align-items: flex-start;
      gap: 4px;
    }

    .checkbox-row label {
      font-size: 15px;
      color: #222;
      font-weight: 400;
      margin-left: 3px;
      cursor: pointer;
      line-height: 1.4;
    }

    .terms-row {
      font-size: 13px;
      color: #8a95ad;
      margin-top: 20px;
      line-height: 1.5;
    }

    .terms-row a {
      color: #1d4ed8;
      text-decoration: none;
      margin: 0 2px;
    }

    .register-btn {
      margin-top: 24px;
      background: #FFF44F;
      color: #29374d;
      font-weight: 600;
      font-size: 17px;
      border-radius: 30px;
      border: none;
      padding: 13px 0;
      width: 170px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(29, 78, 216, 0.04);
      transition: background 0.2s;
    }

    .register-btn:hover {
      background: #d3c830ff;
    }

    /* Fixed Google section styles */
    .google-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      width: 200px;
      position: relative;
      padding-left: 24px;
      margin-left: 24px;
    }

    .or-text {
      font-size: 14px;
      color: #666;
      margin-bottom: 12px;
      font-weight: 500;
    }

    .continue-text {
      font-size: 15px;
      color: #222;
      font-weight: 500;
      margin-bottom: 12px;
    }

    .google-btn {
      border: 1px solid #FFF44F;
      border-radius: 8px;
      background: white;
      color: #3078E7;
      font-weight: 500;
      font-size: 14px;
      padding: 10px 16px;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      transition: background 0.2s;
      width: 100%;
      justify-content: center;
    }

    .google-btn:hover {
      background: #f8f9fa;
    }

    .google-btn img {
      width: 18px;
      height: 18px;
    }

    .toggle-password-eye {
      position: absolute;
      top: 35px;
      right: 16px;
      cursor: pointer;
      z-index: 2;
      display: flex;
      align-items: center;
      height: 38px;
    }


    .error-msg {
      color: red;
      font-size: 0.85em;
      display: none;
    }

    /* Alert styles */
    .alert {
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .alert-success {
      background: #d4edda;
      color: #155724;
    }

    .alert-danger {
      background: #f8d7da;
      color: #721c24;
    }

    .modal-error .modal-title {
      color: #721c24;
    }

    .modal-error {
      border-left: 4px solid #dc3545;
    }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      border-radius: 8px;
      width: 90%;
      max-width: 400px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    .modal-close {
      position: absolute;
      right: 15px;
      top: 10px;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
      color: #666;
    }

    .modal-close:hover {
      color: #000;
    }

    .modal-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .modal-success .modal-title {
      color: #155724;
    }

    .modal-message {
      font-size: 14px;
      line-height: 1.5;
    }

    .modal-success {
      border-left: 4px solid #28a745;
    }


    /* Responsive styles */
    @media (max-width: 1100px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .left-card {
        max-width: 100%;
        position: static;
        margin-bottom: 20px;
        top: 0;
        height: auto;
      }

      .form-card {
        max-width: 100%;
      }

      .google-section {
        width: 100%;
        margin-left: 0;
        padding-left: 0;
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid #e8e8e8;
        border-left: none;
      }
    }

    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }

      .logo {
        justify-content: center;
      }

      .form-card {
        padding: 20px;
      }

      .form-row {
        flex-direction: column;
        gap: 0;
      }

      .work-status-group {
        flex-direction: column;
      }

      .work-status-card {
        width: 100%;
      }

      .google-section {
        margin-top: 20px;
      }


      .register-btn {
        margin-left: auto;
        margin-right: auto;
        display: block;
      }
    }

    @media (max-width: 480px) {
      .header {
        padding: 8px 0;
      }

      .logo img {
        height: 50px;
      }

      .login-link {
        font-size: 13px;
      }

      .container {
        margin-top: 20px;
        padding: 0 15px;
        gap: 20px;
      }

      .left-card {
        padding: 20px;
      }

      .left-card h3 {
        font-size: 18px;
      }

      .left-card ul li {
        font-size: 14px;
      }

      .form-card {
        padding: 15px;
      }

      .form-title {
        font-size: 20px;
      }

      .form-group input {
        padding: 10px 38px 10px 15px;
        font-size: 15px;
      }

      .toggle-password-eye {
        right: 10px;
        top: 32px;
        height: 34px;
      }

      .work-status-card {
        padding: 15px;
      }

      .register-btn {
        width: 100%;
        max-width: 200px;
      }
    }

    @media (min-width: 481px) {
      .form-group input[type="password"] {
        padding-right: 42px;
      }
    }
  </style>
</head>

<body>
  <div class="header">
    <div class="header-content">
      <div class="logo">
        <a href="<?= base_url(); ?>">
          <!-- <img src="<?php //base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2"> -->
          <img src="<?= base_url('../All_Uploads/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
        </a>
      </div>
      <div class="login-link">
        Already Registered? <a href="<?= base_url(); ?>?showLogin=true">Login</a> here
      </div>
    </div>
  </div>
  <div class="container">
    <div class="left-card">
      <!-- <img src="<?php //base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2"> -->
      <img src="<?= base_url('../All_Uploads/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
      <h3>On registering, you can</h3>
      <ul>
        <li><span class="green-dot"></span>Build your profile and let recruiters find you</li>
        <li><span class="green-dot"></span>Get job postings delivered right to your email</li>
        <li><span class="green-dot"></span>Find a job and grow your career</li>
      </ul>
    </div>
    <div class="form-card">
      <!-- Flash Messages -->
      <!-- <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"
          style="padding: 10px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 20px;">
          <?= $this->session->flashdata('success') ?>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"
          style="padding: 10px; background: #f8d7da; color: #721c24; border-radius: 4px; margin-bottom: 20px;">
          <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?> -->
      <div class="form-title">Create your Sahaj Job profile</div>
      <div class="form-subtitle">Search & apply to jobs from India's No.1 Job Site</div>
      <form id="registration-form" action="<?= base_url('register/submit'); ?>" method="post">
        <div class="form-row">
          <div class="form-fields">
            <div class="form-group">
              <label for="fullname">Full name<span style="color:#e42e2e;">*</span></label>
              <input type="text" name="fullname" id="fullname" placeholder="Full name is your name?">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
            </div>
            <div class="form-group">
              <label for="email">Email ID<span style="color:#e42e2e;">*</span></label>
              <input type="email" name="email" id="email" placeholder="Tell us your Email ID" style="flex: 1;">
              <!-- <div class="email-verification-container" style="display: flex; align-items: center; gap: 10px;">
                <input type="email" name="email" id="email" placeholder="Tell us your Email ID" style="flex: 1;">
                <button type="button" id="verify-email-btn" class="verify-email-btn"
                  style="background: #f0f0f0; border: 1px solid #ccc; border-radius: 4px; padding: 8px 12px; font-size: 14px; cursor: pointer; white-space: nowrap;">Verify
                  Email</button>
                <span id="email-verified" class="email-verified"
                  style="color: #38b200; font-weight: 600; display: none;">
                  <i class="fas fa-check-circle"></i> Verified
                </span>
              </div> -->
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
              <span class="input-hint">We'll send relevant jobs and updates to this email</span>
              <!-- <input type="hidden" id="email_verified_status" name="email_verified" value="0"> -->
            </div>
            <div class="form-group" style="position:relative;">
              <label for="password">Password<span style="color:#e42e2e;">*</span></label>
              <input type="password" name="password" id="password" placeholder="(Minimum 6 characters)">
              <span id="toggle-password" class="toggle-password-eye">
                <i class="far fa-eye-slash"></i>
              </span>
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
              <span class="input-hint">This helps your account stay protected</span>
            </div>
            <div class="form-group">
              <label for="mobile">Mobile number<span style="color:#e42e2e;">*</span></label>
              <input type="tel" name="mobile" id="mobile" placeholder="+91 Enter your mobile number">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
              <span class="input-hint">Recruiters will contact you on this number</span>
            </div>
            <div class="form-group">
              <label>Work status<span style="color:#e42e2e;">*</span></label>
              <div class="work-status-group">
                <div class="work-status-card selected" id="experienced" onclick="selectStatus('experienced')">
                  <span class="icon">💼</span>
                  <div class="info">
                    <span class="title">I'm experienced</span>
                    <span class="desc">I have work experience <br>(excluding internships)</span>
                  </div>
                  <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
                </div>
                <div class="work-status-card" id="fresher" onclick="selectStatus('fresher')">
                  <span class="icon">🎓</span>
                  <div class="info">
                    <span class="title">I'm a fresher</span>
                    <span class="desc">I am a student/ Haven't worked <br>after graduation</span>
                  </div>
                </div>
              </div>
              <input type="hidden" name="workStatus" id="workStatus" value="experienced">
            </div>
            <div class="checkbox-row">
              <input type="checkbox" id="updates">
              <label for="updates">Send me important updates & promotions via email, and <img
                  src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"
                  style="width:18px;vertical-align:middle;margin-left:2px;"> WhatsApp</label>
            </div>
            <div class="terms-row">
              By clicking Register, you agree to the
              <a href="<?= base_url('terms-and-conditions'); ?>">Terms and Conditions</a> &
              <a href="<?= base_url('privacy-policy'); ?>">Privacy Policy</a> of SahajJob.com
            </div>
            <button type="submit" class="register-btn">Register now</button>
          </div>
        </div>
      </form>
      <!-- Fixed Google Section -->
      <center>
        <div class="google-section">
          <div class="or-text">Or</div>
          <div class="continue-text">Continue with</div>
          <button id="googleSignInBtn" class="google-btn">
            <!-- <img src="<?php //base_url('assets/images/google.png'); ?>" alt="google"> -->
            <img src="<?= base_url('../All_Uploads/images/google.png'); ?>" alt="google">
            Google
          </button>
        </div>
      </center>
    </div>
  </div>
  <!-- Flash Message Modal -->
  <div id="flashModal" class="modal">
    <div class="modal-content" id="modalContent">
      <span class="modal-close" id="modalClose">&times;</span>
      <div class="modal-title" id="modalTitle"></div>
      <div class="modal-message" id="modalMessage"></div>
    </div>
  </div>
  <?php $this->load->view('includes/footer'); ?>
  <script>
    function selectStatus(status) {
      document.getElementById('experienced').classList.remove('selected');
      document.getElementById('fresher').classList.remove('selected');
      document.getElementById(status).classList.add('selected');
      document.getElementById('workStatus').value = status;
    }
  </script>
  <script>
    document.getElementById('googleSignInBtn').addEventListener('click', function () {
      var provider = new firebase.auth.GoogleAuthProvider();
      firebase.auth().signInWithPopup(provider)
        .then(function (result) {
          var user = result.user;

          // Send user info to CodeIgniter backend
          fetch('<?= base_url('register/google_callback') ?>', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              uid: user.uid,
              full_name: user.displayName,
              email: user.email,
              picture: user.photoURL,
              provider: 'google'
            })
          })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                window.location.href = '<?= base_url('profile') ?>';
              } else {
                showFlashModal('error', 'Login failed: ' + data.message);
              }
            });
        })
        .catch(function (error) {
          showFlashModal('error', error.message);
        });
    });
  </script>
  <!-- <script>
    // Check if email is verified from URL parameter
    // document.addEventListener('DOMContentLoaded', function () {
    //   const urlParams = new URLSearchParams(window.location.search);
    //   const emailVerified = urlParams.get('verified');
    //   const email = urlParams.get('email');

    //   if (emailVerified === '1' && email) {
    //     const emailInput = document.getElementById('email');
    //     if (emailInput.value === email) {
    //       showEmailVerified();
    //     } else {
    //       emailInput.value = email;
    //       showEmailVerified();
    //     }
    //   }
    // });

    function showEmailVerified() {
      document.getElementById('email-verified').style.display = 'flex';
      document.getElementById('verify-email-btn').style.display = 'none';
      document.getElementById('email_verified_status').value = '1';
    }

    // Email verification button handler
    document.getElementById('verify-email-btn').addEventListener('click', function () {
      const email = document.getElementById('email').value.trim();

      if (!email) {
        alert('Please enter your email address first');
        return;
      }

      // Simple email validation
      if (!(email.includes('.') && email.includes('com'))) {
        alert('Please enter a valid email address');
        return;
      }

      // Button ar original text save kore rakhbo spinner er jonno
      const button = this;
      const originalText = button.innerHTML;

      button.disabled = true;
      button.innerHTML = 'Sending <span class="spinner"></span>';



      // // Show loading state
      // const originalText = this.textContent;
      // this.textContent = 'Sending...';
      // this.disabled = true;

      // Send verification email request
      // fetch('<?= base_url('register/send_verification_email') ?>', {
      //   method: 'POST',
      //   headers: {
      //     'Content-Type': 'application/x-www-form-urlencoded',
      //   },
      //   body: 'email=' + encodeURIComponent(email)
      // })
      //   .then(response => response.json())
      //   .then(data => {
      //     if (data.success) {
      //       alert('Verification email sent! Please check your inbox.');
      //     } else {
      //       alert('Error: ' + data.message);
      //     }
      //   })
      //   .catch(error => {
      //     alert('Error sending verification email');
      //     console.error('Error:', error);
      //   })
      //   .finally(() => {
      //     // Restore button state
      //     this.textContent = originalText;
      //     this.disabled = false;
      //   });


      // startPollingEmailVerification(email);


      fetch('<?= base_url('register/send_verification_email') ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'email=' + encodeURIComponent(email)
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Verification email sent! Please check your inbox.');
            startPollingEmailVerification(email, button, originalText); // Polling starts here on success only
          } else {
            alert('Error: ' + data.message);
            button.disabled = false;
            button.innerHTML = originalText;
          }
        })
        .catch(error => {
          alert('Error sending verification email');
          console.error('Error:', error);
          button.disabled = false;
          button.innerHTML = originalText;
        });

      // Remove this unconditional startPollingEmailVerification(email);

    });
    function startPollingEmailVerification(email, button, originalText) {
      const interval = setInterval(() => {
        fetch('<?= base_url('register/check_email_verification') ?>?email=' + encodeURIComponent(email))
          .then(res => res.json())
          .then(data => {
            if (data.verified) {
              clearInterval(interval);
              showEmailVerified();
              button.style.display = 'none';
            }
          });
      }, 5000);
    }
    function showEmailVerified() {
      document.getElementById('email-verified').style.display = 'flex';
      document.getElementById('verify-email-btn').style.display = 'none';
      document.getElementById('email_verified_status').value = '1';
    }
    // Email verification code
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('registration-form');
      const fields = [{
        id: 'fullname',
        name: 'Full name'
      },
      {
        id: 'email',
        name: 'Email ID'
      },
      {
        id: 'password',
        name: 'Password'
      },
      {
        id: 'mobile',
        name: 'Mobile number'
      },
      ];

      // Validation function (used for both submit and input)
      function validateField(field, value) {
        if (!value) {
          return `${field.name} is required.`;
        } else {
          if (field.id === 'email') {
            if (!(value.includes('.') && value.includes('com'))) {
              return 'Email must contain .com';
            }
          }
          if (field.id === 'password') {
            if (value.length < 6) {
              return 'Password must be at least 6 characters.';
            }
          }
          if (field.id === 'mobile') {
            if (!/^[0-9]{10}$/.test(value)) {
              return 'Mobile number must be exactly 10 digits.';
            }
          }
        }
        return '';
      }

      // Validate on submit
      form.addEventListener('submit', function (e) {
        let isValid = true;

        fields.forEach(field => {
          const input = document.getElementById(field.id);
          const errorSpan = input.parentElement.querySelector('.error-msg');
          const value = input.value.trim();
          const message = validateField(field, value);

          // Reset previous
          input.style.borderColor = '#808080';
          errorSpan.style.display = 'none';
          errorSpan.textContent = '';

          if (message) {
            isValid = false;
            input.style.borderColor = 'red';
            errorSpan.style.display = 'block';
            errorSpan.textContent = message;
          }
        });

        // Check if email is verified
        const emailVerified = document.getElementById('email_verified_status').value;
        if (emailVerified === '0') {
          isValid = false;
          alert('Please verify your email address before submitting the form.');
        }

        if (!isValid) {
          e.preventDefault();
        }
      });

      // Real-time validation on input
      fields.forEach(field => {
        const input = document.getElementById(field.id);
        const errorSpan = input.parentElement.querySelector('.error-msg');
        input.addEventListener('input', function () {
          const value = input.value.trim();
          const message = validateField(field, value);
          if (message) {
            input.style.borderColor = 'red';
            errorSpan.style.display = 'block';
            errorSpan.textContent = message;
          } else {
            input.style.borderColor = '#808080';
            errorSpan.style.display = 'none';
            errorSpan.textContent = '';
          }
        });
      });
    });
    // Password toggle code remains the same
    document.getElementById('toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const pwd = passwordInput;
      const icon = this.querySelector('i');
      if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      } else {
        pwd.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      }
    });
  </script> -->
  <script>
    // function showEmailVerified() {
    //   document.getElementById('email-verified').style.display = 'flex';
    //   document.getElementById('verify-email-btn').style.display = 'none';
    //   document.getElementById('email_verified_status').value = '1';
    // }

    // Function to start polling backend for email verification status
    // function startPollingEmailVerification(email, button, originalText) {
    //   const interval = setInterval(() => {
    //     fetch('<?= base_url('register/check_email_verification') ?>?email=' + encodeURIComponent(email))
    //       .then(res => res.json())
    //       .then(data => {
    //         if (data.verified) {
    //           clearInterval(interval);
    //           showEmailVerified();
    //           if (button) button.style.display = 'none';
    //         }
    //       });
    //   }, 5000);
    // }

    document.addEventListener('DOMContentLoaded', function () {
      // const emailInput = document.getElementById('email');
      // const verifyBtn = document.getElementById('verify-email-btn');

      // // Start polling immediately if email field already has a value (user refresh or revisit)
      // if (emailInput.value.trim() !== '') {
      //   startPollingEmailVerification(emailInput.value.trim(), verifyBtn);
      // }

      // Form validation and handling as before...
      const form = document.getElementById('registration-form');
      const fields = [
        { id: 'fullname', name: 'Full name' },
        { id: 'email', name: 'Email ID' },
        { id: 'password', name: 'Password' },
        { id: 'mobile', name: 'Mobile number' },
      ];

      function validateField(field, value) {
        if (!value) {
          return `${field.name} is required.`;
        } else {
          if (field.id === 'email') {
            if (!(value.includes('.') && value.includes('com'))) {
              return 'Email must contain .com';
            }
          }
          if (field.id === 'password') {
            if (value.length < 6) {
              return 'Password must be at least 6 characters.';
            }
          }
          if (field.id === 'mobile') {
            if (!/^[0-9]{10}$/.test(value)) {
              return 'Mobile number must be exactly 10 digits.';
            }
          }
        }
        return '';
      }

      form.addEventListener('submit', function (e) {
        let isValid = true;

        fields.forEach(field => {
          const input = document.getElementById(field.id);
          const errorSpan = input.parentElement.querySelector('.error-msg');
          const value = input.value.trim();
          const message = validateField(field, value);

          input.style.borderColor = '#808080';
          errorSpan.style.display = 'none';
          errorSpan.textContent = '';

          if (message) {
            isValid = false;
            input.style.borderColor = 'red';
            errorSpan.style.display = 'block';
            errorSpan.textContent = message;
          }
        });

        // const emailVerified = document.getElementById('email_verified_status').value;
        // if (emailVerified === '0') {
        //   isValid = false;
        //   alert('Please verify your email address before submitting the form.');
        // }

        // if (!isValid) {
        //   e.preventDefault();
        // }
      });

      fields.forEach(field => {
        const input = document.getElementById(field.id);
        const errorSpan = input.parentElement.querySelector('.error-msg');
        input.addEventListener('input', function () {
          const value = input.value.trim();
          const message = validateField(field, value);
          if (message) {
            input.style.borderColor = 'red';
            errorSpan.style.display = 'block';
            errorSpan.textContent = message;
          } else {
            input.style.borderColor = '#808080';
            errorSpan.style.display = 'none';
            errorSpan.textContent = '';
          }
        });
      });
    });

    // Email verification button click handler
    // document.getElementById('verify-email-btn').addEventListener('click', function () {
    //   const email = document.getElementById('email').value.trim();

    //   if (!email) {
    //     alert('Please enter your email address first');
    //     return;
    //   }

    //   if (!(email.includes('.') && email.includes('com'))) {
    //     alert('Please enter a valid email address');
    //     return;
    //   }

    //   const button = this;
    //   const originalText = button.innerHTML;

    //   button.disabled = true;
    //   button.innerHTML = 'Sending <span class="spinner"></span>';

    //   fetch('<?= base_url('register/send_verification_email') ?>', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    //     body: 'email=' + encodeURIComponent(email)
    //   })
    //     .then(response => response.json())
    //     .then(data => {
    //       if (data.success) {
    //         alert('Verification email sent! Please check your inbox.');
    //         startPollingEmailVerification(email, button, originalText); // Start polling after success
    //       } else {
    //         alert('Error: ' + data.message);
    //         button.disabled = false;
    //         button.innerHTML = originalText;
    //       }
    //     })
    //     .catch(error => {
    //       alert('Error sending verification email');
    //       console.error('Error:', error);
    //       button.disabled = false;
    //       button.innerHTML = originalText;
    //     });
    // });

    // Password toggle handler remains unchanged
    document.getElementById('toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const icon = this.querySelector('i');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      }
    });

  </script>
  <script>
    // Show flash messages in modal
    document.addEventListener('DOMContentLoaded', function () {
      <?php if ($this->session->flashdata('success')): ?>
        showFlashModal('success', '<?= $this->session->flashdata('success') ?>');
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        showFlashModal('error', '<?= $this->session->flashdata('error') ?>');
      <?php endif; ?>

      function showFlashModal(type, message) {
        const modal = document.getElementById('flashModal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');

        // Set modal content based on type
        if (type === 'success') {
          modalTitle.textContent = 'Success';
          modalContent.classList.add('modal-success');
        } else {
          modalTitle.textContent = 'Error';
          modalContent.classList.add('modal-error');
        }

        modalMessage.textContent = message;
        modal.style.display = 'block';

        // Auto close after 5 seconds
        setTimeout(() => {
          modal.style.display = 'none';
        }, 15000);
      }

      // Close modal when clicking close button
      document.getElementById('modalClose').addEventListener('click', function () {
        document.getElementById('flashModal').style.display = 'none';
      });

      // Close modal when clicking outside
      window.addEventListener('click', function (event) {
        const modal = document.getElementById('flashModal');
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });
  </script>
</body>

</html>