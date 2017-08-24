<?php

$db = new PDO("mysql:host=localhost;dbname=pawlink;charset=utf8","root","");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get view name from query string and set to variable
if ( isset($_GET['action']) ) {

    if ($_GET['action'] == 'selectall' ){
        selectAllUsers();
    } else if ($_GET['action'] == 'update'){
        updateUsers();
    } else if ($_GET['action'] == 'delete'){
        deleteUsers();
    } else if ($_GET['action'] == 'insert'){
        insertUsers();
    } else if ($_GET['action'] == 'authenticate'){
        authenticateUsers();
    }
} else {
    echo "Define action in query string";
    ?>
    <ul>
        <li>users.php?action=update</li>
        <li>users.php?action=selectall</li>
        <li>users.php?action=delete</li>
        <li>users.php?action=insert</li>
        <li>users.php?action=authenticate</li>
    </ul>
    <?php
}

// Return all users
function selectAllUsers(){
    global $db;
    $sql = "SELECT * FROM users ";
    try {
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException  $e ) {
        echo $e;
        die();
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}

// Update users
function updateUsers(){
    global $db;
    $sql = "UPDATE users SET suburb = :suburb WHERE userID =  :userID";
    if ( isset($_GET['userID']) && isset($_GET['suburb'])) {
        try {
            $sth = $db->prepare($sql);
            $sth->bindParam(':suburb', $_GET['suburb']);
            $sth->bindParam(':userID', $_GET['userID']);
            $sth->execute();
        } catch (PDOException  $e ) {
            $e = 'Can not update user';
            echo $e;
            die();
        }
        echo "Success, the user has been updated.";
    }
}

// Delete users
function deleteUsers(){
    $sql = "DELETE * FROM users";
    try {
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException  $e ) {
        echo $e;
        die();
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}

// insert users
function insertUsers(){
    $sql = "SELECT * FROM users";
    try {
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException  $e ) {
        echo $e;
        die();
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}
// authenticate users
function authenticateUsers() {
    $sql = "SELECT * FROM users";
    try {
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException  $e ) {
        echo $e;
        die();
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}


?>
