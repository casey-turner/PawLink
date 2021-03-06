<?php
// Array of available views
$availableActions = array('login', 'register', 'geocodeAll', 'logout');

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
    /*case "geocodeAll":
        geocodeAll();
        break;*/
    default:
        login();
        break;
}

function login() {
    GLOBAL $action;

    // Do authentication checks
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['useremail']) && isset($_POST['password'])) {
            if ( db_authenticate(sanitiseUserInput( $_POST['useremail']), sanitiseUserInput($_POST['password'])) ) {
                $_SESSION['userstate'] = 'member';
                $_SESSION['useremail'] = sanitiseUserInput( $_POST['useremail']);

                //Setting session variables based on user data
                $userdata = selectData('users', array(
                    'select' => ' profiles.*, users.*',
                    'left join' => array('table2' => 'profiles', 'column' => 'userID'),
                    'where'=> array('email' => $_SESSION['useremail'] ),
                    'return type' => 'single'
                    )
                );

                $_SESSION['userID'] = $userdata['userID'];
                $_SESSION['displayName'] = $userdata['firstName']." ".substr($userdata['lastName'], 0, 1);
                $_SESSION['firstName'] = $userdata['firstName'];
                $_SESSION['profileImage'] = $userdata['profileImage'];

                if ($userdata['profileID'] != null ) {
                    $_SESSION['profileID'] = $userdata['profileID'];
                }

                if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                    echo 'true';
                    exit;
                } else {
                    header("location: ?controller=profiles&action=dashboard");
                    exit;
                }
            } else {
                if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                    echo 'false';
                    exit;
                } else {
                    $errorMsg = 'Login failed. Try again';
                }
            }
        }
    }

    $pageTitle = "Login | PawLink";
    require_once('view/includes/header.php');
    require_once('view/login.php');
    require_once('view/includes/footer.php');
}

function register() {
    GLOBAL $action, $lastInsertID ;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstName = !empty($_POST['firstname']) ? sanitiseUserInput($_POST['firstname']) : null;
        $lastName = !empty($_POST['lastname']) ? sanitiseUserInput($_POST['lastname']) : null;
        $email = !empty($_POST['useremail']) ? sanitiseUserInput($_POST['useremail']) : null;
        $phone = !empty($_POST['phone']) ? sanitiseUserInput($_POST['phone']) : null;
        $address = !empty($_POST['address']) ? sanitiseUserInput($_POST['address']) : null;
        $suburb = !empty($_POST['suburb']) ? sanitiseUserInput($_POST['suburb']) : null;
        $state = !empty($_POST['state']) ? sanitiseUserInput($_POST['state']) : null;
        $postcode = !empty($_POST['postcode']) ? sanitiseUserInput($_POST['postcode']) : null;
        $password = !empty($_POST['password']) ? password_hash(sanitiseUserInput($_POST['password']), PASSWORD_DEFAULT) : null;

        //Check if email exists int the $db
        $emailCheck = selectData('users', array(
            'where' => array('email' => $email),
            'return type' => 'count'
            )
        );

        if ($emailCheck == 0) {
            try {
                $registrationData = array(
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'suburb' => $suburb,
                    'state' => $state,
                    'postcode' => $postcode,
                    'password' => $password
                );
                insertData('users', $registrationData);

                geocode_address($lastInsertID);

                login();
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
        } else {
            if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                echo 'false';
                exit;
            } else {
                //Capture post data into session variable here.
                $_SESSION['error'] = 'The email address '.$email. ' is already registered with PawLink.';
                exit;
            }

        }
    }

    $pageTitle = "Register | PawLink";
    require_once('view/includes/header.php');
    require_once('view/register.php');
    require_once('view/includes/footer.php');
}

/*function geocodeAll() {

    //Get all users
    $users = selectData('users', array());

    set_time_limit(0);

    foreach ($users as $user) {
        geocode_address($user['userID']);
    }

    $users = selectData('users', array());

    echo "<pre>";
    var_dump($users);
    echo "</pre>";
}*/

function logout() {
    GLOBAL $action;
    session_unset();
    session_destroy();
    header("location: ?controller=publicpages&action=homepage");
    exit;
}



?>
