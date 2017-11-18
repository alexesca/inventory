<?php
if (empty($_SESSION['loggedin'])) {
    header('location: ./../index.php');
}
?>
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
            <h1>Account Update</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <div class="html-form">
                <form method="post" action="/acme/accounts/index.php">
                    <input type="hidden" name="clientId" <?php if (isset($_SESSION['clientData']['clientId'])) {
                        echo "value='{$_SESSION['clientData']['clientId']}'";
                    } elseif (isset($clientId)) {
                        echo "value='$clientId'";
                    } ?>>
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName"
                           required <?php if (isset($clientFirstname)) {
                        echo "value='$clientFirstname'";
                    }elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                        echo "value='{$_SESSION['clientData']['clientFirstname']}'";
                    } ?>>
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName"
                           required <?php if (isset($clientLastname)) {
                        echo "value='$clientLastname'";
                    }elseif (isset($_SESSION['clientData']['clientLastname'])) {
                        echo "value='{$_SESSION['clientData']['clientLastname']}'";
                    } ?>>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           required <?php if (isset($clientEmail)) {
                        echo "value='$clientEmail'";
                    }elseif (isset($_SESSION['clientData']['clientEmail'])) {
                        echo "value='{$_SESSION['clientData']['clientEmail']}'";
                    } ?>>
                    <input type="submit" name="submit" id="regbtn" value="Update information">
                    <input type="hidden" name="action" value="updateAccountInformation">
                </form>
            </div>
            <br>
            <h1>Update Password</h1>
            <?php
            if (isset($passwordMessage)) {
                echo $passwordMessage;
            }
            ?>
            <div class="html-form">
                <form method="post" action="/acme/accounts/index.php">
                    <input type="hidden" name="clientId" <?php if (isset($_SESSION['clientData']['clientId'])) {
                        echo "value='{$_SESSION['clientData']['clientId']}'";
                    } elseif (isset($clientId)) {
                        echo "value='$clientId'";
                    } ?>>
                    <label for="password">Password:</label>
                    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    <input type="text" name="password" id="password" required
                           pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <input type="submit" name="submit" id="passwordbtn" value="Change password">
                    <input type="hidden" name="action" value="updatePassword">
                </form>
            </div>

        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>