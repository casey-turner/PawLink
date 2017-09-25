        <footer>
            <div class="container">
                <p>© 2017 PawLink.com.au. All Rights Reserved.<p>
            </div>
    <!--Ensures images are loaded before initiating Masonry -->
            <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <!--Masonry JS - Grid Layout on Wall of Dogs page -->
            <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <!--Scroll Animation -->
            <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <!--Parsley- Form validation -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.2/parsley.min.js"></script>
    <!--Garlic - Form persistence -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/garlic.js/1.3.0/garlic.min.js"></script>
    <!--Croppie - Image upload cropping tool -->
            <script src="view/js/croppie.min.js"></script>
            
            <script src="view/js/main.js"></script>
        </footer>
        <!-- Modal available only when user is not logged in -->
        <?php if ( !isset($_SESSION['userstate']) ) {?>
            <div class="modal fade" id="loginModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">>
                <div class="modal-dialog" role="document">
                    <div class="centre-flex">
                        <form class="narrow-form entry-form" id="ajaxLoginForm" action="?controller=users&action=login" data-persist="garlic" method="post" data-parsley-validate >
                            <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <legend>Login to PawLink</legend>
                            <?php
                            if (isset($errorMsg)) { ?>
                                <div class="errors">
                                    <?php echo $errorMsg; ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="errors" id="ajaxLoginError"></div>
                            <div class="input-group">
                                <span class="input-icon"><img src="view/images/email.png" alt=""></span>
                                <input placeholder="Email" type="email" name="useremail" required>
                            </div>
                            <div class="input-group">
                                <span class="input-icon"><img src="view/images/password.png" alt=""></span>
                                <input placeholder="Password" type="password" name="password" required data-storage="false">
                            </div>

                            <div class="submit-cont">
                                <input class="orange-btn" type="submit" name="submit">
                                <p>Not yet a member? <a href="?controller=users&action=register">Sign up here.</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
<?php
//Echoing session variable for debugging purposes
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
 ?>
