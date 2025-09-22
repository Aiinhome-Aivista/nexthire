<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SahajJobs | Employer Login</title>
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

    .header {
      width: 100%;
      background: #fff;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      padding: 10px 20px;
    }

    .header-content {
      width: 100%;
      max-width: 1200px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: auto;
      height: 50px;
      display: block;
    }

    .signup-link {
      font-size: 15px;
      color: #666;
    }

    .signup-link a {
      color: #7b7a6e;
      text-decoration: none;
      font-weight: 900;
    }

    .menu-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #1d4ed8;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 40px auto;
      min-height: 80vh;
      gap: 40px;
      width: 100%;
      max-width: 1200px;
      padding: 0 20px;
      flex-wrap: wrap;
    }

    .left-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
      padding: 30px 20px;
      width: 100%;
      max-width: 320px;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 40px;
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
      align-items: center;
      gap: 8px;
      color: #222;
    }

    .left-card ul li .green-dot {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #38b200;
      display: inline-block;
      margin-right: 4px;
      position: relative;
      flex-shrink: 0;
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
      max-width: 600px;
      min-width: 320px;
      padding: 30px;
      display: flex;
      flex-direction: column;
      min-height: 420px;
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

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      font-size: 15px;
      font-weight: 500;
      color: #0c0c0c;
    }

    .form-group input {
      padding: 13px 18px;
      font-size: 16px;
      border: 1.5px solid #808080;
      border-radius: 8px;
      outline: none;
      background: #fff;
      transition: border 0.2s;
      width: 100%;
    }

    .form-group input:focus {
      border: 1.5px solid #808080;
      background: #fff;
    }

    .login-btn {
      margin-top: 16px;
      background: #FFF44F;
      color: #29374d;
      font-weight: 600;
      font-size: 17px;
      border-radius: 30px;
      border: none;
      padding: 13px 0;
      width: 200px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(29, 78, 216, 0.04);
      transition: background 0.2s;
    }

    .login-btn:hover {
      background: #d3c830ff;
    }

    .forgot-row {
      margin-top: 12px;
      font-size: 14px;
      color: #666;
    }

    .forgot-row a {
      color: #1b212b;
      text-decoration: none;
      font-weight: 500;
    }

    .google-section {
      margin-top: 28px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .or-text {
      font-size: 14px;
      color: #666;
      margin: 12px 0;
      font-weight: 500;
    }

    .text-danger {
      color: red;
    }

    .input-error {
      border: 1px solid red !important;
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
      width: 220px;
      justify-content: center;
    }

    .google-btn:hover {
      background: #f8f9fa;
    }

    .google-btn img {
      width: 18px;
      height: 18px;
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

    /* Responsive styles */
    @media (max-width: 992px) {
      .container {
        gap: 30px;
      }

      .left-card,
      .form-card {
        max-width: 100%;
      }
    }

    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 10px;
      }

      .signup-link {
        position: static;
        transform: none;
        text-align: center;
      }

      .container {
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
      }

      .left-card {
        max-width: 500px;
        margin-bottom: 20px;
      }

      .form-card {
        padding: 20px;
      }

      .login-btn {
        width: 100%;
      }
    }

    @media (max-width: 576px) {
      .header {
        padding: 10px;
      }

      .logo img {
        height: 40px;
      }

      .form-card {
        padding: 15px;
      }

      .google-btn {
        width: 100%;
      }
    }

    @media (max-width: 400px) {

      .left-card,
      .form-card {
        min-width: unset;
      }

      .form-title {
        font-size: 20px;
      }

      .form-group input {
        padding: 10px 15px;
        font-size: 14px;
      }

      .login-btn {
        font-size: 16px;
        padding: 10px 0;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <div class="header-content">
      <div class="logo">
        <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
      </div>
      <div class="signup-link">
        New Recruiter? <a href="<?= base_url('employer_register'); ?>">Register</a> here
      </div>
    </div>
  </div>

  <!-- Main Container -->
  <div class="container">
    <!-- Left Card -->
    <div class="left-card">
      <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
      <h3>Recruiter Benefits</h3>
      <ul>
        <li><span class="green-dot"></span>Hire from India's No.1 Job Site</li>
        <li><span class="green-dot"></span>Find verified & active candidates</li>
        <li><span class="green-dot"></span>Boost your employer branding</li>
      </ul>
    </div>

    <!-- Form Card -->
    <div class="form-card">
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('success') ?>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?>
      <div class="form-title">Recruiter Login</div>
      <div class="form-subtitle">Access your dashboard and start hiring</div>

      <form class="emplogin-form" action="<?= base_url('recruiter_login/submit'); ?>" method="post" novalidate
        autocomplete="off">
        <div class="form-group">
          <label for="email">Official Email ID<span style="color:#e42e2e;">*</span></label>
          <input type="email" name="email" id="email" placeholder="Enter your company email" required>
        </div>
        <small id="email-error" class="text-danger" style="display:none; font-size: 0.85em;">Please enter a
          valid email (must include .com)</small>

        <!-- <div class="form-group">
          <label for="password">Password<span style="color:#e42e2e;">*</span></label>
          <input type="password" name="password" id="password" placeholder="Enter your password" required>
          <span id="toggle-password" style="position:absolute; top:42px; right:15px; cursor:pointer;">
            <i class="far fa-eye"></i>
          </span>
        </div>
        <small id="password-error" class="text-danger" style="display:none; font-size: 0.85em;">Please enter
          your password</small>
        <button type="submit" class="login-btn">Login</button>

        <div class="forgot-row" style="margin-top: 4px; text-align: right; width: 100%;">
          <a href="#">Forgot Password?</a>
        </div> -->
        <div class="form-group" style="position:relative;">
          <label for="password">Password<span style="color:#e42e2e;">*</span></label>
          <input type="password" name="password" id="password" placeholder="Enter your password" required>
          <span id="toggle-password" style="position:absolute; top:42px; right:15px; cursor:pointer;">
            <i class="far fa-eye-slash"></i>
          </span>
          <div class="forgot-row" style="margin-top:4px; text-align:right; width:100%;">
            <a href="#" style="color:#1b212b; text-decoration:none; font-weight:500;">Forgot Password?</a>
          </div>
        </div>
        <small id="password-error" class="text-danger" style="display:none; font-size: 0.85em;">Please enter your
          password</small>
        <button type="submit" class="login-btn">Login</button>

        <!-- Google Login -->
        <div class="google-section">
          <div class="or-text">Or</div>
          <button type="button" class="google-btn" id="googleSignInBtn">
            <img src="<?= base_url('assets/images/google.png'); ?>" alt="google">
            Continue with Google
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php $this->load->view('includes/footer'); ?>

  <script>
    document.getElementById('googleSignInBtn').addEventListener('click', function () {
      var provider = new firebase.auth.GoogleAuthProvider();
      firebase.auth().signInWithPopup(provider)
        .then(function (result) {
          var user = result.user;

          // Send user info to CodeIgniter backend
          fetch('<?= base_url('recruiter_login/google_callback') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
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
                window.location.href = '<?= base_url('recruiter_dashboard') ?>';
              } else {
                alert('Login failed: ' + data.message);
              }
            });
        })
        .catch(function (error) {
          alert(error.message);
        });
    });

    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    document.querySelector('.emplogin-form').addEventListener('submit', function (event) {
      let isValid = true;

      // Reset errors
      emailError.style.display = 'none';
      passwordError.style.display = 'none';
      emailInput.classList.remove('input-error');
      passwordInput.classList.remove('input-error');

      const emailVal = emailInput.value.trim();
      const pwdVal = passwordInput.value.trim();

      // Email validation
      if (!emailVal || emailVal.indexOf('.com') === -1) {
        emailError.style.display = 'block';
        emailError.textContent = 'Please enter a valid email (must include .com)';
        emailInput.classList.add('input-error');
        isValid = false;
      }

      // Password validation
      if (!pwdVal) {
        passwordError.style.display = 'block';
        passwordError.textContent = 'Please enter your password';
        passwordInput.classList.add('input-error');
        isValid = false;
      } else if (pwdVal.length < 6) {
        passwordError.style.display = 'block';
        passwordError.textContent = 'Password must be at least 6 characters';
        passwordInput.classList.add('input-error');
        isValid = false;
      }

      if (!isValid) {
        event.preventDefault();
      }
    });

    // Live email validation on input
    emailInput.addEventListener('input', function () {
      const val = emailInput.value.trim();
      if (val.includes('.com')) {
        emailError.style.display = 'none';
        emailInput.classList.remove('input-error');
      } else {
        emailError.style.display = 'block';
        emailError.textContent = 'Please enter a valid email (must include .com)';
        emailInput.classList.add('input-error');
      }
    });

    // Live password validation on input
    passwordInput.addEventListener('input', function () {
      const val = passwordInput.value.trim();
      if (val.length >= 6) {
        passwordError.style.display = 'none';
        passwordInput.classList.remove('input-error');
      } else {
        passwordError.style.display = 'block';
        passwordError.textContent = 'Password must be at least 6 characters';
        passwordInput.classList.add('input-error');
      }
    });

    // Password toggle code remains same
    document.getElementById('toggle-password').addEventListener('click', function () {
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
  </script>
</body>

</html>