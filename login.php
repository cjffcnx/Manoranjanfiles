<?php
session_start();

// Check if the user is already authenticated
if(isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "You are already logged in";
    header("Location: dashboard.php");
    exit(0);  // Ensure no further code runs
}

$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<style>


.py-5 {
    background: linear-gradient(to bottom right, #8A2BE2, #FF69B4), url('gaming.jpg'); 
    background-size: cover; 
    background-blend-mode: overlay;
    background-attachment: scroll; /* Prevent shaking on scroll */
    
}

/* Card styles */
.card {
    background: linear-gradient(to bottom right, #fff, #e7e7fb00);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Smooth shadow effect */
}

/* Smooth transition for the endquote */
.endquote {
    background-attachment: fixed;
    min-height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 34px 0;
    background-image: url('mygif.gif');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-blend-mode: multiply;
    transition: all 0.2s ease-in-out; /* Smooth transition */
}

.endquote h2 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    background-color: #f8f8ff;
    max-width: 90%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Button hover effects */
.btn-primary {
    background-color: #007bff;
    border: none;
    transition: background-color 0.3s ease; /* Smooth button color change */
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

.float-end {
    background-color: yellow;
    transition: background-color 0.3s ease;
}

.float-end:hover {
    background-color: gold; /* Slightly darker hover effect */
}

</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                // Display any session status message
                if(isset($_SESSION['status']))
                {
                    echo "<div class='alert alert-warning'>" . $_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);  // Clear the message after displaying it
                }
                ?>

                <div class="card shadow">
                    <div class="card-header">
                        <h5 style="font-family: Poppins, sans-serif; font-weight: 400; font-style: italic;">Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST" autocomplete="off">
                            <div class="form-group mb-3">
                                <label style="font-family: Poppins, sans-serif; font-weight: 500;" for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label style="font-family: Poppins, sans-serif; font-weight: 500;" for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="login_now_btn">Login</button>
                                <a href="password-reset.php" class="float-end">Forgot your password?</a>
                            </div>
                        </form>
                        <hr>
                        <h5 style="display: flex; justify-content: space-between; background-color: #f8f8ff;">
                            Did you receive your Verification Email? 
                            <a href="resend-email-verification.php" class="float-end">Resend</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div  class="endquote">
    <h2 style="text-align: center; background-color: #f8f8ff; font-family: 'Poppins', sans-serif; font-weight: 600;" data-typed-strings="Connect and elevate your experience!, Welcome to Manoranjan!, Join us on this journey!, Let's have fun together"></h2>
</div>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
  var typed = new Typed('.endquote h2', {
    strings: ['Connect and elevate your experience!', 'Welcome to Manoranjan!', 'Join us on this journey!', 'Let\'s have fun together'],
    typeSpeed: 60,
    backSpeed: 30,
    loop: true,
    smartBackspace: true,
    startDelay: 500,
  });
</script>

<script type="text/javascript" src="https://res.cloudinary.com/veseylab/raw/upload/v1684982764/magicmouse-2.0.0.cdn.min.js"></script>
      <script type="text/javascript">
    options = {
	"cursorOuter": "circle",
	"hoverEffect": "circle-move",
    
	"hoverItemMove": false,
	"defaultCursor": false,
	"outerWidth": 30,
	"outerHeight": 30
      };
    magicMouse(options);
</script>

<?php include('includes/footer.php'); ?>
