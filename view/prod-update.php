<?php
if (empty($_SESSION['loggedin']) || $_SESSION['clientData']['clientLevel'] <= 1) {
    header('location: ./../index.php');
}

$categoryDropDown = "<select  class='categoryId' name='categoryId' id='invCategory'>";
foreach ($categories as $category):
    $categoryDropDown .= "<option value=" . $category['categoryId'];
    if (isset($categoryId)) {
        if ($category['categoryId'] == $categoryId) {
            $categoryDropDown .= ' selected ';
        }
    } elseif (isset($prodInfo['categoryId'])) {
        if ($category['categoryId'] === $prodInfo['categoryId']) {
            $categoryDropDown .= ' selected ';
        }
    }
    $categoryDropDown .= ">" . $category['categoryName'] . "</option>";
endforeach;
$categoryDropDown .= "</select>";
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
        echo "Modify $prodInfo[invName] ";
    } elseif (isset($invName)) {
        echo $invName;
    } ?> | Acme, Inc</title>
<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
    <main>
        <div class="main">
            <h1><?php if (isset($prodInfo['invName'])) {
                    echo "Modify $prodInfo[invName] ";
                } elseif (isset($invName)) {
                    echo $invName;
                } ?></h1>
            <?php echo $msg; ?>
            <div class="html-form">
                <form method="post" action="/acme/products/index.php">
                    <label for="invCategory">Category</label>
                    <?php echo $categoryDropDown; ?>
                    <label for="invName">Name</label>
                    <input type="text" required name="invName" id="invName"
                        <?php if (isset($invName)) {
                            echo "value='$invName'";
                        } elseif (isset($prodInfo['invName'])) {
                            echo "value='$prodInfo[invName]'";
                        } ?>>
                    <label for="invDescription">Description</label>
                    <textarea name="invDescription" id="invDescription" cols="30" rows="10">
                    <?php if (isset($invDescription)) {
                        echo $invDescription;
                    } elseif (isset($prodInfo['invDescription'])) {
                        echo "value='$prodInfo[invDescription]'";
                    } ?>
                </textarea>
                    <label for="invImage">Image (path to image)</label>
                    <input type="text" required name="invImage" id="invImage" value="/images/no-image.png"
                        <?php if (isset($invImage)) {
                            echo "value='$invImage'";
                        } elseif (isset($prodInfo['invImage'])) {
                            echo "value='$prodInfo[invImage]'";
                        } ?>>
                    <label for="invThumbnail">Thumbnail (path to thumbnail)</label>
                    <input type="text" required name="invThumbnail" id="invThumbnail" value="/images/no-image.png"
                        <?php if (isset($invThumbnail)) {
                            echo "value='$invThumbnail'";
                        } elseif (isset($prodInfo['invThumbnail'])) {
                            echo "value='$prodInfo[invThumbnail]'";
                        } ?>>
                    <label for="invPrice">Price</label>
                    <input type="number" required name="invPrice" id="invPrice"
                        <?php if (isset($invPrice)) {
                            echo "value='$invPrice'";
                        } elseif (isset($prodInfo['invPrice'])) {
                            echo "value='$prodInfo[invPrice]'";
                        } ?>>
                    <label for="invStock">Stock</label>
                    <input type="number" required name="invStock" id="invStock"
                        <?php if (isset($invStock)) {
                            echo "value='$invStock'";
                        } elseif (isset($prodInfo['invStock'])) {
                            echo "value='$prodInfo[invStock]'";
                        } ?>>
                    <label for="invSize">Size</label>
                    <input type="number" required name="invSize" id="invSize"
                        <?php if (isset($invSize)) {
                            echo "value='$invSize'";
                        } elseif (isset($prodInfo['invSize'])) {
                            echo "value='$prodInfo[invSize]'";
                        } ?>>
                    <label for="invWeight">Weight</label>
                    <input type="number" required name="invWeight" id="invWeight"
                        <?php if (isset($invWeight)) {
                            echo "value='$invWeight'";
                        } elseif (isset($prodInfo['invWeight'])) {
                            echo "value='$prodInfo[invWeight]'";
                        } ?>>
                    <label for="invLocation">Location</label>
                    <input type="text" required name="invLocation" id="invLocation"
                        <?php if (isset($invLocation)) {
                            echo "value='$invLocation'";
                        } elseif (isset($prodInfo['invLocation'])) {
                            echo "value='$prodInfo[invLocation]'";
                        } ?>>
                    <label for="invVendor">Vendor</label>
                    <input type="text" required name="invVendor" id="invVendor"
                        <?php if (isset($invVendor)) {
                            echo "value='$invVendor'";
                        } elseif (isset($prodInfo['invVendor'])) {
                            echo "value='$prodInfo[invVendor]'";
                        } ?>>
                    <label for="invStyle">Style</label>
                    <input type="text" required name="invStyle" id="invStyle"
                        <?php if (isset($invStyle)) {
                            echo "value='$invStyle'";
                        } elseif (isset($prodInfo['invStyle'])) {
                            echo "value='$prodInfo[invStyle]'";
                        } ?>>

                    <input type="submit" name="submit" id="regbtn" value="Update Product">
                    <input type="hidden" name="invId" value="<?php if (isset($prodInfo['invId'])) {
                        echo $prodInfo['invId'];
                    } elseif (isset($invId)) {
                        echo $invId;
                    } ?>">
                    <input type="hidden" name="action" value="updateProd">
                </form>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
</div>
</body>
</html>