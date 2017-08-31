<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="dogRegister" method="post" action="?controller=profiles&action=<?php echo $action; ?>&dogID=<?php echo $dogID; ?>">
                    <legend>
                    <?php if ($action == 'edit_dog') { ?>
                        Edit Dog Profile
                    <?php } else {?>
                        Create Dog Profile
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
                    <label>Dog name</label>
                    <input type="text" name="dogName" value="<?php if ( isset($dogs['dogName']) ) { echo $dogs['dogName']; } ?>">
                    <label>Breed</label>
                    <input type="text" name="breed" value="<?php if ( isset($dogs['breed']) ) { echo $dogs['breed']; } ?>">
                    <label>Birth year</label>
                    <input type="text" name="birthYear" value="<?php if ( isset($dogs['birthYear']) ) { echo $dogs['birthYear']; } ?>">
                    <label>Gender</label>
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Female"<?php if ( isset($dogs['gender']) && $dogs['gender'] == 'Female') { ?>checked="checked" <?php } ?>>Female</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="gender" value="Male"<?php if ( isset($dogs['gender']) && $dogs['gender'] == 'Male') { ?>checked="checked" <?php } ?>>Male</label>
                    </div>
                    <div class="form-group">
                        <label for="comment">Short description:</label>
                        <textarea rows="5" name="dogDescription"><?php if ( isset($dogs['dogDescription']) ) { echo $dogs['dogDescription']; } ?></textarea>
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
