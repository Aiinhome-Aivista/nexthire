<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center - SahajJobs</title>
    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        p {
            margin-bottom: 20px;
            text-align: justify;
        }
        .highlight {
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Help Center</h1>
        <p>Welcome to the SahajJobs Help Center. We are here to assist you with any questions or issues you may have. Below are some common topics to get you started.</p>

        <h2>For Job Seekers</h2>
        <ul>
            <li><strong>How do I create a profile?</strong></li>
            <li><strong>How can I apply for a job?</strong></li>
            <li><strong>What if I forgot my password?</strong></li>
            <li><strong>How can I manage my job alerts?</strong></li>
        </ul>

        <h2>For Employers</h2>
        <ul>
            <li><strong>How do I post a new job?</strong></li>
            <li><strong>How can I view and manage applications?</strong></li>
            <li><strong>What are the pricing options?</strong></li>
            <li><strong>How do I create a company profile?</strong></li>
        </ul>

        <p>If you can't find the answer you're looking for, please feel free to <a href="<?= base_url('report-issue'); ?>">Report an issue</a>.</p>
    </div>
</body>
</html>
<?php include('includes/footer.php'); ?>