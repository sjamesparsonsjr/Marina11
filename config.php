<?php
$servername = "localhost";
$username = "sjamesparsonsjr";
$password = "UserFriendly1";
$dbname = "printer_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
