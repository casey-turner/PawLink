<?php
// Array of available actions
$availableActions = array('overview', 'create', 'confirm', 'cancel', 'complete');

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
    case "confirm":
        confirm();
        break;
    case "cancel":
        cancel();
        break;
    case "complete":
        complete();
        break;
    default:
        overview();
        break;
}

function overview() {
    GLOBAL $action;

    $bookings = sqlQuery("
        SELECT bookings.*, owner.firstName AS ownerFirstName, owner.lastName AS ownerLastName, owner.suburb AS ownerSuburb, ownerProfile.profileImage AS ownerImage, walker.firstName AS walkerFirstName, walker.lastName AS walkerLastName,  walker.suburb AS walkerSuburb, walkerProfile.profileImage AS walkerImage
        FROM bookings
        LEFT JOIN users AS owner ON owner.userID = bookings.ownerUserID
        LEFT JOIN users AS walker ON walker.userID = bookings.walkerUserID
        LEFT JOIN profiles AS ownerProfile ON ownerProfile.userID = bookings.ownerUserID
        LEFT JOIN profiles AS walkerProfile ON walkerProfile.userID = bookings.walkerUserID
        WHERE bookings.ownerUserID = {$_SESSION['userID']} OR bookings.walkerUserID = {$_SESSION['userID']}
        ORDER BY bookings.dateTime DESC
    ", 'all');

    $pageTitle = "Bookings | PawLink";
    require_once('view/includes/header.php');
    require_once('view/booking_overview.php');
    require_once('view/includes/footer.php');
}

function confirm() {
    GLOBAL $action;

    if ( !empty($_GET['bookingid']) ) {
        $bookingID = sanitiseUserInput($_GET['bookingid']);
    } else {
        echo "false";
        exit;
    }

    //Check to see if booking exists in the $db
    $bookingCheck = selectData('bookings', array(
        'where' => array('walkerUserID' => $_SESSION['userID'], 'bookingID' => $bookingID ),
        'return type' => 'count'
        )
    );

    if ($bookingCheck == 1) {
        try {
            $bookingStatus = array(
                'status' => "confirmed"
            );

            $updateWhere = array(
                'bookingID' => $bookingID
            );
            updateData('bookings', $bookingStatus, $updateWhere);
            echo "true";
            exit();

        } catch (PDOexception $e) {
            echo "false";
            exit();
        }
    } else {
        echo "false";
        exit();
    }
}

function cancel() {
    GLOBAL $action;

    if ( !empty($_GET['bookingid']) ) {
        $bookingID = sanitiseUserInput($_GET['bookingid']);
    } else {
        echo "false";
        exit;
    }

    //Check to see if booking exists in the $db

    try {
        $bookingCheck = sqlQuery("
            SELECT *
            FROM bookings
            WHERE (ownerUserID = {$_SESSION['userID']} OR walkerUserID = {$_SESSION['userID']})
            AND bookingID = {$bookingID}
        ", 'count');
    } catch (PDOexception $e) {
        echo $e;
        exit();
    }


    if ($bookingCheck == 1) {
        try {
            $bookingStatus = array(
                'status' => "cancelled"
            );

            $updateWhere = array(
                'bookingID' => $bookingID
            );
            updateData('bookings', $bookingStatus, $updateWhere);
            echo "true";
            exit();

        } catch (PDOexception $e) {
            echo "false";
            exit();
        }
    } else {
        echo "false";
        exit();
    }
}

function complete(){
    GLOBAL $action;

    if ( !empty($_GET['bookingid']) ) {
        $bookingID = sanitiseUserInput($_GET['bookingid']);
    } else {
        echo "false";
        exit;
    }

    //Check to see if booking exists in the $db
    $bookingCheck = selectData('bookings', array(
        'where' => array('ownerUserID' => $_SESSION['userID'], 'bookingID' => $bookingID ),
        'return type' => 'count'
        )
    );

    if ($bookingCheck == 1) {
        try {
            $bookingStatus = array(
                'status' => "completed"
            );

            $updateWhere = array(
                'bookingID' => $bookingID
            );
            updateData('bookings', $bookingStatus, $updateWhere);
            echo "true";
            exit();

        } catch (PDOexception $e) {
            echo "false";
            exit();
        }
    } else {
        echo "false";
        exit();
    }
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
