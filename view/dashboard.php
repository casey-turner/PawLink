<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-box profile-box">
                    <div class="row">
                        <div class="col-5">
                            <a href="?controller=profiles&action=profile&profileID=<?php echo $_SESSION['profileID']; ?>">
                                <img src= "<?php if (isset($_SESSION['profileImage'])) {
                                    echo 'view/uploads/'.$_SESSION['profileImage'];
                                } else {
                                    echo 'view/uploads/defaultProfile';
                                } ?> ">
                            </a>
                        </div>
                        <div class="col-7">
                            <a href="?controller=profiles&action=profile&profileID=<?php echo $_SESSION['profileID']; ?>">
                                <h3><?php echo $_SESSION['displayName'] ?></h3>
                            </a>
                            <a class="edit-profile-btn" href="?controller=profiles&action=edit_profile">Edit profile</a>
                        </div>
                    </div>
                    <a href="?controller=profiles&action=rates" class="blue-btn">
                        <?php if ( isset($rates['status']) && $rates['status'] == 'active' ) { ?>
                            Change Dog Walking Rates
                        <?php } else if ( (isset($rates['status']) && $rates['status'] == 'inactive') || !isset($rates['status'])) {?>
                            Become a Dog Walker
                        <?php } ?>
                    </a>
                </div>
                <div class="dashboard-box my-dogs">
                    <h3>My Dogs</h3>
                    <?php
                    if (!empty($dogs)) {
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
                            <a class="edit-profile-btn" href="?controller=profiles&action=edit_dog&dogID=<?php echo $dog['dogID']; ?>">Edit profile</a>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                    <div class="centre-content">
                        <a href="?controller=profiles&action=dog_register" class="blue-btn dashboard-add-dog-btn">Add Dog</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dashboard-box messages-box">
                    <h3>Recent Messages</h3>
                    <p>No recent messages.</p>
                </div>
                <div class="dashboard-box">
                    <h3>Upcoming Bookings</h3>
                    <?php
                    if(!empty($bookings)) {?>
                        <?php
                        foreach ($bookings as $booking) {
                            if ($_SESSION['userID'] == $booking['ownerUserID']){
                                $prefix = 'walker';
                                $title = 'Dog walker';
                            } else {
                                $prefix = 'owner';
                                $title = 'Dog parent';
                            } ?>
                            <div class="dashboard-booking-row">
                                <div class="row">
                                    <div class="col-sm-2 dashboard-booking-row-col">
                                        <h4>Date</h4>
                                        <p><?php echo date('d/m/y ',strtotime($booking['dateTime'])); ?></p>
                                    </div>
                                    <div class="col-sm-3 dashboard-booking-row-col">
                                        <h4><?php echo $title; ?></h4>
                                        <p><?php echo $booking[$prefix.'FirstName']." ".substr($booking[$prefix.'LastName'], 0,1); ?></p>
                                    </div>
                                    <div class="col-sm-4 dashboard-booking-row-col">
                                        <h4>Service</h4>
                                        <p><?php echo $booking['duration']; ?> minute dog walk</p>
                                    </div>
                                    <div class="col-sm-3 dashboard-booking-row-col">
                                        <h4>Status</h4>
                                        <?php
                                        if ($booking['status'] == 'unconfirmed') {?>
                                                <p><strong class="dashboard-unconfirmed"><?php echo $booking['status']; ?></strong></p>
                                        <?php
                                        } else { ?>
                                                <p><strong class="dashboard-confirmed"><?php echo $booking['status']; ?></strong></p>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        echo "<p>No upcoming bookings.</p>";
                    }
                     ?>
                </div>
            </div>
        </div>
    </div>
</div>
