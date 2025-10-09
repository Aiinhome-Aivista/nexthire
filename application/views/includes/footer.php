<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SahajJobs | Footer</title>
    <style>
        .custom-footer {
            font-family: 'Montserrat', Arial, sans-serif !important;
            padding: 40px 0 0 0;
        }

        .footer-top {
            display: flex;
            justify-content: center;
            /* ✅ center the whole group */
            align-items: flex-start;
            gap: 80px;
            /* spacing between each section */
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 50px;
            flex-wrap: nowrap;
            /* keep all 4 in one row */
            text-align: left;
        }

        .footer-logo-social {
            flex: 0 0 220px;
            /* keep logo/social compact */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-links {
            display: flex;
            justify-content: flex-start;
            gap: 60px;
            /* spacing between link columns */
            flex: 0 1 auto;
            text-align: left;
        }


        .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links ul li {
            margin-bottom: 12px;
        }


        .footer-logo img {
            width: 160px;
            margin-bottom: 28px;
            height: 70px;
        }

        .footer-social-label {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 9px;
            color: #232a35;
            margin-left: 10px;
        }

        .footer-social-icons a {
            margin-right: 10px;
            display: inline-block;
            background: #f4f6fb;
            border-radius: 4px;
            padding: 4px;
            transition: box-shadow 0.15s;
            margin-left: 4px;
        }

        .footer-social-icons a img {
            width: 24px;
            height: 24px;
        }

        .footer-social-icons a:hover {
            box-shadow: 0 0 0 2px #e4eaf1;
        }

        .footer-links ul li a {
            color: #232a35;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.2s;
        }

        .footer-links ul li a:hover {
            color: #0073e6;
            text-decoration: underline;
        }

        .footer-app-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 0 0 1px #edf0f5;
            padding: 28px 28px 21px 34px;
            min-width: 340px;
            max-width: 340px;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-app-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 7px;
            color: #232a35;
        }

        .footer-app-desc {
            font-size: 15px;
            color: #495057;
            margin-bottom: 19px;
        }

        .footer-app-buttons {
            display: flex;
            gap: 12px;
        }

        .footer-app-buttons a img {
            width: 146px;
            height: 44px;
            box-shadow: 0 1px 4px rgba(60, 72, 88, 0.09);
            border-radius: 7px;
            transition: transform 0.15s;
        }

        .footer-app-buttons a img:hover {
            transform: scale(1.03);
        }

        .footer-divider {
            border-top: 1px solid #edf0f5;
            margin: 46px 50px 0 50px;
        }

        .footer-bottom {
            display: flex;
            align-items: center;
            max-width: 1280px;
            margin: 0 auto;
            padding: 18px 0px 32px 50px;
            gap: 2%;

            /* ✅ responsive addition */
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
            gap: 20px;
        }

        .footer-infoedge {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .footer-infoedge-logo {
            width: 112px;
            height: auto;
        }

        .footer-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #859ac3;
            font-size: 0.8rem;
            line-height: 1;
            gap: 0;
            min-height: 100%;
        }

        .footer-business {
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: 0.7rem;
            color: #859ac3;
        }

        .footer-business-scroller {
            width: 100%;
            margin-top: 18px;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: nowrap;
            overflow: hidden;
            max-width: 700px;
        }

        .business-label {
            color: #859ac3;
            font-size: 16px;
            font-weight: 400;
            margin-right: 12px;
            white-space: nowrap;
        }

        .business-logos-scroller {
            display: flex;
            gap: 32px;
            align-items: center;
            margin: 0;
            padding: 0;
            list-style: none;
            animation: scroll-logos 50s linear infinite;
        }

        .business-logos-scroller li {
            flex: 0 0 auto;
            display: inline-block;
        }

        .business-logos-scroller li a img {
            height: 40px;
            width: 150px;
            object-fit: contain;
            transition: filter 0.15s;
            filter: brightness(1);
        }

        .business-logos-scroller li a img:hover {
            filter: brightness(0.85);
        }

        @keyframes scroll-logos {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .footer-social-icons a[href="#"] {
            pointer-events: none;
            cursor: not-allowed;
            opacity: 0.5;
        }

        /* Responsive */
        @media (max-width: 1024px) {

            /* ✅ new breakpoint for tablets */
            .footer-top {
                flex-direction: column;
                padding: 0 30px;
            }

            .footer-links {
                margin: 20px 0;
                gap: 40px;
                flex-wrap: wrap;
            }

            .footer-app-card {
                margin-left: 0;
                margin-top: 20px;
                max-width: 100%;
            }
        }

        @media (max-width: 900px) {
            .footer-top {
                flex-direction: column;
                padding: 0 20px;
            }

            .footer-links {
                margin: 20px 0;
                gap: 30px;
                flex-wrap: wrap;
            }

            .footer-app-card {
                margin-left: 0;
                margin-top: 20px;
                max-width: 100%;
            }

            .footer-business-scroller {
                max-width: 100%;
                width: 100%;
            }

            .business-logos-scroller li a img {
                width: 110px;
                height: 30px;
            }
        }

        @media (max-width: 768px) {
            .footer-top {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }


            .footer-links {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 12px;
                text-align: center;
            }

            .footer-links ul {
                margin: 0;
                padding: 0;
                width: 220px;
                max-width: 90%;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-links ul li {
                width: 100%;
                text-align: left;
            }

            .footer-links ul li a {
                display: block;
                width: 100%;
                padding: 4px 0;
            }

            .footer-text {
                text-align: center;
                width: 100%;
                display: flex;
                justify-content: center;
                margin-right: 3rem;
            }
        }
    </style>
</head>

<body>


    <footer class="custom-footer">
        <div class="footer-top">
            <div class="footer-logo-social">
                <!-- <a href="<?php //base_url(); ?>" class="footer-logo">
                    <img src="<?php //base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
                </a> -->
                <a href="<?= base_url(); ?>" class="footer-logo">
                    <img src="<?= base_url('../All_Uploads/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
                </a>
                <div class="footer-social">
                    <div class="footer-social-label">Connect with us</div>
                    <div class="footer-social-icons">
                        <a href="https://www.facebook.com/sahajjobs.developer" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/facebook.svg" alt="Facebook" />
                        </a>
                        <a href="https://www.instagram.com/sahaj_jobs/p/DPjLD_ViWUU/" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/instagram.svg" alt="Instagram" />
                        </a>
                        <a href="#" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/twitter_v1.svg" alt="X" />
                        </a>
                        <a href="#" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/linkedin.svg" alt="LinkedIn" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-links">
                <ul>
                    <li><a href="<?= base_url('about-us'); ?>">About us</a></li>
                    <li><a href="<?= base_url('careers'); ?>">Careers</a></li>
                    <li><a href="<?= base_url('employer-home'); ?>">Employer home</a></li>
                    <li><a href="" id="knowledgeBasedLink">Knowledge Base</a></li>
                </ul>
                <ul>
                    <li><a href="<?= base_url('FAQ'); ?>">FAQ</a></li>
                    <li><a href="<?= base_url('report-issue'); ?>">Report issue</a></li>
                    <li><a href="<?= base_url('trust-safety'); ?>">Trust & safety</a></li>
                </ul>
                <ul>
                    <li><a href="<?= base_url('privacy-policy'); ?>">Privacy policy</a></li>
                    <li><a href="<?= base_url('cookie-policy'); ?>">Cookie Policy</a></li>
                    <li><a href="<?= base_url('terms-and-conditions'); ?>">Terms & conditions</a></li>

                </ul>
            </div>
        </div>

        <div class="footer-divider"></div>

        <div class="footer-bottom">
            <div class="footer-text">
                <div>All rights reserved © 2025 Aivista Technologies Pvt. Ltd</div>
            </div>
        </div>
    </footer>


    <script>
        const isLoggedIn = <?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'true' : 'false'; ?>;

        document.getElementById('knowledgeBasedLink').addEventListener('click', function (event) {
            event.preventDefault();
            if (isLoggedIn) {
                // Redirect to the knowledge based page if logged in
                window.location.href = '<?= base_url('knowledge-based'); ?>';
            } else {
                // Set a flag in sessionStorage to indicate knowledge base redirect
                sessionStorage.setItem('redirectToKnowledgeBase', 'true');

                // Show the login modal if not logged in
                var loginPopupBg = document.getElementById('loginPopupBg');
                if (loginPopupBg) {
                    loginPopupBg.style.display = 'flex';
                }
            }
        });

        // Check if we need to redirect to knowledge base after login
        window.addEventListener('load', function () {
            const redirectToKnowledgeBase = sessionStorage.getItem('redirectToKnowledgeBase');
            if (redirectToKnowledgeBase === 'true' && isLoggedIn) {
                sessionStorage.removeItem('redirectToKnowledgeBase');
                window.location.href = '<?= base_url('knowledge-based'); ?>';
            }
        });
    </script>
</body>

</html>