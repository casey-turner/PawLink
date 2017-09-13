<?php
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152) {
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "Success";
    } else {
        print_r($errors);
    }
}
 ?>

<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="dogRegister" enctype="multipart/form-data" method="post" action="?controller=profiles&action=<?php echo $action; ?><?php if ($action == 'edit_dog' ) {echo '&dogID='.$dogID;} ?>" data-persist="garlic" data-parsley-validate>
                    <legend>
                    <?php if ($action == 'edit_dog') { ?>
                        Edit Dog Profile
                    <?php } else {?>
                        Create Dog Profile
                    <?php } ?>
                    </legend>
                    <?php
                    if (isset($notificationMsg)) { ?>
                        <div class="notifications">
                            <?php echo $notificationMsg; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <label>Dog name</label>
                    <input type="text" name="dogName" value="<?php if ( isset($dogs['dogName']) ) { echo $dogs['dogName']; } ?>" required>
                    <label>Breed</label>
                    <input type="text" name="breed" value="<?php if ( isset($dogs['breed']) ) { echo $dogs['breed']; } ?>" required>
                    <label>Birth year</label>
                    <input type="text" name="birthYear" value="<?php if ( isset($dogs['birthYear']) ) { echo $dogs['birthYear']; } ?>" required>
                    <label>Gender</label>
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Female"<?php if ( isset($dogs['gender']) && $dogs['gender'] == 'Female') { ?>checked="checked" <?php } ?> required>Female</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Male"<?php if ( isset($dogs['gender']) && $dogs['gender'] == 'Male') { ?>checked="checked" <?php } ?>>Male</label>
                    </div>
                    <div class="form-group">
                        <label for="comment">Short description:</label>
                        <textarea rows="5" name="dogDescription" required><?php if ( isset($dogs['dogDescription']) ) { echo $dogs['dogDescription']; } ?></textarea>
                    </div>
                    <input type="file" name="imageUpload" value="">
                    <img src="view/images/upload-photo.png"  />
                    <?php var_dump($_FILES) ?>
                    <div class="submit-cont">
                        <input class="orange-btn" type="submit" value="Save">
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
