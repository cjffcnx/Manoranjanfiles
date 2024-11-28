<?php
session_start();

$page_title="Password Reset Form";
include('includes/header.php');
include('includes/navbar.php');
?>

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
                        <h5>Resend Password</h5>
                    </div>
                    <div class="card-body">
                    <form action="password-reset-code.php" method="post" autocomplete="off">
    <div class="card-body">
        <label>Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
        <div class="form-group mb-3">
            <button type="submit" name="password_reset_link" class="btn btn-primary mt-3 p-2">Send Password Reset Link</button>
        </div>
    </div>
</form>

                    </div>
            </div>
        </div>
    </div>
</div>