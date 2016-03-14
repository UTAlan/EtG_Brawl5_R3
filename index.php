<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elements The Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
        html,body {
            background: url('bg_low.png') no-repeat center center fixed;
            -webkit-background-size: cover; /* For WebKit*/
            -moz-background-size: cover;    /* Mozilla*/
            -o-background-size: cover;      /* Opera*/
            background-size: cover;         /* Generic*/
        }
        .logo { width: 100%; visibility: hidden; }
        #bg_load { display: none; }
        .content { 
            padding: 20px;
            border-radius: 10px; 
            border: solid 1px #FFF; 
            background-color: rgba(0,0,0,0.5);  
        }
        .content input { width: 100%; margin-bottom: 5px; border-radius: 5px; padding-top: 2px; padding-bottom: 2px; }
        .content a { 
            color: #FFF; 
            text-decoration: none; 
            background-color: rgba(0,0,0,0.5); 
            border-radius: 5px; 
            border: solid 1px #FFF; 
            padding: 3px;
            display: block;
            float: left;
            margin-bottom: 5px;
            text-align: center;
        }
        #errorMessage { text-align: center; color: #F00; }
        #successMessage { text-align: center; color: #0F0; }
        #loginLink, #signup_cancel, #trouble_submit { width: 45%; margin-right: 5%; }
        #signupLink, #signup_submit, #trouble_cancel { width: 45%; margin-left: 5%; }
        #troubleLink { width: 100%; }
        #errorWrapper, #successWrapper, #signupFormWrapper, #troubleFormWrapper { display: none; }
        .footer { margin-top: 50px; color: #FFF; text-shadow: 1px 1px #000; font-size: 0.8em; }
        .footer a { color: #FFF; text-decoration: underline; text-shadow: 1px 1px #000; }
        .center { text-align: center; }
        .right { text-align: right; }
        .hidden { display: none; }
        @media screen and (max-width: 480px) {
            .footer p { text-align: center !important; }
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
                <p class="center">
                    <img src="logo.png" class="logo" />
                    <img src="" id="bg_load" />
                </p>
            </div>
        </div>

        <div class="row">
            <div class="content col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
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
                        <a id="trouble_submit" href="#">Reset Password</a>
                        <a id="trouble_cancel" href="#">Cancel</a>
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
    <script src="jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
    function clearErrors() {
        $("#errorWrapper").hide();
        $("#errorMessage").html('');
        $("#successWrapper").hide();
        $("#successMessage").html('');
    }
    function validateLoginForm() {
        if($("#username").val() == "" || $("#password").val() == "") {
            $("#errorMessage").html('Please provide a username and password.');
            $("#errorWrapper").show();
            return false;
        }
        return true;
    }
    function validateSignupForm() {
        if($("#signup_username").val() == "" || $("#signup_password").val() == "" || $("#signup_email").val() == "") {
            $("#errorMessage").html('Please provide a username, password, and email address.');
            $("#errorWrapper").show();
            return false;
        }
        return true;
    }
    function validateTroubleForm() {
        if($("#trouble_username").val() == "") {
            $("#errorMessage").html('Please provide a username.');
            $("#errorWrapper").show();
            return false;
        }
        return true;
    }

    $(function() {
        $("#loginForm").submit(function() {
            clearErrors();
            if(validateLoginForm()) {
                if($("#username").val() == 'zanzarino' && $("#password").val() == 'Elements') {
                    $("#loginFormWrapper").hide();
                    $("#loginSuccessWrapper").show();
                } else {
                    $("#loginError").html('Incorrect username or password. Please try again.');
                    $("#loginErrorWrapper").show();
                }
            } 
            return false;
        });

        $("#loginLink").click(function() {
            $("#loginForm").submit();
            return false;
        });

        $("#signupLink").click(function() {
            clearErrors();
            $("#loginFormWrapper").hide("slide", { direction: "left" }, 200, function() {
                $("#signupFormWrapper").show("slide", { direction: "right" }, 200);
            });
            return false;
        });

        $("#signup_cancel").click(function() {
            clearErrors();
            $("#signupFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
            });
            return false;
        });

        $("#signup_submit").click(function() {
            clearErrors();
            if(validateSignupForm()) {
                $("#username").val($("#signup_username").val());
                $("#signupForm").trigger("reset");
                $("#successMessage").html('You have successfully signed up! Please login below.');
                $("#successWrapper").show();
                $("#signupFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                    $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
                });
            }
            return false;
        });

        $("#troubleLink").click(function() {
            clearErrors();
            $("#loginFormWrapper").hide("slide", { direction: "left" }, 200, function() {
                $("#troubleFormWrapper").show("slide", { direction: "right" }, 200);
            });
            return false;
        });

        $("#trouble_cancel").click(function() {
            clearErrors();
            $("#troubleFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
            });
            return false;
        });

        $("#trouble_submit").click(function() {
            clearErrors();
            if(validateTroubleForm()) {
                $("#troubleForm").trigger("reset");
                $("#successMessage").html('Your password has been reset. Please check your email.')
                $("#successWrapper").show();
                $("#troubleFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                    $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
                });
            }
            return false;
        });

        $("#bg_load").one("load", function() {
            $("html,body").css("background-image", "url('bg.png')");
        }).attr("src", "bg.png");
    });
    </script>
  </body>
</html>
