<?php
// Array of available actions
if (isset($_SESSION['profileID'])) {
    $availableActions = array('create_profile','profile', 'dog_register', 'dog_profile', 'search', 'dashboard', 'edit_profile', 'edit_dog');
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
    case "edit_profile":
        edit_profile();
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
    case "edit_dog":
        edit_dog();
        break;
    default:
        dashboard();
        break;
}

function dashboard() {
    GLOBAL $action;

    // Use the select data function to get dog profile and user data from the database and insert into page
    $dogs = selectData('dogs', array(
        'where'=> array('userID' => $_SESSION['userID'] )
        )
    );

    $pageTitle = "Dashboard | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/dashboard.php');
    require_once('view/includes/hp_footer.php');
}

function create_profile() {
    GLOBAL $action, $lastInsertID;

    //Process the form to create a user profile on PawLink
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Map sanitised user's profile inputs to variables
        $profileTitle = !empty($_POST['profileTitle']) ? sanitiseUserInput($_POST['profileTitle']) : null;
        $profileDescription = !empty($_POST['profileDescription']) ? sanitiseUserInput($_POST['profileDescription']) : null;
        //$profilePhoto = !empty($_POST['profilePhoto']) ? sanitiseUserInput($_POST['profilePhoto']) : null;


        try {
            $registrationData = array(
                'profileTitle' => $profileTitle,
                'profileDescription' => $profileDescription,
                'userID' => $_SESSION['userID']
                //'profilePhoto' => $profilePhoto,
            );
            insertData('profiles', $registrationData);
            $_SESSION['profileID'] = $lastInsertID;
            header("location: ?controller=profiles&action=dashboard");
        } catch (PDOexception $e) {
            echo "Error:".$e -> getMessage();
            die();
        }
    }
    $pageTitle = "Create Your Profile | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/profile_form.php');
    require_once('view/includes/hp_footer.php');
}

function edit_profile() {
    GLOBAL $action;


    $profile = selectData('profiles', array(
        'where'=> array('profileID' => $_SESSION['profileID'] ),
        'return type' => 'single'
        )
    );


    //Process the form to update a user profile on PawLink
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Map sanitised user inputs to variables
        $profileTitle = !empty($_POST['profileTitle']) ? sanitiseUserInput($_POST['profileTitle']) : null;
        $profileDescription = !empty($_POST['profileDescription']) ? sanitiseUserInput($_POST['profileDescription']) : null;
        //$profilePhoto = !empty($_POST['profilePhoto']) ? sanitiseUserInput($_POST['profilePhoto']) : null;


        try {
            $profileData = array(
                'profileTitle' => $profileTitle,
                'profileDescription' => $profileDescription,
                'userID' => $_SESSION['userID']
                //'profilePhoto' => $profilePhoto,
            );
            $updateWhere = array(
                'profileID' => $_SESSION['profileID']
            );
            updateData('profiles', $profileData, $updateWhere);
            $notificationMsg = 'Success, your profile has been updated';

            $profile = selectData('profiles', array(
                'where'=> array('profileID' => $_SESSION['profileID'] ),
                'return type' => 'single'
                )
            );
        } catch (PDOexception $e) {
            echo "Error:".$e -> getMessage();
            die();
        }
    }

    $pageTitle = "Edit My Profile | Pawlink";
    require_once('view/includes/hp_header.php');
    require_once('view/profile_form.php');
    require_once('view/includes/hp_footer.php');
}

function profile() {
    GLOBAL $action, $profileID;
    // Get profile ID from query string and set to variable

    if ( !empty($_GET['profileID']) ) {
        $profileID = sanitiseUserInput($_GET['profileID']);
    } else {
        header('HTTP/1.1 404 Not Found');
        exit;
    }

    $pageTitle = "About Me | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/profile.php');
    require_once('view/includes/hp_footer.php');
}

function dog_register() {
    GLOBAL $action;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $dogName = !empty($_POST['dogName']) ? sanitiseUserInput($_POST['dogName']) : null;
        //$dogPhoto = !empty($_POST['dogPhoto']) ? sanitiseUserInput($_POST['dogPhoto']) : null;
        $breed = !empty($_POST['breed']) ? sanitiseUserInput($_POST['breed']) : null;
        $birthYear = !empty($_POST['birthYear']) ? sanitiseUserInput($_POST['birthYear']) : null;
        $gender = !empty($_POST['gender']) ? sanitiseUserInput($_POST['gender']) : null;
        $dogDescription = !empty($_POST['dogDescription']) ? sanitiseUserInput($_POST['dogDescription']) : null;


        try {
            $dogData = array(
                'dogName' => $dogName,
                //'dogPhoto' => $dogPhoto,
                'breed' => $breed,
                'birthYear' => $birthYear,
                'gender' => $gender,
                'dogDescription' => $dogDescription,
                'userID' => $_SESSION['userID']
            );
            insertData('dogs', $dogData);
            header("location: ?controller=profiles&action=dashboard");
        } catch (PDOexception $e) {
            echo "Error:".$e -> getMessage();
            die();
        }
    }

    $pageTitle = "Register a Dog | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/dog_form.php');
    require_once('view/includes/hp_footer.php');
}

function dog_profile() {
    GLOBAL $action, $dogID;

    // Get dog ID from query string and set to variable
        if ( !empty($_GET['dogID']) ) {
        $dogID = sanitiseUserInput($_GET['dogID']);
    } else {
        header('HTTP/1.1 404 Not Found');
        exit;
    }

    $pageTitle = "Dog | PawLink";
    // Compile the dog profile page from page segments
    require_once('view/includes/hp_header.php');
    require_once('view/dog_profile.php');
    require_once('view/includes/hp_footer.php');

}

function edit_dog() {
    GLOBAL $action, $dogID;

    // Get dog ID from query string and set to variable
    if ( !empty($_GET['dogID']) ) {
        $dogID = sanitiseUserInput($_GET['dogID']);
    } else {
        header('HTTP/1.1 404 Not Found');
        exit;
    }

    // Use the select data function to get dog profile and user data from the database and insert into page
    $dogs = selectData('dogs', array(
        'where'=> array('dogID' => $dogID ),
        'return type' => 'single'
        )
    );

    // Match returned dog with current user ID
    if ( $dogs['userID'] != $_SESSION['userID'] ) {
        header('HTTP/1.1 403 Forbidden');
        exit;
    }

    //Process post data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $dogName = !empty($_POST['dogName']) ? sanitiseUserInput($_POST['dogName']) : null;
        //$dogPhoto = !empty($_POST['dogPhoto']) ? sanitiseUserInput($_POST['dogPhoto']) : null;
        $breed = !empty($_POST['breed']) ? sanitiseUserInput($_POST['breed']) : null;
        $birthYear = !empty($_POST['birthYear']) ? sanitiseUserInput($_POST['birthYear']) : null;
        $gender = !empty($_POST['gender']) ? sanitiseUserInput($_POST['gender']) : null;
        $dogDescription = !empty($_POST['dogDescription']) ? sanitiseUserInput($_POST['dogDescription']) : null;


        try {
            $dogData = array(
                'dogName' => $dogName,
                //'dogPhoto' => $dogPhoto,
                'breed' => $breed,
                'birthYear' => $birthYear,
                'gender' => $gender,
                'dogDescription' => $dogDescription,
                'userID' => $_SESSION['userID']
            );
            $updateWhere = array(
                'dogID' => $dogID
            );

            updateData('dogs', $dogData, $updateWhere);
            $notificationMsg = 'Success, '.$dogName.'\'s profile has been updated!';
            // Use the select data function to get dog profile and user data from the database and insert into page
            $dogs = selectData('dogs', array(
                'where'=> array('dogID' => $dogID ),
                'return type' => 'single'
                )
            );
        } catch (PDOexception $e) {
            echo "Error:".$e -> getMessage();
            die();
        }
    }


    $pageTitle = "Edit Dog Profile | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/dog_form.php');
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
