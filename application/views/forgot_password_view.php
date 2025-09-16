<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Forgot Password</title>
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

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forgot-password-container">
            <div id="step1">
                <h2>Forgot Password</h2>
                <form id="email-form">
                    <div class="form-group">
                        <label for="email">Registered Email ID</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your registered email ID" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn" style="color: black; background-color: FFF44F;" id="validate-btn">Validate</button>
                    </div>
                    <div id="email-error" class="alert alert-danger" style="display: none;"></div>
                </form>
            </div>

            <div id="step2" style="display:none;">
                <h2>Reset Password</h2>
                <form id="password-form">
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
                    <div id="password-error" class="alert alert-danger" style="display: none;"></div>
                </form>
            </div>

            <div id="step3" style="display:none;">
                <h2 class="text-success">Password Changed!</h2>
                <p class="alert-success">Your password has been successfully updated. Redirecting...</p>
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
                const errorDiv = $('#email-error');
                const validateBtn = $('#validate-btn');
                
                errorDiv.hide();
                validateBtn.prop('disabled', true).text('Validating...');

                if (email.trim() === '') {
                    errorDiv.text('Please enter your email address.').show();
                    validateBtn.prop('disabled', false).text('Validate');
                    return;
                }

                $.ajax({
                    url: baseUrl + 'Login/verify_email',
                    method: 'POST',
                    data: { email: email },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $('#step1').hide();
                            $('#step2').show();
                        } else {
                            errorDiv.text(response.message).show();
                        }
                    },
                    error: function () {
                        errorDiv.text('An error occurred. Please try again.').show();
                    },
                    complete: function() {
                        validateBtn.prop('disabled', false).text('Validate');
                    }
                });
            });

            // Step 2: Handle password update and redirection
            $('#password-form').on('submit', function (e) {
                e.preventDefault();
                const newPassword = $('#new-password').val();
                const confirmPassword = $('#confirm-password').val();
                const errorDiv = $('#password-error');
                const resetBtn = $('#reset-btn');

                errorDiv.hide();
                resetBtn.prop('disabled', true).text('Updating...');

                if (newPassword.length < 6) {
                    errorDiv.text('Password must be at least 6 characters long.').show();
                    resetBtn.prop('disabled', false).text('Submit');
                    return;
                }

                if (newPassword !== confirmPassword) {
                    errorDiv.text('Passwords do not match.').show();
                    resetBtn.prop('disabled', false).text('Submit');
                    return;
                }

                $.ajax({
                    url: baseUrl + 'login/update_password',
                    method: 'POST',
                    data: {
                        new_password: newPassword,
                        confirm_password: confirmPassword
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $('#step2').hide();
                            $('#step3').show();
                            // Redirect to login page after 3 seconds
                            setTimeout(function() {
                                window.location.href = baseUrl;
                            }, 3000); // 3-second delay
                        } else {
                            errorDiv.text(response.message).show();
                            resetBtn.prop('disabled', false).text('Submit');
                        }
                    },
                    error: function () {
                        errorDiv.text('An error occurred. Please try again.').show();
                        resetBtn.prop('disabled', false).text('Submit');
                    }
                });
            });
        });
    </script>
</body>

</html>