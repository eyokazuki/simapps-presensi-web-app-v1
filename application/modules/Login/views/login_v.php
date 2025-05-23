<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/'); ?>" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | Simenggaris</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico'); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/tabler-icons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/flag-icons.css'); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css'); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css'); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/node-waves/node-waves.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/toastr/toastr.css'); ?>" />

    <!-- Vendor -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css'); ?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/page-auth.css'); ?>" />

    <!-- JQuery -->
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>

    <!-- Helpers -->
    <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url('assets/vendor/js/template-customizer.js'); ?>"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>

    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center" id="particles-js">
                    <!-- <img src="<?= base_url('assets/img/illustrations/auth-login-illustration-light.png" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" data-app-light-img="illustrations/auth-login-illustration-light.png" data-app-dark-img="illustrations/auth-login-illustration-d'); ?>ark.png" /> -->

                    <!-- <img src="<?= base_url('assets/img/illustrations/bg-shape-image-light.png" alt="auth-login-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-d'); ?>ark.png" /> -->
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Toast -->
                    <div class="bs-toast toast toast-ex animate__animated my-2 animate__tada fade animate__wobble animate__pulse animate__flash animate__heartBeat hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                        <div class="toast-header">
                            <i class="ti ti-bell ti-xs me-2 text-danger"></i>
                            <div class="me-auto fw-semibold">Peringatan</div>
                            <!-- <small class="text-muted">0 mins ago</small> -->
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= $this->session->flashdata("message"); ?>
                        </div>
                    </div>

                    <!-- Toast -->

                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="<?= base_url(); ?>" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#006cb8" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#006cb8" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1 fw-bold">Selamat Datang! 👋</br>JOB SIMENGGARIS</h3>
                    <p class="mb-4">Silahkan masuk ke dalam akun</p>

                    <form id="formAuthentication" class="mb-3" action="<?= base_url('login/action'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="hidden" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <!-- <a href="auth-forgot-password-cover.html"> -->
                                <!-- <small>Forgot Password?</small> -->
                                <!-- </a> -->
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                        </div>
                        <!-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div> -->
                        <button class="btn btn-primary d-grid w-100">Masuk</button>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>


    <!-- / Content -->

    <!-- Core JS -->

    <?php
    if ($this->session->flashdata("message")) {
    ?>
        <script>
            setTimeout(function() {
                $(".toast-ex").toast('show');
            }, 1000);
        </script>
    <?php
    }
    ?>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/libs/hammer/hammer.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/i18n/i18n.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/js/menu.js'); ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js'); ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/js/pages-auth.js'); ?>"></script>

    <!-- Particle JS -->
    <script src="<?= base_url('assets/vendor/libs/particles/particles.js'); ?>"></script>
    <!-- <script src="<?= base_url('assets/vendor/libs/particles/stats.js'); ?>"></script> -->
    <script src="<?= base_url('assets/vendor/libs/particles/app.js'); ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url('assets/vendor/libs/toastr/toastr.js'); ?>"></script>

</body>

</html>