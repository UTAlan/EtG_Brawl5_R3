<?php
require_once('config.php');
$username = $db->real_escape_string($_POST['username']);
$password = sha1($_POST['password']);
$email_address = $db->real_escape_string($_POST['email']);
if(empty($username) || empty($_POST['password']) || empty($email_address)) {
    die('You must provide a username, password, and email address. Please try again.');
}
$results = $db->query("SELECT id FROM Brawl5Round3_users WHERE username = '$username'");
if($results->num_rows > 0) {
    die('Account with this Username already exists.');
}
$results = $db->query("SELECT id FROM Brawl5Round3_users WHERE email_address = '$email_address'");
if($results->num_rows > 0) {
    die('Account with this Email Address already exists.');
}
$db->query("INSERT INTO Brawl5Round3_users SET username = '$username', password = '$password', email_address = '$email_address'");