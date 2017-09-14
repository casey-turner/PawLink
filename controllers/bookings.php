<?php
// Array of available actions
$availableActions = array('booking_overview', 'booking_form');

// Get action name from query string and set to variable
if ( isset($_GET['action']) ) {
    if ( in_array($_GET['action'], $availableActions) ){
        $action = $_GET['action'];
    } else {
        $action = 'booking_overview';
    }
} else {
    $action = 'booking_overview';
}

//Define the php file and page title depending on the action
switch($action) {
    case "booking_overview":
        booking_overview();
        break;
    case "booking_form":
        booking_form();
        break;
    case "dog_register":
        dog_register();
        break;
    case "dog_profile":
        dog_profile();
        break;
    case "search":
        search();
        break;
    default:
        dashboard();
        break;
}

function booking_overview() {
    GLOBAL $action;
    $pageTitle = "Bookings | PawLink";
    require_once('view/includes/header.php');
    require_once('view/booking_overview.php');
    require_once('view/includes/footer.php');
}
function booking_form() {
    GLOBAL $action;
    $pageTitle = "Bookings | PawLink";
    require_once('view/includes/header.php');
    require_once('view/booking_form.php');
    require_once('view/includes/footer.php');
}
 ?>
