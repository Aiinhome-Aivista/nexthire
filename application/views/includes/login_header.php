<header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
  <div class="header-container">

    <!-- Logo Section -->
    <div class="logo-section">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="Jobnest" class="logo">
      </a>
    </div>

    <!-- Menu Section -->
    <nav class="main-nav">
      <a href="#" class="menu-link" data-modal-target="jobsModal">Jobs
        <span class="menu-underline"></span>
      </a>
      <a href="#" class="menu-link" data-modal-target="companiesModal">Companies
        <span class="menu-underline"></span>
      </a>
      <a href="#" class="menu-link" data-modal-target="servicesModal">Services
        <span class="menu-underline"></span>
      </a>
      <?php if ($this->uri->segment(1) == 'profile'): ?>
        <a href="<?= base_url('candidate_job_search'); ?>" class="menu-link">Job Search</a>
      <?php endif; ?>

    </nav>

    <!-- Profile & Logout Section -->
    <div class="user-section">
      <div class="profile-icon">
        <i class="fas fa-user"></i>
      </div>
      <button class="logout-btn" id="logoutBtn">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </button>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="menu-toggle" id="menuToggle">
      <i class="fas fa-bars"></i>
    </button>
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
    .menu-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
    }

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
      }

      .main-nav.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }
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

    // Hover modals
    menuLinks.forEach(link => {
      const targetModalId = link.getAttribute('data-modal-target');
      const targetModal = document.getElementById(targetModalId);

      if (targetModal) {
        link.addEventListener('mouseenter', () => {
          modals.forEach(modal => {
            if (modal.id !== targetModalId) modal.style.display = 'none';
          });
          targetModal.style.display = 'block';
        });

        link.addEventListener('mouseleave', () => {
          setTimeout(() => {
            if (!targetModal.matches(':hover') && !link.matches(':hover')) {
              targetModal.style.display = 'none';
            }
          }, 200);
        });

        targetModal.addEventListener('mouseleave', () => {
          setTimeout(() => {
            if (!targetModal.matches(':hover') && !link.matches(':hover')) {
              targetModal.style.display = 'none';
            }
          }, 200);
        });
      }
    });

    // Close modals when clicking outside
    document.addEventListener('click', e => {
      if (!e.target.closest('.menu-link') && !e.target.closest('.menu-modal')) {
        modals.forEach(modal => modal.style.display = 'none');
      }
    });

    // Logout button
    logoutBtn.addEventListener('click', () => {
      if (confirm('Are you sure you want to logout?')) {
        window.location.href = '<?= base_url("home"); ?>';
      }
    });

    // Mobile menu toggle
    menuToggle.addEventListener('click', () => {
      mainNav.classList.toggle('active');
    });
  });
</script>