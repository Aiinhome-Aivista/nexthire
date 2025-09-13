<?php include('includes/header.php'); ?>

<h1>Sitemap</h1>
<p>This page provides a comprehensive list of all the main sections and pages on the SahajJobs website to help you navigate our site with ease.</p>

<div class="sitemap-list">
    <h2>Main Sections</h2>
    <ul>
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="<?= base_url('about-us'); ?>">About Us</a></li>
        <li><a href="<?= base_url('careers'); ?>">Careers</a></li>
        <li><a href="<?= base_url('employer-home'); ?>">Employer Home</a></li>
    </ul>

    <h2>Help & Support</h2>
    <ul>
        <li><a href="<?= base_url('help-center'); ?>">Help Center</a></li>
        <li><a href="<?= base_url('summons-notices'); ?>">Summons/Notices</a></li>
        <li><a href="<?= base_url('grievances'); ?>">Grievances</a></li>
        <li><a href="<?= base_url('report-issue'); ?>">Report Issue</a></li>
    </ul>

    <h2>Legal & Safety</h2>
    <ul>
        <li><a href="<?= base_url('privacy-policy'); ?>">Privacy Policy</a></li>
        <li><a href="<?= base_url('terms-and-conditions'); ?>">Terms & Conditions</a></li>
        <li><a href="<?= base_url('fraud-alert'); ?>">Fraud Alert</a></li>
        <li><a href="<?= base_url('trust-safety'); ?>">Trust & Safety</a></li>
    </ul>
    
    <h2>Other Pages</h2>
    <ul>
        <li><a href="<?= base_url('credits'); ?>">Credits</a></li>
        <li><a href="<?= base_url('sitemap'); ?>">Sitemap</a></li>
    </ul>
</div>

<?php include('includes/footer.php'); ?>