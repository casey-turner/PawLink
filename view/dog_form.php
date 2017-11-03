<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="dogRegister" enctype="multipart/form-data" method="post" action="?controller=profiles&action=<?php echo $action; ?><?php if ($action == 'edit_dog' ) {echo '&dogID='.$dogID;} ?>"  data-parsley-validate data-persist="garlic">
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
                    if (isset($errorMsg)) { ?>
                        <div class="errors">
                            <?php echo $errorMsg; ?>
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
                    <input type="file" class="item-img <?php if ( !empty($dogs['dogProfileImage']) ){ echo 'hideElement'; } ?>" id="profileImageSelect" accept="image/*"/>
                    <input type="hidden" class="deleteProfileImage" name="deleteDogProfileImage" value="">
                    <input type="hidden" class="profileImageOutput" name="dogProfileImage" value="">
                    <div class=" image-output">
                        <img src="<?php if ( !empty($dogs['dogProfileImage']) ){ echo 'view/uploads/'.$dogs['dogProfileImage']; } ?>" alt="" id="item-img-output" />
                    </div>
                    <button type="button" name="button" class="deleteImage <?php if ( !empty($dogs['dogProfileImage']) ){ echo 'showElement'; } ?>"> <span><img src="view/images/remove.png" alt=""></span> Remove</button>
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
                    <?php if ($action == 'edit_dog') { ?>
                        <div class="row btn-wrapper">
                            <div class="col-6">
                                <a class="orange-btn" href="?controller=profiles&action=delete_dog&dogid=<?php echo $dogs['dogID']; ?>">Delete</a>
                            </div>
                            <div class="col-6 align-right">
                                <input class="orange-btn" type="submit" value="Save">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="centre-content">
                            <input class="orange-btn" type="submit" value="Save">
                        </div>
                    <?php }?>
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
