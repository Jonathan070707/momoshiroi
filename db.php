<?php
$servername = "localhost";
$username = "pma";
$password = "";
$dbname = "admin_dashboard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
