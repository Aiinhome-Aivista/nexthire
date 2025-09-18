<header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
  <div class="header-container">

    <!-- Logo Section -->
    <div class="logo-section">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2" class="logo">
      </a>
    </div>

    <!-- Menu Section -->
    <!-- <nav class="main-nav"> -->
    <!-- <a href="#" class="menu-link" data-modal-target="jobsModal">Jobs
        <span class="menu-underline"></span>
      </a>
      <a href="#" class="menu-link" data-modal-target="companiesModal">Companies
        <span class="menu-underline"></span>
      </a>
      <a href="#" class="menu-link" data-modal-target="servicesModal">Services
        <span class="menu-underline"></span>
      </a> -->
    <!-- <?php //if ($this->uri->segment(1) == 'profile'): ?>
        <a href="<?php //base_url('candidate_job_search'); ?>" class="menu-link">Job Search</a>
      <?php //endif; ?>

    </nav> -->

    <!-- Profile & Logout Section -->
    <div class="user-menu">
      <button id="menuToggle" class="menu-icon">
        <i class="fas fa-user-circle"></i>
      </button>

      <!-- Popup Menu -->
      <div id="popupMenu" class="popup-menu hidden">
        <a href="<?= base_url('profile'); ?>" class="menu-item">
          <i class="fas fa-user"></i>
          <span>My Profile</span>
        </a>
        <a href="<?= base_url('candidate_job_search'); ?>" class="menu-item">
          <i class="fas fa-briefcase"></i>
          <span>Job Search</span>
        </a>
        <div class="menu-item" id="logoutBtn">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </div>

      </div>
    </div>
    <!-- Mobile Menu Toggle -->
    <!-- <button class="menu-toggle" id="menuToggle">
      <i class="fas fa-bars"></i>
    </button> -->
  </div>

  <!-- Jobs Modal -->
  <div id="jobsModal" class="menu-modal">
    <div class="modal-grid">
      <?php foreach ($menu['Jobs'] as $sub): ?>
        <div>
          <h4><?= $sub['sub_type'] ?></h4>
          <ul>
            <?php foreach ($sub['children'] as $child): ?>
              <li>
                <a href="#"><?= $child['name'] ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Companies Modal -->
  <div id="companiesModal" class="menu-modal">
    <div class="modal-grid">
      <?php foreach ($menu['Companies'] as $sub): ?>
        <div>
          <h4><?= $sub['sub_type'] ?></h4>
          <ul>
            <?php foreach ($sub['children'] as $child): ?>
              <li>
                <a href="#"><?= $child['name'] ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Services Modal -->
  <div id="servicesModal" class="menu-modal">
    <div class="modal-grid">
      <?php foreach ($menu['Services'] as $sub): ?>
        <div>
          <h4><?= $sub['sub_type'] ?></h4>
          <ul>
            <?php foreach ($sub['children'] as $child): ?>
              <li>
                <a href="#"><?= $child['name'] ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <style>
    /* Base Layout */
    .header-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 150px;
      height: 70px;
      position: relative;
    }

    .logo {
      height: 70px;
      width: auto;
      display: block;
    }

    .main-nav {
      display: flex;
      align-items: center;
      gap: 24px;
    }

    .menu-link {
      color: #27365c;
      font-size: 17px;
      text-decoration: none;
      display: inline-block;
      padding-bottom: 4px;
      position: relative;
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

    .user-section {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .profile-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #ebf2ff;
      border: 2px solid #FFF44F;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .profile-icon:hover {
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

    /* Menu Modal */
    .menu-modal {
      display: none;
      position: absolute;
      top: 70px;
      left: 50%;
      transform: translateX(-50%);
      background: #fff;
      padding: 24px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      z-index: 9;
      width: 700px;
      border-radius: 12px;
    }

    .modal-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .modal-grid h4 {
      margin: 8px 0;
      font-size: 15px;
      color: #333;
      font-weight: bold;
    }

    .modal-grid ul {
      list-style: none;
      margin: 0;
      padding: 0 0 12px 0;
    }

    .modal-grid a {
      text-decoration: none;
      font-size: 14px;
      color: #555;
      display: block;
      padding: 4px 0;
    }

    /* Mobile Menu Toggle */
    /* .menu-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
    }

    .menu-toggle {
        display: block;
    } */

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .header-container {
        padding: 0 40px;
      }

      .main-nav {
        gap: 16px;
      }
    }

    @media (max-width: 768px) {
      .header-container {
        padding: 0 20px;
      }

      .main-nav {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 70px;
        right: 20px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 16px;
        gap: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
      }

      .main-nav.active {
        display: flex;
      }
    }

    /* profile icon style */

    .user-menu {
      position: relative;
      display: inline-block;
    }

    .menu-icon {
      background: none;
      border: none;
      font-size: 35px;
      cursor: pointer;
      color: #f5e602;
    }

    .popup-menu {
      position: absolute;
      top: 40px;
      right: 0;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      width: 180px;
      display: flex;
      flex-direction: column;
      z-index: 100;
    }

    .popup-menu.hidden {
      display: none;
    }

    .menu-item {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      text-decoration: none;
      color: #333;
      transition: background 0.2s;
    }

    .menu-item i {
      margin-right: 10px;
      font-size: 18px;
      width: 20px;
      text-align: center;
    }

    .menu-item:hover {
      background: #f5f5f5;
    }
  </style>
</header>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const menuLinks = document.querySelectorAll('.menu-link');
    const modals = document.querySelectorAll('.menu-modal');
    const logoutBtn = document.getElementById('logoutBtn');
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.querySelector('.main-nav');

    // Track active modal and timeouts
    let activeModal = null;
    let modalTimeouts = {};

    // Hover modals
    menuLinks.forEach(link => {
      const targetModalId = link.getAttribute('data-modal-target');
      const targetModal = document.getElementById(targetModalId);

      if (targetModal) {
        link.addEventListener('mouseenter', () => {
          // Clear any pending timeout for this modal
          if (modalTimeouts[targetModalId]) {
            clearTimeout(modalTimeouts[targetModalId]);
            delete modalTimeouts[targetModalId];
          }

          // Hide all other modals
          modals.forEach(modal => {
            if (modal.id !== targetModalId) {
              modal.style.display = 'none';
            }
          });

          // Show this modal
          targetModal.style.display = 'block';
          activeModal = targetModalId;
        });

        link.addEventListener('mouseleave', () => {
          // Set timeout to close modal after a short delay
          modalTimeouts[targetModalId] = setTimeout(() => {
            if (!targetModal.matches(':hover')) {
              targetModal.style.display = 'none';
              activeModal = null;
            }
          }, 300); // Increased from 200ms to 300ms
        });

        targetModal.addEventListener('mouseenter', () => {
          // Clear timeout when mouse enters modal
          if (modalTimeouts[targetModalId]) {
            clearTimeout(modalTimeouts[targetModalId]);
            delete modalTimeouts[targetModalId];
          }
        });

        targetModal.addEventListener('mouseleave', () => {
          // Set timeout to close modal after mouse leaves
          modalTimeouts[targetModalId] = setTimeout(() => {
            targetModal.style.display = 'none';
            activeModal = null;
          }, 300); // Increased from 200ms to 300ms
        });
      }
    });

    // Close modals when clicking outside
    document.addEventListener('click', e => {
      if (!e.target.closest('.menu-link') && !e.target.closest('.menu-modal')) {
        modals.forEach(modal => modal.style.display = 'none');
        activeModal = null;
      }

      // Close mobile menu when clicking outside
      if (mainNav.classList.contains('active') &&
        !e.target.closest('.main-nav') &&
        e.target !== menuToggle &&
        !menuToggle.contains(e.target)) {
        mainNav.classList.remove('active');
      }
    });

    // Logout button
    logoutBtn.addEventListener('click', () => {
      if (confirm('Are you sure you want to logout?')) {
        window.location.href = '<?= base_url('Candidate_jobsearch/logout'); ?>';
      }
    });

    // Mobile menu toggle
    menuToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      mainNav.classList.toggle('active');
    });
  });
</script>

<script>
  const menuToggle = document.getElementById("menuToggle");
  const popupMenu = document.getElementById("popupMenu");

  menuToggle.addEventListener("click", () => {
    popupMenu.classList.toggle("hidden");
  });

  // Close menu if clicking outside
  document.addEventListener("click", (e) => {
    if (!menuToggle.contains(e.target) && !popupMenu.contains(e.target)) {
      popupMenu.classList.add("hidden");
    }
  });
</script>