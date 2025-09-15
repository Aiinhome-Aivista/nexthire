<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
<header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
  <div
    style="display:flex; align-items:center; justify-content:space-between; padding:0 150px; height:70px; position:relative;">
    <!-- Logo Section -->
    <div style="position:relative;">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2"
          style="height:70px; width:auto; display:block; position:absolute; top:-40px; left:0;">
      </a>
    </div>

    <!-- Mobile Toggle Button -->
    <button id="menuToggle" class="menu-toggle"
      style="display:none; font-size:26px; background:none; border:none; cursor:pointer; color:#27365c;">
      ☰
    </button>

    <!-- Menu Section -->
    <nav id="mainNav" style="display:flex; align-items:center; gap:24px;">
      <a href="#" class="menu-link" data-modal-target="jobsModal"
        style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">Jobs
        <span class="menu-underline"></span>
      </a>
      <a href="#" class="menu-link" data-modal-target="companiesModal"
        style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">Companies
        <span class="menu-underline"></span>
      </a>
      <a href="#" class="menu-link" data-modal-target="servicesModal"
        style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">Services
        <span class="menu-underline"></span>
      </a>

      <!-- Action Buttons -->
      <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
        <a class="login-button" id="showLoginPopup"
          style="border:2px solid #FFF44F; border-radius:24px; padding:8px 24px; color:#050203; font-size:16px; text-decoration:none; transition: all 0.3s ease;">
          Login
        </a>
        <a href="<?= base_url('register'); ?>" class="register-button"
          style="background:#FFF44F; color:#29374d; border-radius:24px; padding:8px 24px; font-size:16px; text-decoration:none; transition: all 0.3s ease;">
          Register
        </a>
        <div style="width:1px; height:24px; background:#ccc; margin: 0 12px;"></div>

        <div class="employer-dropdown" id="employerDropdown">
          <a href="#" class="employer-link" id="employerToggle">
            For employers
            <span class="caret"></span>
          </a>
          <span class="employer-underline"></span>
          <div class="employer-menu">
            <a href="<?= base_url('employer_login'); ?>">Employer Login</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Jobs Modal -->
  <div id="jobsModal" class="menu-modal"
    style="display:none; position:absolute; top:70px; left:50%; transform:translateX(-50%); background:#fff; padding:24px; box-shadow:0 4px 12px rgba(0,0,0,0.1); z-index:9; width: 700px; border-radius:12px;">
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
      <?php foreach ($menu['Jobs'] as $sub): ?>
        <div>
          <h4 style="margin:8px 0; font-size:15px; color:#333; font-weight:bold;"><?= $sub['sub_type'] ?></h4>
          <ul style="list-style:none; margin:0; padding:0 0 12px 0;">
            <?php foreach ($sub['children'] as $child): ?>
              <li>
                <a href="#" style="text-decoration:none; font-size:14px; color:#555; display:block; padding:4px 0;">
                  <?= $child['name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Companies Modal -->
  <div id="companiesModal" class="menu-modal"
    style="display:none; position:absolute; top:70px; left:50%; transform:translateX(-50%); background:#fff; padding:24px; box-shadow:0 4px 12px rgba(0,0,0,0.1); z-index:9; width: 700px; border-radius:12px;">
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
      <?php foreach ($menu['Companies'] as $sub): ?>
        <div>
          <h4 style="margin:8px 0; font-size:15px; color:#333; font-weight:bold;"><?= $sub['sub_type'] ?></h4>
          <ul style="list-style:none; margin:0; padding:0 0 12px 0;">
            <?php foreach ($sub['children'] as $child): ?>
              <li>
                <a href="#" style="text-decoration:none; font-size:14px; color:#555; display:block; padding:4px 0;">
                  <?= $child['name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Services Modal -->
  <div id="servicesModal" class="menu-modal"
    style="display:none; position:absolute; top:70px; left:50%; transform:translateX(-50%); background:#fff; padding:24px; box-shadow:0 4px 12px rgba(0,0,0,0.1); z-index:9; width: 700px; border-radius:12px;">
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
      <?php foreach ($menu['Services'] as $sub): ?>
        <div>
          <h4 style="margin:8px 0; font-size:15px; color:#333; font-weight:bold;"><?= $sub['sub_type'] ?></h4>
          <ul style="list-style:none; margin:0; padding:0 0 12px 0;">
            <?php foreach ($sub['children'] as $child): ?>
              <li>
                <a href="#" style="text-decoration:none; font-size:14px; color:#555; display:block; padding:4px 0;">
                  <?= $child['name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="login-popup-bg" id="loginPopupBg">
    <div class="login-popup">
      <span class="login-close" id="closeLoginPopup">&times;</span>
      <a href="<?= base_url('register'); ?>" class="register-for-free">Register for free</a>
      <span class="login-title">Candidate Login</span>
      <form class="login-form" method="post" action="<?= base_url('login/process'); ?>" autocomplete="off" novalidate>
        <label for="login-username">Email ID / Username</label>
        <input type="text" id="login-username" name="username" placeholder="Enter your active Email ID / Username"
          required>
        <small id="email-error" class="text-danger" style="display:none; font-size: 0.85em;">Please enter a
          valid email (must include .com)</small>

        <!-- <input type="password" id="login-password" name="password" placeholder="Enter your password" required> -->
        <div style="position:relative;">
          <label for="login-password">Password</label>
          <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
          <span id="toggle-password" style="position:absolute; top:57px; right:15px; cursor:pointer;">
            <i class="far fa-eye"></i>
          </span>
        </div>
        <small id="password-error" class="text-danger" style="display:none; font-size: 0.85em;">Please enter
          your password</small>


        <div class="login-actions">
          <a href="<?= base_url('login/forgot'); ?>" class="login-link">Forgot Password?</a>
        </div>
        <input type="submit" value="Login">
      </form>
      <div style="text-align:center; margin:20px 0 8px;">
        <span style="color:#1b212b;">Use OTP to Login</span>
      </div>
      <div class="login-divider">Or</div>
      <button id="googleSignInBtn" class="login-google">
        <img style="height:30px; width:30px;" src="<?= base_url('assets/images/google.png'); ?>" alt="google" />
        Sign in with Google
      </button>

    </div>
  </div>
  <script>
    document.getElementById('googleSignInBtn').addEventListener('click', function () {
      var provider = new firebase.auth.GoogleAuthProvider();
      firebase.auth().signInWithPopup(provider)
        .then(function (result) {
          var user = result.user;

          // Send user info to CodeIgniter backend
          fetch('<?= base_url('login/google_callback') ?>', {
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
                window.location.href = '<?= base_url('profile') ?>';
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
    const emailInput = document.getElementById('login-username');
    const passwordInput = document.getElementById('login-password');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    document.querySelector('.login-form').addEventListener('submit', function (event) {
      let isValid = true;

      // Reset errors
      emailError.style.display = 'none';
      passwordError.style.display = 'none';
      emailInput.classList.remove('input-error');
      passwordInput.classList.remove('input-error');

      const emailVal = emailInput.value.trim();
      const pwdVal = passwordInput.value.trim();

      // Email validation
      if (!emailVal || emailVal.indexOf('@') === -1 || emailVal.indexOf('.com') === -1) {
        emailError.style.display = 'block';
        emailError.textContent = 'Please enter a valid email (must include @ and .com)';
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

    // Dynamic (live) email validation
    emailInput.addEventListener('input', function () {
      const val = emailInput.value.trim();
      if (val.includes('@') && val.includes('.com')) {
        emailError.style.display = 'none';
        emailInput.classList.remove('input-error');
      } else {
        emailError.style.display = 'block';
        emailError.textContent = 'Please enter a valid email (must include @ and .com)';
        emailInput.classList.add('input-error');
      }
    });

    // Dynamic (live) password validation
    passwordInput.addEventListener('input', function () {
      const val = passwordInput.value.trim();
      if (val.length >= 6) {
        passwordError.style.display = 'none';
        passwordInput.classList.remove('input-error');
      }
      else {
        passwordError.style.display = 'block';
        passwordError.textContent = 'Password must be at least 6 characters';
        passwordInput.classList.add('input-error');
      }
    });

    // Password toggle code remains the same
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
  <!-- Login Popup HTML and CSS -->
  <style>
    .login-popup-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(40, 50, 80, 0.15);
      display: none;
      justify-content: flex-end;
      z-index: 9999;
      transition: background 0.3s;
    }

    .login-popup {
      width: 520px;
      background: #fff;
      box-shadow: 0 8px 40px rgba(30, 41, 60, 0.20);
      border-radius: 24px 0 0 24px;
      padding: 36px 38px 28px 38px;
      margin-top: 1px;
      margin-bottom: 3px;
      display: flex;
      flex-direction: column;
      position: relative;
      min-height: 540px;
      animation: slideInRight 0.28s cubic-bezier(.2, .75, .35, 1.1);
    }

    @keyframes slideInRight {
      from {
        transform: translateX(460px);
        opacity: 0.2;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .login-title {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 30px;
      color: #29374d;
    }

    .register-for-free {
      position: absolute;
      right: 45px;
      top: 45px;
      color: #29374d;
      font-weight: 600;
      font-size: 15px;
      text-decoration: none;
    }

    .login-form label {
      margin: 11px 0 6px 0;
      font-size: 15px;
      color: #1b212b;
      font-weight: 500;
      letter-spacing: 0.02em;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #808080;
      border-radius: 12px;
      font-size: 16px;
      margin-bottom: 18px;
      outline: none;
      background: #fff !important;
      color: #27365c;
      transition: border 0.22s;
    }

    .login-form input[type="text"]:focus,
    .login-form input[type="password"]:focus {
      border-color: #808080;
    }

    .input-error {
      border: 1px solid red !important;
    }

    .search-box-error {
      border: 1.5px solid #d32f2f !important;
      /* Red border */
      box-shadow: 0px 1px 4px rgba(211, 47, 47, 0.08);
      /* Optional for subtle shadow */
      border-radius: 28px;
      /* Matching naukri style */
      transition: border 0.2s;
    }

    .text-danger {
      color: red;
    }

    .login-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      background: #FFF44F;
      color: #29374d;
      border: none;
      border-radius: 24px;
      font-size: 17px;
      font-weight: 600;
      cursor: pointer;
      margin-top: 8px;
      letter-spacing: .04em;
      transition: background 0.2s;
    }

    .login-form input[type="submit"]:hover {
      background: #d3c830ff;
    }

    .login-actions {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin-bottom: 6px;
    }

    .login-link {
      color: #1b212b;
      font-size: 13px;
      text-decoration: none;
      font-weight: 500;
      margin-left: auto;
    }

    .login-divider {
      text-align: center;
      margin-top: 22px;
      margin-bottom: 12px;
      color: #a3afd6;
      font-size: 14px;
      position: relative;
    }

    .login-divider::before,
    .login-divider::after {
      content: "";
      display: inline-block;
      width: 46px;
      height: 1px;
      background: #e6eafd;
      vertical-align: middle;
      margin: 0 10px;
    }

    .login-google {
      display: block;
      width: 100%;
      text-align: center;
      background: #fff;
      border: 1px solid #FFF44F;
      border-radius: 100px;
      padding: 7px 0;
      color: #3078e7;
      font-weight: 700;
      margin-top: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.15s, color 0.15s;
    }

    .login-google:hover {
      background: #f4faff;
      border-color: #FFF44F;
      color: #3078e7;
    }

    @media (max-width: 700px) {
      .login-popup-bg {
        justify-content: center;
      }

      .login-popup {
        width: 100vw;
        border-radius: 0;
        padding: 22px 12px;
        margin: 18px 0;
      }
    }

    .login-close {
      position: absolute;
      top: 2px;
      right: 22px;
      font-size: 35px;
      color: #575b67ff;
      cursor: pointer;
      line-height: 1;
      font-weight: 700;
      transition: color 0.15s;
    }

    .login-close:hover {
      color: #b6bed7;
    }

    /* Search bar styles */
    .search-bar-top {
      background: #fff;
      border-radius: 999px;
      padding: 13px 25px;
      box-shadow: 0 8px 32px rgba(44, 62, 80, 0.08);
      display: flex;
      align-items: center;
      margin-bottom: 25px;
      margin-left: 9rem;
      border: none;
      width: 1000px;
    }

    .search-bar-top .input-group-text {
      background-color: transparent;
      border: none;
      color: #8893b3;
      font-size: 1.3rem;
      padding-right: 12px;
      padding-left: 0;
      display: flex;
      align-items: center;
    }

    .search-input-field-top {
      display: flex;
      align-items: center;
      flex-grow: 1;
      margin-right: 0;
      position: relative;
    }

    .search-bar-top .form-control {
      background: transparent;
      border: none;
      box-shadow: none;
      padding-left: 0;
      padding-right: 15px;
      font-size: 1.1rem;
      color: #222;
      font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
      font-weight: 400;
      transition: color 0.2s;
    }

    .search-bar-top .form-control::placeholder {
      color: #8893b3;
      opacity: 1;
      font-weight: 400;
    }

    .search-bar-top .form-control:focus {
      outline: none;
      color: #222;
    }

    .search-bar-top .btn-primary {
      background-color: #FFF44F;
      border: none;
      padding: 10px 30px;
      border-radius: 999px;
      font-size: 1rem;
      font-weight: 560;
      color: #29374d;
      margin-left: 15px;
      box-shadow: none;
      transition: background 0.2s;
    }

    .search-bar-top .btn-primary:hover {
      background-color: #d3c830ff;
    }

    .search-input-divider-top {
      content: '';
      display: block;
      width: 1px;
      height: 60%;
      background: #e3e7f0;
      margin: 0 15px;
      align-self: center;
    }

    @media (max-width: 992px) {
      .search-bar-top {
        flex-direction: column;
        padding: 15px;
        border-radius: 24px;
      }

      .search-input-field-top {
        width: 100%;
        margin-right: 0;
        margin-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
      }

      .search-input-divider-top {
        display: none !important;
      }

      .search-bar-top .btn-primary {
        width: 100%;
        margin-left: 0;
        margin-top: 8px;
      }
    }
  </style>
  <style>
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
      background-color: #d3c830ff !important;
      box-shadow: 0 2px 4px rgba(252, 90, 54, 0.3);
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
      background: #FFF44F;
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

    .menu-underline {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 3px;
      background: #FFF44F;
      border-radius: 2px;
      transform: scaleX(0);
      transform-origin: center;
      transition: transform 0.3s ease;
      pointer-events: none;
    }

    .menu-link:hover .menu-underline {
      transform: scaleX(1);
    }

    /* Responsive Menu */
    @media (max-width: 1024px) {
      header>div {
        padding: 0 24px !important;
      }
    }

    @media (max-width: 768px) {
      #menuToggle {
        display: block !important;
      }

      #mainNav {
        display: none !important;
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        position: absolute;
        top: 70px;
        left: 0;
        right: 0;
        background: #fff;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        z-index: 99;
      }

      #mainNav.active {
        display: flex !important;
      }

      #mainNav>div {
        flex-direction: column !important;
        gap: 16px !important;
      }

      .employer-menu {
        position: static !important;
        transform: none !important;
        box-shadow: none !important;
      }
    }
  </style>
</header>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("employerToggle");
    const dropdown = document.getElementById("employerDropdown");

    // Toggle on click
    toggle.addEventListener("click", (e) => {
      e.preventDefault();
      dropdown.classList.toggle("active");
    });

    // Close when clicking outside
    document.addEventListener("click", (e) => {
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove("active");
      }
    });

    // Mobile menu toggle
    const menuToggle = document.getElementById("menuToggle");
    const mainNav = document.getElementById("mainNav");
    menuToggle.addEventListener("click", () => {
      mainNav.classList.toggle("active");
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Modal logic
    const menuLinks = document.querySelectorAll('.menu-link');
    const modals = document.querySelectorAll('.menu-modal');
    menuLinks.forEach(link => {
      const targetModalId = link.getAttribute('data-modal-target');
      const targetModal = document.getElementById(targetModalId);

      link.addEventListener('mouseenter', function () {
        modals.forEach(modal => {
          if (modal.id !== targetModalId) {
            modal.style.display = 'none';
          }
        });
        targetModal.style.display = 'block';
      });

      link.addEventListener('mouseleave', function () {
        setTimeout(() => {
          if (!targetModal.matches(':hover') && !link.matches(':hover')) {
            targetModal.style.display = 'none';
          }
        }, 200);
      });

      targetModal.addEventListener('mouseleave', function () {
        setTimeout(() => {
          if (!targetModal.matches(':hover') && !link.matches(':hover')) {
            targetModal.style.display = 'none';
          }
        }, 200);
      });
    });

    // Close modal when clicking outside
    document.addEventListener('click', function (event) {
      if (!event.target.closest('.menu-link') && !event.target.closest('.menu-modal')) {
        modals.forEach(modal => {
          modal.style.display = 'none';
        });
      }
    });

    // Login popup logic
    var loginBtn = document.getElementById('showLoginPopup');
    var popupBg = document.getElementById('loginPopupBg');
    var closeBtn = document.getElementById('closeLoginPopup');
    if (loginBtn && popupBg) {
      loginBtn.onclick = function () {
        popupBg.style.display = 'flex';
      };
      closeBtn.onclick = function () {
        popupBg.style.display = 'none';
      };
      popupBg.onclick = function (e) {
        if (e.target === popupBg) popupBg.style.display = 'none';
      };
    }
  });
</script>