<?php
// Accounts controller
require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/accounts-model.php';
require_once '../model/products-model.php';

$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = '<ul  class="ul">';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

$categoryDropDown = "<select  class='categoryId' name='categoryId'>";
foreach ($categories as $category):
    $categoryDropDown .= "<option value=" . $category['categoryId'] . ">" . $category['categoryName'] . "</option>";
endforeach;
$categoryDropDown .= "</select>";
$msg = "";
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    case 'newProduct':
        include '../view/new-prod.php';
        break;
    case 'insertProduct':
        $invName = filter_input(INPUT_POST, 'invName');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_VALIDATE_INT);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_VALIDATE_INT);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_VALIDATE_INT);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_VALIDATE_INT);
        $invLocation = filter_input(INPUT_POST, 'invLocation');
        $categoryId= filter_input(INPUT_POST, 'categoryId');
        $invVendor = filter_input(INPUT_POST, 'invVendor');
        $invStyle = filter_input(INPUT_POST, 'invStyle');
        if ($invName && $invDescription && $invImage && $invThumbnail && $invPrice && $invStock && $invSize && $invWeight && $invLocation && $invVendor && $invStyle) {
            $msg = insertProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);
            include '../view/new-prod.php';
            //header('location: ./index.php');
        } else {
            $msg =  "<h3 class='error'>There are some values missing or the values are incorrect. Please check the values and try again.</h3>";
            include '../view/new-prod.php';
        }
        break;
    case 'insertCategory':
        $categoryName = filter_input(INPUT_POST, 'categoryName');
        if($categoryName){
            $msg = insertCategory($categoryName);
            if($msg){
                include '../view/new-cat.php';
            } else {
                header('location: ./index.php');
            }
        } else {
            $msg  = "<h3 class='error'>You must enter a valid category.</h3>";
            include '../view/new-cat.php';
        }
        break;
    case 'newCategory':
        include '../view/new-cat.php';
        break;
    default:
        include '../view/prod-mgmt.php';
}


?>