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
        <h1>Product Management</h1>
        <h3>Welcome to the product management page. Please choose and option below</h3>
        <br>
        <ul>
            <li><a href="./?action=newCategory" id="new-category">Add a new category</a></li>
            <li><a href="./?action=newProduct" id="new-product">Add a new product</a></li>
        </ul>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>

</body>
</html>