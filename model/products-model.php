<?php

// Inserts anew prod
function insertProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle)
{
    try {
        $db = acmeConnect();
        $insert = "INSERT INTO `inventory`(`invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`)"
            . "VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':invName', $invName);
        $statement->bindValue(':invDescription', $invDescription);
        $statement->bindValue(':invImage', $invImage);
        $statement->bindValue(':invThumbnail', $invThumbnail);
        $statement->bindValue(':invPrice', $invPrice);
        $statement->bindValue(':invStock', $invStock);
        $statement->bindValue(':invSize', $invSize);
        $statement->bindValue(':invWeight', $invWeight);
        $statement->bindValue(':invLocation', $invLocation);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->bindValue(':invVendor', $invVendor);
        $statement->bindValue(':invStyle', $invStyle);
        $statement->execute();
        $statement->closeCursor();
        if ($statement->errorInfo()[1] == 0) {
            return "<h3 class='success'>The new product was added.</h3>";
        } else {
            return "<h3 class='error'>There was an error. " . $statement->errorInfo()[2] . "</h3>";
        }
    } catch (Exception $e) {
        return "<h3 style='color:red'>Could not add the product. Try again :(</h3>";
    }
}

// Inserts a new cat
function insertCategory($categoryName)
{
    try {
        $db = acmeConnect();
        $insert = "INSERT INTO `categories`(`categoryName`)"
            . "VALUES (:categoryName)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':categoryName', $categoryName);
        $statement->execute();
        $statement->closeCursor();
        if ($statement->errorInfo()[1] == 0) {
            return null;
        } else {
            return "<h3 class='error'>There was an error. " . $statement->errorInfo()[2] . "</h3>";
        }
    } catch (Exception $e) {
        return "<h3 style='color:red'>Could not add the product. Try again :(</h3>";
    }
}

function getProductBasics()
{
    $db = acmeConnect();
    $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}


// Get product information by invId
function getProductInfo($invId)
{
    $db = acmeConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $prodInfo;
}

// updates a prod
function updateProduct($invId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle)
{
    try {
        $db = acmeConnect();
        $sql = 'UPDATE inventory SET invName = :invName, invDescription = :invDescription, invImage = :invImg, invThumbnail = :invThumb, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, categoryId = :categoryId, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
        $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
        $stmt->bindValue(':invImg', $invImage, PDO::PARAM_STR);
        $stmt->bindValue(':invThumb', $invThumbnail, PDO::PARAM_STR);
        $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
        $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
        $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
        $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
        $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
        $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
        $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged;
    } catch (Exception $e) {
        return "<h3 style='color:red'>Could not update the product. Try again :(</h3>";
    }
}


function deleteProduct($invId) {
    $db = acmeConnect();
    $sql = 'DELETE FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getProductsByCategory($type){
    $db = acmeConnect();
    $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :catType)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':catType', $type, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}

function getProductDetails($invId){
    $db = acmeConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $product;
}

?>