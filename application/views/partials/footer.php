<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
            <div>
                ©
                2023
                <a href="https://uss.co.id/" target="blank" class="fw-semibold">PT. Utama Sinergi Sejati </a>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

<!-- Modal Logout -->
<div class="modal fade" id="logout-modal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Yakin keluar dari aplikasi ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika ingin keluar dari aplikasi sekarang..</div>
            <div class="modal-footer">
                <button class="btn btn-label-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary logout" href="#">Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Logout -->

<!-- LOADING MODAL -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog text-center" role="document" style="margin-top:200px">
        <div class="col-lg-12 offset-lg-6">
            <!-- Grid -->
            <div class="sk-grid sk-primary">
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
            </div>
        </div>
        <div class="col-lg-12 mt-2" style="padding-left:20px">
            <button class="btn btn-primary waves-effect waves-light" type="button" disabled="">
                <span class="spinner-grow me-1" role="status" aria-hidden="true"></span>
                Loading...
            </button>
        </div>

        <!-- <img src="<?= base_url(); ?>assets/img/spinner_transparent_color.gif" style="width: 150px;height: 150px"> -->
    </div>
</div>

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- Custom JS -->
<script>
    function tes() {
        $("#logout-modal").modal("show");
        // alert();
    }

    $(".logout").click(function() {
        window.location.href = "<?php echo base_url() ?>login/logout";
    });

    $(".menu-item").removeClass("active open");
    $(".nav-sub-menu").removeClass("active open");
    // $(".menu-toggle").removeClass("show");

    $(".<?php echo $breadcumb_menu; ?>").addClass("active open");
    $(".<?php echo $breadcumb_parent; ?>").addClass("active open");
    // $(".menu-toggle.<?php echo $breadcumb_parent; ?>").addClass("active open");


    function invalid_token(response) {
        if (response.status === 403) {

            setTimeout(function() {
                swal("Token Invalid", "", "error");
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }, 500);
        }
    }

    function generate_token(token) {
        // console.log(token);
        $("#_token").val(token);
        $("#_token_").val(token);
        $.ajaxSetup({
            headers: {
                "<?php echo csrf_name(); ?>": $("#_token").val()
            }
        });
    }

    function loadingShow() {
        $("#loadingModal").modal("show");
    }

    function loadingHide() {
        setTimeout(function() {
            $("#loadingModal").modal("hide");
        }, 500);
    }
</script>
<!-- Custom JS -->

<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js') ?>"></script>

<script src="<?= base_url('assets/vendor/libs/hammer/hammer.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/i18n/i18n.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/select2/select2.js'); ?>"></script>

<script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/swiper/swiper.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') ?>"></script>

<!-- Main JS -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<!-- Page JS -->
<script src="<?= base_url('assets/js/dashboards-analytics.js') ?>"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/vendor/libs/sweetalert/sweetalert.min.js'); ?>"></script>

</body>

</html>