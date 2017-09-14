<?php
// Array of available actions
$availableActions = array('homepage', 'gallery', 'about', 'contact', 'faq');

// Get action name from query string and set to variable
if ( isset($_GET['action']) ) {
    if ( in_array($_GET['action'], $availableActions) ){
        $action = $_GET['action'];
    } else {
        $action = 'homepage';
    }
} else {
    $action = 'homepage';
}

//Define the php file and page title depending on the action
switch($action) {
    case "homepage":
        homepage();
        break;
    case "gallery":
        gallery();
        break;
    case "about":
        about();
        break;
    case "contact":
        contact();
        break;
    case "faq":
        faq();
        break;
    default:
        homepage();
        break;
}

function homepage() {
    GLOBAL $action;
    $pageTitle = "Trusted, local dog walkers | PawLink";
    require_once('view/includes/header.php');
    require_once('view/homepage.php');
    require_once('view/includes/footer.php');
}

function gallery() {
    GLOBAL $action;
    $pageTitle = "Wall of Dogs | PawLink";
    require_once('view/includes/header.php');
    require_once('view/gallery.php');
    require_once('view/includes/footer.php');
}

function about() {
    GLOBAL $action;
    $pageTitle = "About Us| PawLink";
    require_once('view/includes/header.php');
    require_once('view/about.php');
    require_once('view/includes/footer.php');
}

function contact() {
    GLOBAL $action;
    $pageTitle = "Contact Us| PawLink";
    require_once('view/includes/header.php');
    require_once('view/contact.php');
    require_once('view/includes/footer.php');
}

function faq() {
    GLOBAL $action;
    $pageTitle = "Frequently Ask Questions | PawLink";
    require_once('view/includes/header.php');
    require_once('view/faq.php');
    require_once('view/includes/footer.php');
}
?>
