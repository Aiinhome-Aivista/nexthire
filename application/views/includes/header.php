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
      header > div {
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
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        z-index: 99;
      }

      #mainNav.active {
        display: flex !important;
      }

      #mainNav > div {
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
