<!DOCTYPE html>
<html lang="en">
<?php include 'A_head.php'; ?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light Navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url(''); ?>">
                <img src="<?= base_url('img/buns_logo.png'); ?>" alt="Logo" height="70" class="d-inline-block align-text-top">
                <span>MenuScanOrder</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!--  Register Form  -->
    <section class="register-form" style="min-height: 100vh;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <form style="width: 23rem;" method="post" action="<?= base_url('register'); ?>">
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example1" name="Username" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example3" name="Password" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example3">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" name="ConfirmPassword" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example4">Confirm Password</label>
                            </div>

                            <div class="mb-3">
                                <label for="userType" class="form-label">User Type:</label>
                                <select class="form-select" id="userType" name="Role">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Register</button>
                            </div>

                            <p class="small mb-5 pb-lg-2">
                                <a class="text-muted" >Already have an account?</a>
                                <a href="<?= base_url('login'); ?>" class="link-info">Log in</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="<?= base_url('img/register_bg1.jpg'); ?>"
                        alt="Register image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
    <!--  End of form  -->

    <?php include 'A_footer.php'; ?>
    <!-- scripts here -->
    <?php include 'A_script.php'; ?>
</body>
</html>
