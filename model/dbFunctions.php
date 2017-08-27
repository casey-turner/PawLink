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


    /*$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM users WHERE email = :email AND password = :password";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':email', $u);
		$res->bindParam(':password', $p);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}

	if($res->rowCount() == 1) {
		return true;
	} else {
		return false;
	}*/


//sanitise data
function sanitiseUserInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	return $data;
}

function insertData($table, $data){
    GLOBAL $db;
    if(!empty($data) && is_array($data)) {
        $columns = '';
        $values = '';
        $i = 0;
        $columnString = implode(',', array_keys($data));
        $valueString = ":".implode(',:', array_keys($data));
        $sql = "INSERT INTO ".$table."(".$columnString.") VALUES (".$valueString.")";
        $query = $db->prepare($sql);
        print_r($data);
        foreach ($data as $key => $val) {
            $query->bindValue(':'.$key, $val);
        }
        $insert = $query->execute();
    }
    return $insert;
}


function selectData($table, $conditions = array()) {
    GLOBAL $db;
    $sql = 'SELECT';
    //select column list or * all
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
            $data = $query->fetchAll();
        }
        return $data;
    }
    return $data;
}
 ?>
