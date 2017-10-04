<?php
// Array of available actions
$availableActions = array('overview', 'create' );

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
    case "overview":
        overview();
        break;
    case "create":
        create();
        break;
    default:
        overview();
        break;
}

function overview() {
    GLOBAL $action;

    $bookings = selectData('bookings', array(
        'where'=> array('ownerUserID' => $_SESSION['userID'], 'walkerUserID' => $_SESSION['userID'] ),

        )
    );

    $pageTitle = "Bookings | PawLink";
    require_once('view/includes/header.php');
    require_once('view/booking_overview.php');
    require_once('view/includes/footer.php');
}

function create() {
    GLOBAL $action;

    // Create a new booking
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $dateTime = !empty($_POST['dateTime']) ? sanitiseUserInput($_POST['dateTime']) : null;
        $noDogs = !empty($_POST['noDogs']) ? sanitiseUserInput($_POST['noDogs']) : null;
        $duration = !empty($_POST['duration']) ? sanitiseUserInput($_POST['duration']) : null;
        $walkerUserID = !empty($_POST['walkerUserID']) ? sanitiseUserInput($_POST['walkerUserID']) : null;

        try {
            $bookingData = array(
                'dateTime' => $dateTime,
                'noDogs' => $noDogs,
                'duration' => $duration,
                'walkerUserID' => $walkerUserID,
                'ownerUserID' => $_SESSION['userID'],
                'status' => 'unconfirmed'
            );
            insertData('bookings', $bookingData);

            echo "inserted";

            exit;

        } catch (PDOexception $e) {
            if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                echo 'sql error';
                exit;
            } else {
                echo "Error:".$e -> getMessage();
                exit;
            }
        }



    }
}


 ?>
