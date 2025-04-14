<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
		<!-- Website Analytics -->
		<div class="col-lg-12 mb-4">
			<div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="row">
							<div class="col-12">
								<h5 class="text-white mb-0 mt-2">
									<?= $nama_menu; ?>
								</h5>
								<small>Halaman Import Data Employee</small>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<!-- Projects table -->
		<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
			<div class="card">
				<div class="m-4">
					<!-- <form method="post" action="<?php echo base_url(); ?>employee_import/export">
                            <input type="submit" name="export"  class="btn btn-primary btn-sm"value="Export" />
                        </form> -->
					<button class="btn btn-primary btn-sm" onclick="download_template()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah jabatan'>
						<i class="ti ti-download"></i> &nbsp;Download Template Employee&nbsp;&nbsp;
					</button>
					<button class="btn btn-primary btn-sm" onclick="upload_template()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah jabatan'>
						<i class="ti ti-upload"></i> &nbsp;Upload Template Employee&nbsp;&nbsp;
					</button>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">

				</div>
			</div>
		</div>
		<!--/ Projects table -->
	</div>
</div>
<!-- / Content -->
<!-- Modal Form -->
<div class="modal fade" id="ModalForm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="header_title">Form</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form class="needs-validation was-validated" id="form_modal" method="POST" novalidate="">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Template Employee</label>
								<input class="form-control" type="file" name='dokumen' id="dokumen" Placeholder="File" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label id='info-keterangan'></label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-label-secondary btn-sm" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-sm submit" type="submit">
						<div class="spinner-border d-none" id="loading-export"></div>
						<span id="notLoading">Simpan</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal Form -->

<?php $this->load->view('partials/footer'); ?>

<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				"<?php echo csrf_name(); ?>": $("#_token").val()
			}
		});

		$('[data-toggle="tooltip"]').tooltip();

		$("#form_modal").submit(function(event) {
			event.preventDefault();
			swal({
					title: "Konfirmasi",
					text: "Yakin ingin mengimport data employee ?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((isConfirm) => {
					if (isConfirm) {
						// loadingShow();
						$("#notLoading").addClass("d-none");
						$("#loading-export").removeClass("d-none");
						$.ajax({
							url: "employee_import/simpandokumenberkas",
							type: "post",
							data: new FormData(this),
							processData: false,
							contentType: false,
							cache: false,
							async: false,
							dataType: "JSON",
							success: function(data) {
								if (data.status == 'Sukses') {
									// TabelJabatanAkademik.ajax.reload(null, false);
									$('#info-keterangan').html(data["ket"]);
									$('#ModalForm').modal('hide');
								} else {
									$('#info-keterangan').html('<font color="red">' + data["ket"] + '</font>');
								}
							}
						});
						$("#notLoading").removeClass("d-none");
						$("#loading-export").addClass("d-none");
					}
				});
		});

	});

	function download_template() {
		var form = $('<form action="employee_import/export" method="post"></form>');
		$('body').append(form);
		$(form).submit();
	}

	function upload_template() {
		$("#header_title").html("Form Upload Data Employee");
		$("#ModalForm").modal("show");
	}
</script>