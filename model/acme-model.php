<?php
/**
 * Acme Model
 */
function getCategories(){
    $db = acmeConnect();
    $query = 'SELECT categoryId, categoryName FROM categories ORDER BY categoryName ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}
?>