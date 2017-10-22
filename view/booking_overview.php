<div class="wrapper memberPage">
    <div class="container bookings">

        <?php
        if (!empty($bookings) ) {
            foreach ($bookings as $booking){
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

                 <?php if ($booking['status'] == "unconfirmed") { ?>
                            <div class="alert alert-warning centre-content">
                                <span><strong>Pending</strong></span>
                            </div>
                        <?php if ($_SESSION['userID'] == $booking['walkerUserID']) {?>
                            <div class="row">
                                <div class="col-6">
                                    <button class="blue-btn confirmBooking" type="button" name="button" value="Confirm" data-bookingID="<?php echo $booking['bookingID']; ?>">Confirm</button>
                                </div>
                                <div class="col-6">
                                    <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel</button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="">
                                <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel Booking Request" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel Booking Request</button>
                            </div>
                        <?php } ?>
                 <?php } elseif ($booking['status'] == "confirmed") { ?>
                            <div class="alert alert-success centre-content">
                                <span><strong>Confirmed</strong></span>
                            </div>
                            <div class="">
                                <button class="blue-btn cancelBooking" type="button" name="button" value="Cancel Booking Request" data-bookingID="<?php echo $booking['bookingID']; ?>">Cancel Booking Request</button>
                            </div>
                <?php } elseif ($booking['status'] == "completed") { ?>
                           <div class="alert alert-info centre-content">
                               <span><strong>Completed</strong></span>
                           </div>
               <?php } elseif ($booking['status'] == "cancelled") { ?>
                          <div class="alert alert-danger centre-content">
                              <span><strong>Cancelled</strong></span>
                          </div>
               <?php }?>


                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="noAlerts">
                <p>You have no bookings.</p>
            </div>

  <?php } ?>
<pre>
<?php var_dump ($bookingCheck); ?>
</pre>

    </div>
</div>
