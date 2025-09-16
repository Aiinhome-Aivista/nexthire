<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookie Banner</title>
    <style>
        .cookie-banner {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #505665;
            color: #fff;
            text-align: center;
            font-family: 'Nunito', Arial, sans-serif !important;
            z-index: 9999;
            padding: 10px 15px;

            /* ✅ responsive additions */
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .cookie-banner a {
            color: #FFF44F;
            text-decoration: none;
            font-weight: 300;
            font-size: 0.95em;
        }

        .cookie-banner a:hover {
            text-decoration: underline;
        }

        .cookie-btn {
            background: #FFF44F;
            color: #29374d;
            border: none;
            outline: none;
            padding: 7px 14px;
            border-radius: 25px;
            font-size: 1em;
            font-weight: bold;
            margin-left: 30px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .cookie-btn:hover {
            background: #d3c830ff;
        }

        .cookie-banner span {
            font-size: 1em;
            font-weight: 500;

            /* ✅ responsive additions */
            flex: 1 1 auto;
            min-width: 200px;
            font-size: 0.9em;
        }

        .custom-footer {
            font-family: 'Montserrat', Arial, sans-serif !important;
            padding: 40px 0 0 0;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 50px;

            /* ✅ responsive addition */
            flex-wrap: wrap;
        }

        .footer-logo-social {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-width: 180px;
            margin-right: 10px;
        }

        .footer-logo img {
            width: 140px;
            margin-bottom: 28px;
            height: 70px;
        }

        .footer-social-label {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 9px;
            color: #232a35;
        }

        .footer-social-icons a {
            margin-right: 10px;
            display: inline-block;
            background: #f4f6fb;
            border-radius: 4px;
            padding: 4px;
            transition: box-shadow 0.15s;
        }

        .footer-social-icons a img {
            width: 24px;
            height: 24px;
        }

        .footer-social-icons a:hover {
            box-shadow: 0 0 0 2px #e4eaf1;
        }

        .footer-links {
            display: flex;
            justify-content: flex-start;
            gap: 60px;
            flex: 1;
            margin-left: 30px;
            margin-right: 30px;

            /* ✅ responsive addition */
            flex-wrap: wrap;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links ul li {
            margin-bottom: 14px;
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

        .footer-infoedge-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #859ac3;
            font-size: 0.7rem;
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
                flex-direction: column;
                align-items: flex-start;
                padding: 0 20px;
            }

            .footer-links {
                gap: 20px;
                margin-top: 20px;
            }

            .cookie-banner {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .footer-business-scroller {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
                overflow-x: hidden;
                max-width: 100%;
            }

            .business-logos-scroller {
                animation: none;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .business-logos-scroller li {
                flex: 0 1 45%;
                text-align: center;
            }

            .business-logos-scroller li a img {
                width: 120px;
                height: auto;
            }
        }
    </style>
    <script>
        function hideCookieBanner() {
            document.getElementById('cookie-banner').style.display = 'none';
        }
    </script>
</head>

<body>


    <footer class="custom-footer">
        <div class="footer-top">
            <div class="footer-logo-social">
                <a href="<?= base_url(); ?>" class="footer-logo">
                    <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2">
                </a>
                <div class="footer-social">
                    <div class="footer-social-label">Connect with us</div>
                    <div class="footer-social-icons">
                        <a href="https://www.facebook.com/Naukri" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/facebook.svg" alt="Facebook" />
                        </a>
                        <a href="https://instagram.com/naukridotcom/" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/instagram.svg" alt="Instagram" />
                        </a>
                        <a href="https://twitter.com/naukri" target="_blank" rel="noopener">
                            <img src="https://static.naukimg.com/s/0/0/i/new-homepage/twitter_v1.svg" alt="X" />
                        </a>
                        <a href="http://www.linkedin.com/company/naukri.com" target="_blank" rel="noopener">
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
                    <li><a href="<?= base_url('sitemap'); ?>">Sitemap</a></li>
                    <li><a href="<?= base_url('credits'); ?>">Credits</a></li>
                </ul>
                <ul>
                    <li><a href="<?= base_url('help-center'); ?>">Help center</a></li>
                    <li><a href="<?= base_url('summons-notices'); ?>">Summons/Notices</a></li>
                    <li><a href="<?= base_url('grievances'); ?>">Grievances</a></li>
                    <li><a href="<?= base_url('report-issue'); ?>">Report issue</a></li>
                </ul>
                <ul>
                    <li><a href="<?= base_url('privacy-policy'); ?>">Privacy policy</a></li>
                    <li><a href="<?= base_url('terms-and-conditions'); ?>">Terms & conditions</a></li>
                    <li><a href="<?= base_url('fraud-alert'); ?>">Fraud alert</a></li>
                    <li><a href="<?= base_url('trust-safety'); ?>">Trust & safety</a></li>
                </ul>
            </div>

            <!-- <div class="footer-app-card">
                <div class="footer-app-title">Apply on the go</div>
                <div class="footer-app-desc">Get real-time job updates on our App</div>
                <div class="footer-app-buttons">
                    <a href="https://play.google.com/store/apps/details?id=naukriApp.appModules.login&amp;hl=en&amp;utm_source=naukri&amp;utm_medium=footer"
                        target="_blank" rel="noopener">
                        <img src="https://static.naukimg.com/s/0/0/i/new-homepage/android-app_v1.png"
                            alt="Google Play" />
                    </a>
                    <a href="https://itunes.apple.com/in/app/naukri.com-job-search/id482877505?mt=8" target="_blank"
                        rel="noopener">
                        <img src="https://static.naukimg.com/s/0/0/i/new-homepage/ios-app_v1.png" alt="App Store" />
                    </a>
                </div>
            </div> -->
        </div>

        <div class="footer-divider"></div>

        <div class="footer-bottom">
            <div class="footer-infoedge">
                <img src="https://static.naukimg.com/s/0/0/i/new-homepage/infoedge-logo.svg" alt="Info Edge Logo"
                    class="footer-infoedge-logo" />
            </div>
            <div class="footer-infoedge-text">
                <div>All trademarks are the property of their respective owners</div>
                <div>All rights reserved © 2025 Info Edge (India) Ltd.</div>
            </div>
            <div class="footer-business">
                <div class="footer-business-text">
                    Our businesses
                </div>
                <div class="footer-business-scroller">
                    <ul class="business-logos-scroller">
                        <li><a href="https://www.99acres.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/nnacres.png"
                                    alt="99acres" /></a></li>
                        <li><a href="https://www.jeevansathi.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jeevansathi.png"
                                    alt="Jeevansathi.com" /></a></li>
                        <li><a href="https://www.naukrigulf.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/ng_v1.png"
                                    alt="Naukri Gulf" /></a></li>
                        <li><a href="https://www.shiksha.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/shiksha.png"
                                    alt="Shiksha.com" /></a></li>
                        <li><a href="https://www.iimjobs.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/iimjobs.png"
                                    alt="IIMJobs.com" /></a></li>
                        <li><a href="https://www.hirist.tech/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/hirist_v1.png"
                                    alt="hirist.tech" /></a></li>
                        <li><a href="https://www.jobhai.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jobhai.png"
                                    alt="JobHai.com" /></a></li>
                        <li><a href="https://doselect.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/doselect.png"
                                    alt="Doselect.com" /></a></li>
                        <li><a href="https://www.naukri.com/minis" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/minis.png"
                                    alt="Minis" /></a></li>
                        <li><a href="https://www.codingninjas.com/?utm_source=naukri&amp;utm_medium=desktop-footer"
                                target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/coding_ninjas.png"
                                    alt="Coding Ninjas" /></a></li>

                        <!-- Repeat logos for smooth infinite scroll -->
                        <li><a href="https://www.99acres.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/nnacres.png"
                                    alt="99acres" /></a></li>
                        <li><a href="https://www.jeevansathi.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jeevansathi.png"
                                    alt="Jeevansathi.com" /></a></li>
                        <li><a href="https://www.naukrigulf.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/ng_v1.png"
                                    alt="Naukri Gulf" /></a></li>
                        <li><a href="https://www.shiksha.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/shiksha.png"
                                    alt="Shiksha.com" /></a></li>
                        <li><a href="https://www.iimjobs.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/iimjobs.png"
                                    alt="IIMJobs.com" /></a></li>
                        <li><a href="https://www.hirist.tech/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/hirist_v1.png"
                                    alt="hirist.tech" /></a></li>
                        <li><a href="https://www.jobhai.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/jobhai.png"
                                    alt="JobHai.com" /></a></li>
                        <li><a href="https://doselect.com/" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/doselect.png"
                                    alt="Doselect.com" /></a></li>
                        <li><a href="https://www.naukri.com/minis" target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/minis.png"
                                    alt="Minis" /></a></li>
                        <li><a href="https://www.codingninjas.com/?utm_source=naukri&amp;utm_medium=desktop-footer"
                                target="_blank"><img
                                    src="https://static.naukimg.com/s/0/0/i/new-homepage/footer-logos/coding_ninjas.png"
                                    alt="Coding Ninjas" /></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>




    <div class="cookie-banner" id="cookie-banner">
        <span>
            We use cookies to improve your experience. By continuing to browse the site, you agree to our
            <a href="<?= base_url('privacy-policy'); ?>">Privacy Policy</a> &amp; <a
                href="<?= base_url('cookie-policy') ?>">Cookie Policy</a>
        </span>
        <button class="cookie-btn" onclick="hideCookieBanner()">Got it</button>
    </div>
</body>

</html>