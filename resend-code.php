<?php
session_start();
include('dbcon.php');

// Load Composer's autoloader for PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Function to send the verification email
function sendemail_verify($name, $email, $verify_token){
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
        $mail->addAddress($email);                                  //Add the recipient

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Email Verification for Manoranjan';
        $email_template = "
            <h2>Hello $name,</h2>
            <h5>Thank you for registering with Manoranjan. Please verify your email address using the link below:</h5>
            <br/>
            <a href='http://localhost/projectsocialmedia/verify-email.php?token=$verify_token'>Click here to verify your email</a>
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


if(isset($_POST['resend_email_verify_btn']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0)
        {
            $row = mysqli_fetch_array($check_email_query_run);

            // If the email is not yet verified
            if($row['verify_status'] == 0)
            {
                $name = $row['name'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];
                
                // Resend verification email
                resend_email_verify($name, $email, $verify_token);
                $_SESSION['status'] = "Verification email link has been sent to your email address";
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Email already verified. Please login";
                header("Location: resend-email-verification.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Email is not registered. Please register now";
            header("Location: register.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Please enter the email field";
        header("Location: resend-email-verification.php");
        exit(0);
    }
}
?>
