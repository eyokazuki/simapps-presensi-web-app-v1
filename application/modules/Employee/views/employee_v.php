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
								<small>Halaman List employee</small>
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
							<button class="btn btn-primary btn-sm" onclick="tambah_employee()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah employee'>
								<i class="ti ti-pencil-plus"></i> &nbsp;Employee&nbsp;&nbsp;
							</button>
							<a href="/employee/excel" class="btn btn-primary btn-sm">
								<i class="ti ti-file"></i> &nbsp;Export Excel&nbsp;&nbsp;
							</a>
						</h5>
					<?php
					}
					?>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_employee" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">Code</th>
								<th class="text-center">Nama</th>
								<th class="text-center">NIK</th>
								<th class="text-center" NoWrapx>No Hp</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">Email</th>
								<th class="text-center">Tanggal Lahir</th>
								<th class="text-center">L/P</th>
								<th class="text-center">Company</th>
								<th class="text-center">Departemen</th>
								<th class="text-center">Jabatan</th>
								<th class="text-center">Section</th>
								<th class="text-center">Jabatan Atasan</th>
								<th class="text-center">Status</th>
								<th class="text-center">Aktif</th>
								<th class="text-center">Admin</th>
								<th class="text-center">Rotator</th>
								<th class="text-center">Created At</th>
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
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="header_title">Form</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form class="needs-validation was-validated" id="form_modal" method="POST" novalidate="">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">Code</div>
								<input type="text" class="form-control add-employee" id="code" name="code" placeholder="Code" maxlength="20" required>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="form-group">
								<label>Nama Employee</label>
								<input type="hidden" class="form-control add-employee" id="tipe" name="tipe" required>
								<input type="hidden" class="form-control add-employee" id="id" name="id" required>
								<input type="text" class="form-control add-employee" id="employee" name="employee" placeholder="Nama Employee" maxlength="100" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">NIK</div>
								<input type="text" class="form-control add-employee" id="nik" name="nik" placeholder="NIK" maxlength="100" required>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">No HP</div>
								<input type="text" class="form-control add-employee" id="hp" name="hp" placeholder="No HP" maxlength="20" required>
							</div>
						</div>
					</div>
					<div class="space space-8">&nbsp;</div>
					<div class="row">
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">Tanggal Lahir</div>
								<input type="date" class="form-control add-employee" id="lahir" name="lahir" placeholder="dd/mm/yyyy" required>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="form-group">
								<div class="control-label">Alamat</div>
								<input type="text" class="form-control add-employee" id="alamat" name="alamat" placeholder="Alamat" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">Email</div>
								<input type="text" class="form-control add-employee" id="email" name="email" placeholder="Email" required>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<div class="control-label">Jenis Kelamin</div>
								<table widtth='100%'>
									<tr>
										<td width='1%' NoWrap><label class="form-check-label">Male &nbsp;</label></td>
										<td width='1%' NoWrap>
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="jenis" name="jenis" required>
											</div>
										</td>
										<td width='1%' NoWrap>&nbsp;<label class="form-check-label">Female</label></td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="space space-8">&nbsp;</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<div class="control-label">Company</div>
								<select type="text" style="width:100%" class="form-select select2 add-employee" id="company" name="company">
									<option value="">Pilih Company</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group <?= $dataUser->id_departemen == 0 ? 'd-none' : '' ?>">
								<div class="control-label">Departemen</div>
								<select type="text" style="width:100%" class="form-select select2" name="<?= $dataUser->id_departemen == 0 ? '' : 'departemen' ?>">
									<option value="<?= $dataUser->id_departemen ?>" selected><?= $dataUser->departemen ?></option>
								</select>
							</div>
							<div class="form-group <?= $dataUser->id_departemen != 0 ? 'd-none' : '' ?>">
								<div class="control-label">Departemen</div>
								<select type="text" style="width:100%" class="form-select select2 add-employee" id="departemen" name="<?= $dataUser->id_departemen != 0 ? '' : 'departemen' ?>">
									<option value="">Pilih Departemen</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<div class="control-label">Jabatan</div>
								<select type="text" style="width:100%" class="form-select select2 add-employee" id="jabatan" name="jabatan">
									<option value="">Pilih Jabatan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="space space-8">&nbsp;</div>
					<div class="row">

						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">Section</div>
								<select type="text" style="width:100%" class="form-select select2 add-employee" id="section" name="section">
									<option value="">Pilih Section</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<div class="control-label">Jabatan Atasan</div>
								<select type="text" style="width:100%" class="form-select select2 add-employee" id="parent" name="parent">
									<option value="">Pilih Parent</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">Status</div>
								<select type="text" style="width:100%" class="form-select select2 add-employee" id="status" name="status">
									<option value="">Pilih Status</option>
								</select>
							</div>
						</div>


						<div class="col-lg-12 mt-4">
							<div class="row">
								<div class="col-1">
									<div class="form-group">
										<div class="control-label">Aktif</div>
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="aktif" name="aktif" checked required>
											<label class="form-check-label">Aktif</label>
										</div>
									</div>
								</div>
								<div class="col-1">
									<div class="form-group">
										<div class="control-label">Admin</div>
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" checked required>
											<label class="form-check-label">Admin</label>
										</div>
									</div>
								</div>
								<div class="col-1">
									<div class="form-group">
										<div class="control-label">Rotator</div>
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="is_rotator" name="is_rotator" required>
											<label class="form-check-label">Rotator</label>
										</div>
									</div>
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

		tabel_employee();

		$('#ModalForm').on('shown.bs.modal', function() {
			$('#code').focus();
			setTimeout(function() {}, 500);
		});

		$(document).on('select2:open', () => {
			document.querySelector('.select2-search__field').focus();
		});

	});

	$("#parent").select2({
		dropdownParent: $("#ModalForm"),
		containerCssClass: "form-control",
		ajax: {
			url: 'employee/get_jabatan_modul',
			type: "POST",
			dataType: 'json',
			delay: 200,
			data: function(params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});

	$("#section").select2({
		dropdownParent: $("#ModalForm"),
		containerCssClass: "form-control",
		ajax: {
			url: 'employee/get_parent_modul',
			type: "POST",
			dataType: 'json',
			delay: 200,
			data: function(params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function(response) {
				// console.log(response);
				return {
					results: [{
							id: '0',
							text: 'Tidak Ada Section'
						},
						...response
					]
				};
			},
			cache: true
		}
	});

	$("#jabatan").select2({
		dropdownParent: $("#ModalForm"),
		containerCssClass: "form-control",
		ajax: {
			url: 'employee/get_jabatan_modul',
			type: "POST",
			dataType: 'json',
			delay: 200,
			data: function(params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});

	$("#status").select2({
		dropdownParent: $("#ModalForm"),
		containerCssClass: "form-control",
		ajax: {
			url: 'employee/get_status_modul',
			type: "POST",
			dataType: 'json',
			delay: 200,
			data: function(params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});

	$("#company").select2({
		dropdownParent: $("#ModalForm"),
		containerCssClass: "form-control",
		ajax: {
			url: 'employee/get_company_modul',
			type: "POST",
			dataType: 'json',
			delay: 200,
			data: function(params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});

	$("#departemen").select2({
		dropdownParent: $("#ModalForm"),
		containerCssClass: "form-control",
		ajax: {
			url: 'employee/get_departemen_modul',
			type: "POST",
			dataType: 'json',
			delay: 200,
			data: function(params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});


	function tabel_employee() {
		var t = $('#tabel_employee')
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
					"url": "employee/tabel_employee",
					"type": "POST",
					"dataType": "JSON",
					"error": function(response) {
						invalid_token(response);
					}
				},
				"columnDefs": [{
						"searchable": false,
						"orderable": true,
						"width": "1%",
						"targets": [0, 1]
					},
					{
						"width": "1%",
						"targets": [2]
					},
					{
						"targets": [0, 1],
						"className": "text-center"
					},
					{
						"width": "2%",
						"targets": [4, 5, 9]
					},
					{
						"targets": [3],
						"className": "lurus"
					},
				],
				// 'scrollX'       : true,
				'lengthChange': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': false,
				'order': [
					[18, 'desc']
				],
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
				title: "Hapus employee?",
				text: "Yakin ingin hapus employee ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "employee/hapus_employee",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_employee();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "employee gagal dihapus", "error");
						}
					});
				}
			});
	}

	function resetPassword(id) {
		swal({
				title: "Reset Password?",
				text: "Yakin ingin mereset password employee ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "employee/reset_password",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_employee();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "employee gagal mereset password", "error");
						}
					});
				}
			});
	}

	function detail_employee(id) {
		$(".add-employee").val('');
		loadingShow();
		$.ajax({
			url: "employee/detail_employee",
			type: "POST",
			data: {
				id: id,
			},
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				loadingHide();
				$("#header_title").html("Form Update Employee");
				$("#employee").val(data.nama);
				$("#tipe").val("2");
				$("#id").val(id);
				if (data.aktif == 1) {
					$("#aktif").prop("checked", true);
				} else {
					$("#aktif").prop("checked", false);
				}
				if (data.is_admin == 1 || data.is_admin == "1") {
					$("#is_admin").prop("checked", true);
				} else {
					$("#is_admin").prop("checked", false);
				}
				if (data.jenis_kelamin == "P") {
					$("#jenis").prop("checked", true);
				} else {
					$("#jenis").prop("checked", false);
				}
				if (data.is_rotator == 1 || data.is_rotator == "1") {
					$("#is_rotator").prop("checked", true);
				} else {
					$("#is_rotator").prop("checked", false);
				}

				$("#code").val(data.code);
				$("#nik").val(data.nik);
				$("#hp").val(data.no_hp);
				$("#lahir").val(data.tanggal_lahir);
				$("#alamat").val(data.alamat);
				$("#email").val(data.email);
				// $("#parent").val(data.parent_position_id);
				// $("#section").val(data.position_id);
				// $("#jabatan").val(data.id_jabatan);
				// $("#status").val(data.id_employee_status);
				// $("#company").val(data.id_company);
				// $("#departemen").val(data.id_departemen);

				console.log('<option value="' + data.position_id + '"> ' + data.position_nm + ' </option>');
				$("#parent").empty().append('<option value="' + data.parent_position_id + '"> ' + data.parent_position_nm + ' </option>');
				$("#section").empty().append('<option value="' + data.position_id + '"> ' + data.position_nm + ' </option>');
				$("#jabatan").empty().append('<option value="' + data.id_jabatan + '"> ' + data.nm_jabatan + ' </option>');
				$("#status").empty().append('<option value="' + data.id_employee_status + '"> ' + data.nm_employee_status + ' </option>');
				$("#company").empty().append('<option value="' + data.id_company + '"> ' + data.nm_company + ' </option>');
				$("#departemen").empty().append('<option value="' + data.id_departemen + '"> ' + data.nm_departemen + ' </option>');

				$("#ModalForm").modal("show");
			},
			error: function(response) {
				invalid_token(response);
				loadingHide();
				console.log(response);
			}
		});
	}

	function tambah_employee() {
		loadingShow()
		loadingHide();
		$(".add-employee").val("");
		$("#aktif").prop("checked", true);
		$("#is_admin").prop("checked", false);
		$("#tipe").val("1");
		$("#header_title").html("Form Tambah Employee");
		$("#ModalForm").modal("show");
		$("#parent").empty().append('<option value="">Pilih Parent</option>');
		$("#section").empty().append('<option value="">Pilih Section</option>');
		$("#jabatan").empty().append('<option value="">Pilih Jabatan</option>');
		$("#status").empty().append('<option value="">Pilih Status</option>');
		$("#company").empty().append('<option value="">Pilih Company</option>');
		$("#departemen").empty().append('<option value="">Pilih Departemen</option>');
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "employee/simpan_employee",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					tabel_employee();
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
					swal("Gagal", "employee gagal ditambahkan", "error");
				} else {
					swal("Gagal", "employee gagal diupdate", "error");
				}
			}
		});
	});

	// function get_status_modul() {
	//     $.ajax({
	//         url: "employee/get_status_modul",
	//         type: "POST",
	//         success: function(data, status, xhr) {
	//             generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
	//             $("#status").html(data);
	//         },
	//         error: function(response) {
	//             invalid_token(response);
	//             console.log(response);
	//         }
	//     });
	// }

	// function get_jabatan_modul() {
	//     $.ajax({
	//         url: "employee/get_jabatan_modul",
	//         type: "POST",
	//         success: function(data, status, xhr) {
	//             generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
	//             $("#jabatan").html(data);
	//         },
	//         error: function(response) {
	//             invalid_token(response);
	//             console.log(response);
	//         }
	//     });
	// }

	// function get_parent_modul() {
	//     $.ajax({
	//         url: "employee/get_parent_modul",
	//         type: "POST",
	//         success: function(data, status, xhr) {
	//             generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
	//             $("#parent").html(data);
	//         },
	//         error: function(response) {
	//             invalid_token(response);
	//             console.log(response);
	//         }
	//     });
	// }

	// function get_section_modul() {
	//     $.ajax({
	//         url: "employee/get_parent_modul",
	//         type: "POST",
	//         success: function(data, status, xhr) {
	//             generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
	//             $("#section").html(data);
	//         },
	//         error: function(response) {
	//             invalid_token(response);
	//             console.log(response);
	//         }
	//     });
	// }    

	// function get_company_modul() {
	//     $.ajax({
	//         url: "employee/get_company_modul",
	//         type: "POST",
	//         success: function(data, status, xhr) {
	//             generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
	//             $("#company").html(data);
	//         },
	//         error: function(response) {
	//             invalid_token(response);
	//             console.log(response);
	//         }
	//     });
	// }

	// function get_departemen_modul() {
	//     $.ajax({
	//         url: "employee/get_departemen_modul",
	//         type: "POST",
	//         success: function(data, status, xhr) {
	//             generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
	//             $("#departemen").html(data);
	//         },
	//         error: function(response) {
	//             invalid_token(response);
	//             console.log(response);
	//         }
	//     });
	// }
</script>