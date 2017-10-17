<?php
// Array of available actions
if (isset($_SESSION['profileID'])) {
    $availableActions = array('create_profile','profile', 'dog_register',
                        'dog_profile', 'dashboard', 'edit_profile',
                        'edit_dog','delete_dog', 'rates');
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
    case "profile":
        profile();
        break;
    case "create_profile":
        create_profile();
        break;
    case "edit_profile":
        edit_profile();
        break;
    case "dog_profile":
        dog_profile();
        break;
    case "dog_register":
        dog_register();
        break;
    case "edit_dog":
        edit_dog();
        break;
    case "delete_dog":
        delete_dog();
        break;
    case "rates":
        rates();
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

    // Use the select data function to get dog profile and user data from the database and insert into page
    $dogs = selectData('dogs', array(
        'where' => array('userID' => $_SESSION['userID'])
        )
    );
    $rates = selectData('rates', array(
        'select'=>'status',
        'where'=> array('profileID' => $_SESSION['profileID'] ),
        'return type' => 'single'
        )
    );


    $pageTitle = "Dashboard | PawLink";
    require_once('view/includes/header.php');
    require_once('view/dashboard.php');
    require_once('view/includes/footer.php');
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

    // Use the select data function to get profile and user data from the database and insert into page
    $profile = selectData('profiles', array(
                'left join' => array('table2' => 'users', 'column' => 'userID'),
                'where'=> array('profileID' => $profileID ),
                'return type' => 'single'
                )
            );
    $rates = selectData('rates', array(
                'where'=> array('profileID' => $profileID ),
                'return type' => 'single'
                )
            );

    $pageTitle = "About Me | PawLink";
    require_once('view/includes/header.php');
    require_once('view/profile.php');
    require_once('view/includes/footer.php');
}

function create_profile() {
    GLOBAL $action, $lastInsertID;

    //Process the form to create a user profile on PawLink
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Map sanitised user's profile inputs to variables
        $profileTitle = !empty($_POST['profileTitle']) ? sanitiseUserInput($_POST['profileTitle']) : null;
        $profileDescription = !empty($_POST['profileDescription']) ? sanitiseUserInput($_POST['profileDescription']) : null;
        $profilePhoto = !empty($_POST['profileImage']) ? sanitiseUserInput($_POST['profileImage']) : null;
        $deleteProfileImage = !empty($_POST['deleteProfileImage']) ? sanitiseUserInput($_POST['deleteProfileImage']) : null;

        if ( !is_null($profilePhoto) ) {
            //Extract base64 data from string generated by Croppie.JS
            list($type, $profilePhoto) = explode(';', $profilePhoto);
            list(, $profilePhoto) = explode(',', $profilePhoto);

            //Verify base64 data
            if ( base64_encode(base64_decode($profilePhoto)) === $profilePhoto){
                $profilePhoto = base64_decode($profilePhoto);
                $imageName = $_SESSION['userID'].time().'.jpg';
            } else {
                $errorMsg = 'Invalid image, please try again.' ;
            }
        }

        if ( !isset($errorMsg) ) {
            try {
                $profileData = array(
                    'profileTitle' => $profileTitle,
                    'profileDescription' => $profileDescription,
                    'userID' => $_SESSION['userID']
                );

                if (!is_null($deleteProfileImage) || !is_null($profilePhoto) ){
                    $profileData['profileImage'] = $imageName;
                }

                insertData('profiles', $profileData);
                $_SESSION['profileID'] = $lastInsertID;

                if ( !empty($imageName) ) {
                    file_put_contents('view/uploads/'.$imageName, $profilePhoto);
                    $_SESSION['profileImage'] = $imageName;
                }
                header("location: ?controller=profiles&action=dashboard");
            } catch (PDOexception $e) {
                echo "Error:".$e -> getMessage();
                die();
            }
        }
    }
    $pageTitle = "Create Your Profile | PawLink";
    require_once('view/includes/header.php');
    require_once('view/profile_form.php');
    require_once('view/includes/footer.php');
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
        $profilePhoto = !empty($_POST['profileImage']) ? sanitiseUserInput($_POST['profileImage']) : null;
        $deleteProfileImage = !empty($_POST['deleteProfileImage']) ? sanitiseUserInput($_POST['deleteProfileImage']) : null;

        if ( !is_null($deleteProfileImage) || !is_null($profilePhoto) ) {
            if ( !empty($profile['profileImage']) ) {
                unlink('view/uploads/'.$profile['profileImage']);
                $imageName = '';
            }
        }

        if ( !is_null($profilePhoto) ) {
            //Extract base64 data from string generated by Croppie.JS
            list($type, $profilePhoto) = explode(';', $profilePhoto);
            list(, $profilePhoto) = explode(',', $profilePhoto);

            //Verify base64 data
            if ( base64_encode(base64_decode($profilePhoto)) === $profilePhoto){
                $profilePhoto = base64_decode($profilePhoto);
                $imageName = $_SESSION['userID'].time().'.jpg';
            } else {
                $errorMsg = 'Invalid image, please try again.' ;
            }
        }

        if ( !isset($errorMsg) ) {
            try {
                $profileData = array(
                    'profileTitle' => $profileTitle,
                    'profileDescription' => $profileDescription,
                    'userID' => $_SESSION['userID']
                );

                if (!is_null($deleteProfileImage) || !is_null($profilePhoto) ){
                    $profileData['profileImage'] = $imageName;
                }

                $updateWhere = array(
                    'profileID' => $_SESSION['profileID']
                );
                updateData('profiles', $profileData, $updateWhere);

                if ( !empty($imageName) ) {
                    file_put_contents('view/uploads/'.$imageName, $profilePhoto);
                    $_SESSION['profileImage'] = $imageName;
                } else {
                    unset($_SESSION['profileImage']);
                }
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
    }

    $pageTitle = "Edit My Profile | Pawlink";
    require_once('view/includes/header.php');
    require_once('view/profile_form.php');
    require_once('view/includes/footer.php');
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

    // Use the select data function to get dog profile and user data from the database and insert into page
    $dogs = selectData('dogs', array(
        'left join' => array('table2' => 'users', 'column' => 'userID'),
        'where'=> array('dogID' => $dogID ),
        'return type' => 'single'
        )
    );

    $pageTitle = "Dog | PawLink";
    // Compile the dog profile page from page segments
    require_once('view/includes/header.php');
    require_once('view/dog_profile.php');
    require_once('view/includes/footer.php');

}

function dog_register() {
    GLOBAL $action;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $dogName = !empty($_POST['dogName']) ? sanitiseUserInput($_POST['dogName']) : null;
        $breed = !empty($_POST['breed']) ? sanitiseUserInput($_POST['breed']) : null;
        $birthYear = !empty($_POST['birthYear']) ? sanitiseUserInput($_POST['birthYear']) : null;
        $gender = !empty($_POST['gender']) ? sanitiseUserInput($_POST['gender']) : null;
        $dogDescription = !empty($_POST['dogDescription']) ? sanitiseUserInput($_POST['dogDescription']) : null;
        $dogPhoto = !empty($_POST['dogProfileImage']) ? sanitiseUserInput($_POST['dogProfileImage']) : null;
        $deleteDogProfileImage = !empty($_POST['deleteDogProfileImage']) ? sanitiseUserInput($_POST['deleteDogProfileImage']) : null;

        if ( !is_null($dogPhoto) ) {
            //Extract base64 data from string generated by Croppie.JS
            list($type, $dogPhoto) = explode(';', $dogPhoto);
            list(, $dogPhoto) = explode(',', $dogPhoto);

            //Verify base64 data
            if ( base64_encode(base64_decode($dogPhoto)) === $dogPhoto){
                $dogPhoto = base64_decode($dogPhoto);
                $imageName = $_SESSION['userID'].time().'.jpg';
            } else {
                $errorMsg = 'Invalid image, please try again.' ;
            }
        }

        if ( !isset($errorMsg) ) {
            try {
                $dogData = array(
                    'dogName' => $dogName,
                    'breed' => $breed,
                    'birthYear' => $birthYear,
                    'gender' => $gender,
                    'dogDescription' => $dogDescription,
                    'userID' => $_SESSION['userID']
                );

                if ( !is_null($deleteDogProfileImage) || !is_null($dogPhoto) ) {
                    $dogData['dogProfileImage'] = $imageName;
                }

                insertData('dogs', $dogData);

                if ( !empty($imageName) ) {
                    file_put_contents('view/uploads/'.$imageName, $dogPhoto);
                }
                header("location: ?controller=profiles&action=dashboard");
            } catch (PDOexception $e) {
                echo "Error:".$e -> getMessage();
                die();
            }
        }
    }

    $pageTitle = "Register a Dog | PawLink";
    require_once('view/includes/header.php');
    require_once('view/dog_form.php');
    require_once('view/includes/footer.php');
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
        $breed = !empty($_POST['breed']) ? sanitiseUserInput($_POST['breed']) : null;
        $birthYear = !empty($_POST['birthYear']) ? sanitiseUserInput($_POST['birthYear']) : null;
        $gender = !empty($_POST['gender']) ? sanitiseUserInput($_POST['gender']) : null;
        $dogDescription = !empty($_POST['dogDescription']) ? sanitiseUserInput($_POST['dogDescription']) : null;
        $dogPhoto = !empty($_POST['dogProfileImage']) ? sanitiseUserInput($_POST['dogProfileImage']) : null;
        $deleteDogProfileImage = !empty($_POST['deleteDogProfileImage']) ? sanitiseUserInput($_POST['deleteDogProfileImage']) : null;

        if ( !is_null($deleteDogProfileImage) || !is_null($dogPhoto) ) {
            if ( !empty($dogs['dogProfileImage']) ) {
                unlink('view/uploads/'.$dogs['dogProfileImage']);
                $imageName = '';
            }
        }

        if ( !is_null($dogPhoto) ) {
            //Extract base64 data from string generated by Croppie.JS
            list($type, $dogPhoto) = explode(';', $dogPhoto);
            list(, $dogPhoto) = explode(',', $dogPhoto);

            //Verify base64 data
            if ( base64_encode(base64_decode($dogPhoto)) === $dogPhoto){
                $dogPhoto = base64_decode($dogPhoto);
                $imageName = $_SESSION['userID'].time().'.jpg';
            } else {
                $errorMsg = 'Invalid image, please try again.' ;
            }
        }

        if ( !isset($errorMsg) ) {
            try {
                $dogData = array(
                    'dogName' => $dogName,
                    'breed' => $breed,
                    'birthYear' => $birthYear,
                    'gender' => $gender,
                    'dogDescription' => $dogDescription,
                    'userID' => $_SESSION['userID']
                );

                if ( !is_null($deleteDogProfileImage) || !is_null($dogPhoto) ) {
                    $dogData['dogProfileImage'] = $imageName;
                }

                $updateWhere = array(
                    'dogID' => $dogID
                );
                updateData('dogs', $dogData, $updateWhere);

                if ( !empty($imageName) ) {
                    file_put_contents('view/uploads/'.$imageName, $dogPhoto);
                }

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
    }


    $pageTitle = "Edit Dog Profile | PawLink";
    require_once('view/includes/header.php');
    require_once('view/dog_form.php');
    require_once('view/includes/footer.php');
}

function delete_dog() {
    GLOBAL $action;

    //Get Book ID from the query string
    if ( !empty($_GET['dogid']) ) {
        $dogID = sanitiseUserInput($_GET['dogid']);
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

    //Set table & condition variable
    $table = 'dogs';
    $condition = array('dogID' => $dogID);

    try {
        //Call delete function
        deleteData( $table, $condition);
    } catch (PDOexception $e) {
        echo "Error:".$e -> getMessage();
        die();
    }

    if ( !empty($dogs['dogProfileImage']) ) {
        unlink('view/uploads/'.$dogs['dogProfileImage']);
    }

    header("location: ?controller=profiles&action=dashboard");
    exit;
}

function rates() {
    GLOBAL $action;

    $rates = selectData('rates', array(
        'where'=> array('profileID' => $_SESSION['profileID'] ),
        'return type' => 'single'
        )
    );

    //Process post data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ( !empty($_POST['status']) && $_POST['status'] == 'active' ) {
            $status = 'active';
        } else {
            $status = 'inactive';
        }

        $walk30 = !empty($_POST['walk30']) ? sanitiseUserInput($_POST['walk30']) : null;
        $walk60 = !empty($_POST['walk60']) ? sanitiseUserInput($_POST['walk60']) : null;
        $extraDog = !empty($_POST['extraDog']) ? sanitiseUserInput($_POST['extraDog']) : null;

        if ( !is_null($walk30) && !is_null($walk60) && !is_null($extraDog) ) {
            try {
                $ratesData = array(
                    'status' => $status,
                    'walk30' => $walk30,
                    'walk60' => $walk60,
                    'extraDog' => $extraDog,
                    'profileID' => $_SESSION['profileID']
                );

                if ( empty($rates['priceID']) ) {
                    insertData('rates', $ratesData);

                    if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                        $ajaxResponse = 'inserted';
                    } else {
                        $_SESSION['notificationMsg'] = 'Success, your dog walking rates have been set!';
                    }


                } else {
                    $updateWhere = array(
                        'profileID' => $_SESSION['profileID']
                    );
                    updateData('rates', $ratesData, $updateWhere);

                    if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                        $ajaxResponse = 'updated';
                    } else {
                        $_SESSION['notificationMsg'] = 'Success, your dog walking rates have been updated!';
                    }

                    $rates = selectData('rates', array(
                        'where'=> array('profileID' => $_SESSION['profileID'] ),
                        'return type' => 'single'
                        )
                    );
                }

                if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                    echo $ajaxResponse;
                    exit;
                }

            } catch (PDOexception $e) {
                echo "Error:".$e -> getMessage();
                die();
            }
        } else {

            if (isset($_POST['method']) && $_POST['method'] == 'ajax') {
                echo 'false';
                exit;
            } else {
                $_SESSION['errorMsg'] = 'Error saving rates, please try again.' ;
            }

        }

    }


    $pageTitle = "Register as Dog Walker | PawLink";
    require_once('view/includes/header.php');
    require_once('view/rates_form.php');
    require_once('view/includes/footer.php');

}


?>
