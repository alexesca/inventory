<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Delete review</title>
</head>
<body>
<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
    <main>
        <div class="main">
            <h1>Delete review</h1>
            <?php
            echo "<hr><h1>Review</h1>";
            if (!empty($reviewsHTML)) {
                echo $reviewsHTML;
                echo "<p>Delete review? <a href='/acme/reviews/?action=deleteReview&reviewId=" . $review["reviewId"] . "'>Yes</a>&nbsp;<a href='/acme/accounts/?action=admin'>Never mind</a></p>";
            } else {
                echo '<p class="notice">There are not comments.</p>';
            }
            ?>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>