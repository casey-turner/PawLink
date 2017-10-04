    <div class="banner homepage">
        <div class="container">
            <h2>The #1 Dog Walking App for Busy Dog Owners</h2>
            <h2>Let's Get Started</h2>
            <a class="orange-btn hp-register-btn" href="#" data-toggle="modal" data-target="#registerModal">Sign up to PawLink as a dog owner or dog walker</a>
        </div>
    </div>
    <div class="hp-about">
        <div class="container">
            <h1>How PawLink Works</h1>
            <div class="row">
                <div class="col-sm-4 centre-content">
                    <img src="view/images/searchlocal.png">
                    <h3>Search</h3>
                    <p>Find and book a local dog walker on-demand, scheduled, or on a recurring basis.</p>
                </div>
                <div class="col-sm-4 centre-content">
                    <img src="view/images/payonline.png">
                    <h3>Book & Pay on PawLink</h3>
                    <p>It’s cashless and secure.</p>
                </div>
                <div class="col-sm-4 centre-content">
                    <img src="view/images/insurance.png">
                    <h3>Insurance Included</h3>
                    <p>Premium insurance covers your pet and third parties.</p>
                </div>
            </div>
        </div>
    </div>
    <!--Registration Modal -->
    <div class="modal fade" id="registerModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg" role="document">
            <div class="centre-flex">
                <form class="wide-form entry-form" id="ajaxRegisterForm" method="post" action="?controller=users&action=register" data-parsley-validate >
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <legend>Sign up to PawLink</legend>
                    <?php if (isset($_SESSION['error'])) {
                        echo $_SESSION['error']; } ?>
                    <div id="ajaxRegisterError"></div>
                    <div class="error_div"></div>
                    <div class="row">
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/user.png" alt=""></span>
                            <input placeholder="First name" type="text" name="firstname" required>
                        </div>
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/user.png" alt=""></span>
                            <input placeholder="Last name" type="text" name="lastname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/email.png" alt=""></span>
                            <input placeholder="Email" type="email" name="useremail" required>
                        </div>
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/phone.png" alt=""></span>
                            <input placeholder="Phone number" type="text" name="phone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/address.png" alt=""></span>
                            <input placeholder="Address" type="text" name="address" required>
                        </div>
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/address.png" alt=""></span>
                            <input placeholder="Suburb" type="text" name="suburb" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/address.png" alt=""></span>
                            <input placeholder="State" type="text" name="state" required data-storage="false">
                        </div>
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/address.png" alt=""></span>
                            <input placeholder="Postcode" type="text" name="postcode" minlength="4" maxlength="4" required data-storage="false">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/password.png" alt=""></span>
                            <input placeholder="Password" type="password" name="password" id="password" required minlength="8" data-storage="false">
                        </div>

                        <div class="col-md-6 input-group">
                            <span class="input-icon"><img src="view/images/password.png" alt=""></span>
                            <input placeholder="Confirm password" type="password" name="confirmpassword" data-parsley-equalto="#password" required data-storage="false">
                        </div>
                    </div>

                    <div class="submit-cont">
                        <input type="submit" class="orange-btn" value="Register">
                        <p>Already a member? <a href="?controller=users&action=login">Login here.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
