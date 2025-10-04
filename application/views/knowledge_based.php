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

    /* Pagination Styles - Same as job_post_management.php */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        gap: 8px;
        flex-wrap: wrap;
    }

    .pagination button {
        padding: 8px 12px;
        background-color: #efda56;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s;
    }

    .pagination button:hover:not(:disabled) {
        background-color: #e6cf4d;
    }

    .pagination button:disabled {
        background-color: #f5f7fb;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .pagination span {
        padding: 8px 12px;
        font-size: 14px;
    }

    .page-info {
        margin-left: 15px;
        color: #6c757d;
    }

    /* Table responsive fixes */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    @media (max-width: 768px) {
        .pagination {
            flex-direction: row;
            flex-wrap: nowrap;
            overflow-x: auto;
            justify-content: center;
            align-items: center;
            padding-bottom: 5px;
        }

        .pagination button {
            flex-shrink: 0;
            padding: 6px 10px;
            font-size: 13px;
        }

        .page-info {
            margin: 0;
            flex-shrink: 0;
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .pagination {
            gap: 4px;
        }

        .pagination button {
            padding: 5px 8px;
            font-size: 12px;
        }

        .pagination span {
            padding: 5px 8px;
            font-size: 12px;
        }
    }
</style>

<body>

    <div class="card-container" id="blogCardContainer">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="blog-card" data-id="<?= $post->id ?>">
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
                            // Strip HTML tags and limit to 100 characters
                            $content = strip_tags($post->content);
                            if (strlen($content) > 100) {
                                $limited_content = substr($content, 0, 100) . '...';
                            } else {
                                $limited_content = $content;
                            }
                            echo htmlspecialchars($limited_content);
                            ?>
                        </p>
                        <a href="<?= base_url('admin/post_details/index/') . $post->id ?>" class="read-more">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="width: 100%; text-align: center; padding: 40px;">
                <p>No blog posts available for the selected category.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination Controls -->
    <div class="pagination" id="paginationControls">
        <button id="firstPage">First</button>
        <button id="prevPage">Previous</button>
        <span id="pageNumbers"></span>
        <button id="nextPage">Next</button>
        <button id="lastPage">Last</button>
        <span class="page-info" id="pageInfo"></span>
    </div>

    <script>
        // Search and Pagination functionality
        document.addEventListener('DOMContentLoaded', function() {
            const cardContainer = document.getElementById('blogCardContainer');
            const firstPageBtn = document.getElementById('firstPage');
            const prevPageBtn = document.getElementById('prevPage');
            const nextPageBtn = document.getElementById('nextPage');
            const lastPageBtn = document.getElementById('lastPage');
            const pageNumbers = document.getElementById('pageNumbers');
            const pageInfo = document.getElementById('pageInfo');
            const paginationControls = document.getElementById('paginationControls');

            let allCards = [];
            let filteredCards = [];
            let currentPage = 1;
            const cardsPerPage = 9;

            // Use MutationObserver to detect when card content is loaded
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes.length) {
                        initializeCards();
                    }
                });
            });

            // Start observing the card container for changes
            observer.observe(cardContainer, {
                childList: true
            });

            // Also try to initialize after a short delay in case content is already there
            setTimeout(initializeCards, 500);

            function initializeCards() {
                const cards = Array.from(cardContainer.querySelectorAll('.blog-card'));

                // Only reinitialize if we have cards and they haven't been processed yet
                if (cards.length > 0 && allCards.length === 0) {
                    allCards = cards;
                    filteredCards = [...allCards];

                    // Show pagination controls
                    paginationControls.style.display = 'flex';
                    updatePagination();
                } else if (cardContainer.querySelector('div:not(.blog-card)')) {
                    // If no data message is present, hide pagination
                    paginationControls.style.display = 'none';
                } else if (cards.length === 0) {
                    // If no cards at all, show "no data" message
                    cardContainer.innerHTML = '<div style="width: 100%; text-align: center; padding: 40px;"><p>No blog posts found</p></div>';
                    paginationControls.style.display = 'none';
                }
            }

            // Pagination functionality
            function updatePagination() {
                const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

                if (filteredCards.length === 0) {
                    paginationControls.style.display = 'none';
                    cardContainer.innerHTML = '<div style="width: 100%; text-align: center; padding: 40px;"><p>No blog posts found</p></div>';
                    return;
                }

                // Show pagination controls
                paginationControls.style.display = 'flex';

                // Update button states
                firstPageBtn.disabled = currentPage === 1;
                prevPageBtn.disabled = currentPage === 1;
                nextPageBtn.disabled = currentPage === totalPages;
                lastPageBtn.disabled = currentPage === totalPages;

                // Generate page numbers
                pageNumbers.innerHTML = '';
                const maxVisiblePages = 5;
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                if (endPage - startPage + 1 < maxVisiblePages) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                for (let i = startPage; i <= endPage; i++) {
                    const pageBtn = document.createElement('button');
                    pageBtn.textContent = i;
                    if (i === currentPage) {
                        pageBtn.style.fontWeight = 'bold';
                        pageBtn.style.backgroundColor = '#e6cf4d';
                    }
                    pageBtn.addEventListener('click', () => goToPage(i));
                    pageNumbers.appendChild(pageBtn);
                }

                // Update page info
                const startItem = (currentPage - 1) * cardsPerPage + 1;
                const endItem = Math.min(currentPage * cardsPerPage, filteredCards.length);
                pageInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredCards.length} blog posts`;

                // Show current page cards
                displayCurrentPage();
            }

            function displayCurrentPage() {
                // Hide all cards first
                allCards.forEach(card => {
                    card.style.display = 'none';
                });

                // Show rows for current page
                const startIndex = (currentPage - 1) * cardsPerPage;
                const endIndex = startIndex + cardsPerPage;

                const pageCards = filteredCards.slice(startIndex, endIndex);
                pageCards.forEach(card => {
                    card.style.display = 'flex';
                });
            }

            function goToPage(page) {
                currentPage = page;
                updatePagination();
            }

            // Pagination button event listeners
            firstPageBtn.addEventListener('click', () => goToPage(1));
            prevPageBtn.addEventListener('click', () => goToPage(currentPage - 1));
            nextPageBtn.addEventListener('click', () => goToPage(currentPage + 1));
            lastPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
                goToPage(totalPages);
            });
        });
    </script>
</body>

</html>