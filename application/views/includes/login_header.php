<header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
  <div
    style="display:flex; align-items:center; justify-content:space-between; padding:0 150px; height:70px; position:relative;">

    <!-- Logo Section -->
    <div style="position:relative; display:flex; align-items:center;">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="Jobnest"
          style="height:70px; width:auto; display:block; position:absolute; top:-38px; left:0;">
      </a>
    </div>

    <!-- Menu Section -->
    <nav style="display:flex; align-items:center; gap:24px;">
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
      <a href="<?= base_url('job_search'); ?>" class="menu-link"
        style="color:#27365c; font-size:17px; text-decoration:none; display:inline-block; padding-bottom:4px;">Job
        Search</a>
    </nav>

    <!-- Profile & Logout Section -->
    <div class="user-section" style="display:flex; align-items:center; gap:12px;">
      <div class="profile-icon">
        <i class="fas fa-user"></i>
      </div>
      <button class="logout-btn" id="logoutBtn">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </button>
    </div>

  </div>

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

    .menu-underline {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 3px;
      background: #fc5a36;
      /* same orange color */
      border-radius: 2px;
      transform: scaleX(0);
      transform-origin: center;
      transition: transform 0.3s ease;
      pointer-events: none;
    }

    .menu-link:hover .menu-underline {
      transform: scaleX(1);
    }

    .profile-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #ebf2ff;
      border: 2px solid #FFF44F;
      color: #050203;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .profile-icon:hover {
      background: #ebf2ff;
      transform: scale(1.05);
    }

    .logout-btn {
      background: #FFF44F;
      color: #29374d;
      border: none;
      border-radius: 24px;
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .logout-btn:hover {
      background: #d3c830ff;
      box-shadow: 0 2px 4px rgba(252, 90, 54, 0.3);
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
    // Modal logic
    const menuLinks = document.querySelectorAll('.menu-link');
    const modals = document.querySelectorAll('.menu-modal');
    menuLinks.forEach(link => {
      const targetModalId = link.getAttribute('data-modal-target');
      const targetModal = document.getElementById(targetModalId);


      // Add hover handlers instead:
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

    // Logout button logic
    const logoutBtn = document.getElementById('logoutBtn');
    logoutBtn.addEventListener('click', function () {
      if (confirm('Are you sure you want to logout?')) {
        // In a real application, this would redirect to your logout endpoint
        // alert('Logging out...');
        window.location.href = '<?= base_url("home"); ?>';
      }
    });


  });
</script>