<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script>
            function showEdit(editKey){
                tint.style.display = 'block';
                modal.style.display = 'block';
                // call AJAX to get record from editKey
                $.ajax ({
                    url:'ws/users_01.php?state=getAdmin&index' +edit key
                    method: 'GET',
                    datatype: 'json'
                    success: function(data){
                        var json_obj = json.parse(data);
                        primarykey.value = json_obj[0]["userID"];
                        email.value = json_obj[0]["email"];
                        password.value = json_obj[0]["password"];
                    }
                })
            }

            function doEdit(form){
                $.ajax ({
                    url:'users_01.php?state=updateAdmin&index' +edit key
                    method: 'POST',
                    data: ("#editform").serialize,
                    datatype: 'json'

                    success: function(data){
                        console.log(data[0]);
                    }
                })r

            }

            function closeEdit(){
                tint.style.display = 'none';
                modal.style.display = 'none';

            }
        </script>
        <style>
        #tint {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: red;
            opacity: .5;
        }

        #modal {
            position: absolute;
            top: 10%;
            left: 10%;
            right: 10%;

            background-color: #FFF
        }

        input {
            display: block;
        }
        input[type=button] {
            display: inline-block;
        }
        </style>
    </head>
    <body>
        <?php
        // Write php that lists users with an edit button
        // Write a form that sits in a modal that opens on edit
        // Write a webservice to populate the edit form onClick

        // Connect to database an loop through the users to make a table


        $db = new PDO("mysql:host=localhost;dbname=pawlink;charset=utf8","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $res = $db->prepare('SELECT * FROM users');
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        // loop through results and render table
        foreach ($result as $row) {
            echo $row['email'];
            echo $row['password'];
            echo '<a href="#" onClick="showEdit" (' . $row["email"] . ')">Edit</a>';
            echo "</br>";
        }
         ?>

         <div id="tint">  </div>
         <div id="modal">
            <form class="" action="" method="">
                <input type="hidden" name="primarykey" id="primarykey">
                <input type="text" name="email" placeholder="email" id="email">
                <input type="password" name="password" placeholder="password" id="password">
                <input type="button" name="edit" value="edit">
                <input type="button"  name="cancel" value="cancel" onclick="closeEdit()">
            </form>
         </div>
    </body>
</html>
