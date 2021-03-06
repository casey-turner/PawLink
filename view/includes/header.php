<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $pageTitle; ?></title>
        <link rel="icon" href="view/images/pawlink.ico" type="image/ico">
<!--Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900">
<!--JQuery-->
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!--Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Flatpickr - Date and time input -->
        <script src="https://unpkg.com/flatpickr"></script>
        <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
<!--Croppie - Image upload cropping tool-->
        <link href="view/css/croppie.css" rel="stylesheet" type="text/css">

        <link href="view/css/styles.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <header class="hp-header">
            <div class="container">
                <a href="<?php echo $site_URL; ?>"><img class="logo" src="view/images/logo.png" alt="PawLink"/></a>
                <img class="mobileMenu" src="view/images/mobile-menu.png" alt="mobile menu" />
                <nav class="primary-nav">
                    <ul>
                        <li><a href="<?php echo $site_URL; ?>">Home</a></li>
                        <li><a href="?controller=publicpages&action=faq">FAQ</a></li>
                        <li><a href="?controller=publicpages&action=about">About</a></li>
                        <li><a href="?controller=publicpages&action=gallery">Wall of Dogs</a></li>
                        <li><a href="?controller=publicpages&action=contact">Contact</a></li>
                        <?php
                            if ( isset($_SESSION['userstate'] ) && ($_SESSION['userstate'] == 'member') ) {  ?>
                                <li>
                                    <a href="#" class="menuItemHasChildren"><img src= "<?php if (isset($_SESSION['profileImage'])) {
                                                        echo 'view/uploads/'.$_SESSION['profileImage'];
                                                    } else {
                                                        echo 'view/uploads/defaultProfile.png';
                                                    } ?>" class="headerThumb" alt=""><span class="headerUser"><?php echo $_SESSION['firstName']; ?></span></a>
                                    <ul class="subMenu">
                                        <?php if (isset($_SESSION['profileID'])) {?>
                                            <li><a href="?controller=profiles&action=dashboard">Dashboard</a></li>
                                            <li><a href="?controller=bookings&action=booking_overview">Bookings</a></li>
                                            <li><a href="#">Messages</a></li>
                                            <li><a href="?controller=profiles&action=profile&profileID=<?php echo $_SESSION['profileID']; ?>">Profile</a></li>
                                            <li><a href="?controller=search&action=search&location=">Search</a></li>
                                            <li><a href="?controller=users&action=logout">Log out</a></li>
                                        <?php } else { ?>
                                            <li><a href="?controller=profiles&action=create_profile">Create profile</a></li>
                                            <li><a href="?controller=users&action=logout">Log out</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                        <?php } else { ?>
                                <!-- triggers modal -->
                                <li><a href="?controller=users&action=login" class="orange-btn hp-login-btn" data-toggle="modal" data-target="#loginModal">Login</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </header>
        <?php
            $dashboardMenu = array ('profile', 'dog_register', 'dog_profile', 'search', 'dashboard','booking_overview', 'booking_form', 'edit_profile', 'edit_dog', 'rates');

            if ( in_array($action, $dashboardMenu) ) { ?>
            <div class="dashboard-menu">
                <div class="container">
                    <nav class="dashboard-nav">
                        <ul>
                            <li><a href="?controller=profiles&action=dashboard"<?php if ($action == "dashboard") { echo 'class="current"';} ?>>Dashboard</a></li>
                            <li><a href="?controller=bookings&action=booking_overview" <?php if ($action == "booking_overview") { echo 'class="current"';} ?>>Bookings</a></li>
                            <li><a href="#" <?php if ($action == "messages") { echo 'class="current"';} ?> >Messages</a></li>
                            <li><a href="?controller=profiles&action=profile&profileID=<?php echo $_SESSION['profileID']; ?>"<?php if ($action == "profile") { echo 'class="current"';} ?>>Profile</a></li>
                            <li>
                                <form class="walkerSearchForm" action="?controller=search&action=search" method="get">
                                    <input type="hidden" name="controller" value="search">
                                    <input type="hidden" name="action" value="search">
                                    <input type="text" name="location" value="<?php if ( isset($search_location )) { echo $search_location; } ?>" placeholder="e.g.: Coorparoo, 4151">
                                    <button type="submit" ><img src="view/images/search_w.png" alt="PawLink"/></button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        <?php
        }
         ?>
