<?php
error_reporting(E_NONE);
include_once('includes/php/dbconfig.php');
include_once('dbconfig.php');
if(empty($dbconfig)) { die("Database Configuration Missing"); }
$db = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['pass'], $dbconfig['db']);
