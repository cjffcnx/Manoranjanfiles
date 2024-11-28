<?php
include('connectsocial.php'); // Database connection for manoranjan_db

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Handle file upload
if (isset($_POST['upload_material'])) {
    $file = $_FILES['fileToUpload'];  // Use 'fileToUpload' as in the form

    // Get the file extension
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Check if the file is MP3 or MP4
    if (!in_array($file_extension, ['mp3', 'mp4'])) {
        echo "<script>alert('Only MP3 and MP4 files are allowed.'); window.location.href='post.php';</script>";
        exit();
    }

    // Check if there was an error during upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Error uploading file.'); window.location.href='post.php';</script>";
        exit();
    }

    // Define upload directory and file path
    $upload_dir = 'uploads/';
    $file_name = basename($file['name']);
    $file_path = $upload_dir . $file_name;

    // Create upload directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        // Insert file information into the database, including description
        $description = sanitize_input($_POST['description']);
        $sql = "INSERT INTO study_materials (file_name, file_path, description) VALUES ('$file_name', '$file_path', '$description')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('File uploaded successfully!'); window.location.href='post.php';</script>";
        } else {
            echo "<script>alert('Error saving file information.');</script>";
        }
    } else {
        echo "<script>alert('Error moving uploaded file.');</script>";
    }
}

mysqli_close($conn); // Close the database connection
?>