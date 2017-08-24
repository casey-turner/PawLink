<?php

// Do authentication checks
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['useremail']) && isset($_POST['password'])) {
        if ( db_authenticate(sanitiseUserInput( $_POST['useremail']), sanitiseUserInput($_POST['password'])) ) {
            $_SESSION['userstate'] = 'member';
            header("location: ?controller=profiles&action=dashboard");
        } else {
            $errorMsg = 'Login failed. Try again';
        }
    }
}

// Array of available views
$availableActions = array('login', 'register', 'logout');

// Get action name from query string and set to variable
if ( isset($_GET['action']) ) {
    if ( in_array($_GET['action'], $availableActions) ){
        $action = $_GET['action'];
    } else {
        $action = 'login';
    }
} else {
    $action = 'login';
}

//Define the php file and page title depending on the action
switch($action) {
    case "login":
        login();
        break;
    case "register":
        register();
        break;
    case "logout":
        logout();
        break;
    default:
        login();
        break;
}

function login() {
    GLOBAL $action;
    $pageTitle = "Login | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/login.php');
    require_once('view/includes/hp_footer.php');
}

function register() {
    GLOBAL $action;
    $pageTitle = "Register | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/register.php');
    require_once('view/includes/hp_footer.php');
}

function logout() {
    GLOBAL $action;
    session_unset();
    session_destroy();
    $pageTitle = "Login | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/homepage.php');
    require_once('view/includes/hp_footer.php');
}



?>
