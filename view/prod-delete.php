<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /acme/');
    exit;
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
<title><?php if (isset($prodInfo['invName'])) {
        echo "Delete $prodInfo[invName]";
    } ?> | Acme, Inc.</title>

<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
    <main>
        <div class="main">
            <h1><?php if (isset($prodInfo['invName'])) {
                    echo "Delete $prodInfo[invName]";
                } ?></h1>
            <p>Confirm Product Deletion. The delete is permanent.</p>
            <?php echo $msg; ?>
            <div class="html-form">
                <form method="post" action="/acme/products/index.php">
                    <label for="invName">Name</label>
                    <input type="text" required name="invName" id="invName" readonly
                        <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?>>
                    <label for="invDescription">Description</label>
                    <textarea name="invDescription" id="invDescription" cols="30" readonly rows="10">
                    <?php if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; } ?>
                </textarea>
                    <input type="submit"  name="submit" id="regbtn" value="Delete Product">
                    <input type="hidden" name="invId" value="<?php if (isset($prodInfo['invId'])) {
                        echo $prodInfo['invId'];
                    } ?>">
                    <input type="hidden" name="action" value="deleteProd">
                </form>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>