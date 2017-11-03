<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="profile-header">
                    <div class="profile-image">
                        <img src= "<?php if (isset($profile['profileImage'])) {
                                            echo 'view/uploads/'.$profile['profileImage'];
                                        } else {
                                            echo 'view/uploads/defaultProfile';
                                        } ?> " />
                    </div>
                    <div class="profile-title">
                        <h3><?php echo $profile['profileTitle']; ?></h3>
                        <p><?php echo $profile['firstName'].' '.substr($profile['lastName'], 0, 1); ?></p>
                        <div class="profile-location">
                            <img src="view/images/location-icon.png" />
                            <span><?php echo $profile['suburb']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="walker-profile-about">
                    <h3>About <?php echo $profile['firstName']; ?></h3>
                    <p><?php echo $profile["profileDescription"]; ?> </p>
                    <?php
                    if ($_SESSION['profileID'] != $profile['profileID'] && $rates['status'] == 'active' && !empty($dogs)) { ?>
                        <h3 class="walker-profile-dog">
                            <?php
                            if (count($dogs) > 1 ) {
                                echo $profile['firstName']."'s dogs";
                            } else {
                                echo $profile['firstName']."'s dog";
                            }?>
                        </h3>
                        <?php
                        foreach ($dogs as $dog) { ?>
                            <div class="row walker-profile-dog-details">
                                <div class="col-5">
                                    <a href="?controller=profiles&action=dog_profile&dogID=<?php echo $dog['dogID']; ?>">
                                        <img src= "<?php if ( isset($dog['dogProfileImage']) ) {
                                            echo 'view/uploads/'.$dog['dogProfileImage'];
                                        } else {
                                            echo 'view/uploads/defaultDog.png';
                                        }?>">
                                    </a>
                                </div>
                                <div class="col-7">
                                    <h4><?php echo $dog['dogName']; ?></h4>
                                    <a class="edit-profile-btn" href="?controller=profiles&action=dog_profile&dogID=<?php echo $dog['dogID']; ?>">View profile</a>
                                </div>
                            </div>
                        <?php
                        } ?>
                        <div class="clear"></div>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                if ( ($_SESSION['profileID'] == $profile['profileID'] && !empty($dogs)) || ($_SESSION['profileID'] != $profile['profileID'] && $rates['status'] != 'active') ) { ?>
                    <div class="ownersDogs">
                        <h3>
                            <?php
                             if (count($dogs) > 1) {
                                 echo $profile['firstName']."'s dogs";
                             } else {
                                 echo $profile['firstName']."'s dog";
                             } ?>
                        </h3>
                    <?php
                    foreach ($dogs as $dog) { ?>
                        <div class="row">
                            <div class="col-5">
                                <a href="?controller=profiles&action=dog_profile&dogID=<?php echo $dog['dogID']; ?>">
                                    <img src= "<?php if ( isset($dog['dogProfileImage']) ) {
                                        echo 'view/uploads/'.$dog['dogProfileImage'];
                                    } else {
                                        echo 'view/uploads/defaultDog.png';
                                    }?>">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="?controller=profiles&action=dog_profile&dogID=<?php echo $dog['dogID']; ?>">
                                    <h4><?php echo $dog['dogName']; ?></h4>
                                </a>
                                <a class="edit-profile-btn" href="?controller=profiles&action=dog_profile&dogID=<?php echo $dog['dogID']; ?>">View profile</a>
                            </div>
                        </div>
                    <?php
                    } ?>
                    </div>
                <?php
                } ?>
                <?php
                if ( $_SESSION['profileID'] != $profile['profileID'] && $rates['status'] == 'active') {?>
                    <div class="rates">
                        <h3>Services & Rates</h3>
                        <a href="#">
                            <div class="ratesRow">
                                <img src="view/images/chat-icon.png"/>
                                <h4>Meet & Greet</h4>
                                <p class="meetGreet">Get to know each other first</p>
                                <span class="ratesMessage">Message</span>
                                <div class="clear"></div>
                            </div>
                        </a>
                        <div class="rates-wrapper">
                            <div class="ratesRow">
                                <img src="view/images/dog-icon.png"/>
                                <h4>30 minute dog walk</h4>
                                <p><?php echo $profile['firstName']; ?> will walk your dog</p>
                                <span>(Additional dogs $<?php echo $rates['extraDog']; ?> each)</span>
                                <div class="ratesPrice">
                                    <span class="ratesPriceBold">$<?php echo $rates['walk30']; ?></span><span>/30 minutes</span>
                                    <span class="ratesMakeBooking">Make Booking</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="booking-dropdown">
                                <form id="walk30min" method="post">
                                    <div class="error"></div>
                                    <div class="input-group">
                                        <span class="input-icon"><img src="view/images/date.png"></span>
                                        <input type="text" class="form-control" placeholder="Date & Time" id="walk30minDateTime" name="dateTime">
                                    </div>
                                    <script>

                                    $("#walk30minDateTime").flatpickr({enableTime: true});

                                    </script>
                                    <div class="input-group">
                                        <span class="input-icon"><img src="view/images/dog.png"></span>
                                        <input id="30WalkExtra" type="number" class="form-control" placeholder="Number of Dogs" min="1" max="4" value="1" name="noDogs">
                                    </div>
                                    <input type="hidden" name="duration" value="30">
                                    <input type="hidden" name="walkerUserID" value="<?php echo $profile['userID']; ?>">
                                    <div class="row">
                                        <div class="col-6 total">
                                            <h4>
                                                Total $<span id="30Walk" data-rate="<?php echo $rates['walk30']; ?>" data-extra="<?php echo $rates['extraDog']; ?>"><?php echo $rates['walk30']; ?></span>
                                            </h4>
                                        </div>
                                        <div class="col-6 booking-submit">
                                            <input type="submit" name="" value="Submit" class="orange-btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="rates-wrapper">
                            <div class="ratesRow">
                                <img src="view/images/dog-icon.png"/>
                                <h4>60 minute dog walk</h4>
                                <p><?php echo $profile['firstName']; ?> will walk your dog</p>
                                <span>(Additional dogs $<?php echo $rates['extraDog']; ?> each)</span>
                                <div class="ratesPrice">
                                    <span class="ratesPriceBold">$<?php echo $rates['walk60']; ?></span><span>/60 minutes</span>
                                    <span class="ratesMakeBooking">Make Booking</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="booking-dropdown">
                                <form id="walk60min" method="post">
                                    <div class="error"></div>
                                    <div class="input-group">
                                        <span class="input-icon"><img src="view/images/date.png"></span>
                                        <input type="text" class="form-control flatpickr-input active" placeholder="Date & Time" id="walk60minDateTime" name="dateTime">
                                    </div>
                                    <script>

                                    $("#walk60minDateTime").flatpickr({enableTime: true});

                                    </script>
                                    <div class="input-group">
                                        <span class="input-icon"><img src="view/images/dog.png"></span>
                                        <input id="60WalkExtra" type="number" class="form-control" placeholder="Number of Dogs" min="1" max="4" value="1" name="noDogs">
                                    </div>
                                    <input type="hidden" name="duration" value="60">
                                    <input type="hidden" name="walkerUserID" value="<?php echo $profile['userID']; ?>">
                                    <div class="row">
                                        <div class="col-6 total">
                                            <h4>
                                                Total $<span id="60Walk" data-rate="<?php echo $rates['walk60']; ?>" data-extra="<?php echo $rates['extraDog']; ?>"><?php echo $rates['walk60']; ?></span>
                                            </h4>
                                        </div>
                                        <div class="col-6 booking-submit">
                                            <input type="submit" name="" value="Submit" class="orange-btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!--close rates feature box -->
                    <?php
                } ?>
            </div> <!--close col-md-4 -->
        </div>
    </div>
</div>
<!-- Modal -->
<div id="bookingPop" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Woof!</h3>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
            </div>
            <div class="modal-body">
                <p>Your booking request has been sent, <?php echo $profile['firstName']; ?> will review your request and get back to you shortly.</p>
                <hr />
                <div class="bookingSummary">
                    <h3 class="summaryTitle">Your Booking Summary</h3>
                    <div class="summaryDetails"></div>
                    <div class="alert alert-warning">
                        <span><strong>Status:</strong> Pending</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
