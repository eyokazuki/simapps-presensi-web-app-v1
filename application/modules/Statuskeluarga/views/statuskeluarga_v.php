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
								<small>Halaman List Status Keluarga</small>
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
				<div class="mt-4">
					<?php
					if ($create_akses) {
					?>
						<h5 class="card-title">
							<button class="btn btn-primary btn-sm" onclick="tambah_status_keluarga()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah status_keluarga'>
								<i class="ti ti-pencil-plus"></i> &nbsp;Status Keluarga&nbsp;&nbsp;
							</button>
						</h5>
					<?php
					}
					?>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_status_keluarga" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">Status Keluarga</th>
								<th class="text-center">Kode</th>
								<th class="text-center">Tipe</th>
								<th class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
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
						<div class="col-lg-6">
							<div class="form-group">
								<label>Status Keluarga</label>
								<input type="hidden" class="form-control add-status_keluarga" id="tipe" name="tipe" required>
								<input type="hidden" class="form-control add-status_keluarga" id="id" name="id" required>
								<input type="text" class="form-control add-status_keluarga" id="status_keluarga" name="status_keluarga" placeholder="Status Keluarga" maxlength="100" required>
								<small class="form-text text-muted">
								Status Keluarga harus diisi dan maksimal 100 karakter.
								</small>
								<div class="invalid-feedback">
								Status Keluarga harus diisi
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">Kode</div>
								<input type="text" class="form-control add-status_keluarga" id="kodestatus" name="kodestatus" placeholder="Kode" maxlength="10" required>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">Tipe</div>
								<input type="text" class="form-control add-status_keluarga" id="type" name="type" placeholder="Tipe" maxlength="10" required>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">Status</div>
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="aktif" name="aktif" checked required>
									<label class="form-check-label">Aktif</label>
								</div>
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

		$('[data-toggle="tooltip"]').tooltip();

		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd": oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
				"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
			};
		};

		tabel_status_keluarga();

		$('#ModalForm').on('shown.bs.modal', function() {
			$('#status_keluarga').focus();
			setTimeout(function() {}, 500);
		});

	});


	function tabel_status_keluarga() {
		var t = $('#tabel_status_keluarga')
			.off('click ')
			.on('xhr.dt', function(e, settings, json, xhr) {
				generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
			})
			.dataTable({
				'responsive': true,
				'paging': true,
				'destroy': true,
				'processing': true,
				"language": {
					"processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
				},
				'serverSide': true,
				'ajax': {
					"url": "statuskeluarga/tabel_status_keluarga",
					"type": "POST",
					"dataType": "JSON",
					"error": function(response) {
						invalid_token(response);
					}
				},
				"columnDefs": [{
						"searchable": false,
						"orderable": true,
						"width": 20,
						"targets": 0
					},
					{
						"width": 100,
						"targets": 1
					},
					{
						"targets": [0,1,3,4,5],
						"className": "text-center"
					},
					{
						"width": 10,
						"targets": [3,4,5]
					},
				],
				// 'scrollX'       : true,
				'lengthChange': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': false,
				// "pageLength"    : 1,
				"rowCallback": function(row, data, iDisplayIndex) {
					var info = this.fnPagingInfo();
					var page = info.iPage;
					var length = info.iLength;
					var index = page * length + (iDisplayIndex + 1);
					$('td:eq(0)', row).html(index);
				}
			});
	}

	function hapus(id) {
		swal({
				title: "Hapus Status Keluarga?",
				text: "Yakin ingin hapus Status Keluarga ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "statuskeluarga/hapus_status_keluarga",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_status_keluarga();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "Status Keluarga gagal dihapus", "error");
						}
					});
				}
			});
	}

	function detail_status_keluarga(id) {
		$(".add-status_keluarga").val('');
		loadingShow();
		$.ajax({
			url: "statuskeluarga/detail_status_keluarga",
			type: "POST",
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				loadingHide();
				$("#status_keluarga").val(data.status_keluarga);
				$("#header_title").html("Form Update Status Keluarga");
				$("#type").val(data.type);
				$("#kodestatus").val(data.kodestatus);
				$("#tipe").val("2");
				$("#id").val(id);
				if (data.aktif == 1) {
					$("#aktif").prop("checked", true);
				} else {
					$("#aktif").prop("checked", false);
				}
				$("#ModalForm").modal("show");
			},
			error: function(response) {
				invalid_token(response);
				loadingHide();
				console.log(response);
			}
		});
	}

	function tambah_status_keluarga() {
		loadingShow()
		loadingHide();
		$(".add-status_keluarga").val("");
		$("#aktif").prop("checked", true);
		$("#tipe").val("1");
		$("#header_title").html("Form Tambah Status Keluarga");
		$("#ModalForm").modal("show");
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "statuskeluarga/simpan_status_keluarga",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					tabel_status_keluarga();
				} else {
					setTimeout(function() {
						$("#ModalForm").modal("show");
					}, 500);
				}
				loadingHide();
				swal(data.header, data.response, data.tipenotif);
			},
			error: function(response) {
				invalid_token(response);
				setTimeout(function() {
					$("#ModalForm").modal("show");
				}, 500);
				loadingHide();
				if ($("#tipe").val() == 1) {
					swal("Gagal", "Status Keluarga gagal ditambahkan", "error");
				} else {
					swal("Gagal", "Status Keluarga gagal diupdate", "error");
				}
			}
		});
	});
</script>