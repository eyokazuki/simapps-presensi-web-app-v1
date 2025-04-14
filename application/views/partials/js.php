<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Vendor JS Files -->
<script src="<?= base_url(); ?>assets/vendor/jquery-3.6.3.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= base_url(); ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/quill/quill.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/vendor/tinymce/tinymce.min.js"></script> -->
<script src="<?= base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/vendor/select2/dist/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="<?php echo base_url(); ?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Cleave JS -->
<script src="<?php echo base_url(); ?>assets/vendor/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/cleave-js/dist/addons/cleave-phone.us.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script>
  $(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
  });

  $(".logout").click(function() {
    window.location.href = "<?php echo base_url() ?>login/logout";
  });

  $(".nav-menu").addClass("collapsed");
  $(".nav-content").removeClass("show");
  $(".collapse_menu").removeClass("active");

  $(".<?php echo $breadcumb_menu; ?>").removeClass("collapsed");
  $(".<?php echo $breadcumb_parent; ?>").removeClass("collapsed");
  $(".nav-content.<?php echo $breadcumb_parent; ?>").addClass("show");
  $(".collapse_menu.<?php echo $breadcumb_menu; ?>").addClass("active");

  $("#changePasswordModal").on("shown.bs.modal", function() {
    $(".change-pass").val("");
  });

  // $(".submitChangePassword").click(function() {
  //   $("#formchangepass").submit();
  // });

  $("#formchangepass").submit(function(e) {
    e.preventDefault();
    loadingShow();
    $("#changePasswordModal").modal("hide");
    var postData = $(this).serializeArray();
    postData.push({
      name: "<?php echo csrf_name(); ?>",
      value: $("#_token_").val(),
    });

    $.ajax({
      url: "<?php echo base_url(); ?>login/change_pass",
      type: "POST",
      data: postData,
      dataType: "JSON",
      success: function(data, status, xhr) {
        generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
        if (data.kode != 1) {
          setTimeout(function() {
            $("#changePasswordModal").modal("show");
          }, 500);
        }
        loadingHide();
        swal(data.header, data.response, data.tipenotif);
      },
      error: function(response) {
        invalid_token(response);
        setTimeout(function() {
          $("#changePasswordModal").modal("show");
        }, 500);
        loadingHide();
        swal("Gagal", "Password gagal diupdate", "error");
      },
    });
  });

  function loadingShow() {
    $("#loadingModal").modal("show");
  }

  function loadingHide() {
    setTimeout(function() {
      $("#loadingModal").modal("hide");
    }, 500);
  }

  $("#swal-7").click(function() {
    swal("Good Job", "You clicked the button!", "success");
  });

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
</script>
</body>

</html>