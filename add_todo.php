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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo_text'])) {
    $todoText = $conn->real_escape_string($_POST['todo_text']);
    $userId = 1; // Replace with actual user ID, or session user ID

    $sql = "INSERT INTO todos (user_id, todo_text, status) VALUES ('$userId', '$todoText', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

$conn->close();
?>
