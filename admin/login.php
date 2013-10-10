<?php
    /**
     * Glav.in
     *
     * A very simple CMS
     *
     *
     * @package        Glav.in
     * @author        Matt Sparks
     * @copyright    Copyright (c) 2013, Matt Sparks (http://www.mattsparks.com)
     * @license        http://opensource.org/licenses/MIT The MIT License (MIT)
     * @link        http://glav.in
     * @since        1.0.0-alpha
     */

    $logging_in = false;

    if ($_POST) {

        $email = clean($_POST['email']);
        $password = password_hash(clean($_POST['password']), PASSWORD_DEFAULT, $password_options);

        if (!$user->validate($email, $password)) {
            $errors[] = 'Invalid Login Information. Need to <a href="reset_password" title="Reset Password">reset your password?</a>';
        } else {
            // Once the user has been validated, we need to refresh the page
            // to redirect to the admin panel.
            $logging_in = true;

            echo '<meta http-equiv="refresh" content="3; url=pages">';
        }

    }
?>
<div id="login-content">
<?php
// Print out any messages or errors
    foreach ($msgs as $msg) {
        echo '<div class="msg">' . $msg . '</div>';
    }

    foreach ($errors as $error) {
        echo '<div class="error">' . $error . '</div>';
    }

// Should we show the login prompt or are we logging in?
    if (!$logging_in) {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" placeholder="Email Address" name="email" />
            <input type="password" placeholder="Password" name="password" />
            <input type="submit" value="Submit">
        </form>
    <?php
    } else {
        ?>
        <div id="logging-in">Logging In...</div>
    <?php
    }
?>