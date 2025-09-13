<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Jobnest | Employer Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

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
      /* padding: 16px 0; */
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .header-content {
      width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: left;
      position: relative;
    }

    .logo {
      display: flex;
      align-items: right;
      gap: 100px;
    }

    .logo img {
      width: auto;
      height: 70px;
      display: block;
    }

    .logo span {
      font-size: 2rem;
      font-weight: 700;
      color: #1d4ed8;
      letter-spacing: -1px;
    }

    .signup-link {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
      font-size: 15px;
      color: #666;
    }

    .signup-link a {
      color: #7b7a6e;
      text-decoration: none;
      font-weight: 900;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin-top: 40px;
      min-height: 80vh;
      gap: 40px;
    }

    .left-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
      padding: 40px 30px 30px 30px;
      width: 320px;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 420px;
      position: sticky;
      top: 32px;
      z-index: 2;
    }

    .left-card img {
      width: 213px;
      height: 90px;
      margin-bottom: 16px;
      border-radius: 50%;
      object-fit: cover;
      background: #f2f3f8;
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
      width: 600px;
      min-width: 320px;
      padding: 36px 48px;
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

    .footer {
      margin-top: 50px;
      text-align: center;
      padding: 24px 0 8px 0;
      background: transparent;
    }

    .footer-links {
      display: inline-flex;
      align-items: center;
      gap: 26px;
      font-size: 12px;
      margin-bottom: 8px;
      color: #1d4ed8;
    }

    .footer-links a {
      color: #1d4ed8;
      text-decoration: none;
      transition: color 0.15s;
    }

    .footer-links a:hover {
      text-decoration: underline;
      color: #1742b0;
    }

    .footer-links .divider {
      width: 1px;
      height: 16px;
      background: #dbe7ff;
      margin: 0 8px;
      display: inline-block;
    }

    .footer-copyright {
      font-size: 12px;
      color: #7a86a1;
    }

    @media (max-width: 800px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .form-card {
        width: 90vw;
        padding: 32px 8vw;
      }

      .left-card {
        margin-bottom: 32px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <div class="header-content">
      <div class="logo">
        <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="Jobnest">
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
      <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="jobnest">
      <h3>Recruiter Benefits</h3>
      <ul>
        <li><span class="green-dot"></span>Hire from India's No.1 Job Site</li>
        <li><span class="green-dot"></span>Find verified & active candidates</li>
        <li><span class="green-dot"></span>Boost your employer branding</li>
      </ul>
    </div>

    <!-- Form Card -->
    <div class="form-card">
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

        <div class="form-group">
          <label for="password">Password<span style="color:#e42e2e;">*</span></label>
          <input type="password" name="password" id="password" placeholder="Enter your password" required>
          <span id="toggle-password" style="position:absolute; top:57px; right:15px; cursor:pointer;">
            <i class="far fa-eye"></i>
          </span>
        </div>
        <small id="password-error" class="text-danger" style="display:none; font-size: 0.85em;">Please enter
          your password</small>
        <button type="submit" class="login-btn">Login</button>

        <div class="forgot-row">
          <a href="#">Forgot Password?</a>
        </div>

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
  <div class="footer" style="width:300px; margin:40px auto 0 auto;">
    <div class="footer-links">
      <a href="#">About Us</a>
      <span class="divider"></span>
      <a href="#">Contact Us</a>
      <span class="divider"></span>
      <a href="#">FAQs</a>
      <span class="divider"></span>
      <a href="#">Terms and Conditions</a>
      <span class="divider"></span>
      <a href="#">Privacy Policy</a>
    </div>
    <div class="footer-copyright">
      All rights reserved © 2025 Info Edge India Ltd.
    </div>
  </div>
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

  </script>
  <script>
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
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        pwd.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });

  </script>
</body>

</html>