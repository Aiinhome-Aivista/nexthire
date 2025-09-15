<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SahajJobs | Employer Registration</title>
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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .header {
      width: 100%;
      background: #fff;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
      padding: 10px 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .header-content {
      width: 100%;
      max-width: 1200px;
      padding: 0 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    .logo img {
      width: auto;
      height: 60px;
      display: block;
    }

    .login-link {
      font-size: 15px;
      color: #666;
      text-align: right;
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
      flex: 1;
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
      order: 1;
    }

    .left-card img {
      width: 200px;
      height: 50px;
      margin-bottom: 16px;
      object-fit: cover;
    }

    .left-card h3 {
      font-size: 18px;
      font-weight: 600;
      text-align: left;
      width: 100%;
      margin-bottom: 16px;
    }

    .left-card ul {
      list-style: none;
      padding: 0;
      margin: 0;
      width: 100%;
    }

    .left-card ul li {
      font-size: 14px;
      margin-bottom: 12px;
      display: flex;
      align-items: flex-start;
      gap: 8px;
      color: #222;
      line-height: 1.4;
    }

    .left-card ul li .green-dot {
      flex-shrink: 0;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #38b200;
      display: inline-block;
      position: relative;
      margin-top: 2px;
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
      order: 2;
    }

    .form-title {
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .form-subtitle {
      font-size: 14px;
      color: #666;
      margin-bottom: 25px;
    }

    .form-row {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form-fields {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .form-group label {
      font-size: 14px;
      font-weight: 500;
      color: #0c0c0c;
      margin-bottom: 1px;
    }

    .form-group input {
      padding: 12px 15px;
      font-size: 15px;
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

    .form-group .input-hint {
      font-size: 12px;
      color: #8a95ad;
      margin-top: 2px;
    }

    .form-group input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-right: 6px;
    }

    .checkbox-row {
      margin-top: 16px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .checkbox-row label {
      font-size: 14px;
      color: #222;
      font-weight: 400;
      margin-left: 3px;
      cursor: pointer;
    }

    .terms-row {
      font-size: 12px;
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
      font-size: 16px;
      border-radius: 30px;
      border: none;
      padding: 12px 0;
      width: 100%;
      max-width: 200px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(29, 78, 216, 0.04);
      transition: background 0.2s;
    }

    .register-btn:hover {
      background: #d3c830ff;
    }

    /* Google section styles */
    .google-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      width: 100%;
      position: relative;
      padding-top: 25px;
      margin-top: 25px;
      border-top: 1px solid #e8e8e8;
    }

    .error-msg {
      color: red;
      font-size: 0.85em;
      display: none;
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
      max-width: 200px;
      justify-content: center;
    }

    .google-btn:hover {
      background: #f8f9fa;
    }

    .google-btn img {
      width: 18px;
      height: 18px;
    }

    /* Footer Styles */
    .footer {
      margin-top: 40px;
      text-align: center;
      padding: 20px 0;
      font-family: 'Nunito', Arial, sans-serif;
      background: transparent;
      width: 100%;
    }

    .footer-content {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .footer-links {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 10px;
      font-size: 12px;
      margin-bottom: 8px;
      color: #1d4ed8;
    }

    .footer-links a {
      color: #1d4ed8;
      text-decoration: none;
      transition: color 0.15s;
      font-weight: 400;
      white-space: nowrap;
    }

    .footer-links a:hover {
      text-decoration: underline;
      color: #1742b0;
    }

    .footer-links .divider {
      width: 1px;
      height: 12px;
      background: #dbe7ff;
      display: inline-block;
      vertical-align: middle;
    }

    .footer-copyright {
      font-size: 12px;
      color: #7a86a1;
      margin-top: 1px;
      font-weight: 400;
      letter-spacing: 0.01em;
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

    /* Media Queries for Responsiveness */
    @media (min-width: 768px) {
      .header-content {
        padding: 0 30px;
      }

      .container {
        padding: 0 30px;
        gap: 40px;
      }

      .form-card {
        padding: 36px 48px;
      }

      .form-row {
        flex-direction: row;
      }

      .google-section {
        width: 200px;
        padding-left: 24px;
        margin-left: 24px;
        padding-top: 0;
        margin-top: 0;
        border-top: none;
        border-left: 1px solid #e8e8e8;
      }


    }

    @media (min-width: 992px) {
      .left-card {
        position: sticky;
        top: 32px;
        order: 1;
      }

      .form-card {
        order: 2;
        flex: 1;
        min-width: 60%;
      }

      .container {
        flex-wrap: nowrap;
        align-items: flex-start;
      }
    }

    @media (max-width: 480px) {
      .header-content {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }

      .login-link {
        position: static;
        transform: none;
      }

      .left-card,
      .form-card {
        border-radius: 10px;
      }

      .form-title {
        font-size: 20px;
      }

      .footer-links {
        flex-direction: column;
        gap: 5px;
      }

      .footer-links .divider {
        display: none;
      }

      .register-btn {
        align-self: center;
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
      <div class="login-link">
        Already Registered? <a href="<?= base_url('employer_login'); ?>">Login</a> here
      </div>
    </div>
  </div>

  <!-- Main Container -->
  <div class="container">
    <!-- Left Card -->
    <div class="left-card">
      <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
      <h3>As a recruiter, you can</h3>
      <ul>
        <li><span class="green-dot"></span>Post jobs and reach millions of job seekers</li>
        <li><span class="green-dot"></span>Find candidates with relevant experience</li>
        <li><span class="green-dot"></span>Build your employer brand</li>
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
      <div class="form-title">Create your Recruiter account</div>
      <div class="form-subtitle">Hire from India's No.1 Job Site</div>

      <form id="emp_registration-form" action="<?= base_url('recruiter/submit'); ?>" method="post">
        <div class="form-row">
          <div class="form-fields">

            <div class="form-group">
              <label for="fullname">Your Name<span style="color:#e42e2e;">*</span></label>
              <input type="text" name="fullname" id="fullname" placeholder="Enter your full name">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
            </div>

            <div class="form-group">
              <label for="email">Official Email ID<span style="color:#e42e2e;">*</span></label>
              <input type="email" name="email" id="email" placeholder="Enter your company email">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
              <span class="input-hint">Use your company domain email (e.g. hr@company.com)</span>
            </div>

            <div class="form-group">
              <label for="company">Company Name<span style="color:#e42e2e;">*</span></label>
              <input type="text" name="company" id="company" placeholder="Enter company name">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
            </div>

            <div class="form-group">
              <label for="designation">Designation<span style="color:#e42e2e;">*</span></label>
              <input type="text" name="designation" id="designation" placeholder="e.g. HR Manager, Recruiter">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
            </div>

            <div class="form-group">
              <label for="password">Password<span style="color:#e42e2e;">*</span></label>
              <input type="password" name="password" id="password" placeholder="Minimum 6 characters">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>

            </div>

            <div class="form-group">
              <label for="mobile">Mobile Number<span style="color:#e42e2e;">*</span></label>
              <input type="tel" name="mobile" id="mobile" placeholder="+91 Enter your mobile number">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
              <span class="input-hint">We'll contact you for verification</span>
            </div>

            <div class="checkbox-row">
              <input type="checkbox" id="updates">
              <label for="updates">Send me important updates & promotions via Email / WhatsApp</label>
            </div>

            <div class="terms-row">
              By clicking Register, you agree to the
              <a href="#">Terms and Conditions</a> &
              <a href="#">Privacy Policy</a> of SahajJobs
            </div>

            <button type="submit" class="register-btn">Register as Recruiter</button>
          </div>

          <!-- Google Section -->
          <div class="google-section">
            <div class="or-text">Or</div>
            <div class="continue-text">Continue with</div>
            <button type="button" class="google-btn" id="googleSignInBtn">
              <img src="<?= base_url('assets/images/google.png'); ?>" alt="google">
              Google
            </button>
          </div>
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
          fetch('<?= base_url('recruiter/google_callback') ?>', {
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

    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('emp_registration-form');
      const fields = [
        { id: 'fullname', name: 'Full name' },
        { id: 'email', name: 'email' },
        { id: 'password', name: 'Password' },
        { id: 'mobile', name: 'Mobile number' },
        { id: 'company', name: 'Company name' },
        { id: 'designation', name: 'Designation' }
      ];

      // Validation function (used for both submit and input)
      function validateField(field, value) {
        if (!value) {
          return `${field.name} is required.`;
        } else {
          if (field.id === 'email') {
            if (!(value.includes('.') && value.includes('com'))) {
              // value.includes('@') && 
              // return 'Email must contain @, . and com';
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


  </script>
</body>

</html>