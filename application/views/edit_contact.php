<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Contact Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f9f9f9;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            max-width: 700px;
            margin-top: 20px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            /* Added for better mobile responsiveness */
        }

        h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
        }

        .form-section {
            margin-bottom: 25px;
        }

        .header {
            width: 100%;
            max-width: 700px;
            /* Match container width */
            display: flex;
            justify-content: flex-start;
            padding: 20px 0 0 20px;
            /* Adjust padding to align with container */
            box-sizing: border-box;
        }

        .header a.back-link {
            color: #333;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.2s ease-in-out;
        }

        .header a.back-link:hover {
            background-color: #e0e0e0;
        }

        .header a.back-link i {
            font-size: 1rem;
        }


        .btn-save {
            background: #0a9d40ff;
            color: #fff;
            font-weight: bold;
        }

        .btn-save:hover {
            background: #07b90aff;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="<?= base_url('profile'); ?>" class="back-link" aria-label="Go back to profile"><i
                class="fas fa-chevron-left"></i> Back to Profile</a>
    </div>

    <div class="container">
        <form action="<?= base_url('profile/update_contact'); ?>" method="post">

            <div class="form-section">
                <h2>Contact Information</h2>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name *</label>
                    <input type="text" name="full_name" class="form-control" id="full_name"
                        value="<?= set_value('full_name', $user['full_name'] ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone *</label>
                    <input type="text" name="mobile_number" class="form-control" id="phone"
                        value="<?= set_value('mobile_number', $user['mobile_number'] ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" id="email"
                        value="<?= set_value('email', $user['email'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="form-section">
                <h2>Location</h2>
                <div class="mb-3">
                    <label for="country" class="form-label">Country *</label>
                    <input type="text" name="country" class="form-control" id="country"
                        value="<?= set_value('country', $location['country'] ?? 'India'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Street address</label>
                    <input type="text" name="street" class="form-control" id="street"
                        value="<?= set_value('street', $location['street'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label for="city_state" class="form-label">City, State *</label>
                    <input type="text" name="city_state" class="form-control" id="city_state"
                        value="<?= set_value('city_state', $location['city_state'] ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" name="area" class="form-control" id="area"
                        value="<?= set_value('area', $location['area'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label for="pincode" class="form-label">Pincode *</label>
                    <input type="text" name="pincode" class="form-control" id="pincode"
                        value="<?= set_value('pincode', $location['pincode'] ?? ''); ?>" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="relocation" id="relocation" value="1"
                        <?= !empty($location['relocation']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="relocation">
                        Yes, I'm willing to relocate
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-save">Save</button>
        </form>
    </div>
</body>

</html>