<?php
/** Reviews controller */
// Create or access a Session
session_start();

// Reviews controller
require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/accounts-model.php';
require_once '../model/products-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

$categories = getCategories();
$navList = navList($categories);
$msg = "";
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}


// Check if the firstname cookie exists, get its value
if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

// Capturing the cookie
if (isset($_COOKIE['welcomeMsg'])) {
    $welcomeMsg = filter_input(INPUT_COOKIE, 'welcomeMsg', FILTER_SANITIZE_STRING);
}

// Form variables
$invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_STRING);
$clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_STRING);
$reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'addReview':
        if(empty($invId) || empty($clientId) || empty($reviewText)){
            $message = "<p class='error'>Please, enter a valid review.</p>";
            include '../view/product-detail.php';
        } else {
            $result = addReview($invId, $clientId, $reviewText);
            if ($result === 1) {
                $message = "<p class='error'>Your review was added.</p>";
                $reviews = getReviews($invId);
                $reviewsHTML = reviewBox($reviews);
                $reviewForm = reviewForm($invId, $clientId, 45);
                include '../view/product-detail.php';
            } else {
                $message = "<p class='error'>There was an error adding the review.</p>";
                include '../view/product-detail.php';
            }
        }
        break;
    case 'getReview':

        break;
    case 'deleteReview';
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
        if(!empty($reviewId)){
            $deleteReview = deleteReview($reviewId);
            $reviewForm = reviewForm($invId, $clientId, 45);
            if($deleteReview === 1){
                $message = "<p class='error'>The review was deleted.</p>";
            } else {
                $message = "<p class='error'>The review was not deleted at this time.</p>";
            }
            include '../view/admin.php';
        }
        exit;
        break;
    case 'updateForm':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
        $review = getReview($reviewId);
        $reviewForm = updateReviewForm($reviewId, $review['reviewText'], $review['clientId'], $review['clientFirstname']);
        include '../view/product-detail.php';
        break;
    case 'updateReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_STRING);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_STRING);
        if(empty($reviewId) || empty($reviewText) || empty($clientId)) {
            $reviews =  getClientReviews($_SESSION['clientData']['clientId']);
            $reviewsHTML = reviewBox($reviews);
            $message = "Please, enter a valid review.";
            $reviewForm = updateReviewForm($reviewId, $review['reviewText'], $review['clientId'], $review['clientFirstname']);
            include '../view/product-detail.php';
            exit;
        }

        $updatedReview = updateReview($reviewId, $reviewText);

        if($updatedReview === 1){
            $message = "<p class='error'>The review was updated.</p>";
        } else {
            $message = '<p class="error">The review was not updated at this time.</p>';
        }
        $reviews =  getClientReviews($clientId);
        $reviewsHTML = reviewBox($reviews);
        include '../view/admin.php';
        break;
    default:
        break;
}
?>