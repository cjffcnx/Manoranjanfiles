<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "adminlogin");

if (!$conn) {
    die("Cannot connect to database: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

    // Update the password in the database
    $update_query = "UPDATE admin SET Admin_Password='$new_password', reset_token=NULL WHERE Email='$email' AND Admin_Name='$admin_name'";
    
    if (mysqli_query($conn, $update_query)) {
        echo "Password has been updated successfully.";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close the database connection
?>
