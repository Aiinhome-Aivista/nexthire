<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fraud Alert - Jobnest</title>
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
        h2 {
            color: #2c3e50;
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
        <h1>Fraud Alert</h1>
        <p>Be aware of fraudulent job offers and scams. Jobnest is committed to creating a safe and secure environment, but it's important for you to be vigilant. Here are some red flags to watch for:</p>

        <h2>Common Fraud Indicators</h2>
        <ul>
            <li>Requests for personal financial information (bank account details, credit card numbers).</li>
            <li>Requests for payment to apply for a job or to receive training materials.</li>
            <li>Promises of guaranteed employment or high-paying jobs with little to no experience.</li>
            <li>Offers sent from generic email addresses (e.g., Gmail, Yahoo) instead of a company domain.</li>
        </ul>

        <h2>What to Do</h2>
        <p>If you encounter a suspicious job offer, please do not respond. Instead, report it to us immediately so we can investigate and take appropriate action. You can report a fraudulent job by contacting our support team or using our <a href="<?= base_url('report-issue'); ?>">Report an issue</a> page.</p>
    </div>
</body>
</html>
<?php include('includes/footer.php'); ?>