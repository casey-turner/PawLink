    <div class="centre-flex">
        <form class="wide-form" id="registerForm" method="post" action="?controller=users&action=register">
            <legend>Sign up to PawLink</legend>
            <div class="error_div"></div>
            <label>First name</label>
            <input type="text" name="firstname">
            <label>Last name</label>
            <input type="text" name="lastname">
            <label>Phone number</label>
            <input type="text" name="phone">
            <label>Email</label>
            <input type="email" name="useremail">
            <label>Password</label>
            <input type="password" name="password">
            <label>Confirm password</label>
            <input type="password" name="confirmpassword">
            <div class="password_error"></div>
            <div class="submit-cont">
                <input type="submit" class="orange-btn">
                <p>Already a member? <a href="?controller=users&action=login">Login here.</a></p>
            </div>
        </form>
    </div>
