<?php
/**
 * Accounts model
 */

// Register client

function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword){
    $db = acmeConnect();
    $sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword) VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Will check for existing emails

function checkExistingEmail($clientEmail) {
    $db = acmeConnect();
    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
        return 0;
    } else {
        return 1;
    }
}


// Get client data based on an email address
function getClient($clientEmail){
    $db = acmeConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}

// Get client data based on an id
function getClientById($clientId){
    $db = acmeConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}


// updates account information
function updateAccountInformation($clientId, $clientFirstname, $clientLastname, $clientEmail)
{
    try {
        $db = acmeConnect();
        $sql = 'UPDATE clients SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail WHERE clientId = :clientId';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_INT);
        $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
        $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
        $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged;
    } catch (Exception $e) {
        return "<h3 style='color:red'>Could not update the account information. Try again :(</h3>";
    }
}

// updates account information
function updatesPassword($clientId, $clientPassword)
{
    try {
        $db = acmeConnect();
        $sql = 'UPDATE clients SET clientPassword = :clientPassword WHERE clientId = :clientId';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_INT);
        $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged;
    } catch (Exception $e) {
        return "<h3 style='color:red'>Could not update the account information. Try again :(</h3>";
    }
}

?>