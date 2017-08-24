<?php
// USe the select data function to get dog profile data from the database and insert into page
$profiles = selectData('profiles', array('where'=> array('profileID' => $profileID )));
$profiles = $profiles[0];
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
                        <h2>Friendly dog walking service</h2>
                        <p>Michelle B.</p>
                        <div class="profile-location">
                            <img src="view/images/location-icon.png" />
                            <span>Moorooka</span>
                        </div>
                    </div>
                </div>
                <div class="walker-profile-about">
                    <h2>About Michelle</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
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
                            <p>Michelle will walk your dog</p>
                            <span>(Additional dogs $5 each)</span>
                            <div class="ratesPrice">
                                <span class="ratesPriceBold">$15</span><span>/30 minutes</span>
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
                                    <input type="text" class="form-control" placeholder="Date & Time" id="datepicker">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="rates-wrapper">
                        <a href="?controller=bookings&action=booking_form">
                            <div class="ratesRow">
                                <img src="view/images/dog-icon.png"/>
                                <h4>60 minute dog walk</h4>
                                <p>Michelle will walk your dog</p>
                                <span>(Additional dogs $5 each)</span>
                                <div class="ratesPrice">
                                    <span class="ratesPriceBold">$25</span><span>/60 minutes</span>
                                    <span class="ratesMakeBooking">Make Booking</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
