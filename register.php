<?php
session_start();
$page_title = "Registration Form";
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
    /* Changed from fixed to scroll to prevent shaking */
    background-attachment: scroll;
}


.endquote {
    background-attachment: fixed;
    min-height: 150px; /* Set an appropriate fixed height to prevent layout shifts */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 33px 0;
    background-image: url('mygif.gif');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-blend-mode: multiply;
    transition: all 0.2s ease; /* Smooth transition */
}

.endquote h2 {
    font-family: Poppins;
    font-weight: 600;
    font-style: normal;
    background-color: #f8f8ff;
    max-width: 90%; /* Prevent h2 text from expanding too wide */
    white-space: nowrap; /* Prevent wrapping and keep it on one line */
    overflow: hidden; /* Hide any text overflow */
    text-overflow: ellipsis; /* Add ellipsis for overflow */
}

.card{
    background: linear-gradient(to bottom right, #fff, #e7e7fb00);
}
    </style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['status'])): ?>
                    <div class="alert alert-warning">
                        <h4><?= $_SESSION['status']; ?></h4>
                        <?php unset($_SESSION['status']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="card">
                    <div class="card-header">
                        <h5 style="font-family:Poppins;font-weight:400;font-style:italic;">Registration Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" autocomplete="off">
                            <div class="form-group mb-3">
                                <label style="font-family:Poppins;font-weight:500;" for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label style="font-family:Poppins;font-weight:500;" for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" required pattern="\d{10}" title="Phone number must be 10 digits">


                            </div>
                            <div class="form-group mb-3">
                                <label style="font-family:Poppins;font-weight:500;" for="email">Email</label>
                                <!-- <input type="email" name="email" class="form-control" required> -->

                <!-- If you want your email to end with @edu.np then follow the below code-->
                <input type="email" name="email" class="form-control" required pattern=".*edu.*" title="Email must contain 'edu'" />


                            </div>
                            <div class="form-group mb-3">
                                <label style="font-family:Poppins;font-weight:500;" for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="endquote" style="display: flex; justify-content: center; padding: 33px 0; background-image: url('mygif.gif'); background-size: cover; background-position: center; background-repeat: no-repeat; background-blend-mode: multiply;">
    <h2 style="text-align: center; background-color:#f8f8ff; font-family: Poppins; font-weight: 600; font-style: normal;" data-typed-strings="Connect and elevate your experience!, Welcome to Manoranjan!, Join us on this journey!, Lets have fun together"></h2>
</div>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
  var typed = new Typed('.endquote h2', {
    strings: ['Connect and elevate your experience!', 'Welcome to Manoranjan!', 'Join us on this journey!', 'Lets have fun together'],
    typeSpeed: 60,   // Slightly faster typing to reduce delay
    backSpeed: 30,   // Faster backspacing to smoothen the effect
    loop: true,
    smartBackspace: true, // Only backspace what is necessary
    startDelay: 500, // Small delay before starting the animation
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
