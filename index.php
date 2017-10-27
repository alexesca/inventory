<?php
require_once 'library/connections.php';
require_once 'model/acme-model.php';

$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = '<ul  class="ul">';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    switch ($action){

        case 'something':

            break;

        default:
            include 'view/home.php';
    }
}

?>