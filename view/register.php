    <div class="centre-flex">
        <form class="narrow-form" id="registerForm" method="post" action="?controller=users&action=register" data-parsley-validate>
            <legend>Sign up to PawLink</legend>
            <div class="error_div"></div>
            <label>First name</label>
            <input type="text" name="firstname" required>
            <label>Last name</label>
            <input type="text" name="lastname" required>
            <label>Phone number</label>
            <input type="text" name="phone" required>
            <label>Email</label>
            <input type="email" name="useremail" required>
            <label>Password</label>
            <input type="password" name="password" id="password" required minlength="8">
            <label>Confirm password</label>
            <input type="password" name="confirmpassword" data-parsley-equalto="#password"	required>
            <div class="password_error"></div>
            <div class="submit-cont">
                <input type="submit" class="orange-btn">
                <p>Already a member? <a href="?controller=users&action=login">Login here.</a></p>
            </div>
        </form>
    </div>
