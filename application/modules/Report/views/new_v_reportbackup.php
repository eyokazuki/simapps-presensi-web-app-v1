<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Grafik Absensi Pekerja</title>


  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" />


  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/tabler-icons.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/flag-icons.css') ?>" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css') ?>" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css') ?>" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/cards-advance.css') ?>" />
  <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>

</head>
<!-- Layout -->
<!-- https://simenggaris.absenyuk.xyz/report?2384bcc0cf660acd23149f0c9d7c7f1c09bbaaad26e8652c4443d5988e0792db1dcd34ae765a82dc3138b4cb45c3fb7fe6a026f8d2c1643f34f317790f95efcdEWBb9arRRZcZ0KItD99r+5DiYSeLtUoi/bOAtE3YDnI= -->

<body id="pdfContainer">
  <?php
  echo "<input type='hidden' value='" . $asal . "' name='tanggalproses' id='tanggalproses'>";
  ?>
  <!-- <div class="ReportAbsen" style="padding-top: 5px;padding-left: 30px;padding-right: 30px;padding-bottom: 0px;"> -->
  <div class="ReportAbsen">
    <div class="card-body" style="overflow-x: show; overflow-y: hidden;">
      <table width='100%' align='center'>
        <tr>
          <td align="center">
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-12">
                  <div class="card-title d-flex align-items-start justify-content-between" style="height:34px;">
                    <div class="col-md-11 flex-shrink-0" style="padding:10px;">
                      <h5>Grafik Absensi Pekerja [<?php echo $sekarang; ?>]</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div id="GrafikAbsensiPekerja"></div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td align="center">
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-12">
                  <div class="card-title d-flex align-items-start justify-content-between" style="height:34px;">
                    <div class="col-md-11 flex-shrink-0" style="padding:10px;">
                      <h5>Grafik Lokasi Pekerja [<?php echo $sekarang; ?>]</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div id="GrafikLokasiPekerja"></div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td align="center">
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-12">
                  <div class="card-title d-flex align-items-start justify-content-between" style="height:34px;">
                    <div class="col-md-11 flex-shrink-0" style="padding:10px;">
                      <h5>Grafik Kesehatan Pekerja [<?php echo $sekarang; ?>]</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div id="GrafikKesehatanPekerja"></div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <!-- Include html2pdf library from a CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>
  <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>
  <script src="<?= base_url('assets/js/printarea.js') ?>"></script>
  <script type="text/javascript">
    var sudah = 0;
    var belum = 0;
    // Date object
    var currentDate = $('#tanggalproses').val();

    var options = {
      series: [],
      chart: {
        type: 'bar',
        height: 280,
        animations: {
          enabled: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
      },
      colors: ['#0648ba', '#ba7806'],
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: [],
      },
      legend: {
        show: true,
        position: 'top'
      },
      dataLabels: {
        enabled: true,

        style: {
          colors: ['#fff']
        },

      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val
          }
        }
      }
    };
    var chartAbsen = new ApexCharts(document.querySelector("#GrafikAbsensiPekerja"), options);
    chartAbsen.render();

    function cetak() {
      // var mode = 'iframe'; //popup
      // var close = mode == "popup";
      // var options = {
      //   mode: mode,
      //   popClose: close
      // };
      // $("div.ReportAbsen").printArea(options);
    }

    var options = {
      series: [],
      chart: {
        type: 'bar',
        height: 300,
        animations: {
          enabled: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
      },
      colors: ['#0648ba', '#ba7806'],
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: [],
      },
      dataLabels: {
        enabled: true,

        style: {
          colors: ['#fff']
        },

      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val
          }
        }
      }
    };
    var chartKesehatan = new ApexCharts(document.querySelector("#GrafikKesehatanPekerja"), options);
    chartKesehatan.render();

    var options = {
      series: [],
      dataLabels: {
        formatter: function(val, opts) {
          return opts.w.config.series[opts.seriesIndex]
        },
      },

      chart: {
        width: 390,
        type: 'pie',
        animations: {
          enabled: false
        }
      },
      labels: [],
      legend: {
        show: true,
        position: 'bottom'
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 360
          },
          legend: {
            position: 'center'
          }
        }
      }]
    };

    var chartLokasi = new ApexCharts(document.querySelector("#GrafikLokasiPekerja"), options);
    chartLokasi.render();


    $(document).ready(async function() {
      await GrafikAbsen(currentDate);
      await GrafikLokasi(currentDate);
      await GrafikSehat(currentDate);
      $('#carigrafik').val(currentDate);
      //   await generateAndSendPDF();
    });

    function CariTanggal() {
      var tanggal = $('#carigrafik').val();
      GrafikAbsen(tanggal);
      GrafikSehat(tanggal);
      GrafikLokasi(tanggal);
    }

    // Grafik Absensi
    async function GrafikAbsen(tanggal) {
      console.log("GrafikAbsen");
      await $.ajax({
        // url: "report/getchart_absen",
        url: "getchart_absen",
        type: "POST",
        dataType: "JSON",
        data: {
          tanggal: tanggal
        },
        success: function(data) {

          chartAbsen.updateOptions({
            xaxis: {
              categories: data.departemen
            },
            series: [{
                name: 'Absen',
                data: data.absen
              },
              {
                name: 'Tidak Absesn',
                data: data.absentidak
              }
            ],
            plotOptions: {
              bar: {
                dataLabels: {
                  position: "top" // top, center, bottom
                }
              }
            },
            dataLabels: {
              enabled: true,
              formatter: function(val) {
                return val + "%";
              },
              offsetY: -20,
              style: {
                fontSize: "12px",
                colors: ["#304758"]
              }
            },
          });

        }
      });
    }
    //Grafik Kesehatan
    async function GrafikSehat(tanggal) {
      console.log("GrafikSehat");
      await $.ajax({
        // url: "report/getchart_sehat",
        url: "getchart_sehat",
        type: "POST",
        dataType: "JSON",
        data: {
          tanggal: tanggal
        },
        success: function(data) {
          chartKesehatan.updateOptions({
            xaxis: {
              categories: data.departemen
            },
            series: [{
                name: 'Sehat',
                data: data.sehat
              },
              {
                name: 'Tidak Sehat',
                data: data.sehattidak
              }
            ],
            plotOptions: {
              bar: {
                dataLabels: {
                  position: "top" // top, center, bottom
                }
              }
            },
            dataLabels: {
              enabled: true,
              formatter: function(val) {
                return val + "%";
              },
              offsetY: -20,
              style: {
                fontSize: "12px",
                colors: ["#304758"]
              }
            },
          });
          cetak();
        }
      });
    }
    // Grafik PIE
    async function GrafikLokasi(tanggal) {
      console.log("GrafikLokasi");
      $.ajax({
        // url: "report/getchart_lokasi",
        url: "getchart_lokasi",
        type: "POST",
        dataType: "JSON",
        data: {
          tanggal: tanggal
        },
        success: function(data) {
          chartLokasi.updateOptions({
            labels: data.status,
            series: data.jumlah,
            dataLabels: {
              enabled: true,
              formatter: function(val) {
                return val + "%";
              },
            },
          });

        }
      });
    }

    // Generate PDF
    async function generateAndSendPDF() {
      // Get the HTML element you want to convert to PDF
      const element = document.getElementById('pdfContainer');

      // Create an options object for html2pdf
      const options = {
        margin: 0,
        filename: 'generated.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 1,
        },
        // jsPDF: {
        //   unit: 'mm',
        //   format: 'a4',
        //   orientation: 'portrait'
        // },
      };

      // Use html2pdf to convert the HTML element to a PDF
      await html2pdf()
        .from(element)
        .set(options)
        // .save();
        .outputPdf("blob")
        .then((pdf) => {
          console.log('PDF generated successfully');
          const formData = new FormData();
          formData.append('pdf', pdf, 'generated.pdf');

          $.ajax({
            url: 'send_report',
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Set content type to false as FormData handles it
            success: function(response) {
              // Handle the server's response here
              console.log('Server response:', response);
            },
            error: function(xhr, status, error) {
              // Handle errors here
              console.error('Error:', error);
            }
          });
        }).catch(error => {
          console.error('PDF generation error:', error);
        });
    }


    // function KirimEmail(email_penerima, email_subject, email_subject) {
    //   $.ajax({
    //     // url: "report/send_email",
    //     url: "send_email",
    //     type: "POST",
    //     dataType: "JSON",
    //     data: {
    //       email_penerima: email_penerima,
    //       email_subject: email_subject,
    //       email_subject: email_subject
    //     },
    //     success: function(data) {

    //     }
    //   });
    // }
  </script>
</body>

</html>