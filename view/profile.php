<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row profile-header">
                    <div class="col-sm-2">
                        <img src= "<?php if (isset($profile['profileImage'])) {
                                            echo 'view/uploads/'.$profile['profileImage'];
                                        } else {
                                            echo 'view/uploads/defaultProfile';
                                        } ?> " />
                    </div>
                    <div class="col-sm-10">
                        <h3><?php echo $profile['profileTitle']; ?></h3>
                        <p><?php echo $profile['firstName'].' '.substr($profile['lastName'], 0, 1); ?></p>
                        <div class="profile-location">
                            <img src="view/images/location-icon.png" />
                            <span><?php echo $profile['suburb']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="walker-profile-about">
                    <h2>About <?php echo $profile['firstName']; ?></h2>
                    <p><?php echo $profile["profileDescription"]; ?> </p>
                </div>
            </div>
            <div class="col-md-4">
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
                </div>
            </div>
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
