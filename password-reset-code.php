<?php
session_start();
include('dbcon.php');

// Load Composer's autoloader for PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token){
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'manoranjaninproject@gmail.com';        //Your Gmail address
        $mail->Password   = 'grzrfaffrwngabwz';                     //Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to

        //Recipients
        $mail->setFrom('manoranjaninproject@gmail.com', 'Manoranjan');
        $mail->addAddress($get_email);                                  //Add the recipient

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Reset Password Notification for Manoranjan';
        $email_template = "
        <h2>Hello $name,</h2>
        <h5>You are receiving this email because we received a password reset request for your account</h5>
        <br/>
        <a href='http://localhost/projectsocialmedia/password-change.php?token=$token&email=$get_email'>Click here to reset your password</a>
    ";
    

        $mail->Body = $email_template;
        $mail->send();
    } catch (Exception $e) {
        // Log or handle the error here if needed
        $_SESSION['status'] = "Mailer Error: " . $mail->ErrorInfo;
    }
}

// Function to handle resending verification emails
function resend_email_verify($name, $email, $verify_token)
{
    // Call the send email function
    sendemail_verify($name, $email, $verify_token);
}




    



if(isset($_POST['password_reset_link']))
{
$email=mysqli_real_escape_string($con,$_POST['email']);
$token=md5(rand());
$check_email="SELECT * from users where email='$email' LIMIT 1";
$check_email_run=mysqli_query($con,$check_email);


if(mysqli_num_rows($check_email_run)>0)
{
$row=mysqli_fetch_array($check_email_run);
$get_name=$row['name'];
$get_email=$row['email'];

$update_token="UPDATE users SET verify_token='$token' where email='$get_email'LIMIT 1";
$update_token_run=mysqli_query($con,$update_token);

if($update_token_run){
send_password_reset($get_name,$get_email,$token);
$_SESSION['status']="We emailed you a password reset link";  
header("Location: password-reset.php");
exit(0); 
}
else
{
    $_SESSION['status']="Something went wrong. #1";  
    header("Location: password-reset.php");
    exit(0);  
}

}
else
{
  $_SESSION['status']="No email found";  
  header("Location: password-reset.php");
  exit(0);
}
}

if(isset($_POST['password_update']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
   
    $new_password=mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password=mysqli_real_escape_string($con,$_POST['confirm_password']);
    $token=mysqli_real_escape_string($con,$_POST['password_token']);

    if(!empty($token))
    {

if(!empty($email)&& !empty($new_password)&& !empty($confirm_password))
{
//checking token is valid or not
$check_token="SELECT * from users where verify_token='$token' LIMIT 1";
$check_token_run=mysqli_query($con,$check_token);

if(mysqli_num_rows($check_token_run)>0)
{

if($new_password==$confirm_password)
{
$update_password="UPDATE users SET password='$new_password' where verify_token='$token' LIMIT 1";
$update_password_run=mysqli_query($con,$update_password);


if($update_password_run)
{
    $new_token=md5(rand());
    $update_to_new_token="UPDATE users SET verify_token='$new_token' where verify_token='$token' LIMIT 1";
$update_to_new_token_run=mysqli_query($con,$update_to_new_token);
    $_SESSION['status']="New password successfully updated ";  
    header("Location:login.php ");
    exit(0); 
}
else
{
    $_SESSION['status']="Did not update password. Something went wrong ";  
    header("Location: password-change.php?token=$token&email=$email");
    exit(0); 
}
}
else
{
    $_SESSION['status']="Password and confirm password does not match ";  
    header("Location: password-change.php?token=$token&email=$email");
    exit(0); 
}

}
else
{
    $_SESSION['status']="Invalid token ";  
    header("Location: password-change.php?token=$token&email=$email");
    exit(0); 
}

}
else
{
    $_SESSION['status']="All fields are mandatory ";  
  header("Location: password-change.php?token=$token&email=$email");
  exit(0); 
}


    }
    else{
        $_SESSION['status']="NO TOKEN AVAIABLE";  
  header("Location: password-change.php");
  exit(0); 
    }
}

?>