<?php
$page_title="Home page";
include('includes/header.php');
include('includes/navbar.php');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/0a117d2ad3.js" crossorigin="anonymous"></script>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing:border-box;
        font-family: "Poppins", system-ui;
  font-weight: 400;
  font-style: normal;
  
        
    }

    body{
        background:url('https://images.unsplash.com/photo-1497290756760-23ac55edf36f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHNpbXBsZSUyMGdyYWRpZW50JTIwb2NlYW4lMjBjb2xvcnxlbnwwfHwwfHx8MA%3D%3D');
        background-size: cover;
   height: 100vh;
   background-attachment: fixed;
   color:white;
   font-family: "Poppins", system-ui;
  font-weight: 500;
  font-style: normal;
    }
    .bg-img-1 {
   background-size: cover;
   height: 100vh;
   background-attachment: fixed;
   background-image: linear-gradient(to right, rgba(255, 0, 0, 0.25), rgba(255, 0, 0, 0.45)), url('bsocial.jpg'); /* Reduced rgba opacity */
   display: flex;
   justify-content: center;
   align-items: center;
}

.contentabtmano {
    color: #f8f9fa; /* Lighter text color for better contrast */
    text-align: center;
    max-width: 800px;
    margin: 80px auto;
    padding: 20px;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7); /* Added text shadow for better readability */
}


h1 {
    font-size: 3rem;
    font-weight: bold;
}

h5 {
    font-size: 1.2rem;
    margin-top: 10px;
    line-height: 1.8;
}

button.animated-button {
    padding: 10px 20px;
    font-size: 1.2rem;
    color: #fff;
    background-color: #0d6efd; /* Bootstrap primary color */
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin:15px 0;
}

button.animated-button:hover {
    background-color: #0056b3; /* Darker shade for hover */
}

.idx-grid {
    display: grid;
    border: 2px solid blue;
    grid-template-areas: "img1 img2 img3";
    grid-template-columns: repeat(3, 1fr); /* Define three equal-width columns */
    grid-gap: 2px; /* Space between grid items */
}

.idx-grid-items {
    border: 2px solid green;
    background-size: cover; /* Ensure the background image covers the whole element */
    background-position: center; /* Center the background image */
    height: 400px; /* Set a fixed height for grid items, adjust as needed */
    position: relative; /* To position content absolutely within it */
}

.item-1
{
    background:url('manstudy.jpg');
    background-size:cover;
}

.item-2
{
    background:url('bsocial.jpg');
    background-size:cover;
}

.item-3
{
    background:url('gaming.jpg');
    background-size:Cover;
}

.idx-grid-items .content {
    position: absolute;
    bottom: 10px; /* Space from the bottom */
    left: 10px; /* Space from the left */
    right: 10px; /* Space from the right */
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    padding: 10px; /* Padding around the text */
    border-radius: 5px; /* Rounded corners for the background */
    color: #fff; /* Text color */
}





</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item carousel-image bg-img-1 active">
                            <div class="contentabtmano">
                                <h1 style="color:black; font-weight:400;">Connect, Share, and have fun</h1>
                                <h5 style="  font-family:Poppins;  font-weight: 400; color:white;">Welcome to Manoranjan, your ultimate social media platform for sharing events, engaging with friends, and social interaction. Dive into a community where you can add events to the calendar, comment on posts, and enjoy conversations with AI. Join us today and experience the fun of social connection like never before!</h5>
                                <a href="register.php">
                                    <button class="animated-button">Get started</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
    <h2 style="text-align:center; margin-top:150px;" >Our Services</h2>
    <div class="idx-grid">
        <div class="idx-grid-items item-1">
            <div class="content">
                <h3>Event Sharing and Promotion</h3>
                <p>Promote your events to a wider audience and encourage others to join in on the fun. Utilize our platform to boost attendance and create memorable moments.</p>
            </div>
        </div>
        <div class="idx-grid-items item-2">
            <div class="content">
                <h3>Social Media Engagement</h3>
                <p>Connect with others by sharing posts, commenting, and participating in discussions around your favorite topics. Build a vibrant community and stay updated with the latest trends.</p>
            </div>
        </div>
        <div class="idx-grid-items item-3">
            <div class="content">
                <h3>Interactive Gaming</h3>
                <p>Play games to boost your memory power</p>
            </div>
        </div>
    </div>
</div>

<div class="gallery">
<h2 style="text-align:center;margin:50px 0;">Share your life experience</h2>


<style>
.carousel {
    margin: 50px auto; /* Center the carousel with margin on top and bottom */
    max-width: 1200px; /* Set a maximum width for the carousel */
    height: 80vh; /* Set the height to 80% of the viewport height */
    padding: 0 20px; /* Add padding for some spacing */
}

.carousel-item img {
    height: 80vh; /* Ensure images fill the height of the carousel */
    object-fit: cover; /* Crop the image to cover the container */
}

.carousel-control-prev,
.carousel-control-next {
    filter: brightness(0.8); /* Slightly darken the previous/next buttons */
}



</style>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="cameras.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="interaction.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="concert.avif" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="manoranjan-container" style=" font-family: Poppins, sans-serif;
    font-weight: 600;
    font-style: normal;">
        <div class="manoranjan-contactInfo">
            <div class="manoranjan-box">
                <div class="manoranjan-icon"><img height="50px" width="50px" src="abook.png" alt="" srcset=""></div>
                <div class="manoranjan-text">
                    <p>Address</p>
                    <p>Kageswori Manohara-06, Jorpati, Kathmandu</p>
                </div>
            </div>
            <div class="manoranjan-box">
                <div class="manoranjan-icon"><img height="50px" width="50px" src="email.png" alt="" srcset=""></div>
                <div class="manoranjan-text">
                   <p>Business inquiry</p>
                    <p>manoranjaninproject@gmail.com</p>
                </div>
            </div>

            <div class="manoranjan-box">
                <div class="manoranjan-icon"><img height="50px" width="50px" src="phone.png" alt=""></div>
                <div class="manoranjan-text">
                    <p>Business phone</p>
                    <p>+977 5918337</p>
                </div>
            </div>
        </div>
        <div class="manoranjan-contactForm">
            <form action="save.php" method="post" autocomplete="off">
                <h2>Send Message</h2>
                <div class="manoranjan-inputBox">
                    <input type="text" name="name" required="required">
                    <span>Full Name</span>
                </div>
                <div class="manoranjan-inputBox">
                    <input type="email" name="email" required="required">
                    <span>Email</span>
                </div>
                <div class="manoranjan-inputBox">
                    <textarea name="message" required="required"></textarea>
                    <span>Type your message...</span>
                </div>
                <div class="manoranjan-inputBox">
                   <input type="submit" name="" value="Send">
                </div>
            </form>
        </div>
</div>
<style>
.manoranjan-contact {
    position: relative;
    min-height: 100vh;
    padding: 50px 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-size: cover;
}

.manoranjan-contact .manoranjan-content {
    max-width: 800px;
    text-align: center;
}

.manoranjan-contact .manoranjan-content h2 {
    font-size: 36px;
    font-weight: 500;
    color: #333;
}

.manoranjan-contact .manoranjan-content p {
    font-weight: 500;
    color: #333;
}

.manoranjan-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}

.manoranjan-container .manoranjan-contactInfo {
    width: 45%;
    display: flex;
    flex-direction: column;
}

.manoranjan-container .manoranjan-contactInfo .manoranjan-box {
    position: relative;
    padding: 20px 0;
    display: flex;
}

.manoranjan-container .manoranjan-contactInfo .manoranjan-box .manoranjan-icon {
    min-width: 60px;
    height: 60px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
}

.manoranjan-container .manoranjan-contactInfo .manoranjan-box .manoranjan-text {
    display: flex;
    margin-left: 20px;
    font-size: 16px;
    flex-direction: column;
    font-weight: 300;
}

.manoranjan-container .manoranjan-contactInfo .manoranjan-box .manoranjan-text h3 {
    font-weight: 500;
    color: #fff;
    font-family: "Poppins", sans-serif;
}

.manoranjan-contactForm {
    width: 40%;
    padding: 40px;
    background: #fff;
}

.manoranjan-contactForm h2 {
    font-size: 24px;
    color: #333;
    font-weight: 500;
}

.manoranjan-contactForm .manoranjan-inputBox {
    position: relative;
    width: 100%;
    margin-top: 10px;
}

.manoranjan-contactForm .manoranjan-inputBox input, textarea {
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;
}

.manoranjan-contactForm .manoranjan-inputBox span {
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #666;
}

.manoranjan-contactForm .manoranjan-inputBox input:focus ~ span,
.manoranjan-contactForm .manoranjan-inputBox input:valid ~ span,
.manoranjan-contactForm .manoranjan-inputBox textarea:focus ~ span,
.manoranjan-contactForm .manoranjan-inputBox textarea:valid ~ span {
    color: #e91e63;
    font-size: 12px;
    transform: translateY(-20px);
}

.manoranjan-contactForm .manoranjan-inputBox input[type="submit"] {
    width: 100px;
    background: #e91e63;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
}

@media (max-width: 991px) {
    .manoranjan-contact {
        padding: 40px;
    }
    .manoranjan-container {
        flex-direction: column;
    }

    .manoranjan-container .manoranjan-contactInfo, .manoranjan-contactForm {
        margin-bottom: 40px;
        width: 100%;
    }
}

    </style>

<footer class="footer-mano">
    <div class="container-mano">
        <div class="row-mano">
            <div class="footer-col-mano">
                <h4>About Manoranjan</h4>
                <p>Manoranjan is a platform to share experiences, post events, and connect with others. Stay tuned with us for the latest updates!</p>
            </div>
            <div class="footer-col-mano">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Posts</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col-mano">
                <h4>Follow Us</h4>
                <div class="social-links-mano">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="row-mano">
            <p class="footer-copy-mano">© 2024 Manoranjan. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<style>
.footer-mano {
    background-color: #1b1b1b;
   padding:40px 0;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    position:relative;
    top:100px;
    bottom:0;
}

.container-mano {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom:0;
}

.footer-col-mano {
    flex-basis: 30%;
    margin-bottom: 20px;
}

.footer-col-mano h4 {
    font-size: 18px;
    font-weight: 600;
    color: #e91e63;
    margin-bottom: 20px;
}

.footer-col-mano ul {
    list-style-type: none;
    padding: 0;
}

.footer-col-mano ul li a {
    color: #fff;
    text-decoration: none;
    margin-bottom: 10px;
    display: block;
    transition: color 0.3s;
}

.footer-col-mano ul li a:hover {
    color: #e91e63;
}

.social-links-mano a {
    color: #fff;
    font-size: 18px;
    margin-right: 15px;
    transition: color 0.3s;
}

.social-links-mano a:hover {
    color: #e91e63;
}

.footer-copy-mano {
    text-align: center;
    margin-top: 20px;
    color: #fff;
    font-size: 14px;
}

@media (max-width: 768px) {
    .footer-col-mano {
        flex-basis: 100%;
        text-align: center;
    }

    .footer-copy-mano {
        margin-top: 30px;
    }
}

    </style>
</div>





<?php include('includes/footer.php');?>
