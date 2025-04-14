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
								<small>Halaman Ubah Batas Waktu Absen</small>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<!-- Projects table -->
		<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
			<div class="card p-4">
				<form method="POST" action="/bataswaktu/simpan">
					<input type="hidden" class="form-control add-banner" id="id" name="id" required value="<?= $batas_waktu->id ?>">
					<div class="row">
						<div class="col-lg-10">
							<div class="form-group">
								<label>Batas Waktu Jam</label>
								<input class="form-control" type="number" id="jam" name="jam" required value="<?= $batas_waktu->jam ?>">
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-10">
							<button class="btn btn-primary btn-sm submit" type="submit">Simpan</button>
						</div>
					</div>
				</form>
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