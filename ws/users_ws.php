<?php

if(isset($_GET)){
    if($_GET['state'] == 'getAdmin') {
        $sql = 'SELECT * FROM users WHERE email'. $_GET['index'];
        $res = $db->prepare($sql);
        $res->execute();
        $result = $res->
    }
    if($_GET['state'] == 'updateAdmin') {
        $sql = 'UPDATE users SET '. $_GET['index'];
    }
}
 ?>
