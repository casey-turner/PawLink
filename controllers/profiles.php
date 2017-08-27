<?php
// Array of available actions
if (isset($_SESSION['profileID'])) {
    $availableActions = array('create_profile','profile', 'dog_register', 'dog_profile', 'search', 'dashboard');
} else {
    $availableActions = array('create_profile');
}


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
    case "dashboard":
        dashboard();
        break;
    case "create_profile":
        create_profile();
        break;
    case "profile":
        profile();
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

function dashboard() {
    GLOBAL $action;
    $pageTitle = "Dashboard | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/dashboard.php');
    require_once('view/includes/hp_footer.php');
}

function create_profile() {
    GLOBAL $action;
    $pageTitle = "Create Your Profile | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/create_profile.php');
    require_once('view/includes/hp_footer.php');
}

function profile() {
    GLOBAL $action, $profileID;
    // Get profile ID from query string and set to variable
    if ($action == 'profile') {
        if ( !empty($_GET['profileID']) ) {
            $profileID = sanitiseUserInput($_GET['profileID']);
        } else {
            header('HTTP/1.1 404 Not Found');
            exit;
        }
    }
    $pageTitle = "About Me | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/profile.php');
    require_once('view/includes/hp_footer.php');
}

function dog_register() {
    GLOBAL $action;
    $pageTitle = "Register a Dog | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/dog_register.php');
    require_once('view/includes/hp_footer.php');
}

function dog_profile() {
    GLOBAL $action, $dogID;
    // Get dog ID from query string and set to variable
    if ($action == 'dog_profile') {
        if ( !empty($_GET['dogID']) ) {
            $dogID = sanitiseUserInput($_GET['dogID']);
        } else {
            header('HTTP/1.1 404 Not Found');
            exit;
        }
    }
    $pageTitle = "Dog | PawLink";
    // Compile the dog profile page from page segments
    require_once('view/includes/hp_header.php');
    require_once('view/dog_profile.php');
    require_once('view/includes/hp_footer.php');

}

function search() {
    GLOBAL $action;
    $pageTitle = "Search | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/search.php');
    require_once('view/includes/hp_footer.php');
}


?>
