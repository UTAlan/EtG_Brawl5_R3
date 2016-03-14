<?php
require_once('config.php');
$username = $db->real_escape_string($_POST['username']);
$email_address = $db->real_escape_string($_POST['email']);
if(empty($username) || empty($email_address)) {
    die('You must provide a username and email address. Please try again.');
}
$result = $db->query("SELECT id FROM Brawl5Round3_users WHERE username = '$username' AND email_address = '$email_address'");
if($result->num_rows != 1) {
    die('Invalid username or email address. Please try again.');
} else {
    $row = $result->fetch_assoc();
    $code = rand(1000, 9999) . time() . rand(1000, 9999);
    $db->query("UPDATE Brawl5Round3_users SET trouble_code = '$code' WHERE id = " . $row['id']);
    $link = "http://elements.alanbeam.net/Brawl5/Round3/index.php?reset=1&code=$code";

    require_once('PHPMailer/PHPMailerAutoload.php');
    require_once('mailconfig.php');
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $mailconfig['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $mailconfig['user'];
    $mail->Password = $mailconfig['pass'];
    $mail->SMTPSecure = $mailconfig['secure'];
    $mail->Port = $mailconfig['port'];
    $mail->setFrom($mailconfig['from_address'], $mailconfig['from_name']);
    $mail->AddReplyTo($mailconfig['from_address'], $mailconfig['from_name']);
    $mail->addAddress($email_address, $username);
    $mail->Subject = "Elements the Game - Password Reset (Brawl 5, Round 3)";
    $mail->isHTML(true);
    $mail->Body = 'Please <a href="' . $link . '">click here</a> to reset your password for Elements the Game (Brawl 5, Round 3).';
    $mail->AltBody = 'Please click this link to reset your password for Elements the Game (Brawl 5, Round 3): ' . $link;

    if(!$mail->send()) {
        die('Email error: ' . $mail->ErrorInfo);
    }
}