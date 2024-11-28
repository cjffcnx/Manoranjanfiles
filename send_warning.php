<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Load PHPMailer

if (isset($_POST['user_email'])) {
    $user_email = $_POST['user_email'];

    // PHPMailer code to send the warning
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                       
        $mail->SMTPAuth = true;                               
        $mail->Username = 'manoranjaninproject@gmail.com';    
        $mail->Password = 'grzrfaffrwngabwz';               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        $mail->Port = 587;

        $mail->setFrom('manoranjaninproject@gmail.com', 'Manoranjan Admin');
        $mail->addAddress($user_email);  

        $mail->isHTML(true);
        $mail->Subject = 'Warning Regarding Your Comment';
        $mail->Body    = 'This is a warning regarding your comment that was reported. Please follow community guidelines.';

        $mail->send();
        echo "Warning email sent!";
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
