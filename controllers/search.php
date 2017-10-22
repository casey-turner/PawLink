<?php
// Array of available actions

$availableActions = array('search', 'search_walkers');


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
    case "search":
        search();
        break;
    case "search_walkers":
        search_walkers();
        break;
    default:
        dashboard();
        break;
}

function search() {
    GLOBAL $action;

    /*
    * get search query params
    */
    if ( !empty($_GET['location']) ) {
    	$search_location = sanitiseUserInput( $_GET['location'] );

    	$geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($search_location.', Australia')."&key=AIzaSyBSsYbifNcYXGACnsjxO8OQtp5h9s9KCfU";

    	$lat_long = get_object_vars(json_decode(file_get_contents($geocode_url)));


    	// pick out what we need (lat,lng)
    	$search_latitude = $lat_long['results'][0]->geometry->location->lat;
    	$search_longitude = $lat_long['results'][0]->geometry->location->lng;
    } else {
    	$search_latitude = null;
    	$search_longitude = null;
    }

    // Define search arguments
    $search_args['latitude'] = !empty($search_latitude) ? $search_latitude : null;
    $search_args['longitude'] = !empty($search_longitude) ? $search_longitude : null;

    // Get search results
    $results = selectData('profiles', array(
        'select' => "profiles.profileTitle, profiles.profileDescription, profiles.profileImage, profiles.profileID, rates.status, users.latitude, users.longitude, users.firstName, left(users.lastName,1) AS lastName",
        'left join' => array('table2' => 'rates', 'column' => 'profileID'),
        'left join2' => array('table3' => 'users', 'column' => 'userID'),
        'where'=> array('rates.status' => 'active' ),
        //'start' => '0',
        //'limit' => '10'
        )
    );

    // If no results returned
    if ( empty($results) ) {
    	$go_tutor_search_response['errors'][] = 'Sorry, we couldn\'t find any tutors matching your query. Please <a href="'.site_url().'/contact">contact us</a> to discuss how we may be able to help you further.';
    }

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
