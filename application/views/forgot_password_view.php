<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .forgot-password-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .forgot-password-container h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border-radius: 8px;
        }

        .alert {
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forgot-password-container">
            <div id="step1">
                <h2>Forgot Password</h2>
                <form id="email-form">
                    <div id="email-msg"></div>
                    <div class="form-group">
                        <label for="email">Registered Email ID</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your registered email ID" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn" style="color: black; background-color: FFF44F;" id="validate-btn">Validate</button>
                    </div>
                </form>
            </div>

            <div id="step2" style="display:none;">
                <h2>Reset Password</h2>
                <form id="password-form">
                    <div id="password-msg"></div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" class="form-control" id="new-password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Verify Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_password"
                            required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn" style="color: black; background-color: FFF44F;" id="reset-btn">Submit</button>
                    </div>
                </form>
            </div>

            <div id="step3" style="display:none;">
                <h2 class="text-success">Password Changed!</h2>
                <p class="alert alert-success">Your password has been successfully updated. Redirecting...</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const baseUrl = '<?= base_url(); ?>';

            // Step 1: Handle email validation
            $('#email-form').on('submit', function (e) {
                e.preventDefault();
                const email = $('#email').val();
                const msgDiv = $('#email-msg');
                const validateBtn = $('#validate-btn');

                msgDiv.html('');
                validateBtn.prop('disabled', true).text('Validating...');

                $.ajax({
                    url: baseUrl + 'login/verify_email',
                    method: 'POST',
                    data: { email: email },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            msgDiv.html('<div class="alert alert-success">Email verified successfully!</div>');
                            setTimeout(function () {
                                $('#step1').hide();
                                $('#step2').show();
                            }, 1000);
                        } else {
                            msgDiv.html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function () {
                        msgDiv.html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                    },
                    complete: function () {
                        validateBtn.prop('disabled', false).text('Validate');
                    }
                });
            });

            // Step 2: Handle password update
            $('#password-form').on('submit', function (e) {
                e.preventDefault();
                const newPassword = $('#new-password').val();
                const confirmPassword = $('#confirm-password').val();
                const msgDiv = $('#password-msg');
                const resetBtn = $('#reset-btn');

                msgDiv.html('');
                resetBtn.prop('disabled', true).text('Updating...');

                if (newPassword.length < 6) {
                    msgDiv.html('<div class="alert alert-danger">Password must be at least 6 characters long.</div>');
                    resetBtn.prop('disabled', false).text('Submit');
                    return;
                }

                if (newPassword !== confirmPassword) {
                    msgDiv.html('<div class="alert alert-danger">Passwords do not match.</div>');
                    resetBtn.prop('disabled', false).text('Submit');
                    return;
                }

                $.ajax({
                    url: baseUrl + 'login/update_password',
                    method: 'POST',
                    data: { new_password: newPassword, confirm_password: confirmPassword },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $('#step2').hide();
                            $('#step3').show();
                            setTimeout(function () {
                                window.location.href = baseUrl;
                            }, 3000);
                        } else {
                            msgDiv.html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function () {
                        msgDiv.html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                    },
                    complete: function () {
                        resetBtn.prop('disabled', false).text('Submit');
                    }
                });
            });
        });
    </script>
</body>
</html>
