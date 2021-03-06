<div class="wrapper memberPage">
    <div class="container bookings">

        <?php
        if (!empty($bookings) ) { ?>

            <!-- Output All Unconfirmed Bookings  -->
            <div class="booking-group">
                <h3>Pending Bookings</h3>
                <?php
                $unconfirmed = 0;
                foreach ($bookings as $booking){
                    if ($booking['status'] == "unconfirmed") {

                        $unconfirmed++;

                        if ($_SESSION['userID'] == $booking['ownerUserID']){
                            $prefix = 'walker';
                            $title = 'Dog walker';
                        } else {
                            $prefix = 'owner';
                            $title = 'Dog parent';
                        }?>

                    <div class="row booking-row">
                        <div class="col-md-3">
                            <div class="centre-content">
                                <img src="<?php echo 'view/uploads/'.$booking[$prefix.'Image'] ?>" alt="">
                                <p><?php echo $title ?></p>
                                <h4><?php echo $booking[$prefix.'FirstName']." ".substr($booking[$prefix.'LastName'], 0,1); ?></h4>
                            </div>
                        </div>
                        <div class="col-md-5 booking-row-details">
                            <h3><?php echo $booking['duration']; ?> minute dog walk</h3>
                            <p><strong>Date: </strong> <?php echo date('l j F Y',strtotime($booking['dateTime'])); ?></p>
                            <p><strong>Time: </strong><?php echo date('g:ia',strtotime($booking['dateTime'])); ?></p>
                            <p><strong>Number of Dogs: </strong> <?php echo $booking['noDogs']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-warning centre-content">
                                <span><strong>Unconfirmed</strong></span>
                            </div>
                            <?php
                            if ($_SESSION['userID'] == $booking['walkerUserID']) { ?>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="blue-btn confirmBooking" type="button" name="button" value="Confirm" data-bookingID="<?php echo $booking['bookingID']; ?>">Confirm</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel</button>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <div class="">
                                    <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel Booking Request" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel Booking Request</button>
                                </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <?php
                    }
                } ?>
                <?php
                if ($unconfirmed == 0) {?>
                <div class="noAlerts">
                     <p>You have no pending bookings.</p>
                </div>
                <?php
                }
                ?>
            </div>


            <!-- Output All Confirmed Bookings  -->
            <div class="booking-group">
                <h3>Confirmed Bookings</h3>
                <?php
                $confirmed = 0;
                foreach ($bookings as $booking){
                    if ($booking['status'] == "confirmed") {

                        $confirmed++;

                        if ($_SESSION['userID'] == $booking['ownerUserID']){
                            $prefix = 'walker';
                            $title = 'Dog walker';
                        } else {
                            $prefix = 'owner';
                            $title = 'Dog parent';
                        }?>

                    <div class="row booking-row">
                        <div class="col-md-3">
                            <div class="centre-content">
                                <img src="<?php echo 'view/uploads/'.$booking[$prefix.'Image'] ?>" alt="">
                                <p><?php echo $title ?></p>
                                <h4><?php echo $booking[$prefix.'FirstName']." ".substr($booking[$prefix.'LastName'], 0,1); ?></h4>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3><?php echo $booking['duration']; ?> minute dog walk</h3>
                            <p><strong>Date: </strong> <?php echo date('l j F Y',strtotime($booking['dateTime'])); ?></p>
                            <p><strong>Time: </strong><?php echo date('g:ia',strtotime($booking['dateTime'])); ?></p>
                            <p><strong>Number of Dogs: </strong> <?php echo $booking['noDogs']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-success centre-content">
                                <span><strong>Confirmed</strong></span>
                            </div>
                            <?php
                             if ($_SESSION['userID'] == $booking['ownerUserID']) {?>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel Booking" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel Booking</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="blue-btn completeBooking" type="button" name="button" value="Complete Booking" data-bookingID="<?php echo $booking['bookingID']; ?>">Complete Booking</button>
                                    </div>
                                </div>
                            <?php
                            } else {?>
                                <div class="">
                                    <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel Booking" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel Booking</button>
                                </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                if ($confirmed == 0) {?>
                <div class="noAlerts">
                     <p>You have no confirmed bookings.</p>
                </div>
                <?php
                }
                ?>
            </div>

            <!-- Output All Completed & Cancelled Bookings  -->
            <div class="booking-group">
                <h3>Booking History</h3>
                <?php
                $history = 0;
                foreach ($bookings as $booking){
                    if ($booking['status'] == "completed" || $booking['status'] == "cancelled") {

                        $history++;

                        if ($_SESSION['userID'] == $booking['ownerUserID']){
                            $prefix = 'walker';
                            $title = 'Dog walker';
                        } else {
                            $prefix = 'owner';
                            $title = 'Dog parent';
                        }?>

                    <div class="row booking-row">
                        <div class="col-md-3">
                            <div class="centre-content">
                                <img src="<?php echo 'view/uploads/'.$booking[$prefix.'Image'] ?>" alt="">
                                <p><?php echo $title ?></p>
                                <h4><?php echo $booking[$prefix.'FirstName']." ".substr($booking[$prefix.'LastName'], 0,1); ?></h4>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3><?php echo $booking['duration']; ?> minute dog walk</h3>
                            <p><strong>Date: </strong> <?php echo date('l j F Y',strtotime($booking['dateTime'])); ?></p>
                            <p><strong>Time: </strong><?php echo date('g:ia',strtotime($booking['dateTime'])); ?></p>
                            <p><strong>Number of Dogs: </strong> <?php echo $booking['noDogs']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if ($booking['status'] == "completed") { ?>
                                <div class="alert alert-info centre-content">
                                    <span><strong>Completed</strong></span>
                                </div>
                            <?php
                            } elseif ($booking['status'] == "cancelled") { ?>
                                <div class="alert alert-danger centre-content">
                                    <span><strong>Cancelled</strong></span>
                                </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                if ($history == 0) {?>
                    <div class="noAlerts">
                         <p>You have no confirmed bookings.</p>
                    </div>
                <?php
                }
            } ?>
        </div>
    </div>
</div>
<!-- Confirm Booking Modal -->
<div id="bookingConfirmPop" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Woof!</h3>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to confirm this booking?</p>
                <div class="row booking-status-modal-row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <button class="blue-btn bookingConfirmYes" type="button" name="button">Yes</button>
                    </div>
                    <div class="col-4">
                        <button class="blue-btn" type="button" name="button" data-dismiss="modal">No</button>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cancel Booking Modal -->
<div id="bookingCancelPop" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Woof!</h3>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this booking?</p>
                <div class="row booking-status-modal-row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <button class="blue-btn bookingCancelYes" type="button" name="button">Yes</button>
                    </div>
                    <div class="col-4">
                        <button class="blue-btn" type="button" name="button" data-dismiss="modal">No</button>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Complete Booking Modal -->
<div id="bookingCompletePop" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Woof!</h3>
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
            </div>
            <div class="modal-body">
                <p>Are you sure this booking has been completed?</p>
                <div class="row booking-status-modal-row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <button class="blue-btn bookingCompleteYes" type="button" name="button">Yes</button>
                    </div>
                    <div class="col-4">
                        <button class="blue-btn" type="button" name="button" data-dismiss="modal">No</button>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
