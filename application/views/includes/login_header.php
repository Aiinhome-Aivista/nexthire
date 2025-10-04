<header style="background:#fff; border-bottom:1px solid #f2f2f2; position:relative; z-index:10;">
  <div class="header-container">

    <!-- Logo Section -->
    <!-- <div class="logo-section">
      <a href="<?php //base_url(); ?>">
        <img src="<?php //base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2" class="logo">
      </a>
    </div> -->

     <div class="logo-section">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('../All_Uploads/images/SahajJOB2.png'); ?>" alt="SahajJOB2" class="logo">
      </a>
    </div>

    <!-- Profile & Knowledge Section -->
    <div class="user-menu">

      <!-- Knowledge Dropdown (only visible on Knowledge pages) -->
      <div class="knowledge-dropdown" id="knowledgeDropdown"
        style="font-family: 'Nunito', Arial, sans-serif !important; display:none;">
        <a href="javascript:void(0)" class="knowledge-link" id="knowledgeToggle">
          Knowledge Base <span class="caret"></span>
        </a>
        <span class="knowledge-underline"></span>
        <div class="knowledge-menu" id="knowledgeMenu"></div>
      </div>

      <!-- Profile Icon -->
      <button id="profileToggle" class="menu-icon">
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
  </div>

  <!-- Styles -->
  <style>
    /* --- Global Header Styles --- */
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
    }

    .user-menu {
      display: flex;
      align-items: center;
      gap: 20px;
      position: relative;
    }

    .menu-icon {
      background: none;
      border: none;
      font-size: 35px;
      cursor: pointer;
      color: #f5e602;
    }

    /* Popup Menu */
    .popup-menu {
      position: absolute;
      top: 40px;
      right: 0;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      width: 180px;
      flex-direction: column;
      z-index: 100;
      display: none;
    }

    .popup-menu.hidden {
      display: none;
    }

    .popup-menu .menu-item {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      color: #333;
      text-decoration: none;
    }

    .popup-menu .menu-item:hover {
      background: #f5f5f5;
    }

    .popup-menu .menu-item i {
      margin-right: 10px;
      font-size: 18px;
      width: 20px;
      text-align: center;
    }

    /* Knowledge Dropdown */
    .knowledge-dropdown {
      position: relative;
      display: inline-block;
    }

    .knowledge-link {
      color: #27365c;
      font-size: 18px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
    }

    .caret {
      border: solid #27365c;
      border-width: 0 2px 2px 0;
      padding: 3px;
      transform: rotate(45deg);
      transition: transform .3s;
    }

    .knowledge-underline {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 3px;
      background: #FFF44F;
      border-radius: 2px;
      transform: scaleX(0);
      transition: transform .3s;
    }

    .knowledge-dropdown.active .knowledge-underline {
      transform: scaleX(1);
    }

    .knowledge-menu {
      display: none;
      position: absolute;
      top: 46px;
      left: 50%;
      transform: translateX(-50%);
      min-width: 180px;
      background: #fff;
      box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
      border-radius: 12px;
      padding: 12px 0;
      z-index: 100;
    }

    .knowledge-menu a {
      display: block;
      padding: 10px 20px;
      color: #27365c;
      font-size: 16px;
      text-decoration: none;
    }

    .knowledge-menu a:hover {
      background: #f7f8fa;
    }

    .knowledge-menu a.active {
      background: #FFF44F;
      font-weight: 600;
      color: #27365c;
      position: relative;
    }

    .knowledge-dropdown.active .knowledge-menu {
      display: block;
    }

    .knowledge-dropdown.active .caret {
      transform: rotate(-135deg);
    }


    .knowledge-menu a.active {
      background: #FFF44F;
      font-weight: bold;
      color: black;
    }

    /* Responsive Styles */
    /* Tablet (up to 1024px) */
    @media (max-width: 1024px) {
      .header-container {
        padding: 0 24px;
        height: 64px;
      }

      .logo {
        height: 56px;
      }

      .main-nav {
        gap: 16px;
      }

      .menu-link {
        font-size: 15px;
      }

      .menu-icon {
        font-size: 28px;
      }
    }

    /* Mobile (up to 768px) */
    @media (max-width: 768px) {
      .header-container {
        padding: 0 16px;
        height: 60px;
      }

      /* Logo scales down */
      .logo {
        height: 48px;
      }

      /* Nav hidden by default */
      .main-nav {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        left: 0;
        right: 0;
        background: #fff;
        border-top: 1px solid #eee;
        padding: 16px;
        gap: 14px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, .12);
        z-index: 1000;
      }

      /* Show nav when active */
      .main-nav.active {
        display: flex;
      }

      /* Links in mobile nav */
      .menu-link {
        font-size: 16px;
        padding: 10px 0;
      }

      /* User menu & hamburger */
      .user-menu {
        gap: 12px;
      }

      .menu-icon {
        font-size: 26px;
      }

      .hamburger {
        display: block;
        background: none;
        border: none;
        font-size: 26px;
        cursor: pointer;
        color: #27365c;
      }
    }

    /* Extra Small (up to 480px) */
    @media (max-width: 480px) {
      .header-container {
        padding: 0 12px;
        height: 56px;
      }

      .logo {
        height: 42px;
      }

      .menu-link {
        font-size: 15px;
      }

      .menu-icon,
      .hamburger {
        font-size: 24px;
      }

      /* Popup reposition for tiny screens */
      .popup-menu {
        top: 46px;
        right: 8px;
        width: 160px;
      }
    }
  </style>
</header>

<!-- Scripts -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const logoutBtn = document.getElementById("logoutBtn");
    const profileToggle = document.getElementById("profileToggle");
    const popupMenu = document.getElementById("popupMenu");
    const knowledgeDropdown = document.getElementById("knowledgeDropdown");
    const knowledgeToggle = document.getElementById("knowledgeToggle");

    // --- Profile Menu ---
    profileToggle.addEventListener("click", (e) => {
      e.stopPropagation();
      // Close knowledge menu if open
      knowledgeDropdown.classList.remove("active");
      popupMenu.classList.toggle("hidden");
      popupMenu.style.display = popupMenu.classList.contains("hidden") ? "none" : "flex";
    });

    document.addEventListener("click", (e) => {
      if (!profileToggle.contains(e.target) && !popupMenu.contains(e.target)) {
        popupMenu.classList.add("hidden");
        popupMenu.style.display = "none";
      }
    });

    if (logoutBtn) {
      logoutBtn.addEventListener("click", () => {
        if (confirm("Are you sure you want to logout?")) {
          window.location.href = '<?= base_url("Candidate_jobsearch/logout"); ?>';
        }
      });
    }

    // --- Knowledge Dropdown ---
    function isKnowledgeBasedPage() {
      return window.location.pathname.includes("knowledge-based");
    }

    function loadCategories() {
      const urlParams = new URLSearchParams(window.location.search);
      const activeCategory = urlParams.get("category");

      fetch('<?= base_url("admin/Posts_categories/get_categories_json"); ?>')
        .then(res => res.json())
        .then(cats => {
          const menu = document.getElementById("knowledgeMenu");

          // "All" link
          menu.innerHTML = `
        <a href="<?= base_url("knowledge-based"); ?>" 
           class="menu-item ${!activeCategory ? "active" : ""}">
          <span>All</span>
        </a>
      `;

          // Category links
          cats.forEach(c => {
            menu.innerHTML += `
          <a href="<?= base_url("knowledge-based?category="); ?>${c.id}" 
             class="menu-item ${activeCategory == c.id ? "active" : ""}">
            <span>${c.name}</span>
          </a>
        `;
          });
        })
        .catch(() => {
          const menu = document.getElementById("knowledgeMenu");
          const defaultCats = [
            { id: "engineering", name: "Engineering" },
            { id: "fresher", name: "Fresher" }
          ];

          menu.innerHTML = `
        <a href="<?= base_url("knowledge-based"); ?>" 
           class="menu-item ${!activeCategory ? "active" : ""}">
          <span>All</span>
        </a>
      `;

          defaultCats.forEach(c => {
            menu.innerHTML += `
          <a href="<?= base_url("knowledge-based?category="); ?>${c.id}" 
             class="menu-item ${activeCategory == c.id ? "active" : ""}">
            <span>${c.name}</span>
          </a>
        `;
          });
        });
    }


    if (knowledgeDropdown && isKnowledgeBasedPage()) {
      knowledgeDropdown.style.display = "inline-block";
      loadCategories();
      knowledgeToggle.addEventListener("click", (e) => {
        e.stopPropagation();
        popupMenu.classList.add("hidden");
        popupMenu.style.display = "none";
        knowledgeDropdown.classList.toggle("active");
      });
      document.addEventListener("click", (e) => {
        if (!knowledgeDropdown.contains(e.target)) {
          knowledgeDropdown.classList.remove("active");
        }
      });
    }
  });
</script>