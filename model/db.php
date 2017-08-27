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

 ?>
