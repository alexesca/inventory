<?php
error_reporting (E_ALL); // Report
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header/index.php'; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav/index.php'; ?>
        <main>
            <div class="main">
                <h1>Welcome to Acme</h1>
                <div class="jumbotron">
                    <!--<img src="./images/site/rocketfeature.jpg" id="rocket-logo" alt="">-->
                    <div class="filler"></div>
                    <div class="filler"></div>
                    <div class="filler"></div>
                    <div class="filler"></div>
                    <div class="jumbotron-labels-and-img">
                        <div class="rocket-texts">
                            <p class="acme-rocket-title">Acme Rocket</p>
                            <p>Quick lighting fuse</p>
                            <p>NHTSA approved seat belts</p>
                            <p>Mobile launch stand included</p>
                        </div>
                        <img src="../images/site/iwantit.gif" id="i-want-it-img" alt="">
                    </div>
                </div>
            </div>
            <div class="recipes-dinner-holder">
                <div class="recipes-section">
                    <div id="recipe-1">
                        <div class="recipe-img-holder thumbnail"><img src="./images/recipes/bbqsand.jpg" alt=""></div>
                        <div class="recipe-link-holder"><a href="#">Pulled Roadrunner BBQ</a></div>
                    </div>
                    <div id="recipe-2">
                        <div class="recipe-img-holder thumbnail"><img src="./images/recipes/potpie.jpg" alt=""></div>
                        <div class="recipe-link-holder"><a href="#">Roadrunner Pot Pie</a></div>
                    </div>
                    <div id="recipe-3">
                        <div class="recipe-img-holder thumbnail"><img src="./images/recipes/soup.jpg" alt=""></div>
                        <div class="recipe-link-holder"><a href="#">Roadrunner Soup</a></div>
                    </div>
                    <div id="recipe-4">
                        <div class="recipe-img-holder thumbnail"><img src="./images/recipes/taco.jpg" alt=""></div>
                        <div class="recipe-link-holder"><a href="#">Roadrunner Tacos</a></div>
                    </div>
                </div>
                <div class="dinner-section">
                    <p class="review-title">Get Dinner Rocket Reviews</p>
                    <ul class="list">
                        <li>"I dont know how I ever cought roadrunners before this." (4/5)</li>
                        <li>"That thing was fast!" (4/5)</li>
                        <li>"Talk about fast delivery." (5/5)</li>
                        <li>"I didn't even had to pull the meet apart" (4.5/5)</li>
                        <li>"I'm on my thirtieth one. I love this things!" (5/5)</li>
                    </ul>
                </div>
            </div>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer/index.php'; ?>
    </div>

</body>
</html>