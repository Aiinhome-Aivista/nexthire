<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Knowledge Base</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Nunito', Arial, sans-serif !important;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
        margin: 30px auto;
        max-width: 1300px;
    }

    .blog-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        flex: 0 0 calc(33.333% - 30px);
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
</style>

<body>

    <div class="card-container">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="blog-card">
                    <div class="card-image-container">
                        <?php if (!empty($post->featured_image)): ?>
                            <img src="<?= base_url($post->featured_image) ?>" alt="<?= htmlspecialchars($post->title) ?>">
                        <?php else: ?>
                            <div class="no-image">No Image</div>
                        <?php endif; ?>
                    </div>
                    <div class="card-content">
                        <div class="category"><?= htmlspecialchars($post->category_name) ?></div>
                        <h2 class="title"><?= htmlspecialchars($post->title) ?></h2>
                        <p class="meta">Leave a Comment / <?= htmlspecialchars($post->category_name) ?> / Team SahajJobs</p>
                        <p class="summary">
                            <?php
                            $content = strip_tags($post->content);
                            $limited_content = mb_substr($content, 0, 100);

                            if (mb_strlen($content) > 100) {
                                $limited_content .= '...';
                            }

                            echo htmlspecialchars($limited_content);
                            ?>
                        </p>

                        <a href="<?= site_url('knowledge_base/post/' . $post->id) ?>" class="read-more">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="width: 100%; text-align: center; padding: 40px;">
                <p>No blog posts available for the selected category.</p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>