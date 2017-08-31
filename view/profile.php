<?php
// Use the select data function to get profile and user data from the database and insert into page
$profile = selectData('profiles', array(
            'left join' => array('table2' => 'users', 'column' => 'userID'),
            'where'=> array('profileID' => $profileID ),
            'return type' => 'single'
            )
        );
$rates = selectData('rates', array(
            'where'=> array('profileID' => $profileID ),
            'return type' => 'single'
            )
        );

 ?>


<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row profile-header">
                    <div class="col-sm-2">
                        <img src="view/images/profile_img.jpg" />
                    </div>
                    <div class="col-sm-10">
                        <h2><?php echo $profile['profileTitle']; ?></h2>
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
                                <span class="ratesPriceBold">$<?php echo $rates['30walk']; ?></span><span>/30 minutes</span>
                                <span class="ratesMakeBooking">Make Booking</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="booking-dropdown">
                            <form id="30minForm">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="view/images/date.png"></span>
                                    <input type="text" class="form-control" placeholder="Date & Time" id="datepicker">
                                </div>
                                <script>

                                $("#datepicker").flatpickr({enableTime: true});

                                </script>
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="view/images/dog.png"></span>
                                    <input id="30WalkExtra" type="number" class="form-control" placeholder="Number of Dogs" min="1" max="4">
                                </div>
                                <div class="row">
                                    <div class="col-6 total">
                                        <h4>
                                            Total $<span id="30Walk" data-rate="<?php echo $rates['30walk']; ?>" data-extra="<?php echo $rates['extraDog']; ?>"><?php echo $rates['30walk']; ?></span>
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
                                <span class="ratesPriceBold">$<?php echo $rates['60walk']; ?></span><span>/60 minutes</span>
                                <span class="ratesMakeBooking">Make Booking</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="booking-dropdown">
                            <form id="60minForm">
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="view/images/date.png"></span>
                                    <input type="text" class="form-control" placeholder="Date & Time" id="datepicker">
                                </div>
                                <script>

                                $("#datepicker").flatpickr({enableTime: true});

                                </script>
                                <div class="input-group">
                                    <span class="input-group-addon"><img src="view/images/dog.png"></span>
                                    <input id="60WalkExtra" type="number" class="form-control" placeholder="Number of Dogs" min="1" max="4">
                                </div>
                                <div class="row">
                                    <div class="col-6 total">
                                        <h4>
                                            Total $<span id="60Walk" data-rate="<?php echo $rates['60walk']; ?>" data-extra="<?php echo $rates['extraDog']; ?>"><?php echo $rates['60walk']; ?></span>
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
