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
            background-color: #f3f2f1;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
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
        }

        .description {
            color: #767676;
            font-size: 14px;
            margin-bottom: 30px;
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
            margin-bottom: 15px;
        }

        .qualification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .qualification-item i {
            font-size: 24px;
            color: #333;
            margin-right: 15px;
        }

        .qualification-item span {
            font-size: 16px;
        }

        .qualification-item .edit-icon {
            color: #2557a7;
            cursor: pointer;
        }

        .list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            color: #4a4a4a;
            line-height: 1.5;
            padding: 5px 0;
            margin-left: 15px;
        }

        .list-item .delete-icon {
            color: #e74c3c;
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 15px;
        }

        .add-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: #2557a7;
            font-weight: bold;
            padding: 15px 0;
            cursor: pointer;
        }

        .add-link:hover {
            color: #1a4481;
        }

        .add-link .icon-container {
            display: flex;
            align-items: center;
        }

        .add-link i {
            font-size: 24px;
            color: #4a4a4a;
            margin-right: 15px;
        }

        .add-link .plus-icon {
            font-size: 24px;
            color: #333;
        }

        .modal-header .btn-close {
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <a href="<?= base_url('profile'); ?>" aria-label="Go back to profile"><i class="fas fa-arrow-left"></i></a>
            <h2>Qualifications</h2>
        </div>

        <p class="description">We use these details to show you jobs that match your unique skills and experience.</p>

        <?php
        $sections = [
            'skills' => ['label' => 'Skills', 'field' => 'skill_name'],
            'work_experience' => ['label' => 'Work Experience', 'field' => 'job_title'],
            'education' => ['label' => 'Education', 'field' => 'school_name'],
            'licenses' => ['label' => 'Licenses', 'field' => 'license_name'],
            'certifications' => ['label' => 'Certifications', 'field' => 'cert_name'],
            'languages' => ['label' => 'Languages', 'field' => 'language_name'],
        ];
        ?>

        <?php foreach ($sections as $type => $meta): ?>
            <div class="qualification-section">
                <div class="section-header">
                    <span><?= $meta['label']; ?></span>
                    <i class="fas fa-plus plus-icon add-link" data-bs-toggle="modal" data-bs-target="#qualificationModal"
                        data-modal-type="<?= $type; ?>"></i>
                </div>
                <div id="<?= $type; ?>-list">
                    <?php if (!empty($$type)): ?>
                        <?php foreach ($$type as $item): ?>
                            <?php
                            $display = '';
                            switch ($type) {
                                case 'skills':
                                    $display = $item['skill_name'];
                                    break;
                                case 'work_experience':
                                    $display = $item['job_title'] . (!empty($item['company_name']) ? ' at ' . $item['company_name'] : '');
                                    break;
                                case 'education':
                                    $display = $item['school_name'] . (!empty($item['degree']) ? ' (' . $item['degree'] . ')' : '');
                                    break;
                                case 'licenses':
                                    $display = $item['license_name'];
                                    break;
                                case 'certifications':
                                    $display = $item['cert_name'];
                                    break;
                                case 'languages':
                                    $display = $item['language_name'];
                                    break;
                            }
                            ?>
                            <div class="list-item" data-id="<?= html_escape($item['id']); ?>" data-type="<?= $type; ?>"
                                data-db-item="true">
                                <span><?= html_escape($display); ?></span>
                                <i class="fas fa-trash-alt delete-icon"></i>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted no-items-message">No <?= strtolower($meta['label']); ?> added yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="d-grid gap-2 mt-4">
            <button id="submitBtn" class="btn btn-primary rounded-lg py-2">Submit All Qualifications</button>
        </div>
    </div>

    <div class="modal fade" id="qualificationModal" tabindex="-1" aria-labelledby="qualificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qualificationModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-content"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Modal form handling
            $('#qualificationModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modalType = button.data('modal-type');
                var modal = $(this);

                var modalForms = {
                    skills: {
                        title: 'Add skills',
                        form: `
                        <form id="skillsForm">
                            <input type="hidden" name="type" value="skills">
                            <div class="mb-3">
                                <label class="form-label">Skill name *</label>
                                <input type="text" class="form-control rounded-lg" name="skill_name" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary rounded-lg">Add</button>
                            </div>
                        </form>
                        `
                    },
                    work_experience: {
                        title: 'Add work experience',
                        form: `
                        <form id="workExperienceForm">
                            <input type="hidden" name="type" value="work_experience">
                            <div class="mb-3">
                                <label class="form-label">Job title *</label>
                                <input type="text" class="form-control rounded-lg" name="job_title" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company name</label>
                                <input type="text" class="form-control rounded-lg" name="company_name">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary rounded-lg">Add</button>
                            </div>
                        </form>
                        `
                    },
                    education: {
                        title: 'Add education',
                        form: `
                        <form id="educationForm">
                            <input type="hidden" name="type" value="education">
                            <div class="mb-3">
                                <label class="form-label">School/University *</label>
                                <input type="text" class="form-control rounded-lg" name="school_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Degree</label>
                                <input type="text" class="form-control rounded-lg" name="degree">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary rounded-lg">Add</button>
                            </div>
                        </form>
                        `
                    },
                    licenses: {
                        title: 'Add licenses',
                        form: `
                        <form id="licensesForm">
                            <input type="hidden" name="type" value="licenses">
                            <div class="mb-3">
                                <label class="form-label">License name *</label>
                                <input type="text" class="form-control rounded-lg" name="license_name" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary rounded-lg">Add</button>
                            </div>
                        </form>
                        `
                    },
                    certifications: {
                        title: 'Add certifications',
                        form: `
                        <form id="certificationsForm">
                            <input type="hidden" name="type" value="certifications">
                            <div class="mb-3">
                                <label class="form-label">Certification name *</label>
                                <input type="text" class="form-control rounded-lg" name="cert_name" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary rounded-lg">Add</button>
                            </div>
                        </form>
                        `
                    },
                    languages: {
                        title: 'Add languages',
                        form: `
                        <form id="languagesForm">
                            <input type="hidden" name="type" value="languages">
                            <div class="mb-3">
                                <label class="form-label">Language *</label>
                                <input type="text" class="form-control rounded-lg" name="language_name" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2 rounded-lg" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary rounded-lg">Add</button>
                            </div>
                        </form>
                        `
                    }
                };

                modal.find('.modal-title').text(modalForms[modalType].title);
                modal.find('.modal-body').html(modalForms[modalType].form);

                // Form submission inside modal
                modal.find('form').on('submit', function (e) {
                    e.preventDefault();
                    const form = $(this);
                    const type = form.find('input[name="type"]').val();
                    const formData = form.serializeArray().reduce((obj, item) => {
                        obj[item.name] = item.value;
                        return obj;
                    }, {});

                    let displayValue = '';
                    switch (type) {
                        case 'skills':
                            displayValue = formData.skill_name;
                            break;
                        case 'work_experience':
                            displayValue = formData.job_title + (formData.company_name ? ' at ' + formData.company_name : '');
                            break;
                        case 'education':
                            displayValue = formData.school_name + (formData.degree ? ' (' + formData.degree + ')' : '');
                            break;
                        case 'licenses':
                            displayValue = formData.license_name;
                            break;
                        case 'certifications':
                            displayValue = formData.cert_name;
                            break;
                        case 'languages':
                            displayValue = formData.language_name;
                            break;
                    }

                    const listContainer = $('#' + type + '-list');
                    listContainer.find('.no-items-message').remove();

                    const newItem = `<div class="list-item" data-type="${type}" data-db-item="false" data-json='${JSON.stringify(formData)}'>
                                        <span>${displayValue}</span>
                                        <i class="fas fa-trash-alt delete-icon"></i>
                                      </div>`;
                    listContainer.append(newItem);

                    bootstrap.Modal.getInstance(modal.get(0)).hide();
                });
            });

            // Delete handler
            $(document).on('click', '.delete-icon', function () {
                const listItem = $(this).closest('.list-item');
                const itemType = listItem.data('type');

                if (confirm("Are you sure you want to delete this item?")) {
                    if (listItem.data('db-item')) {
                        $.ajax({
                            url: "<?= base_url('profile/delete_qualification'); ?>",
                            type: "POST",
                            data: {
                                id: listItem.data('id'),
                                type: itemType
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.success) {
                                    listItem.remove();
                                    if ($('#' + itemType + '-list .list-item').length === 0) {
                                        $('#' + itemType + '-list').append(`<p class="text-muted no-items-message">No ${itemType.replace('_', ' ')} added yet.</p>`);
                                    }
                                } else {
                                    alert("Delete failed: " + response.message);
                                }
                            },
                            error: function () {
                                alert("Error deleting item.");
                            }
                        });
                    } else {
                        listItem.remove();
                        if ($('#' + itemType + '-list .list-item').length === 0) {
                            $('#' + itemType + '-list').append(`<p class="text-muted no-items-message">No ${itemType.replace('_', ' ')} added yet.</p>`);
                        }
                    }
                }
            });

            // Bulk submit
            $('#submitBtn').on('click', function () {
                const qualifications = {
                    skills: [],
                    work_experience: [],
                    education: [],
                    licenses: [],
                    certifications: [],
                    languages: []
                };

                $('.list-item[data-db-item="false"]').each(function () {
                    const type = $(this).data('type');
                    const itemData = $(this).data('json');
                    qualifications[type].push(itemData);
                });

                if (Object.values(qualifications).every(arr => arr.length === 0)) {
                    alert("No new qualifications to save.");
                    return;
                }

                $.ajax({
                    url: "<?= base_url('profile/submit_qualifications'); ?>",
                    type: "POST",
                    data: JSON.stringify(qualifications),
                    contentType: "application/json",
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            alert("All qualifications saved successfully!");
                            location.reload();
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function () {
                        alert("An error occurred while saving.");
                    }
                });
            });
        });
    </script>
</body>

</html>