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
								<small>Halaman Setting Notifikasi</small>
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
							<button class="btn btn-primary btn-sm" onclick="tambah_notifikasi()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah notifikasi'>
								<i class="ti ti-pencil-plus"></i> &nbsp;Jadwal Notifikasi&nbsp;&nbsp;
							</button>
							<button class="btn btn-primary btn-sm" onclick="kirim_notifikasi()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Kirim notifikasi'>
								<i class="ti ti-send"></i> &nbsp;Kirim Notifikasi&nbsp;&nbsp;
							</button>
							<button class="btn btn-primary btn-sm" onclick="custom_notifikasi()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Custom notifikasi'>
								<i class="ti ti-edit"></i> &nbsp;Custom Notifikasi&nbsp;&nbsp;
							</button>
						</h5>
					<?php
					}
					?>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_notifikasi" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">Waktu</th>
								<th class="text-center">Alarm</th>
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
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="header_title">Form</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form id="form_modal" method="POST" novalidate="">
				<input type="hidden" class="form-control add-banner" id="tipe" name="tipe" required>
				<input type="hidden" class="form-control add-banner" id="id" name="id" required>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="control-label">Waktu</div>
								<input type="time" style="width:100%" class="form-control" id="time" name="time">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="control-label">Alarm</div>
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="alarm" name="alarm" checked required>
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

<!-- Modal Form Custom -->
<div class="modal fade" id="ModalFormCustom" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="header_title_custom">Form Custom Notifikasi</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form id="form_notification_custom" method="POST" novalidate="">
				<input type="hidden" class="form-control add-banner" id="tipe" name="tipe" value="custom" required>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="control-label">Judul</div>
								<input type="text" style="width:100%" class="form-control" id="title" name="title">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="control-label">Alarm</div>
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="alarm" name="alarm" required>
									<label class="form-check-label">Aktif</label>
								</div>
							</div>
						</div>
						<div class="col-sm-12 mt-3">
							<div class="form-group">
								<div class="control-label">Pesan</div>
								<textarea class="form-control" name="msg" id="msg"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-label-secondary btn-sm" type="button" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-primary btn-sm submit" type="submit">Kirim <i class="ti ti-send ti-sm"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal Form Custom-->

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

		tabel_notifikasi();

		$('#ModalForm').on('shown.bs.modal', function() {
			$('#code').focus();
			setTimeout(function() {}, 500);
		});

		$(document).on('select2:open', () => {
			document.querySelector('.select2-search__field').focus();
		});

	});

	function tabel_notifikasi() {
		var t = $('#tabel_notifikasi')
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
					"url": "notifikasi/tabel_notifikasi",
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
						"targets": [0, 1, 2, 3],
						"className": "text-center"
					}
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
				title: "Hapus jadwal notifikasi?",
				text: "Yakin ingin hapus jadwal notifikasi ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "notifikasi/hapus_notifikasi",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_notifikasi();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "notifikasi gagal dihapus", "error");
						}
					});
				}
			});
	}

	function kirim_notifikasi() {
		swal({
				title: "Kirim Notifikasi?",
				text: "Yakin ingin mengirim notifikasi ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "notifikasi/kirim_notifikasi",
						type: "POST",
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							swal("Sukses !", "Notifikasi berhasil dikirim", "success");
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "Notifikasi gagal dikirim", "error");
						}
					});
				}
			});
	}

	function custom_notifikasi() {
		loadingShow()
		loadingHide();
		$("#ModalFormCustom").modal("show");
	}

	function detail_notifikasi(id) {
		loadingShow();
		$.ajax({
			url: "notifikasi/detail_notifikasi",
			type: "POST",
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				loadingHide();
				$("#header_title").html("Form Update Jadwal Notifikasi");
				$("#time").val(data.time_notif);
				$("#tipe").val("2");
				$("#id").val(id);

				if (data.with_alarm == 1) {
					$("#alarm").prop("checked", true);
				} else {
					$("#alarm").prop("checked", false);
				}

				$("#ModalForm").modal("show");
			},
			error: function(response) {
				invalid_token(response);
				loadingHide();
			}
		});
	}

	function tambah_notifikasi() {
		loadingShow()
		loadingHide();
		$("#tipe").val("1");
		$("#header_title").html("Form Tambah Jadwal Notifikasi");
		$("#ModalForm").modal("show");
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "notifikasi/simpan_notifikasi",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					tabel_notifikasi();
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
					swal("Gagal", "notifikasi gagal ditambahkan", "error");
				} else {
					swal("Gagal", "notifikasi gagal diupdate", "error");
				}
			}
		});
	});

	$("#form_notification_custom").submit(function(e) {
		e.preventDefault();
		$("#ModalFormCustom").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "notifikasi/kirim_notifikasi",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, status, xhr) {
				tabel_notifikasi();
				loadingHide();
				swal("Sukses !", "Notifikasi berhasil dikirim", "success");
			},
			error: function(response) {
				invalid_token(response);
				setTimeout(function() {
					$("#ModalFormCustom").modal("show");
				}, 500);
				loadingHide();
				if ($("#tipe").val() == 1) {
					swal("Gagal", "notifikasi gagal ditambahkan", "error");
				} else {
					swal("Gagal", "notifikasi gagal diupdate", "error");
				}
			}
		});
	});
</script>
