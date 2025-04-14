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
								<small>Halaman Setting Alarm</small>
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
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_alert" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">Sound Alarm</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td class="text-center">
									<button class="btn btn-primary btn-sm" onclick="ubah_alarm()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Ubah suara alarm'>
										<i class="ti ti-edit"></i> &nbsp;Ubah&nbsp;&nbsp;
									</button>
								</td>
								<td class="text-center">
								<audio controls>
									<source src="<?= base_url('assets/audio/alarm.mp3'); ?>" type="audio/ogg">
									<source src="<?= base_url('assets/audio/alarm.mp3'); ?>" type="audio/mpeg">
									Your browser does not support the audio element.
									</audio>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--/ Projects table -->
	</div>
</div>
<!-- / Content -->

<!-- Modal Form -->
<div class="modal fade" id="ModalForm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="header_title">Form</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form id="form_modal" class="form-horizontal" method="POST" enctype="multipart/form-data">
				<input type="hidden" class="form-control add-banner" id="tipe" name="tipe" required>
				<input type="hidden" class="form-control add-banner" id="id" name="id" required>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="control-label">Upload File <small>(.mp3)</small></div>
								<input type="file" style="width:100%" class="form-control" id="file" name="file" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-label-secondary btn-sm" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-sm submit" type="submit">Simpan</button>
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
	});

	function ubah_alarm()
	{
		loadingShow()
		loadingHide();
		$("#tipe").val("1");
		$("#header_title").html("Form Ubah Suara Alarm");
		$("#ModalForm").modal("show");
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "notifikasi/simpan_alarm",
			type: "POST",
			data:new FormData(this),
			 processData:false,
			 contentType:false,
			 cache:false,
			 async:false,
			 dataType: "JSON",
			success: function(data, status, xhr) {
				loadingHide();
				swal(data.header, data.response, data.tipenotif);
			},
			error: function(response) {
				invalid_token(response);
				setTimeout(function() {
					$("#ModalForm").modal("show");
				}, 500);
				loadingHide();
				swal("Gagal", "alarm gagal diubah", "error");
			}
		});
	});
</script>
