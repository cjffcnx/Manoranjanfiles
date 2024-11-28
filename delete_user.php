<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "manoranjan_db");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the required POST data is set
if (isset($_POST['user_email']) && isset($_POST['comment_id'])) {
    // Sanitize inputs
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $comment_id = (int)$_POST['comment_id']; // Cast to integer for safety

    // Construct and execute the DELETE query
    $delete_query = "DELETE FROM comments WHERE id = $comment_id AND user_email = '$user_email'";
    $result = mysqli_query($conn, $delete_query);

    // Check if the operation was successful
    if ($result) {
        echo "Comment deleted successfully.";
        // Redirect back to the admin panel or provide feedback
        header("Location: post.php?message=CommentDeleted");
        exit();
    } else {
        echo "Error deleting comment: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. Required data is missing.";
}

// Close the database connection
mysqli_close($conn);
?>
