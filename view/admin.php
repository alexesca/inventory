<?php
if (empty($_SESSION['loggedin'])) {
    header('location: ./../index.php');
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
if (isset($_SESSION['passwordMessage'])) {
    $passwordMessage = $_SESSION['passwordMessage'];
}

?><!DOCTYPE html>
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
            <?php
            if (isset($message)) {
                echo $message;
            }

            if (isset($passwordMessage)) {
                echo $passwordMessage;
            }
            if (isset($_SESSION['loggedin'])) {
                echo "<h1>Welcome, {$_SESSION['clientData']['clientFirstname']}</h1>";
                echo "<ul>";
                echo "<li>First Name: {$_SESSION['clientData']['clientFirstname']}</li>";
                echo "<li>Last Name: {$_SESSION['clientData']['clientLastname']}</li>";
                echo "<li>Email: {$_SESSION['clientData']['clientEmail']}</li>";
                echo "</ul>";
                echo "<a href='/acme/accounts?action=accountUpdateForm'>Update account information</a>";
                if($_SESSION['clientData']['clientLevel'] > 1){
                    echo "<h1>Administrative Functions</h1>";
                    echo "<h4>Use the link below to manage products</h4>";
                    echo "<p><a href='/acme/products'>Products</a></p>";
                }
                echo "<h1>Reviews:</h1>";
                if(!empty($reviewsHTML)){
                    echo $reviewsHTML;
                } else {
                    echo '<p class="notice">There are not comments.</p>';
                }
            }
            ?>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>