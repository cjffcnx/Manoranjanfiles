<?php
include('includes/header.php');
include('includes/navbar.php');
include('connectsocial.php'); // Database connection for manoranjan_db


// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Handle adding a new post
if (isset($_POST['add_post'])) {
    $post_content = sanitize_input($_POST['post_content']);
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $image_path = null;

    // Check if an image file is uploaded
    if (!empty($_FILES['post_image']['name'])) {
        $target_dir = "uploads/posts/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        
        $image_file = basename($_FILES['post_image']['name']);
        $target_file = $target_dir . $image_file;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allow only certain image file formats
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "<script>alert('Failed to upload image: " . $_FILES['post_image']['error'] . "');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
        }
    }

    // Insert the post content and image path (if any) into the database
    $sql = "INSERT INTO posts (content, email, image_path) VALUES ('$post_content', '$email', '$image_path')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Post added successfully!'); window.location.href='post.php';</script>";
    } else {
        echo "<script>alert('Error adding post: " . mysqli_error($conn) . "');</script>";
    }
}

// Handle liking a post
if (isset($_POST['like_post'])) {
    $post_id = $_POST['post_id'];
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';

    $sql = "INSERT INTO likes (post_id, user_email) VALUES ('$post_id', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Post liked successfully!'); window.location.href='post.php';</script>";
    } else {
        echo "<script>alert('Error liking post.');</script>";
    }
}

// Handle commenting on a post
if (isset($_POST['comment_post'])) {
    $post_id = $_POST['post_id'];
    $comment = sanitize_input($_POST['comment']);
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';

    $sql = "INSERT INTO comments (post_id, user_email, comment, created_at) VALUES ('$post_id', '$email', '$comment', NOW())";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Comment added successfully!'); window.location.href='post.php';</script>";
    } else {
        echo "<script>alert('Error adding comment.');</script>";
    }
}

// Handle reporting a post
if (isset($_POST['report_post'])) {
    $post_id = $_POST['post_id'];
    $reason = sanitize_input($_POST['reason']);
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';

    $check_query = "SELECT * FROM reports WHERE post_id='$post_id' AND user_email='$email'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) == 0) {
        $sql = "INSERT INTO reports (post_id, user_email, reason, created_at) VALUES ('$post_id', '$email', '$reason', NOW())";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Report has already been sent successfully. We will take a closer look and remove the content if it violates our rules and policy.'); window.location.href='post.php';</script>";
        } else {
            echo "<script>alert('Error reporting post.');</script>";
        }
    } else {
        echo "<script>alert('You have already reported this post.'); window.location.href='post.php';</script>";
    }
}

// Handle uploading study materials
if (isset($_POST['upload_study_material'])) {
    $description = sanitize_input($_POST['description']);
    $target_dir = "uploads/study_materials/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow only PDF files
    if ($fileType != "pdf") {
        echo "<script>alert('Only PDF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 100000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $file_name = basename($_FILES["fileToUpload"]["name"]);
             // Update the SQL query to include the description
             $sql = "INSERT INTO study_materials (file_name, file_path, description, uploaded_at) VALUES ('$file_name', '$target_file', '$description', NOW())";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('The file " . htmlspecialchars($file_name) . " has been uploaded.'); window.location.href='post.php';</script>";
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}

// Fetch posts from the database
$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error fetching posts: " . mysqli_error($conn));
}

// Fetch study materials from the database
$materials_query = "SELECT * FROM study_materials ORDER BY uploaded_at DESC";
$materials_result = mysqli_query($conn, $materials_query);
if (!$materials_result) {
    die("Error fetching study materials: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        
    }
    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
        display: flex;
        gap: 20px;
        
    }
    .posts {
        width: 60%;
        
    }
    .upload-form {
        width: 60%;
        background: #fff;
        padding: 20px;
        margin: 20px 0;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .upload-form input, .upload-form button {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: "Poppins", serif;
        font-weight: 500;
        font-style: normal;
    }
    .upload-form button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .upload-form button:hover {
        background-color: #0056b3;
    }
    .post-form, .post-item, .material-item {
        background: #fff;
        padding: 20px;
        margin: 20px 0;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width:70%;
    }
    .post-form input, .post-form textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: "Poppins", serif;
        font-weight: 500;
        font-style: normal;
    }
    .post-form button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin:12px 0;
    }
    .post-form button:hover {
        background-color: #0056b3;
    }
    .post-item {
        margin-bottom: 10px;
        width:30vw;
    }
    .post-actions {
        margin:20px 0px;
       
    }
    .post-actions button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        border-radius:50%;
        height:40px;
        width:40px;
        margin-bottom:10px;
        
    }
    .post-actions button:hover {
        background-color: #0056b3;
    }
    .material-item {
        margin-bottom: 10px;
    }
</style>

        
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<h1 style="text-align:center;margin-top:50px; font-family:Poppins;font-weight:400; font-size:31px;font-style:italic;"></h1>
    <div class="container">
        

        <!-- Form to Add Post -->
        <div class="post-form">
        <h1 style=" font-family:Poppins;font-weight:400; font-size:31px;font-style:italic;">Add a new Post</h1>
            <form action="post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="text" name="email" placeholder="Your Email (for saving)" required>
                <textarea name="post_content" placeholder="What's on your mind?" rows="4" required></textarea>
                <input type="file" name="post_image" accept="image/*">
                <button type="submit" name="add_post">Add Post</button>
            </form>
            <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .jokes-container {
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }
        .jokes-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .jokes-header img {
            height: 50px;
            width: 50px;
        }
        .jokes-header h5 {
            margin: 0;
            text-align: center;
            font-size: 24px;
            color: #333;
        }
        .joke-card {
            background: #fff;
            padding: 15px 10px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            
        }
        .joke-text {
            font-size: 16px;
            color: #555;
            margin-right: 20px;
          
        }
        .joke-actions {
            display: flex;
            gap: 10px;
        }
        .joke-actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .joke-actions .share-btn {
            background-color: #007bff;
            color: #fff;
        }
        .joke-actions .share-btn:hover {
            background-color: #0056b3;
        }
        .joke-actions .save-btn {
            background-color: #28a745;
            color: #fff;
        }
        .joke-actions .save-btn:hover {
            background-color: #1e7e34;
        }

        .hamburger-menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            overflow-y: auto;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }
        .hamburger-menu.open {
            transform: translateX(0);
        }
        .menu-header {
            padding: 15px;
            font-size: 20px;
            background-color: #444;
            text-align: center;
        }
        .menu-section {
            padding: 15px;
        }
        .menu-section h3 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 18px;
            color: #fff;
        }
        .menu-section ul {
            list-style: none;
            padding: 0;
        }
        .menu-section li {
            padding: 8px 10px;
            cursor: pointer;
            color: #ccc;
        }
        .menu-section li:hover {
            background-color: #555;
            color: #fff;
        }
        .hamburger-icon {
            position: fixed;
            top: 10px;
            left: 15px;
            font-size: 24px;
            cursor: pointer;
            z-index: 1100;
          
            border-radius:50%;
            height:40px;
            width:40px;
            background-color:white;
        }
    </style>
</head>
<body>
     <!-- Hamburger Icon -->
     <div class="hamburger-icon" onclick="toggleMenu()">☰</div>

<!-- Hamburger Menu -->
<div class="hamburger-menu" id="hamburgerMenu">
    <div class="menu-header">Menu</div>
    <div class="menu-section">
        <h3 style="margin-top:10px;">Games</h3>
        <ul>
           
            <a style="text-decoration:none;" href="https://www.chess.com/" target="_blank" rel="noopener noreferrer"><li>Chess</li></a>
            <a style="text-decoration:none;" href="https://www.gamestolearnenglish.com/hangman/" target="_blank" rel="noopener noreferrer"><li>Hangman</li></a>
            <a style="text-decoration:none;" href="https://www.sudokuonline.io/" target="_blank" rel="noopener noreferrer"> <li>Suduko</li></a>
            <a style="text-decoration:none;" href="https://ludoking.com/" target="_blank" rel="noopener noreferrer"><li>Ludo</li></a> 
            <a style="text-decoration:none;" href="https://playtictactoe.org/" target="_blank" rel="noopener noreferrer"><li>Tic-tac toe</li></a>
            <a style="text-decoration:none;" href="https://www.icebreakerspot.com/activities/20-questions" target="_blank" rel="noopener noreferrer"> <li>Twenty-questions</li></a>
            
        </ul>
    </div>
    <div class="menu-section">
        <h3>Tools</h3>
        <ul>
            <a style="text-decoration:none;" href="https://gemini.google.com/app" target="_blank" rel="noopener noreferrer"><li>Gemini</li></a>
            <a style="text-decoration:none;" href="https://todoist.com/" target="_blank" rel="noopener noreferrer"><li>Todo list</li></a>
            <a style="text-decoration:none;" href="https://studywithme.io/aesthetic-pomodoro-timer/" target="_blank" rel="noopener noreferrer"><li>Pomodoro timer</li></a> 
            <a style="text-decoration:none;" href="https://chat.openai.com/chat" target="_blank" rel="noopener noreferrer"><li>ChatGPT</li></a>
        </ul>
    </div>
</div>
<script>
        // Function to toggle the hamburger menu
        function toggleMenu() {
            const menu = document.getElementById("hamburgerMenu");
            menu.classList.toggle("open");
        }
    </script>
    <div class="jokes-container">
        <div class="jokes-header">
            <img src="jokes.png" alt="Jokes">
            <h5>Some Jokes</h5>
        </div>
        <div style=" font-size:12px;" id="jokes-list"></div>
    </div>

    <script>
        const jokes = [
            "Why don't scientists trust atoms? Because they make up everything!",
            "Why did the scarecrow win an award? Because he was outstanding in his field!",
            "Why don't skeletons fight each other? They don't have the guts!",
            "What do you call fake spaghetti? An impasta!",
            // Add more jokes here up to 100...
        ];

        const jokesList = document.getElementById("jokes-list");

        // Function to create a joke card
        const createJokeCard = (joke, index) => {
            const jokeCard = document.createElement("div");
            jokeCard.classList.add("joke-card");

            const jokeText = document.createElement("p");
            jokeText.classList.add("joke-text");
            jokeText.innerText = `${index + 1}. ${joke}`;

            const actions = document.createElement("div");
            actions.classList.add("joke-actions");

            // Share button
            const shareBtn = document.createElement("button");
            shareBtn.classList.add("share-btn");
            shareBtn.innerText = "Share";
            shareBtn.addEventListener("click", () => {
                if (navigator.share) {
                    navigator.share({
                        text: joke,
                    }).catch(console.error);
                } else {
                    alert("Sharing not supported on this device.");
                }
            });

            // Save button
            const saveBtn = document.createElement("button");
            saveBtn.classList.add("save-btn");
            saveBtn.innerText = "Save";
            saveBtn.addEventListener("click", () => {
                const blob = new Blob([joke], { type: "text/plain" });
                const link = document.createElement("a");
                link.href = URL.createObjectURL(blob);
                link.download = `joke_${index + 1}.txt`;
                link.click();
                URL.revokeObjectURL(link.href);
            });

            actions.appendChild(shareBtn);
            actions.appendChild(saveBtn);
            jokeCard.appendChild(jokeText);
            jokeCard.appendChild(actions);

            return jokeCard;
        };

        // Generate jokes list
        jokes.forEach((joke, index) => {
            jokesList.appendChild(createJokeCard(joke, index));
        });
    </script>
        </div>

        <!-- Display Posts -->
        <div class="posts">
        
            <?php while ($post = mysqli_fetch_assoc($result)): ?>
                <div class="post-item">
                <h3 >
                    
    <!-- <?php echo $post['email']; ?>  -->
    
    <h3 style="display: flex; justify-content: space-between; align-items: center;">
    <small style="font-size: 14px; text-align:center; color: #888;"><?php echo $post['created_at']; ?></small>
</h3>

</h3>
<hr>

                    <p style="font-family:Poppins;font-style:italic;"><?php echo $post['content']; ?></p>
                    <?php if ($post['image_path']): ?>
                        <img src="<?php echo $post['image_path']; ?>" alt="Post Image" style="max-width: 100%; height: auto;">
                    <?php endif; ?>

                    <div class="post-actions">
                        <form action="post.php" method="POST" style="display:inline;" autocomplete="off">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            <input type="hidden" name="email" value="<?php echo $post['email']; ?>">
                           
                            <button type="submit" name="like_post"><i class="fa-regular fa-thumbs-up"></i></button>
                        </form>
                        <form action="post.php" method="POST" style="display:inline; margin-bottom:20px;" autocomplete="off">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            <input style="width: 330px; border: 2px solid green; border-radius: 5px; padding: 5px; "
                            type="text" name="email" placeholder="Email to comment(Hidden in comments)" required>
                            <br>
                            <button style="background-color:lightgreen;" type="submit" name="comment_post"><i class="fa-regular fa-comment"></i></button>
                            <input style="width:330px;height:80px; border: 2px solid green; border-radius: 5px; padding: 5px; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);"
                            type="text" name="comment" placeholder="Comment..." required>
                        </form>
                        <form action="post.php" method="POST" style="display:inline;" autocomplete="off">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            <br><br><br><br>
                            <h5>Report</h5>
                            <input type="text" name="email" placeholder="Reporter's email(Hidden)" required style="border: 1px solid #ccc; padding: 5px; border-radius: 3px;">
                            <input type="text" name="reason" placeholder="Reason for reporting" required style="border: 1px solid #ccc; padding: 5px; border-radius: 3px;">
                            <br>
                            <button style="background-color:red;margin-top:10px;" type="submit" name="report_post"><i class="fa-solid fa-bolt"></i></button>
                        </form>
                    </div>

                    <script src="https://kit.fontawesome.com/0a117d2ad3.js" crossorigin="anonymous"></script>
                    <!-- Display Comments -->
                    <div class="comments">
                        <h4>Comments:</h4>
                        <?php
                        $post_id = $post['id'];
                        $comments_query = "SELECT * FROM comments WHERE post_id='$post_id'";
                        $comments_result = mysqli_query($conn, $comments_query);
                        while ($comment = mysqli_fetch_assoc($comments_result)): ?>
                            <p><strong><?php echo $comment['created_at']; ?>:</strong> <?php echo $comment['comment']; ?></p>
                        <?php endwhile; ?>
                    </div>
                    <style>
.comments {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.comments h4 {
    margin-bottom: 10px;
}

.comment {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #f0f0f0;
    border-radius: 5px;
}
                        </style>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Form to Upload Study Materials -->
        <div class="upload-form">
            <h2>Upload Study Materials</h2>
            <form action="post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="text" name="description" placeholder="Description of the material" required>
                <input type="file" name="fileToUpload" accept=".pdf" required>
                <button style="margin-bottom:50px;" type="submit" name="upload_study_material">Upload Material</button>
               
            </form>
     

        <!-- Display Uploaded Study Materials -->
        <div class="study-materials">
            <h2>Uploaded Study Materials</h2>
            <?php while ($material = mysqli_fetch_assoc($materials_result)): ?>
                <div class="material-item">
                <p><strong>Description:</strong> <?php echo $material['description']; ?></p> 
                    <p><?php echo $material['file_name']; ?></p>
                    <a href="<?php echo $material['file_path']; ?>" download>Download</a>
                </div>
            <?php endwhile; ?>
        </div>
           </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
