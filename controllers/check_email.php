<?php
    if(isset($_POST['useremail'])) {
        if($_POST['useremail'] == 'paul@paul.com') {
            echo 'true';
        } else {
            echo 'false';
        }
    }
?>
