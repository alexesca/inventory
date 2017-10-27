<?php

// Inserts anew prod
function insertProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle) {
    try{
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
        if($statement->errorInfo()[1] == 0){
            return "<h3 class='success'>The new product was added.</h3>";
        } else {
            return "<h3 class='error'>There was an error. " . $statement->errorInfo()[2] . "</h3>";
        }
    }catch(Exception $e){
        return "<h3 style='color:red'>Could not add the product. Try again :(</h3>";
    }
}

// Inserts a new cat
function insertCategory($categoryName) {
    try{
        $db = acmeConnect();
        $insert = "INSERT INTO `categories`(`categoryName`)"
        . "VALUES (:categoryName)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':categoryName', $categoryName);
        $statement->execute();
        $statement->closeCursor();
        if($statement->errorInfo()[1] == 0){
            return null;
        } else {
            return "<h3 class='error'>There was an error. " . $statement->errorInfo()[2] . "</h3>";
        }
    }catch(Exception $e){
        return "<h3 style='color:red'>Could not add the product. Try again :(</h3>";
    }
}

?>