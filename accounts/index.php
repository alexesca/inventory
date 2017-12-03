<?php
// Create or access a Session
session_start();
// Accounts controller
require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/accounts-model.php';
require_once '../library/functions.php';

$categories = getCategories();

$navList = navList($categories);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

// Capturing the cookie
if(isset($_COOKIE['welcomeMsg'])){
    $welcomeMsg = filter_input(INPUT_COOKIE, 'welcomeMsg', FILTER_SANITIZE_STRING);
}

switch ($action) {

    case 'login':
        if (isset($_SESSION['loggedin'])) {
            include '../view/admin.php';
            exit;
        }
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($clientPassword);
        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Setting welcoming msgs cookies
        $welcomeMsg =  "Welcome, $clientData[clientFirstname]";
        setcookie('welcomeMsg', $welcomeMsg, strtotime('+1 year'), '/');
        // Destroying cookie
        setcookie('firstname', null,  strtotime('-1 year'), '/');
        $cookieFirstname = null;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
    case 'signup':
        if (isset($_SESSION['loggedin'])) {
            include '../view/admin.php';
            exit;
        }
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $email = checkEmail($email);
        $checkPassword = checkPassword($password);

        // Check for existing email address in the table
        $existingEmail = checkExistingEmail($email);
        if ($existingEmail) {
            $message = '<p class="notice">That email address already exists. Please login.</p>';
            include '../view/login.php';
            exit;
        }

        if (empty($firstName) || empty($lastName) || empty($email) || empty($checkPassword)) {
            $message = "Fill out the information.";
        }
        $message = '';
        // Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Send the data to the model
        $regOutcome = regClient($firstName, $lastName, $email, $hashedPassword);
        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $firstName, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering $firstName. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        }
        include '../view/registration.php';
        break;
    case 'admin':
        include '../view/admin.php';
        break;
    case 'logout':
        session_destroy();
        header('location: ./../index.php');
        break;
    case 'accountUpdateForm':
        include '../view/client-update.php';
        break;
    case 'updateAccountInformation':
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientFirstname = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        // Run basic checks, return if errors
        if (empty($clientEmail)) {
            $message = '<p class="notice">Please provide a valid email address.</p>';
            include '../view/client-update.php';
            exit;
        }
        if($clientEmail !== $_SESSION['clientData']['clientEmail']){
            // Check for existing email address in the table
            $existingEmail = checkExistingEmail($email);
            if ($existingEmail) {
                $message = '<p class="notice">That email address already exists. Please login.</p>';
                include '../view/client-update.php';
                exit;
            }
        }
        $updateAccount = updateAccountInformation($clientId, $clientFirstname, $clientLastname, $clientEmail);
        if ($updateAccount) {
            $message = "<p class='notify'>Congratulations, Your info. was successfully updated.</p>";
            $_SESSION['message'] = $message;
            $clientData = getClientById($clientId);
            $_SESSION['clientData'] = $clientData;
            header('location: /acme/accounts?action=admin');
            exit;
        } else {
            $message = "<p class='notice'>Error. Account was not updated.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;
    case 'updatePassword':
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($clientPassword);
        // Run basic checks, return if errors
        if (empty($passwordCheck)) {
            $passwordMessage = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        $updatePassword = updatesPassword($clientId, $hashedPassword);
        if ($updatePassword) {
            $passwordMessage = "<p class='notify'>Congratulations, Your password was successfully updated.</p>";
            $_SESSION['passwordMessage'] = $passwordMessage;
            header('location: /acme/accounts?action=admin');
            exit;
        } else {
            $passwordMessage = "<p class='notice'>Error. Password was not updated.</p>";
            include '../view/client-update.php';
            exit;
        }
        include '../view/client-update.php';
        break;
    default:

}

?>