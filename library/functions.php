<?php

function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $clientPassword);
}


function navList($categories)
{
    // Build a navigation bar using the $categories array
    $navList = '<ul  class="ul">';
    $navList .= "<li><a href='/acme/' title='View the Acme home page'>Home</a></li>";
    foreach ($categories as $category) {
        $navList .= "<li><a href='/acme/products/?action=category&type=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

function buildProductsDisplay($products){
    $pd = '<ul id="prod-display">';
    foreach ($products as $product) {
        $pd .= '<li>';
        $pd .= "<a href='/acme/products/?action=details&invId=$product[invId]'><img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'></a>";
        $pd .= '<hr>';
        $pd .= "<h2><a href='/acme/products/?action=details&invId=$product[invId]'>$product[invName]</a></h2>";
        $pd .= "<span>$$product[invPrice]</span>";
        $pd .= '</li>';
    }
    $pd .= '</ul>';
    return $pd;
}

function buildProductDetails($img, $name, $description, $price, $stock, $size, $weight, $location, $vendor, $style){
    $var = 123;
    $pd = <<<EOD
        <div class="product-details">
  <div class="left">
    <img src="$img" alt="">
  </div>
  <div class="right">
    <p id="name">$name</p>
    <p id="description">$description</p>
    <p id="price">$$price</p>
    <p id="details"><strong>Stock: </strong>$stock</p>
    <p id="details"><strong>Size: </strong>$size</p>
    <p id="details"><strong>Weight: </strong>$weight</p>
    <p id="details"><strong>location: </strong>$location</p>
    <p id="details"><strong>Vendor: </strong>$vendor</p>
    <p id="details"><strong>Style: </strong>$style</p>
  </div>
</div>
EOD;

    return $pd;
}

?>