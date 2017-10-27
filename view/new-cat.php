<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Product Management</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
<main>
    <div class="main">
        <h1>New Category</h1>
        <?php echo $msg; ?>
        <div class="html-form">
            <form method="post" action="/acme/products/index.php">
                <input type="text" name="categoryName" id="category">
                <input type="hidden" name="action" value="insertCategory">
                <input type="submit" name="submit" id="regbtn" value="Add">
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>

</body>
</html>