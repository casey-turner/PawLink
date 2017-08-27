<?php
require_once('model/db.php');
require_once('model/dbFunctions.php');

$db = db_object();

// Array of available controllers, depending on the session user state
if (isset($_SESSION['userstate']) && ($_SESSION['userstate'] == 'member')) {
    if (isset($_SESSION['profileID'])) {
        $availableControllers = array('bookings', 'feedback', 'messages', 'payments', 'profiles', 'publicpages', 'users');
    } else {
        $availableControllers = array('users', 'publicpages', 'profiles');
    }
} else {
    $availableControllers = array('users', 'publicpages');
}

// Get controller name from query string and set to variable
if ( isset($_GET['controller']) ) {
    if ( in_array($_GET['controller'], $availableControllers) ){
        $controller = $_GET['controller'];
    } else {
        $controller = 'publicpages';
    }
} else {
    $controller = 'publicpages';
}

require_once('controllers/'.$controller.'.php');



?>
