<?php
/**  Reviews model */
function addReview($invId, $clientId, $reviewText)
{
    $db = acmeConnect();
    $sql = 'INSERT INTO reviews (clientId, invId, reviewText) VALUES (:clientId, :invId, :reviewText)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getReviews($invId)
{
    $db = acmeConnect();
    $sql = 'SELECT clients.clientFirstname, clients.clientLastname, reviews.reviewId, reviews.reviewText, reviews.reviewDate FROM reviews INNER JOIN clients ON reviews.clientId = clients.clientId WHERE reviews.invId = :invId ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}

function getClientReviews($clientId)
{
    $db = acmeConnect();
    $sql = 'SELECT clients.clientFirstname, clients.clientLastname, reviews.reviewId, reviews.reviewText, reviews.reviewDate FROM reviews INNER JOIN clients ON reviews.clientId = clients.clientId WHERE reviews.clientId = :clientId ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

function getReview($reviewId)
{
    $db = acmeConnect();
    $sql = 'SELECT  clients.clientId, clients.clientFirstname, clients.clientLastname, reviews.reviewId, reviews.reviewText, reviews.reviewDate FROM reviews INNER JOIN clients ON reviews.clientId = clients.clientId WHERE reviews.reviewId = :reviewId ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}


function deleteReview($reviewId)
{
    $db = acmeConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// updates account information
function updateReview($reviewId, $reviewText)
{
    $db = acmeConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


?>