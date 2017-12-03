<header>
    <img src="/acme/images/site/logo.gif" class="acme-logo" alt="Acme Logo">
    <div class="filler"></div>
    <div class="my-account">
        <?php
        if (isset($cookieFirstname)) {
            echo "<span id='welcome'>Welcome $cookieFirstname</span>";
        }
        if (isset($_SESSION['loggedin'])) {
            if (isset($welcomeMsg)) {
                echo "<span id='welcome'><a href=\"/acme/accounts/?action=admin\">$welcomeMsg</a></span>";
            }
            echo "<a href='/acme/accounts?action=logout' id='logout'>Log out</a>";
        } else {
            ?>
            <a href="/acme/accounts?action=login"><img src="/acme/images/site/account.gif" class="my-account-logo" alt="Account">My Account</a>
            <?php
        }
        ?>
    </div>
</header>