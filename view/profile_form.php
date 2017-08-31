<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="createProfile" method="post" action="?controller=profiles&action=<?php echo $action; ?>">
                    <legend>
                    <?php if ($action == 'create_profile') { ?>
                        Create Your Profile
                    <?php } else { ?>
                        Edit Your Profile
                    <?php } ?>
                    </legend>
                    <?php
                    if (isset($notificationMsg)) { ?>
                        <div class="errors">
                            <?php echo $notificationMsg; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <label>Profile title</label>
                    <input type="text" name="profileTitle" value="<?php if ( isset($profile['profileTitle']) ) {echo $profile['profileTitle'];} ?>">
                    <div class="form-group">
                        <label for="comment">Short description:</label>
                            <textarea rows="5" name="profileDescription"><?php if ( isset($profile['profileDescription']) ) {echo $profile['profileDescription'];} ?></textarea>
                    </div>
                    <img src="view/images/upload-photo.png"  />
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
