<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Jobnest | Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
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
      font-family: 'Inter', Arial, sans-serif;
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

    .login-link {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
      font-size: 15px;
      color: #666;
    }

    .login-link a {
      color: #1d4ed8;
      text-decoration: none;
      font-weight: 500;
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
      width: 120px;
      height: 120px;
      margin-bottom: 16px;
      border-radius: 50%;
      object-fit: cover;
      background: #f2f3f8;
      border: 2px solid #eee;
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
      width: 900px;
      min-width: 320px;
      padding: 36px 48px 36px 48px;
      position: relative;
      display: flex;
      flex-direction: column;
      min-height: 680px;
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
    }

    .form-group label {
      font-size: 15px;
      font-weight: 500;
      color: #0c0c0c;
      margin-bottom: 1px;
    }

    .form-group input {
      padding: 13px 18px;
      font-size: 16px;
      border: 1.5px solid #e8e8e8;
      border-radius: 8px;
      outline: none;
      background: #f6f8fb;
      transition: border 0.2s;
    }

    .form-group input:focus {
      border: 1.5px solid #1d4ed8;
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
    }

    .work-status-card {
      border: 1.5px solid #d7dbe3;
      border-radius: 12px;
      padding: 18px 24px;
      background: #f7f8fa;
      cursor: pointer;
      flex: 1;
      display: flex;
      align-items: center;
      gap: 18px;
      transition: border 0.2s, box-shadow 0.2s;
      font-size: 15px;
      position: relative;
      min-width: 180px;
    }

    .work-status-card.selected {
      border: 2px solid #1d4ed8;
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
      align-items: center;
      gap: 4px;
    }

    .checkbox-row label {
      font-size: 15px;
      color: #222;
      font-weight: 400;
      margin-left: 3px;
      cursor: pointer;
    }

    .terms-row {
      font-size: 13px;
      color: #8a95ad;
      margin-top: 20px;
    }

    .terms-row a {
      color: #1d4ed8;
      text-decoration: none;
      margin: 0 2px;
    }

    .register-btn {
      margin-top: 24px;
      background: #1d4ed8;
      color: #fff;
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
      background: #1742b0;
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
      border: 1px solid #D0D5DD;
      border-radius: 8px;
      background: white;
      color: #344054;
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

    /* Footer Styles */
    .footer {
      margin-top: 50px;
      text-align: center;
      padding: 24px 0 8px 0;
      font-family: 'Inter', Arial, sans-serif;
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
      font-weight: 400;
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
      vertical-align: middle;
    }

    .footer-copyright {
      font-size: 12px;
      color: #7a86a1;
      margin-top: 1px;
      font-weight: 400;
      letter-spacing: 0.01em;
    }

    @media (max-width: 1100px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .form-card {
        width: 90vw;
        min-width: 320px;
        padding: 32px 12vw;
      }

      .left-card {
        margin-bottom: 32px;
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

      .google-section::before {
        display: none;
      }

      .footer-links {
        font-size: 15px;
        gap: 18px;
      }

      .footer-copyright {
        font-size: 14px;
      }
    }

    @media (max-width: 600px) {
      .form-card {
        padding: 22px 4vw;
      }

      .header-content {
        width: 94vw;
      }

      .footer-links {
        font-size: 12px;
        gap: 6px;
      }

      .footer-copyright {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <div class="header">
    <div class="header-content">
      <div class="logo">
        <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="jobnest">
      </div>
      <div class="login-link">
        Already Registered? <a href="<?= base_url('home'); ?>">Login</a> here
      </div>
    </div>
  </div>
  <div class="container">
    <div class="left-card" style="position:sticky; top:32px; z-index:2;">
      <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="jobnest">
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
      <div class="form-title">Create your Jobnest profile</div>
      <div class="form-subtitle">Search & apply to jobs from India's No.1 Job Site</div>
      <form action="<?= base_url('register/submit'); ?>" method="post">
        <div class="form-row">
          <div class="form-fields">
            <div class="form-group">
              <label for="fullname">Full name<span style="color:#e42e2e;">*</span></label>
              <input type="text" name="fullname" id="fullname" placeholder="Full name is your name?" required>
            </div>
            <div class="form-group">
              <label for="email">Email ID<span style="color:#e42e2e;">*</span></label>
              <input type="email" name="email" id="email" placeholder="Tell us your Email ID" required>
              <span class="input-hint">We'll send relevant jobs and updates to this email</span>
            </div>
            <div class="form-group">
              <label for="password">Password<span style="color:#e42e2e;">*</span></label>
              <input type="password" name="password" id="password" placeholder="(Minimum 6 characters)" required
                minlength="6">
              <span class="input-hint">This helps your account stay protected</span>
            </div>
            <div class="form-group">
              <label for="mobile">Mobile number<span style="color:#e42e2e;">*</span></label>
              <input type="tel" name="mobile" id="mobile" placeholder="+91 Enter your mobile number" required
                pattern="[0-9]{10,}">
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
              <a href="#">Terms and Conditions</a> &
              <a href="<?= base_url('privacypolicy'); ?>">Privacy Policy</a> of Jobnest.com
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
      <a href="#">Report a Problem</a>
      <span class="divider"></span>
      <a href="#">Privacy Policy</a>
    </div>
    <div class="footer-copyright">
      All rights reserved © 2025 Info Edge India Ltd.
    </div>
  </div>
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
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
              uid: user.uid,
              name: user.displayName,
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
</body>

</html>
</body>

</html>