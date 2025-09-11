<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Preferences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9e9e9;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .header {
            width: 100%;
            max-width: 650px;
            display: flex;
            justify-content: flex-start;
            margin: 20px;
            padding: 0;
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

        .container {
            max-width: 650px;
            width: 100%;
            margin: 0 20px 40px 20px;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .container-header {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #eee;
        }

        .container-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            flex-grow: 1;
            text-align: center;
            color: #333;
        }

        .description {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .qualification-section {
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .qualification-section:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
        }

        .section-header span {
            flex-grow: 1;
        }

        .section-header .icons-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .qualification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .qualification-item i {
            font-size: 20px;
            color: #555;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .qualification-item i:hover {
            color: #007bff;
        }

        .qualification-item span {
            font-size: 16px;
            color: #444;
            flex-grow: 1;
            margin-right: 10px;
        }

        .add-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 15px 0;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .add-link:hover {
            color: #0056b3;
        }

        .add-link i {
            margin-right: 10px;
        }

        /* Modal Styling */
        .modal-header .btn-close {
            background-color: transparent;
            border: none;
            font-size: 1.75rem;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .modal-dialog {
            margin-top: 15vh;
            max-width: 500px;
        }

        .modal-title {
            font-weight: 700;
            color: #333;
        }

        .alert-info {
            background-color: #e7f3ff;
            color: #004085;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 13px;
            border-left: 4px solid #007bff;
        }

        .form-group-inline {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group-inline .form-group {
            flex: 1;
        }

        .form-group-inline label {
            font-weight: 500;
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }

        .form-group-inline input,
        .form-group-inline select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
            color: #333;
        }

        .form-group-inline input:focus,
        .form-group-inline select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .checkbox-group label {
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            font-size: 16px;
            color: #333;
        }

        /* Generic button styling */
        .btn.rounded-lg {
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .btn-primary.rounded-lg {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary.rounded-lg:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary.rounded-lg {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary.rounded-lg:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }

        .btn-danger.rounded-lg {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger.rounded-lg:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        input[type="checkbox"],
        input[type="radio"] {
            accent-color: #007bff;
            margin-right: 5px;
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="<?= base_url('profile'); ?>" class="back-link" aria-label="Go back to profile"><i
                class="fas fa-chevron-left"></i> Back to Profile</a>
    </div>

    <div class="container">
        <div class="container-header">
            <h2>Job Preferences</h2>
        </div>
        <p class="description">Define your ideal job parameters to help us find the best matches for you.</p>

        <?php
        // These variables would typically be populated from your database or session
        $job_title = 'Software Engineer';
        $job_types = ['Full-time'];
        $min_base_pay = 10000;
        $pay_period = 'per month';
        $is_willing_to_relocate = true;
        $work_setting = 'Remote';
        ?>

        <div class="qualification-section" id="job-title-section">
            <div class="section-header">
                <span>Job titles</span>
                <div class="icons-container">
                    <?php if (!empty($job_title)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_title" data-current-value="<?= htmlspecialchars($job_title); ?>"></i>
                    <?php else: ?>
                        <a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_title">
                            Add value
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="jobTitleDisplay"><?= htmlspecialchars($job_title); ?></span>
            </div>
        </div>

        <div class="qualification-section" id="job-types-section">
            <div class="section-header">
                <span>Job types</span>
                <div class="icons-container">
                    <?php if (!empty($job_types)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_types"
                            data-current-values="<?= htmlspecialchars(json_encode($job_types)); ?>"></i>
                    <?php else: ?>
                        <a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_types">
                            Add value
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="jobTypesDisplay"><?= htmlspecialchars(empty($job_types) ? 'Not specified' : implode(', ', $job_types)); ?></span>
            </div>
        </div>

        <div class="qualification-section" id="pay-section">
            <div class="section-header">
                <span>Minimum base pay</span>
                <div class="icons-container">
                    <?php if (!empty($min_base_pay)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="pay" data-current-min-pay="<?= htmlspecialchars($min_base_pay ?? ''); ?>"
                            data-current-pay-period="<?= htmlspecialchars($pay_period ?? ''); ?>"></i>
                    <?php else: ?>
                        <a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="pay">
                            Add value
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="payDisplay">
                    <?php
                    if (!empty($min_base_pay)) {
                        echo '₹' . number_format($min_base_pay) . ' ' . htmlspecialchars($pay_period);
                    } else {
                        echo 'Not specified';
                    }
                    ?>
                </span>
            </div>
        </div>

        <div class="qualification-section" id="relocation-section">
            <div class="section-header">
                <span>Relocation</span>
                <div class="icons-container">
                    <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                        data-modal-type="relocation"
                        data-current-willingness="<?= $is_willing_to_relocate ? 'true' : 'false'; ?>"></i>
                </div>
            </div>
            <div class="qualification-item">
                <span id="relocationDisplay">
                    <?= $is_willing_to_relocate ? 'Not willing to relocate' : 'Willing to relocate'; ?>
                </span>
            </div>
        </div>

        <div class="qualification-section" id="remote-section">
            <div class="section-header">
                <span>Remote Work</span>
                <div class="icons-container">
                    <?php if (!empty($work_setting)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="work_setting" data-current-setting="<?= htmlspecialchars($work_setting); ?>"></i>
                    <?php else: ?>
                        <a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="work_setting">
                            Add value
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="remoteDisplay"><?= htmlspecialchars($work_setting); ?></span>
            </div>
        </div>
    </div>

    <div class="modal fade" id="preferenceModal" tabindex="-1" aria-labelledby="preferenceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="preferenceModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded-lg me-auto" id="deleteButton">Delete</button>
                    <div>
                        <button type="button" class="btn btn-secondary me-2 rounded-lg"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-lg" id="saveButton"
                            form="dynamicForm">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to update the display for each preference
            function updateJobTitleDisplay(title) {
                const displaySpan = $('#jobTitleDisplay');
                const editIcon = $('#job-title-section').find('.edit-icon');
                const addLink = $('#job-title-section').find('.add-link');
                const sectionHeader = $('#job-title-section').find('.section-header .icons-container');

                if (title) {
                    displaySpan.text(title);
                    editIcon.data('current-value', title);
                    if (addLink.length) {
                        addLink.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_title" data-current-value="' + title + '"></i>');
                    }
                } else {
                    displaySpan.text('Not specified');
                    editIcon.remove();
                    if (!addLink.length) {
                        sectionHeader.append('<a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_title">Add value</a>');
                    }
                }
            }

            function updateJobTypesDisplay(types) {
                const displaySpan = $('#jobTypesDisplay');
                const editIcon = $('#job-types-section').find('.edit-icon');
                const addLink = $('#job-types-section').find('.add-link');
                const sectionHeader = $('#job-types-section').find('.section-header .icons-container');

                if (types.length > 0) {
                    displaySpan.text(types.join(', '));
                    editIcon.data('current-values', JSON.stringify(types));
                    if (addLink.length) {
                        addLink.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_types" data-current-values=\'' + JSON.stringify(types) + '\'></i>');
                    }
                } else {
                    displaySpan.text('Not specified');
                    editIcon.remove();
                    if (!addLink.length) {
                        sectionHeader.append('<a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_types">Add value</a>');
                    }
                }
            }

            function updatePayDisplay(minPay, payPeriod) {
                const displaySpan = $('#payDisplay');
                const editIcon = $('#pay-section').find('.edit-icon');
                const addLink = $('#pay-section').find('.add-link');
                const sectionHeader = $('#pay-section').find('.section-header .icons-container');
                if (minPay && minPay !== 'null') {
                    const formattedPay = parseFloat(minPay).toLocaleString();
                    displaySpan.text(`₹${formattedPay} ${payPeriod}`);
                    editIcon.data('current-min-pay', minPay).data('current-pay-period', payPeriod);
                    if (addLink.length) {
                        addLink.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="pay" data-current-min-pay="' + minPay + '" data-current-pay-period="' + payPeriod + '"></i>');
                    }
                } else {
                    displaySpan.text('Not specified');
                    editIcon.remove();
                    if (!addLink.length) {
                        sectionHeader.append('<a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="pay">Add value</a>');
                    }
                }
            }

            function updateRelocationDisplay(isWilling) {
                const displaySpan = $('#relocationDisplay');
                const editIcon = $('#relocation-section').find('.edit-icon');
                displaySpan.text(isWilling ? 'Willing to relocate' : 'Not willing to relocate');
                editIcon.data('current-willingness', isWilling ? 'true' : 'false');
            }

            function updateRemoteDisplay(setting) {
                const displaySpan = $('#remoteDisplay');
                const editIcon = $('#remote-section').find('.edit-icon');
                const addLink = $('#remote-section').find('.add-link');
                const sectionHeader = $('#remote-section').find('.section-header .icons-container');
                if (setting) {
                    displaySpan.text(setting);
                    editIcon.data('current-setting', setting);
                    if (addLink.length) {
                        addLink.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="work_setting" data-current-setting="' + setting + '"></i>');
                    }
                } else {
                    displaySpan.text('Not specified');
                    editIcon.remove();
                    if (!addLink.length) {
                        sectionHeader.append('<a href="#" class="add-link" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="work_setting">Add value</a>');
                    }
                }
            }

            // Event listener for when the modal is about to be shown
            $('#preferenceModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                const modalType = button.data('modal-type');
                const modal = $(this);
                let modalHtml = '';

                // Store the current modal type for the save and delete buttons
                modal.data('current-modal-type', modalType);

                // Logic for populating the modal based on the button's data attribute
                switch (modalType) {
                    case 'job_title':
                        const currentJobTitle = button.data('current-value') || '';
                        modal.find('.modal-title').text('Edit Job Title');
                        modalHtml = `
                            <form id="dynamicForm">
                                <div class="mb-3">
                                    <label class="form-label">Desired Job Title *</label>
                                    <input type="text" class="form-control rounded-lg" name="job_title" value="${currentJobTitle}" required>
                                </div>
                            </form>
                        `;
                        break;
                    case 'job_types':
                        const currentJobTypes = button.data('current-values') || [];
                        modal.find('.modal-title').text('Edit Job Types');
                        const jobTypeOptions = ['Full-time', 'Permanent', 'Fresher', 'Part-time', 'Internship', 'Contractual / Temporary', 'Freelance', 'Volunteer'];
                        let jobTypeCheckboxesHtml = '';
                        jobTypeOptions.forEach(type => {
                            const isChecked = currentJobTypes.includes(type) ? 'checked' : '';
                            const cleanId = type.replace(/[\s/]+/g, '').toLowerCase();
                            jobTypeCheckboxesHtml += `
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="${cleanId}Checkbox" name="job_types[]" value="${type}" ${isChecked}>
                                    <label class="form-check-label" for="${cleanId}Checkbox">${type}</label>
                                </div>
                            `;
                        });
                        modalHtml = `
                            <form id="dynamicForm">
                                <p>What are your desired job types?</p>
                                ${jobTypeCheckboxesHtml}
                            </form>
                        `;
                        break;
                    case 'pay':
                        const currentMinPay = button.data('current-min-pay') || '';
                        const currentPayPeriod = button.data('current-pay-period') || 'per month';
                        modal.find('.modal-title').text('Edit Pay');
                        modalHtml = `
                            <p>What is the minimum pay you'll consider in your search?</p>
                            <div class="alert-info">Not shown to employers.</div>
                            <form id="dynamicForm">
                                <div class="form-group-inline">
                                    <div class="form-group">
                                        <label for="minPayInput">Minimum base pay</label>
                                        <input type="number" id="minPayInput" name="min_base_pay" class="form-control rounded-lg" value="${currentMinPay}" placeholder="e.g., 10000">
                                    </div>
                                    <div class="form-group">
                                        <label for="payPeriodInput">Pay period</label>
                                        <select id="payPeriodInput" name="pay_period" class="form-control rounded-lg">
                                            <option value="per month" ${currentPayPeriod === 'per month' ? 'selected' : ''}>per month</option>
                                            <option value="per year" ${currentPayPeriod === 'per year' ? 'selected' : ''}>per year</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        `;
                        break;
                    case 'relocation':
                        const currentWillingness = button.data('current-willingness') === 'true';
                        modal.find('.modal-title').text('Edit Relocation Preference');
                        modalHtml = `
                            <p>Are you willing to relocate?</p>
                            <form id="dynamicForm">
                                <div class="form-check checkbox-group">
                                    <input type="checkbox" class="form-check-input" id="relocationCheckbox" name="is_willing_to_relocate" ${currentWillingness ? 'checked' : ''}>
                                    <label class="form-check-label" for="relocationCheckbox">Yes, I'm willing to relocate</label>
                                </div>
                            </form>
                        `;
                        break;
                    case 'work_setting':
                        const currentSetting = button.data('current-setting') || '';
                        modal.find('.modal-title').text('Edit Remote Work Preference');
                        modalHtml = `
                            <p>Desired work setting</p>
                            <form id="dynamicForm">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="remoteOption" name="work_setting" value="Remote" ${currentSetting === 'Remote' ? 'checked' : ''}>
                                    <label class="form-check-label" for="remoteOption">Remote</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="hybridOption" name="work_setting" value="Hybrid work" ${currentSetting === 'Hybrid work' ? 'checked' : ''}>
                                    <label class="form-check-label" for="hybridOption">Hybrid work</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="inPersonOption" name="work_setting" value="In-person" ${currentSetting === 'In-person' ? 'checked' : ''}>
                                    <label class="form-check-label" for="inPersonOption">In-person</label>
                                </div>
                            </form>
                        `;
                        break;
                }
                modal.find('#modal-content').html(modalHtml);
            });

            // Save button click handler
            $('#saveButton').on('click', function (e) {
                e.preventDefault();
                const modal = $('#preferenceModal');
                const modalType = modal.data('current-modal-type');
                const form = modal.find('#dynamicForm');

                let dataToSend = form.serialize();

                // Specific data handling for certain form types
                if (modalType === 'relocation') {
                    const isChecked = $('#relocationCheckbox').is(':checked');
                    dataToSend = { 'is_willing_to_relocate': isChecked };
                } else if (modalType === 'job_types') {
                    const selectedTypes = form.find('input[name="job_types[]"]:checked').map(function () {
                        return $(this).val();
                    }).get();
                    dataToSend = { 'job_types': selectedTypes };
                }

                let ajaxUrl = '';
                let callback = () => { };

                switch (modalType) {
                    case 'job_title':
                        ajaxUrl = '<?= base_url('jobpreferences/update_job_title'); ?>';
                        callback = () => updateJobTitleDisplay(form.find('input[name="job_title"]').val());
                        break;
                    case 'job_types':
                        ajaxUrl = '<?= base_url('jobpreferences/update_job_types'); ?>';
                        callback = () => updateJobTypesDisplay(dataToSend.job_types);
                        break;
                    case 'pay':
                        ajaxUrl = '<?= base_url('jobpreferences/update_pay'); ?>';
                        callback = () => updatePayDisplay(form.find('input[name="min_base_pay"]').val(), form.find('select[name="pay_period"]').val());
                        break;
                    case 'relocation':
                        ajaxUrl = '<?= base_url('jobpreferences/update_relocation'); ?>';
                        callback = () => updateRelocationDisplay(dataToSend.is_willing_to_relocate);
                        break;
                    case 'work_setting':
                        ajaxUrl = '<?= base_url('jobpreferences/update_work_setting'); ?>';
                        callback = () => updateRemoteDisplay(form.find('input[name="work_setting"]:checked').val());
                        break;
                }

                if (!ajaxUrl) return;

                $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: dataToSend,
                    success: function (response) {
                        if (response.success) {
                            callback();
                            modal.modal('hide');
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error('AJAX Error:', status, error);
                    }
                });
            });

            // Delete button click handler
            $('#deleteButton').on('click', function () {
                if (!confirm('Are you sure you want to delete this preference?')) {
                    return;
                }

                const modal = $('#preferenceModal');
                const modalType = modal.data('current-modal-type');
                let ajaxUrl = '';
                let callback = () => { };

                switch (modalType) {
                    case 'job_title':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_job_title'); ?>';
                        callback = () => updateJobTitleDisplay('');
                        break;
                    case 'job_types':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_job_types'); ?>';
                        callback = () => updateJobTypesDisplay([]);
                        break;
                    case 'pay':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_pay'); ?>';
                        callback = () => updatePayDisplay(null, 'per month');
                        break;
                    case 'relocation':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_relocation'); ?>';
                        callback = () => updateRelocationDisplay(false);
                        break;
                    case 'work_setting':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_work_setting'); ?>';
                        callback = () => updateRemoteDisplay('');
                        break;
                }

                if (!ajaxUrl) return;

                $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            callback();
                            modal.modal('hide');
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        });
    </script>
</body>
</html>