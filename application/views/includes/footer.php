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
            padding: 10px 0;
            font-family: Arial, sans-serif;
            z-index: 9999;
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
        }
    </style>
    <script>
        function hideCookieBanner() {
            document.getElementById('cookie-banner').style.display = 'none';
        }
    </script>
</head>

<body>
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