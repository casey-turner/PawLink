<div class="wrapper publicPage">
    <div class="container">
        <div class="grid">
            <?php
            $count = 0;
            foreach ($dogs as $dog) { ?>
                <div class="grid-item">
                    <img src="<?php echo 'view/uploads/'.$dog['dogProfileImage']?>" alt="">
                    <?php
                    if ($count == 1) { ?>
                        <div class="dog-masonary">
                            <?php echo $dog['dogName']; ?>
                        </div>
                    <?php
                    }
                    if ($count == 3) {  ?>
                        <div class="dog-masonary">
                            <?php echo $dog['breed']; ?>
                        </div>
                    <?php
                    } ?>
                </div>
                <?php
                $count++;
                if ($count == 4) {
                    $count = 0;
                }
            } ?>
        </div>
    </div>
</div>
