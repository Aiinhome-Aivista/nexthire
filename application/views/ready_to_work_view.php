<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ready to work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #e9e9e9;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }
        .container {
            max-width: 650px;
            width: 100%;
            margin: 40px 20px;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }
        .header h2 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            flex-grow: 1;
            color: #333;
        }
        .header a.back-link {
            color: #333;
            font-size: 1.6rem;
            margin-right: 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .header a.back-link:hover {
            color: #007bff;
        }
        .description {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .form-check.form-switch {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .form-check-label {
            font-size: 1.1rem;
            color: #333;
        }
        .form-check-input {
            width: 2.5rem;
            height: 1.5rem;
            margin-left: 1rem;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }
        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 2rem;
        }
        .btn {
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            color: #6c757d;
            border-color: #6c757d;
            background-color: transparent;
        }
        .btn-secondary:hover {
            color: #5a6268;
            border-color: #5a6268;
        }
        .indeed-logo {
            display: block;
            margin: 0 auto 30px;
            max-width: 120px;
        }
        .copyright-text {
            text-align: center;
            margin-top: 3rem;
            font-size: 0.8rem;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="indeed-logo">
            <img src="<?= base_url('assets/images/jobnest.png'); ?>" alt="jobnest" class="img-fluid">
        </div>
        <div class="header">
            <a href="<?= base_url('profile'); ?>" class="back-link" aria-label="Go back to profile"><i class="fas fa-arrow-left"></i></a>
            <h4>Ready to work</h4>
        </div>
        <p class="description">Let employers know that you can begin working straight away.</p>
        <?php
        $is_available = $user_availability;
        ?>
        <form id="readyToWorkForm">
            <div class="form-check form-switch">
                <label class="form-check-label" for="readyToWorkSwitch">
                    I'm available to start immediately
                </label>
                <input class="form-check-input" type="checkbox" role="switch" id="readyToWorkSwitch" name="is_available" <?= $is_available ? 'checked' : '' ?>>
            </div>
            
            <div class="button-group">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <p class="copyright-text">
            ©2025 Indeed – Cookies, Privacy and Terms
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#readyToWorkForm').on('submit', function(e) {
                e.preventDefault();
                const isAvailable = $('#readyToWorkSwitch').is(':checked');
                $.ajax({
                    url: '<?= base_url('profile/updateAvailability'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: { is_available: isAvailable ? 1 : 0 },
                    success: function(response) {
                        if (response.success) {
                            alert('Your availability has been saved successfully.');
                            window.history.back();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        });
    </script>
</body>
</html>