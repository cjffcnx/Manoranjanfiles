<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "event_dashboard"; // Change this to your database

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = 1; // Replace with actual user ID or session user ID
$sql = "SELECT * FROM todos WHERE user_id = '$userId' ORDER BY created_at DESC";
$result = $conn->query($sql);

$todos = [];
while ($row = $result->fetch_assoc()) {
    $todos[] = $row;
}

echo json_encode(['todos' => $todos]);

$conn->close();
?>
