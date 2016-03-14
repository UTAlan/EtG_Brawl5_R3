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
            background: url('bg.png') no-repeat center center fixed;
            -webkit-background-size: cover; /* For WebKit*/
            -moz-background-size: cover;    /* Mozilla*/
            -o-background-size: cover;      /* Opera*/
            background-size: cover;         /* Generic*/
        }
        .logo { width: 100%; visibility: hidden; }
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
        #loginLink { width: 45%; margin-right: 5%; }
        #signupLink { width: 45%; margin-left: 5%; }
        #troubleLink { width: 100%; }
        .footer { margin-top: 50px; color: #FFF; text-shadow: 1px 1px #000; }
        .footer a { color: #FFF; text-decoration: underline; text-shadow: 1px 1px #000; }
        .center { text-align: center; }
        .right { text-align: right; }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
                <p class="center"><img src="logo.png" class="logo" /></p>
            </div>
        </div>

        <div class="row">
            <div class="content col-sm-6 col-sm-offset-3">
            <form action="#" method="post" id="loginForm">
                <div class="row">
                    <div class="col-xs-5">
                        <input type="text" name="username" placeholder="Username" />
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="col-xs-7">
                        <a id="loginLink" href="#">Login</a>
                        <a id="signupLink" href="#">Signup</a>
                        <a id="troubleLink" href="#">Trouble logging in?</a>
                    </div>
                </div>
            </form>
            </div>
        </div>

        <div class="row footer">
            <div class="col-md-6">
                <p>
                    Graphic Art by <a href="http://www.spore.com/sporepedia#qry=usr-Fotosynthesis%7C2267038817">Fotosynthesis</a>, <a href="http://cryotube.deviantart.com/?rnrd=89523">cryotube</a>, &amp; <a href="http://www.vrt-designs.com/">vrt</a>
                    <br />
                    Ver. 1.327
                </p>
            </div>
            <div class="col-md-6">
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
    <script>
    $(function() {
      $("#loginForm").submit(function() {
        return false;
      });

      $("#signupLink").click(function() {
        return false;
      });

      $("#troubleLink").click(function() {
        return false;
      });
    });
    </script>
  </body>
</html>
