<?php
// Create or access a Session
session_start();
// Accounts controller
require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/accounts-model.php';
require_once '../model/products-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

$categories = getCategories();

$navList = navList($categories);

/*$categoryDropDown = "<select  class='categoryId' name='categoryId'>";
foreach ($categories as $category):
    $categoryDropDown .= "<option value=" . $category['categoryId'] . ">" . $category['categoryName'] . "</option>";
endforeach;
$categoryDropDown .= "</select>";*/
$msg = "";
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
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
    case 'newProduct':
        include '../view/new-prod.php';
        break;
    case 'insertProduct':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize)
            || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
            $msg = "<h3 class='error'>There are some values missing or the values are incorrect. Please check the values and try again.</h3>";
            include '../view/new-prod.php';
        } else {
            $msg = insertProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);
            include '../view/new-prod.php';
        }
        break;
    case 'insertCategory':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        if (!empty($categoryName)) {
            $msg = insertCategory($categoryName);
            if ($msg) {
                include '../view/new-cat.php';
            } else {
                header('location: ./index.php');
            }
        } else {
            $msg = "<h3 class='error'>You must enter a valid category.</h3>";
            include '../view/new-cat.php';
        }
        break;
    case 'newCategory':
        include '../view/new-cat.php';
        break;
    case 'mod':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-update.php';
        exit;
        break;
    case 'updateProd':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize)
            || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
            $msg = "<h3 class='error'>There are some values missing or the values are incorrect. Please check the values and try again.</h3>";
            include '../view/prod-update.php';
        } else {
            $updateResult = updateProduct($invId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);
            if ($updateResult) {
                $message = "<p class='notify'>Congratulations, $invName was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /acme/products/');
                exit;
            } else {
                $message = "<p class='notice'>Error. $invName was not updated.</p>";
                include '../view/prod-update.php';
                exit;
            }
        }
        break;
    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-delete.php';
        exit;
        break;
    case 'deleteProd':
        $$invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteProduct($invId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        } else {
            $message = "<p class='notice'>Error: $invName was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        }
        break;
    case 'category':
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
        $products = getProductsByCategory($type);
        if(!count($products)){
            $message = "<p class='notice'>Sorry, no $type products could be found.</p>";
        } else {
            $prodDisplay = buildProductsDisplay($products);
        }
        include '../view/category.php';
        break;
    case 'details':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $product = getProductDetails($invId);
        if(filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING) ){
            $message = "<div class='error'>" . filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING) . "</div>";
        }
        if(!count($product)){
            $message = "<p class='notice'>Sorry, this product could not be found.</p>";
        } else {
            $img = $product[0]['invImage'];
            $name = $product[0]['invName'];
            $description = $product[0]['invDescription'];
            $price = $product[0]['invPrice'];
            $stock = $product[0]['invStock'];
            $size = $product[0]['invSize'];
            $weight = $product[0]['invWeight'];
            $location = $product[0]['invLocation'];
            $vendor = $product[0]['invVendor'];
            $style = $product[0]['invStyle'];
            $prodDetails = buildProductDetails($img, $name, $description, $price, $stock, $size, $weight, $location, $vendor, $style);
            $reviews = getReviews($invId);
            $reviewsHTML = reviewBoxReadOnly($reviews);
            if (!empty($_SESSION['loggedin'])) {
                $clientId = $_SESSION['clientData']['clientId'];
                $clientFirstname = $_SESSION['clientData']['clientFirstname'];
                $clientLastname = $_SESSION['clientData']['clientLastname'];
                $screenName = substr($clientFirstname,0,1) . $clientLastname;
                $reviewForm = reviewForm($invId, $clientId, $screenName);
            }
        }
        include '../view/product-detail.php';
        break;
    default:
        $products = getProductBasics();
        if (count($products) > 0) {
            $prodList = '<table>';
            $prodList .= '<thead>';
            $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
            $prodList .= '</thead>';
            $prodList .= '<tbody>';
            foreach ($products as $product) {
                $prodList .= "<tr><td>$product[invName]</td>";
                $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
                $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
            }
            $prodList .= '</tbody></table>';
        } else {
            $message = '<p class="notify">Sorry, no products were returned.</p>';
        }
        include './../view/prod-mgmt.php';
}


?>