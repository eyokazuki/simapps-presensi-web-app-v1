<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $aplikasi; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= $gambar; ?>" rel="icon">
    <link href="<?= $gambar; ?> rel=" apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style-mod.css" rel="stylesheet">
</head>

<body>
    <main style="background-image: url('assets/img/background.jpg');">
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row d-flex flex-column align-items-center justify-content-center">
                        <div class="col-lg-8 col-md-10 col-xs-12">
                            <div class=" card login-card mb-3">
                                <div class="row no-gutters" style="min-height:600px;max-height:600px">
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <h5 class="card-title text-center pb-0 fs-2">
                                                    <a href="<?= base_url(); ?>" class="logos text-center">
                                                        <img src="<?= $image; ?>" alt="Logo" class="logo-aplikasi">
                                                    </a>
                                                </h5>
                                                <h5 class="card-title text-center pb-0 fs-4">SISTEM INFORMASI</br><?= $title; ?></h5>
                                            </div>
                                            <div class="row d-flex flex-column align-items-center justify-content-center">
                                                <div class=" col-md-10 mt-4">
                                                    <form method="POST" action="<?= base_url(); ?>login/action" class="row g-3 needs-validation" novalidate>
                                                        <?php
                                                        if ($this->session->flashdata("message")) {
                                                        ?>
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <div class="alert-title">Peringatan</div>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                <div class="alert-body alert-text">
                                                                    <?= $this->session->flashdata("message"); ?>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="col-12 mb-1">
                                                            <label for="yourUsername" class="form-label">Username</label>
                                                            <input type="hidden" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>">
                                                            <input type="text" name="username" class="form-control" id="username" required>
                                                            <div class="invalid-feedback">Masukkan username anda!</div>
                                                        </div>

                                                        <div class="col-12 mb-1">
                                                            <label for="yourPassword" class="form-label">Password</label>
                                                            <input type="password" name="password" class="form-control" id="password" required>
                                                            <div class="invalid-feedback">Masukkan password anda!</div>
                                                        </div>

                                                        <div class="col-12 mb-1">
                                                            <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                                                        </div>

                                                        <div class="col-12">
                                                            <button class="btn btn-primary w-100" type="submit">Masuk</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-card-image">
                                        <img src="<?= base_url(); ?>assets/img/image-kla.png" alt="image-login" class="login-card-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center text-copyright">
                        Copyright &copy; 2023 DISKOMINFO KAB. GRESIK
                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        document.getElementById("username").focus();
    </script>

</body>

</html>