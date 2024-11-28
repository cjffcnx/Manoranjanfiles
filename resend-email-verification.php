<?php
session_start();

$page_title="Login Form";
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
                        <h5>Resend Email Verification</h5>
                    </div>
                    <div class="card-body">
                        <form action="resend-code.php" method="post" autocomplete="off">
                            <label >Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address">
                            <div class="form-group mb-3">
                                <button  type="submit" name="resend_email_verify_btn" class="btn btn-primary mt-3 p-2">Give me code</button>
                            </div>
                        </div>

                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>