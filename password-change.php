<?php
session_start();


$page_title="Password Change Update";
include('includes/header.php');
include('includes/navbar.php');

?>
<div class="py-5">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

            <?php

if(isset($_SESSION['status'])): ?>
    <div class="alert alert-success">
        <h4><?= $_SESSION['status']; ?></h4>
        <?php unset($_SESSION['status']); ?>
    </div>
<?php endif; ?>




                <div class="card shadow">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="password-reset-code.php" method="POST" autocomplete="off">
         <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])) { echo $_GET['token']; } ?>">                  
                          
                          
                           <div class="form-group mb-3">
                  <label for="email">Email Address</label>  
                  <input type="email" value="<?php if(isset($_GET['email'])) { echo $_GET['email']; } ?>" name="email" class="form-control">

                           </div>

                           <div class="form-group mb-3">
                  <label for="password">New Password</label>  
                  <input type="password" name="new_password"  class="form-control">        
                           </div>
                           <div class="form-group mb-3">
                  <label for="password">Confirm Password</label>  
                  <input type="password" name="confirm_password"  class="form-control">        
                           </div>

                           <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="password_update">Update Password</button>
                            
                           </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>