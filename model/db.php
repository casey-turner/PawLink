<?php
session_start();


function db_object() {
	try {
    	$db = new PDO("mysql:host=localhost;dbname=pawlink;charset=utf8","root","");
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
    }
	return $db;
}

function db_authenticate($u, $p) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM users WHERE email = :email AND password = :password";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':email', $u);
		$res->bindParam(':password', $p);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}

	if($res->rowCount() == 1) {
		return true;
	} else {
		return false;
	}
}

//sanitise data sent via POST and SEND
function sanitiseUserInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	return $data;
}

 ?>
