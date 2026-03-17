<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3306';
$db   = getenv('DB_NAME') ?: '';
$user = getenv('DB_USER') ?: '';
$pass = getenv('DB_PASS') ?: '';

$conn = mysqli_connect($host, $user, $pass, $db, (int)$port);

if (!$conn) {
  die("DB connection failed: " . mysqli_connect_error());
}
?>
