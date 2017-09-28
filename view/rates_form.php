<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="rates" method="post"  action="?controller=profiles&action=<?php echo $action; ?>" data-parsley-validate >
                    <legend>Register as a Dog Walker</legend>
                        <div class="notification <?php if ( isset($_SESSION['notificationMsg']) ) { echo 'notificationShow'; } ?>">
                            <?php if ( isset($_SESSION['notificationMsg']) ) { echo $_SESSION['notificationMsg']; }
                                        unset($_SESSION['notificationMsg']);?>
                        </div>
                        <div class="error <?php if ( isset($_SESSION['errorMsg']) ) { echo 'errorShow'; } ?>">
                            <?php if ( isset($_SESSION['errorMsg']) ) { echo $_SESSION['errorMsg']; }
                                        unset($_SESSION['errorMsg']);?>
                        </div>
                    <label class="checkbox-inline">
                        <input id="offerWalking" name="status" value="active"  type="checkbox" data-toggle="toggle" data-width="80" data-height="40" data-off="No" data-on="Yes" <?php if ( isset($rates['status']) && $rates['status'] == 'active' ) { echo ' checked'; } ?> />  I offer dog walking services</label>
                    <div class="setRates <?php if ( isset($rates['status']) && $rates['status'] == 'active' ) {echo 'hasRates';} ?>" >
                        <label>Rate for 30 minute dog walk</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="walk30" value="<?php if ( isset($rates['walk30']) ) {echo $rates['walk30'];} ?>" required >
                        </div>
                        <label>Rate for 60 mintue dog walk</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="walk60" value="<?php if ( isset($rates['walk60']) ) {echo $rates['walk60'];} ?>" required>
                        </div>
                        <label>Rate for each additional dog</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="extraDog" value="<?php if ( isset($rates['extraDog']) ) {echo $rates['extraDog'];} ?>" required >
                        </div>
                        <div class="centre-content">
                            <input class="orange-btn" type="submit" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
