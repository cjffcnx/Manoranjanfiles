<?php
$servername = "localhost";
$username = "root"; // Change if your username is different
$password = "";     // Change if your password is different
$dbname = "events_db";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
