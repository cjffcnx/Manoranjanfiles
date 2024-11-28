<?php
$server="localhost";
$username="root";
$password="";
$dbname="messagestoresocial";

$con=mysqli_connect($server,$username,$password,$dbname);

if(!$con)
{
    echo "not connected";
}

// start to fetch data of html form to php to be assigned name in input
$name= $_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];


// To insert data into mysql
$sql="INSERT INTO `messagewala`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";

$result=mysqli_query($con,$sql);
if($result)
{
    echo "<script>alert('Thank you for your message. We will try to reach you out as soon as possible'); window.location.href='index.php';</script>";

    
}
else
{
    echo "<script>alert('You have submitted your response already. We will contact you soon'); window.location.href='index.php';</script>";
}


?>