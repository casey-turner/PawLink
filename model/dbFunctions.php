<?php
function db_authenticate($userEmail, $password) {
    $userLogin = selectData('users', array(
        'select'=> ' email, password',
        'where'=> array('email' => $userEmail ),
        'return type' => 'single'
        )
    );

    if(password_verify($password,$userLogin['password'])) {
		return true;
	} else {
		return false;
	}
}

//sanitise data
function sanitiseUserInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	return $data;
}




function insertData($table, $data){
    GLOBAL $db, $lastInsertID;
    if(!empty($data) && is_array($data)) {
        $columns = '';
        $values = '';
        $i = 0;
        $columnString = implode(',', array_keys($data));
        $valueString = ":".implode(',:', array_keys($data));
        $sql = "INSERT INTO ".$table."(".$columnString.") VALUES (".$valueString.")";
        $query = $db->prepare($sql);

        foreach ($data as $key => $val) {
            $query->bindValue(':'.$key, $val);
        }
        $insert = $query->execute();
        $lastInsertID = $db->lastInsertId();
    }
    return $insert;
}

function sqlQuery($sql, $return_type) {
     GLOBAL $db;

     $query = $db->prepare($sql);
     $data = $query->execute();

     //return single or all rows - identifying fetch function required
     if(!empty($return_type) && $return_type != 'all') {
         switch ($return_type) {
             case 'count':
                 $data = $query->rowCount();
                 break;
             case 'single':
                 $data = $query->fetch(PDO::FETCH_ASSOC);
                 break;
             default:
                 $data = $query->fetch(PDO::FETCH_ASSOC);
                 break;
         }
     } else {
         if($query->rowCount() > 0) {
             $data = $query->fetchAll(PDO::FETCH_ASSOC);
         } else {
             return false;
         }
         return $data;
     }
     return $data;
 }

function selectData($table, $conditions = array()) {
    GLOBAL $db;
    $sql = 'SELECT ';
    //select column list or *  all
    $sql .= array_key_exists("select", $conditions)?$conditions['select']:'*';
    $sql .= ' FROM '.$table;
    //left join - if any
    if(array_key_exists("left join", $conditions)) {
        $sql .= ' LEFT JOIN ';
        $sql .= $conditions['left join']['table2'];
        $sql .= ' ON ';
        $sql .= $table.'.'.$conditions['left join']['column'];
        $sql .= ' = ';
        $sql .= $conditions['left join']['table2'].'.'.$conditions['left join']['column'];
    }
    if(array_key_exists("left join2", $conditions)) {
        $sql .= ' LEFT JOIN ';
        $sql .= $conditions['left join2']['table3'];
        $sql .= ' ON ';
        $sql .= $table.'.'.$conditions['left join2']['column'];
        $sql .= ' = ';
        $sql .= $conditions['left join2']['table3'].'.'.$conditions['left join2']['column'];
    }
    //where conditions - if any
    if(array_key_exists("where", $conditions)) {
        $sql .= ' WHERE ';
        $i = 0;
        foreach ($conditions['where'] as $key => $value) {
            $pre = ($i > 0)? ' AND ':'';
            $sql .= $pre.$key." = '".$value."'";
            $i++;
        }
    }
    // order by column/s
    if(array_key_exists("order_by", $conditions)) {
        $sql .= ' ORDER BY '.$conditions['order_by'];
    }
    //limit conditions - if any
    if(array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
        $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
    } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
        $sql .= ' LIMIT '.$conditons['limit'];
    }
    $query = $db->prepare($sql);
    $data = $query->execute();
    //return single or all rows - identifying fetch function required
    if(array_key_exists("return type", $conditions) && $conditions['return type'] != 'all') {
        switch ($conditions['return type']) {
            case 'count':
                $data = $query->rowCount();
                break;
            case 'single':
                $data = $query->fetch(PDO::FETCH_ASSOC);
                break;
            default:
                $data = '';
                break;
        }
    } else {
        if($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
        return $data;
    }
    return $data;
}

//Update data function
function updateData($table, $data, $conditions) {
    GLOBAL $db;
    if (!empty($data) && is_array($data)) {
        $colvalSet ='';
        $whereSql = '';
        $i = 0;
        /*if (!array_key_exists('modified', $data)) {
            $data['modified'] = date("y-m-d h-i-s");
        }*/
        foreach ($data as $key => $value) {
            $pre = ($i > 0)?', ':'';
            $colvalSet .= $pre.$key."='".$value."'";
            $i++;
        }
        if (!empty($conditions) && is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0)? ' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
            }
        }
        $sql  = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
        $query = $db->prepare($sql);
        $update = $query->execute();
    }
    return $update;
}

//Delete data function
function deleteData($table, $conditions) {
    GLOBAL $db;
    $whereSql = '';
    if(!empty($conditions) && is_array($conditions)) {
        $whereSql .= ' WHERE ';
        $i = 0;
        foreach ($conditions as $key => $value) {
            $pre = ($i > 0 )?' AND ':'';
            $whereSql .= $pre.$key. " = '".$value."'";
            $i++;
        }
        $deleted = $db->exec("DELETE FROM ".$table.$whereSql);
    }
    return $deleted;
}

//Geocode User Address
function geocode_address($user_id) {

    $user = selectData('users', array(
        'where' => array('userID' => $user_id),
        'return type' => 'single'
        )
    );

	//get address from user meta for geocoding
	$address_1 = $user['address'];
	$suburb = $user['suburb'];
	$state = $user['state'];
    $postcode = $user['postcode'];

	$address = $address_1.' '.$suburb.' '.$state.' '.$postcode.', Australia';

	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&key=AIzaSyBSsYbifNcYXGACnsjxO8OQtp5h9s9KCfU";
	$lat_long = get_object_vars(json_decode(file_get_contents($url)));

	// pick out what we need (lat,lng)
	$geo_latitude = !empty($lat_long['results'][0]) ? $lat_long['results'][0]->geometry->location->lat : null;
	$geo_longitude = !empty($lat_long['results'][0]) ? $lat_long['results'][0]->geometry->location->lng : null;

	// save coords to user table
    try {
        $userData = array(
            'latitude' => $geo_latitude,
            'longitude' => $geo_longitude
        );

        $updateWhere = array(
            'userID' => $user_id
        );

        updateData('users', $userData, $updateWhere);
        return true;

    } catch (PDOexception $e) {
        return false;
        die();
    }

}
 ?>
