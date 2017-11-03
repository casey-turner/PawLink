<div class="wrapper memberPage">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="profile-header">
                    <div class="profile-image">
                        <img src= "<?php if ( isset($dog['dogProfileImage']) ) {
                            echo 'view/uploads/'.$dog['dogProfileImage'];
                        } else {
                            echo 'view/uploads/defaultDog.png';
                        }?>">
                    </div>
                    <div class="profile-title">
                        <h3> <?php echo $dog['dogName']; ?></h3>
                    </div>
                    <div class="clear">
                    </div>
                </div>
                <div class="dogInfo">
                    <h3>About <?php echo $dog['dogName']; ?></h3>
                        <p><span class="dogInfoBold">Gender: </span><?php echo $dog['gender']; ?></p>
                        <p><span class="dogInfoBold">Breed: </span><?php echo $dog['breed']; ?></p>
                        <p><span class="dogInfoBold">Birth year: </span><?php echo $dog['birthYear']; ?></p>
                        <span class="dogInfoBold">Description:</span>
                        <span><?php echo $dog['dogDescription']; ?></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-right-col">
                    <h3><?php echo $dog['dogName']; ?>'s owner</h3>
                    <div class="profile-right-col-row">
                        <div class="profile-right-col-image">
                            <img src= "<?php
                                if (isset($dog['profileImage'])) {
                                    echo 'view/uploads/'.$dog['profileImage'];
                                } else {
                                    echo 'view/uploads/defaultProfile';
                                } ?> "
                            />
                        </div>
                        <div class="dog-profile-right-col-details">
                            <h4> <?php echo $dog['firstName'].' '.$dog['lastName'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
