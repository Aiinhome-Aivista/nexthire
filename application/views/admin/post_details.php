<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Base</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add Nunito font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<style>
    /*
        Updated CSS for a responsive, auto-adjusting layout with 3 cards per row
    */
    body {
        font-family: 'Nunito', Arial, sans-serif !important;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        /* cleaner spacing between cards */
        justify-content: center;
        /* center cards in the middle */
        margin: 30px auto;
        /* auto for horizontal centering */
        max-width: 1300px;
    }

    .blog-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        flex: 0 0 calc(33.333% - 30px);
        /* Fixed width for exactly 3 cards per row */
        min-width: 260px;
        max-width: calc(33.333% - 30px);
        transition: transform 0.2s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 500px;
    }

    .blog-card:hover {
        transform: translateY(-5px);
    }

    .card-image-container {
        position: relative;
        text-align: center;
        background-color: #e9eff4;
        padding: 20px;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-image-container img {
        max-width: 100%;
        max-height: 180px;
        object-fit: cover;
        border-radius: 4px;
    }

    .card-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        height: 300px;
    }

    .card-content .category {
        font-size: 14px;
        color: #6a0dad;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .card-content .title {
        font-size: 20px;
        color: #333;
        margin: 10px 0;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-content .meta {
        font-size: 12px;
        color: #666;
        margin-bottom: 15px;
        font-style: italic;
    }

    .card-content .summary {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .read-more {
        display: inline-block;
        background-color: #efda56;
        color: #333;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s;
        margin-top: auto;
    }

    .read-more:hover {
        background-color: #e6cf4d;
    }

    .no-image {
        width: 100px;
        height: 100px;
        background: #f0f0f0;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #888;
        font-size: 12px;
    }

    @media (max-width: 1200px) {
        .blog-card {
            flex: 0 0 calc(50% - 10px);
            /* 2 cards per row on medium screens */
            max-width: calc(50% - 10px);
        }
    }

    @media (max-width: 768px) {
        .card-container {
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }

        .blog-card {
            width: 100%;
            max-width: 400px;
            flex: 0 0 100%;
        }
    }

    @media (max-width: 480px) {
        .card-container {
            margin: 15px;
        }

        .blog-card {
            min-width: 100%;
            max-width: 100%;
        }

        .card-content .title {
            font-size: 18px;
        }
    }

    /* New styles for category filter message */
    .category-filter-message {
        width: 100%;
        text-align: center;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        color: #555;
    }

    .category-filter-message .category-name {
        font-weight: bold;
        color: #6a0dad;
    }

    .show-all-link {
        color: #efda56;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
    }

    .show-all-link:hover {
        text-decoration: underline;
    }

    /* Styles for post details page */
    .post-detail-container {
        max-width: 900px;
        margin: 40px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .post-detail-image-container {
        position: relative;
        text-align: center;
        background-color: #e9eff4;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .post-detail-image-container img {
        max-width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 4px;
    }

    .post-detail-content {
        padding: 30px;
    }

    .post-detail-content .category {
        font-size: 14px;
        color: #6a0dad;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .post-detail-content .title {
        font-size: 28px;
        color: #333;
        margin: 15px 0;
        line-height: 1.3;
    }

    .post-detail-content .meta {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
        font-style: italic;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .post-detail-content .full-content {
        font-size: 16px;
        color: #555;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .full-content img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin: 15px 0;
    }

    .back-button {
        display: inline-block;
        background-color: #efda56;
        color: #333;
        padding: 12px 24px;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    .back-button:hover {
        background-color: #e6cf4d;
    }

    .no-image-detail {
        width: 200px;
        height: 200px;
        background: #f0f0f0;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #888;
        font-size: 14px;
    }
</style>

<style>
    /* Comment section styles */
    .comment-section {
        max-width: 900px;
        margin: 40px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .comment-form-container {
        margin-bottom: 30px;
    }

    .comment-form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .comment-form-container textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: 'Nunito', Arial, sans-serif;
        resize: vertical;
        min-height: 100px;
    }

    .comment-item {
        border-bottom: 1px solid #eee;
        padding: 20px 0;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .comment-content {
        color: #555;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .comment-section {
            margin: 20px;
            padding: 20px;
        }

        .comment-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
    }
</style>

<body>

    <div class="post-detail-container">
        <?php if (!empty($post->featured_image)): ?>
            <div class="post-detail-image-container">
                <img src="<?= base_url($post->featured_image) ?>" alt="<?= htmlspecialchars($post->title) ?>">
            </div>
        <?php else: ?>
            <div class="post-detail-image-container">
                <div class="no-image-detail">No Image</div>
            </div>
        <?php endif; ?>

        <div class="post-detail-content">
            <?php if (isset($post->category_name) && !empty($post->category_name)): ?>
                <div class="category"><?= htmlspecialchars($post->category_name) ?></div>
            <?php endif; ?>

            <h1 class="title"><?= htmlspecialchars($post->title) ?></h1>

            <p class="meta">
                By Team SahajJobs /
                <?php if (isset($post->category_name) && !empty($post->category_name)): ?>
                    <?= htmlspecialchars($post->category_name) ?> /
                <?php endif; ?>
                <?= date('F d, Y', strtotime($post->created_at)) ?>
            </p>

            <div class="full-content">
                <?= $post->content ?> <!-- full content with formatting -->
            </div>

            <a href="<?= base_url('knowledgebase') ?>" class="back-button">← Back to Knowledge Base</a>
        </div>
    </div>

    <!-- Add this after the post-detail-container div -->
    <div class="comment-section" style="max-width: 900px; margin: 40px auto; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 30px;">
        <h2 style="color: #333; margin-bottom: 20px;">Comments (<?= $comment_count ?>)</h2>

        <!-- User info and comment form -->
        <div class="comment-form-container" style="margin-bottom: 30px;">
            <?php if ($this->session->userdata('logged_in')): ?>
                <p style="color: #666; margin-bottom: 15px;">
                    Logged in as <strong><?= $this->session->userdata('user_name') ?></strong>.
                    <!-- <a href="<?= base_url('profile') ?>" style="color: #6a0dad;">Edit your profile.</a> -->
                    <!-- <a href="<?= base_url('logout') ?>" style="color: #e42e2e;">Log out?</a> -->
                </p>
                <form id="comment-form">
                    <input type="hidden" name="post_id" value="<?= $post->id ?>">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label for="comment" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">
                            Leave a Comment <span style="color: #e42e2e;">*</span>
                        </label>
                        <textarea
                            name="comment"
                            id="comment"
                            rows="4"
                            style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-family: 'Nunito', Arial, sans-serif; resize: vertical;"
                            placeholder="Type your comment here..."
                            required></textarea>
                    </div>
                    <button
                        type="submit"
                        class="back-button"
                        style="background-color: #efda56; color: #333; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
                        Post Comment
                    </button>
                </form>
            <?php else: ?>
                <p style="color: #666;">
                    Please <a href="<?= base_url('?showLogin=true') ?>" style="color: #6a0dad;">log in</a> to leave a comment.
                </p>
            <?php endif; ?>
        </div>

        <!-- Comments list -->
        <div class="comments-list">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-item" style="border-bottom: 1px solid #eee; padding: 20px 0;">
                        <div class="comment-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <strong style="color: #6a0dad;"><?= htmlspecialchars($comment['full_name']) ?></strong>
                            <span style="color: #666; font-size: 0.9em;">
                                <?= date('F d, Y', strtotime($comment['created_at'])) ?>
                            </span>
                        </div>
                        <div class="comment-content" style="color: #555; line-height: 1.6;">
                            <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color: #666; text-align: center; padding: 20px;">
                    No comments yet. Be the first to comment!
                </p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // AJAX comment submission
        document.getElementById('comment-form')?.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;

            // Show loading state
            submitButton.textContent = 'Posting...';
            submitButton.disabled = true;

            fetch('<?= base_url("admin/post_details/add_comment") ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        this.reset();
                        // Optionally refresh the page to show the new comment (if approved immediately)
                        // location.reload();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    alert('An error occurred. Please try again.');
                    console.error('Error:', error);
                })
                .finally(() => {
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                });
        });
    </script>

</body>

</html>