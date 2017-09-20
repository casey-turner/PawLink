<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <form class="wide-form" id="rates" method="post"  action="?controller=profiles&action=<?php echo $action; ?>"  >
                    <legend>Register as a Dog Walker</legend>
                    <?php
                    if (isset($notificationMsg)) { ?>
                        <div class="notifications">
                            <?php echo $notificationMsg; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <label class="checkbox-inline"><input id="offerWalking" type="checkbox"  data-toggle="toggle"  data-off="No" data-on="Yes"<?php if ( isset($rates['priceID']) ) {echo 'checked';} ?>>  I offer dog walking services</label>
                    <div class="setRates <?php if ( isset($rates['priceID']) ) {echo 'hasRates';} ?>" >
                        <label>Rate for 30 minute dog walk</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="walk30" value="<?php if ( isset($rates['walk30']) ) {echo $rates['walk30'];} ?>" >
                        </div>
                        <label>Rate for 60 mintue dog walk</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="walk60" value="<?php if ( isset($rates['walk60']) ) {echo $rates['walk60'];} ?>">
                        </div>
                        <label>Rate for each additional dog</label>
                        <div class="input-group">
                            <span class="input-icon"><img src="view/images/dollar.png" class="dollar-icon" alt=""></span>
                            <input type="text" name="extraDog" value="<?php if ( isset($rates['extraDog']) ) {echo $rates['extraDog'];} ?>" >
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
