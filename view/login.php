<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
    <main>
        <div class="main">
            <h1>Acme Login</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <div class="html-form">
                <form method="post" action="/acme/accounts/">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <input type="hidden" name="action" value="login">
                    <button>Login</button>
                </form>
                <a href="./?action=signup" id="create-account-link">Not an ACME member? Create an account</a>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>