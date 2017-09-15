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
                <form class="wide-form" id="dogRegister" enctype="multipart/form-data" method="post" action="?controller=profiles&action=<?php echo $action; ?><?php if ($action == 'edit_dog' ) {echo '&dogID='.$dogID;} ?>"  data-parsley-validate>
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
                    <label>Upload a profile image</label>
                    <input type="file" name="" class="item-img" id="profileImage" accept="image/*"/>
                    <div class=" image-output">
                        <img src="" alt="" id="item-img-output" />
                    </div>
                    <button type="button" name="button" id="deleteImage"> <span><img src="view/images/remove.png" alt=""></span> Remove</button>
                    <!-- Modal -->
                    <div id="cropImagePop" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Crop Image</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <div class="modal-body">
                                    <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                                        <div style="display: block; width: 300px; height: 300px;">
                                            <div id="upload-demo"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default clearImageBtn" data-dismiss="modal">Close</button>
                                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div class="centre-content">
                        <input class="orange-btn" type="submit" value="Save">
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
