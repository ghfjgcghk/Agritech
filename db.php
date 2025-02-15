<?php
$host = "localhost";
$user = "root"; // Change if you have a different MySQL username
$pass = ""; // Change if you have a password
$dbname = "users";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
