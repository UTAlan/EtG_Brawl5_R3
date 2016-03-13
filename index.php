<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elements The Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
    <h1>Elements the Game</h1>

    <form action="#" method="post" id="loginForm">
    <label>Username: <input type="text" name="username" /></label>
    <br />
    <label>Password: <input type="password" name="password" /></label>
    <br />
    <input type="button" value="Login" />
    <br />
    <p><a id="signupLink" href="#">Signup</a> &middot; <a id="troubleLink" href="#">Trouble logging in?</a></p>
    </form>

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
