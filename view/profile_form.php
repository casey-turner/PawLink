<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="createProfile" method="post" enctype="multipart/form-data" action="?controller=profiles&action=<?php echo $action; ?>" data-parsley-validate >
                    <legend>
                    <?php if ($action == 'create_profile') { ?>
                        Create Your Profile
                    <?php } else { ?>
                        Edit Your Profile
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
                    <label>Profile title</label>
                    <input type="text" name="profileTitle" value="<?php if ( isset($profile['profileTitle']) ) {echo $profile['profileTitle'];} ?>" required>
                    <div class="form-group">
                        <label for="comment">Short description:</label>
                        <textarea rows="5" name="profileDescription" required><?php if ( isset($profile['profileDescription']) ) {echo $profile['profileDescription'];} ?> </textarea>
                    </div>
                    <label>Upload a profile image</label>
                    <input type="file" class="item-img <?php if ( !empty($profile['profileImage']) ){ echo 'hideElement'; } ?>" id="profileImageSelect" accept="image/*"/>
                    <input type="hidden" class="deleteProfileImage" name="deleteProfileImage" value="">
                    <input type="hidden" class="profileImageOutput" name="profileImage" value="">
                    <div class=" image-output">
                        <img src="<?php if ( !empty($profile['profileImage']) ){ echo 'view/uploads/'.$profile['profileImage']; } ?>" alt="" id="item-img-output" />
                    </div>
                    <button type="button" name="button" class="deleteImage <?php if ( !empty($profile['profileImage']) ){ echo 'showElement'; } ?>"> <span><img src="view/images/remove.png" alt=""></span> Remove</button>
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
