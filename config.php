<?php
if (!isset($_SESSION)) {
	session_start();
}

$local = false;

$user_id = 1;
$user_name = "cmd-f";
$user_password = "cmdf2021";

$server = "us-cdbr-east-03.cleardb.com";
$username = "bd43e8f13d58e6";
$password = "61f99b4e";
$db = "heroku_ce1583fd0a7a864";



$conn = new mysqli($server, $username, $password, $db);

if (!$conn) {
	die("Error connecting to database: " . mysqli_connect_error());
}

define('ROOT_PATH', realpath(dirname(__FILE__)));
