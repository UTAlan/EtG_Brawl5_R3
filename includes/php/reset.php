<?php 
require_once("config.php");
if(empty($_POST['password']) || empty($_POST['confirm'])) {
    die("Please enter your new password twice.");
} else if($_POST['password'] != $_POST['confirm']) {
    die("Passwords do not match.");
}
$username = $db->real_escape_string($_POST['username']);
$password = sha1($_POST['password']);
$db->query("UPDATE Brawl5Round3_users SET password = '$password', trouble_code = ''  WHERE username = '$username'");
