<?php 
require_once('includes/php/config.php');

if(!empty($_GET['reset']) && !empty($_GET['code']) && (time() - substr($_GET['code'], 4, strlen($_GET['code'])-8)) < (60 * 60 * 24)) {
    $code = $db->real_escape_string($_GET['code']);
    $result = $db->query("SELECT username FROM Brawl5Round3_users WHERE trouble_code = '$code'");
    if($result->num_rows != 1) {
        header("Location: index.php");
        die();
    } else {
        $user = $result->fetch_assoc();
    }
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://elementscommunity.org/favicon.ico?v=darkness" />
    <title>Elements The Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
    <link rel="stylesheet" href="includes/css/style.css" />
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
                <p class="center">
                    <img src="includes/images/logo.png" class="logo" />
                    <img src="" id="bg_load" />
                </p>
            </div>
        </div>

        <div class="row">
            <div class="content col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
                <?php echo '<audio autoplay loop><source src="includes/music/' . (rand(1, 100) == 100 ? 'chaosomes' : 'theme') . '.mp3"></audio>'; ?>
                <div class="row" id="errorWrapper">
                    <div class="col-xs-12">
                        <p class="error" id="errorMessage"></p>
                    </div>
                </div>
                <div class="row" id="successWrapper">
                    <div class="col-xs-12">
                        <p class="error" id="successMessage"></p>
                    </div>
                </div>
                <div class="row" id="loginFormWrapper">
                    <div class="col-xs-5">
                        <form action="#" method="post" id="loginForm">
                        <input type="text" name="username" id="username" placeholder="Username" />
                        <input type="password" name="password" id="password" placeholder="Password" />
                        </form>
                    </div>
                    <div class="col-xs-7">
                        <a id="loginLink" href="#">Login</a>
                        <a id="signupLink" href="#">Signup</a>
                        <a id="troubleLink" href="#">Trouble logging in?</a>
                    </div>
                </div>
                <div class="row" id="signupFormWrapper">
                <form action="#" method="post" id="signupForm">
                    <div class="col-xs-5">
                        <input type="text" name="username" id="signup_username" placeholder="Username" />
                        <input type="password" name="password" id="signup_password" placeholder="Password" />
                    </div>
                    <div class="col-xs-7">
                        <input type="text" name="email" id="signup_email" placeholder="Email Address" />
                        <a id="signup_cancel" href="#">Cancel</a>
                        <a id="signup_submit" href="#">Signup</a>
                    </div>
                </form>
                </div>
                <div class="row" id="troubleFormWrapper">
                <form action="#" method="post" id="troubleForm">
                    <div class="col-xs-5">
                        <input type="text" name="username" id="trouble_username" placeholder="Username" />
                    </div>
                    <div class="col-xs-7">
                        <input type="text" name="email" id="trouble_email" placeholder="Email Address" />
                        <a id="trouble_cancel" href="#">Cancel</a>
                        <a id="trouble_submit" href="#">Reset Password</a>
                    </div>
                </form>
                </div>
                <div class="row" id="resetFormWrapper">
                <form action="#" method="post" id="resetForm">
                    <div class="col-xs-5">
                        <input type="password" name="password" id="reset_password" placeholder="Password" />
                        <input type="password" name="confirm" id="reset_confirm" placeholder="Confirm Password" />
                    </div>
                    <div class="col-xs-7">
                        <input type="hidden" name="username" id="reset_username" value="<?php echo $user['username']; ?>" />
                        <a id="reset_cancel" href="#">Cancel</a>
                        <a id="reset_submit" href="#">Save Password</a>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="row footer">
            <div class="col-sm-6">
                <p>
                    Graphic Art by <a href="http://www.spore.com/sporepedia#qry=usr-Fotosynthesis%7C2267038817">Fotosynthesis</a>, <a href="http://cryotube.deviantart.com/?rnrd=89523">cryotube</a>, &amp; <a href="http://www.vrt-designs.com/">vrt</a>
                    <br />
                    Ver. 1.327
                </p>
            </div>
            <div class="col-sm-6">
                <p class="right">
                    Music by Jordan Meister &amp; Justin Carpenter
                    <br />
                    Elements is property of Zanzarino Design
                    <br />
                    All Rights Reserved. &copy; 2011-2016
                </p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="includes/js/jquery-ui.min.js"></script>
    <script src="includes/js/script.js"></script>
    <?php if(!empty($user['username'])) { ?>
    <script>
    $(function() {
        showResetForm();
    });
    </script>
    <?php } ?>
  </body>
</html>
