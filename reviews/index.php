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
        if (empty($invId) || empty($clientId) || empty($reviewText)) {
            $message = "Please, enter a valid review.";
            header('location: /acme/products/?action=details&invId=' . $invId . '&message=' . $message);
        } else {
            $result = addReview($invId, $clientId, $reviewText);
            if ($result === 1) {
                $message = "Your review was added.";
                header('location: /acme/products/?action=details&invId=' . $invId . '&message=' . $message);
                exit;
            } else {
                $message = "There was an error adding the review.";
                header('location: /acme/products/?action=details&invId=' . $invId . '&message=' . $message);
                exit;
            }
        }
        break;
    case 'getReview':

        break;
    case 'deleteReview';
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
        $clientId = $_SESSION['clientData']['clientId'];
        if (!empty($reviewId)) {
            $deleteReview = deleteReview($reviewId);
            $clientFirstname = $_SESSION['clientData']['clientFirstname'];
            $clientLastname = $_SESSION['clientData']['clientLastname'];
            $screenName = substr($clientFirstname,0,1) . $clientLastname;
            $reviewForm = reviewForm($invId, $clientId, $screenName);
            if ($deleteReview === 1) {
                $message = "<p class='error'>The review was deleted.</p>";
            } else {
                $message = "<p class='error'>The review was not deleted at this time.</p>";
            }
            $reviews = getClientReviews($clientId);
            $reviewsHTML = reviewBox($reviews);
            include '../view/admin.php';
        }
        exit;
        break;
    case 'updateForm':
        if (isset($_SESSION['clientData']['clientId'])) {
            $clientId = $_SESSION['clientData']['clientId'];
        } else {
            $clientId = null;
        }
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
        $review = getReview($reviewId);
        $screenName = substr($review['clientFirstname'],0,1) . $review['clientLastname'];
        $reviewForm = updateReviewForm($reviewId, $review['reviewText'], $review['clientId'], $screenName);
        $reviews = getClientReviews($clientId);
        $reviewsHTML = reviewBoxReadOnly($reviews);
        include '../view/product-detail.php';
        break;
    case 'updateReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_STRING);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_STRING);
        $review = getReview($reviewId);
        if (empty($reviewId) || empty($reviewText) || !isset($reviewText) || empty($clientId) || empty($review)) {
            if (!empty($_SESSION['clientData']['clientId'])) {
                $reviews = getClientReviews($_SESSION['clientData']['clientId']);
                $reviewsHTML = reviewBoxReadOnly($reviews);
            }
            $message = "Please, enter a valid review.";
            $screenName = substr($review['clientFirstname'],0,1) . $review['clientLastName'];
            $reviewForm = updateReviewForm($reviewId, $review['reviewText'], $review['clientId'], $screenName);
            include '../view/product-detail.php';
            exit;
        }

        $updatedReview = updateReview($reviewId, $reviewText);

        if ($updatedReview === 1) {
            $message = "<p class='error'>The review was updated.</p>";
        } else {
            $message = '<p class="error">The review was not updated at this time.</p>';
        }
        $reviews = getClientReviews($clientId);
        $reviewsHTML = reviewBox($reviews);
        include '../view/admin.php';
        break;
    case 'deleteReviewConfirm':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING);
        $review = getReview($reviewId);
        $reviewsHTML = reviewBoxReadOnly([$review]);
        include '../view/delete-review-confirm.php';
        break;
    default:
        break;
}
?>