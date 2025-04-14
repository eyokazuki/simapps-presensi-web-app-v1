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
								<small>Halaman List Banner</small>
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
							<button class="btn btn-primary btn-sm" onclick="tambah_banner()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah banner'>
								<i class="ti ti-pencil-plus"></i> &nbsp;banner&nbsp;&nbsp;
							</button>
						</h5>
					<?php
					}
					?>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_banner" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">File Banner</th>
								<th class="text-center">Status</th>
								<th class="text-center">No Urut</th>
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
			<form id="form_modal" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
			<!-- <form class="needs-validation was-validated" id="form_modal" method="POST" enctype="multipart/form-data"> -->
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-10">
							<div class="form-group">
								<label>banner</label>
								<input type="hidden" class="form-control add-banner" id="tipe" name="tipe" required>
								<input type="hidden" class="form-control add-banner" id="id" name="id" required>
								<input type="file" class="form-control add-banner" id="file_location" name="file_location" placeholder="file_location" required>
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
					<br/>
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">No Urut</div>
								<input type="number" class="form-control" id="no_urut" name="no_urut" required>
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

<div class="modal fade" id="ModalFormNoEdit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="header_title_no_urut">Form</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form id="form_no_urut" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
			<!-- <form class="needs-validation was-validated" id="form_modal" method="POST" enctype="multipart/form-data"> -->
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">No Urut</div>
								<input type="hidden" class="form-control" id="id_no_urut" name="id" required>
								<input type="number" class="form-control" id="no_urut_edit" name="no_urut" required>
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

<?php $this->load->view('partials/footer'); ?>

<script>
	let maxNoUrut = <?= $maxNoUrut; ?>;
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

		tabel_banner();

		$('#ModalForm').on('shown.bs.modal', function() {
			$('#banner').focus();
			setTimeout(function() {}, 500);
		});

		$('#ModalFormNoEdit').on('shown.bs.modal', function() {
			$('#banner').focus();
			setTimeout(function() {}, 500);
		});

	});


	function tabel_banner() {
		var t = $('#tabel_banner')
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
					"url": "banner/tabel_banner",
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
						"targets": [0, 1, 3],
						"className": "text-center"
					}
				],
				// 'scrollX'       : true,
				"lengthMenu": [5,50,100],
				"pageLength": 5,

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
				title: "Hapus banner?",
				text: "Yakin ingin hapus banner ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "banner/hapus_banner",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_banner();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "banner gagal dihapus", "error");
						}
					});
				}
			});
	}

	function detail_banner(id) {
		$(".add-banner").val('');
		loadingShow();
		$.ajax({
			url: "banner/detail_banner",
			type: "POST",
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				loadingHide();
				//$("#file_location").val(data.file_location);
				$("#header_title").html("Form Update banner");
				$("#tipe").val("2");
				$("#id").val(id);
				if (data.aktif == 1) {
					$("#aktif").prop("checked", true);
				} else {
					$("#aktif").prop("checked", false);
				}
				$("#no_urut").val(data.no_urut);
				$("#ModalForm").modal("show");
			},
			error: function(response) {
				invalid_token(response);
				loadingHide();
				console.log(response);
			}
		});
	}

	function detail_banner_no_urut(id) {
		loadingShow();
		$.ajax({
			url: "banner/detail_banner",
			type: "POST",
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				loadingHide();
				//$("#file_location").val(data.file_location);
				$("#header_title_no_urut").html("Form Update No Urut");
				$("#id_no_urut").val(id);
				$("#no_urut_edit").val(data.no_urut);
				$("#ModalFormNoEdit").modal("show");
			},
			error: function(response) {
				invalid_token(response);
				loadingHide();
				console.log(response);
			}
		});
	}

	function tambah_banner() {
		loadingShow()
		loadingHide();
		$(".add-banner").val("");
		$("#aktif").prop("checked", true);
		$("#tipe").val("1");
		$("#no_urut").val(maxNoUrut);
		$("#header_title").html("Form Tambah banner");
		$("#ModalForm").modal("show");
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "banner/simpan_banner",
			type: "POST",
			data:new FormData(this),
			 processData:false,
			 contentType:false,
			 cache:false,
			 async:false,
			 dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					maxNoUrut = data.noUrut;
					tabel_banner();
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
					swal("Gagal", "banner gagal ditambahkan", "error");
				} else {
					swal("Gagal", "banner gagal diupdate", "error");
				}
			}
		});
	});

	$("#form_no_urut").submit(function(e) {
		e.preventDefault();
		$("#ModalFormNoEdit").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "banner/update_no_urut",
			type: "POST",
			data:new FormData(this),
			 processData:false,
			 contentType:false,
			 cache:false,
			 async:false,
			 dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					maxNoUrut = data.noUrut;
					tabel_banner();
				} else {
					setTimeout(function() {
						$("#ModalFormNoEdit").modal("show");
					}, 500);
				}
				loadingHide();
				swal(data.header, data.response, data.tipenotif);
			},
			error: function(response) {
				invalid_token(response);
				setTimeout(function() {
					$("#ModalFormNoEdit").modal("show");
				}, 500);
				loadingHide();
				if ($("#tipe").val() == 1) {
					swal("Gagal", "banner gagal ditambahkan", "error");
				} else {
					swal("Gagal", "banner gagal diupdate", "error");
				}
			}
		});
	});

	function cekthis(id) {
        console.log(id);
        var val = "0";

        if ($("#" + id).is(":checked")) {
            val = "1";
        }

        $.ajax({
            url: "banner/update_aktif",
            type: "POST",
            data: {
                id: id,
                value: val
            },
            dataType: "JSON",
            success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				tabel_banner();
			}
		});
	};

</script>