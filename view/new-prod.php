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
        <h1>New Product</h1>
        <?php echo $msg; ?>
        <div class="html-form">
            <form method="post" action="/acme/products/index.php">
                <?php echo $categoryDropDown; ?>
                <label for="invName">Name</label>
                <input type="text" name="invName" id="invName">
                <label for="invDescription">Description</label>
                <textarea name="invDescription" id="invDescription" cols="30" rows="10"></textarea>
                <label for="invImage">Image (path to image)</label>
                <input type="text" name="invImage" id="invImage" value="/images/no-image.png">
                <label for="invThumbnail">Thumbnail (path to thumbnail)</label>
                <input type="text" name="invThumbnail" id="invThumbnail" value="/images/no-image.png">
                <label for="invPrice">Price</label>
                <input type="number" name="invPrice" id="invPrice">
                <label for="invStock">Stock</label>
                <input type="number" name="invStock" id="invStock">
                <label for="invSize">Size</label>
                <input type="number" name="invSize" id="invSize">
                <label for="invWeight">Weight</label>
                <input type="number" name="invWeight" id="invWeight">
                <label for="invLocation">Location</label>
                <input type="text" name="invLocation" id="invLocation">
                <label for="invVendor">Vendor</label>
                <input type="text" name="invVendor" id="invVendor">
                <label for="invStyle">Style</label>
                <input type="text" name="invStyle" id="invStyle">

                <input type="submit" name="submit" id="regbtn" value="Register">
                <input type="hidden" name="action" value="insertProduct">
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>

</body>
</html>