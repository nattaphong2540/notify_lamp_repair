<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<<<<<<< HEAD
    <title>Register2</title>
=======
    <title>Register</title>
>>>>>>> parent of 0e3b51d... Initial commit
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('plugins/serein/') ?>vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('plugins/serein/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('plugins/serein/') ?>vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('plugins/serein/') ?>css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('plugins/serein/') ?>images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div>
                                <h1 class="text-center">Register</h1><br>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" id="signupForm" name="signupForm">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="firstname" name="firstname" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="lastname" name="lastname" placeholder="Password">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="button" id="registerButton" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Register!">
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account?
                                    <!-- <a href="login.html">Login</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('plugins/serein/') ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('plugins/serein/') ?>vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url('plugins/serein/') ?>js/off-canvas.js"></script>
    <script src="<?= base_url('plugins/serein/') ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('plugins/serein/') ?>js/template.js"></script>
    <script src="<?= base_url('plugins/serein/') ?>js/settings.js"></script>
    <script src="<?= base_url('plugins/serein/') ?>js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url('plugins/serein/') ?>js/form-validation.js"></script>
    <script src="<?= base_url('plugins/serein/') ?>js/bt-maxLength.js"></script>
    <!-- End custom js for this page-->

</body>
<script>
    $("#registerButton").click(function() {
        username = $("#username").val();
        email = $("#email").val();
        password = $("#password").val();
        firstname = $("#firstname").val();
        lastname = $("#lastname").val();
        if (username.length <= 0 || email.length <= 0 || password.length <= 0 || firstname.length <= 0 || lastname.length <= 0) {
            target = document.getElementById("username").parentElement;
            target.className += " has-danger";
            target.innerHTML += `<label id="username-error" class="error mt-2 text-danger" for="email">Username Required, Please Fill out</label>`
        } else {

        }
    });
</script>

</html>