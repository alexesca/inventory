<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title><?php echo $name; ?> | Acme, Inc.</title>
</head>
<body>
<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
    <main>
        <div class="main">
            <h1>Product Details</h1>
            <?php if (isset($message)) {
                echo $message;
            } ?>
            <?php if (isset($prodDetails)) {
                echo $prodDetails;
            } ?>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>