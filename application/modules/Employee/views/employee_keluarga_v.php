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
									<?= $dataEmployee->nama; ?>
								</h5>
                                <div class="text-white mb-0">
                                    <?= $dataEmployee->code; ?>
                                </div>
								<small>Halaman List Keluarga</small>
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
                    <h5 class="card-title">
                        <button class="btn btn-primary btn-sm" onclick="tambah_keluarga()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah keluarga'>
                            <i class="ti ti-pencil-plus"></i> &nbsp;Tambah Keluarga&nbsp;&nbsp;
                        </button>
                    </h5>
				</div>
				<div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_keluarga" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Aksi</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Status</th>
								<th class="text-center">Jenis Kelamin</th>
								<th class="text-center">Aktif</th>
								<th class="text-center"></th>
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
						<div class="col-lg-5">
							<div class="form-group">
								<label>Nama Keluarga</label>
								<input type="hidden" class="form-control" id="id" name="id">
								<input type="hidden" class="form-control" id="id_employee" name="id_employee" value="<?= $dataEmployee->id_employee ?>">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Keluarga" maxlength="100" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Status Keluarga</label>
								<select id="status_keluarga" name="status_keluarga" class="form-control" required>
									<?php
									foreach ($dataStatusKeluarga as $key => $value) {
										?>
										<option value="<?= $value->id_status_keluarga; ?>"><?= $value->status; ?></option>
										<?php
									}
									?>
								</select>
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
						<div class="col-lg-2">
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

		tabel_keluarga();

		$('#ModalForm').on('shown.bs.modal', function() {
			setTimeout(function() {}, 500);
		});
		$(".btn-edit").on("click", function(e){
			alert("hai");
		});
	});

	document.addEventListener("click", function(e){
		if (e.target.classList.contains("btn-edit")){
			const data = e.target.dataset;
			console.log(data);
			detail(data.id, data.nama, data.aktif, data.jenis, data.status);
		}
	});

	function tabel_keluarga() {
		var t = $('#tabel_keluarga')
			.off('click ')
			.on('xhr.dt', function(e, settings, json, xhr) {
				generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
			}).dataTable({
				'responsive': true,
				'paging': true,
				'destroy': true,
				'processing': true,
				"language": {
					"processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
				},
				'serverSide': true,
				'ajax': {
					"url": "/employee/keluarga/table?id=<?=$dataEmployee->id_employee?>",
					"type": "POST",
					"dataType": "JSON",
					"error": function(response) {
						invalid_token(response);
					}
				},
				"columnDefs": [
					{
						"searchable": false,
						"orderable": true,
						"width": "1%",
						"targets": [0, 1]
					},
					{
						"targets": [0, 1],
						"className": "text-center"
					},
					{
						"targets": [6],
						"className": "text-center d-none",
						"searchable": false,
						"orderable": false,
					},
				],
				// 'scrollX'       : true,
				'lengthChange': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': false,
				'order': [
					[3, 'desc']
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

	function tambah_keluarga() {
		loadingShow()
		loadingHide();
		$("#header_title").html("Form Tambah Keluarga");
		$("#id").val("");
		$("#nama").val("");
		$("#aktif").prop("checked", true);
		$("#status_keluarga").val(0);
		$("#ModalForm").modal("show");
	}
	
	function detail(id, nama, aktif, jenis_kelamin, status_keluarga) {
		$("#header_title").html("Form Update Keluarga");
		$("#nama").val(nama);
		$("#id").val(id);
		if (aktif == 1) {
			$("#aktif").prop("checked", true);
		} else {
			$("#aktif").prop("checked", false);
		}
		if (jenis_kelamin == "P") {
			$("#jenis_kelamin").prop("checked", true);
		} else {
			$("#jenis_kelamin").prop("checked", false);
		}
		$("#status_keluarga").val(status_keluarga);
		$("#ModalForm").modal("show");
	}

	function hapus(id) {
		swal({
				title: "Hapus keluarga?",
				text: "Yakin ingin hapus keluarga ini ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((isConfirm) => {
				if (isConfirm) {
					loadingShow();
					$.ajax({
						url: "/employee/keluarga/hapus",
						type: "POST",
						data: {
							id: id,
						},
						dataType: "JSON",
						success: function(data, status, xhr) {
							generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
							loadingHide();
							if (data.kode == 1) {
								tabel_keluarga();
							}
							swal(data.header, data.response, data.tipenotif);
						},
						error: function(response) {
							invalid_token(response);
							loadingHide();
							swal("Gagal !", "keluarga gagal dihapus", "error");
						}
					});
				}
			});
	}

	$("#form_modal").submit(function(e) {
		e.preventDefault();
		$("#ModalForm").modal("hide");
		loadingShow();
		var postData = $(this).serializeArray();
		$.ajax({
			url: "/employee/keluarga/simpan",
			type: "POST",
			data: postData,
			dataType: "JSON",
			success: function(data, status, xhr) {
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				if (data.kode == 1) {
					tabel_keluarga();
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
				if ($("#id").val()) {
					swal("Gagal", "keluarga gagal ditambahkan", "error");
				} else {
					swal("Gagal", "keluarga gagal diupdate", "error");
				}
			}
		});
	});
</script>