<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>
<!-- Content -->
<div style="position: absolute; width: 100vw; height: 100vh; z-index: 9999;top:0;left:0; display:flex; align-items: center;" class="bg-white d-none" id="loadingDownload">
	<i class="fa fa-spinner fa-spin fa-3x fa-fw mx-auto"></i><span class="sr-only">Loading...</span>
</div>
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
								<small>Halaman List Absensi Pegawai</small>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4">
			<?php
			$dt = date("Y-m-d");
			$startDate = date("Y-m-01", strtotime($dt));
			$endDate = date("Y-m-t", strtotime($dt));
			?>
			<div class="card p-4">
				<h5 class="card-title">Report Bulanan</h5>
				<form method="GET" action="#" class="d-flex flex-column flex-md-row gap-4 align-items-start align-items-md-end" id="formReportBulanan">
					<input type="hidden" name="idUser" id="idUser" value="<?= $idUser ?>">
					<div>
						<label>Tanggal Awal</label>
						<input type="date" name="startDate" id="startDate" placeholder="dd/mm/yyyy" value="<?= $startDate ?>" class="form-control" style="float: left;">
					</div>
					<div>
						<label>Tanggal Akhir</label>
						<input type="date" name="endDate" id="endDate" placeholder="dd/mm/yyyy" value="<?= $endDate ?>" class="form-control" style="float: left;">
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Download Report</button>
					</div>
				</form>
			</div>
		</div>

		<!-- Projects table -->
		<div class="col-12 col-xl-12 col-sm-12 order-2 order-lg-3 mb-4 mb-lg-0">
			<div class="card">
				<div class="mt-4 px-3">
					<?php
					if ($create_akses) {
					?>
						<h5 class="card-title">
							<button class="btn btn-primary btn-sm" onclick="tambah_detail_absensi_pegawai_lainnya()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah Absen'>
								<i class="ti ti-pencil-plus"></i> &nbsp;Absensi Pegawai&nbsp;&nbsp;
							</button>
							<a href="absensilainnya/report_manhours" class="btn btn-primary btn-sm" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Download Report Manhours'>
								<i class="ti ti-download"></i> &nbsp;Download Report Manhours&nbsp;&nbsp;
							</a>
						</h5>
					<?php
					}
					?>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_detail_absensi_pegawai_lainnya" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">Pegawai</th>
								<th class="text-center">Pegawai Lainnya</th>
								<th class="text-center">Aktif</th>
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
						<div class="col-lg-12">
							<div class="form-group">
								<label>Pegawai</label>
								<input type="hidden" class="form-control add-detail_absensi_pegawai_lainnya" id="tipe" name="tipe" required>
								<input type="hidden" class="form-control add-detail_absensi_pegawai_lainnya" id="id" name="id" required>
								<select type="text" style="width:100%" class="form-control select2 add-detail_absensi_pegawai_lainnya" id="id_employee" name="id_employee">
									<option value="">Pilih Pegawai</option>
								</select>
							</div>
						</div>
					</div>
					<div style="height: 10px;"></div>
					<div class="row">
						<div class="col-lg-9">
							<div class="form-group">
								<div class="control-label">Pegawai yang diabsenkan</div>
								<select type="text" style="width:100%" class="form-control select2 add-detail_absensi_pegawai_lainnya" id="id_employee_lainnya" name="id_employee_lainnya">
									<option value="">Pilih Pegawai yang diabsenkan</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<div class="control-label">Aktif</div>
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

<div class="" id="grafikContainer"></div>

<?php $this->load->view('partials/footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

		tabel_detail_absensi_pegawai_lainnya();

		$('#ModalForm').on('shown.bs.modal', function() {
			$('#detail_absensi_pegawai_lainnya').focus();
			setTimeout(function() {}, 500);
		});


		$("#id_employee").select2({
			dropdownParent: $("#ModalForm"),
			containerCssClass: "form-control",
			ajax: {
				url: 'absensilainnya/get_employee_modul',
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

		$("#id_employee_lainnya").select2({
			dropdownParent: $("#ModalForm"),
			containerCssClass: "form-control",
			ajax: {
				url: 'absensilainnya/get_employee_modul',
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

	});


	function tabel_detail_absensi_pegawai_lainnya() {
		var t = $('#tabel_detail_absensi_pegawai_lainnya')
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
					"url": "absensilainnya/tabel_detail_absensi_pegawai_lainnya",
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
						"targets": [0, 1],
						"className": "text-center"
					},
					{
						"targets": [2],
						"visible": false
					},
				],
				// 'scrollX'       : true,
				'lengthChange': true,
				'searching': true,
				'ordering': true,
				'order': [
					[2, 'ASC']
				],
				'info': true,
				'autoWidth': false,
				// "pageLength"    : 1,
				"rowCallback": function(row, data, iDisplayIndex) {
					var info = this.fnPagingInfo();
					var page = info.iPage;
					var length = info.iLength;
					var index = page * length + (iDisplayIndex + 1);
					$('td:eq(0)', row).html(index);
				},
				"rowGroup": {
					"dataSrc": 2
				}
			});
	}

	function hapus(id) {
		swal({
				title: "Hapus Absensi Pegawai?",
				text: "Yakin ingin hapus Absensi Pegawai ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "absensilainnya/hapus_detail_absensi_pegawai_lainnya",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, lokasi, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_detail_absensi_pegawai_lainnya();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "Absensi Pegawai gagal dihapus", "error");
						}
					});
				}
			});
	}


	function tambah_detail_absensi_pegawai_lainnya() {
		loadingShow()
		$(".add-detail_absensi_pegawai_lainnya").val("");
		$("#aktif").prop("checked", true);
		$("#tipe").val("1");
		$("#header_title").html("Form Tambah Absensi Pegawai");
		$("#ModalForm").modal("show");
		$("#id_employee").empty().append('<option value="">Pilih Pegawai</option>');
		$("#id_employee_lainnya").empty().append('<option value="">Pilih Pegawai yang diabsenkan</option>');
		loadingHide();
	}

	$("#formReportBulanan").submit(function(e) {
		e.preventDefault();
		// var postData = $(this).serializeArray();
		$("#loadingDownload").removeClass("d-none");
		$.ajax({
			url: `absensilainnya/report/bulanan?startDate=${$("#startDate").val()}&endDate=${$("#endDate").val()}&idUser=${$("#idUser").val()}`,
			type: "POST",
			// data: postData,
			// dataType: "JSON",
			success: async function(data, lokasi, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				$("#grafikContainer").html(data);
				const element = document.getElementById('grafikContainer');
				await html2pdf().from(element).save();
				$("#grafikContainer").html("");
				$("#loadingDownload").addClass("d-none");
			},
			error: function(response) {
				invalid_token(response);
			}
		});
	});

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "absensilainnya/simpan_detail_absensi_pegawai_lainnya",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, lokasi, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					tabel_detail_absensi_pegawai_lainnya();
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
					swal("Gagal", "Absensi Pegawai gagal ditambahkan", "error");
				} else {
					swal("Gagal", "Absensi Pegawai gagal diupdate", "error");
				}
			}
		});
	});
</script>