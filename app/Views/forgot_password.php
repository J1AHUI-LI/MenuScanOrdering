<!DOCTYPE html>
<html lang="en">
<?php include 'A_head.php'; ?>
<body>
    <?php include 'A_navbar.php'; ?>

    <!-- Forgot form -->
    <div class="centered-container">
        <div class="card text-center" style="width: 300px;">
            <div class="card-header h5 text-white bg-primary">Password Reset</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Enter your email address and we'll send you an email with instructions to reset your password.
                </p>
                <div class="form-outline">
                    <input type="email" id="typeEmail" class="form-control my-3" />
                    <label class="form-label" for="typeEmail">Email input</label>
                </div>
                <a href="#" class="btn btn-primary w-100">Reset password</a>
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="<?= base_url('login'); ?>">Login</a>
                    <a class="" href="<?= base_url('register'); ?>">Register</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of form -->

    <?php include 'A_footer.php'; ?>
    <!-- scripts here -->
    <?php include 'A_script.php'; ?>

</body>
</html>
