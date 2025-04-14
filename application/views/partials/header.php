<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $nama_menu . " - " . "Simenggaris"; ?></title>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/tabler-icons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/flag-icons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/node-waves/node-waves.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/swiper/swiper.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/select2/select2.css'); ?>" />
    <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->



    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/cards-advance.css') ?>" />

    <!-- Spinkit -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/spinkit/spinkit.css'); ?>" />

    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/sweetalert2/sweetalert2.css'); ?>" /> -->
    <style>
        .swal-modal {
            background-color: #2f3349;
        }

        .swal-title,
        .swal-text {
            color: #fff;
        }

        .swal-button.swal-button--confirm {
            background-color: #006cb8;
            border-color: #006cb8;
        }

        .swal-button.swal-button--cancel {
            background-color: #424659;
            color: #fff;
        }

        .swal-icon--success:after,
        .swal-icon--success:before {
            background: transparent;
        }

        .swal-icon--success__hide-corners {
            background: transparent;
        }
    </style>


    <!-- JQuery -->
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>


    <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
    <!-- Helpers -->
    <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url('assets/vendor/js/template-customizer.js') ?>"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/js/config.js') ?>"></script>
    <script src="<?= base_url('assets/js/dataTables.rowGroup.min.js') ?>"></script>

</head>
<!-- Layout -->
<?= $this->load->view('partials/layout'); ?>
<!-- Layout -->