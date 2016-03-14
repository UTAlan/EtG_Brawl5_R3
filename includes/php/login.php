<?php
require_once('config.php');
$username = $db->real_escape_string($_POST['username']);
$password = sha1($_POST['password']);
$result = $db->query("SELECT id FROM Brawl5Round3_users WHERE username = '$username' AND password = '$password'");
if($result->num_rows != 1) {
    die('Invalid username or password. Please try again.');
}