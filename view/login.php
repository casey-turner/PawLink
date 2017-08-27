
    <div class="centre-flex">
        <form id="loginForm" action="?controller=users&action=login" method="post">
            <legend>Login to PawLink</legend>

            <?php
            if (isset($errorMsg)) { ?>
                <div class="errors">
                    <?php echo $errorMsg; ?>
                </div>
            <?php
            }
            ?>
            <input placeholder="Email" type="email" name="useremail">
            <input placeholder="Password" type="password" name="password">
            <div class="submit-cont">
                <input class="orange-btn" type="submit" name="submit">
                <p>Not yet a member? <a href="?controller=users&action=register">Sign up here.</a></p>
            </div>
        </form>
    </div>
