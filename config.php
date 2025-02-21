<?php
$server = getenv('DB_SERVER');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$database = getenv('DB_NAME');

$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("An unexpected error occurred. Please try again later.");
}
?>
