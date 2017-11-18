<?php
function acmeConnect() {
    $dsn = 'mysql:host=127.0.0.1;dbname=acme';
    $username = 'iClient';
    $password = '123456789';
    try {
        return $db = new PDO($dsn, $username, $password);
    } catch (Exception $e) {
        include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/500.php';
    }
}


?>