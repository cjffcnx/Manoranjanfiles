<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "adminlogin");

if (!$conn) {
    die("Cannot connect to database: " . mysqli_connect_error());
}

if (isset($_GET['token']) && isset($_GET['email'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);
    $email = mysqli_real_escape_string($conn, $_GET['email']);

    // Check if the token and email match in the database
    $query = "SELECT * FROM admin WHERE reset_token='$token' AND Email='$email'";
    
    // Run the query and check for errors
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Output the error for debugging
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        // Token is valid, show the password reset form
        ?>
        <form action="update-password.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <label for="admin_name">Admin Name:</label>
            <input type="text" name="admin_name" required>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required>
            <button type="submit">Reset Password</button>
        </form>

        <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom right, #8A2BE2, #FF69B4), url('gaming.jpg'); 
            background-size:cover;
          
    background-blend-mode: overlay; 
    /* Changed from fixed to scroll to prevent shaking */
    background-attachment: scroll;
        }

        form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        input:focus,
        button:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        </style>
        <?php
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn); // Close the database connection
?>
