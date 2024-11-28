<?php
session_start();
include('dbcon.php');

if(isset($_POST['login_now_btn']))
{
    // Check if email and password fields are not empty
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);  // Plain text password for testing

        // Fetch user by email
        $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $row = mysqli_fetch_array($login_query_run);

            // Directly compare plain text password (only for testing)
            if($password == $row['password'])
            {
                // Check if the email is verified
                if($row['verify_status'] == 1)
                {
                    // Set authenticated session and redirect to the dashboard
                    $_SESSION['authenticated'] = TRUE;
                    $_SESSION['auth_user'] = [
                        'username' => $row['name'],
                        'phone'    => $row['phone'],
                        'email'    => $row['email'],
                    ];

                    $_SESSION['status'] = "You are logged in successfully";
                    header("Location: dashboard.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['status'] = "Please verify your email address to login";
                    header("Location: login.php");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "Invalid email or password";
                header("Location: login.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "No account found with this email";
            header("Location: login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "All fields are mandatory";
        header("Location: login.php");
        exit(0);
    }
}
?>
