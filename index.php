<?php
// Create or access a Session
session_start();
require_once 'library/connections.php';
require_once 'model/acme-model.php';
require_once 'library/functions.php';

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

switch ($action) {

    case 'something':

        break;

    default:
        include 'view/home.php';
}


?>