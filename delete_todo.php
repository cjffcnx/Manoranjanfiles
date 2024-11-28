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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo_id'])) {
    $todoId = (int) $_POST['todo_id'];

    $sql = "DELETE FROM todos WHERE id = '$todoId'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

$conn->close();
?>
