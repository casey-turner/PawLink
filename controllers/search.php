<?php
// Array of available actions

$availableActions = array('search', 'get_walkers', 'display_walkers');


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
    case "get_walkers":
        get_walkers();
        break;
    case "display_walkers":
        display_walkers();
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
    	$search_location = urldecode(sanitiseUserInput($_GET['location']));

    	$geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($search_location.', Australia')."&key=AIzaSyBSsYbifNcYXGACnsjxO8OQtp5h9s9KCfU";

    	$lat_long = get_object_vars(json_decode(file_get_contents($geocode_url)));


    	// pick out what we need (lat,lng)
    	$search_latitude = $lat_long['results'][0]->geometry->location->lat;
    	$search_longitude = $lat_long['results'][0]->geometry->location->lng;
    } else {
        $search_location = null;
    	$search_latitude = null;
    	$search_longitude = null;
    }

    // Define search arguments
    $search_args['latitude'] = !empty($search_latitude) ? (float)$search_latitude : null;
    $search_args['longitude'] = !empty($search_longitude) ? (float)$search_longitude : null;
    $search_args['radius'] = 2;

    // Pagination
    $limit = 15;
    $page = !empty($_GET['p']) ? (int)$_GET['p'] : null;

    if(empty($page)) {
        $page=1;
        $start=0;
    } else {
        $start = $limit * ($page-1);
    }

    $search_args['start'] = $start;
    $search_args['limit'] = $limit;

    // Get total rows
    $rowCount = getSearchResults($search_args,false,'count');

    // Calculate number of pages
    $numPages = ceil($rowCount/$limit);

    // Get paginated search results
    $results = getSearchResults($search_args,true,'all');

    $pageTitle = "Find a Dog Walker | PawLink";
    require_once('view/includes/header.php');
    require_once('view/search.php');
    require_once('view/includes/footer.php');
}


function get_walkers() {
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

function display_walkers() {
    GLOBAL $action;

    $pageTitle = "Find a Dog Walker | PawLink";
    require_once('view/includes/header.php');
    require_once('view/display_walker.php');
    require_once('view/includes/footer.php');
}

function getSearchResults($search_args,$limit,$returnType) {

    // Build query and get search results
    $geo_search = null;
    $geo_search_fields = null;
    $geo_search_distance = null;
    $geo_search_where = null;
    $geo_search_where_distance = null;
    $geo_search_distance_field = null;

    $limit = $limit ? "LIMIT {$search_args['start']}, {$search_args['limit']}" : null;

    if ( !empty($search_args['latitude']) && !empty($search_args['longitude']) && !empty($search_args['radius']) ) {

        $geo_search_fields = ", latpoint, longpoint, radius";
        $geo_search_distance_field = ", distance";

        $geo_search_distance = ",
            distance_unit
             * DEGREES(ACOS(COS(RADIANS(latpoint))
             * COS(RADIANS(latitude))
             * COS(RADIANS(longpoint - longitude))
             + SIN(RADIANS(latpoint))
             * SIN(RADIANS(latitude)))) AS distance";

        $geo_search_where = "
            JOIN (
                SELECT {$search_args['latitude']}  AS latpoint, {$search_args['longitude']} AS longpoint,
                       {$search_args['radius']} AS radius, 111.045 AS distance_unit
            ) AS param ON 1=1
            WHERE latitude
                BETWEEN latpoint  - (radius / distance_unit)
                AND latpoint  + (radius / distance_unit)
                AND longitude
                BETWEEN longpoint - (radius / (distance_unit * COS(RADIANS(latpoint))))
                AND longpoint + (radius / (distance_unit * COS(RADIANS(latpoint))))";

        $geo_search_where_distance = "WHERE distance <= radius ORDER BY distance";
    }

    $searchSQL = "
    SELECT userID, latitude, longitude, profileTitle, profileDescription, profileImage, profileID, status, walk30, suburb, firstName, left(lastName,1) AS lastName {$geo_search_fields} {$geo_search_distance_field}
    FROM (
        SELECT users.userID, users.latitude, users.longitude, profiles.profileTitle, profiles.profileDescription, profiles.profileImage, profiles.profileID, rates.status, rates.walk30, users.suburb, users.firstName, users.lastName {$geo_search_fields} {$geo_search_distance}
        FROM users
        JOIN profiles ON users.userID = profiles.userID
        JOIN rates ON profiles.profileID = rates.profileID AND rates.status = 'active'
        {$geo_search_where}
    ) as results
    {$geo_search_where_distance}
    {$limit}
    ";

    // Execute query
    return sqlQuery($searchSQL, $returnType);
}


?>
