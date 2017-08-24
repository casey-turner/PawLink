<?php
// USe the select data function to get dog profile and user data from the database and insert into page
$dogs = selectData('dogs', array(
                            'left join' => array('table2' => 'users', 'column' => 'userID'),
                            'where'=> array('dogID' => $dogID ),
                            'return type' => 'single'
                            )
        );
 ?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2><?php echo $dogs['name']; ?></h2>
                <div class="dogInfoImage">
                    <img src="view/images/dog-profile.jpg" />
                </div>
                <div class="dogInfoOwner">
                    <img src="view/images/profile_img.jpg">
                    <span>My Owner is: <?php echo $dogs['firstName'].' '.substr($dogs['lastName'], 0, 1) ?>.</span>
                </div>
            </div>
            <div class="col-md-8">
                    <div class="dogInfo">
                        <div class="dogInfoRow"><h3>About <?php echo $dogs['name']; ?> the Dog</h3></div>
                        <div class="dogInfoRow">
                            <span class="dogInfoBold">Gender:</span>
                            <span><?php echo $dogs['gender']; ?></span>
                        </div>
                        <div class="dogInfoRow">
                            <span class="dogInfoBold">Breed:</span>
                            <span><?php echo $dogs['breed']; ?></span>
                        </div>
                        <div class="dogInfoRow">
                            <span class="dogInfoBold">Birth year:</span>
                            <span><?php echo $dogs['birthYear']; ?></span>
                        </div>
                        <div class="dogInfoRow">
                            <span class="dogInfoBold">Description:</span>
                            <span><?php echo $dogs['description']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
