<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
                                <h1 class="text-center">Login</h1><br>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="InputUsername" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="InputPassword" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="button" id="loginButton" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
</body>

</html>
<script>
    $("#loginButton").click(function() {
        var username = $("#InputUsername").val();
        var password = $("#InputPassword").val();
        $.ajax({
            type: 'POST',
            url: "<?= site_url("/login/login") ?>",
            data: {
                username: username,
                password: password
            },
            dataType: "text",
            success: function(resultData) {
                userDetail = JSON.parse(resultData);
                if (userDetail.status) {
                    swal(userDetail.msg, "ใส่ถูกละนะค้าบ", "success").then(value => {
                        window.location = "<?php echo site_url("product/show_product"); ?>"
                    });
                } else {
                    swal(userDetail.msg, "ควย มึงใส่ดีๆดิ๊ไอ้สัส", "error");
                }
            },
        })
    });

    // function signInButton() {
    //     var Username = $("#InputUsername").val();
    //     var Password = $("#InputPassword").val();
    //     var showData = $.ajax({
    //         type: 'POST',
    //         url: "<?= site_url("/login/show_user_editForm") ?>",
    //         data: {
    //             Username: Username,
    //             Password: Password
    //         },
    //         dataType: "text",
    //         success: function(resultData) {
    //             userDetail = JSON.parse(resultData);
    //         }
    //     })
</script>