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
								<small>Halaman Report Bulanan</small>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4">
			<?php
			$month = date("m");
			$year = date("Y");
			?>
			<div class="card p-4">
				<h5 class="card-title">Report Bulanan</h5>
				<form method="GET" action="#" class="d-flex flex-column flex-md-row gap-4 align-items-start align-items-md-end" id="formReportBulanan">
					<input type="hidden" name="idUser" id="idUser" value="<?= $idUser ?>">
					<div>
						<label>Bulan</label>
						<select name="month" id="month" class="form-control" style="float: left;">
						<?php
						foreach ($monthList as $key => $value) {
							?>
							<option value="<?= $key+1 ?>" <?= $key+1 == $month ? "selected" : "" ?>><?= $value ?></option>
							<?php
						}
						?>
						</select>
					</div>
					<div>
						<label>Tahun</label>
						<select name="year" id="year" class="form-control" style="float: left;">
						<?php
						foreach ($yearList as $key => $value) {
							?>
							<option value="<?= $value ?>" <?= $value == $year ? "selected" : "" ?>><?= $value ?></option>
							<?php
						}
						?>
						</select>
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Download Report</button>
					</div>
					<div id="loadingDownloadBtn" class="d-none">
						<i class="fa fa-spinner fa-spin fa-3x fa-fw mx-auto"></i><span class="sr-only">Loading...</span>
					</div>
				</form>
			</div>
		</div>

		<!-- Projects table -->
		<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 d-none" id="loadingContent">
			<div class="card p-4">			
				<div class="bg-white">
					<i class="fa fa-spinner fa-spin fa-3x fa-fw mx-auto"></i><span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
		<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4" id="grafik">
			<div class="card p-4">
				<div class="row">
					<div class="col-12">
						<h5 class="text-center">Grafik Kehadiran<br /><small class="subTitle"></small></h5>
						<div id="grafikKehadiran"></div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-12">
						<h5 class="text-center">Grafik Kesehatan<br /><small class="subTitle"></small></h5>
						<div id="grafikKesehatan"></div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-12">
						<h5 class="text-center">Grafik Absensi<br /><small class="subTitle"></small></h5>
						<div id="grafikAbsen"></div>
					</div>
				</div>
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
	const colorGrafik = ['#3a86ff', '#2a9d8f', '#fb8500', "#e63946", "#8338ec", "#264653", "#bb9457"];
	
	const optionKehadiran = {
        series: [],
        chart: {
            type: 'bar',
            height: 680,
            stacked: true,
            animations: {
                enabled: false
            },
            width: '100%',
        },
        plotOptions: {
            bar: {
                // horizontal: true,
            },
        },
        colors: colorGrafik,
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        fill: {
            opacity: 1
        },
    }
    var grafikKehadiran = new ApexCharts(document.querySelector("#grafikKehadiran"), optionKehadiran);
    grafikKehadiran.render();

	const optionKesehatan = {
        series: [],
        chart: {
            type: 'bar',
            height: 680,
            stacked: true,
            animations: {
                enabled: false
            },
            width: '100%',
        },
        plotOptions: {
            bar: {
                // horizontal: true,
            },
        },
        colors: colorGrafik,
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        fill: {
            opacity: 1
        },
    }
    var grafikKesehatan = new ApexCharts(document.querySelector("#grafikKesehatan"), optionKesehatan);
    grafikKesehatan.render();

	const optionAbsen = {
        series: [],
        chart: {
            type: 'bar',
            height: 670,
            stacked: true,
            animations: {
                enabled: false
            },
            width: '100%',
        },
        plotOptions: {
            bar: {
                // horizontal: true,
            },
        },
        colors: colorGrafik,
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        fill: {
            opacity: 1
        },
    }
    var grafikAbsen = new ApexCharts(document.querySelector("#grafikAbsen"), optionAbsen);
    grafikAbsen.render();

	$("#formReportBulanan").submit(async function(e) {
		e.preventDefault();
		$("#loadingDownloadBtn").removeClass("d-none");
		const element = document.getElementById('grafik');
		var opt = {
			margin:       0,
			filename:     'report_bulanan.pdf',
			image:        { type: 'jpeg', quality: 0.98 },
			html2canvas:  { scale: 2 },
			jsPDF:        { unit: 'in', format: 'A4', orientation: 'landscape' }
		};
		await html2pdf().set(opt).from(element).save();
		$("#loadingDownloadBtn").addClass("d-none");
		// var postData = $(this).serializeArray();
		// $("#loadingDownload").removeClass("d-none");
		// $.ajax({
		// 	url: `reportbulanan/report/bulanan?month=${$("#month").val()}&year=${$("#year").val()}&idUser=${$("#idUser").val()}`,
		// 	type: "POST",
		// 	// data: postData,
		// 	// dataType: "JSON",
		// 	success: async function(data, lokasi, xhr) {
		// 		generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
		// 		// $("#grafikContainer").html(data);
		// 		const element = document.getElementById('grafik');
		// 		var opt = {
		// 			margin:       0,
		// 			filename:     'report_bulanan.pdf',
		// 			image:        { type: 'jpeg', quality: 0.98 },
		// 			html2canvas:  { scale: 2 },
		// 			jsPDF:        { unit: 'in', format: 'A4', orientation: 'landscape' }
		// 		};
		// 		await html2pdf().set(opt).from(element).save();
		// 		// $("#grafikContainer").html("");
		// 		// $("#loadingDownload").addClass("d-none");
		// 	},
		// 	error: function(response) {
		// 		invalid_token(response);
		// 	}
		// });
	});

	const getGrafik = async () => {
		// $("#loadingContent").removeClass("d-none");
		// $("#grafik").addClass("d-none");
		await $.ajax({
			url: `reportbulanan/report/get_bulanan?month=${$("#month").val()}&year=${$("#year").val()}&idUser=${$("#idUser").val()}`,
			type: "POST",
			// data: postData,
			// dataType: "JSON",
			success: async function(data, lokasi, xhr) {
				const result = JSON.parse(data);
				generate_token(xhr.getResponseHeader("<?= csrf_name(); ?>"));
				$(".subTitle").text(`(${result.month} ${result.year})`);
				let seriesKehadiran = result.seriesKehadiran.replaceAll(",}","}").replaceAll(",]","]").replaceAll('\'', '"').replaceAll('name','"name"').replaceAll('data','"data"');
				seriesKehadiran = JSON.parse(seriesKehadiran);
				let categoriesKehadiran = result.categoriesKehadiran.replaceAll(",]","]").replaceAll('\'', '"');
				categoriesKehadiran = JSON.parse(categoriesKehadiran);
				grafikKehadiran.updateOptions({
					series: seriesKehadiran,
					xaxis: {
						categories: categoriesKehadiran,
					},
				});
				let seriesKesehatan = result.seriesKesehatan.replaceAll(",}","}").replaceAll(",]","]").replaceAll('\'', '"').replaceAll('name','"name"').replaceAll('data','"data"');
				seriesKesehatan = JSON.parse(seriesKesehatan);
				let categoriesKesehatan = result.categoriesKesehatan.replaceAll(",]","]").replaceAll('\'', '"');
				categoriesKesehatan = JSON.parse(categoriesKesehatan);
				grafikKesehatan.updateOptions({
					series: seriesKesehatan,
					xaxis: {
						categories: categoriesKesehatan,
					},
				});
				let seriesAbsen = result.seriesAbsen.replaceAll(",}","}").replaceAll(",]","]").replaceAll('\'', '"').replaceAll('name','"name"').replaceAll('data','"data"');
				seriesAbsen = JSON.parse(seriesAbsen);
				let categoriesAbsen = result.categoriesAbsen.replaceAll(",]","]").replaceAll('\'', '"');
				categoriesAbsen = JSON.parse(categoriesAbsen);
				grafikAbsen.updateOptions({
					series: seriesAbsen,
					xaxis: {
						categories: categoriesAbsen,
					},
				});
				// $("#loadingContent").addClass("d-none");
				// $("#grafik").removeClass("d-none");
			},
			error: function(response) {
				invalid_token(response);
			},
		});
	}
	
	$(document).ready(async function(e){
		await getGrafik();
	});

	$("#month").change(async function(e){
		await getGrafik();
	});

	$("#year").change(async function(e){
		await getGrafik();
	});
</script>