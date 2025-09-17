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
      top: 39px;
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
          <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
        </a>
      </div>
      <div class="login-link">
        Already Registered? <a href="<?= base_url(); ?>?showLogin=true">Login</a> here
      </div>
    </div>
  </div>
  <div class="container">
    <div class="left-card">
      <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
      <h3>On registering, you can</h3>
      <ul>
        <li><span class="green-dot"></span>Build your profile and let recruiters find you</li>
        <li><span class="green-dot"></span>Get job postings delivered right to your email</li>
        <li><span class="green-dot"></span>Find a job and grow your career</li>
      </ul>
    </div>
    <div class="form-card">
      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('success')): ?>
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
      <?php endif; ?>
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
              <input type="email" name="email" id="email" placeholder="Tell us your Email ID">
              <span class="error-msg" style="color:red; font-size:0.85em; display:none;"></span>
              <span class="input-hint">We'll send relevant jobs and updates to this email</span>
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
            <img src="<?= base_url('assets/images/google.png'); ?>" alt="google">
            Google
          </button>
        </div>
      </center>
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
                alert('Registration failed: ' + data.message);
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
  </script>
</body>

</html>