<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qualifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:  #cecbcbff;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            max-width: 100%;
            margin: 0 auto;
            background-color: #e2e0e0ff;
            padding: 32px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .header h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }

        .header a {
            color: #333;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .description {
            color: #767676;
            font-size: 14px;
            margin-bottom: 30px;
            text-align: center;
        }

        .qualification-section {
            border-bottom: 1px solid #d4d2d0;
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
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 0;
            cursor: pointer;
            background-color: #919396e3;
            color: black;
            padding: 12px 15px;
            border-radius: 4px 4px 0 0;
        }

        .section-header .fas.fa-plus {
            font-size: 20px;
            color: black;
            margin-left: 10px;
        }

        /* --- New Icons Styling --- */
        .header-icons {
            display: flex;
            align-items: center;
            gap: 15px;f
            /* Space between icons */
        }

        .header-icons .fas {
            font-size: 18px;
            color:rgba(0, 0, 0, 0.98);
            cursor: pointer;
        }

        .header-icons .fa-check-square {
            /* Select All icon */
            color: black;
            /* Initial color, can change on selection */
        }

        .header-icons .fa-trash-alt {
            /* Delete All icon */
            color: black;
            /* Initial color, can change on selection */
        }

        .header-icons .fa-trash-alt.disabled {
            /* Disabled delete all icon */
            color: rgba(0, 0, 0, 0.98);
            cursor: not-allowed;
        }

        .table-responsive {
            margin-top: 0;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 4px 4px;
            overflow: hidden;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
            color: #212529;
            border-collapse: collapse;
        }

        .table thead th {
            vertical-align: middle;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
            padding: 0.75rem;
            text-align: left;
            font-weight: bold;
        }

        .table tbody td {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #f5fafffe;
            position: relative;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .action-icons-container {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            padding: 0;
            height: 100%;
            align-items: center;
        }

        .table thead th.text-center {
            text-align: right !important;
            padding-right: 25px;
        }

        .table tbody td i {
            font-size: 1.1rem;
            cursor: pointer;
            color: #6c757d;
        }

        .table tbody td .delete-icon {
            color: #090909ff;
        }



        .no-items-message {
            font-style: italic;
            color: #6c757d;
            text-align: center;
            padding: 15px;
        }

        /* Styles for inline form inputs */
        .inline-form-control {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .inline-form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .save-cancel-buttons {
            display: flex;
            gap: 5px;
            justify-content: flex-end;
            margin-top: 0;
        }

        .save-btn,
        .cancel-btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 0.25rem;
            cursor: pointer;
            border: none;
        }

        .save-btn {
            background-color: #e0d912ed;
            color: black;
        }

        .cancel-btn {
            background-color: #000000ff;
            color: white;
        }

        .d-grid {
            margin-top: 32px !important;
        }

        /* Styling for selectable rows */
        .table-selectable tbody tr.selected {
            background-color: #070707ff !important;
            /* Highlight selected row */
        }

        .table-selectable tbody tr td:first-child {
            /* Checkbox column */
            width: 30px;
            /* Adjust width for checkbox */
            padding: 0.75rem 0.5rem;
        }

        .table-selectable tbody tr td input[type="checkbox"] {
            margin: 0;
            transform: scale(1.2);
            /* Make checkbox slightly larger */
        }
    </style>
</head>

<body>

            
    <div class="container-fluid">
       
        <div class="header">
            <a href="<?= base_url('profile'); ?>" aria-label="Go back to profile"><i class="fas fa-arrow-left"></i></a>
             <img src="<?= base_url('assets/images/jobnest.png'); ?>"  alt="jobnestLogo" class="img-fluid" style="height:50px; width:100px; display: block; margin: 0 auto; float: left; margin-left: 20px;">
            <h2 style="margin-right:150px;">Qualifications</h2>
        </div>

        <p class="description" style="text-align: center;">We use these details to show you jobs that match your unique skills and experience.</p>

        <?php
        $sections = [
            'skills' => ['label' => 'Skills', 'fields' => ['skill_name'], 'header' => 'Skill Name'],
            'work_experience' => ['label' => 'Work Experience', 'fields' => ['job_title', 'company_name'], 'header' => ['Job Title', 'Company Name']],
            'education' => ['label' => 'Education', 'fields' => ['school_name', 'degree'], 'header' => ['School/University', 'Degree']],
            'licenses' => ['label' => 'Licenses', 'fields' => ['license_name'], 'header' => 'License Name'],
            'certifications' => ['label' => 'Certifications', 'fields' => ['cert_name'], 'header' => 'Certification Name'],
            'languages' => ['label' => 'Languages', 'fields' => ['language_name'], 'header' => 'Language']
        ];
        ?>

        <?php foreach ($sections as $type => $meta): ?>
            <div class="qualification-section">
                <div class="section-header" data-section-type="<?= $type; ?>">
                    <span><?= $meta['label']; ?></span>
                    <div class="header-icons">
                        <i class="fas fa-check-square" data-action="select-all" data-section-type="<?= $type; ?>"
                            title="Select All"></i>
                        <i class="fas fa-trash-alt" data-action="delete-selected" data-section-type="<?= $type; ?>"
                            title="Delete Selected" style="display: none;"></i>
                        <i class="fas fa-plus add-icon"></i>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-selectable" id="table-<?= $type; ?>">
                        <thead>
                            <tr id="select-all-checkbox-<?= $type; ?>">
                               
                                
                            </tr>
                        </thead>
                        <tbody id="<?= $type; ?>-list">
                            <?php
                            if (!empty($$type)):
                                ?>
                                <?php foreach ($$type as $item): ?>
                                    <tr data-id="<?= html_escape($item['id']); ?>">
                                        <td class="text-center"><input type="checkbox" class="row-checkbox"></td>
                                        <?php
                                        $fieldValues = [];
                                        foreach ($meta['fields'] as $field) {
                                            $fieldValues[] = html_escape($item[$field] ?? '');
                                        }
                                        foreach ($fieldValues as $value) {
                                            echo "<td>" . $value . "</td>";
                                        }
                                        ?>
                                        <td class="text-end">
                                            <div class="action-icons-container">
                                                <i class="fas fa-trash-alt delete-icon" data-id="<?= html_escape($item['id']); ?>"
                                                    data-type="<?= $type; ?>"></i>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr id="no-items-row-<?= $type; ?>">
                                    <td colspan="<?= count($meta['fields']) + 2; ?>" class="no-items-message">
                                        No <?= strtolower(str_replace('_', ' ', $meta['label'])); ?> added yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-content">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {

            const sectionConfigs = {
                skills: {
                    title: 'Add Skill',
                    fields: [{
                        name: 'skill_name',
                        label: 'Skill Name *'
                    }],
                    db_field: 'skill_name'
                },
                work_experience: {
                    title: 'Add Work Experience',
                    fields: [{
                        name: 'job_title',
                        label: 'Job Title *'
                    }, {
                        name: 'company_name',
                        label: 'Company Name'
                    }],
                    db_field: 'job_title'
                },
                education: {
                    title: 'Add Education',
                    fields: [{
                        name: 'school_name',
                        label: 'School/University *'
                    }, {
                        name: 'degree',
                        label: 'Degree'
                    }],
                    db_field: 'school_name'
                },
                licenses: {
                    title: 'Add License',
                    fields: [{
                        name: 'license_name',
                        label: 'License Name *'
                    }],
                    db_field: 'license_name'
                },
                certifications: {
                    title: 'Add Certification',
                    fields: [{
                        name: 'cert_name',
                        label: 'Certification Name *'
                    }],
                    db_field: 'cert_name'
                },
                languages: {
                    title: 'Add Language',
                    fields: [{
                        name: 'language_name',
                        label: 'Language *'
                    }],
                    db_field: 'language_name'
                }
            };

            // --- ADD ROW HANDLING ---
            $('.add-icon').on('click', function () {
                const sectionType = $(this).closest('.section-header').data('section-type');
                const config = sectionConfigs[sectionType];
                const tbody = $('#' + sectionType + '-list');

                // Remove "No items added yet" message if it exists
                tbody.find('#no-items-row-' + sectionType).remove();

                // Create a new row with input fields
                let newRowHtml = '<tr>';
                // Add a checkbox cell for the new row
                newRowHtml += `<td class="text-center"><input type="checkbox" class="row-checkbox"></td>`;
                config.fields.forEach(field => {
                    newRowHtml += `<td>
                        <input type="text" class="inline-form-control" name="${field.name}" placeholder="${field.label.replace(' *', '')}">
                        <input type="hidden" name="type" value="${sectionType}">
                    </td>`;
                });
                newRowHtml += `
                    <td class="text-end">
                        <div class="action-icons-container save-cancel-buttons">
    <button class="save-btn"><i class="fas fa-save"></i> Save</button>
    <button class="cancel-btn"><i class="fas fa-times"></i> Cancel</button>
</div>
                    </td>
                </tr>`;

                tbody.append(newRowHtml);
            });

            // --- SAVE ROW HANDLING ---
            $(document).on('click', '.save-btn', function () {
                const newRow = $(this).closest('tr');
                const sectionType = newRow.find('input[name="type"]').val();
                const config = sectionConfigs[sectionType];
                const tbody = $('#' + sectionType + '-list');

                let itemData = {
                    type: sectionType
                };
                let displayValues = [];
                let allFieldsFilled = true;

                newRow.find('.inline-form-control').each(function () {
                    const fieldName = $(this).attr('name');
                    const fieldValue = $(this).val().trim();
                    itemData[fieldName] = fieldValue;

                    const isRequired = config.fields.some(f => f.name === fieldName && f.label.includes('*'));
                    if (isRequired && fieldValue === '') {
                        allFieldsFilled = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                        displayValues.push(fieldValue);
                    }
                });

                if (!allFieldsFilled) {
                    alert('Please fill in all required fields.');
                    return;
                }

                $.ajax({
                    url: "<?= base_url('profile/submit_qualification'); ?>", // Use a specific endpoint for single item submission
                    type: "POST",
                    data: itemData,
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            const newItemId = response.id;

                            let displayRowHtml = `<tr data-id="${newItemId}">`;
                            // Add checkbox cell for the saved row
                            displayRowHtml += `<td class="text-center"><input type="checkbox" class="row-checkbox"></td>`;
                            displayValues.forEach(value => {
                                displayRowHtml += `<td>${escapeHtml(value)}</td>`;
                            });
                            displayRowHtml += `
                                <td class="text-end">
                                    <div class="action-icons-container">
                                        
                                        <i class="fas fa-trash-alt delete-icon" data-id="${newItemId}" data-type="${sectionType}"></i>
                                    </div>
                                </td>
                            </tr>`;

                            newRow.replaceWith(displayRowHtml);
                            alert('Item added successfully!');
                        } else {
                            alert("Error saving item: " + response.message);
                            newRow.find('.inline-form-control').removeClass('is-invalid');
                        }
                    },
                    error: function () {
                        alert("An error occurred during save.");
                        newRow.find('.inline-form-control').removeClass('is-invalid');
                    }
                });
            });

            // --- CANCEL ROW HANDLING ---
            $(document).on('click', '.cancel-btn', function () {
                const currentRow = $(this).closest('tr');
                const sectionType = currentRow.find('input[name="type"]').val(); // Get type from hidden input
                currentRow.remove();

                if ($('#' + sectionType + '-list tr').length === 0) {
                    $('#' + sectionType + '-list').append(`
                        <tr id="no-items-row-${sectionType}">
                            <td colspan="${sectionConfigs[sectionType].fields.length + 2}" class="no-items-message">
                                No ${sectionType.replace('_', ' ')} added yet.
                            </td>
                        </tr>
                    `);
                }
            });

            // --- DELETE ICON HANDLING ---
            $(document).on('click', '.delete-icon', function () {
                const listItem = $(this).closest('tr');
                const itemId = $(this).data('id');
                const itemType = $(this).data('type');

                if (confirm("Are you sure you want to delete this item?")) {
                    $.ajax({
                        url: "<?= base_url('profile/delete_qualification'); ?>",
                        type: "POST",
                        data: {
                            id: itemId,
                            type: itemType
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                listItem.remove();
                                if ($('#' + itemType + '-list tr').length === 0) {
                                    $('#' + itemType + '-list').append(`
                                        <tr id="no-items-row-${itemType}">
                                            <td colspan="${sectionConfigs[itemType].fields.length + 2}" class="no-items-message">
                                                No ${itemType.replace('_', ' ')} added yet.
                                            </td>
                                        </tr>
                                    `);
                                }
                                alert('Item deleted successfully!');
                            } else {
                                alert("Delete failed: " + response.message);
                            }
                        },
                        error: function () {
                            alert("An error occurred during deletion.");
                        }
                    });
                }
            });

            // --- EDIT ICON HANDLING (Loads data into modal for editing) ---
            $('#editModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                const itemId = button.data('id');
                const itemType = button.data('type');
                const modal = $(this);
                const config = sectionConfigs[itemType];

                modal.find('.modal-title').text(`Edit ${config.title}`);

                $.ajax({
                    url: "<?= base_url('profile/get_qualification_details'); ?>",
                    type: "GET",
                    data: {
                        id: itemId,
                        type: itemType
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            let formHtml = `<form id="editForm">`;
                            formHtml += `<input type="hidden" name="id" value="${itemId}">`;
                            formHtml += `<input type="hidden" name="type" value="${itemType}">`;

                            config.fields.forEach(field => {
                                formHtml += `
                                    <div class="mb-3">
                                        <label class="form-label">${field.label}</label>
                                        <input type="text" class="form-control rounded-lg" name="${field.name}" value="${escapeHtml(data.item[field.name] || '')}">
                                    </div>
                                `;
                            });

                            formHtml += `
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary rounded-lg">Save Changes</button>
                                </div>
                            </form>`;
                            modal.find('.modal-body').html(formHtml);
                        } else {
                            modal.find('.modal-body').html('<p class="text-danger">Failed to load item details.</p>');
                        }
                    },
                    error: function () {
                        // This is where your error is likely originating.
                        // Check browser console for more details on the network request.
                        modal.find('.modal-body').html('<p class="text-danger">An error occurred while fetching details.</p>');
                        console.error("AJAX error fetching details for item ID:", itemId, "Type:", itemType);
                    }
                });
            });

            // --- HANDLE EDIT FORM SUBMISSION ---
            $('#editModal').on('submit', '#editForm', function (e) {
                e.preventDefault();
                const form = $(this);
                const formData = form.serialize();
                const itemType = form.find('input[name="type"]').val();
                const itemId = form.find('input[name="id"]').val();

                $.ajax({
                    url: "<?= base_url('profile/update_qualification'); ?>",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            bootstrap.Modal.getInstance(form.closest('.modal').get(0)).hide();
                            alert('Changes saved successfully!');
                            const rowToUpdate = $(`#${itemType}-list tr[data-id="${itemId}"]`); // Target row by data-id
                            const config = sectionConfigs[itemType];
                            let displayHtml = `<td class="text-center"><input type="checkbox" class="row-checkbox"></td>`;
                            config.fields.forEach(field => {
                                displayHtml += `<td>${escapeHtml(response.updated_item[field.name] || '')}</td>`;
                            });
                            displayHtml += `<td class="text-end">
                                                <div class="action-icons-container">
                                                    
                                                    <i class="fas fa-trash-alt delete-icon" data-id="${itemId}" data-type="${itemType}"></i>
                                                </div>
                                            </td>`;
                            rowToUpdate.html(displayHtml); // Update the row content
                        } else {
                            alert("Error saving changes: " + response.message);
                        }
                    },
                    error: function () {
                        alert("An error occurred while saving changes.");
                    }
                });
            });

            // --- BULK ACTIONS HANDLING ---

            // Handle individual row checkboxes
            $(document).on('change', '.row-checkbox', function () {
                updateDeleteAllIconState();
                const section = $(this).closest('.qualification-section');
                const sectionType = section.find('.section-header').data('section-type');
                const allChecked = $(`#table-${sectionType} tbody .row-checkbox:checked`).length === $(`#table-${sectionType} tbody .row-checkbox`).length;
                $(`#select-all-checkbox-${sectionType}`).prop('checked', allChecked);
            });

            // Handle "Select All" checkbox
            $(document).on('change', 'input[type="checkbox"][id^="select-all-checkbox-"]', function () {
                const sectionType = $(this).attr('id').replace('select-all-checkbox-', '');
                const isChecked = $(this).prop('checked');
                $(`#table-${sectionType} tbody .row-checkbox`).prop('checked', isChecked);
                updateDeleteAllIconState();
            });

            // Handle "Select All" icon click (alternative to checkbox)
            $(document).on('click', '.header-icons .fa-check-square', function () {
                const sectionType = $(this).data('section-type');
                const isSelected = $(`#select-all-checkbox-${sectionType}`).prop('checked');

                if (isSelected) {
                    $(`#select-all-checkbox-${sectionType}`).prop('checked', false);
                } else {
                    $(`#select-all-checkbox-${sectionType}`).prop('checked', true);
                }
                $(`#table-${sectionType} tbody .row-checkbox`).prop('checked', !isSelected);
                updateDeleteAllIconState();
            });

            // Handle "Delete Selected" icon click
            $(document).on('click', '.header-icons .fa-trash-alt[data-action="delete-selected"]', function () {
                const sectionType = $(this).data('section-type');
                const selectedRows = $(`#table-${sectionType} tbody tr .row-checkbox:checked`).closest('tr');

                if (selectedRows.length === 0) {
                    alert("Please select at least one item to delete.");
                    return;
                }

                if (confirm(`Are you sure you want to delete ${selectedRows.length} selected item(s)?`)) {
                    const itemsToDelete = [];
                    selectedRows.each(function () {
                        itemsToDelete.push({
                            id: $(this).data('id'),
                            type: sectionType
                        });
                    });

                    $.ajax({
                        url: "<?= base_url('profile/delete_qualifications_batch'); ?>", // New batch delete endpoint
                        type: "POST",
                        data: {
                            items: itemsToDelete
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                selectedRows.remove();
                                alert(`${selectedRows.length} item(s) deleted successfully!`);
                                // Re-check if the section is empty
                                if ($('#' + sectionType + '-list tr').length === 0) {
                                    $('#' + sectionType + '-list').append(`
                                        <tr id="no-items-row-${sectionType}">
                                            <td colspan="${sectionConfigs[sectionType].fields.length + 2}" class="no-items-message">
                                                No ${sectionType.replace('_', ' ')} added yet.
                                            </td>
                                        </tr>
                                    `);
                                }
                                updateDeleteAllIconState(); // Reset delete all icon state
                                // Uncheck select all checkbox if needed
                                $(`#select-all-checkbox-${sectionType}`).prop('checked', false);
                            } else {
                                alert("Batch delete failed: " + response.message);
                            }
                        },
                        error: function () {
                            alert("An error occurred during batch deletion.");
                        }
                    });
                }
            });

            // Function to update the state of the "Delete All Selected" icon
            function updateDeleteAllIconState() {
                $('.qualification-section').each(function () {
                    const sectionType = $(this).find('.section-header').data('section-type');
                    const numSelected = $(`#table-${sectionType} tbody .row-checkbox:checked`).length;
                    const deleteAllIcon = $(this).find('.header-icons .fa-trash-alt[data-action="delete-selected"]');

                    if (numSelected > 0) {
                        deleteAllIcon.css('display', 'inline-block'); // Show delete icon
                        deleteAllIcon.removeClass('disabled');
                    } else {
                        deleteAllIcon.css('display', 'none'); // Hide delete icon
                        deleteAllIcon.addClass('disabled');
                    }
                });
            }

            // Initial call to set up delete icon state on page load
            updateDeleteAllIconState();

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

            // Initial check for empty sections to display the message
            $('.qualification-section').each(function () {
                const sectionType = $(this).find('.section-header').data('section-type');
                if ($('#' + sectionType + '-list tr').length === 0) {
                    const colspan = sectionConfigs[sectionType].fields.length + 2; // +1 for checkbox, +1 for actions
                    $('#' + sectionType + '-list').append(`
                        <tr id="no-items-row-${sectionType}">
                            <td colspan="${colspan}" class="no-items-message">
                                No ${sectionType.replace('_', ' ')} added yet.
                            </td>
                        </tr>
                    `);
                }
            });
        });
    </script>
</body>

</html>