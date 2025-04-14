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
								<small>Halaman List Report Bulanan</small>
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
			</div>
		</div>
		<!--/ Projects table -->
	</div>
</div>
<!-- / Content -->

<div class="" id="grafikContainer"></div>

<?php $this->load->view('partials/footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
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
</script>