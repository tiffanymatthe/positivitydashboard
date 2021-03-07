<?php
if (!isset($_SESSION)) {
	session_start();
}

$local = false;

$user_id = 1;
$user_name = "cmd-f";
$user_password = "cmdf2021";

// connect to database
if ($local) {
	$conn = mysqli_connect("localhost", "root", "BerryCherry@123", "positivity-dashboard");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}

	define('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/');
} else {
	$url = parse_url(getenv("mysql://bd43e8f13d58e6:61f99b4e@us-cdbr-east-03.cleardb.com/heroku_ce1583fd0a7a864?reconnect=true"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}

	define('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'https://roundrecipes.com/');
}

?>