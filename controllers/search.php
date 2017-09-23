<?php
// Array of available actions

$availableActions = array('search_page', 'search_walkers');


// Get action name from query string and set to variable
if ( isset($_GET['action']) ) {
    if ( in_array($_GET['action'], $availableActions) ){
        $action = $_GET['action'];
    } else {
        header('HTTP/1.1 404 Not Found');
        exit;
    }
} else {
    $action = 'dashboard';
}

//Define the php file and page title depending on the action
switch($action) {
    case "search_page":
        search_page();
        break;
    case "search_walkers":
        search_walkers();
        break;
    default:
        dashboard();
        break;
}

function search_page() {
    GLOBAL $action;

    $pageTitle = "Find a Dog Walker | PawLink";
    require_once('view/includes/header.php');
    require_once('view/search.php');
    require_once('view/includes/footer.php');
}


function search_walkers() {
    GLOBAL $action;

    try {

        $walkers = selectData('profiles', array(
            'select' => "profiles.profileTitle, profiles.profileDescription, profiles.profileImage, profiles.profileID, rates.status, users.suburb, users.firstName, left(users.lastName,1) AS lastName",
            'left join' => array('table2' => 'rates', 'column' => 'profileID'),
            'left join2' => array('table3' => 'users', 'column' => 'userID'),
            'where'=> array('rates.status' => 'active' ),
            'start' => '0',
            'limit' => '10'
            )
        );

    } catch (PDOexception $e) {
        echo "Error:".$e -> getMessage();
        die();
    }

    echo json_encode($walkers);
}

 ?>
