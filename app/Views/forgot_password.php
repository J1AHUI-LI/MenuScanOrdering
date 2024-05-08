<!DOCTYPE html>
<html lang="en">
<?php include 'A_head.php'; ?>
<body>
    <?php include 'A_user_navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Password Reset</div>
                    <div class="card-body">
                        <p class="card-text">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                        <form action="<?= base_url('reset_password') ?>" method="post">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </form>
                        <div class="mt-3">
                            <a href="<?= base_url('login') ?>">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'A_footer.php'; ?>
    <!-- scripts here -->
    <?php include 'A_script.php'; ?>

</body>
</html>
