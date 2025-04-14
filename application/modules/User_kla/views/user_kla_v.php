<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<title><?= $nama_menu . " - " . $title; ?></title>
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?= $nama_menu; ?></h1>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">
			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">
					<!-- Top Selling -->
					<div class="col-12">
						<div class="card top-selling overflow-auto">
							<div class="card-body pb-0">
								<?php
								if ($create_akses) {
								?>
									<h5 class="card-title">
										<button class="btn btn-primary btn-sm" onclick="tambahUser()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah User'>
											<i class="bi bi-plus-square"></i> &nbsp;USER&nbsp;&nbsp;
										</button>
									</h5>
								<?php
								}
								?>
								<div class="table">
									<input type="hidden" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
									<table id="tabel_user" class="table table-striped" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Nama</th>
												<th class="text-center">Username</th>
												<th class="text-center">Privilage</th>
												<th class="text-center">Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div><!-- End Top Selling -->

				</div>
			</div><!-- End Left side columns -->
		</div>

		<!-- Modal Form -->
		<div class="modal fade" id="ModalForm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
										<label>Nama</label>
										<input type="hidden" class="form-control add-user" id="tipe" name="tipe" required>
										<input type="hidden" class="form-control add-user" id="id" name="id" required>
										<input type="text" class="form-control add-user" id="nama" name="nama" placeholder="NAMA" maxlength="45" required>
										<small class="form-text text-muted">
											Nama harus diisi dan maksimal 45 karakter.
										</small>
										<div class="invalid-feedback">
											Nama harus diisi
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control add-user" id="username" name="username" placeholder="USERNAME" maxlength="45" required>
										<small class="form-text text-muted">
											Username harus diisi dan maksimal 45 karakter.
										</small>
										<div class="invalid-feedback">
											Username harus diisi
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control add-user" id="password" name="password" placeholder="PASSWORD">
										<small id="ket_pass" class="form-text text-muted">
										</small>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Privilege</label>
										<select type="text" class="form-control select2 add-user" style="width:100% !important;" id="privilege" name="privilege" required>
											<?php echo $optionPriv; ?>
										</select>
										<div class="invalid-feedback">
											Privilege harus diisi
										</div>
										<small class="form-text text-muted">
											Privilege harus dipilih.
										</small>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<div class="control-label">Status User</div>
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="aktif" name="aktif" checked required>
											<label class="form-check-label">Aktif</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">Batal</button>
							<button class="btn btn-primary btn-sm submit" type="submit">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</main><!-- End #main -->

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

		tabel_user();

		$('#ModalForm').on('shown.bs.modal', function() {
			$('#nama').focus();
			setTimeout(function() {}, 500);
		});

	});


	function tabel_user() {
		var t = $('#tabel_user')
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
					"url": "user_kla/tabel_user",
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
						"targets": 5
					},
					{
						"targets": [0, 3, 4, 5],
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
				title: "Hapus User?",
				text: "Yakin ingin hapus user ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "user_kla/hapus_user",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_user();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "User gagal dihapus", "error");
						}
					});
				}
			});
	}

	function detail_user(id) {
		loadingShow();
		$.ajax({
			url: "user_kla/detail_user",
			type: "POST",
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				loadingHide();
				$("#username").val(data.user);
				$("#nama").val(data.nama);
				$("#privilege").html(data.priv_data).select2({
					dropdownCssClass: "increasedzindexclass"
				});
				$("#ket_pass").html("Kosongi password jika tidak ingin merubah password.");
				$("#header_title").html("Form Update User");
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

	function tambahUser() {
		loadingShow()
		loadingHide();
		$(".add-user").val("");
		$(".select2").val("").select2({
			dropdownCssClass: "increasedzindexclass"
		});
		$("#aktif").prop("checked", true);
		$("#tipe").val("1");
		$("#header_title").html("Form Tambah User");
		$("#ket_pass").html("Jika dikosongi maka password default '12345'.");
		$("#ModalForm").modal("show");
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "user_kla/simpan_user",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					tabel_user();
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
					swal("Gagal", "User gagal ditambahkan", "error");
				} else {
					swal("Gagal", "User gagal diupdate", "error");
				}
			}
		});
	});
</script>