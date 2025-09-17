<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Preferences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #F7F8FA;
            font-family: 'Nunito', Arial, sans-serif;
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

        .add-icon {
            font-size: 18px;
            color: #007bff;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .add-icon:hover {
            color: #0056b3;
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

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background-color: #FFF44F;
            color: black;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: gold;
        }
    </style>
</head>

<body>
    <div class="header" style="display: flex; align-items: center; gap: 10px;">
        <a href="<?= base_url('profile'); ?>" class="back-btn" aria-label="Go back to profile">
            <i class="fas fa-chevron-left"></i> Back to Profile
        </a>

        <img src="<?= base_url('assets/images/SahajJOB2.png'); ?>" alt="SahajJOB2" class="img-fluid"
            style="height:50px; width:140px;">
    </div>

    <div class="container">
        <div class="container-header">
            <h2>Job Preferences</h2>
        </div>
        <p class="description">Define your ideal job parameters to help us find the best matches for you.</p>

        <div class="qualification-section" id="job-title-section">
            <div class="section-header">
                <span>Job titles</span>
                <div class="icons-container">
                    <?php if (!empty($job_title)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_title" data-current-value="<?= htmlspecialchars($job_title); ?>"></i>
                    <?php else: ?>
                        <i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_title"></i>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="jobTitleDisplay">
                    <?= !empty($job_title) ? htmlspecialchars($job_title) : 'Not specified'; ?>
                </span>
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
                        <i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="job_types"></i>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="jobTypesDisplay">
                    <?= !empty($job_types) ? htmlspecialchars(implode(', ', $job_types)) : 'Not specified'; ?>
                </span>
            </div>
        </div>

        <div class="qualification-section" id="pay-section">
            <div class="section-header">
                <span>Minimum base pay</span>
                <div class="icons-container">
                    <?php if (!empty($min_base_pay)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="pay" data-current-min-pay="<?= htmlspecialchars($min_base_pay); ?>"
                            data-current-pay-period="<?= htmlspecialchars($pay_period); ?>"></i>
                    <?php else: ?>
                        <i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="pay"></i>
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
                    <?= $is_willing_to_relocate ? 'Willing to relocate' : 'Not willing to relocate'; ?>
                </span>
            </div>
        </div>

        <div class="qualification-section" id="remote-section">
            <div class="section-header">
                <span>Remote Work</span>
                <div class="icons-container">
                    <?php if (!empty($work_setting)): ?>
                        <i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="work_setting"
                            data-current-setting="<?= htmlspecialchars($work_setting); ?>"></i>
                    <?php else: ?>
                        <i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal"
                            data-modal-type="work_setting"></i>
                    <?php endif; ?>
                </div>
            </div>
            <div class="qualification-item">
                <span id="remoteDisplay">
                    <?= !empty($work_setting) ? htmlspecialchars($work_setting) : 'Not specified'; ?>
                </span>
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
                const addIcon = $('#job-title-section').find('.add-icon');
                const sectionHeader = $('#job-title-section').find('.section-header .icons-container');
                if (title) {
                    displaySpan.text(title);
                    if (addIcon.length) {
                        addIcon.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_title" data-current-value="' + escapeHtml(title) + '"></i>');
                    } else if (editIcon.length) {
                        editIcon.data('current-value', title);
                    }
                } else {
                    displaySpan.text('Not specified');
                    if (editIcon.length) {
                        editIcon.remove();
                    }
                    if (!addIcon.length) {
                        sectionHeader.append('<i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_title"></i>');
                    }
                }
            }

            function updateJobTypesDisplay(types) {
                const displaySpan = $('#jobTypesDisplay');
                const editIcon = $('#job-types-section').find('.edit-icon');
                const addIcon = $('#job-types-section').find('.add-icon');
                const sectionHeader = $('#job-types-section').find('.section-header .icons-container');
                if (types && types.length > 0) {
                    displaySpan.text(types.join(', '));
                    if (addIcon.length) {
                        addIcon.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_types" data-current-values=\'' + JSON.stringify(types) + '\'></i>');
                    } else if (editIcon.length) {
                        editIcon.data('current-values', JSON.stringify(types));
                    }
                } else {
                    displaySpan.text('Not specified');
                    if (editIcon.length) {
                        editIcon.remove();
                    }
                    if (!addIcon.length) {
                        sectionHeader.append('<i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="job_types"></i>');
                    }
                }
            }

            function updatePayDisplay(minPay, payPeriod) {
                const displaySpan = $('#payDisplay');
                const editIcon = $('#pay-section').find('.edit-icon');
                const addIcon = $('#pay-section').find('.add-icon');
                const sectionHeader = $('#pay-section').find('.section-header .icons-container');
                if (minPay && minPay !== 'null') {
                    const formattedPay = parseFloat(minPay).toLocaleString();
                    displaySpan.text(`₹${formattedPay} ${payPeriod}`);
                    if (addIcon.length) {
                        addIcon.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="pay" data-current-min-pay="' + minPay + '" data-current-pay-period="' + payPeriod + '"></i>');
                    } else if (editIcon.length) {
                        editIcon.data('current-min-pay', minPay).data('current-pay-period', payPeriod);
                    }
                } else {
                    displaySpan.text('Not specified');
                    if (editIcon.length) {
                        editIcon.remove();
                    }
                    if (!addIcon.length) {
                        sectionHeader.append('<i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="pay"></i>');
                    }
                }
            }

            function updateRelocationDisplay(isWilling) {
                const displaySpan = $('#relocationDisplay');
                const editIcon = $('#relocation-section').find('.edit-icon');
                displaySpan.text(isWilling ? 'Willing to relocate' : 'Not willing to relocate');
                editIcon.data('current-willingness', isWilling);
            }

            function updateRemoteDisplay(setting) {
                const displaySpan = $('#remoteDisplay');
                const editIcon = $('#remote-section').find('.edit-icon');
                const addIcon = $('#remote-section').find('.add-icon');
                const sectionHeader = $('#remote-section').find('.section-header .icons-container');
                if (setting) {
                    displaySpan.text(setting);
                    if (addIcon.length) {
                        addIcon.remove();
                        sectionHeader.append('<i class="fas fa-edit edit-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="work_setting" data-current-setting="' + escapeHtml(setting) + '"></i>');
                    } else if (editIcon.length) {
                        editIcon.data('current-setting', setting);
                    }
                } else {
                    displaySpan.text('Not specified');
                    if (editIcon.length) {
                        editIcon.remove();
                    }
                    if (!addIcon.length) {
                        sectionHeader.append('<i class="fas fa-plus add-icon" data-bs-toggle="modal" data-bs-target="#preferenceModal" data-modal-type="work_setting"></i>');
                    }
                }
            }

            const preferenceModal = $('#preferenceModal');
            const saveButton = $('#saveButton');
            const deleteButton = $('#deleteButton');
            let modalType = '';

            $(document).on('click', '.edit-icon, .add-icon', function () {
                modalType = $(this).data('modal-type');
                preferenceModal.find('.modal-title').text(formatModalTitle(modalType));
                loadModalContent(modalType, $(this).data());

                // Show/hide delete button based on modal type and icon clicked
                if (modalType === 'relocation' || $(this).hasClass('edit-icon')) {
                    deleteButton.show();
                } else {
                    deleteButton.hide();
                }
            });

            function formatModalTitle(type) {
                const titles = {
                    'job_title': 'Edit Job Title',
                    'job_types': 'Edit Job Types',
                    'pay': 'Edit Minimum Pay',
                    'relocation': 'Edit Relocation Preference',
                    'work_setting': 'Edit Work Setting'
                };
                return titles[type] || 'Job Preferences';
            }

            function loadModalContent(type, data) {
                let content = '';
                switch (type) {
                    case 'job_title':
                        const jobTitle = data.currentValue || '';
                        content = `
                        <form id="dynamicForm" action="<?= base_url('jobpreferences/update_job_title'); ?>">
                            <div class="form-group">
                                <label for="jobTitle">Job Title</label>
                                <input type="text" class="form-control" id="jobTitle" name="job_title" value="${escapeHtml(jobTitle)}" placeholder="e.g., Software Engineer">
                            </div>
                        </form>
                        `;
                        break;
                    case 'job_types':
                        let jobTypes = [];
                        if (data.currentValues) {
                            try {
                                if (typeof data.currentValues === 'string') {
                                    jobTypes = JSON.parse(data.currentValues);
                                } else if (Array.isArray(data.currentValues)) {
                                    jobTypes = data.currentValues;
                                }
                            } catch (e) {
                                console.error('Error parsing job types:', e);
                                jobTypes = [];
                            }
                        }
                        const typeOptions = ['Permanent', 'Contract', 'Temporary', 'Internship', 'Fresher'];
                        content = `<form id="dynamicForm" action="<?= base_url('jobpreferences/update_job_types'); ?>">`;
                        typeOptions.forEach(option => {
                            const isChecked = jobTypes.includes(option) ? 'checked' : '';
                            content += `
                            <div class="form-check checkbox-group mb-2">
                                <input class="form-check-input" type="checkbox" name="job_types[]" value="${option}" id="jobType-${option}" ${isChecked}>
                                <label class="form-check-label" for="jobType-${option}">${option}</label>
                            </div>
                            `;
                        });
                        content += `</form>`;
                        break;
                    case 'pay':
                        const minPay = data.currentMinPay || '';
                        const payPeriod = data.currentPayPeriod || 'per month';
                        content = `
                        <form id="dynamicForm" action="<?= base_url('jobpreferences/update_pay'); ?>">
                            <div class="alert alert-info">Enter the minimum base pay you are looking for.</div>
                            <div class="form-group-inline">
                                <div class="form-group">
                                    <label for="minBasePay">Minimum Base Pay (₹)</label>
                                    <input type="number" class="form-control" id="minBasePay" name="min_base_pay" value="${minPay}" placeholder="e.g., 250000">
                                </div>
                                <div class="form-group">
                                    <label for="payPeriod">Pay Period</label>
                                    <select class="form-control" id="payPeriod" name="pay_period">
                                        <option value="per month" ${payPeriod === 'per month' ? 'selected' : ''}>per month</option>
                                        <option value="per year" ${payPeriod === 'per year' ? 'selected' : ''}>per year</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        `;
                        break;
                    case 'relocation':
                        const isWilling = data.currentWillingness === 'true';
                        content = `
                        <form id="dynamicForm" action="<?= base_url('jobpreferences/update_relocation'); ?>">
                            <div class="form-check checkbox-group mb-2">
                                <input class="form-check-input" type="checkbox" name="is_willing_to_relocate" id="relocationCheckbox" ${isWilling ? 'checked' : ''}>
                                <label class="form-check-label" for="relocationCheckbox">Willing to relocate</label>
                            </div>
                        </form>
                        `;
                        break;
                    case 'work_setting':
                        const workSetting = data.currentSetting || '';
                        const settingOptions = ['In-office', 'Hybrid', 'Remote'];
                        content = `<form id="dynamicForm" action="<?= base_url('jobpreferences/update_work_setting'); ?>">`;
                        settingOptions.forEach(option => {
                            const isChecked = workSetting === option ? 'checked' : '';
                            content += `
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="work_setting" id="workSetting-${option}" value="${option}" ${isChecked}>
                                <label class="form-check-label" for="workSetting-${option}">${option}</label>
                            </div>
                            `;
                        });
                        content += `</form>`;
                        break;
                    default:
                        break;
                }
                $('#modal-content').html(content);
            }

            saveButton.on('click', function (e) {
                e.preventDefault();
                const form = $('#dynamicForm');
                const formData = form.serialize();
                const ajaxUrl = form.attr('action');

                $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            switch (modalType) {
                                case 'job_title':
                                    updateJobTitleDisplay($('#jobTitle').val());
                                    break;
                                case 'job_types':
                                    const selectedTypes = [];
                                    $('input[name="job_types[]"]:checked').each(function () {
                                        selectedTypes.push($(this).val());
                                    });
                                    updateJobTypesDisplay(selectedTypes);
                                    break;
                                case 'pay':
                                    updatePayDisplay($('#minBasePay').val(), $('#payPeriod').val());
                                    break;
                                case 'relocation':
                                    updateRelocationDisplay($('#relocationCheckbox').is(':checked'));
                                    break;
                                case 'work_setting':
                                    updateRemoteDisplay($('input[name="work_setting"]:checked').val());
                                    break;
                            }
                            preferenceModal.modal('hide');
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

            deleteButton.on('click', function () {
                const modal = preferenceModal;
                let ajaxUrl = '';
                let callback;

                switch (modalType) {
                    case 'job_title':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_job_title'); ?>';
                        callback = () => updateJobTitleDisplay(null);
                        break;
                    case 'job_types':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_job_types'); ?>';
                        callback = () => updateJobTypesDisplay([]);
                        break;
                    case 'pay':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_pay'); ?>';
                        callback = () => updatePayDisplay(null, null);
                        break;
                    case 'relocation':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_relocation'); ?>';
                        callback = () => updateRelocationDisplay(false);
                        break;
                    case 'work_setting':
                        ajaxUrl = '<?= base_url('jobpreferences/delete_work_setting'); ?>';
                        callback = () => updateRemoteDisplay(null);
                        break;
                    default:
                        return;
                }

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

            // Helper function to escape HTML entities
            function escapeHtml(unsafe) {
                if (typeof unsafe !== 'string') return unsafe;
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }
        });
    </script>
</body>

</html>