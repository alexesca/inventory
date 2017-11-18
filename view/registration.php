<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
<main>
    <div class="main">
        <h1>Sign up</h1>
        <div class="html-form">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/acme/accounts/index.php">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" required<?php if(isset($firstname)){echo "value='$firstname'";} ?>>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" required <?php if(isset($lastName)){echo "value='$lastName'";} ?>>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required <?php if(isset($checkPassword)){echo "value='$checkPassword'";} ?>>

                <label for="password">Password:</label>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

                <input type="submit" name="submit" id="regbtn" value="Register">
                <input type="hidden" name="action" value="signup">
            </form>
            <a href="./?action=login" id="create-account-link">Already an ACME member? Login</a>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>