            <!-- Content -->
            <?php
            defined('BASEPATH') or exit('No direct script access allowed');
            $this->load->view('partials/header');
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang pada Sistem Simenggaris</h5>
                          <p class="mb-4">
                            <?php
                            echo "Anda Login sebagai <span class='fw-bold'> " . $ses["s_nama"] . " </span> dengan Level User <span class='fw-bold'> " . $ses["s_priv"] . " </span>.";
                            ?>
                          </p>

                          <!--  -->
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="<?= base_url('assets/') ?>img/illustrations/girl-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/girl-with-laptop-dark.png" data-app-light-img="illustrations/girl-with-laptop-light.png" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div>
                          <input type="date" name="carigrafik" id="carigrafik" placeholder="dd/mm/yyyy" class="form-control" style="width: 160px; float: left;">
                          <a href="javascript:void(0)" onclick="CariTanggal()" class="btn btn-sm btn-outline-primary" style="height: 37px;">Cari</a>
                          <!-- <a href="javascript:void(0)" onclick="CetakTanggal()" class="btn btn-sm btn-outline-primary" style="height: 37px;">Detail</a> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card" style='height:200px;'>
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            </div>
                          </div>
                          <span>&nbsp;</span>
                          <h3 class="card-title text-nowrap mb-1">
                            <div id='sudah'>0</div>
                          </h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Sudah Absen</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card" style='height:200px;'>
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            </div>
                          </div>
                          <span>&nbsp;</span>
                          <h3 class="card-title text-nowrap mb-1">
                            <div id='belum'>0</div>
                          </h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Belum Absen</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="col-md-11 flex-shrink-0" style="padding:10px;">
                            <h5>Grafik Absensi Pekerja</h5>
                          </div>
                          <!--  -->
                        </div>

                      </div>
                      <div class="col-md-12">
                        <div id="GrafikAbsenPekerja" style='height:320px;'></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card" style="height:395px; margin-left:0px;">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0" style="padding-left:0px;">
                          <div class="card-title mb-0" style="padding-left:0px;">
                            <h5 class="m-0 me-2">&nbsp;&nbsp;Grafik Tipe Absensi</h5>
                            <div class="mt-2" id="GrafikLokasiPekerja"></div>
                            <div class="d-flex justify-content-between">
                              <div></div>
                              <div id="legendChartTipeAbsen"></div>
                              <div></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-12">

                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="col-md-11 flex-shrink-0" style="padding:10px;">
                            <h5>Grafik Kesehatan Pekerja</h5>
                          </div>
                          <!--  -->
                        </div>

                      </div>
                      <div class="col-md-12">
                        <div id="GrafikKesehatanPekerja" style='height:350px;'></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- / Content -->
            <?= $this->load->view('partials/footer'); ?>
            <script type="text/javascript">
              var sudah = 0;
              var belum = 0;
              // Date object
              const date = new Date();
              let currentDay = String(date.getDate()).padStart(2, '0');
              let currentMonth = String(date.getMonth() + 1).padStart(2, "0");
              let currentYear = date.getFullYear();
              let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;
              const colorPie = ['#3a86ff', '#2a9d8f', '#fb8500', "#e63946", "#8338ec", "#264653", "#bb9457"];

              var optionsAbsen = {
                series: [],
                chart: {
                  type: 'bar',
                  height: 300
                },
                plotOptions: {
                  bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                  },
                },
                colors: ['#a8cf45', '#FF6969'],
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
              var chartAbsen = new ApexCharts(document.querySelector("#GrafikAbsenPekerja"), optionsAbsen);
              chartAbsen.render();

              var optionsKesehatan = {
                series: [],
                chart: {
                  type: 'bar',
                  height: 300
                },
                plotOptions: {
                  bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                  },
                },
                colors: ['#a8cf45', '#FF6969'],
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
                  formatter: function(val) {
                    return val + "%";
                  },
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
              var chartKesehatan = new ApexCharts(document.querySelector("#GrafikKesehatanPekerja"), optionsKesehatan);
              chartKesehatan.render();

              var optionsLokasi = {
                series: [],
                dataLabels: {
                  enabled: true,
                  formatter: function(val, opts) {
                    return opts.w.config.series[opts.seriesIndex]
                  },
                },
                chart: {
                  width: 340,
                  height: 200,
                  type: 'pie',
                },
                labels: [],
                legend: {
                  show: true,
                  position: 'bottom',
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

              var chartLokasi = new ApexCharts(document.querySelector("#GrafikLokasiPekerja"), optionsLokasi);
              chartLokasi.render();


              $(document).ready(function() {
                GrafikAbsen(currentDate);
                GrafikLokasi(currentDate);
                GrafikSehat(currentDate);
                $('#carigrafik').val(currentDate);
              });

              function CetakTanggal() {
                var tanggal = $('#carigrafik').val();
                var form = $('<form action="detailabsen" method="post"><input type="hidden" name="tgl" value="' + tanggal + '"></form>');
                $('body').append(form);
                $(form).submit();
              }


              function CariTanggal() {
                var tanggal = $('#carigrafik').val();
                GrafikAbsen(tanggal);
                GrafikSehat(tanggal);
                GrafikLokasi(tanggal);
              }

              // Grafik Absensi
              function GrafikAbsen(tanggal) {
                $.ajax({
                  url: "dashboard/getchart_absen",
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
                          data: data.absen.map(function(val, index) {
                            return (val / data.total[index] * 100).toFixed(0);
                          }),
                        },
                        {
                          name: 'Tidak Absen',
                          data: data.absentidak.map(function(val, index) {
                            return (val / data.total[index] * 100).toFixed(0);
                          }),
                        }
                      ],
                      plotOptions: {
                        bar: {
                          dataLabels: {
                            position: "top",
                          }
                        }
                      },
                      dataLabels: {
                        enabled: true,
                        formatter: function(val, opts) {
                          let count = (data.total[opts.dataPointIndex] * val / 100).toFixed(0);
                          return `(${count}) ${val}%`;
                        },
                        offsetY: -20,
                        style: {
                          fontSize: "12px",
                          colors: ["#304758"]
                        }
                      },
                      tooltip: {
                        y: {
                          formatter: function(value, {
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                          }) {
                            return (data.total[dataPointIndex] * value / 100).toFixed(0);
                          }
                        }
                      },
                    });
                    sudah = data.absen.reduce(function(a, b) {
                      return a + b;
                    }, 0);
                    belum = data.absentidak.reduce(function(a, b) {
                      return a + b;
                    }, 0);
                    $('#sudah').html(sudah);
                    $('#belum').html(belum);
                  }
                });
              }
              //Grafik Kesehatan
              function GrafikSehat(tanggal) {
                $.ajax({
                  url: "dashboard/getchart_sehat",
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
                          data: data.sehat.map(function(val, index) {
                            return val == 0 ? 0 : (val / data.total[index] * 100).toFixed(0);
                          }),
                        },
                        {
                          name: 'Tidak Sehat',
                          data: data.sehattidak.map(function(val, index) {
                            return val == 0 ? 0 : (val / data.total[index] * 100).toFixed(0);
                          }),
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
                        formatter: function(val, opts) {
                          let count = (data.total[opts.dataPointIndex] * val / 100).toFixed(0);
                          return `(${count}) ${val}%`;
                        },
                        offsetY: -20,
                        style: {
                          fontSize: "12px",
                          colors: ["#304758"]
                        }
                      },
                      tooltip: {
                        y: {
                          formatter: function(value, {
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                          }) {
                            return (data.total[dataPointIndex] * value / 100).toFixed(0);
                          }
                        }
                      },
                    });
                  }
                });
              }

              // Grafik PIE
              function GrafikLokasi(tanggal) {
                $.ajax({
                  url: "dashboard/getchart_lokasi",
                  type: "POST",
                  dataType: "JSON",
                  data: {
                    tanggal: tanggal
                  },
                  success: function(data) {
                    chartLokasi.updateOptions({
                      chart: {
                        type: 'pie',
                        colors: colorPie,
                        // height: 20,
                      },
                      labels: data.status,
                      series: data.percentage,
                      plotOptions: {
                        pie: {
                          dataLabels: {
                            offset: -20,
                          },
                        }
                      },
                      colors: colorPie,
                      legend: {
                        show: false,
                      },
                      dataLabels: {
                        enabled: true,
                        formatter: function(val, opts) {
                          return `(${data.jumlah[opts.seriesIndex]}) ${val.toFixed(2)}%`;
                        },
                        style: {
                          fontSize: '12px',
                        },
                        dropShadow: {
                          enabled: true,
                          top: 1,
                          left: 1,
                          blur: 1,
                          color: '#000',
                          opacity: 1,
                        },
                      },
                    });
                    let legends = "";
                    for (let i = 0; i < data.status.length; i++) {
                      legends += `<div class="d-flex align-items-center mb-2">
                        <div style="width: 10px; height: 10px; background-color: ${colorPie[i]}" class="me-2">
                        </div>
                        <div style="font-size: 10px;">
                          ${data.status[i]}
                        </div>
                      </div>`;
                    }
                    $("#legendChartTipeAbsen").html(legends);
                  }
                });
              }
            </script>