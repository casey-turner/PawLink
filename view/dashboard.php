<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-box profile-box">
                    <img src= "<?php if (isset($_SESSION['profileImage'])) {
                                        echo 'view/uploads/'.$_SESSION['profileImage'];
                                    } else {
                                        echo 'view/uploads/defaultProfile';
                                    } ?> ">
                    <h3><?php echo $_SESSION['displayName'] ?></h3>
                    <a href="?controller=profiles&action=edit_profile">Edit profile</a>
                </div>
                <div class="dashboard-box my-dogs">
                    <h3>My Dogs</h3>
                    <?php
                    if (!empty($dogs)) {
                        foreach ($dogs as $dog) { ?>
                             <div class="dog-row">
                                 <img src="view/images/mypets-thumb1.jpg" >
                                 <h4><?php echo $dog['dogName']; ?></h4>
                                 <a href="?controller=profiles&action=edit_dog&dogID=<?php echo $dog['dogID']; ?>">Edit profile</a>
                             </div>
                    <?php
                        }
                    }
                    ?>
                    <div class="add-dog">
                        <a href="?controller=profiles&action=dog_register" class="hp-register-btn">Add Dog Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dashboard-box messages-box">
                    <h3>Recent Messages</h3>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Date</h4>
                            <p>24/07/17</p>
                        </div>
                        <div class="col-sm-3">
                            <h4>From</h4>
                            <p>Thao L.</p>
                        </div>
                        <div class="col-sm-6">
                            <h4>Subject</h4>
                            <p>One half hour walk per day Mon-Fri</p>
                        </div>
                        <div class="col-sm-1">
                            <img src="view/images/read.png">
                        </div>
                    </div>
                </div>
                <div class="dashboard-box">
                    <h3>Upcoming Bookings</h3>
                    <p>No upcoming bookings</p>
                </div>
            </div>
        </div>
    </div>
</div>
