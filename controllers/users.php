<?php
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

    // Do authentication checks
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['useremail']) && isset($_POST['password'])) {
            if ( db_authenticate(sanitiseUserInput( $_POST['useremail']), sanitiseUserInput($_POST['password'])) ) {
                $_SESSION['userstate'] = 'member';
                $_SESSION['useremail'] = sanitiseUserInput( $_POST['useremail']);

                //Setting session variables based on user data
                $userdata = selectData('users', array(
                    'left join' => array('table2' => 'profiles', 'column' => 'userID'),
                    'where'=> array('email' => $_SESSION['useremail'] ),
                    'return type' => 'single'
                    )
                );
                $_SESSION['userID'] = $userdata['userID'];
                $_SESSION['displayName'] = $userdata['firstName']." ".substr($userdata['lastName'], 0, 1);

                //Check to see if user has a profile, if not direct them to create a profile form only.
                if ($userdata['profileID'] != null ) {
                    $_SESSION['profileID'] = $userdata['profileID'];
                    header("location: ?controller=profiles&action=dashboard");
                } else {
                    header("location: ?controller=profiles&action=create_profile");
                }

            } else {
                $errorMsg = 'Login failed. Try again';
            }
        }
    }

    $pageTitle = "Login | PawLink";
    require_once('view/includes/hp_header.php');
    require_once('view/login.php');
    require_once('view/includes/hp_footer.php');
}

function register() {
    GLOBAL $action;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstName = !empty($_POST['firstname']) ? sanitiseUserInput($_POST['firstname']) : null;
        $lastName = !empty($_POST['lastname']) ? sanitiseUserInput($_POST['lastname']) : null;
        $phoneNumber = !empty($_POST['phone']) ? sanitiseUserInput($_POST['phone']) : null;
        $email = !empty($_POST['useremail']) ? sanitiseUserInput($_POST['useremail']) : null;
        $password = !empty($_POST['password']) ? password_hash(sanitiseUserInput($_POST['password']), PASSWORD_DEFAULT) : null;

        try {
            $registrationData = array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'email' => $email,
                'password' => $password
            );
            insertData('users', $registrationData);
            header("location: ?controller=users&action=login");
        } catch (PDOexception $e) {
            echo "Error:".$e -> getMessage();
            die();
        }
    }

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
