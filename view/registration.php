<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
<main>
    <div class="main">
        <h1>Content Tile Here</h1>
        <div class="html-form">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/acme/accounts/index.php">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <label for="password">Password</label>
                <input type="text" name="password" id="password">
                <input type="submit" name="submit" id="regbtn" value="Register">
                <input type="hidden" name="action" value="register">
            </form>
            <a href="./?action=login" id="create-account-link">Already an ACME member? Login</a>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>

</body>
</html>