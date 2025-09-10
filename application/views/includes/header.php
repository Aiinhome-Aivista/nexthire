<header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
  <div
    style="display:flex; align-items:center; justify-content:space-between; padding:0 150px; height:70px; position:relative;">
    <!-- Logo Section -->
    <div style="position:relative;">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/images/indeed-logo.png'); ?>" alt="Indeed"
          style="height:45px; width:auto; display:block; position:absolute; top:-25px; left:0;">
      </a>
    </div>
    <!-- Menu Section -->
    <nav style="display:flex; align-items:center; gap:24px;">
      <div class="menu-item-underline" style="position:relative; display: flex; justify-content: center;">
        <a href="<?= base_url('jobs'); ?>" class="menu-link"
          style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">
          Jobs
        </a>
        <span class="menu-underline"
          style="display:none; position:absolute; left:0; right:0; bottom:0; height:4px; background:#fc5a36; border-radius:2px;"></span>
      </div>
      <div class="menu-item-underline" style="position:relative; display: flex; justify-content: center;">
        <a href="<?= base_url('companies'); ?>" class="menu-link"
          style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">
          Companies
        </a>
        <span class="menu-underline"
          style="display:none; position:absolute; left:0; right:0; bottom:0; height:4px; background:#fc5a36; border-radius:2px;"></span>
      </div>
      <div class="menu-item-underline" style="position:relative; display: flex; justify-content: center;">
        <a href="<?= base_url('services'); ?>" class="menu-link"
          style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">
          Services
        </a>
        <span class="menu-underline"
          style="display:none; position:absolute; left:0; right:0; bottom:0; height:4px; background:#fc5a36; border-radius:2px;"></span>
      </div>
    </nav>
    <!-- Action Buttons -->
    <div style="display:flex; align-items:center; gap:12px;">
      <a class="login-button" id="showLoginPopup"
        style="border:1px solid #3078e7; border-radius:24px; padding:8px 24px; color:#3078e7; font-size:16px; text-decoration:none; background:#fff; transition: all 0.3s ease;">
        Login
      </a>
      <a href="<?= base_url('register'); ?>" class="register-button"
        style="background:#fc5a36; color:#fff; border-radius:24px; padding:8px 24px; font-size:16px; text-decoration:none; transition: all 0.3s ease;">
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
         <a href="<?= base_url('employer_register'); ?>">Employer Login</a>
        </div>
      </div>

    </div>
  </div>
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
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
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