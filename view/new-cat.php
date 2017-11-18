<?php
if (empty($_SESSION['loggedin']) || $_SESSION['clientData']['clientLevel'] <= 1){
    header('location: ./../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Product Management</title>
</head>
<body>
<div class="container">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
<main>
    <div class="main">
        <h1>New Category</h1>
        <?php echo $msg; ?>
        <div class="html-form">
            <form method="post" action="/acme/products/index.php">
                <input type="text" name="categoryName" id="category" required
                    <?php if (isset($categoryName)) {
                        echo "value='$categoryName'";
                    } ?>>
                <input type="hidden" name="action" value="insertCategory">
                <input type="submit" name="submit" id="regbtn" value="Add">
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>