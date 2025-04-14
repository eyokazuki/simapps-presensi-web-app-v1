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
								<small>Halaman Detail Absensi</small>
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
                        <input type="date" name="carigrafik" id="carigrafik" placeholder="dd/mm/yyyy" class="form-control" style="width: 160px; float: left;">
                        <a href="javascript:void(0)" onclick="CariTanggal()" class="btn btn-sm btn-outline-primary" style="height: 37px;">Cari</a>   
                    </h5>
				</div>
                <div class="card-datatable table-responsive mt-4">
					<input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
					<table id="tabel_absensi" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Departemen</th>
								<th class="text-center">Code</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Absen</th>
								<th class="text-center">Kesehatan</th>
								<th class="text-center">Lokasi</th>
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



<?php $this->load->view('partials/footer'); ?>

<script>
// Date object
const date = new Date();
let currentDay= String(date.getDate()).padStart(2, '0');
let currentMonth = String(date.getMonth()+1).padStart(2,"0");
let currentYear = date.getFullYear();
let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;


$(document).ready(function() {
    $('#carigrafik').val(currentDate);
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

    tabel_absensi(currentDate);
});

    function CariTanggal(){
    var tanggal = $('#carigrafik').val();
        tabel_absensi(tanggal);
    }
    function tabel_absensi(tanggal) {
		var t = $('#tabel_absensi')
			.off('click ')
			.on('xhr.dt', function(e, settings, json, xhr) {
				generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
			})
			.dataTable({
                'order': [[1, 'asc'],[2, 'asc']],
				'responsive': true,
				'paging': true,
				'destroy': true,
				'processing': true,
				"language": {
					"processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
				},
				'serverSide': true,
				'ajax': {
					"url": "detailabsen/tabel_absensi",
					"type": "POST",
                    "data" : { tanggal:tanggal },
					"dataType": "JSON",
					"error": function(response) {
						invalid_token(response);
					}
				},
				"columnDefs": [{
						"searchable": false,
						"orderable": true,
						"width": 10,
						"targets": 0
					},
					{
						"width": 100,
						"targets": [1,2,4,5]
					},
                    { 
                        "targets":[1], 
                        "visible": false 
                    },
				],
				'lengthChange': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': false,
				"rowCallback": function(row, data, iDisplayIndex) {
					var info = this.fnPagingInfo();
					var page = info.iPage;
					var length = info.iLength;
					var index = page * length + (iDisplayIndex + 1);
					$('td:eq(0)', row).html(index);
				},
                "rowGroup": {
                    "dataSrc": 1
                }
			});
	}
</script>